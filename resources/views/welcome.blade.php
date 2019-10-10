@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Drawing Result</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Prize</th>
                            <th scope="col">Winner</th>
                            <th scope="col">Winning Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(\App\Prize::PRIZE_TYPES_ARRAY as $key => $prize_type)
                            <tr>
                                <th scope="row">{{ $prize_type }}</th>
                                <td>{{ optional(optional($results->where('prize_type', $key)->first())->user)->name ?? 'No winner yet' }}</td>
                                <td>{{ optional($results->where('prize_type', $key)->first())->number }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
