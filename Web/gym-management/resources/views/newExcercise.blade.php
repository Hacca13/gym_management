@extends('layouts.master')

@section('content')

    <div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card" style="border-radius: 10px">

            <div class="card-header">

                <div class="row">

                    <div class="col-md-4" style="text-align: start">
                        <a href="#">
                            <i class="fas fa-edit" style="font-size: 150%; color: black;"></i>
                        </a>

                    </div>
                    <div class="col-md-4" style="text-align: start">
                        <h4>Inserisci Esercizio</h4>

                </div>

                    <div class="col-md-4" style="text-align: end">

                        <a href="#">
                            <i class="fas fa-times" style="font-size: 170%; color: red; margin-left: 2.5%"></i>
                        </a>





                    </div>

                </div>

            </div>

            <div class="card-body">
                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Immagine Esercizio</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" id="fname" name="gif">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nome Esercizio</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="fname" name="name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Descrizione</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="fname" name="description">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">exerciseIsATime</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="fname" name="exerciseIsATime">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-9">
                        <button class="btn btn-primary" id="fname" name="">Inserisci</button>
                    </div>
                </div>

            </div>

        </div>

    </div>
    </div>




@endsection
