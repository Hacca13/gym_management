
<div class="col-lg-4 col-md-6 col-sm-12" style="margin-top: 2.5%">
    <div class="card">
        <div class="card-header" style="background-color: #bababa; border-radius: 10px 10px 0 0; border-right: 0.5px solid rgb(31, 38, 45, 0.6); border-left: 0.5px solid rgb(31, 38, 45, 0.4); border-top: 0.5px solid rgb(31, 38, 45, 0.3)">
            <div class="row">
                <div class="col-lg-10 col-md-10 col-sm-10" style="text-align: left; margin-top: auto; margin-bottom: auto">
                    <h3 style="color: rgb(31, 38, 45, 0.8)">{{$exercise->getName()}}</h3>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-2" style="text-align: right; margin-top: auto; margin-bottom: auto">
                    <a href="#">
                        <i class="fas fa-times" style="font-size: 170%; color: red; margin-left: 2.5%"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="card-body" style="background-color: #d6d8d8; border-radius: 0 0 10px 10px; border-right: 0.5px solid rgb(31, 38, 45, 0.6); border-left: 0.5px solid rgb(31, 38, 45, 0.4); border-bottom: 0.5px solid rgb(31, 38, 45, 0.8)">
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
