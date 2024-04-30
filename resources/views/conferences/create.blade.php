@extends('layouts.app')

@section('title', __('app.create_conference_title'))

@section('content')
    <h2>{{ __('app.new_conference') }}</h2>

    <form action="{{ route('conferences.store') }}" method="POST">
        @csrf
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

        <button type="submit" class="btn btn-success">{{ __('app.create_conference_button') }}</button>
    </form>
    <a href="{{ route('conferences.index') }}"><button class="btn btn-secondary mt-2">{{ __('app.back') }}</button></a>
@endsection
