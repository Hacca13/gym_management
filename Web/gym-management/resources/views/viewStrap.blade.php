@extends('layouts.master')
@section('content')
    <div class="card" style="border-radius: 10px">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12" style="text-align: center;">
                    <h3>Nuovo Iscritto</h3>
                </div>
                <div class="col-md-6" style="text-align: center;">
                    <div class="form-group row">
                        <div class="col-sm-8">
                            <label for="fname" class="col-sm-12 text-left control-label col-form-label" >Nome</label>
                            <input type="text" class="form-control" id="fname" name="name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-8">
                            <label for="fname" class="col-sm-12 text-left control-label col-form-label">Cognome</label>
                            <input type="text" class="form-control" id="fname" name="surname" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-8">
                            <label for="fname" class="col-sm-12 text-left control-label col-form-label">Luogo di nascita</label>
                            <input type="text" class="form-control" id="fname" name="surname" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-8">
                            <label for="fname" class="col-sm-12 text-left control-label col-form-label">Nazione di nascita</label>
                            <input type="text" class="form-control" id="fname" name="surname" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-8">
                            <label for="fname" class="col-sm-12 text-left control-label col-form-label">Comune di residenza</label>
                            <input type="text" class="form-control" id="fname" name="surname" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="fname" class="col-sm-12 text-left control-label col-form-label">Via</label>
                            <input type="text" class="form-control" id="fname" name="surname" required>
                        </div>
                        <div class="col-md-4">
                            <label for="fname" class="col-sm-12 text-left control-label col-form-label">N°Civico</label>
                            <input type="text" class="form-control" id="fname" name="surname" required>
                        </div>
                        <div class="col-md-4">
                            <label for="fname" class="col-sm-12 text-left control-label col-form-label">Cap</label>
                            <input type="text" class="form-control" id="fname" name="surname" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <div class="col-sm-8">
                            <label for="fname" class="col-sm-12 text-left control-label col-form-label">Data di Nascita</label>
                            <input type="date" class="form-control" id="fname" name="dateOfBirth" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <section>
                            <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required">
                            <label for="acceptTerms">Maschio</label>
                            <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required">
                            <label for="acceptTerms">Femmina</label>
                            <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required">
                            <label for="acceptTerms">Altro</label>
                        </section>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6" style="text-align: center;">
                    <div class="form-group row">
                        <div class="col-sm-8">
                            <label for="fname" class="col-sm-12 text-left control-label col-form-label">Cellulare</label>
                            <input type="tel" class="form-control" id="fname" name="name" required>
                        </div>
                        <div class="col-sm-8">
                            <label for="fname" class="col-sm-12 text-left control-label col-form-label">Documento</label>
                            <input type="text" class="form-control" id="fname" name="name" required>
                        </div>
                        <div class="col-sm-8">
                            <label for="fname" class="col-sm-12 text-left control-label col-form-label">Rilasciato da</label>
                            <input type="text" class="form-control" id="fname" name="name" required>
                        </div>
                        <div class="col-sm-8">
                            <label for="fname" class="col-sm-12 text-left control-label col-form-label">Informazioni importanti</label>
                            <input type="text" class="form-control" id="fname" name="name" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" style="text-align: center;">
                    <div class="form-group row">
                        <div class="col-sm-8">
                            <label for="fname" class="col-sm-12 text-left control-label col-form-label">Email</label>
                            <input type="email" class="form-control" id="fname" name="name" required>
                        </div>
                        <div class="col-sm-8">
                            <label for="fname" class="col-sm-12 text-left control-label col-form-label">N° documento</label>
                            <input type="text" class="form-control" id="fname" name="name" required>
                        </div>
                        <div class="col-sm-8">
                            <label for="fname" class="col-sm-12 text-left control-label col-form-label">Data di rilascio</label>
                            <input type="date" class="form-control" id="fname" name="dateOfBirth" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group row">
                        <div class="col-md-2">
                            <label for="fname" class="col-sm-12 text-left control-label col-form-label">Peso</label>
                            <input type="text" class="form-control" id="fname" name="dateOfBirth" required>
                        </div>
                        <div class="col-md-2">
                            <label for="fname" class="col-sm-12 text-left control-label col-form-label">Altezza</label>
                            <input type="text" class="form-control" id="fname" name="dateOfBirth" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="fname" class="col-sm-12 text-left control-label col-form-label">Sport praticato in passato</label>
                            <input type="text" class="form-control" id="fname" name="dateOfBirth" required>
                        </div>
                        <div class="col-md-3">
                            <label for="fname" class="col-sm-12 text-left control-label col-form-label">Per quanto tempo</label>
                            <input type="text" class="form-control" id="fname" name="dateOfBirth" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group row">
                        <div class="col-md-5">
                            <label for="fname" class="col-sm-12 text-left control-label col-form-label">Se inattivo, da quanto tempo</label>
                            <input type="text" class="form-control" id="fname" name="dateOfBirth" required>
                        </div>
                        <div class="col-md-6">
                            <label for="fname" class="col-sm-12 text-left control-label col-form-label">Dati polimerici</label>
                            <input type="text" class="form-control" id="fname" name="dateOfBirth" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group row">
                        <section>
                            <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required">
                            <label for="acceptTerms">Ipertrofia</label>
                            <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required">
                            <label for="acceptTerms">Dimagrimento</label>
                            <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required">
                            <label for="acceptTerms">Tonificazione</label>
                            <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required">
                            <label for="acceptTerms">Preparazione atletica</label>
                            <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required">
                            <label for="acceptTerms">Riabilitazione</label>
                            <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required">
                            <label for="acceptTerms">Sport da combattimento</label>
                        </section>
                        <div class="col-md-5">
                            <label for="fname" class="col-sm-12 text-left control-label col-form-label">Altri obiettivi</label>
                            <input type="text" class="form-control" id="fname" name="dateOfBirth" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12" style="text-align: center;">
                    <h3>Dati del tutore</h3>
                </div>
                <div class="col-md-6" style="text-align: center;">
                    <div class="form-group row">
                        <div class="col-sm-8">
                            <label for="fname" class="col-sm-12 text-left control-label col-form-label">Nome del tutore</label>
                            <input type="text" class="form-control" id="fname" name="name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-8">
                            <label for="fname" class="col-sm-12 text-left control-label col-form-label">Cognome del tutore</label>
                            <input type="text" class="form-control" id="fname" name="surname" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-8">
                            <label for="fname" class="col-sm-12 text-left control-label col-form-label">Luogo di nascita del tutore</label>
                            <input type="text" class="form-control" id="fname" name="surname" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-8">
                            <label for="fname" class="col-sm-12 text-left control-label col-form-label">Nazione di nascita del tutore</label>
                            <input type="text" class="form-control" id="fname" name="surname" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-8">
                            <label for="fname" class="col-sm-12 text-left control-label col-form-label">Comune di residenza del tutore</label>
                            <input type="text" class="form-control" id="fname" name="surname" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="fname" class="col-sm-12 text-left control-label col-form-label">Via</label>
                            <input type="text" class="form-control" id="fname" name="surname" required>
                        </div>
                        <div class="col-md-4">
                            <label for="fname" class="col-sm-12 text-left control-label col-form-label">N°Civico</label>
                            <input type="text" class="form-control" id="fname" name="surname" required>
                        </div>
                        <div class="col-md-4">
                            <label for="fname" class="col-sm-12 text-left control-label col-form-label">Cap</label>
                            <input type="text" class="form-control" id="fname" name="surname" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <div class="col-sm-8">
                            <label for="fname" class="col-sm-12 text-left control-label col-form-label">Data di Nascita del tutore</label>
                            <input type="date" class="form-control" id="fname" name="dateOfBirth" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <section>
                            <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required">
                            <label for="acceptTerms">Maschio</label>
                            <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required">
                            <label for="acceptTerms">Femmina</label>
                            <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required">
                            <label for="acceptTerms">Altro</label>
                        </section>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6" style="text-align: center;">
                    <div class="form-group row">
                        <div class="col-sm-8">
                            <label for="fname" class="col-sm-12 text-left control-label col-form-label">Cellulare del tutore</label>
                            <input type="tel" class="form-control" id="fname" name="name" required>
                        </div>
                        <div class="col-sm-8">
                            <label for="fname" class="col-sm-12 text-left control-label col-form-label">Documento del tutore</label>
                            <input type="text" class="form-control" id="fname" name="name" required>
                        </div>
                        <div class="col-sm-8">
                            <label for="fname" class="col-sm-12 text-left control-label col-form-label">Rilasciato da</label>
                            <input type="text" class="form-control" id="fname" name="name" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" style="text-align: center;">
                    <div class="form-group row">
                        <div class="col-sm-8">
                            <label for="fname" class="col-sm-12 text-left control-label col-form-label">Email</label>
                            <input type="email" class="form-control" id="fname" name="name" required>
                        </div>
                        <div class="col-sm-8">
                            <label for="fname" class="col-sm-12 text-left control-label col-form-label">N° documento</label>
                            <input type="text" class="form-control" id="fname" name="name" required>
                        </div>
                        <div class="col-sm-8">
                            <label for="fname" class="col-sm-12 text-left control-label col-form-label">Data di rilascio</label>
                            <input type="date" class="form-control" id="fname" name="dateOfBirth" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
