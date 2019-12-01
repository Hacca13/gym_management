@extends('layouts.master')

@section('content')


    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card" style="border-radius: 10px;margin-bottom: 10%;">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8" style="text-align: left">
                            <h2 class >Inserisci Scheda</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="/" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="fname" class="col-sm-12 text-left control-label col-form-label">Scheda Di:</label>
                                <input type="text" class="form-control" id="fname" name="name" style="border-radius: 10px;background-color: rgba(255, 255, 255,0.7);">
                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="fname" class="col-sm-12 text-left control-label col-form-label">Dal:</label>
                                <input  type="date" class="form-control" id="fname" name="description" rows="5" style="border-radius: 10px;background-color: rgba(255, 255, 255,0.7);"></input>
                            </div>
                            <div class="col-md-6">
                                <label for="fname" class="col-sm-12 text-left control-label col-form-label">Al:</label>
                                <input type="date" class="form-control" id="" name="image" style="border-radius: 10px;background-color: rgba(255, 255, 255,0.7);">
                            </div>

                        </div>


                        <div class="form-group row">
                            <div class="col-sm-9">
                                <button class="btn btn-success" id="fname" name="" style="border-radius: 10px;">Inserisci</button>
                            </div>
                            <div class="col-md-12" style="text-align: end">
                                <!--Pagina precedente-->
                                <a href="/gestioneEsercizi">
                                    <button class="btn btn-danger" id="fname" name="" style="border-radius: 10px;">Annulla</button>
                                </a>
                            </div>
                        </div>
                    </form>

                    <div class="row">

                        <div class="col-md-3" style="border: 1px red dotted">

                        </div>

                    </div>

                    <div class="form-group row">
                        <div class="card" style="background-color: transparent">
                            <div class="card-body">
                                <div class="col-md-5">
                                    <button type="button" class="btn btn-primary margin-5" data-toggle="modal" data-target="#Modal1">Inserisci Esercizio</button>
                                    <div class="modal fade" id="Modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true ">
                                        <div class="modal-dialog" role="document ">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Popup Header</h5>
                                                    <button type="button" id="modalBtn" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true ">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div id="index"></div>
                                                    <script src="{{ asset('js/app.js') }}"></script>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>











@endsection
