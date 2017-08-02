<!DOCTYPE html>
<html dir="rtl" lang="en">
<head>

<!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="StudyPress | Education & Courses HTML Template" />
<meta name="keywords" content="academy, course, education, education html theme, elearning, learning," />
<meta name="author" content="ThemeMascot" />

<!-- Page Title -->
<title>Hamdy {{ isset($mainTitle) ? " | " . $mainTitle : '' }} {{ isset($title) ? " | " . $title: '' }}</title>

<!-- Favicon and Touch Icons -->
<link href="{{ url('images') }}/favicon.png" rel="shortcut icon" type="image/png">
<link href="{{ url('images') }}/apple-touch-icon.png" rel="apple-touch-icon">
<link href="{{ url('images') }}/apple-touch-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
<link href="{{ url('images') }}/apple-touch-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">
<link href="{{ url('images') }}/apple-touch-icon-144x144.png" rel="apple-touch-icon" sizes="144x144">

<!-- Stylesheet -->
<link href="{{ url('css') }}/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="{{ url('css') }}/jquery-ui.min.css" rel="stylesheet" type="text/css">
<link href="{{ url('css') }}/animate.css" rel="stylesheet" type="text/css">
<link href="{{ url('css') }}/css-plugin-collections.css" rel="stylesheet"/>
<!-- CSS | menuzord megamenu skins -->
<link id="menuzord-menu-skins" href="{{ url('css') }}/menuzord-skins/menuzord-rounded-boxed.css" rel="stylesheet"/>
<!-- CSS | Main style file -->
<link href="{{ url('css') }}/style-main.css" rel="stylesheet" type="text/css">
<!-- CSS | Preloader Styles -->
<link href="{{ url('css') }}/preloader.css" rel="stylesheet" type="text/css">
<!-- CSS | Custom Margin Padding Collection -->
<link href="{{ url('css') }}/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">
<!-- CSS | Responsive media queries -->
<link href="{{ url('css') }}/responsive.css" rel="stylesheet" type="text/css">
<!-- CSS | RTL Layout -->
<link href="{{ url('css') }}/bootstrap-rtl.min.css" rel="stylesheet" type="text/css">
<link href="{{ url('css') }}/style-main-rtl.css" rel="stylesheet" type="text/css">
<link href="{{ url('css') }}/style-main-rtl-extra.css" rel="stylesheet" type="text/css">
<!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
<link href="{{ url('css') }}/style.css" rel="stylesheet" type="text/css">

<!-- Revolution Slider 5.x CSS settings -->
<link  href="{{ url('js') }}/revolution-slider/css/settings.css" rel="stylesheet" type="text/css"/>
<link  href="{{ url('js') }}/revolution-slider/css/layers.css" rel="stylesheet" type="text/css"/>
<link  href="{{ url('js') }}/revolution-slider/css/navigation.css" rel="stylesheet" type="text/css"/>

<!-- CSS | Theme Color -->
<link href="{{ url('css') }}/colors/theme-skin-color-set-1.css" rel="stylesheet" type="text/css">

<!-- external javascripts -->
<script src="{{ url('js') }}/jquery-2.2.4.min.js"></script>
<script src="{{ url('js') }}/jquery-ui.min.js"></script>
<script src="{{ url('js') }}/bootstrap.min.js"></script>
<!-- JS | jquery plugin collection for this theme -->
<script src="{{ url('js') }}/jquery-plugin-collection.js"></script>

<!-- Revolution Slider 5.x SCRIPTS -->
<script src="{{ url('js') }}/revolution-slider/js/jquery.themepunch.tools.min.js"></script>
<script src="{{ url('js') }}/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="rtl">
	<div id="wrapper" class="clearfix">
  		<!-- preloader -->
  		<div id="preloader">
    		<div id="spinner">
      			<div class="preloader-dot-loading">
	        		<div class="cssload-loading"><i></i><i></i><i></i><i></i></div>
      			</div>
    		</div>
    		<div id="disable-preloader" class="btn btn-default btn-sm">Disable Preloader </div>
  		</div>

  		@include('layouts.includes.homeHeader')

  		<!-- Start main-content -->
  		<div class="main-content">
	  		@yield('content')
  		</div>
  		<!-- end main-content -->

  		@include('layouts.includes.homeFooter')
  	</div>
  	<!-- end wrapper -->
  	@include('layouts.includes.homeScript')
    @yield('script')
 </body>
</html>