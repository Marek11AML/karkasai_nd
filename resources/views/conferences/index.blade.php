@extends('layouts.app')

@section('title', __('app.title'))

@section('content')
    <h2>{{ __('app.welcome') }}</h2>

    {{-- Display clock using moment.js --}}
    <p id="current-time" class="clock"></p>
    

    <ul class="conferences-list">
    @foreach($conferences as $conference)
    <li class="conference-item">
        <span class="conference-title">{{ $conference->title }}</span>
        <p>{{ __('app.date') }}: {{ $conference->date }}</p>
        <p>{{ __('app.time') }}: {{ $conference->time }}</p>
        
        @if($isAdmin)
            <a href="{{ route('conferences.edit', ['id' => $conference->id]) }}" 
                class="btn btn-secondary">{{ __('app.edit') }}</a>
        @endif
    </li>
@endforeach

    </ul>

    @if($isAdmin)
        <a href="{{ route('conferences.create') }}" class="btn btn-success">{{ __('app.create_conference') }}</a>
    @endif

@endsection




