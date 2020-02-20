<div class="collapse multi-collapse" id="{{'plicometricData' . $loop->index}}">
    <br>
    <div class="col-md-12">
        <div class="card card-body" style="border-radius: 10px;background-color: #d6d8d8">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h3 style="text-align: center; color:rgba(31, 38, 45, 0.8)">Dati pliconometrici</h3>
                </div>
                <?php
                  $medicalHistory = data_get($medicalHistoryForUsers, $user->getIdDatabase());
                 ?>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <label for="fname" class="col-lg-7 text-right control-label">Peso (kg):</label>
                    <label class="col-lg-4 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)">{{$medicalHistory->getWeight()}}</label>
                    <label for="fname" class="col-lg-7 text-right control-label">Altezza (cm):</label>
                    <label class="col-lg-4 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)">{{$medicalHistory->getHeight()}}</label>
                    <label for="fname" class="col-lg-7 text-right control-label">IMC:</label>
                    <label class="col-lg-4 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)">{{$medicalHistory->getImc()}}</label>
                    <label for="fname" class="col-lg-7 text-right control-label">Sport praticati precedentemente:</label>
                    <label class="col-lg-4 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)">{{$medicalHistory->getPreviousSport()}}</label>
                    <label for="fname" class="col-lg-7 text-right control-label">Tempo sport praticati precedentemente:</label>
                    <label class="col-lg-4 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)">{{$medicalHistory->getPreviousSportTime()}}</label>
                    <label for="fname" class="col-lg-7 text-right control-label">Tempo inattivo:</label>
                    <label class="col-lg-4 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)">{{$medicalHistory->getInactiveTime()}}</label>
                    <label for="fname" class="col-lg-7 text-right control-label">Dati plicometrici:</label>
                    <label class="col-lg-4 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)">{{$medicalHistory->getPlicometricData()}}</label>
                </div>
                <br>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <label for="fname" class="col-lg-7 text-right control-label">Ipertrofia:</label>
                    <label class="col-lg-4 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)">{{$medicalHistory->getHypertrophy()}}</label>
                    <label for="fname" class="col-lg-7 text-right control-label">Dimagrimento:</label>
                    <label class="col-lg-4 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)">{{$medicalHistory->getSlimming()}}</label>
                    <label for="fname" class="col-lg-7 text-right control-label">Tonificazione:</label>
                    <label class="col-lg-4 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)">{{$medicalHistory->getToning()}}</label>
                    <label for="fname" class="col-lg-7 text-right control-label">Allenamento Atletico:</label>
                    <label class="col-lg-4 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)">{{$medicalHistory->getAthleticTraining()}}</label>
                    <label for="fname" class="col-lg-7 text-right control-label">Riabilitazione:</label>
                    <label class="col-lg-4 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)">{{$medicalHistory->getRehabilitation()}}</label>
                    <label for="fname" class="col-lg-7 text-right control-label">Sport di Combattimento:</label>
                    <label class="col-lg-4 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)">{{$medicalHistory->getCombatSports()}}</label>
                    <label for="fname" class="col-lg-7 text-right control-label">Altri Obiettivi:</label>
                    <label class="col-lg-4 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)">{{$medicalHistory->getOtherGoals()}}</label>
                    <label for="fname" class="col-lg-7 text-right control-label">Informazioni Importanti:</label>
                    <label class="col-lg-4 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)">{{$medicalHistory->getImportantInformation()}}</label>
                </div>
            </div>
        </div>
    </div>
</div>

