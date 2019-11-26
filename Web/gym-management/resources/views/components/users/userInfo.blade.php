<div  id="bAcK" class="card card-body" style="border-radius: 0 0 10px 10px; background-color: #d6d8d8">
    <div class="row justify-content-center">
        <table>
            <tr>
                <td style="padding: 0 15px 0 0">
                    <div class="card card-hover">
                        <a id="anaGraph" onclick="scendilo(this.id)" data-toggle="collapse" href="#anagraficData" role="button" aria-expanded="false" aria-controls="{{'multiCollapseExample' . $loop->index}}">
                            <div class="box bg-dark text-center" id="aNaGrAf">
                                <h6 class="text-white">Dati anagrafici</h6>
                            </div>
                        </a>
                    </div>
                </td>
                <td style="padding: 0 15px 0 0">
                    <div class="card card-hover" style="background-color: rgb(31, 38, 45, 0.8)">
                        <a id="plicMetr" onclick="scendilo(this.id)" data-toggle="collapse" href="#plicometricData" role="button" aria-expanded="false" aria-controls="{{'multiCollapseExample' . $loop->index}}">
                            <div class="box bg-dark text-center" id="pLiC">
                                <h6 class="text-white">Dati plicometrici</h6>
                            </div>
                        </a>
                    </div>
                </td>
                @if($user->getIsAdult() == false)
                    <td style="padding: 0 15px 0 0">
                        <div class="card card-hover" style="background-color: rgb(31, 38, 45, 0.8)">
                            <a id="tutoDa" onclick="scendilo(this.id)" data-toggle="collapse" href="#tutorData" role="button" aria-expanded="false" aria-controls="{{'multiCollapseExample' . $loop->index}}">
                                <div class="box bg-dark text-center" id="tUtO">
                                    <h6 class="text-white">Dati tutore</h6>
                                </div>
                            </a>
                        </div>
                    </td>
                @endif
            </tr>
        </table>

        @include('components.users.anagraficData')
        @include('components.users.plicometricData')
        @include('components.users.tutorData')

    </div>
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-12 col-sm-12" style="text-align: center; margin-bottom: 5px;">
            <a href="#">
                <button class="btn btn-warning" id="fname" name="" style="border-radius: 10px;">Modifica</button>
            </a>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12" style="text-align: center; margin-bottom: 5px;">
            <a href="/gestioneIscritti">
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

    function scendilo(id){

        if(id === "anaGraph"){
            $("#plicMetr").attr("aria-expanded","false");
            $("#plicMetr").attr("class","");
            $("#tutorData").attr("class","multi-collapse collapse");
            $("#tutotDa").attr("aria-expanded","false");
            $("#tutotDa").attr("class","");
            $("#plicometricData").attr("class","multi-collapse collapse");

            $("#pLiC").css("background-color", "#3F5469");
            $("#tUtO").css("background-color", "#3F5469");

            if ((document.getElementById("aNaGrAf").style.backgroundColor) === "rgb(31, 38, 45)"){
                $("#aNaGrAf").css("background-color", "#3F5469");
                document.getElementById("bAcK").style.backgroundColor="#d6d8d8";
            }else {
                $("#aNaGrAf").css("background-color", "#1F262D");
                document.getElementById("bAcK").style.backgroundColor ="rgb(214, 216, 216, 0.9)";
            }

        }
        if(id === "plicMetr"){
            $("#anaGraph").attr("aria-expanded","false");
            $("#anaGraph").attr("class","");
            $("#tutorData").attr("class","multi-collapse collapse");
            $("#anagraficData").attr("class","multi-collapse collapse");
            $("#tutotDa").attr("class","");
            $("#tutotDa").attr("aria-expanded","false");

            $("#aNaGrAf").css("background-color", "#3F5469");
            $("#tUtO").css("background-color", "#3F5469");

            if ((document.getElementById("pLiC").style.backgroundColor) === "rgb(31, 38, 45)"){
                $("#pLiC").css("background-color", "#3F5469");
                document.getElementById("bAcK").style.backgroundColor="#d6d8d8";
            }else {
                $("#pLiC").css("background-color", "#1F262D");
                document.getElementById("bAcK").style.backgroundColor ="rgb(214, 216, 216, 0.9)";
            }

        }
        if(id === "tutoDa"){

            $("#plicMetr").attr("aria-expanded","false")
            $("#plicMetr").attr("class","")
            $("#plicometricData").attr("class","multi-collapse collapse")
            $("#anagraficData").attr("class","multi-collapse collapse")
            $("#anaGraph").attr("class","")
            $("#anaGraph").attr("aria-expanded","false");

            $("#aNaGrAf").css("background-color", "#3F5469");
            $("#pLiC").css("background-color", "#3F5469");

            if ((document.getElementById("tUtO").style.backgroundColor) === "rgb(31, 38, 45)"){
                $("#tUtO").css("background-color", "#3F5469");
                document.getElementById("bAcK").style.backgroundColor="#d6d8d8";
            }else {
                $("#tUtO").css("background-color", "#1F262D");
                document.getElementById("bAcK").style.backgroundColor ="rgb(214, 216, 216, 0.9)";
            }
        }
    }

</script>
