<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
<title>{{ config('app.name')}}</title>
<meta name="description" content="Website description and some little information about it"/>
<meta name="keywords" content="key, words, website, web"/>
<meta name="author" content="{{ config('app.name')}}"/>

<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<link href="{{asset('frontEnd/css/bootstrap.min.css')}}" rel="stylesheet"/>
<link href="{{asset('frontEnd/css/fancybox/jquery.fancybox.css')}}" rel="stylesheet">
<link href="{{asset('frontEnd/css/jcarousel.css')}}" rel="stylesheet"/>
<link href="{{asset('frontEnd/css/flexslider.css')}}" rel="stylesheet"/>
<link href="{{asset('frontEnd/css/style.css')}}" rel="stylesheet"/>
<link href="{{asset('frontEnd/css/color.css')}}" rel="stylesheet"/>
<link rel="stylesheet" href="{{asset('frontEnd/js/owl-carousel/assets/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('frontEnd/js/owl-carousel/assets/owl.theme.default.min.css')}}">


<!-- Favicon and Touch Icons -->
    <link href="{{asset('uploads/settings/14888091191764.png')}}" rel="shortcut icon"
          type="image/png">
    <link href="{{asset('uploads/settings/14888091191764.png')}}" rel="apple-touch-icon">
    <link href="{{asset('uploads/settings/14888091191764.png')}}" rel="apple-touch-icon"
          sizes="72x72">
    <link href="{{asset('uploads/settings/14888091191764.png')}}" rel="apple-touch-icon"
          sizes="114x114">
    <link href="{{asset('uploads/settings/14888091191764.png')}}" rel="apple-touch-icon"
          sizes="144x144">

<meta property='og:title' content=' '/>
    <meta property='og:image' content='{{asset('uploads/settings/14888091191764.png')}}'/>
