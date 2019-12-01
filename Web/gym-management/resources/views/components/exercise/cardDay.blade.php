<div class="card card-body" style="border-radius: 0 0 10px 10px;background-color: #d6d8d8" id="{{'bodyCard' . $loop->index}}">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4 col-sm-12">
            <div class="card card-hover">
                <a id="{{'day' . $loop->index}}" data-toggle="collapse" onclick="setButton({{$loop->index}})" href="{{'#dayOfWeek' . $loop->index}}" role="button" aria-expanded="false" aria-controls="{{'dayOfWeek' . $loop->index}}">
                    <div class="box bg-dark text-center" id="{{'color' . $loop->index}}">
                        <h3 class="text-white">NOME DEL GIORNO</h3>
                    </div>
                </a>
            </div>
        </div>
        <div class="collapse multi-collapse" id="{{'dayOfWeek' . $loop->index}}">
            <div class="card" style="background-color: transparent">
                <div class="col-md-12">
                    <div class="row justify-content-center">
                        @foreach ($exerciseListBig as $exerciseList)
                            @if(data_get($exerciseList,'idDatabase') == $trainingCard->getIdDatabase())
                                @foreach ( data_get($exerciseList,'exercises') as $exercise)
                                    @include('components.exercise.cardExerciseForTrainingCard')
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-12 col-sm-12" style="text-align: center; margin-bottom: 5px;">
            <a href="#">
                <button class="btn btn-warning" id="fname" name="" style="border-radius: 10px;">Modifica</button>
            </a>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12" style="text-align: center; margin-bottom: 5px;">
            <a href="#">
                <button class="btn btn-primary" id="fname" name="" style="border-radius: 10px;">Elimina</button>
            </a>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12" style="text-align: center; margin-bottom: 5px;">
            <a href="/gestioneSchede">
                <button class="btn btn-danger" id="fname" name="" style="border-radius: 10px;">Disattiva</button>
            </a>
        </div>
    </div>
</div>
<script>
    function setButton(id){

        if ((document.getElementById("color"+id).style.backgroundColor) === "rgb(31, 38, 45)"){
            $("#color"+id).css("background-color", "#3F5469");
            document.getElementById("bodyCard"+id).style.backgroundColor="#d6d8d8";
        }else {
            $("#color"+id).css("background-color", "#1F262D");
            document.getElementById("bodyCard"+id).style.backgroundColor ="rgb(214, 216, 216, 0.9)";
        }
    }
</script>


