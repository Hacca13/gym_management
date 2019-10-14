@extends('layouts.master')

@section('content')

            <div class="row">

                <div class="col-md-6 col-lg-4 col-xlg-3">
                    <div class="card card-hover">
                        <div class="box bg-cyan text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                            <h6 class="text-white">Gestione Schede</h6>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 col-xlg-3">
                    <div class="card card-hover">
                        <div class="box bg-success text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-chart-areaspline"></i></h1>
                            <h6 class="text-white">Gestione Abbonamenti</h6>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 col-xlg-3">
                    <div class="card card-hover">
                        <div class="box bg-warning text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-collage"></i></h1>
                            <h6 class="text-white">Gestione Esercizi</h6>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 col-xlg-3">
                    <div class="card card-hover">
                        <div class="box bg-danger text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-border-outside"></i></h1>
                            <h6 class="text-white">Gestione Iscritti</h6>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 col-xlg-3">
                    <div class="card card-hover">
                        <div class="box bg-info text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-arrow-all"></i></h1>
                            <h6 class="text-white">Gestione Corsi</h6>
                        </div>
                    </div>
                </div>
            </div>

    <div class="row">
        <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Utenti Abbonati</h5>
                <form class="-flip-horizontal">
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Nome Iscritto</th>
                            <th>Abbonamento</th>
                            <th>Scheda</th>
                            <th>Corso</th>
                            <th>Data Inizio</th>
                            <th>Data Fine</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Herrod Chandler</td>
                            <td>Sales Assistant</td>
                            <td>San Francisco</td>
                            <td>59</td>
                            <td>2012/08/06</td>
                            <td>$137,500</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                </form>
            </div>
          </div>
        </div>
    </div>




@endsection
