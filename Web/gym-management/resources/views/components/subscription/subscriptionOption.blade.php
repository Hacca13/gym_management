<div class="card" style="border-radius: 10px;background-color: #d6d8d8; margin-bottom: -0.5%">
    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-10 col-sm-8" style="text-align: left; margin-top: auto; margin-bottom: auto">
              <form action="/admin/subscriptionSearchResultsPage" method="post">
                @csrf
                <div class="input-group no-border">
                    <input type="text" value="" class="form-control" name='searchInput' placeholder="Abbonamento di...">
                    <button type="submit" class="btn btn-default btn-round btn-just-icon" style="background-color: #3F5469">
                        <i class="fas fa-search"></i>
                        <div class="ripple-container"></div>
                    </button>
                </div>
              </form>
            </div>

            <div class="col-lg-1 col-md-2 col-sm-4" style="text-align: right; margin-top: auto; margin-bottom: auto">

                <a href="/admin/nuovoAbbonamento" role="button">
                    <button class="bttn-material-circle bttn-md bttn-primary" style="background-color: #3F5469">
                        <i class="fas fa-plus"></i>
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
