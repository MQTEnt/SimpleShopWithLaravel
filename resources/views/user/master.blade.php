<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>@yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300italic,400italic,600,600italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>
<link href="{{asset('user/css/bootstrap.css')}}" rel="stylesheet">
<link href="{{asset('user/css/bootstrap-responsive.css')}}" rel="stylesheet">
<link href="{{asset('user/css/style.css')}}" rel="stylesheet">
<link href="{{asset('user/css/flexslider.css')}}" type="text/css" media="screen" rel="stylesheet"  />
<link href="{{asset('user/css/jquery.fancybox.css')}}" rel="stylesheet">
<link href="{{asset('user/css/cloud-zoom.css')}}" rel="stylesheet">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<!-- fav -->
<link rel="shortcut icon" href="{{asset('user/assets/ico/favicon.html')}}">
</head>
<body>
<!-- Header Start -->
<header>
  <!--Header-->
  @include('user.block.header')
  <div class="container">
  <!--NavBar-->
  @include('user.block.headerNavBar')
  </div>
</header>
<!-- Header End -->

<div id="maincontainer">
  <!-- Slider Start-->
  @include('user.block.slider')
  <!-- Slider End-->
  
  <!-- Other Detail Start-->
  @include('user.block.otherDetail')
  <!-- Other Detail End-->
  
  <!-- Main Page Start -->
  @yield('body.main')
  <!-- Main Page End -->

<!-- Footer -->
  @include('user.block.footer')
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{asset('user/js/jquery.js')}}"></script>
<script src="{{asset('user/js/bootstrap.js')}}"></script>
<script src="{{asset('user/js/respond.min.js')}}"></script>
<script src="{{asset('user/js/application.js')}}"></script>
<script src="{{asset('user/js/bootstrap-tooltip.js')}}"></script>
<script defer src="{{asset('user/js/jquery.fancybox.js')}}"></script>
<script defer src="{{asset('user/js/jquery.flexslider.js')}}"></script>
<script type="text/javascript" src="{{asset('user/js/jquery.tweet.js')}}"></script>
<script  src="{{asset('user/js/cloud-zoom.1.0.2.js')}}"></script>
<script  type="text/javascript" src="{{asset('user/js/jquery.validate.js')}}"></script>
<script type="text/javascript"  src="{{asset('user/js/jquery.carouFredSel-6.1.0-packed.js')}}"></script>
<script type="text/javascript"  src="{{asset('user/js/jquery.mousewheel.min.js')}}"></script>
<script type="text/javascript"  src="{{asset('user/js/jquery.touchSwipe.min.js')}}"></script>
<script type="text/javascript"  src="{{asset('user/js/jquery.ba-throttle-debounce.min.js')}}"></script>
<script defer src="{{asset('user/js/custom.js')}}"></script>
<script src="{{asset('user/js/myScript.js')}}"></script>
</body>
</html>