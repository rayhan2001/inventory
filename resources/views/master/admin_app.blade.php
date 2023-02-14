<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">
    <link rel="shortcut icon" href="{{asset('adminAsset')}}/images/favicon_1.ico">
    <title>@yield('title')</title>

    <!-- Base Css Files -->
    <link href="{{asset('adminAsset')}}/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Font Icons -->
    <link href="{{asset('adminAsset')}}/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="{{asset('adminAsset')}}/assets/ionicon/css/ionicons.min.css" rel="stylesheet" />
    <link href="{{asset('adminAsset')}}/css/material-design-iconic-font.min.css" rel="stylesheet">

    <!-- animate css -->
    <link href="{{asset('adminAsset')}}/css/animate.css" rel="stylesheet" />

    <!-- Waves-effect -->
    <link href="{{asset('adminAsset')}}/css/waves-effect.css" rel="stylesheet">

    <!-- sweet alerts -->
    <link href="{{asset('adminAsset')}}/assets/sweet-alert/sweet-alert.min.css" rel="stylesheet">
    <!--Form Wizard-->
    <link rel="stylesheet" type="text/css" href="{{asset('adminAsset')}}/assets/form-wizard/jquery.steps.css" />

    <!-- DataTables -->
    <link href="{{asset('adminAsset')}}/assets/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
    <!-- Custom Files -->
    <link href="{{asset('adminAsset')}}/css/helper.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('adminAsset')}}/css/style.css" rel="stylesheet" type="text/css" />
    {{--Toaster--}}
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->


    <script src="{{asset('adminAsset')}}/js/modernizr.min.js"></script>

</head>



<body class="fixed-left">

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    @include('admin.include.header')
    <!-- Top Bar End -->


    <!-- ========== Left Sidebar Start ========== -->
    @include('admin.include.sidebar')
    <!-- Left Sidebar End -->



    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        @yield('content')
    </div>
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->


    <!-- Right Sidebar -->
    @include('admin.include.right_sidebar')
    <!-- /Right-bar -->

</div>
<!-- END wrapper -->



<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="{{asset('adminAsset')}}/js/jquery.min.js"></script>
<script src="{{asset('adminAsset')}}/js/bootstrap.min.js"></script>
<script src="{{asset('adminAsset')}}/js/waves.js"></script>
<script src="{{asset('adminAsset')}}/js/wow.min.js"></script>
<script src="{{asset('adminAsset')}}/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="{{asset('adminAsset')}}/js/jquery.scrollTo.min.js"></script>
<script src="{{asset('adminAsset')}}/assets/chat/moment-2.2.1.js"></script>
<script src="{{asset('adminAsset')}}/assets/jquery-sparkline/jquery.sparkline.min.js"></script>
<script src="{{asset('adminAsset')}}/assets/jquery-detectmobile/detect.js"></script>
<script src="{{asset('adminAsset')}}/assets/fastclick/fastclick.js"></script>
<script src="{{asset('adminAsset')}}/assets/jquery-slimscroll/jquery.slimscroll.js"></script>
<script src="{{asset('adminAsset')}}/assets/jquery-blockui/jquery.blockUI.js"></script>

{{--Toaster--}}
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}

<!-- sweet alerts -->
<script src="{{asset('adminAsset')}}/assets/sweet-alert/sweet-alert.min.js"></script>
<script src="{{asset('adminAsset')}}/assets/sweet-alert/sweet-alert.init.js"></script>

<!-- flot Chart -->
<script src="{{asset('adminAsset')}}/assets/flot-chart/jquery.flot.js"></script>
<script src="{{asset('adminAsset')}}/assets/flot-chart/jquery.flot.time.js"></script>
<script src="{{asset('adminAsset')}}/assets/flot-chart/jquery.flot.tooltip.min.js"></script>
<script src="{{asset('adminAsset')}}/assets/flot-chart/jquery.flot.resize.js"></script>
<script src="{{asset('adminAsset')}}/assets/flot-chart/jquery.flot.pie.js"></script>
<script src="{{asset('adminAsset')}}/assets/flot-chart/jquery.flot.selection.js"></script>
<script src="{{asset('adminAsset')}}/assets/flot-chart/jquery.flot.stack.js"></script>
<script src="{{asset('adminAsset')}}/assets/flot-chart/jquery.flot.crosshair.js"></script>

<!-- Counter-up -->
<script src="{{asset('adminAsset')}}/assets/counterup/waypoints.min.js" type="text/javascript"></script>
<script src="{{asset('adminAsset')}}/assets/counterup/jquery.counterup.min.js" type="text/javascript"></script>

<!--Form Wizard-->
<script src="{{asset('adminAsset')}}/assets/form-wizard/jquery.steps.min.js" type="text/javascript"></script>
<script type="text/javascript" src="{{asset('adminAsset')}}/assets/jquery.validate/jquery.validate.min.js"></script>
<!--wizard initialization-->
<script src="{{asset('adminAsset')}}/assets/form-wizard/wizard-init.js" type="text/javascript"></script>

<!-- CUSTOM JS -->
<script src="{{asset('adminAsset')}}/js/jquery.app.js"></script>
<script src="{{asset('adminAsset')}}/assets/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('adminAsset')}}/assets/datatables/dataTables.bootstrap.js"></script>

<!-- Dashboard -->
<script src="{{asset('adminAsset')}}/js/jquery.dashboard.js"></script>

<!-- Chat -->
<script src="{{asset('adminAsset')}}/js/jquery.chat.js"></script>

<!-- Todo -->
<script src="{{asset('adminAsset')}}/js/jquery.todo.js"></script>

<script type="text/javascript">
    /* ==============================================
    Counter Up
    =============================================== */
    jQuery(document).ready(function($) {
        $('.counter').counterUp({
            delay: 100,
            time: 1200
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').dataTable();
    } );
</script>

</body>
</html>
