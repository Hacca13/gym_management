@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card" style="border-radius: 30px; background-color: #d6d8d8">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-body border-bottom">
                            <h1 class="card-title m-t-10 text-center">Azioni Rapide</h1>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div id="calendar-events" class="text-center">
                                        <button class="bttn-fill bttn-md bttn-primary" >Inserisci Nuova Scheda</button>
                                        <br>
                                        <br>
                                        <button class="bttn-fill bttn-md bttn-success" >Inserisci Nuovo Abbonamento</button>
                                        <br>
                                        <br>
                                        <button class="bttn-fill bttn-md bttn-warning" >Inserisci Nuovo Esercizio</button>
                                        <br>
                                        <br>
                                        <button class="bttn-fill bttn-md bttn-danger" >Inserisci Nuovo Utente</button>
                                        <br>
                                        <br>
                                        <button class="bttn-fill bttn-md bttn-primary" >Inserisci Nuovo Corso</button>
                                        <br>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