<meta property="og:site_name" content="">
<meta property="og:description" content="Website description and some little information about it"/>
<meta property="og:url" content="{{ config('app.name') }}"/>
<meta property="og:type" content="website"/>


    <style type="text/css">
    a, a:hover, a:focus, a:active, footer a.text-link:hover, strike, .post-meta span a:hover, footer a.text-link,
    ul.meta-post li a:hover, ul.cat li a:hover, ul.recent li h6 a:hover, ul.portfolio-categ li.active a, ul.portfolio-categ li.active a:hover, ul.portfolio-categ li a:hover, ul.related-post li h4 a:hover, span.highlight, article .post-heading h3 a:hover,
    .navbar .nav > .active > a, .navbar .nav > .active > a:hover, .navbar .nav > li > a:hover, .navbar .nav > li > a:focus, .navbar .nav > .active > a:focus {
        color: #0cbaa4;
    }

    .navbar-brand span {
        color: #0cbaa4;
    }

    header .nav li a:hover,
    header .nav li a:focus,
    header .nav li.active a,
    header .nav li.active a:hover,
    header .nav li a.dropdown-toggle:hover,
    header .nav li a.dropdown-toggle:focus,
    header .nav li.active ul.dropdown-menu li a:hover,
    header .nav li.active ul.dropdown-menu li.active a {
        color: #0cbaa4;
    }

    .navbar-default .navbar-nav > .active > a,
    .navbar-default .navbar-nav > .active > a:hover,
    .navbar-default .navbar-nav > .active > a:focus {
        color: #0cbaa4;
    }

    .navbar-default .navbar-nav > .open > a,
    .navbar-default .navbar-nav > .open > a:hover,
    .navbar-default .navbar-nav > .open > a:focus {
        color: #0cbaa4;
    }

    .dropdown-menu > .active > a,
    .dropdown-menu > .active > a:hover,
    .dropdown-menu > .active > a:focus {
        color: #0cbaa4;
    }

    .custom-carousel-nav.right:hover, .custom-carousel-nav.left:hover,
    .dropdown-menu li:hover,
    .dropdown-menu li a:hover,
    .dropdown-menu li > a:focus,
    .dropdown-submenu:hover > a,
    .dropdown-menu .active > a,
    .dropdown-menu .active > a:hover,
    .pagination ul > .active > a:hover,
    .pagination ul > .active > a,
    .pagination ul > .active > span,
    .flex-control-nav li a:hover,
    .flex-control-nav li a.active {
        background-color: #0cbaa4;
    }

    .pagination ul > li.active > a,
    .pagination ul > li.active > span, a.thumbnail:hover, input[type="text"].search-form:focus {
        border: 1px solid #0cbaa4;
    }

    textarea:focus,
    input[type="text"]:focus,
    input[type="password"]:focus,
    input[type="datetime"]:focus,
    input[type="datetime-local"]:focus,
    input[type="date"]:focus,
    input[type="month"]:focus,
    input[type="time"]:focus,
    input[type="week"]:focus,
    input[type="number"]:focus,
    input[type="email"]:focus,
    input[type="url"]:focus,
    input[type="search"]:focus,
    input[type="tel"]:focus,
    input[type="color"]:focus,
    .uneditable-input:focus {
        border-color: #0cbaa4;
    }

    input:focus {
        border-color: #0cbaa4;
    }

    #sendmessage {
        color: #0cbaa4;
    }

    .pullquote-left {
        border-color: #2e3e4e;
    }

    .pullquote-right {
        border-right: 5px solid #0cbaa4;
    }

    .cta-text h2 span {
        color: #0cbaa4;
    }

    ul.clients li:hover {
        border: 4px solid #0cbaa4;
    }

    .box-bottom {
        background: #0cbaa4;
    }

    .btn-dark:hover, .btn-dark:focus, .btn-dark:active {
        background: #0cbaa4;
        border: 1px solid #0cbaa4;
    }

    .btn-theme {
        border: 1px solid #0cbaa4;
        background: #0cbaa4;
    }

    .modal.styled .modal-header {
        background-color: #0cbaa4;
    }

    .post-meta {
        border-top: 4px solid #0cbaa4;
    }

    .post-meta .comments a:hover {
        color: #0cbaa4;
    }

    .widget ul.tags li a:hover {
        background: #0cbaa4;
    }

    .recent-post .text h5 a:hover {
        color: #0cbaa4;
    }

    .pricing-box-alt.special .pricing-heading {
        background: #0cbaa4;
    }

    #pagination a:hover {
        background: #0cbaa4;
    }

    .pricing-box.special .pricing-offer {
        background: #0cbaa4;
    }

    .icon-square:hover,
    .icon-rounded:hover,
    .icon-circled:hover {
        background-color: #0cbaa4;
    }

    [class^="icon-"].active,
    [class*=" icon-"].active {
        background-color: #0cbaa4;
    }

    .fancybox-close:hover {
        background-color: #0cbaa4;
    }

    .fancybox-nav:hover span {
        background-color: #0cbaa4;
    }

    .da-slide .da-link:hover {
        background: #0cbaa4;
        border: 4px solid #0cbaa4;
    }

    .da-dots span {
        background: #0cbaa4;
    }

    #featured .flexslider .slide-caption {
        border-left: 5px solid #0cbaa4;
    }

    .nivo-directionNav a:hover {
        background-color: #0cbaa4;
    }

    .nivo-caption, .caption {
        border-bottom: #0cbaa4 5px solid;
    }

    footer {
        background: #0cbaa4;
    }

    #sub-footer {
        background: #2e3e4e;
    }

    .site-top {
        background: #0cbaa4;
    }

    ul.cat li .active {
        color: #0cbaa4;
    }

    .box-gray .icon .fa, h4, .heading {
        color: #0cbaa4;
    }

    .flex-caption {
        background-color: #2e3e4e;
    }

    .flex-caption .btn-theme {
        background: #0cbaa4;
    }

    .flex-caption .btn-theme:hover {
        background: #fff;
        color: #0cbaa4;
    }

    .btn-info {
        background: #0cbaa4;
        border-color: #2e3e4e;
    }

    .btn-info:hover {
        background: #2e3e4e;
    }

    .flex-control-paging li a.flex-active {
        background: #0cbaa4;
    }

    .flex-control-paging li a {
        background: #2e3e4e;
    }

    .navbar-default .navbar-nav > .active > a,
    .navbar-default .navbar-nav > .active > a:hover,
    .navbar-default .navbar-nav > .active > a:focus {
        background: transparent;
    }

    .navbar-default .navbar-nav > .open > a,
    .navbar-default .navbar-nav > .open > a:hover,
    .navbar-default .navbar-nav > .open > a:focus {
        background: transparent;
    }

    #inner-headline {
        background: #2e3e4e;
    }

    .navbar .nav li .dropdown-menu {
        background: #0cbaa4;
    }
    .navbar .nav li .dropdown-menu li:hover {
        background: #2e3e4e;
    }

    @media (max-width: 767px) {
        header .navbar-nav > li {
            background: #0cbaa4;
        }

        .dropdown-menu {
            background: #0cbaa4;
        }

        .navbar-default .navbar-nav .open .dropdown-menu > li > a {
            color: #fff;
        }

        header .nav li a:hover,
        header .nav li a:focus,
        header .nav li.active a,
        header .nav li.active a:hover,
        header .nav li a.dropdown-toggle:hover,
        header .nav li a.dropdown-toggle:focus,
        header .nav li.active ul.dropdown-menu li a:hover,
        header .nav li.active ul.dropdown-menu li.active a {
            color: #fff;
        }

        .navbar .nav > li > a {
            color: #fff;
        }

        .navbar-default .navbar-nav > .active > a,
        .navbar-default .navbar-nav > .active > a:hover,
        .navbar-default .navbar-nav > .active > a:focus {
            background-color: #0cbaa4;
            color: #fff;
        }

        .navbar-default .navbar-nav > .open > a,
        .navbar-default .navbar-nav > .open > a:hover,
        .navbar-default .navbar-nav > .open > a:focus {
            background-color: #0cbaa4;
            color: #fff;
        }

    }

    .navbar .nav > li:hover > a,.pagination > li > a,.pagination > li > a:hover,.pagination > li > a:active ,.pagination > li > a:focus {
        color: #0cbaa4;
    }

    .content-row-bg {
        background: #2e3e4e;
    }
    #content .contacts p .fa,  #content .contacts address .fa{
        background: #0cbaa4;
    }


    .pagination > .active > a, .pagination > .active > span, .pagination > .active > a:hover, .pagination > .active > span:hover, .pagination > .active > a:focus, .pagination > .active > span:focus {
        background-color: #0cbaa4;
        border-color: #0cbaa4;
    }
    ::-webkit-scrollbar-thumb {
        background: #2e3e4e;
    }
    ::-webkit-scrollbar-thumb:hover {
        background: #0cbaa4;
    }
    .nopadding {
   /* padding: 0 10px !important; */
   /* margin: 0 10px !important; */
    }
    a.list-group-item.active, a.list-group-item.active:hover, a.list-group-item.active:focus {
    z-index: 2;
    color: #fff;
    background-color: #0CBAA4;
    border-color: #0CBAA4;
    }
