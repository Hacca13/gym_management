<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <!-- Custom CSS -->
    <link href="../matrix-admin-bt4/assets/libs/flot/css/float-chart.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../matrix-admin-bt4/dist/css/style.min.css" rel="stylesheet">

    <link href="../css/bttn.min.css" rel="stylesheet">
    <link href="../matrix-admin-bt4/assets/libs/jquery-steps/jquery.steps.css" rel="stylesheet">
    <link href="../matrix-admin-bt4/assets/libs/jquery-steps/steps.css" rel="stylesheet">
    <script src="https://www.gstatic.com/firebasejs/7.2.0/firebase-auth.js"></script>

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
</head>
<body>
<br>
<div class="col-md-12 row">
    <div class="col-md-6">
        <h2 align="left" style="padding-left: 1%">Nome Utente</h2>
    </div>
    <div class="col-md-6">
        <h2 align="right" style="padding-right: 10%">Giorno</h2>
    </div>
    <br>
    <br>
    <br>
    <div class="col-md-12 row" style="border: 2px black solid; margin-top: 1%;margin-left: 1%;margin-bottom: 1%">
        <div class="col-md-2 justify-content-center">
            <img src="../images/user.png" class="embed-responsive" style="padding-top: 30%">
        </div>
        <div class="col-md-1">
            <div style="border-left:2px black solid;height:411px"></div>
        </div>
        <div class="col-md-9">

            <table class="table">
                <thead>
                <tr>
                    <th align="center" scope="col"></th>
                    <th align="center" scope="col"></th>
                    <th align="center" scope="col"><h3>Nome Esercizio</h3></th>
                </tr>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Numero Serie</th>
                    <th scope="col">Numero Ripetizioni</th>
                    <th scope="col">Peso</th>
                    <th scope="col">Tempo Riposo</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Otto</td>
                </tr> <tr>
                    <th scope="row">2</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Otto</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Otto</td>
                </tr>
                <tr>
                    <th scope="row">4</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>Otto</td>
                </tr>
                <tr>
                    <th scope="row">5</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                    <td>Otto</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>


    <div class="col-md-12 row" style="border: 2px black solid; margin-top: 1%;margin-left: 1%;margin-bottom: 1%">
        <div class="col-md-2 justify-content-center">
            <img src="../images/user.png" class="embed-responsive" style="padding-top: 30%">
        </div>
        <div class="col-md-1">
            <div style="border-left:2px black solid;height:411px"></div>
        </div>
        <div class="col-md-9">

            <table class="table">
                <thead>
                <tr>
                    <th align="center" scope="col"></th>
                    <th align="center" scope="col"></th>
                    <th align="center" scope="col"><h3>Nome Esercizio</h3></th>
                </tr>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Numero Serie</th>
                    <th scope="col">Tempo Lavoro</th>
                    <th scope="col">Peso</th>
                    <th scope="col">Tempo Riposo</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Otto</td>
                </tr> <tr>
                    <th scope="row">2</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Otto</td>
                </tr> <tr>
                    <th scope="row">3</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Otto</td>
                </tr>
                <tr>
                    <th scope="row">4</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>Otto</td>
                </tr>
                <tr>
                    <th scope="row">5</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                    <td>Otto</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>
</body>
</html>
