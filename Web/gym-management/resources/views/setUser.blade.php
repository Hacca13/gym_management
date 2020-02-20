@extends('layouts.master')

<?php

    $timestamp = strtotime($user->getDateOfBirth());
    $dateOfBirth = date('Y-m-d', $timestamp);
    $timestamp = strtotime(data_get($user->getDocument(),'releaseDate'));
    $releaseDate = date('Y-m-d', $timestamp);
    $medicalCertificate=null;
    $parentDateOfBirth=null;
     if($user->getMedicalCertificate() != null){
       $timestamp = strtotime($user->getMedicalCertificate());
       $medicalCertificate = date('Y-m-d', $timestamp);
     }
     if($user->getIsAdult() == false){
       if($user->getParentDateOfBirth() != null){
         $timestamp = strtotime($user->getParentDateOfBirth());
         $parentDateOfBirth = date('Y-m-d', $timestamp);
       }
       if(data_get($user->getParentDocument(),'releaseDate') != null){
         $timestamp = strtotime(data_get($user->getParentDocument(),'releaseDate'));
         $releaseDate = date('Y-m-d', $timestamp);
       }
     }
    ?>

@section('content')
    <div class="card" style="border-radius: 10px;background-color: rgba(31, 38, 45, 0.8)">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-12" style="text-align: center;">
                    <h1 style="color: #d6d8d8">Modifica dati utente</h1>
                </div>
                <div class="col-md-12" style="margin-top: 2.5%; padding-top: 15px; background-color: #d6d8d8; border-radius: 10px">
                    <form id="example-form" action="/admin/setUser"   method="post" class="m-t-40" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <h3 id="parentTitle">Dati Utente</h3>
                            <section>
                              <input type="text" id="idDatabase" hidden name="idDatabase" value="{{$user->getIdDatabase()}}" required></input>
                              <input type="text" id="email" hidden name="email" value="{{$user->getEmail()}}" required></input>

                                <div class="row justify-content-center">
                                    <div class="col-lg-6 col-md-8 col-sm-12">
                                        <label for="fname" class="text-right control-label" style="font-size: 16px;">Nome:</label>
                                        <input type="text" class="form-control" value="{{$user->getName()}}" id="fname" name="name" required>
                                        <label for="lname" class="text-right control-label" style="font-size: 16px;">Cognome:</label>
                                        <input type="text" class="form-control" value="{{$user->getSurname()}}" id="lname" name="surname" required>
                                        <label for="lname" class="text-right control-label" style="font-size: 16px;">Email:</label>
                                        <input type="text" class="form-control" id="email" value="{{$user->getEmail()}}" name="email" required>
                                        <label for="lname" class="text-right control-label" style="font-size: 16px;">Codice Fiscale:</label>
                                        <input type="text" class="form-control" id="fiscalCode" value="{{$user->getFiscalCode()}}" maxlength="16" name="fiscalCode">
                                    </div>


                                </div>

                                <br>
                                <br>

                                <div class="row justify-content-center">
                                    <div class="col-lg-5 col-md-8 col-sm-12">
                                        <label for="mydatepicker" class="text-right control-label" style="font-size: 16px;">Data di Nascita:</label>
                                        <input type="date" class="form-control mydatepicker" value="<?php echo $dateOfBirth;  ?>"   oninput="testAge()" id="dateOfBirth" name="dateOfBirth" required>
                                        <label for="nation" class="text-right control-label" style="font-size: 16px;">Nazionalità di Nascita:</label>
                                        <input type="text" class="form-control" id="nation" value="{{$user->getBirthNation()}}" name="birthNation" required>
                                    </div>

                                    <div class="col-lg-5 col-md-8 col-sm-12">
                                        <label for="mybirthplace" class="text-right control-label" style="font-size: 16px;">Luogo di Nascita:</label>
                                        <input type="text" class="form-control" id="mybirthplace" value="{{$user->getBirthPlace()}}" name="birthPlace" required>
                                        <label for="fname" class="text-right control-label" style="font-size: 16px;">Cellulare:</label>
                                        <input type="tel" class="form-control" id="lname" value="{{$user->getTelephoneNumber()}}" name="telephone" required>
                                    </div>

                                </div>

                                <br>
                                <br>

                                <div class="row justify-content-center">
                                    <div class="col-lg-6 col-md-10 col-sm-10">
                                        <label class="">Sesso:</label><br>
                                        <div class="col-sm-12 row">
                                            <div class="custom-control custom-radio col-md-4">
                                                <input type="radio" <?php if($user->getGender() == "Uomo"){ ?>
                                                    checked
                                                <?php } ?> class="custom-control-input" id="genmale" name="gender" value="Uomo" required>
                                                <label class="custom-control-label" for="genmale">Uomo</label>
                                            </div>
                                            <div class="custom-control custom-radio col-md-4">
                                                <input type="radio" <?php if($user->getGender() == "Donna"){ ?>
                                                    checked
                                                <?php } ?> class="custom-control-input" id="genfemale" name="gender" value="Donna" required>
                                                <label class="custom-control-label" for="genfemale">Donna</label>
                                            </div>
                                            <div class="custom-control custom-radio col-md-4">
                                                <input type="radio" <?php if($user->getGender() == "Altro"){ ?>
                                                    checked
                                                <?php } ?> class="custom-control-input" id="genother" name="gender" value="Altro" required>
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
                                        <input type="text" class="form-control" id="fname" value="{{data_get($user->getResidence(),'cityOfResidence')}}" name="cityOfResidence" required>
                                        <label for="nationLive" class="text-right control-label" style="font-size: 16px;">Nazione di Residenza:</label>
                                        <input type="text" class="form-control" id="nationLive" value="{{data_get($user->getResidence(),'nation')}}" name="nation" required>
                                    </div>
                                    <div class="col-lg-6 col-md-8 col-sm-12">
                                        <label for="cap" class=" text-right control-label" style="font-size: 16px;">Cap:</label>
                                        <input type="text" class="form-control" id="cap" value="{{data_get($user->getResidence(),'cap')}}" name="cap" required>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <label for="via" class="text-right control-label" style="font-size: 16px;">Via:</label>
                                                <input type="text" class="form-control" id="via" value="{{data_get($user->getResidence(),'street')}}" name="street" required>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12">
                                                <label for="numCiv" class="text-right control-label" style="font-size: 16px;">Numero:</label>
                                                <input type="text" class="form-control" id="numCiv" value="{{data_get($user->getResidence(),'number')}}" name="number" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <br>

                                <div class="row justify-content-center">
                                    <div class="col-lg-6 col-md-8 col-sm-12">
                                        <label for="documentType" class="text-right control-label" style="font-size: 16px;">Tipo di Documento:</label>
                                        <input type="text" class="form-control" id="documentType" value="{{data_get($user->getDocument(),'type')}}" name="documentType" required>
                                        <label for="ducumentNumber" class="text-right control-label" style="font-size: 16px;">Numero documento d'Identità:</label>
                                        <input type="text" class="form-control" id="lname" name="documentNumber" value="{{data_get($user->getDocument(),'number')}}" required>
                                    </div>

                                    <div class="col-lg-6 col-md-8 col-sm-12">
                                        <label for="documentImage" class="text-right control-label" style="font-size: 16px;">Imagine Documento d'Identità:</label>
                                        <input type="file" class="form-control" id="documentImage" name="documentImage" onchange="Filevalidation()">
                                        <input type="text" hidden class="form-control" id="oldDocumentImageName" name="oldDocumentImageName" <?php if(data_get($user->getDocument(),'documentImageName') != null){ ?>
                                          value="{{data_get($user->getDocument(),'documentImageName')}}"

                                      <?php } ?>
                                        >
                                        <input type="text" hidden class="form-control" id="oldDocumentImage" name="oldDocumentImage" <?php if(data_get($user->getDocument(),'documentImage') != null){ ?>
                                          value="{{data_get($user->getDocument(),'documentImage')}}"

                                      <?php } ?>
                                        >
                                    </div>
                                </div>

                                <br>

                                <div class="row justify-content-center">
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <label for="releaseDateDocument" class=" text-right control-label" style="font-size: 16px;">Data di Rilascio:</label>
                                        <input type="date" class="form-control" id="cono1" name="releaseDateDocument" value="<?php echo $releaseDate;  ?>"   required>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <label for="releaserDocument" class="text-right control-label" style="font-size: 16px;">Rilasciato Da:</label>
                                        <input type="text" class="form-control" id="cono1" name="releaserDocument" value="{{data_get($user->getDocument(),'released')}}" required>
                                    </div>
                                </div>
                            </section>

                            <h3>Dati Plicometrici</h3>
                            <section>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" id="medicalHistoryIdDatabase" hidden name="medicalHistoryIdDatabase" value="{{$medicalHistory->getIdDatabase()}}" required></input>
                                        <label for="weight" class="text-left control-label" style="font-size: 16px;">Peso (kg):</label>
                                        <input type="number" class="form-control" id="weight" oninput="imcCalculation()" name="weight" value="{{$medicalHistory->getWeight()}}" required>
                                        <label for="height" class="text-left control-label" style="font-size: 16px;">Altezza (cm):</label>
                                        <input type="number" class="form-control" id="height" oninput="imcCalculation()" name="height" value="{{$medicalHistory->getHeight()}}" required>
                                        <br>
                                        <label for="imcLabel" class="text-left control-label" style="font-size: 16px;">IMC:</label>
                                        <br>
                                        <input type="text" hidden class="form-control" value="{{$medicalHistory->getImc()}}" id="imc" name="imc">
                                        <label id="imcLabel" >{{$medicalHistory->getImc()}}</label>
                                        <br>
                                        <label for="previosSport" class="text-left control-label" style="font-size: 16px;">Sport Praticati Precedentemente:</label>
                                        <input type="text" class="form-control" id="previosSport" name="previousSport" <?php if($medicalHistory->getPreviousSport() != null){ ?>
                                            value="{{$medicalHistory->getPreviousSport()}}"
                                        <?php } ?>>
                                        <label for="previousSportTime" class="text-left control-label" style="font-size: 16px;">Tempo Sport Praticati Precedentemente:</label>
                                        <input type="text" class="form-control" id="previousSportTime" name="previousSportTime" <?php if($medicalHistory->getPreviousSportTime() != null){ ?>
                                            value="{{$medicalHistory->getPreviousSportTime()}}"
                                        <?php } ?>>
                                        <label for="inactiveTime" class="text-left control-label">Tempo Inattivo:</label>
                                        <input type="text" class="form-control" id="inactiveTime" name="inactiveTime" <?php if($medicalHistory->getInactiveTime() != null){ ?>
                                            value="{{$medicalHistory->getInactiveTime()}}"
                                        <?php } ?>>
                                        <label for="plicometricData" class="text-left control-label" style="font-size: 16px;">Dati Plicometrici:</label>
                                        <input type="text" class="form-control" id="plicometricData" name="plicometricData" <?php if($medicalHistory->getPlicometricData() != null){ ?>
                                            value="{{$medicalHistory->getPlicometricData()}}"
                                        <?php } ?>>
                                    </div>

                                    <br>
                                    <br>

                                    <div class="col-md-6 justify-content-center" style="text-align: center">
                                        <div class="form-group" style="text-align: center" id="">
                                            <label class="text-left control-label" style="font-size: 16px;">Ipertrofia:</label><br>
                                            <div class="row justify-content-center">
                                                <div class="custom-control custom-radio" style="margin-right: 5%;">
                                                    <input type="radio" <?php if($medicalHistory->getHypertrophy() == "true"){ ?>
                                                        checked
                                                    <?php } ?> class="custom-control-input" id="ipertrue" name="hypertrophy" value="true" required>
                                                    <label class="custom-control-label" for="ipertrue">Si</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" <?php if($medicalHistory->getHypertrophy() == "false"){ ?>
                                                        checked
                                                    <?php } ?> class="custom-control-input" id="iperfalse" name="hypertrophy" value="false" required>
                                                    <label class="custom-control-label" for="iperfalse">No</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="">
                                            <label class="text-left control-label" style="font-size: 16px;">Dimagrimento:</label><br>
                                            <div class="row justify-content-center">
                                                <div class="custom-control custom-radio" style="margin-right: 5%;">
                                                    <input type="radio"  <?php if($medicalHistory->getSlimming() == "true"){ ?>
                                                        checked
                                                    <?php } ?> class="custom-control-input" id="slimtrue" name="slimming" value="true" required>
                                                    <label class="custom-control-label" for="slimtrue">Si</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" <?php if($medicalHistory->getSlimming() == "false"){ ?>
                                                        checked
                                                    <?php } ?> class="custom-control-input" id="slimfalse" name="slimming" value="false" required>
                                                    <label class="custom-control-label" for="slimfalse">No</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" id="">
                                            <label class="text-left control-label" style="font-size: 16px;">Tonificazione:</label><br>
                                            <div class="row justify-content-center">
                                                <div class="custom-control custom-radio" style="margin-right: 5%">
                                                    <input type="radio"  <?php if($medicalHistory->getToning() == "true"){ ?>
                                                        checked
                                                    <?php } ?> class="custom-control-input" id="toningtrue" name="toning" value="true" required>
                                                    <label class="custom-control-label" for="toningtrue">Si</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" <?php if($medicalHistory->getToning() == "false"){ ?>
                                                        checked
                                                    <?php } ?> class="custom-control-input" id="toningfalse" name="toning" value="false" required>
                                                    <label class="custom-control-label" for="toningfalse">No</label>
                                                </div>
                                            </div>
                                            <div class="form-group" id="">
                                                <label class="text-left control-label" style="font-size: 16px;">Allenamento Atletico:</label><br>
                                                <div class="row justify-content-center">
                                                    <div class="custom-control custom-radio" style="margin-right: 5%">
                                                        <input type="radio" <?php if($medicalHistory->getAthleticTraining() == "true"){ ?>
                                                            checked
                                                        <?php } ?> class="custom-control-input" id="atltrue" name="athleticTraining" value="true" required>
                                                        <label class="custom-control-label" for="atltrue">Si</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" <?php if($medicalHistory->getAthleticTraining() == "false"){ ?>
                                                            checked
                                                        <?php } ?> class="custom-control-input" id="atlfalse" name="athleticTraining" value="false" required>
                                                        <label class="custom-control-label" for="atlfalse">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group" id="">
                                                <label class="text-left control-label" style="font-size: 16px;">Riabilitazione:</label><br>
                                                <div class="row justify-content-center">
                                                    <div class="custom-control custom-radio" style="margin-right: 5%">
                                                        <input type="radio" <?php if($medicalHistory->getRehabilitation() == "true"){ ?>
                                                            checked
                                                        <?php } ?>  class="custom-control-input" id="rehatrue" name="rehabilitation" value="true" required>
                                                        <label class="custom-control-label" for="rehatrue">Si</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" <?php if($medicalHistory->getRehabilitation() == "false"){ ?>
                                                            checked
                                                        <?php } ?> class="custom-control-input" id="rehafalse" name="rehabilitation" value="false" required>
                                                        <label class="custom-control-label" for="rehafalse">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group" id="">
                                                <label class="text-left control-label" style="font-size: 16px;">Sport di Combattimento:</label><br>
                                                <div class="row justify-content-center">
                                                    <div class="custom-control custom-radio" style="margin-right: 5%">
                                                        <input type="radio" <?php if($medicalHistory->getCombatSports() == "true"){ ?>
                                                            checked
                                                        <?php } ?> class="custom-control-input" id="comtrue" name="combatSports" value="true" required>
                                                        <label class="custom-control-label" for="comtrue">Si</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" <?php if($medicalHistory->getCombatSports() == "false"){ ?>
                                                            checked
                                                        <?php } ?> class="custom-control-input" id="comfalse" name="combatSports" value="false" required>
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
                                        <input type="text" class="form-control" id="goals" name="otherGoals" <?php if($medicalHistory->getOtherGoals() != null){ ?>
                                            value="{{$medicalHistory->getOtherGoals()}}"
                                        <?php } ?>>
                                        <label for="importantInformation" class="text-right control-label" style="font-size: 16px;">Informazioni Importanti:</label>
                                        <input type="text" class="form-control" id="importantInformation" name="importantInformation" <?php if($medicalHistory->getImportantInformation() != null){ ?>
                                            value="{{$medicalHistory->getImportantInformation()}}"
                                        <?php } ?>>
                                    </div>
                                </div>

                                <div class="form-group" id="">
                                    <label class="text-left control-label" style="font-size: 16px;">Abilitazione a publicare media sui social:</label><br>
                                    <div class="row justify-content-center">
                                        <div class="custom-control custom-radio" style="margin-right: 5%">
                                            <input type="radio" <?php if($user->getPublicSocial() == "true"){ ?>
                                                checked
                                            <?php } ?> class="custom-control-input" id="socialtrue" name="publicSocial" value="true" required>
                                            <label class="custom-control-label" for="socialtrue">Si</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" <?php if($user->getPublicSocial() == "false"){ ?>
                                                checked
                                            <?php } ?> class="custom-control-input" id="socialfalse" name="publicSocial" value="false" required>
                                            <label class="custom-control-label" for="socialfalse">No</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label for="medicalCertificate" class=" text-right control-label" style="font-size: 16px;">Data di Rilascio certificato medico:</label>
                                        <input type="date" value="<?php echo $medicalCertificate;  ?>" class="form-control" id="cono1" name="medicalCertificate" >
                                    </div>
                                </div>


                            </section>

                            <div class="card-body">
                                <input type="text" id="isUnderage" hidden name="isUnderage" value="{{$user->getIsAdult()}}" required></input>
                            </div>

                            <h3 id="parentTitle">Dati Tutore</h3>
                            <section id="parentData">
                                <div id="myDiv">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <lababel for="parentName" class="text-left control-label" style="font-size: 16px;">Nome tutore:</label>
                                            <input type="text" class="form-control" id="parentName" name="parentName" <?php
                                              if($user->getIsAdult() == false){
                                                if($user->getParentName() != null){ ?>
                                                value="{{$user->getParentName()}}"
                                            <?php }} ?>>
                                            <label for="parentSurname" class="text-left control-label" style="font-size: 16px;">Cognome tutore:</label>
                                            <input type="text" class="form-control" id="parentSurname" name="parentSurname" <?php
                                              if($user->getIsAdult() == false){
                                                if($user->getParentSurname() != null){ ?>
                                                value="{{$user->getParentSurname()}}"
                                            <?php }} ?>>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12" style="text-align: center">
                                            <label class="text-left control-label" style="font-size: 16px">Sesso:</label><br>
                                            <div class="row justify-content-center">
                                                <div class="custom-control custom-radio" style="margin-right: 5%">
                                                    <input type="radio" <?php
                                                      if($user->getIsAdult() == false){
                                                        if(($user->getParentGender() == "Uomo") && ($user->getParentGender() != null)){ ?>
                                                        checked
                                                    <?php }} ?> class="custom-control-input" id="parentgemale" name="parentGender" value="Uomo" >
                                                    <label class="custom-control-label" for="parentgemale">Uomo</label>
                                                </div>

                                                <div class="custom-control custom-radio" style="margin-right: 5%">
                                                    <input type="radio" <?php
                                                      if($user->getIsAdult() == false){
                                                        if(($user->getParentGender() == "Donna") && ($user->getParentGender() != null)){ ?>
                                                        checked
                                                    <?php }} ?> class="custom-control-input" id="parentgefemale" name="parentGender" value="Donna">
                                                    <label class="custom-control-label" for="parentgefemale">Donna</label>
                                                </div>

                                                <div class="custom-control custom-radio">
                                                    <input type="radio" <?php
                                                      if($user->getIsAdult() == false){
                                                        if(($user->getParentGender() == "Altro") && ($user->getParentGender() != null)){ ?>
                                                        checked
                                                    <?php }} ?> class="custom-control-input" id="parentgeother" name="parentGender" value="Altro">
                                                    <label class="custom-control-label" for="parentgeother">Altro</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <br>
                                    <br>

                                    <div class="row justify-content-center">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <label for="fname" class="text-left control-label" style="font-size: 16px;">Data di nascita tutore:</label>
                                            <input type="date" class="form-control" id="parentDateOfBirth" name="parentDateOfBirth" value="<?php
                                              if($user->getIsAdult() == false){
                                                echo $parentDateOfBirth;
                                              }  ?>">
                                            <label for="fname" class="text-left control-label" style="font-size: 16px;">Nazione di nascita tutore:</label>
                                            <input type="text" class="form-control" id="parentBirthNation" name="parentBirthNation" <?php
                                              if($user->getIsAdult() == false){
                                                if($user->getParentBirthNation() != null){ ?>
                                                value="{{$user->getParentBirthNation()}}"
                                            <?php }} ?>>
                                            <label for="fname" class="text-left control-label" style="font-size: 16px;">Luogo di nascita tutore:</label>
                                            <input type="text" class="form-control" id="parentBirthPlace" name="parentBirthPlace" <?php
                                              if($user->getIsAdult() == false){
                                                if($user->getParentBirthPlace() != null){ ?>
                                                value="{{$user->getParentBirthPlace()}}"
                                            <?php }} ?>>
                                        </div>
                                    </div>

                                    <br>
                                    <br>

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <label for="lname" class="text-left control-label" style="font-size: 16px;">Nazione di residenza tutore:</label>
                                            <input type="text" class="form-control" id="parentNation" name="parentNation" <?php
                                              if($user->getIsAdult() == false){
                                                if(data_get($user->getParentResidence(),'nation') != null){ ?>
                                                  value="{{data_get($user->getParentResidence(),'nation')}}"
                                            <?php }} ?>>
                                            <label for="fname" class="text-left control-label" style="font-size: 16px;">Città residenza del tutore:</label>
                                            <input class="form-control" id="parentCityOfResidence" name="parentCityOfResidence" <?php
                                              if($user->getIsAdult() == false){
                                                if(data_get($user->getParentResidence(),'cityOfResidence') != null){ ?>
                                                  value="{{data_get($user->getParentResidence(),'cityOfResidence')}}"
                                            <?php }} ?>>
                                            <label for="lname" cclass="text-left control-label" style="font-size: 16px;">Cap:</label>
                                            <input type="text" class="form-control" id="parentCap" name="parentCap" <?php
                                              if($user->getIsAdult() == false){
                                                if(data_get($user->getParentResidence(),'cap') != null){ ?>
                                                value="{{data_get($user->getParentResidence(),'cap')}}"
                                            <?php }} ?>>
                                            <label for="email1" class="text-left control-label" style="font-size: 16px;">Via:</label>
                                            <input type="text" class="form-control" id="parentResidenceStreet" name="parentResidenceStreet" <?php
                                              if($user->getIsAdult() == false){
                                              if(data_get($user->getParentResidence(),'street') != null){ ?>
                                                value="{{data_get($user->getParentResidence(),'street')}}"
                                            <?php }} ?>>
                                            <label for="email1" class="text-left control-label" style="font-size: 16px;">Numero civico:</label>
                                            <input type="text" class="form-control" id="parentResidenceNumber" name="parentResidenceNumber" <?php
                                              if($user->getIsAdult() == false){
                                                if(data_get($user->getParentResidence(),'number') != null){ ?>
                                                value="{{data_get($user->getParentResidence(),'number')}}"
                                            <?php }} ?>>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <label for="cono1" class="text-left control-label" style="font-size: 16px;">Numero cellulare tutore:</label>
                                            <input type="text" class="form-control" id="parentTelephoneNumber" name="parentTelephoneNumber" <?php
                                              if($user->getIsAdult() == false){
                                              if($user->getParentTelephoneNumber() != null){ ?>
                                                value="{{$user->getParentTelephoneNumber()}}"
                                            <?php }} ?>>
                                            <label for="cono1" class="text-left control-label" style="font-size: 16px;">E-mail del tutore:</label>
                                            <input type="email" class="form-control" id="parentEmail" name="parentEmail" <?php
                                              if($user->getIsAdult() == false){
                                                if($user->getParentEmail() != null){ ?>
                                                  value="{{$user->getParentEmail()}}"
                                            <?php }} ?>>
                                        </div>
                                    </div>

                                    <br>
                                    <br>

                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <label for="email1" class="text-left control-label" style="font-size: 16px;">Tipo di documento:</label>
                                            <input type="text" class="form-control" id="parentDocumentType" name="parentDocumentType" <?php
                                              if($user->getIsAdult() == false){
                                                if(data_get($user->getParentDocument(),'type') != null){ ?>
                                                  value="{{data_get($user->getParentDocument(),'type')}}"
                                            <?php }} ?>>
                                            <label for="cono1" class="text-left control-label" style="font-size: 16px;">Numero documento d'Identità del Tutore:</label>
                                            <input type="text" class="form-control" id="parentDocumentNumber" name="parentDocumentNumber" <?php
                                              if($user->getIsAdult() == false){
                                                if(data_get($user->getParentDocument(),'number') != null){ ?>
                                                  value="{{data_get($user->getParentDocument(),'number')}}"
                                            <?php }} ?>>
                                        </div>

                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <label for="lname" class="text-left control-label" style="font-size: 16px;">Imagine documento d'identità:</label>
                                                    <input type="text" class="form-control" id="parentDocumentImage" name="parentDocumentImage" value="">
                                                    <input type="text" hidden class="form-control" id="oldParentDocumentImage" name="oldParentDocumentImage"
                                                    <?php
                                                      if($user->getIsAdult() == false){
                                                        if(data_get($user->getParentDocument(),'documentImage') != null){ ?>
                                                          value="{{data_get($user->getParentDocument(),'documentImage')}}"
                                                    <?php }} ?>>
                                                    <input type="text" hidden class="form-control" id="oldParentDocumentImageName" name="oldParentDocumentImageName"
                                                    <?php
                                                      if($user->getIsAdult() == false){
                                                        if(data_get($user->getParentDocument(),'documentImageName') != null){ ?>
                                                          value="{{data_get($user->getParentDocument(),'documentImageName')}}"
                                                    <?php }} ?>>
                                                </div>

                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <label for="cono1" class="text-left control-label" style="font-size: 16px;">Data di rilascio:</label>
                                                    <input type="date" class="form-control" id="parentDocumentReleaseDate" name="parentDocumentReleaseDate" <?php
                                                      if($user->getIsAdult() == false){
                                                        if(data_get($user->getParentDocument(),'releaseDate') != null){ ?>
                                                          value="{{$releaseDate}}"
                                                    <?php }} ?>>
                                                    <label for="cono1" class="text-left control-label" style="font-size: 16px;">Rilasciato da:</label>
                                                    <input type="text" class="form-control" id="parentDocumentReleaser" name="parentDocumentReleaser" <?php
                                                      if($user->getIsAdult() == false){
                                                        if(data_get($user->getParentDocument(),'released') != null){ ?>
                                                            value="{{data_get($user->getParentDocument(),'released')}}"
                                                    <?php }} ?>>
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
