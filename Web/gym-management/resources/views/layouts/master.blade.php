<!doctype html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon"  href="/images/Fit&Fight.png">
    <title>Fit & Fight</title>
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

    @toastr_css

</head>

<style>
    .form-control {
        border-radius: 10px;
    }
    .input-group {
        border-radius: 10px;
    }
</style>

<body style="background: transparent">



<div id="main-wrapper"  style="background-image: url('images/wall.jpg'); background-size: cover; padding-bottom: 14%;background-attachment: fixed;">

@include('components.navbar')
@include('components.sidebar')

<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper" style="background: transparent">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->

        <div class="container-fluid">

            @yield('content')

        </div>


        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</div>



<script src="../matrix-admin-bt4/assets/libs/jquery/dist/jquery.min.js"></script>

<script src="../matrix-admin-bt4/assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="../matrix-admin-bt4/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../matrix-admin-bt4/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="../matrix-admin-bt4/assets/extra-libs/sparkline/sparkline.js"></script>

<script src="../matrix-admin-bt4/dist/js/custom.min.js"></script>

<script src="../matrix-admin-bt4/assets/libs/flot/excanvas.js"></script>
<script src="../matrix-admin-bt4/assets/libs/flot/jquery.flot.js"></script>
<script src="../matrix-admin-bt4/assets/libs/flot/jquery.flot.pie.js"></script>
<script src="../matrix-admin-bt4/assets/libs/flot/jquery.flot.time.js"></script>
<script src="../matrix-admin-bt4/assets/libs/flot/jquery.flot.stack.js"></script>
<script src="../matrix-admin-bt4/assets/libs/flot/jquery.flot.crosshair.js"></script>
<script src="../matrix-admin-bt4/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
<script src="../matrix-admin-bt4/dist/js/pages/chart/chart-page-init.js"></script>
<script src="../matrix-admin-bt4/assets/libs/jquery-steps/build/jquery.steps.min.js"></script>
<script src="../matrix-admin-bt4/assets/libs/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="../matrix-admin-bt4/assets/libs/jquery/dist/js/custom.min.js"></script>
<script src="../matrix-admin-bt4/assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="../matrix-admin-bt4/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../matrix-admin-bt4/assets/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="../matrix-admin-bt4/assets/assets/extra-libs/sparkline/sparkline.js"></script>
<script src="../matrix-admin-bt4/assets/assets/libs/jquery/dist/jquery.min.js"></script>


<script>
    // Basic Example with form
    var form = $("#example-form");
    form.validate({
        errorPlacement: function errorPlacement(error, element) { element.before(error); },
        rules: {
            confirm: {
                equalTo: "#password"
            }
        }
    });
    form.children("div").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        onStepChanging: function(event, currentIndex, newIndex) {
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onFinishing: function(event, currentIndex) {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function(event, currentIndex) {
            alert("Submitted!");
        }
    });


</script>

<script>
    function myFunction() {

        var x = document.getElementById("myDiv");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }

        let inputs = [
            document.getElementById('parentName'),
            document.getElementById('parentSurname'),
            document.getElementById('parentGender'),
            document.getElementById('parentDateOfBirth'),
            document.getElementById('parentbirthPlace'),
            document.getElementById('parentResidence'),
            document.getElementById('parentNation'),
            document.getElementById('parentCap'),
            document.getElementById('parentStreet'),
            document.getElementById('parentTelephone'),
            document.getElementById('parentEmail'),
            document.getElementById('parentDocumentImage'),
            document.getElementById('parentDocumentNumber'),
            document.getElementById('parentDocumentType'),
            document.getElementById('parentDocumentReleaseDate'),
            document.getElementById('parentDocumentReleaser'),
        ];
        if (x.style.display === "block") {
            x.style.display = "none";
            inputs.forEach(value => {
                value.removeAttribute("required")
            })
        } else {
            x.style.display = "block";
            inputs.forEach(value => {
                value.setAttribute("required", "");
            })

        }
    }</script>


<script>
    Filevalidation = () => {
        const fi = document.getElementById('documentImage');
        // Check if any file is selected.
        if (fi.files.length > 0) {
            for (const i = 0; i <= fi.files.length - 1; i++) {

                const fsize = fi.files.item(i).size;
                const file = Math.round((fsize / 1024));
                // The size of the file.
                if (file >= 1024) {
                    alert(
                        "File too Big, please select a file less than 4mb");
                } else if (file < 1024) {
                    alert(
                        "");
                } else {
                    document.getElementById('size').innerHTML = '<b>'
                        + file + '</b> KB';
                }
            }
        }
    }
</script>

</body>

@jquery
@toastr_js
@toastr_render
</html>
