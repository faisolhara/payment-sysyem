
<!DOCTYPE html>
<html>

<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <title>Payment System || 403</title>
    <meta name="keywords" content="HTML5 Bootstrap 3 Admin Template UI Theme" />
    <meta name="description" content="AdminDesigns - SHARED ON THEMELOCK.COM">
    <meta name="author" content="AdminDesigns">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font CSS (Via CDN) -->
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800'>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300">

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/skin/default_skin/css/theme.css') }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

</head>

<body class="error-page sb-l-o sb-r-c">

    <!-- Start: Main -->
    <div id="main">

        

            <!-- Begin: Content -->
            <section id="content" class="pn animated fadeIn">

                <div class="center-block mt50 mw800 animated fadeIn">
                    <h1 class="error-title"> 403! </h1>
                    <h2 class="error-subtitle">Permission Denied</h2>
                </div>

                <div class="mid-section animated fadeIn">
                    <div class="mid-content clearfix">
                        <input type="text" class="form-control" placeholder="Ask me a question!" value="Ask me a question!">
                        <div class="pull-left">
                            <img src="{{ asset('assets/img/logos/logo_grey.png') }}" class="img-responsive mt20 w225" alt="logo">
                        </div>
                        <div class="pull-right mt20">
                            <a href="#" title="facebook link"><i class="fa fa-facebook-square fs40 text-primary mr15"></i>
                            </a>
                            <a href="#" title="twitter link"><i class="fa fa-twitter-square fs40 text-info mr15"></i>
                            </a>
                            <a href="#" title="google plus link"><i class="fa fa-google-plus-square fs40 text-danger-light mr15"></i>
                            </a>
                            <a href="#" title="email link"><i class="fa fa-envelope-square fs40 text-warning"></i>
                            </a>
                        </div>

                    </div>
                </div>

            </section>
            <!-- End: Content -->

    </div>
    <!-- End: Main -->

    <!-- BEGIN: PAGE SCRIPTS -->

    <!-- jQuery -->
    <script type="text/javascript" src="{{ asset('vendor/jquery/jquery-1.11.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/jquery/jquery_ui/jquery-ui.min.js') }}"></script>

    <!-- Bootstrap -->
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap/bootstrap.min.js') }}"></script>

    <!-- Theme Javascript -->
    <script type="text/javascript" src="{{ asset('assets/js/utility/utility.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/main.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/demo.js') }}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {

            "use strict";

            // Init Theme Core    
            Core.init();

            // Init Demo JS    
            Demo.init();

        });
    </script>
    <!-- END: PAGE SCRIPTS -->

</body>

</html>
