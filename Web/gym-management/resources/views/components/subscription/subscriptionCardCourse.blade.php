<div class="card-hover" style="border-radius: 10px; background-color: #d6d8d8">
    <a data-toggle="collapse" href="#subCourse" role="button" aria-expanded="false"aria-controls="{{'multiCollapseExample' . $loop->index}}">
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
                <div class="col-lg-7 col-md-12 col-sm-12" style="text-align: right; margin-top: auto; margin-bottom: auto">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <h4>Dal: {{$subscription->getStartDate()}}</h4>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <h4>Al: {{$subscription->getEndDate()}}</h4>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </a>
</div>
<div class="col-md-12">
    <div class="collapse multi-collapse" id="subCourse">
        <div class="card card-body"  style="background-color: #d6d8d8; border-radius: 0 0 10px 10px;">
            <div class="row justify-content-center">
                @include('components.subscription.subCourse')
            </div>
        </div>
    </div>
</div>
