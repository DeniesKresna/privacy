<div class="container">
				<div class="header-data">
					<div class="logo">
						<a href="" title=""><img src="{{ asset('images/web/petraa1.png') }}" width="150" alt=""></a>
					</div><!--logo end-->
					<div class="search-bar"><!--
						<form>
							<input type="text" name="search" placeholder="Search...">
							<button type="submit"><i class="la la-search"></i></button>
						</form>-->
					</div><!--search-bar end-->
					<nav>
						<ul>
							<li>
								<a href="{{url('home')}}" title="">
									<span><img src="{{ asset('vendor/workwise/images/icon1.png') }}" alt=""></span>
									Home
								</a>
							</li>
							<li>
								<a href="{{url('profile')}}" title="">
									<span><img src="{{ asset('vendor/workwise/images/icon4.png') }}" alt=""></span>
									Profiles
								</a>
								<ul>
									<li><a href="{{url('profile')}}" title="">User Profile</a></li>
								</ul>
							</li>
						</ul>
					</nav><!--nav end-->
					<div class="menu-btn">
						<a href="#" title=""><i class="fa fa-bars"></i></a>
					</div><!--menu-btn end-->
					<div class="user-account">
						<div class="user-info">
							@if(Auth::user()->gender == 'L')
							<img src="{{asset('images/web/siswa.jpg')}}" width="30" alt="">
							@else
							<img src="{{asset('images/web/siswa.jpg')}}" width="30" alt="">
							@endif
							<a href="#" title="">{{ substr(Auth::user()->name,0, 4) }}</a>
							<i class="la la-sort-down"></i>
						</div>
						<div class="user-account-settingss">
							<h3 class="tc"><a href="{{ url('/logout') }}" title="">Logout</a></h3>
						</div><!--user-account-settingss end-->
					</div>
				</div><!--header-data end-->
			</div>