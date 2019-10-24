<div class="col-md-12">
    <div class="card" style="border-radius: 10px;">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form class="card">
                        <div class="card-body wizard-content">
                            <form id="example-form" action="#" class="m-t-40">
                                <div>
                                    <section>
                                        <label for="userName">Abbonamento di: </label>
                                        <h1>{{$user->getName()}} {{$user->getSurname()}}</h1>
                                    </section>
                                </div>
                                <div>
                                    <br>
                                    <label for="userName">Tipo di abbonamento:</label>
                                    <section>
                                        <input id="myCheck" onclick="Annuale()" name="acceptTerms" type="checkbox" class="required">
                                        <label for="acceptTerms">Annuale</label>
                                        <input id="entrata" onclick="Entrate()" name="acceptTerms" type="checkbox" class="required">
                                        <label for="acceptTerms">Entrate</label>
                                        <input id="corso" onclick="Corso()" name="acceptTerms" type="checkbox" class="required">
                                        <label for="acceptTerms">Corso</label>
                                    </section>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6"  id="inizio">
                                        <label>Inzio</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control mydatepicker" placeholder="mm/dd/yyyy">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"  id="fine">
                                        <label>Fine</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control mydatepicker" placeholder="mm/dd/yyyy">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6" id="corsi">
                                        <div>
                                            <section>
                                                <label for="userName">Nome Corso</label>
                                                <input id="userName" name="userName" type="text" class="required form-control">
                                            </section>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6" id="entrate">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Numero Entrate</label>
                                            <select class="form-control" id="exampleFormControlSelect1">
                                                <option>1</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

