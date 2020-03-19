<div class="card-hover" style="border-radius:10px;background-color: #d6d8d8; margin-top: 2.5%">
    <a data-toggle="collapse" href="{{'#subEntrance' . $loop->index}}" role="button" aria-expanded="false" aria-controls="{{'subEntrance' . $loop->index}}">
        <div class="card-body">
            <?php foreach ($userForSubscriptionPage as $document) {
                if($subscription->getIdUserDatabase() == $document->getIdDatabase()){
                    $user = $document;
                }
            } ?>
            <div class="row">

                <div class="col-lg-3 col-md-6 col-sm-12" style="text-align: center; margin-top: auto; margin-bottom: auto;">
                    <h3>{{$user->getName()}} {{$user->getSurname()}}</h3>
                </div>

                <div class="col-lg-2 col-md-6 col-sm-12" style="text-align: center; margin-top: auto; margin-bottom: auto;">
                    @if($subscription->getIsActive() == TRUE)
                        <h4 style="color: green">ATTIVO</h4>
                    @endif
                    @if($subscription->getIsActive() == FALSE)
                        <h4 style="color: red">INATTIVO</h4>
                    @endif
                </div>
                <div class="col-lg-7 col-md-12 col-sm-12" style="text-align: center; margin-top: auto; margin-bottom: auto;">
                    <div class="row">

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <h4>Numero di entrate effettuate: {{$subscription->getNumberOfEntriesMade()}}</h4>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <h4>Numero di entrate totali: {{$subscription->getNumberOfEntries()}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>
<div class="col-md-12">
    <div class="collapse multi-collapse" id="{{'subEntrance' . $loop->index}}">
        <div class="card card-body"  style="background-color:rgba(186, 186, 186, 0.5); border-radius: 0 0 10px 10px;">
            <div class="row justify-content-center">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    @include('components.subscription.subEntrance')
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</div>
