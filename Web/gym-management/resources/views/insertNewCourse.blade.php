@extends('layouts.master')

@section('content')

    <?php
    $index = 1;
    ?>
    <div class="card" style="border-radius: 10px;background-color: rgb(31, 38, 45, 0.8)">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12" style="text-align: center;">
                    <h1 style="color: #d6d8d8">Inserisci corso</h1>
                </div>
                <div class="col-md-12">
                    <div class="card" style="border-radius: 10px;background-color: #d6d8d8">
                        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="/insertFormCourse">
                            @csrf
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-lg-5 col-md-6 col-sm-12">
                                        <label for="fname" class="text-left control-label col-form-label" style="background-color: transparent; border: none; color: #1F262D">Nome Corso</label>
                                        <input type="text" class="form-control" id="fname" name="name" required>
                                    </div>
                                    <div class="col-lg-5 col-md-6 col-sm-12">
                                        <label for="fname" class="text-left control-label col-form-label" style="background-color: transparent; border: none; color: #1F262D">Nome Istruttore</label>
                                        <input type="text" class="form-control" id="fname" name="instructor" required>
                                    </div>
                                    <div class="col-lg-5 col-md-6 col-sm-12">
                                        <label for="fname" class="text-left control-label col-form-label" style="background-color: transparent; border: none; color: #1F262D">Data Inizio</label>
                                        <input type="date" class="form-control" id="startDate" name="startDate" required>
                                    </div>
                                    <div class="col-lg-5 col-md-6 col-sm-12">
                                        <label for="fname" class="text-left control-label col-form-label" style="background-color: transparent; border: none; color: #1F262D">Data Fine</label>
                                        <input type="date" class="form-control" id="fname" name="endDate" required>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12" style="text-align: center; margin-top: auto; margin-bottom: auto; padding: 10px 0 0 0">
                                        <button type="button" class="bttn-material-flat bttn-sm bttn-success"
                                                id="addbutton" onclick="addDay()"><i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div id="boxes">
                                <div id="{{"Entireday" . $index}}">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-5 col-md-6 col-sm-10">
                                            <label for="select" class="text-right control-label col-form-label" style="background-color: transparent; border: none; color: #1F262D">Giorno</label>
                                            <select class="select2 form-control custom-select" id="select" name="singleDay1" style="width: 100%; height:36px;">
                                                <option>Lunedì</option>
                                                <option>Martedì</option>
                                                <option>Mercoledì</option>
                                                <option>Giovedì</option>
                                                <option>Venerdì</option>
                                                <option>Sabato</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12" style="padding: 10px 0 0 0">
                                            <div class="row justify-content-center">
                                                <label class="text-left control-label col-form-label" style="background-color: transparent; border: none; color: #1F262D">Dalle :</label>
                                                <div class="col-lg-3 col-md-4 col-sm-3">
                                                    <input type="number" min="0" max="24" class="form-control" id="{{"hourFrom" . $index}}" name={{"hourFrom" . $index}} required>
                                                </div>
                                                <label class="text-left control-label col-form-label" style="background-color: transparent; border: none; color: #1F262D">:</label>
                                                <div class="col-lg-3 col-md-4 col-sm-3">
                                                    <input type="number" min="0" max="59" class="form-control" id="{{"minutesFrom" . $index}}" name={{"minutesFrom" . $index}} required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12" style="padding: 10px 0 0 0">
                                            <div class="row justify-content-center">
                                                <label class="text-left control-label col-form-label" style="background-color: transparent; border: none; color: #1F262D">Alle : </label>
                                                <div class="col-lg-3 col-md-4 col-sm-3">
                                                    <input type="number" min="0" max="24" class="form-control" id="{{"hourTo" . $index}}" name="{{"hourTo" . $index}}" required>
                                                </div>
                                                <label class="text-left control-label col-form-label" style="background-color: transparent; border: none; color: #1F262D">:</label>
                                                <div class="col-lg-3 col-md-4 col-sm-3">
                                                    <input type="number" min="0" max="59" class="form-control" id="{{"minutesTo" . $index}}" name="{{"minutesTo" . $index}}" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12 deleter" style="text-align: center; margin-top: auto; margin-bottom: auto; padding: 10px 0 0 0">
                                            <button type="button" style="" id="{{$index}}" class="bttn-material-flat bttn-sm bttn-danger"
                                                    onclick="removeButton(this.id)"><i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <br>

                            <div class="row justify-content-center">
                                <div class="col-lg-6 col-md-8 col-sm-10" style="text-align: center; margin-top: auto; margin-bottom: auto; padding: 10px 0 0 0">
                                    <label for="fname" class="text-right control-label col-form-label" style="background-color: transparent; border: none; color: #1F262D">Immagine del Corso</label>
                                    <input type="file" class="form-control" id="courseImage" name="courseImage" required>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="card-body" style="text-align: center">
                                        <button href="/gestioneCorsi" class="btn btn-danger" style="border-radius: 10px;">Annulla</button>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="card-body"  style="text-align: center">
                                        <button  type="submit" class="btn btn-success" style="border-radius: 10px;">Inserisci Corso</button>
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
