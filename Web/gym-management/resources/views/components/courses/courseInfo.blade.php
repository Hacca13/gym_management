
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
                    <a href="#">
                        <i class="fas fa-times" style="font-size: 170%; color: red; margin-left: 2.5%"></i>
                    </a>
                </div>
            </div>
        </div>
        <form class="form-horizontal" method="get">
        <div class="card-body">
            <div class="form-group row">
                <label for="fname" class="col-sm-3 text-right control-label col-form-label"><b>Nome Corso</b></label>
                <div class="col-sm-5">
                    <label for="fname" class="col-sm-12 text-left control-label col-form-label">{{$course->getName()}}</label>
                </div>
            </div>
            <div class="form-group row">
                <label for="fname" class="col-sm-3 text-right control-label col-form-label"><b>Nome Istruttore</b></label>
                <div class="col-sm-5">
                    <label for="fname" class="col-sm-12 text-left control-label col-form-label">{{$course->getInstructor()}}</label>
                </div>
            </div>
            <div class="form-group row">
                <label for="fname" class="col-sm-3 text-right control-label col-form-label"><b>Durata del Corso</b></label>
                <div class="col-sm-5">
                    <label for="fname" class="col-sm-12 text-left control-label col-form-label">Dal: {{data_get($course->getPeriod(),'startDate')}} Al: {{data_get($course->getPeriod(),'endDate')}}</label>
                </div>
            </div>
            <div class="form-group row">
                <label for="fname" class="col-sm-3 text-right control-label col-form-label"><b>Immagine del Corso</b></label>
                <div class="col-sm-12">
                  <img src="{{$course->getImage()}}" height="400" width="500" alt="Immagine Corso">
                </div>
            </div>
        </div>
        </form>
    </div>

</div>
