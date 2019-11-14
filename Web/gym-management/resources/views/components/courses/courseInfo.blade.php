<div class="row">
    <div class="col-md-12">
        <div class="card" style="border-radius: 10px;background-color:rgb(255, 255, 255,0.4);">
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
                                    <br>
                                    <label class="col-sm-6 text-right control-label col-form-label" style="font-family: bold">Dal:</label> {{$course->getPeriod()['startDate']}}
                                    <br>
                                    <label class="col-sm-6 text-right control-label col-form-label" style="font-family: bold">Al:</label> {{$course->getPeriod()['endDate']}}
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
                    <div class="form-group row">
                        <div class="card-body">
                            <a href="/modificaCorso/{{$course->getIdDatabase()}}">
                                <button class="btn btn-warning" id="fname" name="" style="border-radius: 10px;">Modifica</button>
                            </a>
                        </div>

                        @if($course->getIsActive() == TRUE)
                          <div class="card-body offset-8">
                            <a href="/gestioneCorsi">
                                <button class="btn btn-danger" id="fname" name="" style="border-radius: 10px;">Disattiva</button>
                            </a>
                          </div>
                        @endif
                        @if($course->getIsActive() == FALSE)
                        <div class="card-body offset-8">
                          <a href="/gestioneCorsi">
                              <button class="btn btn-success" id="fname" name="" style="border-radius: 10px;">Attiva</button>
                          </a>
                        </div>
                        @endif



                    </div>
                </div>
        </div>
    </div>
</div>
