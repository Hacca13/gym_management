@extends('layouts.master')

@section('content')
    <div class="row" style="align-content: center">
        <div class="col-md-4">
            <div class="card" style="border-radius: 30px; background-color: #d6d8d8">
                <div class="card-body">
                    <h2 class="card-title m-t-10 text-center">Azioni Rapide</h2>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="text-center">
                                <a href="/nuovaScheda">
                                    <button type="button" class="btn btn-secondary" style="border-radius: 10px;">Nuova Scheda</button>
                                </a>
                                <br>
                                <br>
                                <a href="/nuovoAbbonamento">
                                    <button type="button" class="btn btn-secondary" style="border-radius: 10px;">Nuovo Abbonamento</button>
                                </a>
                                <br>
                                <br>
                                <a href="/nuovoEsercizio">
                                    <button type="button" class="btn btn-secondary" style="border-radius: 10px;">Nuovo Esercizio</button>
                                </a>
                                <br>
                                <br>
                                <a href="/nuovoIscritto">
                                    <button type="button" class="btn btn-secondary" style="border-radius: 10px;">Nuovo Iscritto</button>
                                </a>
                                <br>
                                <br>
                                <a href="/nuovoCorso">
                                    <button type="button" class="btn btn-secondary" style="border-radius: 10px;">Nuovo Corso</button>
                                </a>
                                <br>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="border-radius: 30px; background-color: #d6d8d8">
                <div class="card-body">
                    <h2 class="card-title m-t-10 text-center">Gestisci</h2>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div id="calendar-events" class="text-center">
                                <a href="/gestioneSchede">
                                    <button type="button" class="btn btn-secondary" style="border-radius: 10px;">Gestione Schede</button>
                                </a>
                                <br>
                                <br>
                                <a href="/gestioneAbbonamenti">
                                    <button type="button" class="btn btn-secondary" style="border-radius: 10px;">Gestione Abbonamenti</button>
                                </a>
                                <br>
                                <br>
                                <a href="/gestioneEsercizi">
                                    <button type="button" class="btn btn-secondary" style="border-radius: 10px;">Gestione Esercizi</button>
                                </a>
                                <br>
                                <br>
                                <a href="/gestioneIscritti">
                                    <button type="button" class="btn btn-secondary" style="border-radius: 10px;">Gestione Iscritti</button>
                                </a>
                                <br>
                                <br>
                                <a href="/gestioneCorsi">
                                    <button type="button" class="btn btn-secondary" style="border-radius: 10px;">Gestione Corsi</button>
                                </a>
                                <br>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="border-radius: 30px; background-color: #d6d8d8">
                <div class="card-body">
                    <h2 class="card-title m-t-10 text-center">Scadenze Vicine</h2>
                </div>
                <div class="card-body text-center">
                    <a href="/gestioneAbbonamenti">
                        <button type="button" class="btn btn-secondary" style="border-radius: 10px;">Nome del pezzente</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
