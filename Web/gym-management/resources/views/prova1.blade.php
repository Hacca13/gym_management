@extends('layouts.master')

@section('content')

    <div class="card" style="border-radius: 10px;background-color: #d6d8d8">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="userName">Numero Serie :</label>
                                <div class="col-sm-9">
                                    <input id="userName" name="userName" type="text" class="required form-control">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="userName">Numero Ripetizioni :</label>
                                <div class="col-sm-9">
                                    <input id="userName" name="userName" type="text" class="required form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <hr><hr><hr><hr>
                            </div>
                            <div class="col-md-4">
                                <label for="userName">Peso :</label>
                                <div class="col-sm-9">
                                    <input id="userName" name="userName" type="text" class="required form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="userName">Tempo Riposo :</label>
                                <div class="col-sm-9">
                                    <input id="userName" name="userName" type="text" class="required form-control">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <hr><hr><hr><hr>
                            </div>
                            <div class="col-md-4">
                                <label for="userName">Tempo Fine Riposo :</label>
                                <div class="col-sm-9">
                                    <input id="userName" name="userName" type="text" class="required form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="userName">Giorno :</label>
                                <div class="col-sm-12">
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option>Lunedi</option>
                                        <option>Martedi</option>
                                        <option>Mercoledi</option>
                                        <option>Giovedi</option>
                                        <option>Venerdi</option>
                                        <option>Sabato</option>
                                        <option>Domenica</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>







@endsection
