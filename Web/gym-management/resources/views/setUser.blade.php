@extends('layouts.master')

@section('content')
    <div class="card" style="border-radius: 10px;background-color: rgba(31, 38, 45, 0.8)">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-12" style="text-align: center;">
                    <h1 style="color: #d6d8d8">Inserimento dati utente</h1>
                </div>
                <div class="col-md-12" style="margin-top: 2.5%; padding-top: 15px; background-color: #d6d8d8; border-radius: 10px">
                    <form id="example-form" action="/admin/"   method="post" class="m-t-40" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <h3 id="parentTitle">Dati Utente</h3>
                            <section>
                                <div class="row justify-content-center">
                                    <div class="col-lg-6 col-md-8 col-sm-12">
                                        <label for="fname" class="text-right control-label" style="font-size: 16px;">Nome:</label>
                                        <input type="text" class="form-control" id="fname" name="name" required>
                                        <label for="lname" class="text-right control-label" style="font-size: 16px;">Cognome:</label>
                                        <input type="text" class="form-control" id="lname" name="surname" required>
                                    </div>

                                    <div class="col-lg-6 col-md-8 col-sm-12">
                                        <label for="email" class="text-right control-label" style="font-size: 16px;">E-mail:</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                        <label for="pass" class="text-right control-label" style="font-size: 16px;">Password:</label>
                                        <input type="password" class="form-control" id="pass" name="password" required>
                                        <label for="pass" class="text-right control-label" style="font-size: 16px;">Conferma password:</label>
                                        <input type="password" class="form-control" id="passconf" onchange="testpass()" name="password2" required>
                                    </div>
                                </div>

                                <br>
                                <br>

                                <div class="row justify-content-center">
                                    <div class="col-lg-5 col-md-8 col-sm-12">
                                        <label for="mydatepicker" class="text-right control-label" style="font-size: 16px;">Data di Nascita:</label>
                                        <input type="date" class="form-control mydatepicker" oninput="testAge()" id="dateOfBirth" name="dateOfBirth" required>
                                        <label for="nation" class="text-right control-label" style="font-size: 16px;">Nazionalità di Nascita:</label>
                                        <input type="text" class="form-control" id="nation" name="birthNation" required>
                                    </div>

                                    <div class="col-lg-5 col-md-8 col-sm-12">
                                        <label for="mybirthplace" class="text-right control-label" style="font-size: 16px;">Luogo di Nascita:</label>
                                        <input type="text" class="form-control" id="mybirthplace" name="birthPlace" required>
                                        <label for="fname" class="text-right control-label" style="font-size: 16px;">Cellulare:</label>
                                        <input type="tel" class="form-control" id="lname" name="telephone" required>
                                    </div>

                                </div>

                                <br>
                                <br>

                                <div class="row justify-content-center">
                                    <div class="col-lg-6 col-md-10 col-sm-10">
                                        <label class="">Sesso:</label><br>
                                        <div class="col-sm-12 row">
                                            <div class="custom-control custom-radio col-md-4">
                                                <input type="radio" class="custom-control-input" id="genmale" name="gender" value="Uomo" required>
                                                <label class="custom-control-label" for="genmale">Uomo</label>
                                            </div>
                                            <div class="custom-control custom-radio col-md-4">
                                                <input type="radio" class="custom-control-input" id="genfemale" name="gender" value="Donna" required>
                                                <label class="custom-control-label" for="genfemale">Donna</label>
                                            </div>
                                            <div class="custom-control custom-radio col-md-4">
                                                <input type="radio" checked class="custom-control-input" id="genother" name="gender" value="Altro" required>
                                                <label class="custom-control-label" for="genother">Altro</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <br>

                                <div class="row justify-content-center">
                                    <div class="col-lg-6 col-md-8 col-sm-12">
                                        <label for="fname" class="text-right control-label" style="font-size: 16px;">Città di Residenza:</label>
                                        <input type="text" class="form-control" id="fname" name="cityOfResidence" required>
                                        <label for="nationLive" class="text-right control-label" style="font-size: 16px;">Nazione di Residenza:</label>
                                        <input type="text" class="form-control" id="nationLive" name="nation" required>
                                    </div>
                                    <div class="col-lg-6 col-md-8 col-sm-12">
                                        <label for="cap" class=" text-right control-label" style="font-size: 16px;">Cap:</label>
                                        <input type="text" class="form-control" id="cap" name="cap" required>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <label for="via" class="text-right control-label" style="font-size: 16px;">Via:</label>
                                                <input type="text" class="form-control" id="via" name="street" required>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <label for="numCiv" class="text-right control-label" style="font-size: 16px;">Numero:</label>
                                                <input type="text" class="form-control" id="numCiv" name="number" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <br>

                                <div class="row justify-content-center">
                                    <div class="col-lg-6 col-md-8 col-sm-12">
                                        <label for="documentType" class="text-right control-label" style="font-size: 16px;">Tipo di Documento:</label>
                                        <input type="text" class="form-control" id="email1" name="documentType" required>
                                        <label for="ducumentNumber" class="text-right control-label" style="font-size: 16px;">Numero documento d'Identità:</label>
                                        <input type="text" class="form-control" id="lname" name="documentNumber" required>
                                    </div>

                                    <div class="col-lg-6 col-md-8 col-sm-12">
                                        <label for="documentImage" class="text-right control-label" style="font-size: 16px;">Imagine Documento d'Identità:</label>
                                        <input type="file" class="form-control" id="documentImage" name="documentImage" onchange="Filevalidation()">
                                    </div>
                                </div>

                                <br>

                                <div class="row justify-content-center">
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <label for="releaseDateDocument" class=" text-right control-label" style="font-size: 16px;">Data di Rilascio:</label>
                                        <input type="date" class="form-control" id="cono1" name="releaseDateDocument" required>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <label for="releaserDocument" class="text-right control-label" style="font-size: 16px;">Rilasciato Da:</label>
                                        <input type="text" class="form-control" id="cono1" name="releaserDocument" required>
                                    </div>
                                </div>
                            </section>

                            <h3>Dati Plicometrici</h3>
                            <section>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="weight" class="text-left control-label" style="font-size: 16px;">Peso (kg):</label>
                                        <input type="number" class="form-control" id="weight" oninput="imcCalculation()" name="weight" value=1 required>
                                        <label for="height" class="text-left control-label" style="font-size: 16px;">Altezza (cm):</label>
                                        <input type="number" class="form-control" id="height" oninput="imcCalculation()" name="height" value=1 required>
                                        <br>
                                        <label for="imcLabel" class="text-left control-label" style="font-size: 16px;">IMC:</label>
                                        <br>
                                        <input type="text" hidden class="form-control" id="imc" name="imc">
                                        <label id="imcLabel"></label>
                                        <br>
                                        <label for="previosSport" class="text-left control-label" style="font-size: 16px;">Sport Praticati Precedentemente:</label>
                                        <input type="text" class="form-control" id="previosSport" name="previousSport">
                                        <label for="previousSportTime" class="text-left control-label" style="font-size: 16px;">Tempo Sport Praticati Precedentemente:</label>
                                        <input type="text" class="form-control" id="previousSportTime" name="previousSportTime">
                                        <label for="inactiveTime" class="text-left control-label">Tempo Inattivo:</label>
                                        <input type="text" class="form-control" id="inactiveTime" name="inactiveTime">
                                        <label for="plicometricData" class="text-left control-label" style="font-size: 16px;">Dati Plicometrici:</label>
                                        <input type="text" class="form-control" id="plicometricData" name="plicometricData">
                                    </div>

                                    <br>
                                    <br>

                                    <div class="col-md-6 justify-content-center" style="text-align: center">
                                        <div class="form-group" style="text-align: center" id="">
                                            <label class="text-left control-label" style="font-size: 16px;">Ipertrofia:</label><br>
                                            <div class="row justify-content-center">
                                                <div class="custom-control custom-radio" style="margin-right: 5%;">
                                                    <input type="radio" class="custom-control-input" id="ipertrue" name="hypertrophy" value="true" required>
                                                    <label class="custom-control-label" for="ipertrue">Si</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" checked class="custom-control-input" id="iperfalse" name="hypertrophy" value="false" required>
                                                    <label class="custom-control-label" for="iperfalse">No</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="">
                                            <label class="text-left control-label" style="font-size: 16px;">Dimagrimento:</label><br>
                                            <div class="row justify-content-center">
                                                <div class="custom-control custom-radio" style="margin-right: 5%;">
                                                    <input type="radio" class="custom-control-input" id="slimtrue" name="slimming" value="true" required>
                                                    <label class="custom-control-label" for="slimtrue">Si</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" checked class="custom-control-input" id="slimfalse" name="slimming" value="false" required>
                                                    <label class="custom-control-label" for="slimfalse">No</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="">
                                            <label class="text-left control-label" style="font-size: 16px;">Tonificazione:</label><br>
                                            <div class="row justify-content-center">
                                                <div class="custom-control custom-radio" style="margin-right: 5%">
                                                    <input type="radio" class="custom-control-input" id="toningtrue" name="toning" value="true" required>
                                                    <label class="custom-control-label" for="toningtrue">Si</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" checked class="custom-control-input" id="toningfalse" name="toning" value="false" required>
                                                    <label class="custom-control-label" for="toningfalse">No</label>
                                                </div>
                                            </div>
                                            <div class="form-group" id="">
                                                <label class="text-left control-label" style="font-size: 16px;">Allenamento Atletico:</label><br>
                                                <div class="row justify-content-center">
                                                    <div class="custom-control custom-radio" style="margin-right: 5%">
                                                        <input type="radio" class="custom-control-input" id="atltrue" name="athleticTraining" value="true" required>
                                                        <label class="custom-control-label" for="atltrue">Si</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" checked class="custom-control-input" id="atlfalse" name="athleticTraining" value="false" required>
                                                        <label class="custom-control-label" for="atlfalse">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group" id="">
                                                <label class="text-left control-label" style="font-size: 16px;">Riabilitazione:</label><br>
                                                <div class="row justify-content-center">
                                                    <div class="custom-control custom-radio" style="margin-right: 5%">
                                                        <input type="radio" class="custom-control-input" id="rehatrue" name="rehabilitation" value="true" required>
                                                        <label class="custom-control-label" for="rehatrue">Si</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" checked class="custom-control-input" id="rehafalse" name="rehabilitation" value="false" required>
                                                        <label class="custom-control-label" for="rehafalse">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group" id="">
                                                <label class="text-left control-label" style="font-size: 16px;">Sport di Combattimento:</label><br>
                                                <div class="row justify-content-center">
                                                    <div class="custom-control custom-radio" style="margin-right: 5%">
                                                        <input type="radio" class="custom-control-input" id="comtrue" name="combatSports" value="true" required>
                                                        <label class="custom-control-label" for="comtrue">Si</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" checked class="custom-control-input" id="comfalse" name="combatSports" value="false" required>
                                                        <label class="custom-control-label" for="comfalse">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <br>

                                <div class="row justify-content-center">
                                    <div class="col-md-8 col-lg- col-sm-12">
                                        <label for="goals" class="text-right control-label" style="font-size: 16px;">Altri Obiettivi:</label>
                                        <input type="text" class="form-control" id="goals" name="otherGoals" >
                                        <label for="importantInformation" class="text-right control-label" style="font-size: 16px;">Informazioni Importanti:</label>
                                        <input type="text" class="form-control" id="importantInformation" name="importantInformation">
                                    </div>
                                </div>

                                <div class="form-group" id="">
                                    <label class="text-left control-label" style="font-size: 16px;">Abilitazione a publicare media sui social:</label><br>
                                    <div class="row justify-content-center">
                                        <div class="custom-control custom-radio" style="margin-right: 5%">
                                            <input type="radio" class="custom-control-input" id="socialtrue" name="publicSocial" value="true" required>
                                            <label class="custom-control-label" for="socialtrue">Si</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" checked class="custom-control-input" id="socialfalse" name="publicSocial" value="false" required>
                                            <label class="custom-control-label" for="socialfalse">No</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label for="medicalCertificate" class=" text-right control-label" style="font-size: 16px;">Data di Rilascio certificato medico:</label>
                                        <input type="date" class="form-control" id="cono1" name="medicalCertificate" >
                                    </div>
                                </div>


                            </section>

                            <div class="card-body">
                                <input type="text" id="isUnderage" hidden name="isUnderage" value='false' required></input>
                            </div>

                            <h3 id="parentTitle">Dati Tutore</h3>
                            <section id="parentData">
                                <div id="myDiv">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <lababel for="parentName" class="text-left control-label" style="font-size: 16px;">Nome tutore:</label>
                                            <input type="text" class="form-control" id="parentName" name="parentName" value="">
                                            <label for="parentSurname" class="text-left control-label" style="font-size: 16px;">Cognome tutore:</label>
                                            <input type="text" class="form-control" id="parentSurname" name="parentSurname" value="">
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12" style="text-align: center">
                                            <label class="text-left control-label" style="font-size: 16px">Sesso:</label><br>
                                            <div class="row justify-content-center">
                                                <div class="custom-control custom-radio" style="margin-right: 5%">
                                                    <input type="radio" class="custom-control-input" id="gemale" name="parentGender" value="Uomo" >
                                                    <label class="custom-control-label" for="gemale">Uomo</label>
                                                </div>

                                                <div class="custom-control custom-radio" style="margin-right: 5%">
                                                    <input type="radio" class="custom-control-input" id="gefemale" name="parentGender" value="Donna">
                                                    <label class="custom-control-label" for="gefemale">Donna</label>
                                                </div>

                                                <div class="custom-control custom-radio">
                                                    <input type="radio" checked class="custom-control-input" id="geother" name="parentGender" value="Altro">
                                                    <label class="custom-control-label" for="geother">Altro</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <br>
                                    <br>

                                    <div class="row justify-content-center">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <label for="fname" class="text-left control-label" style="font-size: 16px;">Data di nascita tutore:</label>
                                            <input type="date" class="form-control" id="parentDateOfBirth" name="parentDateOfBirth" >
                                            <label for="fname" class="text-left control-label" style="font-size: 16px;">Nazione di nascita tutore:</label>
                                            <input type="text" class="form-control" id="parentBirthNation" name="parentBirthNation" >
                                            <label for="fname" class="text-left control-label" style="font-size: 16px;">Luogo di nascita tutore:</label>
                                            <input type="text" class="form-control" id="parentBirthPlace" name="parentBirthPlace" value="">
                                        </div>
                                    </div>

                                    <br>
                                    <br>

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <label for="lname" class="text-left control-label" style="font-size: 16px;">Nazione di residenza tutore:</label>
                                            <input type="text" class="form-control" id="parentNation" name="parentNation" value="">
                                            <label for="fname" class="text-left control-label" style="font-size: 16px;">Città residenza del tutore:</label>
                                            <input class="form-control" id="parentCityOfResidence" name="parentCityOfResidence" value="">
                                            <label for="lname" cclass="text-left control-label" style="font-size: 16px;">Cap:</label>
                                            <input type="text" class="form-control" id="parentCap" name="parentCap" value="">
                                            <label for="email1" class="text-left control-label" style="font-size: 16px;">Via:</label>
                                            <input type="text" class="form-control" id="parentResidenceStreet" name="parentResidenceStreet" value="">
                                            <label for="email1" class="text-left control-label" style="font-size: 16px;">Numero civico:</label>
                                            <input type="text" class="form-control" id="parentResidenceNumber" name="parentResidenceNumber" value="">
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <label for="cono1" class="text-left control-label" style="font-size: 16px;">Numero cellulare tutore:</label>
                                            <input type="text" class="form-control" id="parentTelephoneNumber" name="parentTelephoneNumber" value="">
                                            <label for="cono1" class="text-left control-label" style="font-size: 16px;">E-mail del tutore:</label>
                                            <input type="email" class="form-control" id="parentEmail" name="parentEmail" value="pippo@gmail.com">
                                        </div>
                                    </div>

                                    <br>
                                    <br>

                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <label for="email1" class="text-left control-label" style="font-size: 16px;">Tipo di documento:</label>
                                            <input type="text" class="form-control" id="parentDocumentType" name="parentDocumentType" value="">
                                            <label for="cono1" class="text-left control-label" style="font-size: 16px;">Numero documento d'Identità del Tutore:</label>
                                            <input type="text" class="form-control" id="parentDocumentNumber" name="parentDocumentNumber" value="">
                                        </div>

                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <label for="lname" class="text-left control-label" style="font-size: 16px;">Imagine documento d'identità:</label>
                                                    <input type="text" class="form-control" id="parentDocumentImage" name="parentDocumentImage" value="">
                                                </div>

                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <label for="cono1" class="text-left control-label" style="font-size: 16px;">Data di rilascio:</label>
                                                    <input type="date" class="form-control" id="parentDocumentReleaseDate" name="parentDocumentReleaseDate" value="12/12/2001">
                                                    <label for="cono1" class="text-left control-label" style="font-size: 16px;">Rilasciato da:</label>
                                                    <input type="text" class="form-control" id="parentDocumentReleaser" name="parentDocumentReleaser" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        function testAge() {
            let birthDateString = document.getElementById('dateOfBirth').value;
            var today = new Date();
            var birthDate = new Date(birthDateString);
            var age = today.getFullYear() - birthDate.getFullYear();
            var m = today.getMonth() - birthDate.getMonth();
            var myDiv = document.getElementById("myDiv");



            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }

            if (age >= 18) {

                document.getElementById('isUnderage').value = 'false';

                document.getElementById('steps-uid-0-t-2').style.display = "none";
                document.getElementById('parentDocumentImage').type = "text";

                myDiv.style.display = "none";
                document.getElementById('parentName').required = false;
                document.getElementById('parentSurname').required = false;
                document.getElementById('parentDateOfBirth').required = false;
                document.getElementById('parentBirthNation').required = false;
                document.getElementById('parentBirthPlace').required = false;
                document.getElementById('parentNation').required = false;
                document.getElementById('parentCityOfResidence').required = false;
                document.getElementById('parentCap').required = false;
                document.getElementById('parentResidenceStreet').required = false;
                document.getElementById('parentResidenceNumber').required = false;
                document.getElementById('parentTelephoneNumber').required = false;
                document.getElementById('parentEmail').required = false;
                document.getElementById('parentDocumentType').required = false;
                document.getElementById('parentDocumentNumber').required = false;
                document.getElementById('parentDocumentImage').required = false;
                document.getElementById('parentDocumentReleaseDate').required = false;
                document.getElementById('parentDocumentReleaser').required = false;

            } else{

                document.getElementById('isUnderage').value = 'true';


                document.getElementById('parentDocumentImage').type = "file";
                document.getElementById('steps-uid-0-t-2').style.display = "block";
                myDiv.style.display = "block";
                document.getElementById('parentName').required = true;
                document.getElementById('parentSurname').required = true;
                document.getElementById('parentDateOfBirth').required = true;
                document.getElementById('parentBirthNation').required = true;
                document.getElementById('parentBirthPlace').required = true;
                document.getElementById('parentNation').required = true;
                document.getElementById('parentCityOfResidence').required = true;
                document.getElementById('parentCap').required = true;
                document.getElementById('parentResidenceStreet').required = true;
                document.getElementById('parentResidenceNumber').required = true;
                document.getElementById('parentTelephoneNumber').required = true;
                document.getElementById('parentEmail').required = true;
                document.getElementById('parentEmail').value = "";
                document.getElementById('parentDocumentType').required = true;
                document.getElementById('parentDocumentNumber').required = true;
                document.getElementById('parentDocumentReleaseDate').required = true;
                document.getElementById('parentDocumentReleaser').required = true;
            }
        }

        function imcCalculation(){
            var weight = document.getElementById('weight').value;
            var height = document.getElementById('height').value;
            height = height/100;
            height = height * height;
            var imc = weight/height;
            imc = imc.toFixed(2);
            document.getElementById('imcLabel').innerHTML = imc;
            document.getElementById('imc').value = imc;

        }

        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear();
        if(dd<10){
            dd='0'+dd
        }
        if(mm<10){
            mm='0'+mm
        }

        today = yyyy+'-'+mm+'-'+dd;
        document.getElementById("dateOfBirth").setAttribute("max", today);
        document.getElementById("releaseDateDocument").setAttribute("max", today);
        document.getElementById("parentDocumentReleaseDate").setAttribute("max", today);
        document.getElementById("parentDateOfBirth").setAttribute("max", today);



    </script>

    <script language="Javascript" type="text/javascript">

        function testpass(){

            pass = document.getElementById("pass");
            passconf = document.getElementById("passconf");
            if (passconf.value !== ""){
              // Verifico che il campo password sia valorizzato in caso contrario
              // avverto dell'errore tramite un Alert
              if (pass.value === ""){
                  alert("Errore: inserire una password!")
                  pass.focus()
              }
              // Verifico che le due password siano uguali, in caso contrario avverto
              // dell'errore con un Alert
              if ((pass.value !== passconf.value) && (pass.value !== "")) {
                  alert("La password inserita non coincide!")
                  passconf.focus()

              }
            }


        }

    </script>

@endsection
