<template>
<div>
	<header>
		<page-header></page-header>
	</header><!--header end-->

	<main>
		<div class="main-section">
			<div class="container">
				<div class="main-section-data">
					<div class="row">
						<div class="col-lg-3 col-md-4 pd-left-none no-pd">
							<div class="main-left-sidebar no-margin">
								<user-data></user-data>
								<murid-kelas></murid-kelas>
							</div><!--main-left-sidebar end-->
						</div>
						<div class="col-lg-6 col-md-8 no-pd">
							<home-post></home-post>
						</div>
						<div class="col-lg-3 pd-right-none no-pd">
							<div class="right-sidebar">
								<list-follow></list-follow>
							</div><!--right-sidebar end-->
						</div>
					</div>
				</div><!-- main-section-data end-->
			</div> 
		</div>
	</main>
</div>
</template>
<script>
import homePost from './../home/Posts';
import listFollow from './../home/Listfollow';
export default{
	data(){
		return{

		}
	},
	components: {
		homePost, listFollow
	}
}
</script>