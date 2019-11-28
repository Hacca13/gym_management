<div class="card" style="border-radius: 10px;background-color: #d6d8d8">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-10 col-md-9 col-sm-9" style="text-align: left; margin-top: auto; margin-bottom: auto">
                <form action="/exercisesSearchResultsPage" method="post">
                    @csrf
                    <div class="input-group no-border" >
                        <input type="text" value="" name='searchInput' class="form-control" placeholder="Cerca esercizio...">
                        <button type="submit" class="btn btn-default btn-round btn-just-icon" style="background-color: #3F5469">
                            <i class="fas fa-search"></i>
                            <div class="ripple-container"></div>
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-3" style="text-align: right; margin-top: auto; margin-bottom: auto">
                <a href="/nuovoEsercizio" role="button">
                    <button href="/nuovoEsercizio" class="bttn-material-circle bttn-md bttn-success" style="background-color: #3F5469">
                        <i class="fas fa-plus"></i>
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
