
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
            <a data-toggle="collapse" href="#days" role="button" aria-expanded="false" aria-controls="{{'multiCollapseExample' . $loop->index}}">
                <h2>
                    <i class="mdi mdi-arrow-down-drop-circle" style="color: #3F5469"></i>
                </h2>
            </a>

        </div>
        <div class="collapse multi-collapse" id="days">
            <div class="row justify-content-center">
              

                @include('components.exercise.cardDay')


            </div>
        </div>
    </div>
</div>
