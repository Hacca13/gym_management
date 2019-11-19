<div class="card card-body" style="border-radius: 10px;background-color: #d6d8d8">
    <div class="row">
        <div class="col-md-6">
            <label>Inzio</label>
            <h4>{{$subscription->getStartDate()}}</h4>
        </div>
        <div class="col-md-6">
            <label>Fine</label>
            <h4>{{$subscription->getEndDate()}}</h4>
        </div>
    </div>
    <br>
    <br>
    <br>
    <div class="col-md-12 row">
        <hr>
        <p align="right">
            <button name="acceptTerms" class="btn btn-success">Rinnova Abbonamento</button>
        </p>
    </div>
</div>
