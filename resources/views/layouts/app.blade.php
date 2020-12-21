<!DOCTYPE html>
<html>
<head>
    @include('backEnd.includes.head')
    @stack('css')
    @yield('css')
    <link rel="stylesheet" href="{{asset('css/custom-data-table.css')}}">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    
</head>
<body >
 <!-- aside -->
 <div id="aside" class="app-aside modal fade md nav-expand">
    <div class="left navside dark dk" layout="column">
        <div class="navbar navbar-md no-radius">
            <!-- brand -->
            <a class="navbar-brand" href="{{URL::to('/')}}">
                <img src="{{asset('/backEnd/assets/images/logo.png')}}" alt="Control">
                <span class="hidden-folded inline">SmartEnd</span>
            </a>
            <!-- / brand -->
        </div>
        <div flex class="hide-scroll">
            <nav class="scroll nav-active-primary">

                <ul class="nav" ui-nav>
                    <li class="nav-header hidden-folded">
                        <small class="text-muted">{{Auth::user()->role->name}}</small>
                    </li>
                    @if(Auth::user()->role->name == 'Administrator')
                   <li class="{{ Request::is('report*') ? 'active' : '' }}">
                        <a href="{{route('report.index')}}">
                  <span class="nav-icon">
                    <i class="fa fa-tachometer"></i>
                  </span>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    
                    @else
                     <li>
                    <a href="{{ URL::to('home')}}">
                  <span class="nav-icon">
                    <i class="fa fa-tachometer"></i>
                  </span>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    
                    @endif
                     
                    
                    <li>
                        <a href="{{ URL::to('/')}}" target="_blank">
                  <span class="nav-icon">
                    <i class="fa fa-globe"></i>
                  </span>
                            <span class="nav-text">OPAC (Frontend)</span>
                        </a>
                    </li>
                    @include('layouts.sidebar')

                                                                                                

                </ul>
            </nav>
        </div>
    </div>
</div>

 <!-- content -->
 <div id="content" class="app-content box-shadow-z0" role="main">
    <div class="app-header white box-shadow navbar-md">
    <div class="navbar">


        <!-- Page title - Bind to $state's title -->
        <div class="navbar-item pull-left h5" ng-bind="$state.current.data.title" id="pageTitle">
            
        </div>

        <!-- navbar right -->
        <ul class="nav navbar-nav pull-right">
            <li class="nav-item dropdown">
                <a class="nav-link clear" href data-toggle="dropdown">
                  <span class="avatar w-32">
                                                <img src="{{asset('/backEnd/assets/images/profile.jpg')}}" alt="admin"
                               title="admin">
                                            <i class="on b-white bottom"></i>
                  </span>
                </a>
                <div class="dropdown-menu pull-right dropdown-menu-scale">
                    <a class="dropdown-item" href="{!! route('profile.show',Auth::user()->id) !!}">
                        <span>Profile</span>
                    </a>
                    <a class="dropdown-item"
                        href="{!! route('profile.edit',  Auth::user()->id) !!}"><span>Edit Profile</span></a>
                    <div class="dropdown-divider"></div>
                    <a onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                       class="dropdown-item" href="{!! url('logout') !!}">Logout</a>
                       <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </li>

            <li class="nav-item hidden-md-up">
                <a class="nav-link" data-toggle="collapse" data-target="#collapse">
                    <i class="material-icons">&#xe5d4;</i>
                </a>
            </li>
        </ul>
        <!-- / navbar right -->

        <!-- navbar collapse -->
        <div class="collapse navbar-toggleable-sm" id="collapse">
        </div>
        <!-- / navbar collapse -->
    </div>
</div>
        <div class="app-footer">
            <div class="p-a text-xs">
                <div class="pull-right text-muted">
                    &copy; Copyright <strong>SmartEnd</strong> v7.0.0<span
                            class="hidden-xs-down">- 2020</span>
                    <a ui-scroll-to="content"><i class="fa fa-long-arrow-up p-x-sm"></i></a>
                </div>
                <div class="nav">
                    &nbsp;
                </div>
            </div>
        </div>

        <div ui-view class="app-body" id="view">

            <!-- ############ PAGE START-->
            <div class="padding">
                    @if ( Request::is('home') )
                    <div class="margin">
                        <h5 class="m-b-0 _300">Hi <span
                                class="text-primary">{{Auth::user()->name}}</span>, Welcome back
                        </h5>
                        
                    </div>
                    @else
                        <div class="box">
                        @yield('content')
                        </div>
                    @endif
                    
</div>
<!-- jQuery 3.1.1 -->
@include('backEnd.includes.foot')
<script>$('document').ready(function(){$('select').select2();});</script>  
@yield('scripts')
@stack('js')
</body>

</html>
