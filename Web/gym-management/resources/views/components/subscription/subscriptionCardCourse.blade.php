<div class="col-md-12">
    <div class="card" style="border-radius: 10px">
        <div class="card-body">
          <?php foreach ($userForSubscriptionPage as $document) {
            if($subscription->getIdUserDatabase() == $document->getIdDatabase()){
              $user = $document;
            }
          } ?>
            <div class="row">

                <div class="col-md-3" style="text-align: left; margin-top: auto; margin-bottom: auto;">
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
                    <h4>Dal: {{$subscription->getStartDate()}}</h4>
                </div>
                <div class="col-md-3" style="text-align: right; margin-top: auto; margin-bottom: auto;">
                    <h4>Al: {{$subscription->getEndDate()}}</h4>
                </div>
            </div>

        </div>
    </a>
</div>
<div class="col-md-12">
    <div class="collapse multi-collapse" id="subPeriod">
        <div class="card card-body"  style="background-color: #d6d8d8; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
            <div class="row justify-content-center">
                @include('components.subscription.subCourse')
            </div>
        </div>
    </div>
</div>
