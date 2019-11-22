

        <div class="col-md-6 col-lg-3 col-sm-12">
            <div class="card card-hover" style="background-color: rgb(31, 38, 45, 0.8)">
                <a data-toggle="collapse" href="#anagraficData" role="button" aria-expanded="false" aria-controls="{{'multiCollapseExample' . $loop->index}}">
                    <div class="box bg-dark text-center">
                        <h6 class="text-white">Dati anagrafici</h6>
                    </div>
                </a>
            </div>
        </div>
        @include('components.users.anagraficData')
        <div class="col-md-6 col-lg-3 col-sm-12">
            <div class="card card-hover" style="background-color: rgb(31, 38, 45, 0.8)">
                <a data-toggle="collapse" href="#plicometricData" role="button" aria-expanded="false" aria-controls="{{'multiCollapseExample' . $loop->index}}">
                    <div class="box bg-dark text-center">
                        <h6 class="text-white">Dati plicometrici</h6>
                    </div>
                </a>
            </div>
        </div>
        @include('components.users.plicometricData')

        @if($user->getIsAdult() == false)
            <div class="col-md-6 col-lg-3 col-sm-12">
                <div class="card card-hover" style="background-color: rgb(31, 38, 45, 0.8)">
                    <a data-toggle="collapse" href="#tutorData" role="button" aria-expanded="false" aria-controls="{{'multiCollapseExample' . $loop->index}}">
                        <div class="box bg-dark text-center">
                            <h6 class="text-white">Dati tutore</h6>
                        </div>
                    </a>
                </div>
            </div>
            @include('components.users.tutorData')
        @endif

        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-2">
                    <a href="/modificaScheda">
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
        </div>


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
