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
                                    <i class="bttn-jelly bttn-md bttn-primary" style="border-radius: 30px;">Nuova Scheda</i>
                                </a>
                                <br>
                                <br>
                                <a href="/nuovoAbbonamento">
                                    <i class="bttn-jelly bttn-md bttn-primary" style="border-radius: 30px;">Nuovo Abbonamento</i>
                                </a>
                                <br>
                                <br>
                                <a href="/nuovoEsercizio">
                                    <i class="bttn-jelly bttn-md bttn-primary" style="border-radius: 30px;">Nuovo Esercizio</i>
                                </a>
                                <br>
                                <br>
                                <a href="/nuovoIscritto">
                                    <i class="bttn-jelly bttn-md bttn-primary" style="border-radius: 30px;">Nuovo Iscritto</i>
                                </a>
                                <br>
                                <br>
                                <a href="/nuovoCorso">
                                    <i class="bttn-jelly bttn-md bttn-primary" style="border-radius: 30px;">Nuovo Corso</i>
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
                                    <i class="bttn-jelly bttn-md bttn-primary" style="border-radius: 30px;">Gestione Schede</i>
                                </a>
                                <br>
                                <br>
                                <a href="/gestioneAbbonamenti">
                                    <i class="bttn-jelly bttn-md bttn-primary" style="border-radius: 30px;">Gestione Abbonamenti</i>
                                </a>
                                <br>
                                <br>
                                <a href="/gestioneEsercizi">
                                    <i class="bttn-jelly bttn-md bttn-primary" style="border-radius: 30px;">Gestione Esercizi</i>
                                </a>
                                <br>
                                <br>
                                <a href="/gestioneIscritti">
                                    <i class="bttn-jelly bttn-md bttn-primary" style="border-radius: 30px;">Gestione Iscritti</i>
                                </a>
                                <br>
                                <br>
                                <a href="/gestioneCorsi">
                                    <i class="bttn-jelly bttn-md bttn-primary" style="border-radius: 30px;">Gestione Corsi</i>
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
                        <i class="bttn-jelly bttn-md bttn-primary" style="border-radius: 30px;">Nome del pezzente</i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
