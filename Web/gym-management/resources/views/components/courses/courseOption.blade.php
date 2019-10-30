<div class="card" style="border-radius: 10px;background-color:rgb(255, 255, 255,0.7)">
    <div class="card-body">
        <div class="row">
            <div class="col-md-5">
              <form action="/coursesSearchResultsPage" method="post">
                @csrf
                <div class="input-group no-border">
                    <input type="text" value="" name='searchInput' class="form-control" placeholder="Cerca...">
                    <button type="submit" class="btn btn-default btn-round btn-just-icon" style="background-color: #3F5469">
                        <i class="fas fa-search"></i>
                        <div class="ripple-container">
                        </div>
                    </button>
                </div>
              </form>
            </div>
            <div class="col-md-3" >
                <div class="input-group no-border">
                    <div class="form-check" >
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Corsi Attivi</label>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="input-group no-border">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Corsi Non Attivi</label>
                    </div>
                </div>
            </div>
            <div class="col-md-1" style="text-align: center; margin-top: auto; margin-bottom: auto">
                <a href="nuovoCorso" role="button">
                    <button class="bttn-material-circle bttn-md bttn-success" style="background-color: #3F5469">
                        <i class="fas fa-plus"></i>
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
