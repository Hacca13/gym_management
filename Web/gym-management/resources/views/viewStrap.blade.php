@extends('layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card" style="border-radius: 10px;background-color: rgb(255, 255, 255,0.7);">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10" style="text-align: center">
                            <h2>Modifica esercizio</h2>
                        </div>
                        <div class="col-md-1" style="text-align: end">
                            <!--Pagina precedente-->
                            <a href="/gestioneEsercizi">
                                <i class="fas fa-times" style="font-size: 170%; color: red; margin-left: 2.5%"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="/insertFormExercise" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="fname" class="col-sm-12 text-left control-label col-form-label" style="font-size: large">Nome Esercizio</label>
                                <input type="text" class="form-control" placeholder="#" id="fname" name="name" style="border-radius: 10px;background-color: rgb(255, 255, 255,0.7);">
                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="fname" class="col-sm-12 text-left control-label col-form-label" style="font-size: large">Descrizione</label>
                                <textarea  class="form-control" placeholder="#" id="fname" name="description" rows="5" style="border-radius: 10px;background-color: rgb(255, 255, 255,0.7);"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="fname" class="col-sm-12 text-left control-label col-form-label" style="font-size: large">Carica Gif</label>
                                <input type="file" class="form-control" id="fname" name="image" style="border-radius: 10px;background-color: rgb(255, 255, 255,0.7); size: A5">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label for="fname" class="col-sm-12 text-left control-label col-form-label" style="font-size: large">Link esercizio</label>
                                <input class="form-control" placeholder="#" id="fname" name="link" style="border-radius: 10px; background-color: rgb(255, 255, 255,0.7);">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-8"></div>
                            <div class="col-sm-2">
                                <button class="btn btn-success" id="fname" name="" style="border-radius: 10px;">Inserisci</button>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-danger" id="fname" name="" style="border-radius: 10px;">Annulla</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
