
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>WorkWise Html Template</title>
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
<div id="sign-in">
	<div class="wrapper">	
		<div class="sign-in-page">
			<div class="signin-popup">
				<div class="signin-pop">
					<div class="row">
						<div class="col-lg-6">
							<div class="cmp-info">
								<div class="cm-logo">
									<img src="{{asset('images/web/petraa1.png') }}" width="200" alt="">
									<p>Aplikasi Web ini dibuat untuk pemberian informasi secara pribadi kepada siswa dan orang tua.</p>
									<p>Aplikasi ini masih dalam proses pengembangan sehingga dibutuhkan dukungan dan doa oleh Keluarga Besar Guru Karyawan Siswa dan Orang Tua SMA Kristen Petra 1.</p>
									<p>Terima Kasih.</p>
								</div><!--cm-logo end-->	
								<img src="{{asset('vendor/workwise/images/cm-main-img.png') }}" alt="">			
							</div><!--cmp-info end-->
						</div>
						<div class="col-lg-6">
							<div class="login-sec">
								<ul class="sign-control">
									<li data-tab="tab-1" class="current"><a href="#" title="">Sign in</a></li>				
									<!--<li data-tab="tab-2"><a href="#" title="">Sign up</a></li>	-->			
								</ul>			
								<div class="sign_in_sec current" id="tab-1">

									<h3>Sign in</h3>
									<form method="POST" action="{{url('/login')}}">
										{{ csrf_field() }}
										<div class="row">
											<div class="col-lg-12 no-pdd">
												<div class="sn-field">
													<input type="text" name="code" value="{{old('code')}}" placeholder="No Induk">
													<i class="la la-user"></i>
												</div><!--sn-field end-->
											</div>
											<div class="col-lg-12 no-pdd">
												<div class="sn-field">
													<input type="password" name="password" placeholder="Password">
													<i class="la la-lock"></i>
												</div>
											</div><!--
											<div class="col-lg-12 no-pdd">
												<div class="checky-sec">
													<div class="fgt-sec">
														<input type="checkbox" name="cc" id="c1">
														<label for="c1">
															<span></span>
														</label>
														<small>Remember me</small>
													</div>
													<a href="#" title="">Forgot Password?</a>
												</div>
											</div>-->
											<div class="col-lg-12 no-pdd">
												<button type="submit" value="submit">Sign in</button>
											</div>
										</div>
									</form>
									<div class="login-resources">
										@if(session('error'))
											<div class="alert alert-danger">{{session('error')}}</div>
										@endif
										<p>Lupa Password silakan hubungi Pak Denies</p>
										<!--
										<h4>Login Via Social Account</h4>
										<ul>
											<li><a href="#" title="" class="fb"><i class="fa fa-facebook"></i>Login Via Facebook</a></li>
											<li><a href="#" title="" class="tw"><i class="fa fa-twitter"></i>Login Via Twitter</a></li>
										</ul>-->
									</div><!--login-resources end-->
								</div><!--sign_in_sec end-->
							</div><!--login-sec end-->
						</div>
					</div>		
				</div><!--signin-pop end-->
			</div><!--signin-popup end-->
			<div class="footy-sec">
				<div class="container"><!--
					<ul>
						<li><a href="#" title="">Help Center</a></li>
						<li><a href="#" title="">Privacy Policy</a></li>
						<li><a href="#" title="">Community Guidelines</a></li>
						<li><a href="#" title="">Cookies Policy</a></li>
						<li><a href="#" title="">Career</a></li>
						<li><a href="#" title="">Forum</a></li>
						<li><a href="#" title="">Language</a></li>
						<li><a href="#" title="">Copyright Policy</a></li>
					</ul>-->
					<p><img src="images/copy-icon.png" alt="">Copyright 2019. Denies Kresna</p>
				</div>
			</div><!--footy-sec end-->
		</div><!--sign-in-page end-->


	</div><!--theme-layout end-->
</div>


<script type="text/javascript" src="{{ asset('vendor/workwise/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/workwise/js/popper.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/workwise/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/workwise/lib/slick/slick.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/workwise/js/script.js') }}"></script>
</body>
</html>