<div class="site-top">
    <div class="container">
            {{-- <div class="pull-right">
                @if (Auth::user())
                <strong>
                    <a href="{{URL::to('/home')}}"><i
                    class="fa fa-cog"></i> Dashboard
                    </a>
                    &nbsp;
                    <a onclick="event.preventDefault();document.getElementById('logout-form').submit();" href="{!! url('logout') !!}">
                        <i class="fa fa-sign-out"></i>
                        Logout
                    </a>
                        <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                        </form>
                </strong>
                @else
                <strong>
                    <a href="{{URL::to('/login')}}"><i
                    class="fa fa-key"></i> Login
                    </a>
                </strong>
                @endif
            </div> --}}
        <div class="pull-left">
            <i class="fa fa-phone"></i> &nbsp;<a href="tel:+(xxx) 0xxxxxxx">
                <span dir="ltr">+(xxx) 0xxxxxxx</span></a>
                <span class="top-email">&nbsp; | &nbsp;
            <i class="fa fa-envelope"></i> &nbsp;<a href="mailto:info@sitename.com">info@sitename.com</a>
        </span>
    </div>
</div>

<div class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{URL::to('/')}}">
                <img alt="Logo" src="{{asset('uploads/settings/14888076859778.png')}}">
            </a>
        </div>
        <div class="navbar-collapse collapse ">
        <ul class="nav navbar-nav">
            <li><a href="{{URL::to('/index')}}">Home</a></li>
            <li><a href="{{URL::to('/about')}}">About</a></li>
            <li><a href="{{URL::to('/services')}}">Services</a></li>
            <li><a href="{{URL::to('/news')}}">Insurance News</a></li>
            {{-- <li class="dropdown">
                <a href="javascript:void(0)" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="true">
                    Sub Menu <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="#"><i class="fa fa-ambulance"></i> &nbsp; Nullam mollis dolor</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-ambulance"></i> &nbsp; Nullam mollis dolor</a>
                    </li>
                </ul>
            <li><a href="#">Contact</a></li> --}}
        </ul>
    </div>
</div>
<!-- end header -->