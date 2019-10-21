<div class="col-md-12">
<form action="/" method="get" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-6" style="border: 1px red solid">
            <div class="card-body">
                <h4 class="card-title ">Informazioni Utente</h4>
                <div class="form-group row">
                    <div class="col-sm-9">
                        <label for="fname" class="col-sm-6 text-left control-label col-form-label" style="font-family: bold">Nome:</label>
                        <label>{{$user->getName()}}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-9">
                        <label for="fname" class="col-sm-6 text-left control-label col-form-label" style="font-family: bold">Cognome:</label>
                        <label>{{$user->getSurname()}}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-9">
                        <label for="fname" class="col-sm-6 text-left control-label col-form-label" style="font-family: bold">E-Mail:</label>
                        <label>{{$user->getEmail()}}</label>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-9">
                        <label for="fname" class="col-sm-6 text-left control-label col-form-label" style="font-family: bold">Password:</label>
                        <input type="password" class="form-control" id="fname" name="password" required>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-9">
                        <label for="fname" class="col-sm-6 text-left control-label col-form-label" style="font-family: bold">Data di Nascita:</label>
                        <label>{{$user->getDateOfBirth()}}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-9">
                        <label for="fname" class="col-sm-6 text-left control-label col-form-label" style="font-family: bold">Luogo di Nascita:</label>
                        <label>{{$user->getBirthPLace()}}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-9">
                        <label for="fname" class="col-sm-6 text-left control-label col-form-label" style="font-family: bold">Nazione di Nascita:</label>
                        <label>{{$user->getBirthNation()}}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-9">
                        <label for="fname" class="col-sm-6 text-left control-label col-form-label" style="font-family: bold">Sesso</label>
                        <label>{{$user->getGender()}}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-9">
                        <label for="fname" class="col-sm-9 text-left control-label col-form-label" style="font-family: bold">Città di Residenza:</label>
                        <label></label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-9">
                        <label for="fname" class="col-sm-9 text-left control-label col-form-label" style="font-family: bold">Telefono:</label>
                        <label>{{$user->getTelephoneNumber()}}</label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-9">
                        <label for="fname" class="col-sm-9 text-left control-label col-form-label" style="font-family: bold">Nazione:</label>
                        <label></label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-9">
                        <label for="fname" class="col-sm-9 text-left control-label col-form-label" style="font-family: bold">Cap:</label>
                        <label></label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-9">
                        <label for="fname" class="col-sm-9 text-left control-label col-form-label" style="font-family: bold">Via:</label>
                        <label></label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-9">
                        <label for="fname" class="col-sm-9 text-left control-label col-form-label" style="font-family: bold">Numero Civico:</label>
                        <label></label>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-6">
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-sm-9">
                        <label for="fname" class="col-sm-9 text-left control-label col-form-label" style="font-family: bold">Tipo Documento:</label>
                        <label></label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-9">
                        <label for="fname" class="col-sm-9 text-left control-label col-form-label" style="font-family: bold">Numero Documento:</label>
                        <label></label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-9">
                        <label for="fname" class="col-sm-9 text-left control-label col-form-label" style="font-family: bold">Data Rilascio:</label>
                        <label></label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-9">
                        <label for="fname" class="col-sm-9 text-left control-label col-form-label" style="font-family: bold">Rilasciato Da:</label>
                        <label></label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-9">
                        <label for="fname" class="col-sm-9 text-left control-label col-form-label" style="font-family: bold">Immagine del Documento:</label>
                        <label></label>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <input type="checkbox" hidden name="isUnderage" value="TRUE"></input>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PARENT FORM -->

    <div class="row" id="parentDiv">
        <div class="col-md-6" id="myDIV" style="display: none">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title ">Inserisci Dati Genitore</h4>
                    <div class="form-group row">
                        <div class="col-sm-9">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label" style="font-family: bold">Nome Tutore</label>
                            <label></label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-9">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Cognome Tutore</label>
                            <label></label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-9">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label"style="font-family: bold">Sesso Tutore</label>
                            <label></label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-9">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label"style="font-family: bold">Data di Nascita Tutore</label>
                            <label></label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-9">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label"style="font-family: bold">Luogo di Nascita Tutore</label>
                            <label></label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-9">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label"style="font-family: bold">Città Residenza del Tutore</label>
                            <label></label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-9">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label"style="font-family: bold">Nazione di Residenza Tutore</label>
                            <label></label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-9">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label"style="font-family: bold">Cap</label>
                            <label></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6" id="myDiv" style="display: none">
            <div class="card">
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-sm-9">
                            <label for="email" class="col-sm-3 text-right control-label col-form-label"style="font-family: bold">Via</label>
                            <label></label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-9">
                            <label for="email" class="col-sm-3 text-right control-label col-form-label"style="font-family: bold">Cap</label>
                            <label></label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-9">
                            <label for="cono1" class="col-sm-3 text-right control-label col-form-label"style="font-family: bold">Numero Tutore</label>
                            <label></label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-9">
                            <label for="cono1" class="col-sm-3 text-right control-label col-form-label"style="font-family: bold">E-mail del Tutore</label>
                            <label></label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-9">
                            <label for="cono1" class="col-sm-3 text-right control-label col-form-label"style="font-family: bold">Numero documento d'Identità del Tutore</label>
                            <label></label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-9">
                            <label for="lname" class="col-sm-3 text-right control-label col-form-label"style="font-family: bold">Imagine Documento d'Identità</label>
                            <label></label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-9">
                            <label for="email1" class="col-sm-3 text-right control-label col-form-label"style="font-family: bold">Tipo di Documento</label>
                            <label></label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-9">
                            <label for="cono1" class="col-sm-3 text-right control-label col-form-label"style="font-family: bold">Data di Rilascio</label>
                            <label></label>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</form>
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
        if (age < 18) {
            myFunction();
        } else {
            document.getElementById('myDIV').style.display = "none";
            document.getElementById('myDiv').style.display = "none";
        }
    }
</script>
