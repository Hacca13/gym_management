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
                    <div class="row">

                        <div class="col-md-5">

                            <div class="input-group no-border">
                                <input type="text" value="" class="form-control" placeholder="Search...">
                                <button type="submit" class="btn btn-default btn-round btn-just-icon">
                                    <i class="fas fa-search"></i>
                                    <div class="ripple-container"></div>
                                </button>
                            </div>


                        </div>

                        <div class="col-md-6" style="text-align: center; margin-top: auto; margin-bottom: auto">

                            <a href="nuovoEsercizio" role="button">
                                <button class="bttn-material-circle bttn-md bttn-primary">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </a>

                        </div>

                    </div>

                </div>
                </div>
                </div>

                <div class="col-md-12">

                    <div class="row justify-content-center" style="margin-top: 2.5%">



                        @foreach($exercises as $ex)
                            @include('components.exercise.exerciseCard')
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>



@endsection
