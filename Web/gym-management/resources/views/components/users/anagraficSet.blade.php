<div class="collapse multi-collapse" id="{{'anagraficSet' . $loop->index}}">
    <br>
    <div class="col-md-12">
        <div class="card card-body" style="border-radius: 10px;background-color: #d6d8d8">
            <div class="row justify-content-center">
                <div class="col-md-12" style="margin-bottom: 2.5%">
                    <h3 style="text-align: center; color:rgb(31, 38, 45, 0.8)">Modifica dati anagrafici</h3>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <label for="fname" class="col-lg-5 text-right control-label">Nome:</label>
                    <input class="col-lg-6 text-center col-form-label" style="color:rgb(31, 38, 45, 0.8)" placeholder="{{$user->getName()}}">
                    <label for="fname" class="col-lg-5 text-right control-label">Cognome:</label>
                    <input class="col-lg-6 text-center col-form-label" style="color:rgb(31, 38, 45, 0.8)" placeholder="{{$user->getSurname()}}">
                    <label for="fname" class="col-lg-5 text-right control-label">E-Mail:</label>
                    <input class="col-lg-6 text-center col-form-label" style="color:rgb(31, 38, 45, 0.8)" placeholder="{{$user->getEmail()}}">
                    <label for="fname" class="col-lg-5 text-right control-label">Nato il:</label>
                    <input class="col-lg-6 text-center col-form-label" style="color:rgb(31, 38, 45, 0.8)" placeholder="{{$user->getDateOfBirth()}}">
                    <label for="fname" class="col-lg-5 text-right control-label">Luogo di nascita:</label>
                    <input class="col-lg-6 text-center col-form-label" style="color:rgb(31, 38, 45, 0.8)" placeholder="{{$user->getBirthPLace()}}">
                    <label for="fname" class="col-lg-5 text-right control-label">Nazione di nascita:</label>
                    <input class="col-lg-6 text-center col-form-label" style="color:rgb(31, 38, 45, 0.8)" placeholder="{{$user->getBirthNation()}}">
                    <label for="fname" class="col-lg-5 text-right control-label">Sesso</label>
                    <input class="col-lg-6 text-center col-form-label" style="color:rgb(31, 38, 45, 0.8)" placeholder="{{$user->getGender()}}">
                    <label for="fname" class="col-lg-5 text-right control-label">Città di residenza:</label>
                    <input class="col-lg-6 text-center col-form-label" style="color:rgb(31, 38, 45, 0.8)" placeholder="{{data_get($user->getResidence(),'cityOfResidence')}}">
                    <label for="fname" class="col-lg-5 text-right control-label">Telefono:</label>
                    <input class="col-lg-6 text-center col-form-label" style="color:rgb(31, 38, 45, 0.8)" placeholder="{{$user->getTelephoneNumber()}}">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <label for="fname" class="col-lg-5 text-right control-label">Nazione:</label>
                    <input class="col-lg-6 text-center col-form-label" style="color:rgb(31, 38, 45, 0.8)" placeholder="{{data_get($user->getResidence(),'nation')}}">
                    <label for="fname" class="col-lg-5 text-right control-label">Cap:</label>
                    <input class="col-lg-6 text-center col-form-label" style="color:rgb(31, 38, 45, 0.8)" placeholder="{{data_get($user->getResidence(),'cap')}}">
                    <label for="fname" class="col-lg-5 text-right control-label">Via:</label>
                    <input class="col-lg-6 text-center col-form-label" style="color:rgb(31, 38, 45, 0.8)" placeholder="{{data_get($user->getResidence(),'street')}}">
                    <label for="fname" class="col-lg-5 text-right control-label">Numero Civico:</label>
                    <input class="col-lg-6 text-center col-form-label" style="color:rgb(31, 38, 45, 0.8)" placeholder="{{data_get($user->getResidence(),'number')}}">
                    <label for="fname" class="col-lg-5 text-right control-label">Tipo Documento:</label>
                    <input class="col-lg-6 text-center col-form-label" style="color:rgb(31, 38, 45, 0.8)" placeholder="{{data_get($user->getDocument(),'type')}}">
                    <label for="fname" class="col-lg-5 text-right control-label">Numero Documento:</label>
                    <input class="col-lg-6 text-center col-form-label" style="color:rgb(31, 38, 45, 0.8)" placeholder="{{data_get($user->getResidence(),'number')}}">
                    <label for="fname" class="col-lg-5 text-right control-label">Data Rilascio:</label>
                    <input class="col-lg-6 text-center col-form-label" style="color:rgb(31, 38, 45, 0.8)" placeholder="{{data_get($user->getResidence(),'releaseDate')}}">
                    <label for="fname" class="col-lg-5 text-right control-label">Rilasciato Da:</label>
                    <input class="col-lg-6 text-center col-form-label" style="color:rgb(31, 38, 45, 0.8)" placeholder="{{data_get($user->getResidence(),'released')}}">
                    <label for="fname" class="col-lg-5 text-right control-label">Immagine del Documento:</label>
                    <input class="col-lg-6 text-center col-form-label" style="color:rgb(31, 38, 45, 0.8)" placeholder="{{data_get($user->getResidence(),'documentImage')}}">
                </div>
                <hr>
                <div class="card-body">
                    <input type="text" id="isUnderage" hidden name="isUnderage" value='false' required></input>
                </div>
            </div>
        </div>
    </div>
</div>
