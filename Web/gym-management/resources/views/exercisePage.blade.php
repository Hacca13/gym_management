@extends('layouts.master')

@section('content')
    <div class="card" style="border-radius: 10px;background-color: rgb(255, 255, 255,0.7);">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12" style="text-align: center;">
                    <h1>Esercizi</h1>
                </div>
                <div class="col-md-12" style="margin-top: 2.5%">
                    <div class="card" style="border-radius: 10px;background-color: rgb(255, 255, 255,0.7);">
                        <div class="card-body">
                            @include('components.excercise.exerciseSearchBar')
                        </div>
                    </div>
                </div>
            </div>
            @include('components.excercise.exerciseCard')
        </div>
    </div>
@endsection
