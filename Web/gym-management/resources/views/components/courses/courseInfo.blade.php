<div class="row">
    <div class="col-md-12">
        <div class="card" style="border-radius: 10px;background-color:rgb(255, 255, 255,0.5);">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6" style="text-align: start">
                        <a href="#">
                            <i class="fas fa-edit" style="font-size: 150%; color: black;"></i>
                        </a>
                    </div>
                    <div class="col-md-6" style="text-align: end">
                        <a href="nuovoCorso">
                            <i class="fas fa-times" style="font-size: 170%; color: red; margin-left: 2.5%"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card" style="border-radius: 10px;background-color: rgb(255, 255, 255,0.7);">
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
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <div class="col-sm-9">
                                    <label for="fname" class="col-sm-6 text-right control-label col-form-label" style="font-family: bold">Immagine del Corso:</label>
                                    <img src="{{$course->getImage()}}" class="img embed-responsive">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
