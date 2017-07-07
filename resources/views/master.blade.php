<!DOCTYPE html>
<html>

<head>
    @section('head')
        @include('includes.head')
    @show
</head>

<body class="dashboard-page sb-l-o sb-r-c">

    <!-- Start: Main -->
    <div id="main">

        <!-- Start: Header -->
        <header class="navbar navbar-fixed-top bg-light">
            <div class="navbar-branding">
                <a class="navbar-brand" href="dashboard.html"> <b>Payment </b>System
                </a>
                <span id="toggle_sidemenu_l" class="glyphicons glyphicons-show_lines"></span>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="ph10 pv20 hidden-xs"> <i class="fa fa-circle text-tp fs8"></i>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle fw600 p15" data-toggle="dropdown"> <img src="{{ asset('assets/img/avatars/1.jpg') }}" alt="avatar" class="mw30 br64 mr15">
                        <span>{{ \Auth::user()->getName() }}</span>
                        <span class="caret caret-tp hidden-xs"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-persist pn w250 bg-white" role="menu">
                        <li class="br-t of-h">
                            <a href="{{ URL('logout') }}" class="fw600 p12 animated animated-short fadeInDown">
                                <span class="fa fa-power-off pr5"></span> Logout </a>
                        </li>
                    </ul>
                </li>
            </ul>

        </header>
        <!-- End: Header -->
        <!-- Start: Sidebar -->
        <aside id="sidebar_left" class="nano nano-primary">
            <div class="nano-content">

                <!-- sidebar menu -->
                <ul class="nav sidebar-menu">
                    @foreach($navigations as $navigation)
                    <li>
                        <a class="{{ empty($navigation['children']) ? '' : 'accordion-toggle' }}" href="{{ empty($navigation['children']) ? url($navigation['route']) : '#' }}">
                            <span class="fa fa-{{ $navigation['icon'] }}"></span>
                            <span class="sidebar-title">{{ $navigation['label'] }}</span>
                            @if(!empty($navigation['children']))
                            <span class="caret"></span>
                            @endif
                        </a>
                        @if(!empty($navigation['children']))
                        <ul class="nav sub-nav" style="">
                            @foreach($navigation['children'] as $child)
                            <li>
                                <a href="{{ url($child['route']) }}">
                                    <span class="fa fa-{{ $child['icon'] }}"></span> {{ $child['label'] }} </a>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                    @endforeach
                </ul>
                <div class="sidebar-toggle-mini">
                    <a href="#">
                        <span class="fa fa-sign-out"></span>
                    </a>
                </div>
            </div>
        </aside>

        <!-- Start: Content-Wrapper -->
        <section id="content_wrapper">

            <!-- Start: Topbar -->
            <header id="topbar">
                <div class="topbar-left">
                    <ol class="breadcrumb">
                        <li class="crumb-active">
                            <a href="dashboard.html">Dashboard</a>
                        </li>
                        <li class="crumb-icon">
                            <a href="dashboard.html">
                                <span class="glyphicon glyphicon-home"></span>
                            </a>
                        </li>
                        <li class="crumb-link">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="crumb-trail">Dashboard</li>
                    </ol>
                </div>
            </header>
            <!-- End: Topbar -->

            <!-- Begin: Content -->
            <section id="content" class="animated fadeIn">
                @if(Session::has('successMessage'))
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ Session::get('successMessage') }}
                </div>
                @endif

                @if($errors->has('errorMessage'))
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ $errors->first('errorMessage') }}
                </div>
                @endif
                <!-- Dashboard Tiles -->
                @section('content')

                @show
                
            </section>
            <!-- End: Content -->

        </section>
        <!-- End: Content-Wrapper -->
       
    </div>
    <!-- End: Main -->

@section('script')
    @include('includes.script')
@show

</body>

</html>
