@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form class="form-horizontal">
                    <div class="card-body">
                        <h4 class="card-title ">Nuova Scheda</h4>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Scheda di: </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="fname" name="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Ripetizione Settimanale: </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="fname" name="instructor">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Durata del Corso</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="fname" name="period">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Immagine del Corso</label>
                            <div class="col-sm-4">
                                <input type="file" class="form-control" id="fname" name="image">
                            </div>
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <button type="button" class="btn btn-success">Inserisci Corso</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
