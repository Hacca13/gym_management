@extends('layouts.master')

@section('content')


    <div class="container-fluid">
        <div class="card col-md-12" style="border-radius: 10px;background-color: #d6d8d8">
            <div class="card-body wizard-content">
                <h2 class="card-title text-center" >Inserimento Dati Utente</h2>
                <br>
                <h6 class="card-subtitle"></h6>
                <form id="example-form" action="#" class="m-t-40">
                    <div>
                        <h3>Dati Utente</h3>
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="fname" class="text-right control-label col-form-label">Nome:</label>
                                    <input type="text" class="form-control" id="fname" name="name" required>
                                    <label for="fname" class="text-right control-label col-form-label">Cognome:</label>
                                    <input type="text" class="form-control" id="fname" name="surname" required>
                                    <label for="fname" class="text-right control-label col-form-label">E-mail:</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                    <label for="fname" class="text-right control-label col-form-label">Password:</label>
                                    <input type="password" class="form-control" id="fname" name="password" required>
                                    <label for="fname" class="text-right control-label col-form-label">Data di Nascita:</label>
                                    <input type="date" class="form-control mydatepicker" oninput="testAge()" id="dateOfBirth" name="dateOfBirth" required>
                                    <label for="fname" class="text-right control-label col-form-label">Nazionalità di Nascita:</label>
                                    <input type="text" class="form-control" id="fname" name="birthNation" required>
                                    <div class="form-group" id="">
                                        <label class="">Sesso:</label><br>
                                        <div class="col-sm-5 row">
                                            <div class="custom-control custom-radio col-md-5">
                                                <input type="radio" class="custom-control-input" id="genmale" name="gender" required>
                                                <label class="custom-control-label" for="genmale">Uomo</label>
                                            </div>
                                            <div class="custom-control custom-radio col-md-5">
                                                <input type="radio" class="custom-control-input" id="genfemale" name="gender" required>
                                                <label class="custom-control-label" for="genfemale">Donna</label>
                                            </div>
                                            <div class="custom-control custom-radio col-md-5">
                                                <input type="radio" class="custom-control-input" id="genother" name="gender" required>
                                                <label class="custom-control-label" for="genother">Altro</label>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <label for="fname" class="text-right control-label col-form-label">Città di Residenza:</label>
                                    <input type="text" class="form-control" id="fname" name="cityOfResidence" required>
                                    <label for="lname" class="text-right control-label col-form-label">Cellulare:</label>
                                    <input type="tel" class="form-control" id="lname" name="telephone" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="lname" class="text-right control-label col-form-label">Nazione di Residenza:</label>
                                    <input type="text" class="form-control" id="lname" name="nation" required>
                                    <label for="lname" class=" text-right control-label col-form-label">Cap:</label>
                                    <input type="text" class="form-control" id="lname" name="cap" required>
                                    <label for="email1" class="text-right control-label col-form-label">Via:</label>
                                    <input type="text" class="form-control" id="email1" name="street" required>
                                    <label for="cono1" class="text-right control-label col-form-label">Numero:</label>
                                    <input type="text" class="form-control" id="cono1" name="number" required>
                                    <label for="email1" class="text-right control-label col-form-label">Tipo di Documento:</label>
                                    <input type="text" class="form-control" id="email1" name="documentType" required>
                                    <label for="cono1" class="text-right control-label col-form-label">Numero documento d'Identità:</label>
                                    <input type="text" class="form-control" id="lname" name="documentNumber" required>
                                    <label for="cono1" class=" text-right control-label col-form-label">Data di Rilascio:</label>
                                    <input type="date" class="form-control" id="cono1" name="releaseDateDocument" required>
                                    <label for="cono1" class="text-right control-label col-form-label">Rilasciato Da:</label>
                                    <input type="text" class="form-control" id="cono1" name="releaserDocument" required>
                                    <label for="lname" class="text-right control-label col-form-label">Imagine Documento d'Identità:</label>
                                    <input type="file" class="form-control" id="documentImage" name="documentImage" onchange="Filevalidation()" required>
                                </div>
                                <hr>
                                <div class="card-body">
                                    <input type="checkbox" hidden name="isUnderage" value="TRUE"></input>
                                </div>
                            </div>
                        </section>
                        <h3>Dati Plicometrici</h3>
                        <section>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="fname" class="text-right control-label col-form-label">Peso:</label>
                                    <input type="text" class="form-control" id="fname" name="weight" required>
                                    <label for="fname" class="text-right control-label col-form-label">Altezza:</label>
                                    <input type="text" class="form-control" id="fname" name="height" required>
                                    <label for="fname" class="text-right control-label col-form-label">IMC:</label>
                                    <input type="text" class="form-control" id="email" name="imc" required>
                                    <label for="fname" class="text-right control-label col-form-label">Sport Praticati Precedentemente:</label>
                                    <input type="text" class="form-control" id="fname" name="previousSport" required>
                                    <label for="fname" class="text-right control-label col-form-label">Tempo Sport Praticati Precedentemente:</label>
                                    <input type="text" class="form-control" id="$previousSportTime" name="previousSportTime" required>
                                    <label for="fname" class="text-right control-label col-form-label">Tempo Inattivo:</label>
                                    <input type="text" class="form-control" id="fname" name="inactiveTime" required>
                                    <label for="fname" class="text-right control-label col-form-label">Dati Plicometrici:</label>
                                    <input type="text" class="form-control" id="$previousSportTime" name="plicometricData" required>
                                </div>
                                <br>
                                <div class="col-md-6">
                                    <div class="form-group" id="">
                                        <label class="">Ipertrofia:</label><br>
                                        <div class="col-sm-5 row">
                                            <div class="custom-control custom-radio col-md-5">
                                                <input type="radio" class="custom-control-input" id="ipertrue" name="hypertrophy" required>
                                                <label class="custom-control-label" for="ipertrue">Si</label>
                                            </div>
                                            <div class="custom-control custom-radio col-md-5">
                                                <input type="radio" checked class="custom-control-input" id="iperfalse" name="hypertrophy" required>
                                                <label class="custom-control-label" for="iperfalse">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" id="">
                                        <label class="">Dimagrimento:</label><br>
                                        <div class="col-sm-5 row">
                                            <div class="custom-control custom-radio col-md-5">
                                                <input type="radio" class="custom-control-input" id="slimtrue" name="slimming" required>
                                                <label class="custom-control-label" for="slimtrue">Si</label>
                                            </div>
                                            <div class="custom-control custom-radio col-md-5">
                                                <input type="radio" checked class="custom-control-input" id="slimfalse" name="slimming" required>
                                                <label class="custom-control-label" for="slimfalse">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" id="">
                                        <label class="">Tonificazione:</label><br>
                                        <div class="col-sm-5 row">
                                            <div class="custom-control custom-radio col-md-5">
                                                <input type="radio" class="custom-control-input" id="toningtrue" name="toning" required>
                                                <label class="custom-control-label" for="toningtrue">Si</label>
                                            </div>
                                            <div class="custom-control custom-radio col-md-5">
                                                <input type="radio" checked class="custom-control-input" id="toningfalse" name="toning" required>
                                                <label class="custom-control-label" for="toningfalse">No</label>
                                            </div>
                                        </div>
                                        <div class="form-group" id="">
                                            <label class="">Allenamento Atletico:</label><br>
                                            <div class="col-sm-5 row">
                                                <div class="custom-control custom-radio col-md-5">
                                                    <input type="radio" class="custom-control-input" id="atltrue" name="athleticTraining" required>
                                                    <label class="custom-control-label" for="atltrue">Si</label>
                                                </div>
                                                <div class="custom-control custom-radio col-md-5">
                                                    <input type="radio" checked class="custom-control-input" id="atlfalse" name="athleticTraining" required>
                                                    <label class="custom-control-label" for="atlfalse">No</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="">
                                            <label class="">Riabilitazione:</label><br>
                                            <div class="col-sm-5 row">
                                                <div class="custom-control custom-radio col-md-5">
                                                    <input type="radio" class="custom-control-input" id="rehatrue" name="rehabilitation" required>
                                                    <label class="custom-control-label" for="rehatrue">Si</label>
                                                </div>
                                                <div class="custom-control custom-radio col-md-5">
                                                    <input type="radio" checked class="custom-control-input" id="rehafalse" name="rehabilitation" required>
                                                    <label class="custom-control-label" for="rehafalse">No</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="">
                                            <label class="">Sport di Combattimento:</label><br>
                                            <div class="col-sm-5 row">
                                                <div class="custom-control custom-radio col-md-5">
                                                    <input type="radio" class="custom-control-input" id="comtrue" name="combatSports" required>
                                                    <label class="custom-control-label" for="comtrue">Si</label>
                                                </div>
                                                <div class="custom-control custom-radio col-md-5">
                                                    <input type="radio" checked class="custom-control-input" id="comfalse" name="combatSports" required>
                                                    <label class="custom-control-label" for="comfalse">No</label>
                                                </div>
                                            </div>
                                        </div>
                                        <label for="cono1" class="text-right control-label col-form-label">Altri Obiettivi:</label>
                                        <input type="text" class="form-control" id="cono1" name="otherGoals" required>
                                        <div class="border-top">
                                            <div class="card-body">
                                                <input type="checkbox" hidden name="isUnderage" value="TRUE"></input>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <h3>Dati Tutore</h3>
                        <section>
                        <div id="myDiv" style="display: none">
                            <label for="fname" class="text-right control-label col-form-label">Nome Tutore:</label>
                            <input type="text" class="form-control" id="parentName" name="parentName" value="">
                            <label for="fname" class="text-right control-label col-form-label">Cognome Tutore:</label>
                            <input type="text" class="form-control" id="parentSurname" name="parentSurname" value="">
                            <div class="form-group" id="">
                                <label class="">Sesso:</label><br>
                                <div class="col-sm-5 row">
                                    <div class="custom-control custom-radio col-md-5">
                                        <input type="radio" class="custom-control-input" id="gemale" name="parentGender" >
                                        <label class="custom-control-label" for="gemale">Uomo</label>
                                    </div>
                                    <div class="custom-control custom-radio col-md-5">
                                        <input type="radio" class="custom-control-input" id="gefemale" name="parentGender" >
                                        <label class="custom-control-label" for="gefemale">Donna</label>
                                    </div>
                                    <div class="custom-control custom-radio col-md-5">
                                        <input type="radio" checked class="custom-control-input" id="geother" name="parentGender" >
                                        <label class="custom-control-label" for="geother">Altro</label>
                                    </div>
                                </div>
                            </div>
                            <label for="fname" class="text-right control-label col-form-label">Data di Nascita Tutore:</label>
                            <input type="date" class="form-control" id="parentDateOfBirth" name="parentDateOfBirth" value="12/12/1995">
                            <label for="fname" class="text-right control-label col-form-label">Luogo di Nascita Tutore:</label>
                            <input type="text" class="form-control" id="parentbirthPlace" name="parentbirthPlace" value="">
                            <label for="fname" class="text-right control-label col-form-label">Città Residenza del Tutore:</label>
                            <input class="form-control" id="parentResidence" name="parentCityOfResidence" value="">
                            <label for="lname" class="text-right control-label col-form-label">Nazione di Residenza Tutore:</label>
                            <input type="text" class="form-control" id="parentNation" name="parentNation" value="">
                            <label for="lname" class=" text-right control-label col-form-label">Cap:</label>
                            <input type="number" class="form-control" id="parentCap" name="parentCap" value="">
                            <label for="email1" class="text-right control-label col-form-label">Via:</label>
                            <input type="text" class="form-control" id="parentResidenceStreet" name="parentResidenceStreet" value="">
                            <label for="email1" class="text-right control-label col-form-label">Cap:</label>
                            <input type="text" class="form-control" id="parentCap" name="parentCap" value="">
                            <label for="cono1" class="text-right control-label col-form-label">Numero Tutore:</label>
                            <input type="text" class="form-control" id="parentTelephoneNumber" name="parentTelephoneNumber" value="">
                            <label for="cono1" class="text-right control-label col-form-label">E-mail del Tutore:</label>
                            <input type="email" class="form-control" id="parentEmail" name="parentEmail" value="pippo@gmail.com">
                            <label for="cono1" class="text-right control-label col-form-label">Numero documento d'Identità del Tutore:</label>
                            <input type="text" class="form-control" id="parentDocumentNumber" name="parentDocumentNumber" value="">
                            <label for="lname" class="text-right control-label col-form-label">Imagine Documento d'Identità:</label>
                            <input type="text" class="form-control" id="parentDocumentImage" name="parentDocumentImage" value="">
                            <label for="email1" class="text-right control-label col-form-label">Tipo di Documento:</label>
                            <input type="text" class="form-control" id="parentDocumentType" name="parentDocumentType" value="">
                            <label for="cono1" class="text-right control-label col-form-label">Data di Rilascio:</label>
                            <input type="date" class="form-control" id="parentDocumentReleaseDate" name="parentDocumentReleaseDate" value="12/12/2001">
                            <label for="cono1" class="text-right control-label col-form-label">Rilasciato da:</label>
                            <input type="text" class="form-control" id="parentDocumentReleaser" name="parentDocumentReleaser" value="">
                        </div>
                        </section>
                        <h3>Completa</h3>
                        <section>
                            <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required">
                            <label for="acceptTerms">I agree with the Terms and Conditions.</label>
                        </section>
                    </div>
                </form>
            </div>
        </div>

        <script>
            function testAge() {
                let birthDateString = document.getElementById('dateOfBirth').value;
                var today = new Date();
                var birthDate = new Date(birthDateString);
                var age = today.getFullYear() - birthDate.getFullYear();
                var m = today.getMonth() - birthDate.getMonth();



                if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                    age--;
                }
                if (age > 18) {
                    document.getElementById('steps-uid-0-t-2').style.display = "none";
                    myFunction();

                } else{
                    document.getElementById('parentDocumentImage').type = "file";
                    document.getElementById('steps-uid-0-t-2').style.display = "block";
                }
            }
        </script>




@endsection
