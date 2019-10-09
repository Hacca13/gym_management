@extends('layouts.master')

@section('content')



    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <form class="form-horizontal">
                    <div class="card-body">
                        <h4 class="card-title ">Inserisci Dati Utente</h4>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nome</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="fname" name="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Cognome</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="fname" name="surname">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">E-mail</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="fname" name="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Data di Nascita</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="fname" name="dateOfBirth">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Luogo di Nascita</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="fname" name="birthPlace">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nazionalità di Nascita</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="fname" name="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Sesso</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="fname" name="gender">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Città di Residenza</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="fname" name="cityOfResidence">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Nazione di Residenza</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="lname" name="nation">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Cap</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="lname" name="cap">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-3 text-right control-label col-form-label">Via</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="email1" name="street">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Numero</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="cono1" name="number">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Documento d'Identità</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="cono1" name="profilePicture">
                            </div>
                        </div>
                    <div class="border-top">
                        <div class="card-body">
                            <button type="button" class="btn btn-success">Inserisci</button>
                        </div>
                    </div>
                </form>
            </div>



@endsection