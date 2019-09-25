@extends('layouts.master')

@section('content')

    <div class="row">

        <div class="col-md-12" style="text-align: center;">
            <h1>Esercizi</h1>
        </div>

        <div class="col-md-12" style="margin-top: 2.5%">
            <form class="form">
                <div class="row">

                    <div class="col-md-10">

                        <div class="input-group no-border">
                            <input type="text" value="" class="form-control" placeholder="Search...">
                            <button type="submit" class="btn btn-default btn-round btn-just-icon">
                                <i class="fas fa-search"></i>
                                <div class="ripple-container"></div>
                            </button>
                        </div>


                    </div>

                    <div class="col-md-2" style="text-align: center; margin-top: auto; margin-bottom: auto">

                        <a href="#">
                            <button class="bttn-material-circle bttn-md bttn-success">
                                <i class="fas fa-plus"></i>
                            </button>
                        </a>

                    </div>

                </div>
            </form>


        </div>

        <div class="col-md-12">

            <div class="row justify-content-center" style="margin-top: 2.5%">



                @include('components.excercise.excerciseCard')
                @include('components.excercise.excerciseCard')
                @include('components.excercise.excerciseCard')
                @include('components.excercise.excerciseCard')
                @include('components.excercise.excerciseCard')
                @include('components.excercise.excerciseCard')
                @include('components.excercise.excerciseCard')
                @include('components.excercise.excerciseCard')
                @include('components.excercise.excerciseCard')

            </div>
        </div>

    </div>




@endsection