<div class="col-md-4">
    <div class="card" style="border-radius: 10px;">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6" style="text-align: end">
                    <a href="modificaEsercizio">
                        <i class="fas fa-times" style="font-size: 170%; color: red; margin-left: 2.5%"></i>
                    </a>
                </div>
                <div class="col-md-6" style="text-align: end">

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
                          <div class="col-md-12" style="border-radius: 10px;">
                              <h6>
                                Descrizione:

                                {{$exercise->getDescription()}}

                                @foreach($trainingCard->getExercises() as $exerciseTrainingCard)
                                  @if($exerciseTrainingCard['idExerciseDatabase'] == $exercise->getIdDatabase())
                                          <br>
                                    Numero di Serie: {{$exerciseTrainingCard['numberOfSeries']}}
                                    @if($exerciseTrainingCard['atTime'] == FALSE)
                                              <br>
                                      Numero di Ripetizioni: {{$exerciseTrainingCard['numberOfRepetitions']}}

                                    @endif
                                    @if($exerciseTrainingCard['atTime'] == TRUE)
                                              <br>
                                              Workout Time:
                                      Minuti: {{data_get($exerciseTrainingCard['workoutTime'],'minutes')}}
                                      Secondi: {{data_get($exerciseTrainingCard['workoutTime'],'seconds')}}
                                    @endif
                                          <br>
                                    Tempo di Riposo:

                                    Minuti: {{data_get($exerciseTrainingCard['restTime'],'minutes')}}

                                    Secondi: {{data_get($exerciseTrainingCard['restTime'],'seconds')}}

                                  @endif
                                @endforeach

                              </h6>
                          </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>
</div>
