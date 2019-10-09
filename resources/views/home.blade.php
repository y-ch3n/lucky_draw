@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Lucky Draw</h1>
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
                <button type="submit" class="btn btn-primary">Submit</button>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
