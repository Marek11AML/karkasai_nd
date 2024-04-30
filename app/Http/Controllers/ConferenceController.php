<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\Models\Conference;

class ConferenceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'store']]);
        $this->middleware('can:create-conference', ['only' => ['create', 'store']]);
    }
    
    public function index()
    {
        $conferences = Conference::orderBy('date')->orderBy('time')->get();

        $isAdmin = Auth::check() && Auth::user()->isAdmin();


        return view('conferences.index', compact('conferences','isAdmin'));
    }
    public function create()
    {
        return view('conferences.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|after:now',
        ]);

        Conference::create($request->all());

        return redirect()->route('conferences.index')->with('success', 'Conference created successfully.');
    }

    public function edit($id)
    {
        $conference = Conference::findOrFail($id);

        return view('conferences.edit', compact('conference'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|after:now',
        ]);


        $conference = Conference::findOrFail($id);
        $conference->update($request->all());

        return redirect()->route('conferences.index')->with('success', 'Conference updated successfully.');
    }

    public function destroy($id)
    {
        $conference = Conference::findOrFail($id);
        $conference->delete();

        return redirect()->route('conferences.index')->with('success', 'Conference deleted successfully.');
    }

}
