
<div class="card-hover" style="border-radius: 10px;background-color: #d6d8d8">
    <a data-toggle="collapse" href="#days" role="button" aria-expanded="false" aria-controls="{{'multiCollapseExample' . $loop->index}}">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4" style="margin-top: auto; margin-bottom: auto;">
                    @foreach ($usersList as $user)
                        @if($trainingCard->getIdUserDatabase() == $user->getIdDatabase())
                            <h3>Scheda di : {{$user->getName()}} {{$user->getSurname()}}</h3>
                        @endif
                    @endforeach
                </div>
                <div class="col-md-1">
                </div>
                <div class="col-md-3" style="text-align: right; margin-top: auto; margin-bottom: auto;">
                    <h4>Dal: {{$trainingCard->getPeriod()['startDate']}}</h4>
                </div>
                <div class="col-md-3" style="text-align: right; margin-top: auto; margin-bottom: auto;">
                    <h4>Al: {{$trainingCard->getPeriod()['endDate']}}</h4>
                </div>
            </div>
        </div>
    </a>
</div>
<div class="col-md-12">
    <div class="collapse multi-collapse" id="days">
        <div class="card card-body" style="border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;background-color: #d6d8d8">
            <div class="row justify-content-center">
              

                @include('components.exercise.cardDay')


            </div>
        </div>
    </div>
</div>
