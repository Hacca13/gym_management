
<div class="col-md-4" style="margin-top: 2.5%">
    <div class="card" style="border-radius: 10px; background-color: #d6d8d8">
        <div class="card-header">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8" style="text-align: center">
                    <h3>{{$exercise->getName()}}</h3>
                </div>
                <div class="col-md-2" style="text-align: end">
                    <a href="#">
                        <i class="fas fa-times" style="font-size: 170%; color: red; margin-left: 2.5%"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body" >
            <div class="row">
                <div class="col-md-12">
                    <div class="car-title">
                        <img src="{{$exercise->getGif()}}" class="img-fluid" alt="">
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-center"><!--CAMBIARE QUESTO HREF-->
                                <div class="col-md-12" style="border-radius: 10px;">

                                    @foreach($trainingCard->getExercises() as $exerciseTrainingCard)

                                        @if($exerciseTrainingCard['idExerciseDatabase'] == $exercise->getIdDatabase())
                                        <h6>
                                            Numero di Serie: {{$exerciseTrainingCard['numberOfSeries']}}
                                            @if($exerciseTrainingCard['atTime'] == FALSE)
                                                <br>
                                                Numero di Ripetizioni: {{$exerciseTrainingCard['numberOfRepetitions']}}
                                            @endif
                                        </h6>
                                            <hr>
                                            <h6>
                                                Tempo di Riposo:
                                                <br>
                                                {{data_get($exerciseTrainingCard['rest'],'min')}}m :

                                                {{data_get($exerciseTrainingCard['rest'],'sec')}}s
                                            </h6>
                                            @if($exerciseTrainingCard['atTime'] == TRUE)

                                                <h6>
                                                    Workout Time:
                                                    <br>
                                                    {{data_get($exerciseTrainingCard['work'],'min')}}m :
                                                    {{data_get($exerciseTrainingCard['work'],'sec')}}s
                                                </h6>
                                            @endif

                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
