<div class="collapse multi-collapse" id="plicometricData">
    <br>
    <div class="col-md-12">
        <div class="card card-body" style="border-radius: 10px;">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h3 style="text-align: center">Dati pliconometrici</h3>
                </div>
                <?php
                  $medicalHistory = data_get($medicalHistoryForUsers, $user->getIdDatabase());
                 ?>
                <div class="col-md-6">
                    <label for="fname" class="col-sm-6 text-left control-label col-form-label" style="font-family: bold">Peso (kg):</label>
                    <label>{{$medicalHistory->getWeight()}}</label>
                    <label for="fname" class="col-sm-6 text-left control-label col-form-label" style="font-family: bold">Altezza (cm):</label>
                    <label>{{$medicalHistory->getHeight()}}</label>
                    <label for="fname" class="col-sm-6 text-left control-label col-form-label" style="font-family: bold">IMC:</label>
                    <label>{{$medicalHistory->getImc()}}</label>
                    <label for="fname" class="col-sm-6 text-left control-label col-form-label" style="font-family: bold">Sport praticati precedentemente:</label>
                    <label>{{$medicalHistory->getPreviousSport()}}</label>
                    <label for="fname" class="col-sm-6 text-left control-label col-form-label" style="font-family: bold">Tempo sport praticati precedentemente:</label>
                    <label>{{$medicalHistory->getPreviousSportTime()}}</label>
                    <label for="fname" class="col-sm-6 text-left control-label col-form-label" style="font-family: bold">Tempo inattivo:</label>
                    <label>{{$medicalHistory->getInactiveTime()}}</label>
                    <label for="fname" class="col-sm-6 text-left control-label col-form-label" style="font-family: bold">Dati plicometrici:</label>
                    <label>{{$medicalHistory->getPlicometricData()}}</label>
                </div>
                <br>
                <div class="col-md-6">
                    <label for="fname" class="col-sm-6 text-left control-label col-form-label" style="font-family: bold">Ipertrofia:</label><br>
                    <label>{{$medicalHistory->getHypertrophy()}}</label>
                    <label for="fname" class="col-sm-6 text-left control-label col-form-label" style="font-family: bold">Dimagrimento:</label><br>
                    <label>{{$medicalHistory->getSlimming()}}</label>
                    <label for="fname" class="col-sm-6 text-left control-label col-form-label" style="font-family: bold">Tonificazione:</label><br>
                    <label>{{$medicalHistory->getToning()}}</label>
                    <label for="fname" class="col-sm-6 text-left control-label col-form-label" style="font-family: bold">Allenamento Atletico:</label><br>
                    <label>{{$medicalHistory->getAthleticTraining()}}</label>
                    <label for="fname" class="col-sm-6 text-left control-label col-form-label" style="font-family: bold">Riabilitazione:</label><br>
                    <label>{{$medicalHistory->getRehabilitation()}}</label>
                    <label for="fname" class="col-sm-6 text-left control-label col-form-label" style="font-family: bold">Sport di Combattimento:</label><br>
                    <label>{{$medicalHistory->getCombatSports()}}</label>
                    <label for="fname" class="col-sm-6 text-left control-label col-form-label" style="font-family: bold">Altri Obiettivi:</label>
                    <label>{{$medicalHistory->getOtherGoals()}}</label>
                    <label for="fname" class="col-sm-6 text-left control-label col-form-label" style="font-family: bold">Informazioni Importanti:</label>
                    <label>{{$medicalHistory->getImportantInformation()}}</label>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
