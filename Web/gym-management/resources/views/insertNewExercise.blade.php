
@extends('layouts.master')

@section('content')


    <div class="card" style="border-radius: 10px;background-color: rgb(31, 38, 45, 0.8)">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-12" style="text-align: center;">
                    <h1 style="color: #d6d8d8">Inserisci Esercizio</h1>
                </div>
                <div class="col-md-12">
                    <div class="card col-md-12 justify-content-center" style="border-radius: 10px;background-color: #d6d8d8">
                        <form class="form-horizontal" action="/insertFormExercise" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="fname" class="col-sm-12 text-left control-label col-form-label">Nome Esercizio</label>
                                    <input type="text" class="form-control" id="nameExercise" name="nameExercise" style="border-radius: 10px;background-color: rgb(255, 255, 255,0.7);" required>
                                </div>
                                <div class="col-md-6"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="fname" class="col-sm-12 text-left control-label col-form-label">Descrizione</label>
                                    <textarea  class="form-control" id="descriptionExercise" name="descriptionExercise" rows="5" style="border-radius: 10px;background-color: rgb(255, 255, 255,0.7);"required></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label for="fname" class="col-sm-12 text-left control-label col-form-label">Carica Gif</label>
                                    <input type="file" class="form-control" id="imageExercise" name="imageExercise" style="border-radius: 10px;background-color: rgb(255, 255, 255,0.7);" required>
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label for="fname" class="col-sm-12 text-left control-label col-form-label">Link esercizio</label>
                                    <input class="form-control" id="linkExercise" name="linkExercise" style="border-radius: 10px; background-color: rgb(255, 255, 255,0.7);"required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="exerciseIsATime" id="exerciseIsATime" value="TRUE">
                                        <label class="form-check-label" for="fname">
                                            L'esercicio è a tempo?
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <a href="/gestioneEsercizi">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-danger" style="border-radius: 10px;">Annulla</button>
                                </div>
                                </a>
                                <div class="card-body offset-8">
                                    <button type="submit" class="btn btn-success" style="border-radius: 10px;">Inserisci Esercizio</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>




@endsection
