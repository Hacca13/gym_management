<div class="col-md-12 row">
    <div class="col-md-3" id="entrate">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Numero Entrate Effettuate</label>
            <h1 class="offset-2">{{$subscription->getNumberOfEntriesMade()}}</h1>
        </div>
    </div>
</div>
<div class="col-md-12 row">
    <div class="col-md-4">
        <button name="acceptTerms" class="btn btn-success"><i class="fas fa-minus"></i></button>
        <button name="acceptTerms" class="btn btn-danger"  style="margin-left: 5%"><i class="fas fa-plus"></i></button>
    </div>
    </div>
