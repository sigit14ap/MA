<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>
    <link href="{{asset('assets/css/plugins/dualListbox/bootstrap-duallistbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/plugins/steps/jquery.steps.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
    <script src="{{asset('plugins/jquery/jquery-2.1.4.min.js')}}"></script>
    <link href="{{asset('assets/css/select2.min.css')}}" rel="stylesheet" />
    <script src="{{asset('assets/js/select2.min.js')}}"></script>

    <link href="{{asset('assets/css/bootstrap-select.min.css')}}" rel="stylesheet" />
    <script src="{{asset('assets/js/bootstrap-select.min.js')}}"></script>
    <link href="{{asset('assets/css/plugins/iCheck/custom.css')}}" rel="stylesheet">

    @yield('styles')
    @yield('scripts-header')
    <style type="text/css">
        @media (max-width: 992px) {
          .user-profile {
            margin: 1px -242px !important;
          }
        }
    </style>
</head>

<body class="pace-done fixed-sidebar skin-3">

    <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="{{asset('assets/img/bnn.png')}}" style="width: 50px;height: 50px;" />
                             </span>
                            <span class="clear"> 
                                <span class="block m-t-xs"> <strong class="font-bold">{{ucwords(auth()->user()->name)}}</strong>
                                </span>
                                <span class="text-muted text-xs block">
                                    {{ucwords(auth()->user()->role)}}
                                </span>
                            </span>
                    </div>
                    <div class="logo-element">
                        Ma'had Aly
                    </div>
                </li>
                @if((Auth::user()->role == "pusat") || (Auth::user()->role == "lembaga"))
                <li>
                    <a href="{{ route('pesantren.index') }}"><i class="fa fa-briefcase"></i> <span class="nav-label">Pesantren</span></a>
                </li>
                @endif
                <li>
                    <a href="{{ route('lembaga.index') }}"><i class="fa fa-briefcase"></i> <span class="nav-label">Lembaga</span></a>
                </li>
                <li>
                    <a href="{{ route('logout') }}"><i class="fa fa-sign-out"></i> <span class="nav-label">Logout</span></a>
                </li>
            </ul>

        </div>
    </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom" style="margin-bottom: 20px;">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header" style="margin-top: -13px;">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#" style="margin-top: 28px;"><i class="fa fa-bars"></i> </a>
        </div>
            <ul class="nav navbar-top-links navbar-right" style="float: right;">
                <li>
                    <span class="m-r-sm text-muted">Welcome 
                        @if(auth()->user()->name == trim(auth()->user()->name) && strpos(auth()->user()->name, ' ') !== false)
                        {{ucwords(strstr(auth()->user()->name, ' ', true))}}
                        @else
                        {{ucwords(auth()->user()->name)}}
                        @endif
                    .</span>
                </li>

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{URL::to('/')}}/storage/photo/{{ Auth::user()->photo_path }}" class="img-circle" alt="User Image" style="width: 50px;height: 50px;">
                    </a>
                    <ul class="dropdown-menu dropdown-alerts user-profile" style="float: right;">
                        <li>
                            {{-- <a href="{{ route('profile.index') }}"> --}}
                                <div>
                                <center>
                                    <i class="fa fa-envelope fa-user-o"></i> Profile
                                </center>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="{{ route('logout') }}">
                                    <strong>Logout</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>

        </nav>
        </div>