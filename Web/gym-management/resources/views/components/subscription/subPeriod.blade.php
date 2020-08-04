<div class="card card-body" style="background-color: #d6d8d8">
    <div class="row justify-content-center">
        <div class="col-lg-3 col-md-6 col-sm-7" style="text-align: center">
            <label>Inzio</label>
            <h4>{{$subscription->getStartDate()}}</h4>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-3 col-md-6 col-sm-7" style="text-align: center">
            <label>Fine</label>
            <h4>{{$subscription->getEndDate()}}</h4>
        </div>
    </div>

        <div class="col-md-12" style="text-align: center">
            <hr>
            <p>
                <a href={{"/admin/modificaAbbonamenti/" . $subscription->getIdDatabase() }}><button name="acceptTerms" class="btn btn-success">Rinnova Abbonamento</button></a>
            </p>
        </div>
</div>
