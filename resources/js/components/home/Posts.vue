<template>
<div>
	<div class="post-topbar">
		<div class="row">
				<div class="col-md-9">
					<input type="text" class="form-control" placeholder="Isi Title di sini" maxlength="191" v-model="addPostTitle">
					<textarea class="form-control" placeholder="Isi Content di sini" maxlength="300" v-model="addPostText"></textarea>
				</div>
				<div class="col-md-3">
					<button class="btn btn-info" href="#" title="" @click="addPost">Post Info</button>
					<h4>{{300 - addPostText.length}} / 300</h4>
				</div><!--post-st end-->
		</div>
	</div><!--post-topbar end-->
	<div class="posts-section" v-if="posts.data.length > 0">
		<div class="posty" v-for="(post, index) in posts.data">
			<div class="post-bar no-margin">
				<div class="post_topbar">
					<div class="usy-dt">
						<img src="http://via.placeholder.com/50x50" alt="">
						<div class="usy-name">
							<h3>{{post.name}}</h3>
							<span><img :src="$store.state.apiUrl + 'vendor/workwise/images/clock.png'" alt=""><vue-moments-ago prefix="posted" suffix="ago" :date="post.created_at" lang="en"></vue-moments-ago></span>
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
					<h3>{{post.post_title}}</h3>
					<p>{{post.post_content}}</p>
				</div>
			</div>
		</div><!--posty end-->
		<pagination :data="posts" @pagination-change-page="getPost"></pagination>
	</div><!--posts-section end-->
	<div v-else>
		<p>no post yet</p>
	</div>
</div>
</template>
<script>
import VueMomentsAgo from 'vue-moments-ago';
export default{
	data(){
		return{
			addPostText: '',
			addPostTitle: '',
			posts: {
				data:[]
			}
		}
	},
	components: {
	    VueMomentsAgo
	},
	mounted(){
		this.getPost();
	},
	methods: {
		getPost: function(page=1){
			let loader = this.$loading.show();
			axios.get(this.$store.state.apiUrl + 'post/self?page=' + page).then(response=>{
				this.posts = response.data.posts;
				loader.hide();
			}).catch(error=>{
				loader.hide()
				console.log(error.response);
				alert(error.response.data.error);
			});
		},
		addPost: function(){
			let loader = this.$loading.show();
			axios.post(this.$store.state.apiUrl + 'post',{addPostText: this.addPostText, addPostTitle: this.addPostTitle}).then(response=>{
				this.getPost();
				this.addPostTitle = '';
				this.addPostText = '';
				loader.hide();
			}).catch(error=>{
				loader.hide();
				console.log(error.response);
				alert(error.response.data.error);
			});
		}
	}
}
</script>