<div class="card" style="border-radius: 10px;background-color: #d6d8d8; margin-bottom: -0.5%">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 col-lg-5 col-sm-12" style="text-align: left; margin-top: auto; margin-bottom: auto">
                <form action="/admin/userSearchResultsPage" method="post">
                  @csrf
                  <div class="input-group no-border">

                      <input type="text" class="form-control" name='searchInput' placeholder="Cerca Utente...">
                      <button type="submit" class="btn btn-default btn-round btn-just-icon" style="background-color: #3F5469">
                          <i class="fas fa-search"></i>
                          <div class="ripple-container"></div>
                      </button>

                  </div>
                </form>
            </div>
            <div class="col-lg-5 col-md-9 col-sm-9" style="text-align: center; margin-top: auto; margin-bottom: auto">
                <div class="row">
                    <div class="col-md-12 col-lg-6 col-sm-12">
                        <div class="input-group no-border">
                            <div class="form-check" >
                                <input type="checkbox" class="form-check-input" id="utenteAttivo" checked="checked">
                                <label class="form-check-label" for="utenteAttivo">Utenti Attivi</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 col-sm-12">
                        <div class="input-group no-border">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="utenteInattivo" checked="checked">
                                <label class="form-check-label" for="utenteInattivo">Utenti Inattivi</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-3" style="text-align: right; margin-top: auto; margin-bottom: auto">
                <a href="/admin/nuovoIscritto" role="button">
                    <button class="bttn-material-circle bttn-md bttn-success" style="background-color: #3F5469">
                        <i class="fas fa-plus"></i>
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
<script>
    function myFunction() {
        document.getElementById("utenteInattivo").disabled = true;
    }
</script>
<script>
    function myFunction() {
        document.getElementById("utenteAttivo").disabled = true;
    }
</script>
