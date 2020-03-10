    <div class="col-md-12">
        <div class="card" style="border-radius: 10px;background-color:#d6d8d8">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label for="fname" class="col-lg-5 text-right control-label">Nome Corso:</label>
                        <label class="col-lg-6 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)">{{$course->getName()}}</label>
                        <label for="fname" class="col-lg-5 text-right control-label">Nome Istruttore:</label>
                        <label class="col-lg-6 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)">{{$course->getInstructor()}}</label>
                        <label class="col-lg-5 text-right control-label">Dal:</label>
                        <label class="col-lg-6 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)">{{$course->getPeriod()['startDate']}}</label>
                        <label class="col-lg-5 text-right control-label">Al:</label>
                        <label class="col-lg-6 text-center col-form-label" style="color:rgba(31, 38, 45, 0.8)">{{$course->getPeriod()['endDate']}}</label>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label for="fname" class="col-sm-6 text-right control-label">Immagine del Corso:</label>
                        <img src="{{$course->getImage()}}" height="180dpi" width="200dpi" class="img embed-responsive">
                    </div>
                </div>
            </div>
        </div>
    </div>