</style>
</head>

<body class="js " style="  ">
<div id="wrapper">
    <header>
        @include('frontEnd.header')
    </header>
    <div class="contents">
        @include('frontEnd.slider')
        <section class="content-row-no-bg p-b-0">
            <div class="container">
            <div class="row">
                <div class="col-md-9 nopadding">
                   @include('frontEnd.leftContent')
                </div>

                <div class="col-md-3 nopadding" style="min-height:600px">
                 @if(Request::url() == 'http://localhost:8000/news')
                    
                @else
                @include('frontEnd.rightContent')
                </div>
                @endif
            </div>
            </div>
        </section>
    </div>

</div>
<footer>
    <div class="container">
        Copyright © {{date('Y')}}  {{ config('app.name')}}
    </div>
</footer>
<a href="#" title="to Top" class="scrollup"><i class="fa fa-angle-up active"></i></a>

<script type="text/javascript">
    var page_dir = "ltr";
</script>
<script src="{{asset('frontEnd/js/jquery.js')}}"></script>
<script src="{{asset('frontEnd/js/jquery.easing.1.3.js')}}"></script>
<script src="{{asset('frontEnd/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontEnd/js/jquery.fancybox.pack.js')}}"></script>
<script src="{{asset('frontEnd/js/jquery.fancybox-media.js')}}"></script>
<script src="{{asset('frontEnd/js/google-code-prettify/prettify.js')}}"></script>
<script src="{{asset('frontEnd/js/portfolio/jquery.quicksand.js')}}"></script>
<script src="{{asset('frontEnd/js/portfolio/setting.js')}}"></script>
<script src="{{asset('frontEnd/js/jquery.flexslider.js')}}"></script>
<script src="{{asset('frontEnd/js/animate.js')}}"></script>
<script src="{{asset('frontEnd/js/custom.js')}}"></script>
<script src="{{asset('frontEnd/js/owl-carousel/owl.carousel.js')}}"></script>
</body>
</html>
