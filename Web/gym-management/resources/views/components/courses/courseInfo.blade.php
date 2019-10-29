<div class="row">
    <div class="col-md-12">
        <div class="card" style="border-radius: 10px;background-color:rgb(255, 255, 255,0.4);">
            <div class="card" style="border-radius: 10px;background-color: rgb(255, 255, 255,0.4);">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <div class="col-sm-9">
                                    <label for="fname" class="col-sm-6 text-left control-label col-form-label" style="font-family: bold">Nome Corso:</label>
                                    <label>{{$course->getName()}}</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-9">
                                    <label for="fname" class="col-sm-6 text-left control-label col-form-label" style="font-family: bold">Nome Istruttore:</label>
                                    <label>{{$course->getInstructor()}}</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-9">
                                    <label for="fname" class="col-sm-6 text-left control-label col-form-label" style="font-family: bold">Durata:</label>
                                    <label>Dal: {{$course->getPeriod()['startDate']}} Al: {{$course->getPeriod()['endDate']}}</label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-9">
                                    <label for="fname" class="col-sm-6 text-left control-label col-form-label" style="font-family: bold">Iscritti al Corso:</label>
                                    <label>1</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <div class="col-sm-9">
                                    <label for="fname" class="col-sm-6 text-right control-label col-form-label" style="font-family: bold">Immagine del Corso:</label>
                                    <img src="{{$course->getImage()}}" height="180dpi" width="200dpi" class="img embed-responsive">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
