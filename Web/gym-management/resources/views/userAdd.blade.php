@extends('layouts.master')

@section('content')

    <form action="/addUserPost" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="card col-md-12" style="border-radius: 10px;background-color: #d6d8d8">
                <div class="card-body">
                    <h3 class="card-title text-center">Inserisci Dati Utente</h3>
                    <br>
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
                            <input type="email" class="form-control" id="email" name="email" required>
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
                            <input type="date" class="form-control" oninput="testAge()" id="dateOfBirth" name="dateOfBirth" required>
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
                        <div class="col-sm-2">
                            <input type="radio" class="form-control" id="fname" name="gender" required>
                            <label>Uomo</label>
                            <input type="radio" class="form-control" id="fname" name="gender" required>
                            <label>Donna</label>
                            <input type="radio" class="form-control" id="fname" name="gender" required>
                            <label>Altro</label>
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
                            <input type="text" class="form-control" id="lname" name="cap" required>
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
                            <input type="text" class="form-control" id="cono1" name="number" required>
                        </div>
                    </div>
                </div>

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
                            <input type="date" class="form-control" id="cono1" name="releaseDateDocument" required>
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
                            <input type="file" class="form-control" id="documentImage" name="documentImage" onchange="Filevalidation()" required>
                        </div>
                    </div>
                <hr>
                        <div class="card-body">
                            <input type="checkbox" hidden name="isUnderage" value="TRUE"></input>
                        </div>
                <hr>
                    <h4 class="card-title ">Inserisci Dati Plicometrici</h4>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Peso:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="fname" name="weight" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Altezza:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="fname" name="height" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">IMC:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="email" name="imc" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Sport Praticati Precedentemente:</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="fname" name="previousSport" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Tempo Sport Praticati Precedentemente:</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" oninput="testAge()" id="$previousSportTime" name="dateOfBirth" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Tempo Inattivo:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="fname" name="inactiveTime" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Dati Plicometrici:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="fname" name="pligometricData" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Ipertrofia:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="lname" name="hypertrophy" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Dimagrimento:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="lname" name="slimming" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Tonificazione:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="email1" name="toning" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Allenamento Atletico:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="cono1" name="athleticTraining" required>
                        </div>
                    </div>
                <div class="form-group row">
                    <label for="email1" class="col-sm-3 text-right control-label col-form-label">Riabilitazione:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="email1" name="rehabilitation" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Sport Di Combattimento:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="lname" name="combatSports" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Altri Obiettivi:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="cono1" name="otherGoals" required>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <input type="checkbox" hidden name="isUnderage" value="TRUE"></input>
                    </div>
                </div>
                <div class="form-group">
                    <section class="right-side-dd">
                        <p align="right">
                            <button id="corso" name="acceptTerms" class="btn btn-primary">Inserisci</button>
                        </p>
                    </section>
                </div>
            </div>
            </div>

    <!-- PARENT FORM -->
        <div class="row" id="parentDiv">
            <div class="col-md-6" id="myDIV" style="display: none">
                <div class="card" style="border-radius: 10px;background-color: #d6d8d8">
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
                                <input type="date" class="form-control" id="parentDateOfBirth" name="parentDateOfBirth">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Luogo di Nascita Tutore</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="parentbirthPlace" name="parentbirthPlace">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Città Residenza del Tutore</label>
                            <div class="col-sm-9">
                                <input class="form-control" id="parentResidence" name="parentCityOfResidence">
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
                <div class="card" style="border-radius: 10px;">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="email1" class="col-sm-3 text-right control-label col-form-label">Via</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="parentResidenceStreet" name="parentResidenceStreet">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email1" class="col-sm-3 text-right control-label col-form-label">Cap</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="parentCap" name="parentCap">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Numero Tutore</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="parentTelephoneNumber" name="parentTelephoneNumber">
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
                    </div>

                </div>
            </div>
        </div>

        <!-- SUBMIT/RESET -->
    </form>


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
            if (age < 18) {
               myFunction();
            } else {
                document.getElementById('myDIV').style.display = "none";
                document.getElementById('myDiv').style.display = "none";
            }
        }
    </script>

@endsection
