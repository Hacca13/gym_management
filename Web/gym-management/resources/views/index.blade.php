@extends('layouts.master')

@section('content')
    <div class="row" style="align-content: center">

        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="card" style="border-radius: 10px; background-color: rgb(31, 38, 45, 0.8)">
                <div class="card-body">
                    <h2 class="card-title m-t-10 text-center" style="color: #d6d8d8">Azioni Rapide</h2>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-2 col-sm-12">
                        <div class="card card-hover">
                            <a href="/nuovaScheda">
                                <div class="box bg-dark text-center">
                                    <h1 class="font-light text-white"><i class="fas fa-clipboard-list"></i></h1>
                                    <h6 class="text-white">Nuova scheda</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2 col-sm-12">
                        <div class="card card-hover">
                            <a href="/nuovoCorso">
                                <div class="box bg-dark text-center">
                                    <h1 class="font-light text-white"><i class="mdi mdi-av-timer"></i></h1>
                                    <h6 class="text-white">Nuovo corso</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2 col-sm-12">
                        <div class="card card-hover" style="border-radius: 10px">
                            <a href="/nuovoIscritto">
                                <div class="box bg-dark text-center">
                                    <h1 class="font-light text-white"><i class="fas fa-user"></i></h1>
                                    <h6 class="text-white">Nuovo iscritto</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2 col-sm-12">
                        <div class="card card-hover">
                            <a href="/nuovoEsercizio">
                                <div class="box bg-dark text-center">
                                    <h1 class="font-light text-white"><i class="fab fa-algolia"></i></h1>
                                    <h6 class="text-white">Nuovo esercizio</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2 col-sm-12">
                        <div class="card card-hover">
                            <a href="/nuovoAbbonamento">
                                <div class="box bg-dark text-center">
                                    <h1 class="font-light text-white"><i class="fas fa-euro-sign"></i></h1>
                                    <h6 class="text-white">Nuovo abbonamento</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card" style="border-radius: 10px; background-color: rgb(31, 38, 45, 0.8)">
                <div class="card-body">
                    <h2 class="card-title m-t-10 text-center" style="color: #d6d8d8">Scadenze Vicine</h2>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-12 col-lg-5 col-sm-10">
                        <div class="card card-hover">
                            <a href="/nuovaScheda">
                                <div class="box bg-dark text-center">
                                    <h6 class="text-white">Przemyslaw Szopian</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-5 col-sm-10">
                        <div class="card card-hover">
                            <a href="/nuovaScheda">
                                <div class="box bg-dark text-center">
                                    <h6 class="text-white">Przemyslaw Szopian</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-5 col-sm-10">
                        <div class="card card-hover">
                            <a href="/nuovaScheda">
                                <div class="box bg-dark text-center">
                                    <h6 class="text-white">Przemyslaw Szopian</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="card" style="border-radius: 10px; background-color: rgb(31, 38, 45, 0.8)">
                <div class="card-body">
                    <h2 class="card-title m-t-10 text-center" style="color: #d6d8d8">I corsi di questa giornata</h2>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4 col-sm-10">
                        <div class="card card-hover">
                            <a href="/nuovaScheda">
                                <div class="box bg-dark text-center">
                                    <h6 class="text-white">La pecorina</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
