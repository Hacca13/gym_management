<div class="col-lg-4 col-md-6 col-sm-12" style="margin-top: 2.5%">
    <div class="card" style="border-radius: 10px; background-color: #d6d8d8">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6" style="text-align: left; margin-top: auto; margin-bottom: auto">
                  <a href="modificaEsercizio/{{$exercise->getIdDatabase()}}">
                      <i class="fas fa-edit" style="font-size: 150%; color: black;"></i>
                    </a>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6" style="text-align: right; margin-top: auto; margin-bottom: auto">
                    <a href="eliminaEsercizio/{{$exercise->getIdDatabase()}}">
                        <i class="fas fa-times" style="font-size: 170%; color: red"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-body">
                        <img src="{{$exercise->getGif()}}" class="img-fluid" alt="">
                        <h3 style="text-align: center; margin-top: 2.5%"></h3>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h3>{{$exercise->getName()}}</h3>
                        </div>
                        <div class="col-md-12 text-center"><!--CAMBIARE QUESTO HREF-->
                            @include('components.exercise.descriptionExercise')
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>
</div>
