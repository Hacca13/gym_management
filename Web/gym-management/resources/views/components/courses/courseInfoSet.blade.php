<div class="row">
    <div class="col-md-12">
        <div class="card" style="border-radius: 10px;background-color:rgba(255, 255, 255,0.4);">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label for="fname" class="col-lg-5 text-right control-label">Nome Corso:</label>
                        <input class="col-lg-6 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)" placeholder="{{$course->getName()}}">
                        <label for="fname" class="col-lg-5 text-right control-label">Nome Istruttore:</label>
                        <input class="col-lg-6 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)" placeholder="{{$course->getInstructor()}}">
                        <label for="fname" class="col-lg-5 text-right control-label">Durata:</label>
                        <input class="col-lg-6 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)" placeholder="">
                        <label class="col-lg-5 text-right control-label">Dal:</label>
                        <input class="col-lg-6 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)" placeholder="{{$course->getPeriod()['startDate']}}"></input>
                        <label class="col-lg-5 text-right control-label">Al:</label>
                        <input class="col-lg-6 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)" placeholder="{{$course->getPeriod()['endDate']}}">
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label for="fname" class="col-sm-6 text-right control-label">Immagine del Corso:</label>
                        <img src="{{$course->getImage()}}" height="180dpi" width="200dpi" class="img embed-responsive">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 col-sm-12" style="text-align: center; margin-bottom: 5px;">
                <a id="{{'button' . $loop->index}}" href="#">
                    <button id="{{'button1' . $loop->index}}" class="btn btn-warning" id="fname" name="" style="border-radius: 10px;">Modifica</button>
                </a>
            </div>
            @if($course->getIsActive() == TRUE)
                <div class="col-lg-6 col-md-6 col-sm-12" style="text-align: center; margin-bottom: 5px;">
                    <a href="/admin/gestioneCorsi">
                        <button class="btn btn-danger" id="fname" name="" style="border-radius: 10px;">Disattiva</button>
                    </a>
                </div>
            @endif
            @if($course->getIsActive() == FALSE)
                <div class="col-lg-6 col-md-6 col-sm-12" style="text-align: center; margin-bottom: 5px;">
                    <a href="/admin/gestioneCorsi">
                        <button class="btn btn-success" id="fname" name="" style="border-radius: 10px;">Attiva</button>
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
