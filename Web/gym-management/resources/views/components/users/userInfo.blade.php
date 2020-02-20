<div  id="{{'bAcK' . $loop->index}}" class="card card-body" style="border-radius: 0 0 10px 10px; background-color: #d6d8d8">
    <div class="row justify-content-center">
        <table>
            <tr>
                <td style="padding: 0 15px 0 0">
                    <div class="card card-hover">
                        <a id="{{'anaGraph' . $loop->index}}" onclick="setButton({{$loop->index}}, this.id)" data-toggle="collapse" href="#{{'anagraficData' . $loop->index}}" role="button" aria-expanded="false" aria-controls="{{'multiCollapseExample' . $loop->index}}">
                            <div class="box bg-dark text-center" id="{{'aNaGrAf' . $loop->index}}">
                                <h6 class="text-white">Dati anagrafici</h6>
                            </div>
                        </a>
                    </div>
                </td>
                <td style="padding: 0 15px 0 0">
                    <div class="card card-hover" style="background-color: rgba(31, 38, 45, 0.8)">
                        <a id="{{'plicMetr' . $loop->index}}" onclick="setButton({{$loop->index}}, this.id)" data-toggle="collapse" href="#{{'plicometricData' . $loop->index}}" role="button" aria-expanded="false" aria-controls="{{'multiCollapseExample' . $loop->index}}">
                            <div class="box bg-dark text-center" id="{{'pLiC' . $loop->index}}">
                                <h6 class="text-white">Dati plicometrici</h6>
                            </div>
                        </a>
                    </div>
                </td>
                @if($user->getIsAdult() == false)
                    <td style="padding: 0 15px 0 0">
                        <div class="card card-hover" style="background-color: rgba(31, 38, 45, 0.8)">
                            <a id="{{'tutoDa' . $loop->index}}" onclick="setButton({{$loop->index}}, this.id)" data-toggle="collapse" href="#{{'tutorData' . $loop->index}}" role="button" aria-expanded="false" aria-controls="{{'multiCollapseExample' . $loop->index}}">
                                <div class="box bg-dark text-center" id="{{'tUtO' . $loop->index}}">
                                    <h6 class="text-white">Dati tutore</h6>
                                </div>
                            </a>
                        </div>
                    </td>
                @endif
            </tr>
        </table>

        @include('components.users.anagraficData')
        @include('components.users.anagraficSet')

        @include('components.users.plicometricData')
        @include('components.users.plicometricSet')

        @include('components.users.tutorData')
        @include('components.users.tutorSet')


    </div>
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-12 col-sm-12" style="text-align: center; margin-bottom: 5px;">
            <a id="{{'button_1' . $loop->index}}" href="/admin/modificaUtente/{{$user->getIdDatabase()}}" >
                <button id="{{'button1' . $loop->index}}" class="btn btn-warning" id="fname" name="" style="border-radius: 10px;">Modifica</button>
            </a>
        </div>
        @if($user->getStatus() == TRUE)
        <div class="col-lg-6 col-md-12 col-sm-12" style="text-align: center; margin-bottom: 5px;">
            <a id="{{'button_2' . $loop->index}}" href="/admin/disattivaUtente/{{$user->getIdDatabase()}}">
                <button id="{{'button2' . $loop->index}}" class="btn btn-danger" id="fname" name="" style="border-radius: 10px;">Disattiva</button>
            </a>
        </div>
        @endif
        @if($user->getStatus() == FALSE)
        <div class="col-lg-6 col-md-12 col-sm-12" style="text-align: center; margin-bottom: 5px;">
            <a id="{{'button_2' . $loop->index}}" href="/admin/attivaUtente/{{$user->getIdDatabase()}}" >
                <button id="{{'button2' . $loop->index}}" class="btn btn-success" id="fname" name="" style="border-radius: 10px;">Attiva</button>
            </a>
        </div>
        @endif

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

    function setButton(id, btnName){
        if(btnName === "anaGraph"+id){
            $("#plicMetr"+id).attr("aria-expanded","false");
            $("#plicMetr"+id).attr("class","");
            $("#tutorData"+id).attr("class","multi-collapse collapse");
            $("#tutorSet"+id).attr("class","multi-collapse collapse");
            $("#tutotDa"+id).attr("aria-expanded","false");
            $("#tutotDa"+id).attr("class","");
            $("#plicometricData"+id).attr("class","multi-collapse collapse");
            $("#plicometricSet"+id).attr("class","multi-collapse collapse");

            $("#pLiC"+id).css("background-color", "#3F5469");
            $("#tUtO"+id).css("background-color", "#3F5469");

            if ((document.getElementById("aNaGrAf"+id).style.backgroundColor) === "rgb(31, 38, 45)"){
                $("#aNaGrAf"+id).css("background-color", "#3F5469");
                document.getElementById("bAcK"+id).style.backgroundColor="#d6d8d8";
            }else {
                $("#aNaGrAf"+id).css("background-color", "#1F262D");
                document.getElementById("bAcK" +id).style.backgroundColor ="rgb(214, 216, 216, 0.9)";
            }

        }
        if(btnName === "plicMetr"+id){
            $("#anaGraph"+id).attr("aria-expanded","false");
            $("#anaGraph"+id).attr("class","");
            $("#anagraficData" +id).attr("class","multi-collapse collapse");
            $("#anagraficSet" +id).attr("class","multi-collapse collapse");
            $("#tutorData" +id).attr("class","multi-collapse collapse");
            $("#tutorSet" +id).attr("class","multi-collapse collapse");
            $("#tutotDa" +id).attr("class","");
            $("#tutotDa" +id).attr("aria-expanded","false");

            $("#aNaGrAf" +id).css("background-color", "#3F5469");
            $("#tUtO" +id).css("background-color", "#3F5469");

            if ((document.getElementById("pLiC" +id).style.backgroundColor) === "rgb(31, 38, 45)"){
                $("#pLiC" +id).css("background-color", "#3F5469");
                document.getElementById("bAcK" +id).style.backgroundColor="#d6d8d8";
            }else {
                $("#pLiC" +id).css("background-color", "#1F262D");
                document.getElementById("bAcK" +id).style.backgroundColor ="rgb(214, 216, 216, 0.9)";
            }

        }
        if(id === "tutoDa" +id){

            $("#plicMetr" +id).attr("aria-expanded","false");
             $("#plicMetr" +id).attr("class","");
            $("#plicometricData" +id).attr("class","multi-collapse collapse");
            $("#plicometricSet" +id).attr("class","multi-collapse collapse");
            $("#anagraficData" +id).attr("class","multi-collapse collapse");
            $("#anagraficSet" +id).attr("class","multi-collapse collapse");
            $("#anaGraph" +id).attr("class","");
            $("#anaGraph" +id).attr("aria-expanded","false");

            $("#aNaGrAf" +id).css("background-color", "#3F5469");
            $("#pLiC" +id).css("background-color", "#3F5469");

            if ((document.getElementById("tUtO" +id).style.backgroundColor) === "rgb(31, 38, 45)"){
                $("#tUtO" +id).css("background-color", "#3F5469");
                document.getElementById("bAcK" +id).style.backgroundColor="#d6d8d8";
            }else {
                $("#tUtO" +id).css("background-color", "#1F262D");
                document.getElementById("bAcK" +id).style.backgroundColor ="rgb(214, 216, 216, 0.9)";
            }
        }
    }

    function setNew(id){

        let x = $("#plicMetr"+id).attr("href");

        if(x === "#plicometricData"+id){

            $("#plicMetr"+id).attr("href","#plicometricSet"+id);
            $("#plicMetr"+id).attr("aria-expanded","false");
            $("#plicMetr"+id).attr("class","");
            $("#plicometricData"+id).attr("class","multi-collapse collapse");


            $("#button1"+id).attr("class", "btn btn-success");
            $("#button1"+id).text("Aggiorna");

            $("#button_2"+id).attr("href", "#");
            $("#button2"+id).text("Annulla");


            if ((document.getElementById("pLiC"+id).style.backgroundColor) === "rgb(31, 38, 45)"){
                $("#plicMetr"+id).attr("aria-expanded","true");
                $("#plicMetr"+id).attr("class","");
                $("#plicometricSet"+id).attr("class","multi-collapse collapse show");
            }

            $("#anaGraph"+id).attr("href","#anagraficSet"+id);
            $("#anagraficData"+id).attr("class","multi-collapse collapse");
            $("#anaGraph"+id).attr("class","");
            $("#anaGraph"+id).attr("aria-expanded","false");

            if ((document.getElementById("aNaGrAf"+id).style.backgroundColor) === "rgb(31, 38, 45)"){
                $("#anagraficSet"+id).attr("class","multi-collapse collapse show");
                $("#anaGraph"+id).attr("class","");
                $("#anaGraph"+id).attr("aria-expanded","true");
            }

            $("#tutorData"+id).attr("class","multi-collapse collapse");
            $("#tutotDa"+id).attr("class","");
            $("#tutoDa"+id).attr("href","#tutorSet"+id);
            $("#tutotDa"+id).attr("aria-expanded","false");

            if ((document.getElementById("tUtO"+id).style.backgroundColor) === "rgb(31, 38, 45)"){
                $("#tutotDa"+id).attr("aria-expanded","true");
                $("#tutorSet"+id).attr("class","multi-collapse collapse show");
                $("#tutotDa"+id).attr("class","");

            }

        }else{
            $("#plicMetr"+id).attr("href","#plicometricData"+id);
            $("#plicMetr"+id).attr("aria-expanded","false");
            $("#plicMetr"+id).attr("class","");
            $("#plicometricSet"+id).attr("class","multi-collapse collapse");

            $("#button_1"+id).attr("href", "/admin");


            if ((document.getElementById("pLiC"+id).style.backgroundColor) === "rgb(31, 38, 45)"){
                $("#plicMetr"+id).attr("aria-expanded","true");
                $("#plicMetr"+id).attr("class","");
                $("#plicometricData"+id).attr("class","multi-collapse collapse show");
            }

            $("#anagraficSet"+id).attr("class","multi-collapse collapse");
            $("#anaGraph"+id).attr("class","");
            $("#anaGraph"+id).attr("aria-expanded","false");
            $("#anaGraph"+id).attr("href","#anagraficData"+id);

            if ((document.getElementById("aNaGrAf"+id).style.backgroundColor) === "rgb(31, 38, 45)"){
                $("#anagraficData"+id).attr("class","multi-collapse collapse show");
                $("#anaGraph"+id).attr("class","");
                $("#anaGraph"+id).attr("aria-expanded","true");
            }

            $("#tutoDa"+id).attr("href","#tutorData"+id);
            $("#tutorSet"+id).attr("class","multi-collapse collapse");
            $("#tutotDa"+id).attr("class","");
            $("#tutotDa"+id).attr("aria-expanded","false");

            if ((document.getElementById("tUtO"+id).style.backgroundColor) === "rgb(31, 38, 45)"){
                $("#tutorSet"+id).attr("class","multi-collapse collapse show");
                $("#tutotDa"+id).attr("class","collapse");
                $("#tutotDa"+id).attr("aria-expanded","true");
            }

        }
    }

    function buttonRed(id) {
        if(($("#button_2"+id).attr("href"))==="#"){
            $("#button2"+id).text("Disattiva");
            $("#button1"+id).attr("class", "btn btn-warning");
            $("#button1"+id).text("Modifica");

            $("#plicometricSet"+id).attr("class","multi-collapse collapse");
            $("#plicMetr"+id).attr("href","#plicometricData"+id);
            $("#plicMetr"+id).attr("aria-expanded","false");
            $("#plicMetr"+id).attr("class","");

            if ((document.getElementById("pLiC"+id).style.backgroundColor) === "rgb(31, 38, 45)"){
                $("#plicMetr"+id).attr("aria-expanded","true");
                $("#plicMetr"+id).attr("class","");
                $("#plicometricData"+id).attr("class","multi-collapse collapse show");
            }

            $("#anagraficSet"+id).attr("class","multi-collapse collapse");
            $("#anaGraph"+id).attr("class","");
            $("#anaGraph"+id).attr("aria-expanded","false");
            $("#anaGraph"+id).attr("href","#anagraficData"+id);

            if ((document.getElementById("aNaGrAf"+id).style.backgroundColor) === "rgb(31, 38, 45)"){
                $("#anagraficData"+id).attr("class","multi-collapse collapse show");
                $("#anaGraph"+id).attr("class","");
                $("#anaGraph"+id).attr("aria-expanded","true");
            }

            $("#tutorSet"+id).attr("class","multi-collapse collapse");
            $("#tutoDa"+id).attr("href","#tutorData"+id);
            $("#tutotDa"+id).attr("class","");
            $("#tutotDa"+id).attr("aria-expanded","false");

            if ((document.getElementById("tUtO"+id).style.backgroundColor) === "rgb(31, 38, 45)"){
                $("#tutorSet"+id).attr("class","multi-collapse collapse show");
                $("#tutotDa"+id).attr("class","collapse");
                $("#tutotDa"+id).attr("aria-expanded","true");
            }

        }
    }
</script>
