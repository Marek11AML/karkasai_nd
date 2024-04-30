@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ __('app.edit_conference') }}</h2>

        <form action="{{ route('conferences.update', ['id' => $conference->id]) }}" method="post">
            @csrf
            @method('put')
            @include('conferences._form')

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <button type="submit" class="btn btn-primary">{{ __('app.update_conference') }}</button>
        </form>
        <a href="{{ route('conferences.index') }}"><button class="btn btn-secondary mt-2">{{ __('app.back') }}</button></a>
        <!-- Delete Button Form -->
        <form action="{{ route('conferences.destroy', ['id' => $conference->id]) }}" method="post" class="mt-3">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">{{ __('app.delete') }}</button>
        </form>

       


    </div>
@endsection
