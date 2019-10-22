
<div class="card" style="border-radius: 10px;background-color: rgb(255, 255, 255,0.7);">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="input-group no-border">
                    <input type="text" value="" class="form-control" placeholder="Search...">
                    <button type="submit" class="btn btn-default btn-round btn-just-icon" style="background-color: #21252E">
                        <i class="fas fa-search"></i>
                        <div class="ripple-container"></div>
                    </button>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-5" >
                        <div class="input-group no-border">
                            <div class="form-check" >
                                <input type="checkbox" class="form-check-input" id="utenteAttivo" checked="checked">
                                <label class="form-check-label" for="utenteAttivo">Utenti Attivi</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="input-group no-border">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="utenteInattivo" checked="checked">
                                <label class="form-check-label" for="utenteInattivo">Utenti Inattivi</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <a href="addUser" role="button">
                            <button class="bttn-material-circle bttn-md bttn-success" style="background-color: #21252E">
                                <i class="fas fa-plus"></i>
                            </button>
                        </a>
                    </div>
                </div>
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
