<div class="card-hover" style="border-radius: 10px;background-color: #d6d8d8">
    <a data-toggle="collapse" href="#days" role="button" aria-expanded="false" aria-controls="{{'multiCollapseExample' . $loop->index}}">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 col-lg-4 col-sm-6" style="margin-top: auto; margin-bottom: auto;">
                    @foreach ($usersList as $user)
                        @if($trainingCard->getIdUserDatabase() == $user->getIdDatabase())
                            <h3>{{$user->getName()}} {{$user->getSurname()}}</h3>
                        @endif
                    @endforeach
                </div>
                <div class="col-sm-6 col-md-8 col-lg-8" style="margin-top: auto; margin-bottom: auto;">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12" style="text-align: right; margin-top: auto; margin-bottom: auto;">
                            <h4>Dal: {{$trainingCard->getPeriod()['startDate']}}</h4>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12" style="text-align: right; margin-top: auto; margin-bottom: auto;">
                            <h4>Al: {{$trainingCard->getPeriod()['endDate']}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>
<div class="col-md-12">
    <div class="collapse multi-collapse" id="days">
        <div class="card card-body" style="border-radius: 0 0 10px 10px;background-color: #d6d8d8">
            <div class="row justify-content-center">

                @include('components.exercise.cardDay')

            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-12 col-sm-12" style="text-align: center; margin-bottom: 5px;">
                    <a href="#">
                        <button class="btn btn-warning" id="fname" name="" style="border-radius: 10px;">Modifica</button>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12" style="text-align: center; margin-bottom: 5px;">
                    <a href="#">
                        <button class="btn btn-primary" id="fname" name="" style="border-radius: 10px;">Elimina</button>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12" style="text-align: center; margin-bottom: 5px;">
                    <a href="/gestioneSchede">
                        <button class="btn btn-danger" id="fname" name="" style="border-radius: 10px;">Disattiva</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
