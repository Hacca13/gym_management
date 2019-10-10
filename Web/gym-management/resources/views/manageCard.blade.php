@extends('layouts.master')

@section('content')


    <div class="row">
        <div class="col-md-12">
            <p>
                <a class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Button with data-target
                </a>
            </p>
            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    <div class="card">
                        <form class="form-horizontal" id="myDIV">
                            <div class="card-body">
                                <h4 class="card-title ">Gestione Scheda</h4>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label"></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="fname" name="name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Scheda Di</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="fname" name="idUserDatabase" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Durata del Corso</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="fname" name="period">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
  </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <form class="form-horizontal" id="myDIV">
                    <div class="card-body">
                        <h4 class="card-title ">Gestione Scheda</h4>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label"></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="fname" name="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Scheda Di</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="fname" name="idUserDatabase" placeholder="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Durata del Corso</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="fname" name="period">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>





@endsection