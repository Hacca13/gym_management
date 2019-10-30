<div class="row justify-content-center" style="margin-top: 2.5%">
    <div class="col-md-10">
        <div class="card" style="border-radius: 10px;background-color: rgb(255, 255, 255,0.7);">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4" style="margin-top: auto; margin-bottom: auto;">
                      @foreach ($usersList as $user)
                        @if($trainingCard->getIdUserDatabase() == $user->getIdDatabase())
                          <h4>Scheda di : {{$user->getName()}} {{$user->getSurname()}}</h4>
                        @endif
                      @endforeach
                    </div>
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-3" style="text-align: right; margin-top: auto; margin-bottom: auto;">
                        <h5>Dal: {{$trainingCard->getPeriod()['startDate']}}</h5>
                    </div>
                    <div class="col-md-3" style="text-align: right; margin-top: auto; margin-bottom: auto;">
                        <h5>Al: {{$trainingCard->getPeriod()['endDate']}}</h5>
                    </div>
                    <a data-toggle="collapse" href="{{'#multiCollapseExample' . $loop->index}}" role="button" aria-expanded="false" aria-controls="{{'multiCollapseExample' . $loop->index}}">
                        <h2>
                            <i class="mdi mdi-arrow-down-drop-circle" style="color: black"></i>
                        </h2>
                    </a>
                    <div class="col-md-12">
                        <div class="collapse multi-collapse" id="{{'multiCollapseExample' . $loop->index}}">
                            <div class="card card-body">
                                <div class="row justify-content-center">
                                  @foreach ($exerciseListBig as $exerciseList)
                                    @if(data_get($exerciseList,'idDatabase') == $trainingCard->getIdDatabase())
                                      @foreach ( data_get($exerciseList,'exercises') as $exercise)
                                        @include('components.exercise.cardExerciseForTrainingCard')
                                      @endforeach
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
