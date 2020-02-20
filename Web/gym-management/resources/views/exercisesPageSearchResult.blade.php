@extends('layouts.master')
@section('content')
    <div class="card" style="border-radius: 10px;background-color: rgba(31, 38, 45, 0.8)">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12" style="text-align: center;">
                    <h1 style="color: #d6d8d8">Esercizi</h1>
                </div>
                <div class="col-md-12" style="margin-top: 2.5%">
                    @include('components.exercise.exerciseSearchBar')
                </div>
                @if(count($exercisesResultList) == 0)
                  <div class="row text-center" style="margin-top: 5%">
                    <br>
                    <br>
                    <br>
                      <h1 class="col-md-12 text-center" style="color: #d6d8d8">Non ci sono risultati</h1>
                    <br>
                    <br>
                    <br>
                  </div>
                @endif
                <div class="col-md-12" >
                    <div class="row justify-content-center" style="margin-top: 2.5%;">
                        @foreach($exercisesResultList as $exercise)
                            @include('components.exercise.cardExercise')
                        @endforeach
                    </div>
                    <div class="row justify-content-center">
                        {{ $exercisesResultList->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
