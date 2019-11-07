<div class="col-md-4">
    <div class="card" style="border-radius: 10px;">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6" style="text-align: start">
                  <a href="modificaEsercizio/{{$exercise->getIdDatabase()}}">
                      <i class="fas fa-edit" style="font-size: 150%; color: black;"></i>
                    </a>
                </div>
                <div class="col-md-6" style="text-align: end">
                    <a href="Esercizio">
                        <i class="fas fa-times" style="font-size: 170%; color: red; margin-left: 2.5%"></i>
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
