@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Winner</h1>
                <hr>
                @if (!empty($result))
                    <p>{{ $result->user->name }}</p>
                    <p>{{ $result->number }}</p>
                @else
                    <p>No winner in this round</p>
                @endif

                @if (!empty($error_message))
                    <p class="error">{{ $error_message }}</p>
                @endif
            </div>
            <div class="col-md-8">
                <a class="btn btn-primary" href="{{ route('home') }}">Draw the next prize</a>
            </div>
        </div>
    </div>
@endsection
