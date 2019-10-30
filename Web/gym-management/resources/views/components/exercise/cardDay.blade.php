<div class="col-md-3">
    <a data-toggle="collapse" href="{{'#multiCollapseExample' . $loop->index}}" role="button" aria-expanded="false" aria-controls="{{'multiCollapseExample' . $loop->index}}">
        <button type="button" class="btn btn-secondary" style="border-radius: 10px;">
            Giorno della settimana
        </button>
    </a>
</div>
<div class="collapse multi-collapse" id="{{'multiCollapseExample' . $loop->index}}">
    <div class="col-md-12">
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


