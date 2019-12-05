<div class="card-hover" style="border-radius: 10px;background-color: #d6d8d8">
    <a data-toggle="collapse" href="{{'#days' . $loop -> index}}" role="button" aria-expanded="false" aria-controls="{{'multiCollapseExample' . $loop->index}}">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 col-lg-4 col-sm-4" style="margin-top: auto; margin-bottom: auto;">
                  <?php $stamp = true; ?>
                    @foreach ($usersList as $user)
                        @if(($trainingCard->getIdUserDatabase() == $user->getIdDatabase()) && ($stamp==true))
                            <h3 style="color: rgba(31, 38, 45, 0.8)">{{$user->getName()}} {{$user->getSurname()}}</h3>
                            <?php $stamp = false; ?>
                        @endif
                    @endforeach
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4" style="text-align: center; margin-top: auto; margin-bottom: auto;">
                    @if($trainingCard->getIsActive() == TRUE)
                        <h4 style="color: green">ATTIVO</h4>
                    @endif
                    @if($trainingCard->getIsActive() == FALSE)
                        <h4 style="color: #D5300D">INATTIVO</h4>
                    @endif
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4" style="margin-top: auto; margin-bottom: auto;">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12" style="text-align: right; margin-top: auto; margin-bottom: auto;">
                            <h4 style="color: #1F262D; opacity: 0.8">Dal: {{$trainingCard->getPeriod()['startDate']}}</h4>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12" style="text-align: right; margin-top: auto; margin-bottom: auto;">
                            <h4 style="color: #1F262D; opacity: 0.8">Al: {{$trainingCard->getPeriod()['endDate']}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>
<div class="col-md-12">
    <div class="collapse multi-collapse" id="{{'days' . $loop -> index}}">
        @include('components.exercise.cardDay')
    </div>
</div>
