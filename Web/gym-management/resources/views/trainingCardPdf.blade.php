<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

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
<style>
    .page-break {
        page-break-after: always;
    }
    <?php include(public_path().'/matrix-admin-bt4/assets/libs/jquery-steps/jquery.steps.css');?>
    <?php include(public_path().'/matrix-admin-bt4/assets/libs/jquery-steps/steps.css');?>
    <?php include(public_path().'/matrix-admin-bt4/dist/css/style.min.css');?>
    <?php include(public_path().'/css/bttn.min.css');?>
    <?php include(public_path().'/matrix-admin-bt4/assets/libs/flot/css/float-chart.css');?>



</style>

<div id="content">
    <img src="https://firebasestorage.googleapis.com/v0/b/fitandfight.appspot.com/o/addominali-plank-braccia-tese-ag.png?alt=media" class="img-fluid" style="width: 30%">

    <p>a pararaph</p>
</div>
<div id="editor"></div>
<button id="cmd">generate PDF</button>


</body>
</html>



<script>
    let doc = new jsPDF();
    let specialElementHandlers = {
        '#editor': function (element, renderer) {
            return true;
        }
    };

    $('#cmd').click(function () {
        doc.fromHTML($('#content').html(), 15, 15, {
            'width': 170,
            'elementHandlers': specialElementHandlers
        });
        doc.save('TainingCard.pdf');
    });

</script>
