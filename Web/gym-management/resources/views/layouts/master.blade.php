<!doctype html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <title>Matrix Template - The Ultimate Multipurpose admin template</title>
    <!-- Custom CSS -->
    <link href="../matrix-admin-bt4/assets/libs/flot/css/float-chart.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../matrix-admin-bt4/dist/css/style.min.css" rel="stylesheet">

    <link href="../css/bttn.min.css" rel="stylesheet">

    <script src="https://www.gstatic.com/firebasejs/7.2.0/firebase-auth.js"></script>

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    @toastr_css

</head>

<body style="background-color: #EEEEEE">



<div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
@include('components.nav')
<!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
@include('components.sidebar')
<!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
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
<script>
    function myFunction() {
        myFunction1();
        var x = document.getElementById("myDIV");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }</script>
<script>
    function myFunction1() {
        var x = document.getElementById("myDiv");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }</script>


</body>

@jquery
@toastr_js
@toastr_render
</html>
