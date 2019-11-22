@extends('layouts.master')

@section('content')
    <div class="card" style="border-radius: 10px;background-color: rgb(31, 38, 45, 0.8)">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-12" style="text-align: center;">
                    <h1 style="color: #d6d8d8">Inserimento dati utente</h1>
                </div>
                <div class="col-md-12" style="margin-top: 2.5%">
                    <form id="example-form" action="/addUserPost"  method="post" class="m-t-40" enctype="multipart/form-data">
                        @csrf
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
                                        <label for="fname" class="text-right control-label col-form-label">Conferma Password:</label>
                                        <input type="password" class="form-control" id="fname" name="password" required>
                                        <label for="fname" class="text-right control-label col-form-label">Data di Nascita:</label>
                                        <input type="date" class="form-control mydatepicker" oninput="testAge()" id="dateOfBirth" name="dateOfBirth" required>
                                        <label for="fname" class="text-right control-label col-form-label">Nazionalità di Nascita:</label>
                                        <input type="text" class="form-control" id="fname" name="birthNation" required>
                                        <label for="fname" class="text-right control-label col-form-label">Luogo di Nascita:</label>
                                        <input type="text" class="form-control" id="fname" name="birthPlace" required>
                                        <div class="form-group" id="">
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
                                        <div class="col-md-12 col-form-label control-label ">
                                            <select class="select2 form-control" id="select" name="" style="width: 100%; height:36px; ">
                                                <option>Carta D'Identità</option>
                                                <option>Patente</option>
                                            </select>
                                        </div>
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
                                        <input type="text" id="isUnderage" hidden name="isUnderage" value='false' required></input>
                                    </div>
                                </div>
                            </section>
                            <h3>Dati Plicometrici</h3>
                            <section>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="fname" class="text-right control-label col-form-label">Peso (kg):</label>
                                        <input type="number" class="form-control" id="weight" oninput="imcCalculation()" name="weight" value=1 required>
                                        <label for="fname" class="text-right control-label col-form-label">Altezza (cm):</label>
                                        <input type="number" class="form-control" id="height" oninput="imcCalculation()" name="height" value=1 required>
                                        <label for="fname" class="text-right control-label col-form-label">IMC:</label>
                                        <label for="fname" class="text-right control-label col-form-label" id="imcLabel" ></label>
                                        <br>
                                        <input type="text" hidden class="form-control" id="imc" name="imc" required>
                                        <label for="fname" class="text-right control-label col-form-label">Sport Praticati Precedentemente:</label>
                                        <input type="text" class="form-control" id="fname" name="previousSport" required>
                                        <label for="fname" class="text-right control-label col-form-label">Tempo Sport Praticati Precedentemente:</label>
                                        <input type="text" class="form-control" id="previousSportTime" name="previousSportTime" required>
                                        <label for="fname" class="text-right control-label col-form-label">Tempo Inattivo:</label>
                                        <input type="text" class="form-control" id="fname" name="inactiveTime" required>
                                        <label for="fname" class="text-right control-label col-form-label">Dati Plicometrici:</label>
                                        <input type="text" class="form-control" id="plicometricData" name="plicometricData" required>
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
                                            <label for="cono1" class="text-right control-label col-form-label">Informazioni Importanti:</label>
                                            <input type="text" class="form-control" id="importantInformation" name="importantInformation" required>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <h3 id="parentTitle">Dati Tutore</h3>
                            <section id="parentData">
                                <div id="myDiv" style="display: none">
                                    <label for="fname" class="text-right control-label col-form-label">Nome Tutore:</label>
                                    <input type="text" class="form-control" id="parentName" name="parentName" value="">
                                    <label for="fname" class="text-right control-label col-form-label">Cognome Tutore:</label>
                                    <input type="text" class="form-control" id="parentSurname" name="parentSurname" value="">
                                    <div class="form-group" id="">
                                        <label class="">Sesso:</label><br>
                                        <div class="col-sm-5 row">
                                            <div class="custom-control custom-radio col-md-5">
                                                <input type="radio" class="custom-control-input" id="gemale" name="parentGender" value="Uomo" >
                                                <label class="custom-control-label" for="gemale">Uomo</label>
                                            </div>
                                            <div class="custom-control custom-radio col-md-5">
                                                <input type="radio" class="custom-control-input" id="gefemale" name="parentGender" value="Donna">
                                                <label class="custom-control-label" for="gefemale">Donna</label>
                                            </div>
                                            <div class="custom-control custom-radio col-md-5">
                                                <input type="radio" checked class="custom-control-input" id="geother" name="parentGender" value="Altro">
                                                <label class="custom-control-label" for="geother">Altro</label>
                                            </div>
                                        </div>
                                    </div>
                                    <label for="fname" class="text-right control-label col-form-label">Data di Nascita Tutore:</label>
                                    <input type="date" class="form-control" id="parentDateOfBirth" name="parentDateOfBirth" value="12/12/1995">
                                    <label for="fname" class="text-right control-label col-form-label">Nazione di Nascita Tutore:</label>
                                    <input type="text" class="form-control" id="parentBirthNation" name="parentBirthNation" value="12/12/1995">
                                    <label for="fname" class="text-right control-label col-form-label">Luogo di Nascita Tutore:</label>
                                    <input type="text" class="form-control" id="parentBirthPlace" name="parentBirthPlace" value="">
                                    <label for="lname" class="text-right control-label col-form-label">Nazione di Residenza Tutore:</label>
                                    <input type="text" class="form-control" id="parentNation" name="parentNation" value="">
                                    <label for="fname" class="text-right control-label col-form-label">Città Residenza del Tutore:</label>
                                    <input class="form-control" id="parentCityOfResidence" name="parentCityOfResidence" value="">
                                    <label for="lname" class=" text-right control-label col-form-label">Cap:</label>
                                    <input type="text" class="form-control" id="parentCap" name="parentCap" value="">
                                    <label for="email1" class="text-right control-label col-form-label">Via:</label>
                                    <input type="text" class="form-control" id="parentResidenceStreet" name="parentResidenceStreet" value="">
                                    <label for="email1" class="text-right control-label col-form-label">Numero Civico:</label>
                                    <input type="text" class="form-control" id="parentResidenceNumber" name="parentResidenceNumber" value="">
                                    <label for="cono1" class="text-right control-label col-form-label">Numero Cellulare Tutore:</label>
                                    <input type="text" class="form-control" id="parentTelephoneNumber" name="parentTelephoneNumber" value="">
                                    <label for="cono1" class="text-right control-label col-form-label">E-mail del Tutore:</label>
                                    <input type="email" class="form-control" id="parentEmail" name="parentEmail" value="pippo@gmail.com">
                                    <label for="email1" class="text-right control-label col-form-label">Tipo di Documento:</label>
                                    <input type="text" class="form-control" id="parentDocumentType" name="parentDocumentType" value="">
                                    <label for="cono1" class="text-right control-label col-form-label">Numero documento d'Identità del Tutore:</label>
                                    <input type="text" class="form-control" id="parentDocumentNumber" name="parentDocumentNumber" value="">
                                    <label for="lname" class="text-right control-label col-form-label">Imagine Documento d'Identità:</label>
                                    <input type="text" class="form-control" id="parentDocumentImage" name="parentDocumentImage" value="">

                                    <label for="cono1" class="text-right control-label col-form-label">Data di Rilascio:</label>
                                    <input type="date" class="form-control" id="parentDocumentReleaseDate" name="parentDocumentReleaseDate" value="12/12/2001">
                                    <label for="cono1" class="text-right control-label col-form-label">Rilasciato da:</label>
                                    <input type="text" class="form-control" id="parentDocumentReleaser" name="parentDocumentReleaser" value="">
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

            if (age > 18) {

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
                  document.getElementById('parentDocumentImage').required = true;
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

@endsection
