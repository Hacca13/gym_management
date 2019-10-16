@extends('layouts.master')

@section('content')

    <?php
    $index = 1;
    ?>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <form class="form-horizontal" method="post" action="/insertFormCourse">
                    @csrf
                    <div class="card-body">
                        <h4 class="card-title">Inserisci Informazione Corso</h4>
                        <br>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nome Corso</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="fname" name="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nome Istruttore</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="fname" name="instructor">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Data Inizio</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="fname" name="startDate">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Data Fine</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="fname" name="endDate">
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

                            <div class="form-group row" id="{{"Entireday" . $index}}">

                                <div class="offset-1">

                                </div>

                                <label for="select" class="col-sm-1 text-right control-label col-form-label">Giorno</label>
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


                                <label class="col-sm-1 text-right control-label col-form-label">Dalle</label>

                                <div class="col-sm-1">
                                    <input type="text" class="form-control" id="{{"hourFrom" . $index}}" name={{"hourFrom" . $index}}>
                                </div>
                                <h3>:</h3>
                                <div class="col-sm-1">
                                    <input type="text" class="form-control" id="{{"minutesFrom" . $index}}" name={{"minutesFrom" . $index}}>
                                </div>



                                <label class="col-sm-1 text-right control-label col-form-label">Alle</label>
                                <div class="col-sm-1">
                                    <input type="text" class="form-control" id="{{"hourTo" . $index}}" name="{{"hourTo" . $index}}">
                                </div>
                                <h3>:</h3>
                                <div class="col-sm-1">
                                    <input type="text" class="form-control" id="{{"minutesTo" . $index}}" name="{{"minutesTo" . $index}}">
                                </div>


                                <div class="col-md-1 deleter">
                                    <button type="button" id="{{$index}}" class="bttn-material-flat bttn-sm bttn-danger"
                                            onclick="removeButton(this.id)"><i class="fas fa-times">
                                        </i>
                                    </button>
                                </div>


                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Immagine del Corso</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="fname" name="image">
                            </div>
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <button type="submit" class="btn btn-success">Inserisci Corso</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        var index = JSON.parse({{json_encode($index)}});
        function addDay () {
            index++;
            let boxes = document.getElementById("boxes");
            let clone = boxes.firstElementChild.cloneNode(true);
            clone.setAttribute("id", "Entireday" + index);
            boxes.appendChild(clone);
            document.getElementById("Entireday" + index).lastElementChild.lastElementChild.setAttribute("id", index);
            document.getElementById('Entireday' + index).getElementsByTagName('select')[0].setAttribute('name', 'singleDay' + index);
            document.getElementById('Entireday' + index).getElementsByTagName('input')[0].setAttribute('name', 'hourFrom' + index);
            document.getElementById('Entireday' + index).getElementsByTagName('input')[1].setAttribute('name', 'minutesFrom' + index);
            document.getElementById('Entireday' + index).getElementsByTagName('input')[2].setAttribute('name', 'hourTo' + index);
            document.getElementById('Entireday' + index).getElementsByTagName('input')[3].setAttribute('name', 'minutesTo' + index);
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
