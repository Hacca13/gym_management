<div class="row">
    <div class="col-md-12">
        <div class="card" style="border-radius: 10px;background-color:rgb(255, 255, 255,0.4);">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label for="fname" class="col-lg-5 text-right control-label">Nome Corso:</label>
                        <label class="col-lg-6 text-center col-form-label" style="color:rgb(31, 38, 45, 0.8)">{{$course->getName()}}</label>
                        <label for="fname" class="col-lg-5 text-right control-label">Nome Istruttore:</label>
                        <label class="col-lg-6 text-center col-form-label" style="color:rgb(31, 38, 45, 0.8)">{{$course->getInstructor()}}</label>
                        <label for="fname" class="col-lg-5 text-right control-label">Durata:</label>
                        <label class="col-lg-6 text-center col-form-label" style="color:rgb(31, 38, 45, 0.8)"></label>
                        <label class="col-lg-5 text-right control-label">Dal:</label>
                        <label class="col-lg-6 text-center col-form-label" style="color:rgb(31, 38, 45, 0.8)">{{$course->getPeriod()['startDate']}}</label>
                        <label class="col-lg-5 text-right control-label">Al:</label>
                        <label class="col-lg-6 text-center col-form-label" style="color:rgb(31, 38, 45, 0.8)">{{$course->getPeriod()['endDate']}}</label>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label for="fname" class="col-sm-6 text-right control-label">Immagine del Corso:</label>
                        <img src="{{$course->getImage()}}" height="180dpi" width="200dpi" class="img embed-responsive">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6 col-sm-12" style="text-align: center; margin-bottom: 5px;">
                    <a href="#">
                        <button class="btn btn-warning" id="fname" name="" style="border-radius: 10px;">Modifica</button>
                    </a>
                </div>
                @if($course->getIsActive() == TRUE)
                    <div class="col-lg-6 col-md-6 col-sm-12" style="text-align: center; margin-bottom: 5px;">
                        <a href="/gestioneCorsi">
                            <button class="btn btn-danger" id="fname" name="" style="border-radius: 10px;">Disattiva</button>
                        </a>
                    </div>
                @endif
                @if($course->getIsActive() == FALSE)
                    <div class="col-lg-6 col-md-6 col-sm-12" style="text-align: center; margin-bottom: 5px;">
                        <a href="/gestioneCorsi">
                            <button class="btn btn-success" id="fname" name="" style="border-radius: 10px;">Attiva</button>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
