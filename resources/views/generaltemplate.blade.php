
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Privasi Siswa</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="keywords" content="" />
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/workwise/css/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/workwise/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/workwise/css/line-awesome.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/workwise/css/line-awesome-font-awesome.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/workwise/css/font-awesome.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/workwise/css/jquery.mCustomScrollbar.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/workwise/lib/slick/slick.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/workwise/lib/slick/slick-theme.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/workwise/css/style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/workwise/css/responsive.css') }}">
</head>

<body>	
<div id="app" v-cloak>
	<div class="wrapper">
		<loading-component></loading-component>
		<router-view></router-view>
	</div><!--theme-layout end-->

</div>

<script type="text/javascript" src="{{ asset('js/app.js') }}"></script><!--
<script type="text/javascript" src="{{ asset('vendor/workwise/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/workwise/js/popper.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/workwise/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/workwise/js/jquery.mCustomScrollbar.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/workwise/lib/slick/slick.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/workwise/js/scrollbar.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/workwise/js/script2.js') }}"></script>-->

</body>
</html>