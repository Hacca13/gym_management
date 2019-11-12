
@extends('layouts.master')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card" style="border-radius: 10px;background-color: #d6d8d8">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8" style="text-align: left">
                            <h4>Modifica Eserizio</h4>
                        </div>
                        <div class="col-md-4" style="text-align: end">
                            <!--Pagina precedente-->
                            <a href="gestioneEsercizi">
                                <h3>
                                    <i class="fas fa-times" style="color: red"></i>
                                </h3>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="/setFormExercise" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="fname" class="col-sm-12 text-left control-label col-form-label">Nome Esercizio</label>
                                <input type="text" value="{{$exercise->getName()}}" class="form-control" id="nameExercise" name="nameExercise" style="border-radius: 10px;background-color: rgb(255, 255, 255,0.7);" required>
                                <input type="text" value="{{$exercise->getIdDatabase()}}" hidden id="idDatabase" name="idDatabase">
                            </div>
                            <div class="col-md-6"></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="fname" class="col-sm-12 text-left control-label col-form-label">Descrizione</label>
                                <textarea  class="form-control" id="descriptionExercise" name="descriptionExercise" rows="5" style="border-radius: 10px;background-color: rgb(255, 255, 255,0.7);"required>{{$exercise->getDescription()}}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="fname" class="col-sm-12 text-left control-label col-form-label">Carica Gif</label>
                                <input type="file" class="form-control" id="imageExercise" name="imageExercise" style="border-radius: 10px;background-color: rgb(255, 255, 255,0.7);" >
                                <input type="text" id="oldImageExercise" name="oldImageExercise" hidden  value="{{$exercise->getGif()}}">

                            </div>
                          
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label for="fname" class="col-sm-12 text-left control-label col-form-label">Link esercizio</label>
                                <input class="form-control" value="{{$exercise->getLink()}}" id="linkExercise" name="linkExercise" style="border-radius: 10px; background-color: rgb(255, 255, 255,0.7);"required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <div class="form-check">
                                    <input class="form-check-input" <?php if($exercise->getExerciseIsATime()==true){ ?> checked <?php } ?> type="checkbox" name="exerciseIsATime" id="exerciseIsATime" value="TRUE">
                                    <label class="form-check-label" for="fname">
                                        L'esercicio è a tempo?
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-8"></div>
                            <div class="col-sm-2">
                                <input type='submit' class="btn btn-success" id="fname" name="" style="border-radius: 10px;">
                            </div>
                            <div class="col-md-2">
                                <a href="/gestioneEsercizi">
                                    <button class="btn btn-danger" id="fname" name="" style="border-radius: 10px;">Annulla</button>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
