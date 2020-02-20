<div class="card" style="border-radius: 10px;background-color: #d6d8d8">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-5 col-md-9 col-sm-12" style="text-align: left; margin-top: auto; margin-bottom: auto">
                <form action="/admin/exercisesSearchResultsPage" method="post">
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
            <div class="col-lg-7 col-md-3 col-sm-12" style="text-align: right; margin-top: auto; margin-bottom: auto">
                <a href="/admin/nuovoEsercizio" role="button" style="padding-left: 60%">
                    <button href="/admin/nuovoEsercizio" class="bttn-material-circle bttn-md bttn-success" style="background-color: #3F5469">
                        <i class="fas fa-plus"></i>
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
