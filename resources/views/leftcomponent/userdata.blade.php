<div class="user-data full-width">
	<div class="user-profile">
		<div class="username-dt">
			<div class="usr-pic">
				@if(Auth::user()->gender == 'L')
				<img src="{{asset('images/web/siswa.jpg')}}" width="100" alt="">
				@else
				<img src="{{asset('images/web/siswa.jpg')}}" width="100" alt="">
				@endif
			</div>
		</div><!--username-dt end-->
		<div class="user-specs">
		<h3>{{Auth::user()->name}}</h3>
			<span>Graphic Designer at Self Employed</span>
		</div>
	</div><!--user-profile end-->
	<ul class="user-fw-status">
		<li>
			<h4>Following</h4>
			<span>34</span>
		</li>
		<li>
			<h4>Followers</h4>
			<span>155</span>
		</li>
		<li>
			<a href="{{url('profile')}}" title="">View Profile</a>
		</li>
	</ul>
</div><!--user-data end-->