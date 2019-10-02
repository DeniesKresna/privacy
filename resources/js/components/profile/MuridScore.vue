<template>
<div>
	<div class="posts-section" v-if="scores.data.length > 0">
		<div class="posty" v-for="(score,index) in scores.data">
			<div class="post-bar no-margin">
				<div class="post_topbar">
					<div class="usy-dt">
						<img src="http://via.placeholder.com/50x50" alt="">
						<div class="usy-name">
							<h3>{{score.subject_name}}</h3>
							<span><img :src="$store.state.apiUrl + 'vendor/workwise/images/clock.png'" alt=""><vue-moments-ago prefix="posted" suffix="ago" :date="score.created_at" lang="en"></vue-moments-ago></span>
						</div>
					</div>
				</div>
				<div class="job_descp">
					<h3>KD {{score.score_kd}}</h3>
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th class="text-center">Jenis</th>
									<th class="text-center">Nilai</th>
									<th class="text-center">Remidi</th>
									<th class="text-center">NA</th>
									<th class="text-center">Test Date (yyyy-mm-dd)</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="text-center">{{score.score_type}}</td>
									<td class="text-center">{{score.score_nilai}}</td>
									<td class="text-center">{{score.score_remed}}</td>
									<td class="text-center">{{score.score_na}}</td>
									<td class="text-center">{{score.score_date}}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<pagination :data="scores" @pagination-change-page="getScore"></pagination>
	</div>
	<div v-else>
		<p>no uploaded score yet</p>
	</div>
</div>
</template>
<script>
import VueMomentsAgo from 'vue-moments-ago';
export default{
	components:{
		VueMomentsAgo
	},
	data(){
		return{
			scores: {
				data: []
			}
		}
	},
	mounted(){
		this.getScore();
	},
	methods: {
		getScore: function(page=1){
			axios.get(this.$store.state.apiUrl + 'score/self?page=' + page).then(response=>{
				this.scores = response.data.scores;
			}).catch(error=>{
			});
		}
	}
}
</script>