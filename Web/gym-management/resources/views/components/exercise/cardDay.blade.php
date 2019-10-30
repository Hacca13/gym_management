<div class="card" style="border-radius: 10px; background-color: rgb(255, 255, 255,0.7);">
    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-md-4" style="margin-top: auto; margin-bottom: auto;">
                <p>Giorno della settimana</p>
            </div>
            <div class="col-md-2">

                <a data-toggle="collapse" href="{{'#multiCollapseExample' . $loop->index}}" role="button" aria-expanded="false" aria-controls="{{'multiCollapseExample' . $loop->index}}">
                    <h2>
                        <i class="mdi mdi-arrow-down-drop-circle" style="color: #3F5469"></i>
                    </h2>
                </a>
            </div>
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
