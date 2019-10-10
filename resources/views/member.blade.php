@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if ($result = Auth::user()->result)
                <div class="col-md-8">
                    <div class="alert alert-success" role="alert">
                        Congratulations! You are the winner for {{ \App\Prize::PRIZE_TYPES_ARRAY[$result->prize_type] }}
                    </div>
                </div>
            @endif
            <div class="col-md-8">
                <h1>Member Portal</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3>Register Your Winning Number</h3>
                <hr>
                {!! Form::open(['route' => 'member.register-winning-number']) !!}
                <div class="form-group">
                    <label for="winning_number">Winning Number <span class="required">*</span></label>
                    {!! Form::text('winning_number', null, ['placeholder' => 'Enter your winning number', 'id' => 'winning_number', 'class' => 'form-control', 'required']) !!}
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
