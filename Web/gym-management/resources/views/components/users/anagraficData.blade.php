<div class="collapse multi-collapse" id="anagraficData">
  <br>
    <div class="col-md-12">
        <div class="card card-body" style="border-radius: 10px;">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h3 style="text-align: center">Dati anagrafici</h3>
                </div>
                <div class="col-md-6">
                    <label for="fname" class="col-sm-6 text-left control-label col-form-label" style="font-family: bold">Nome:</label>
                    <label>{{$user->getName()}}</label>
                    <label for="fname" class="col-sm-6 text-left control-label col-form-label" style="font-family: bold">Cognome:</label>
                    <label>{{$user->getSurname()}}</label>
                    <label for="fname" class="col-sm-6 text-left control-label col-form-label" style="font-family: bold">E-Mail:</label>
                    <label>{{$user->getEmail()}}</label>
                    <label for="fname" class="col-sm-6 text-left control-label col-form-label" style="font-family: bold">Data di Nascita:</label>
                    <label>{{$user->getDateOfBirth()}}</label>
                    <label for="fname" class="col-sm-6 text-left control-label col-form-label" style="font-family: bold">Luogo di Nascita:</label>
                    <label>{{$user->getBirthPLace()}}</label>
                    <label for="fname" class="col-sm-6 text-left control-label col-form-label" style="font-family: bold">Nazione di Nascita:</label>
                    <label>{{$user->getBirthNation()}}</label>
                    <div class="form-group" id="">
                        <label for="fname" class="col-sm-6 text-left control-label col-form-label" style="font-family: bold">Sesso</label>
                        <label>{{$user->getGender()}}</label>
                    </div>
                    <br>
                    <label for="fname" class="col-sm-9 text-left control-label col-form-label" style="font-family: bold">Città di Residenza:</label>
                    <label></label>
                    <label for="fname" class="col-sm-9 text-left control-label col-form-label" style="font-family: bold">Telefono:</label>
                    <label>{{$user->getTelephoneNumber()}}</label>
                </div>
                <div class="col-md-6">
                    <label for="fname" class="col-sm-9 text-left control-label col-form-label" style="font-family: bold">Nazione:</label>
                    <label></label>
                    <label for="fname" class="col-sm-9 text-left control-label col-form-label" style="font-family: bold">Cap:</label>
                    <label></label>
                    <label for="fname" class="col-sm-9 text-left control-label col-form-label" style="font-family: bold">Via:</label>
                    <label></label>
                    <label for="fname" class="col-sm-9 text-left control-label col-form-label" style="font-family: bold">Numero Civico:</label>
                    <label></label>
                    <label for="fname" class="col-sm-9 text-left control-label col-form-label" style="font-family: bold">Tipo Documento:</label>
                    <label></label>
                    <label for="fname" class="col-sm-9 text-left control-label col-form-label" style="font-family: bold">Numero Documento:</label>
                    <label></label>
                    <label for="fname" class="col-sm-9 text-left control-label col-form-label" style="font-family: bold">Data Rilascio:</label>
                    <label></label>
                    <label for="fname" class="col-sm-9 text-left control-label col-form-label" style="font-family: bold">Rilasciato Da:</label>
                    <label></label>
                    <label for="fname" class="col-sm-9 text-left control-label col-form-label" style="font-family: bold">Immagine del Documento:</label>
                    <label></label>
                </div>
                <hr>
                <div class="card-body">
                    <input type="text" id="isUnderage" hidden name="isUnderage" value='false' required></input>
                </div>
            </div>
        </div>
    </div>
</div>
