<template>
	<div class="user-data full-width">
		<div class="user-profile">
			<div class="username-dt">
				<div class="usr-pic">
					<img :src="$store.state.apiUrl + 'images/web/siswa.jpg'" width="100" alt="" v-if="$store.state.session.gender == 'L'">
					<img :src="$store.state.apiUrl + 'images/web/siswa.jpg'" width="100" alt="" v-else>
				</div>
			</div><!--username-dt end-->
			<div class="user-specs">
			<h3>{{$store.state.session.name}}</h3>
				<span>{{$store.state.session.role}}</span>
			</div>
		</div><!--user-profile end-->
		<ul class="user-fw-status">
			<li>
				<h4>Following</h4>
				<span>{{following.length}}</span>
			</li>
			<li>
				<h4>Followers</h4>
				<span>{{followers.length}}</span>
			</li>
			<li>
				<router-link :to="'profile/' + $store.state.session.id" title="">View Profile</router-link>
			</li>
		</ul>
	</div><!--user-data end-->
</template>
<script>
import { mapState } from 'vuex';

export default{
	data(){
		return{
			following: [],
			followers: []
		}
	},
	mounted(){
		this.getFollow();
	},
	methods: {
		getFollow: function(){
			axios.get(this.$store.state.apiUrl + 'follow/' + this.$store.state.session.id).then(response=>{
				this.following = response.data.following;
				this.followers = response.data.follower;
			}).catch(error=>{
			});
		}
	}
}
</script>