@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-6 col-lg-4 col-xlg-3">
            <a href="schede">
                <div class="card card-hover">
                    <div class="box bg-cyan text-center">
                        <h1 class="font-light text-white"><i class="fas fa-clipboard-list"></i></h1>
                        <h6 class="text-white">Gestione Schede</h6>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-4 col-xlg-3">
            <a href="abbonamenti">
                <div class="card card-hover">
                    <div class="box bg-success text-center">
                        <h1 class="font-light text-white"><i class="fas fa-euro-sign"></i></h1>
                        <h6 class="text-white">Gestione Abbonamenti</h6>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-4 col-xlg-3">
            <a href="esercizi">
                <div class="card card-hover">
                    <div class="box bg-warning text-center">
                        <h1 class="font-light text-white"><i class="fab fa-algolia"></i></h1>
                        <h6 class="text-white">Gestione Esercizi</h6>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-4 col-xlg-3">
            <a href="iscritti">
                <div class="card card-hover">
                    <div class="box bg-danger text-center">
                        <h1 class="font-light text-white"><i class="fas fa-users"></i></h1>
                        <h6 class="text-white">Gestione Iscritti</h6>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-4 col-xlg-3">
            <a href="corsi">
                <div class="card card-hover">
                    <div class="box bg-info text-center">
                        <h1 class="font-light text-white"><i class="fas fa-calendar-alt"></i></h1>
                        <h6 class="text-white">Gestione Corsi</h6>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection
