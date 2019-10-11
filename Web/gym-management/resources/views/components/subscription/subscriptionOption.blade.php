<div class="col-md-12">
  <div class="card" style="border-radius: 10px">
    <div class="card-body">
      <div class="row">
        <div class="col-md-5">
          <div class="input-group no-border">
              <input type="text" value="" class="form-control" placeholder="Search...">
              <button type="submit" class="btn btn-default btn-round btn-just-icon">
                  <i class="fas fa-search"></i>
                  <div class="ripple-container"></div>
              </button>
          </div>
        </div>
        <div class="col-md-3" >
            <div class="input-group no-border">
                <div class="form-check" >
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Abbonamenti Attivi</label>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="input-group no-border">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Abbonamenti Scaduti</label>
                </div>
            </div>
        </div>
        <a data-toggle="collapse" href="#aggiungiAbbonamento" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">
          <h2>
            <i class="fas fa-plus" style="color: black"></i>
          </h2>
        </a>
        <div class="col-md-12">
          <div class="collapse multi-collapse" id="aggiungiAbbonamento">
            <div class="card card-body">
              <div class="row justify-content-center">
                @include('components.subscription.newSubscription')
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
