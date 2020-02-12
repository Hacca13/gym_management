<div class="card card-body" style=" background-color: #d6d8d8;" >
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-8 col-sm-10">
            <label>Nome Corso</label>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="">
            </div>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 col-sm-5">
            <label>Data Inzio</label>
            <div class="input-group">
                <input type="text" class="form-control mydatepicker" placeholder="mm/dd/yyyy">
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-5">
            <label>Data Fine</label>
            <div class="input-group">
                <input type="text" class="form-control mydatepicker" placeholder="mm/dd/yyyy">
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <hr>
            <p align="center">
                <a href={{"/admin/modificaAbbonamenti/" . $subscription->getIdDatabase() }}>
                <button name="acceptTerms" class="btn btn-success">Modifica Abbonamento</button>
                </a>
            </p>
        </div>
    </div>
</div>
