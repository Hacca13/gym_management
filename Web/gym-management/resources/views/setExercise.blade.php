
@extends('layouts.master')

@section('content')
    <div class="card" style="border-radius: 10px;background-color: rgba(31, 38, 45, 0.8)">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-12" style="text-align: center;">
                    <h1 style="color: #d6d8d8">Modifica esercizio</h1>
                </div>
                <div class="col-md-12" style="margin-top: 2.5%">
                    <div class="card col-md-12 justify-content-center" style="border-radius: 10px;background-color: #d6d8d8">
                        <form class="form-horizontal" action="/admin/setFormExercise" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row justify-content-center">
                                <div class="col-sm-12 col-md-12 col-lg-8">
                                    <label for="fname" class="col-sm-12 text-left control-label col-form-label" style="background-color: transparent; border: none; color: #1F262D">Nome Esercizio</label>
                                    <input type="text" value="{{$exercise->getName()}}" class="form-control" id="nameExercise" name="nameExercise" style="border-radius: 10px;background-color: rgba(255, 255, 255,0.7);" required>
                                    <input type="text" value="{{$exercise->getIdDatabase()}}" hidden id="idDatabase" name="idDatabase">
                                    <input type="text" value="{{$exercise->getGifName()}}" hidden id="gifName" name="gifName">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 col-md-12 col-lg-6">
                                    <label for="fname" class="col-sm-12 text-left control-label col-form-label" style="background-color: transparent; border: none; color: #1F262D">Descrizione</label>
                                    <textarea  class="form-control" id="descriptionExercise" name="descriptionExercise" rows="5" style="border-radius: 10px;background-color: rgba(255, 255, 255,0.7);"required>{{$exercise->getDescription()}}</textarea>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-6">
                                    <label for="fname" class="col-sm-12 text-left control-label col-form-label" style="background-color: transparent; border: none; color: #1F262D">Carica Gif</label>
                                    <input type="file" class="form-control" id="imageExercise" name="imageExercise" style="border-radius: 10px;background-color: rgba(255, 255, 255,0.7);" >
                                    <input type="text" id="oldImageExercise" name="oldImageExercise" hidden  value="{{$exercise->getGif()}}">
                                </div>

                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col-sm-12 col-md-12 col-lg-8">
                                    <label for="fname" class="col-sm-12 text-left control-label col-form-label" style="background-color: transparent; border: none; color: #1F262D">Link esercizio</label>
                                    <input class="form-control" value="{{$exercise->getLink()}}" id="linkExercise" name="linkExercise" style="border-radius: 10px; background-color: rgba(255, 255, 255,0.7);"required>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col-sm-12 col-md-10 col-lg-12">
                                    <div class="form-check" style="text-align: center; margin-top: auto; margin-bottom: auto;">
                                        <input class="form-check-input" <?php if($exercise->getExerciseIsATime()==true){ ?> checked <?php } ?> type="checkbox" name="exerciseIsATime" id="exerciseIsATime" value="TRUE">
                                        <label class="form-check-label" for="fname">
                                            L'esercicio è a tempo?
                                        </label>
                                    </div>
                                </div>
                            </div>
                            </br>
                            <div class="form-group row justify-content-center">
                                <div class="col-md-6">
                                    <p align="center">
                                        <a href="/admin/gestioneEsercizi">
                                            <button type="submit" class="btn btn-danger" style="border-radius: 10px;">Annulla</button>
                                        </a>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p align="center">
                                        <button type="submit" class="btn btn-success" style="border-radius: 10px;">Inserisci Esercizio</button>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
