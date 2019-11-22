<div class="collapse multi-collapse" id="tutorData">
  <br>
    <div class="col-md-12">
        <div class="card card-body" style="border-radius: 10px;">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h3 style="text-align: center;">Dati tutore</h3>
                </div>
                <div class="col-sm-6">
                    <label for="fname" class="col-sm-6 text-left control-label col-form-label" style="font-family: bold">Nome Tutore:</label>
                    <label>{{$user->getParentName()}}</label>
                    <label for="fname" class="col-sm-6 text-left control-label col-form-label" style="font-family: bold">Cognome Tutore:</label>
                    <label>{{$user->getParentSurname()}}</label>
                    <label for="fname" class="col-sm-6 text-left control-label col-form-label" style="font-family: bold">Sesso Tutore:</label>
                    <label>{{$user->getParentGender()}}</label>
                    <label for="fname" class="col-sm-6 text-left control-label col-form-label" style="font-family: bold">Data di Nascita Tutore:</label>
                    <label>{{$user->getParentDateOfBirth()}}</label>
                    <label for="fname" class="col-sm-6 text-left control-label col-form-label" style="font-family: bold">Luogo di Nascita Tutore:</label>
                    <label>{{$user->getParentBirthPlace()}}</label>
                    <label for="fname" class="col-sm-6 text-left control-label col-form-label" style="font-family: bold">Città Residenza del Tutore:</label>
                    <label>{{data_get($user->getParentResidence(),'cityOfResidence')}}</label>
                    <label for="fname" class="col-sm-6 text-left control-label col-form-label" style="font-family: bold">Nazione di Residenza Tutore:</label>
                    <label>{{data_get($user->getParentResidence(),'nation')}}</label>
                    <label for="fname" class="col-sm-6 text-left control-label col-form-label" style="font-family: bold">Cap:</label>
                    <label>{{data_get($user->getParentResidence(),'cap')}}</label>
                </div>
                <div class="col-sm-6">
                    <label for="email" class="col-sm-6 text-left control-label col-form-label"style="font-family: bold">Via:</label>
                    <label>{{data_get($user->getParentResidence(),'street')}}</label>
                    <label for="cono1" class="col-sm-6 text-left control-label col-form-label"style="font-family: bold">Numero Tutore:</label>
                    <label>{{data_get($user->getParentResidence(),'number')}}</label>
                    <label for="cono1" class="col-sm-6 text-left control-label col-form-label"style="font-family: bold">E-mail del Tutore:</label>
                    <label></label>
                    <label for="email1" class="col-sm-6 text-left control-label col-form-label"style="font-family: bold">Tipo di Documento:</label>
                    <label>{{data_get($user->getParentDocument(),'type')}}</label>
                    <label for="cono1" class="col-sm-6 text-left control-label col-form-label"style="font-family: bold">Numero documento d'Identità del Tutore:</label>
                    <label>{{data_get($user->getParentDocument(),'number')}}</label>
                    <label for="lname" class="col-sm-6 text-left control-label col-form-label"style="font-family: bold">Imagine Documento d'Identità:</label>
                    <label>{{data_get($user->getParentDocument(),'documentImage')}}</label>
                    <label for="cono1" class="col-sm-6 text-left control-label col-form-label"style="font-family: bold">Data di Rilascio:</label>
                    <label>{{data_get($user->getParentDocument(),'releaseDate')}}</label>
                </div>
            </div>
        </div>
    </div>
</div>
