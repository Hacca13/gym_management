@extends('layouts.master')
@section('content')
    <div class="card" style="border-radius: 10px;background-color: rgba(31, 38, 45, 0.8)">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-12" style="text-align: center;">
                    <h1 style="color: #d6d8d8">Esercizi</h1>
                </div>
                <div class="col-md-12" style="margin-top: 2.5%">
                    @include('components.exercise.exerciseSearchBar')
                </div>
                <div class="col-md-12" >
                    <div class="card">
                        <div class="card-body" style="background-color: rgba(214, 216, 216, 0.9); border-radius: 10px">
                            <div class="row justify-content-center">
                                @foreach($exercises as $exercise)
                                    @include('components.exercise.cardExercise')
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center" style="margin-top: 2.5%">
                        {{ $exercises->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
