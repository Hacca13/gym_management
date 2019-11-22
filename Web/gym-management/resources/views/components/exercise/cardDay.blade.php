<div class="col-md-6 col-lg-2 col-sm-12">
    <div class="card card-hover" style="background-color: rgb(31, 38, 45, 0.8)">
        <a data-toggle="collapse" href="{{'#multiCollapseExample' . $loop->index}}" role="button" aria-expanded="false" aria-controls="{{'multiCollapseExample' . $loop->index}}">
            <div class="box bg-dark text-center">
                <h3 class="text-white">Lunedì</h3>
            </div>
        </a>
    </div>
</div>
<div class="collapse multi-collapse" id="{{'multiCollapseExample' . $loop->index}}">
    <div class="card" style="background-color: rgb(31, 38, 45, 0.8)">

    <div class="col-md-12">
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


