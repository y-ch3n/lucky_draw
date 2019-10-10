@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Admin Portal</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3>Lucky Draw</h3>
            <hr>
            {!! Form::open(['route' => 'draw-a-prize']) !!}
                <div class="form-group">
                    <label for="prize_type">Prize Types <span class="required">*</span></label>
                    {!! Form::select('prize_type', App\Prize::PRIZE_TYPES_ARRAY, null, ['placeholder' => 'please select', 'id' => 'prize_type', 'class' => 'form-control', 'required']) !!}
                </div>
                <div class="form-group">
                    <label for="generate_randomly">Generate Randomly</label>
                    {!! Form::select('generate_randomly', [1 => 'yes', 0 => 'no'], null, ['placeholder' => 'please select', 'id' => 'generate_randomly', 'class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <label for="winning_number">Winning Number</label>
                    <input type="text" class="form-control" id="winning_number" name="winning_number">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            {!! Form::open(['route' => 'reset-draw', 'onsubmit' => 'return confirm("You will reset all the result. Do you wish to continue?")']) !!}
            <div class="form-group">
                <button type="submit" class="btn btn-danger">Reset the Draw</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
