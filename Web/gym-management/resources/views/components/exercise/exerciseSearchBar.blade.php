<div class="card" style="border-radius: 10px;background-color: rgb(255, 255, 255,0.7);">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
              <form action="/exercisesSearchResultsPage" method="post">
                @csrf
                <div class="input-group no-border" >
                    <input type="text" value="" name='searchInput' class="form-control" placeholder="Cerca esercizio...">
                    <button type="submit" class="btn btn-default btn-round btn-just-icon" style="background-color: #3F5469">
                        <i class="fas fa-search"></i>
                        <div class="ripple-container"></div>
                    </button>
                  </form>
                    <div class="col-md-1">
                        <a href="nuovoEsercizio" role="button">
                            <button class="bttn-material-circle bttn-md bttn-success" style="background-color: #3F5469">
                                <i class="fas fa-plus"></i>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
