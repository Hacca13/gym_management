<div class="collapse multi-collapse" id="{{'anagraficData' . $loop->index}}">
    <br>
    <div class="col-md-12">
        <div class="card card-body" style="border-radius: 10px;background-color: #d6d8d8">
            <div class="row justify-content-center">
                <div class="col-md-12" style="margin-bottom: 2.5%">
                    <h3 style="text-align: center; color:rgba(31, 38, 45, 0.8)">Dati anagrafici</h3>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <label for="fname" class="col-lg-5 text-right control-label">Nome:</label>
                    <label class="col-lg-6 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)">{{$user->getName()}}</label>
                    <label for="fname" class="col-lg-5 text-right control-label">Cognome:</label>
                    <label class="col-lg-6 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)">{{$user->getSurname()}}</label>
                    <label for="fname" class="col-lg-5 text-right control-label">E-Mail:</label>
                    <label class="col-lg-6 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)">{{$user->getEmail()}}</label>
                    <label for="fname" class="col-lg-5 text-right control-label">Nato il:</label>
                    <label class="col-lg-6 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)">{{$user->getDateOfBirth()}}</label>
                    <label for="fname" class="col-lg-5 text-right control-label">Luogo di nascita:</label>
                    <label class="col-lg-6 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)">{{$user->getBirthPLace()}}</label>
                    <label for="fname" class="col-lg-5 text-right control-label">Nazione di nascita:</label>
                    <label class="col-lg-6 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)">{{$user->getBirthNation()}}</label>
                    <label for="fname" class="col-lg-5 text-right control-label">Sesso</label>
                    <label class="col-lg-6 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)">{{$user->getGender()}}</label>
                    <label for="fname" class="col-lg-5 text-right control-label">Città di residenza:</label>
                    <label class="col-lg-6 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)">{{data_get($user->getResidence(),'cityOfResidence')}}</label>
                    <label for="fname" class="col-lg-5 text-right control-label">Telefono:</label>
                    <label class="col-lg-6 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)">{{$user->getTelephoneNumber()}}</label>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <label for="fname" class="col-lg-5 text-right control-label">Nazione:</label>
                    <label class="col-lg-6 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)">{{data_get($user->getResidence(),'nation')}}</label>
                    <label for="fname" class="col-lg-5 text-right control-label">Cap:</label>
                    <label class="col-lg-6 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)">{{data_get($user->getResidence(),'cap')}}</label>
                    <label for="fname" class="col-lg-5 text-right control-label">Via:</label>
                    <label class="col-lg-6 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)">{{data_get($user->getResidence(),'street')}}</label>
                    <label for="fname" class="col-lg-5 text-right control-label">Numero Civico:</label>
                    <label class="col-lg-6 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)">{{data_get($user->getResidence(),'number')}}</label>
                    <label for="fname" class="col-lg-5 text-right control-label">Tipo Documento:</label>
                    <label class="col-lg-6 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)">{{data_get($user->getDocument(),'type')}}</label>
                    <label for="fname" class="col-lg-5 text-right control-label">Numero Documento:</label>
                    <label class="col-lg-6 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)">{{data_get($user->getDocument(),'number')}}</label>
                    <label for="fname" class="col-lg-5 text-right control-label">Data Rilascio:</label>
                    <label class="col-lg-6 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)">{{data_get($user->getDocument(),'releaseDate')}}</label>
                    <label for="fname" class="col-lg-5 text-right control-label">Rilasciato Da:</label>
                    <label class="col-lg-6 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)">{{data_get($user->getDocument(),'released')}}</label>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label for="fname" class="col-sm-6 text-right control-label">Immagine Documento:</label>
                        <img src="{{data_get($user->getDocument(),'documentImage')}}" height="180dpi" width="200dpi" class="img embed-responsive">
                    </div>
                </div>
                <hr>
                <div class="card-body">
                    <input type="text" id="isUnderage" hidden name="isUnderage" value='false' required></input>
                </div>
            </div>
        </div>
    </div>
</div>
