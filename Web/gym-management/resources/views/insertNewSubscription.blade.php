@extends('layouts.master')

@section('content')

    <div class="col-md-12">
        <div class="card" style="border-radius: 10px;background-color: #d6d8d8">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" style="border-radius: 10px;background-color: #d6d8d8">
                            <div class="card-body wizard-content">
                                <div class="col-md-12">
                                    <h2 class="text-center">Inserisci Dati Abbonamento</h2>
                                </div>
                                <br>
                                <br>
                                <form id="example-form" action="#" class="m-t-40">
                                    <div>
                                        <section>
                                            <label for="userName" class="row">Abbonamento di: </label>
                                            <input type="text" class="form-control text">
                                        </section>
                                    </div>
                                    <div>
                                        <br>
                                        <label for="userName" class="row">Tipo di abbonamento:</label>
                                        <br>
                                        <section>
                                            <input id="myCheck" onclick="Annuale()" name="acceptTerms" type="radio" class="required">
                                            <label for="acceptTerms">Periodico</label>
                                            <input id="entrata" onclick="Entrate()" name="acceptTerms" type="radio" class="required">
                                            <label for="acceptTerms">Entrate</label>
                                            <input id="corso" onclick="Corso()" name="acceptTerms" type="radio" class="required">
                                            <label for="acceptTerms">Corso</label>
                                        </section>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6"  id="inizio" style="display: none">
                                            <label>Inzio</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control mydatepicker" placeholder="mm/dd/yyyy">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6"  id="fine" style="display: none">
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
                                        <div class="col-md-6"  id="corsi" style="display: none">
                                            <label>Nome Corso</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control mydatepicker" placeholder="">
                                                <div class="input-group-append">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6"  id="iniziocorso" style="display: none">
                                            <label>Inzio</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control mydatepicker" placeholder="mm/dd/yyyy">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6"  id="finecorso" style="display: none">
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
                                        <div class="col-md-6" id="entrate" style="display: none">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Numero Entrate</label>
                                                <select class="form-control" id="exampleFormControlSelect1">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <br>
                                    <div class="col-md-12 row">
                                    <p align="left">
                                        <button id="corso" name="acceptTerms" class="btn btn-danger">Annulla</button>
                                    </p>
                                        <hr>
                                    <p align="right">
                                    <button id="corso" name="acceptTerms" class="btn btn-success">Inserisci</button>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function Annuale() {
            var checkBox = document.getElementById("myCheck");

            var inizio = document.getElementById("inizio");

            var fine = document.getElementById("fine");

            if (checkBox.checked == true){
                inizio.style.display = "block";
                fine.style.display = "block";
                entrate.style.display = 'none';
                corsi.style.display = "none";
                iniziocorso.style.display = "none";
                finecorso.style.display = "none";
            } else {
                inizio.style.display = "none";
                fine.style.display = "none";
            }
        }


        function Entrate() {

            var entrata = document.getElementById("entrata");

            var entrate = document.getElementById("entrate");


            if (entrata.checked == true){
                entrate.style.display = "block";
                corsi.style.display = "none";
                iniziocorso.style.display = "none";
                finecorso.style.display = "none";
                inizio.style.display = "none";
                fine.style.display = "none";
            } else {
                entrate.style.display = "none";
            }
        }


        function Corso() {

            var corso = document.getElementById("corso");

            var course = document.getElementById("corsi");

            var iniziocorso = document.getElementById("iniziocorso");

            var finecorso = document.getElementById("finecorso");


            if (corso.checked == true){
                corsi.style.display = "block";
                iniziocorso.style.display = "block";
                finecorso.style.display = "block";
                entrate.style.display = 'none';
                inizio.style.display = "none";
                fine.style.display = "none";
            } else {
                corsi.style.display = "none";
                iniziocorso.style.display = "none";
                finecorso.style.display = "none";
            }
        }

    </script>


@endsection
