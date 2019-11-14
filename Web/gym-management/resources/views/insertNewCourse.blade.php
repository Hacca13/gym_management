@extends('layouts.master')

@section('content')

    <?php
    $index = 1;
    ?>
    <div class="card" style="border-radius: 10px;background-color: rgb(31, 38, 45, 0.8)">
        <div class="card-body">
            <div class="row justify-content-center" style="margin-top: 2.5%">
                <div class="col-md-12" style="text-align: center;">
                    <h1 style="color: #d6d8d8">Inserisci corso</h1>
                </div>
                <div class="col-md-12" style="margin-top: 2.5%">
                    <div class="card" style="border-radius: 10px;background-color: #d6d8d8">
                        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="/insertFormCourse">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nome Corso</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="fname" name="name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nome Istruttore</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="fname" name="instructor" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Data Inizio</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="startDate" name="startDate" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Data Fine</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="fname" name="endDate" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1  offset-1">
                                        <button type="button" class="bttn-material-flat bttn-sm bttn-success"
                                                id="addbutton" onclick="addDay()"><i class="fas fa-plus"></i>
                                        </button>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1  offset-1">
                                        <button type="button" class="bttn-material-flat bttn-sm bttn-success"
                                                id="addbutton" onclick="addDay()"><i class="fas fa-plus"></i>
                                        </button>

                                    </div>
                                </div>
                                <div id="boxes">

                                    <div id="{{"Entireday" . $index}}">
                                        <div class="form-group row">
                                            <label for="select" class="col-sm-5 text-right control-label col-form-label">Giorno</label>
                                            <div class="col-sm-2">
                                                <select class="select2 form-control custom-select" id="select" name="singleDay1" style="width: 100%; height:36px;">
                                                    <option>Lunedì</option>
                                                    <option>Martedì</option>
                                                    <option>Mercoledì</option>
                                                    <option>Giovedì</option>
                                                    <option>Venerdì</option>
                                                    <option>Sabato</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 text-right control-label col-form-label">Dalle</label>
                                            <div class="col-sm-2">
                                                <input type="number" min="0" max="24" class="form-control" id="{{"hourFrom" . $index}}" name={{"hourFrom" . $index}} required>
                                            </div>
                                            <h3 class="text-right control-label col-form-label">:</h3>
                                            <div class="col-sm-2">
                                                <input type="number" min="0" max="59" class="form-control" id="{{"minutesFrom" . $index}}" name={{"minutesFrom" . $index}} required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 text-right control-label col-form-label">Alle</label>
                                            <div class="col-sm-2">
                                                <input type="number" min="0" max="24" class="form-control" id="{{"hourTo" . $index}}" name="{{"hourTo" . $index}}" required>
                                            </div>
                                            <h3 class="text-right control-label col-form-label">:</h3>
                                            <div class="col-sm-2">
                                                <input type="number" min="0" max="59" class="form-control" id="{{"minutesTo" . $index}}" name="{{"minutesTo" . $index}}" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 deleter text-right">
                                                <button type="button" id="{{$index}}" class="bttn-material-flat bttn-sm bttn-danger"
                                                        onclick="removeButton(this.id)"><i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Immagine del Corso</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" id="courseImage" name="courseImage" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-success" style="border-radius: 10px;">Inserisci Corso</button>
                                    </div>
                                    <div class="card-body offset-8">
                                        <button type="submit" class="btn btn-danger" style="border-radius: 10px;">Annulla</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
        <script>
            var index = JSON.parse({{json_encode($index)}});
            function addDay () {
                index += 1;
                console.log(index);
                let boxes = document.getElementById("boxes");
                let clone = boxes.firstElementChild.cloneNode(true);
                clone.setAttribute("id", "Entireday" + index);
                boxes.appendChild(clone);
                document.getElementById("Entireday" + index).lastElementChild.lastElementChild.setAttribute("id", index);

                document.getElementById('Entireday' + index).getElementsByTagName('select')[0].setAttribute('name', 'singleDay' + index);
                document.getElementById('Entireday' + index).getElementsByTagName('select')[0].setAttribute('name', 'singleDay' + index);

                document.getElementById('Entireday' + index).getElementsByTagName('input')[0].setAttribute('name', 'hourFrom' + index);
                document.getElementById('Entireday' + index).getElementsByTagName('input')[0].setAttribute('id', 'hourFrom' + index);

                document.getElementById('Entireday' + index).getElementsByTagName('input')[1].setAttribute('name', 'minutesFrom' + index);
                document.getElementById('Entireday' + index).getElementsByTagName('input')[1].setAttribute('id', 'minutesFrom' + index);

                document.getElementById('Entireday' + index).getElementsByTagName('input')[2].setAttribute('name', 'hourTo' + index);
                document.getElementById('Entireday' + index).getElementsByTagName('input')[2].setAttribute('id', 'hourTo' + index);

                document.getElementById('Entireday' + index).getElementsByTagName('input')[3].setAttribute('name', 'minutesTo' + index);
                document.getElementById('Entireday' + index).getElementsByTagName('input')[3].setAttribute('id', 'minutesTo' + index);

                document.getElementById('Entireday' + index).getElementsByTagName('button')[0].setAttribute('id', 'removeDay' + index);
                document.getElementById('Entireday' + index).getElementsByTagName('button')[0].setAttribute('id', index);
            }
            function removeButton(index) {
                let deleter = document.getElementsByClassName('deleter');
                if (deleter.length !== 1) {
                    let elem = document.getElementById('Entireday' + index);
                    elem.parentNode.removeChild(elem);
                }
            }



        </script>

@endsection
