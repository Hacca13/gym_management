@extends('layouts.master')

@section('content')

    <form action="/addUserPost" method="post" enctype="multipart/form-data">
    @csrf
    <!-- USER FORM -->

        <div class="row">

            <div class="card col-md-6">
                <div class="card-body">
                    <h4 class="card-title ">Inserisci Dati Utente</h4>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nome</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="fname" name="name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Cognome</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="fname" name="surname" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">E-mail</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="fname" name="email" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="fname" name="password" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Data di Nascita</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="fname" name="dateOfBirth" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Luogo di Nascita</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="fname" name="birthPlace" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nazionalità di Nascita</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="fname" name="birthNation" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Sesso</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="fname" name="gender" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Città di Residenza</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="fname" name="cityOfResidence" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Cellulare</label>
                        <div class="col-sm-9">
                            <input type="tel" class="form-control" id="lname" name="telephone" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Nazione di Residenza</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="lname" name="nation" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Cap</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="lname" name="cap" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Via</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="email1" name="street" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Numero</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="cono1" name="number" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Immagine</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" id="cono1" name="profilePicture" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card col-md-6">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Tipo di Documento</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="email1" name="documentType" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Numero documento d'Identità</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="lname" name="documentNumber" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Data di Rilascio</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="cono1" name="releaseDateDocument" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Rilasciato Da</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="cono1" name="releaserDocument" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Imagine Documento d'Identità</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" id="lname" name="documentPicture" required>
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

        <!-- PARENT FORM -->

        <div class="row">
            <div class="col-md-6" id="myDIV" style="display: none">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title ">Inserisci Dati Genitore</h4>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nome Tutore</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="parentName" name="parentName">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Cognome Tutore</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="parentSurname" name="parentSurname">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Sesso Tutore</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="parentGender" name="parentGender">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Data di Nascita Tutore</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="parentDateOfBirth" name="parentDateOfBirth">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Luogo di Nascita Tutore</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="parentbirthPlace" name="parentbirthPlace">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Residenza del Tutore</label>
                            <div class="col-sm-9">
                                <input class="form-control" id="parentResidence" name="parentResidence">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Nazione di Residenza Tutore</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="parentNation" name="parentNation">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Cap</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="parentCap" name="parentCap">
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
                                <input type="text" class="form-control" id="parentStreet" name="parentStreet">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email1" class="col-sm-3 text-right control-label col-form-label">Cap</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="parentCap" name="parentCap">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Numero Tutore</label>
                            <div class="col-sm-9">
                                <input type="tel" class="form-control" id="parentTelephone" name="parentTelephone">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">E-mail del Tutore</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="parentEmail" name="parentEmail">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Numero documento d'Identità del Tutore</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="parentDocumentNumber" name="parentDocumentNumber">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label">Imagine Documento d'Identità</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="parentDocumentImage" name="parentDocumentImage">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-3 text-right control-label col-form-label">Tipo di Documento</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="parentDocumentType" name="parentDocumentType">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Data di Rilascio</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="parentDocumentReleaseDate" name="parentDocumentReleaseDate">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Rilasciato Da</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="parentDocumentReleaser" name="parentDocumentReleaser">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- SUBMIT/RESET -->

        <div class="row">
            <div class="border-top">
                <div class="card-body">
                    <input type="submit">
                </div>
            </div>
        </div>
    </form>
@endsection
