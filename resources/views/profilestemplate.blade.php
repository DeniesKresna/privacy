
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
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/workwise/lib/slick/slick.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/workwise/lib/slick/slick-theme.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/workwise/css/style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/workwise/css/responsive.css') }}">
</head>


<body>
<div id="app" v-cloak>	

	<div class="wrapper" v-bind:class="{overlay: this.$store.state.overlay}">
		
		<header>
			@include('topcomponent.header')
		</header><!--header end-->
		<loading-component></loading-component>
		<section class="cover-sec">
			<img src="{{asset('images/web/profileheader.jpg')}}" alt="">
		</section>

		<main>
			<div class="main-section">
				<div class="container">
					<div class="main-section-data">
						<div class="row">
							<div class="col-lg-3">
								<div class="main-left-sidebar">
									<user-profile></user-profile>
								</div><!--main-left-sidebar end-->
							</div>
							<div class="col-lg-9">
								@yield('content')
							</div>
						</div>
					</div><!-- main-section-data end-->
				</div> 
			</div>
		</main>


		<footer>
			<div class="footy-sec mn no-margin">
				<div class="container">
					<p><img src="images/copy-icon.png" alt="">Copyright 2019. Denies Kresna</p>
				</div>
			</div>
		</footer><!--footer end-->

	</div><!--theme-layout end-->

</div>

<script type="text/javascript" src="{{ asset('js/app.js') }}"></script><!--
<script type="text/javascript" src="{{ asset('vendor/workwise/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/workwise/js/popper.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/workwise/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/workwise/lib/slick/slick.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/workwise/js/script.js') }}"></script>-->
</body>
</html>