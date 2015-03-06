<!DOCTYPE html>
<html lang="en"><head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>

    @section('title')
    | Neighbor Network
    @show

    </title>

    <meta name="description" content="">
        <!-- Bootstrap Core CSS -->
        <!-- global css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- MetisMenu CSS -->
        <link href="{{ asset('assets/css/plugins/metisMenu/metisMenu.min.css')}}" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="{{ asset('assets/css/plugins/timeline.css')}}" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{ asset('assets/css/sb-admin.css')}}" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="{{ asset('assets/css/plugins/morris.css')}}" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="{{ asset('assets/font-awesome-4.1.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

        <link href="{{ asset('assets/css/custom.css')}}" rel="stylesheet">
{{--        <link href="{{ asset('assets/css/atom-style.css')}}" rel="stylesheet">--}}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ URL::to('dashboard') }}">Neighbor Network Admin</a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="small-text">John Smith</span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{ URL::to('logout') }}"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="{{ URL::to('dashboard') }}" class="{{ (Request::is('dashboard') || Request::is('dashboard/*') ? 'active' : '') }}">
                    <i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li>
                <li>
                    <a href="{{ URL::to('announcement') }}" class="{{ (Request::is('announcement') || Request::is('announcement/*') ? 'active' : '') }}">
                    <i class="fa fa-bullhorn"></i> Announcement</a>
                </li>
                <li>
                    <a href="{{ URL::to('properties') }}" class="{{ (Request::is('properties') || Request::is('properties/*') ? 'active' : '') }}">
                    <i class="fa fa-fw fa-building"></i> Properties</a>
                </li>
                <li>
                    <a href="{{ URL::to('users') }}" class="{{ (Request::is('users') || Request::is('users/*') ? 'active' : '') }}">
                    <i class="fa fa-fw fa-user"></i> Users</a>
                </li>
                <li>
                    <a href="{{ URL::to('reports') }}" class="{{ (Request::is('reports') || Request::is('reports/*') ? 'active' : '') }}">
                    <i class="fa fa-fw fa-flag"></i> Reports</a>
                </li>
                <li>
                    <a href="{{ URL::to('notifications') }}" class="{{ (Request::is('notifications') || Request::is('notifications/*') ? 'active' : '') }}">
                    <i class="fa fa-fw fa-envelope-o"></i> Notifications</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
    {{--<div id="page-wrapper">--}}
        {{--<div class="container-fluid">--}}

            {{--<!-- Page Heading -->--}}
            {{--<div class="row">--}}
                {{--<div class="col-lg-12">--}}
                    {{--<h1 class="page-header">--}}
                        {{--Blank Page--}}
                        {{--<small>Subheading</small>--}}
                    {{--</h1>--}}
                    {{--<ol class="breadcrumb">--}}
                        {{--<li>--}}
                            {{--<i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>--}}
                        {{--</li>--}}
                        {{--<li class="active">--}}
                            {{--<i class="fa fa-file"></i> Blank Page--}}
                        {{--</li>--}}
                    {{--</ol>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<!-- /.row -->--}}

        {{--</div>--}}
        {{--<!-- /.container-fluid -->--}}
    {{--</div>--}}
    {{--<!-- /#page-wrapper -->--}}
{{--@yield('header_styles')--}}


@yield('content')

</div>
<!-- /#wrapper -->


<!-- jQuery -->
<script src="{{ asset('assets/js/jquery.min.js') }}" type="text/javascript"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>

@yield('footer_scripts')
</body>
</html>