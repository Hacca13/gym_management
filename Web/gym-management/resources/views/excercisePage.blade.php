@extends('layouts.master')

@section('content')

    <div class="row">

        <div class="col-md-12" style="text-align: center;">
            <h1>Esercizi</h1>
        </div>

        <div class="col-md-12" style="margin-top: 2.5%">
            @include('components.excercise.exerciseOption')
        </div>

        <div class="col-md-12">

            <div class="row justify-content-center" style="margin-top: 2.5%">



                @foreach($exercises as $ex)
                    @include('components.excercise.excerciseCard')
                @endforeach
            </div>
        </div>

    </div>




@endsection
