
<div class="card card-body" style="background-color: #d6d8d8">
    <div class="col-md-12" style="text-align: center" id="entrate">
        <label for="exampleFormControlSelect1">Numero Entrate Effettuate</label>
        <h1>{{$subscription->getNumberOfEntriesMade()}}</h1>
    </div>
    <div class="col-md-12" style="text-align: center">
        <a href={{'decrementEntrance/' . $subscription->getIdDatabase()}}>
            <button name="acceptTerms" class="btn btn-success"><i class="fas fa-minus"></i></button>
        </a>
        <a href={{'incrementEntrance/' . $subscription->getIdDatabase()}}>

            <button name="acceptTerms" class="btn btn-danger"  style="margin-left: 5%"><i class="fas fa-plus"></i></button>
        </a>
    </div>
    <div class="col-md-12" style="text-align: center">

        <hr>
        <p>
            <a href={{"/admin/modificaAbbonamenti/" . $subscription->getIdDatabase() }}><button name="acceptTerms" class="btn btn-success">Rinnova Entrate</button></a>
        </p>
    </div>
</div>
