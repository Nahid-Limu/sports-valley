<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>
        @if(View::hasSection('title'))
        @yield('title')
        @else
        Sports Valley
        @endif
    </title>

    <link rel="icon" type="image/x-icon" href="{{ asset('system_img').'/'.'icon.png' }}" />

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Rokkitt:100,300,400,700" rel="stylesheet">
    
    <!-- Animate.css -->
	<link rel="stylesheet" href="{{ asset('css/animate.css') }}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">
	<!-- Ion Icon Fonts-->
	<link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="{{ asset('css/flexslider.css') }}">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
	
	<!-- Date Picker -->
	<link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css') }}">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="{{ asset('fonts/flaticon/font/flaticon.css') }}">

	<!-- Theme style  -->
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    @yield('css')


    <!-- Navbar -->
    {{-- @include('includes.nav') --}}
    <!-- Navbar -->

    <!-- show ads -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1779671886822617"
     crossorigin="anonymous"></script>
    <!-- show ads -->

</head>

<body style="background-color: #87dfeb">
    <div class="container-fluid">

        <header>
            @include('includes.nav')
        </header>

        <div id="main">
            @yield('content')
        </div>

        <footer>
            @include('includes.footer')
        </footer>
        
    </div>

</body>


<!-- jQuery -->
<script src="{{ asset('js/jquery.min.js') }}"></script>

<!-- popper -->
<script src="{{ asset('js/popper.min.js') }}"></script>
<!-- bootstrap 4.1 -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- jQuery easing -->
<script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
 <!-- Waypoints -->
 <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
 <!-- Flexslider -->
 <script src="{{ asset('js/jquery.flexslider-min.js') }}"></script>
 <!-- Owl carousel -->
 <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
 <!-- Magnific Popup -->
 {{-- <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
 <script src="{{ asset('js/magnific-popup-options.js') }}"></script> --}}
 <!-- Date Picker -->
 <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
 <!-- Stellar Parallax -->
 <script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
 <!-- Main -->
 <script src="{{ asset('js/main.js') }}"></script>


 <!--  Scroll to Top Button -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 <script type="text/javascript">
     var scrolltotop={setting:{startline:100,scrollto:0,scrollduration:1e3,fadeduration:[500,100]},controlHTML:'<img src="https://lh3.googleusercontent.com/pw/AM-JKLXVydKTQGtZgsL0YbcdjQ-tdpHe06u_ViqQmfpN4BOKKvRwfNkeUnzg2lbMZG4B6A5C9sLeXW27TM_4zPreqptHzBdwYYsc0QpGReoNXQrhgTqv1M0g3JWARE2y4rjgJB-Gn9DiM7Ci0KIU_blCvLY=s48-no" />',controlattrs:{offsetx:5,offsety:5},anchorkeyword:"#top",state:{isvisible:!1,shouldvisible:!1},scrollup:function(){this.cssfixedsupport||this.$control.css({opacity:0});var t=isNaN(this.setting.scrollto)?this.setting.scrollto:parseInt(this.setting.scrollto);t="string"==typeof t&&1==jQuery("#"+t).length?jQuery("#"+t).offset().top:0,this.$body.animate({scrollTop:t},this.setting.scrollduration)},keepfixed:function(){var t=jQuery(window),o=t.scrollLeft()+t.width()-this.$control.width()-this.controlattrs.offsetx,s=t.scrollTop()+t.height()-this.$control.height()-this.controlattrs.offsety;this.$control.css({left:o+"px",top:s+"px"})},togglecontrol:function(){var t=jQuery(window).scrollTop();this.cssfixedsupport||this.keepfixed(),this.state.shouldvisible=t>=this.setting.startline?!0:!1,this.state.shouldvisible&&!this.state.isvisible?(this.$control.stop().animate({opacity:1},this.setting.fadeduration[0]),this.state.isvisible=!0):0==this.state.shouldvisible&&this.state.isvisible&&(this.$control.stop().animate({opacity:0},this.setting.fadeduration[1]),this.state.isvisible=!1)},init:function(){jQuery(document).ready(function(t){var o=scrolltotop,s=document.all;o.cssfixedsupport=!s||s&&"CSS1Compat"==document.compatMode&&window.XMLHttpRequest,o.$body=t(window.opera?"CSS1Compat"==document.compatMode?"html":"body":"html,body"),o.$control=t('<div id="topcontrol">'+o.controlHTML+"</div>").css({position:o.cssfixedsupport?"fixed":"absolute",bottom:o.controlattrs.offsety,right:o.controlattrs.offsetx,opacity:0,cursor:"pointer"}).attr({title:"Scroll to Top"}).click(function(){return o.scrollup(),!1}).appendTo("body"),document.all&&!window.XMLHttpRequest&&""!=o.$control.text()&&o.$control.css({width:o.$control.width()}),o.togglecontrol(),t('a[href="'+o.anchorkeyword+'"]').click(function(){return o.scrollup(),!1}),t(window).bind("scroll resize",function(t){o.togglecontrol()})})}};scrolltotop.init();</script>
 <noscript>Not seeing a <a href="https://www.scrolltotop.com/">Scroll to Top Button</a>? Go to our FAQ page for more info.</noscript>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.5/waypoints.min.js"></script>
@yield('script')

</html>
