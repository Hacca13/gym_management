<div class="col-md-12">
    <form action="/" method="get" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-center">

            <div class="col-md-3">
                <a data-toggle="collapse" href="#anagraficData" role="button" aria-expanded="false" aria-controls="{{'multiCollapseExample1' . $loop->index}}">
                    <button type="button" class="btn btn-secondary" style="border-radius: 10px;">
                        Dati Anagrafici
                    </button>
                </a>
            </div><!-Dati Anagrafici>
            @include('components.users.anagraficData')


            <div class="col-md-3">
                <a data-toggle="collapse" href="#plicometricData" role="button" aria-expanded="false" aria-controls="{{'multiCollapseExample1' . $loop->index}}">
                    <button type="button" class="btn btn-secondary" style="border-radius: 10px;">
                        Dati Plicometrici
                    </button>
                </a>
            </div><!-Dati Plicometrici>

            <div class="col-md-3" id="parentDiv">
                <a data-toggle="collapse" href="#tutorData" role="button" aria-expanded="false" aria-controls="{{'multiCollapseExample1' . $loop->index}}">
                    <button type="button" class="btn btn-secondary" style="border-radius: 10px;">
                        Dati tutore
                    </button>
                </a>
            </div><!-Dati Tutore>

        </div>

        <div class="card-body">

            <div class="form-group row">
                <div class="col-md-2">
                        <a href="modificaScheda">
                            <button class="btn btn-warning" id="fname" name="" style="border-radius: 10px;">Modifica</button>
                        </a>
                </div>
                <div class="col-md-8"></div>
                <div class="col-md-2">
                    <a href="/gestioneEsercizi">
                        <button class="btn btn-danger" id="fname" name="" style="border-radius: 10px;">Disattiva</button>
                    </a>
                </div>


            </div>
        </div><!-Disattiva>

<!-- PARENT FORM -->


</form>
</div>
@include('components.users.plicometricData')
@include('components.users.tutorData')

<script>
    function testAge() {
        let birthDateString = document.getElementById('dateOfBirth').value;
        var today = new Date();
        var birthDate = new Date(birthDateString);
        var age = today.getFullYear() - birthDate.getFullYear();
        var m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        if (age < 18) {
            myFunction();
        } else {
            document.getElementById('myDIV').style.display = "none";
            document.getElementById('myDiv').style.display = "none";
        }
    }
</script>
