<div class="card-hover" style="border-radius: 10px;background-color: #d6d8d8">
    <a data-toggle="collapse" href="{{'#multiCollapseExample' . $loop->index}}" role="button" aria-expanded="false" aria-controls="{{'multiCollapseExample' . $loop->index}}">
        <div class="card-body">
          <?php foreach ($userForSubscriptionPage as $document) {
            if($subscription->getIdUserDatabase() == $document->getIdDatabase()){
              $user = $document;
            }
          } ?>
            <div class="row">

                <div class="col-md-3" style="margin-top: auto; margin-bottom: auto;">
                    <h3>{{$user->getName()}} {{$user->getSurname()}}</h3>
                </div>

                <div class="col-md-2" style="text-align: center; margin-top: auto; margin-bottom: auto;">
                    @if($subscription->getIsActive() == TRUE)
                        <h4>ATTIVO</h4>
                    @endif
                    @if($subscription->getIsActive() == FALSE)
                        <h4>INATTIVO</h4>
                    @endif
                </div>

                <div class="col-md-3" style="text-align: right; margin-top: auto; margin-bottom: auto;">
                  <h4>Numero di entrate effettuate: {{$subscription->getNumberOfEntries()}}</h4>
                </div>
                <div class="col-md-3" style="text-align: right; margin-top: auto; margin-bottom: auto;">
                  <h4>Numero di entrate totali: {{$subscription->getNumberOfEntriesMade()}}</h4>
                </div>

            </div>
        </div>

          <a data-toggle="collapse" href="#multiCollapseExample" role="button" aria-expanded="false" aria-controls="multiCollapseExample">
            <h2>
              <i class="mdi mdi-arrow-down-drop-circle" style="color: black"></i>
            </h2>
        </a>
        <div class="col-md-12">
          <div class="collapse multi-collapse" id="multiCollapseExample">
            <div class="card card-body">
              <div class="row justify-content-center">

                    @include('components.subscription.subEntrance')

              </div>
            </div>
        </div>
    </div>
</div>
