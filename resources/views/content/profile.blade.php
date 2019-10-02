@extends('profiletemplate')
@section('content')
							<div class="main-ws-sec">
								<div class="user-tab-sec">
									<h3>{{Auth::user()->name}}</h3>
										<div class="star-descp">
											<span>created at {{Auth::user()->created_at}}</span>
											<ul>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star-half-o"></i></li>
											</ul>
										</div><!--star-descp end-->
										<div class="tab-feed">
											<ul>
												<li data-tab="feed-dd" class="active">
													<a href="#" title="">
														<img src="{{asset('vendor/workwise/images/ic1.png')}}" alt="">
														<span>Feed</span>
													</a>
												</li>
												<li data-tab="info-dd">
													<a href="#" title="">
														<img src="{{asset('vendor/workwise/images/ic5.png')}}" alt="">
														<span>Nilai</span>
													</a>
												</li>
											</ul>
										</div><!-- tab-feed end-->
									</div><!--user-tab-sec end-->
									<div class="product-feed-tab current" id="feed-dd">
										<div class="posts-section">
											<div class="posty">
												<div class="post-bar no-margin">
													<div class="post_topbar">
														<div class="usy-dt">
															<img src="http://via.placeholder.com/50x50" alt="">
															<div class="usy-name">
																<h3>Denies Kresna</h3>
																<span><img src="{{asset('vendor/workwise/images/clock.png') }}" alt="">3 min ago</span>
															</div>
														</div>
														<div class="ed-opts">
															<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
															<ul class="ed-options">
																<li><a href="#" title="">Edit Post</a></li>
																<li><a href="#" title="">Delete Post</a></li>
															</ul>
														</div>
													</div>
													<div class="job_descp">
														<h3>Informasi Kelas</h3>
														<p>Dilarang Buagn Sampah Sembarangan</p>
														<!--
														<ul class="skill-tags">
															<li><a href="#" title="">Aturan</a></li>
															<li><a href="#" title="">Tertib</a></li>	
														</ul>-->
													</div>
												</div><!--post-bar end-->
											</div><!--posty end-->
										</div><!--posts-section end-->
									</div><!--product-feed-tab end-->
									<div class="product-feed-tab" id="info-dd">
										@if(Auth::user()->role == 'siswa' || Auth::user()->role == 'ortu')
										<div class="posts-section">
											@foreach($scores as $score)
											<div class="posty">
												<div class="post-bar no-margin">
													<div class="post_topbar">
														<div class="usy-dt">
															<img src="http://via.placeholder.com/50x50" alt="">
															<div class="usy-name">
																<h3>{{$score->subject_name}}</h3>
																<span><img src="{{asset('vendor/workwise/images/clock.png') }}" alt="">3 min ago</span>
															</div>
														</div>
													</div>
													<div class="job_descp">
														<h3>KD {{$score->score_kd}}</h3>
														<div class="table-responsive">
															<table class="table table-bordered">
																<thead>
																	<tr>
																		<th>Jenis</th>
																		<th>Nilai</th>
																		<th>Remidi</th>
																		<th>NA</th>
																	</tr>
																</thead>
																<tbody>
																	<tr>
																		<td>{{$score->score_type}}</td>
																		<td>{{$score->score_nilai}}</td>
																		<td>{{$score->score_remed}}</td>
																		<td>{{$score->score_na}}</td>
																	</tr>
																</tbody>
															</table>
														</div>
													</div>
												</div>
											</div>
											@endforeach
										</div>
										@else
										<div class="posts-section">
											<div class="posty">
												<div class="post-bar no-margin">
													<div class="post_topbar">
														<upload-score></upload-score>
													</div>
												</div>
											</div>
										</div>
										@endif
									</div><!--product-feed-tab end-->
								</div><!--main-ws-sec end-->
@endsection