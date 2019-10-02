<template>
<div>
	<header>
		<page-header></page-header>
	</header><!--header end-->

	<section class="cover-sec">
		<img :src="$store.state.apiUrl + 'images/web/profileheader.jpg'" alt="">
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
							<profile-template></profile-template>
						</div>
					</div>
				</div><!-- main-section-data end-->
			</div> 
		</div>
	</main>


	<footer>
		<div class="footy-sec mn no-margin">
			<div class="container">
				<p><img :src="$store.state.apiUrl + 'vendor/workwise/images/copy-icon.png'" alt="">Copyright 2019. Denies Kresna</p>
				<img class="fl-rgt" :src="$store.state.apiUrl + 'vendor/workwise/images/logo2.png'" alt="">
			</div>
		</div>
	</footer><!--footer end-->
</div>
</template>
<script>
import profileTemplate from './../profile/Template';
import userProfile from './../profile/UserProfile';
export default{
	components: {
		profileTemplate, userProfile
	},
	data(){
		return{
		
		}
	}
}
</script>