<div class="card-hover" style="border-radius: 10px;background-color: #d6d8d8">
    <a data-toggle="collapse" href="{{'#multiCollapseExample' . $loop->index}}" role="button" aria-expanded="false" aria-controls="{{'multiCollapseExample' . $loop->index}}">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3" style="margin-top: auto; margin-bottom: auto;">
                    <h3>Name</h3>
                </div>
                <div class="col-md-3" style="text-align: right; margin-top: auto; margin-bottom: auto;">
                    <h4>Dal: 23/03/2019</h4>
                </div>
                <div class="col-md-3" style="text-align: right; margin-top: auto; margin-bottom: auto;">
                    <h4>Entrate: 4</h4>
                </div>

            </div>
        </div>
    </a>
</div>
<div class="col-md-12">
    <div class="collapse multi-collapse" id="multiCollapseExample">
        <div class="card card-body">
            <div class="row justify-content-center">
                @foreach($subscriptionList as $subscription)
                    @if($subscription->getType() == 'revenue')
                        @include('components.subscription.subEntrance')
                    @endif
                    @if($subscription->getType() == 'period')
                        @include('components.subscription.subPeriod')
                    @endif
                    @if($subscription->getType() == 'course')
                        @include('components.subscription.subCourse')
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
