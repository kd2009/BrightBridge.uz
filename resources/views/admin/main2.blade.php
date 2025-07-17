<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>AdminPanel</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="/public/adminsite/https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/public/adminsite/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/public/adminsite/https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="/public/adminsite/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/public/adminsite/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="/public/adminsite/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/public/adminsite/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/public/adminsite/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/public/adminsite/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/public/adminsite/plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="/public/adminsite/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{route('home')}}" class="nav-link">Home</a>

            </li>  <li class="nav-item d-none d-sm-inline-block">
                <a href="{{route('main')}}" class="nav-link">Main</a>

            </li>

        </ul>

        <!-- Right navbar links -->
        
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
   @include("admin.inc.left")

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                   
                   
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">



            @yield("content")
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->  <link href="/public/adminsite/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="/public/adminsite/dist/css/font-awesome.min.css" rel="stylesheet">
<link href="/public/adminsite/dist/css/prettyPhoto.css" rel="stylesheet">
<link href="/public/adminsite/dist/css/price-range.css" rel="stylesheet">
<link href="/public/adminsite/dist/css/animate.css" rel="stylesheet">
<link href="/public/adminsite/dist/css/main.css" rel="stylesheet">
<link href="/public/adminsite/dist/css/responsive.css" rel="stylesheet">
<!--[if lt IE 9]>
<script src="/public/js/html5shiv.js"></script>
<script src="/public/js/respond.min.js"></script>
<![endif]-->
<link rel="shortcut icon" href="../public/images/ico/favicon.ico">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="../public/images/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../public/images/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../public/images/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="../public/images/ico/apple-touch-icon-57-precomposed.png">
<script src="/public/adminsite/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/public/adminsite/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/public/adminsite/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/public/adminsite/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/public/adminsite/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="/public/adminsite/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/public/adminsite/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="/public/adminsite/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/public/adminsite/plugins/moment/moment.min.js"></script>
<script src="/public/adminsite/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/public/adminsite/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/public/adminsite/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/public/adminsite/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/public/adminsite/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/public/adminsite/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/public/adminsite/dist/js/pages/dashboard.js"></script><script src="/public/adminsite/js/jquery.js"></script>
<script src="/public/adminsite/js/bootstrap.min.js"></script>
<script src="/public/adminsite/js/jquery.scrollUp.min.js"></script>
<script src="/public/adminsite/js/price-range.js"></script>
<script src="/public/adminsite/js/jquery.prettyPhoto.js"></script>
<script src="/public/adminsite/js/main.js"></script>
</body>
</html>
