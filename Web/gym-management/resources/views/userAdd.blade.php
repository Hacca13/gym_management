@extends('layouts.master')

@section('content')



    <form action="/addUserPost" method="post" enctype="multipart/form-data">
        @csrf


        <div class="row">

            <div class="card col-md-6">
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
                            <input type="email" class="form-control" id="fname" name="email">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="fname" name="password">
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
                            <input type="text" class="form-control" id="fname" name="birthNation">
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
                </div>
            </div>

            <div class="card col-md-6">

                <div class="card-body">

                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Cellulare</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="lname" name="telephone">
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
                            <input type="text" class="form-control" id="lname" name="cap">
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
                            <input type="file" class="form-control" id="cono1" name="documentPicture">
                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <input type="checkbox" onclick="myFunction()"> E' minorenne?</input>
                        </div>
                    </div>
                </div>

            </div>
        </div>




        <div class="row">
            <div class="col-md-6" id="myDIV" style="display: none">
                <div class="card">

                    <div class="card-body">
                        <h4 class="card-title ">Inserisci Dati Genitore</h4>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nome Tutore</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="fname" name="parentName">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Cognome Tutore</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="fname" name="parentSurname">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Sesso Tutore</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="fname" name="parentGender">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Data di Nascita Tutore</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="fname" name="parentDateOfBirth">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Luogo di Nascita Tutore</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="fname" name="parentbirthPlace">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Residenza del Tutore</label>
                            <div class="col-sm-9">
                                <input class="form-control" id="fname" name="parentResidence">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Città di Residenza Tutore</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="fname" name="parentResidence">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Nazione di Residenza Tutore</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="lname" name="parentResidence">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Cap</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="lname" name="parentResidence">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-6" id="myDiv" style="display: none">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="email1" class="col-sm-3 text-right control-label col-form-label">Via</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="email1" name="parentResidence">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Numero Tutore</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="cono1" name="parentResidence">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">E-mail del Tutore</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="cono1" name="profilePicture">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Documento d'Identità del Tutore</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="lname" name="parentDocument">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Imagine Documento d'Identità</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="lname" name="parentDocument">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-3 text-right control-label col-form-label">Tipo di Documento</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="email1" name="parentDocument">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Data di Rilascio</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="cono1" name="parentDocument">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Rilasciato Da</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="cono1" name="parentDocument">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="border-top">
                <div class="card-body">
                    <input type="submit">
                </div>
            </div>

        </div>

    </form>
@endsection
