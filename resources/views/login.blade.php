<!DOCTYPE html>
<html>

<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <title>Payment System</title>
    <meta name="keywords" content="HTML5 Bootstrap 3 Admin Template UI Theme" />
    <meta name="description" content="AdminDesigns - SHARED ON THEMELOCK.COM">
    <meta name="author" content="AdminDesigns">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font CSS (Via CDN) -->
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800'>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300">

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="assets/skin/default_skin/css/theme.css">

    <!-- Admin Forms CSS -->
    <link rel="stylesheet" type="text/css" href="assets/admin-tools/admin-forms/css/admin-forms.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
   <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
   <![endif]-->
</head>

<body class="external-page sb-l-c sb-r-c">

    <!-- Start: Main -->
    <div id="main" class="animated fadeIn">

        <!-- Start: Content-Wrapper -->
        <section id="content_wrapper">

            <!-- begin canvas animation bg -->
            <div id="canvas-wrapper">
                <canvas id="demo-canvas"></canvas>
            </div>

            <!-- Begin: Content -->
            <section id="content">

                <div class="admin-form theme-info" id="login1">

                    <div class="row mb15 table-layout">

                        <div class="col-xs-12 va-m pln">
                            <a href="dashboard.html" title="Return to Dashboard">
                                <img src="assets/img/logos/logo_white.png" title="AdminDesigns Logo" class="img-responsive w250">
                            </a>
                        </div>
                    </div>

                    <div class="panel panel-info mt10 br-n">

                        <!-- end .form-header section -->
                        <form method="post" action="{{ url('login') }}" id="contact">
                        {{ csrf_field() }}
                            <div class="panel-body bg-light p30">
                                @if($errors->has('errorMessage'))
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    {{ $errors->first('errorMessage') }}
                                </div>
                                @endif
                                <div class="row">
                                    <div class="col-sm-12 pr30">
                                        <div class="section">
                                            <label for="username" class="field-label text-muted fs18 mb10">Username</label>
                                            <label for="username" class="field prepend-icon">
                                                <input type="text" name="username" id="username" class="gui-input" placeholder="Enter username">
                                                <label for="username" class="field-icon"><i class="fa fa-user"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->

                                        <div class="section">
                                            <label for="password" class="field-label text-muted fs18 mb10">Password</label>
                                            <label for="password" class="field prepend-icon">
                                                <input type="password" name="password" id="password" class="gui-input" placeholder="Enter password">
                                                <label for="password" class="field-icon"><i class="fa fa-lock"></i>
                                                </label>
                                            </label>
                                        </div>
                                        <!-- end section -->

                                    </div>
                                </div>
                            </div>
                            <!-- end .form-body section -->
                            <div class="panel-footer clearfix p10 ph15">
                                <button type="submit" class="button btn-primary mr10 pull-right">Login</button>
                            </div>
                            <!-- end .form-footer section -->
                        </form>
                    </div>
                </div>

            </section>
            <!-- End: Content -->

        </section>
        <!-- End: Content-Wrapper -->

    </div>
    <!-- End: Main -->

    <!-- BEGIN: PAGE SCRIPTS -->

    <!-- jQuery -->
    <script type="text/javascript" src="vendor/jquery/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="vendor/jquery/jquery_ui/jquery-ui.min.js"></script>

    <!-- Bootstrap -->
    <script type="text/javascript" src="assets/js/bootstrap/bootstrap.min.js"></script>

    <!-- Page Plugins -->
    <script type="text/javascript" src="assets/js/pages/login/EasePack.min.js"></script>
    <script type="text/javascript" src="assets/js/pages/login/rAF.js"></script>
    <script type="text/javascript" src="assets/js/pages/login/TweenLite.min.js"></script>
    <script type="text/javascript" src="assets/js/pages/login/login.js"></script>

    <!-- Theme Javascript -->
    <script type="text/javascript" src="assets/js/utility/utility.js"></script>
    <script type="text/javascript" src="assets/js/main.js"></script>    
    <script type="text/javascript" src="assets/js/demo.js"></script>

    <!-- Page Javascript -->
    <script type="text/javascript">
        jQuery(document).ready(function() {

            "use strict";

            // Init Theme Core      
            Core.init();

            // Init Demo JS
            Demo.init();

            // Init CanvasBG and pass target starting location
            CanvasBG.init({
                Loc: {
                    x: window.innerWidth / 2,
                    y: window.innerHeight / 3.3
                },
            });


        });
    </script>

    <!-- END: PAGE SCRIPTS -->

</body>

</html>