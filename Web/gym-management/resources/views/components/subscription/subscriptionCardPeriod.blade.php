<div class="card-hover" style="border-radius: 10px;background-color: #d6d8d8" id="scroll" >
    <a data-toggle="collapse" href="#subPeriod" role="button" aria-expanded="false" onclick="border()" aria-controls="{{'multiCollapseExample' . $loop->index}}">
        <div class="card-body" >
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
                    <h4>Dal: f23/03/2019</h4>
                </div>
                <div class="col-md-3" style="text-align: right; margin-top: auto; margin-bottom: auto;">
                    <h4>Al: 23/04/2019</h4>
                </div>
            </div>

        </div>
    </a>
</div>
<div class="col-md-12">
    <div class="collapse multi-collapse" id="subPeriod">
        <div class="card card-body"  style="background-color: #d6d8d8; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
            <div class="row justify-content-center">
                @include('components.subscription.subPeriod')
            </div>
        </div>
    </div>
</div>

<script>

    function border() {

        let x = document.getElementById('scroll').setAttribute('style', 'border-bottom-left-radius: 0px; border-bottom-right-radius: 0px; border-top-left-radius: 10px; border-top-right-radius: 10px; background-color: #d6d8d8');
    }
</script>
