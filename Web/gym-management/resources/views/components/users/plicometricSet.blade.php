<div class="collapse multi-collapse" id="{{'plicometricSet' . $loop->index}}">
    <br>
    <div class="col-md-12">
        <div class="card card-body" style="border-radius: 10px;background-color: #d6d8d8">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h3 style="text-align: center; color:rgba(31, 38, 45, 0.8)">Modifica dati pliconometrici</h3>
                </div>
                <?php
                  $medicalHistory = data_get($medicalHistoryForUsers, $user->getIdDatabase());
                 ?>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <label for="fname" class="col-lg-7 text-right control-label">Peso (kg):</label>
                    <input class="col-lg-4 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)" placeholder="{{$medicalHistory->getWeight()}}">
                    <label for="fname" class="col-lg-7 text-right control-label">Altezza (cm):</label>
                    <input class="col-lg-4 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)" placeholder="{{$medicalHistory->getHeight()}}">
                    <label for="fname" class="col-lg-7 text-right control-label">IMC:</label>
                    <input class="col-lg-4 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)" placeholder="{{$medicalHistory->getImc()}}">
                    <label for="fname" class="col-lg-7 text-right control-label">Sport praticati precedentemente:</label>
                    <input class="col-lg-4 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)" placeholder="{{$medicalHistory->getPreviousSport()}}">
                    <label for="fname" class="col-lg-7 text-right control-label">Tempo sport praticati precedentemente:</label>
                    <input class="col-lg-4 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)" placeholder="{{$medicalHistory->getPreviousSportTime()}}">
                    <label for="fname" class="col-lg-7 text-right control-label">Tempo inattivo:</label>
                    <input class="col-lg-4 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)" placeholder="{{$medicalHistory->getInactiveTime()}}">
                    <label for="fname" class="col-lg-7 text-right control-label">Dati plicometrici:</label>
                    <input class="col-lg-4 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)" placeholder="{{$medicalHistory->getPlicometricData()}}">
                </div>
                <br>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <label for="fname" class="col-lg-7 text-right control-label">Ipertrofia:</label>
                    <input class="col-lg-4 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)" placeholder="{{$medicalHistory->getHypertrophy()}}">
                    <label for="fname" class="col-lg-7 text-right control-label">Dimagrimento:</label>
                    <input class="col-lg-4 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)" placeholder="{{$medicalHistory->getSlimming()}}">
                    <label for="fname" class="col-lg-7 text-right control-label">Tonificazione:</label>
                    <input class="col-lg-4 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)" placeholder="{{$medicalHistory->getToning()}}">
                    <label for="fname" class="col-lg-7 text-right control-label">Allenamento Atletico:</label>
                    <input class="col-lg-4 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)" placeholder="{{$medicalHistory->getAthleticTraining()}}">
                    <label for="fname" class="col-lg-7 text-right control-label">Riabilitazione:</label>
                    <input class="col-lg-4 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)" placeholder="{{$medicalHistory->getRehabilitation()}}">
                    <label for="fname" class="col-lg-7 text-right control-label">Sport di Combattimento:</label>
                    <input class="col-lg-4 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)" placeholder="{{$medicalHistory->getCombatSports()}}">
                    <label for="fname" class="col-lg-7 text-right control-label">Altri Obiettivi:</label>
                    <input class="col-lg-4 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)" placeholder="{{$medicalHistory->getOtherGoals()}}">
                    <label for="fname" class="col-lg-7 text-right control-label">Informazioni Importanti:</label>
                    <input class="col-lg-4 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)" placeholder="{{$medicalHistory->getImportantInformation()}}">
                </div>
            </div>
        </div>
    </div>
</div>

