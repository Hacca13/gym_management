<div class="col-md-12">
  <div class="card" style="border-radius: 10px; border: 1px red solid">
    <div class="card-body">
      <div class="row">
        <div class="col-md-5" style="margin-top: auto; margin-bottom: auto;">
          <h3>{{$user->getName()}}</h3>
        </div>
        <div class="col-md-3" style="text-align: right; margin-top: auto; margin-bottom: auto;">
          <h4>Dal: 23/03/2019</h4>
        </div>
        <div class="col-md-3" style="text-align: right; margin-top: auto; margin-bottom: auto;">
          <h4>Entrate: 4</h4>
        </div>
          <a data-toggle="collapse" href="#multiCollapseExample{{$loop->index}}" role="button" aria-expanded="false" aria-controls="multiCollapseExample{{$loop->index}}">
          <h2>
            <i class="mdi mdi-arrow-down-drop-circle" style="color: black"></i>
          </h2>
        </a>
        <div class="col-md-12">
          <div class="collapse multi-collapse" id="multiCollapseExample{{$loop->index}}">
            <div class="card card-body">
              <div class="row justify-content-center">
                @include('components.subscription.recordSubscriptionEntrance')
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
