<template>
<div class="main-ws-sec">
	<div class="user-tab-sec">
		<h3>{{$store.state.session.name}}</h3>
		<div class="star-descp">
			<span>created at {{$store.state.session.created_at}}</span>
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
				<li data-tab="feed-dd" :class="{active: menu.feed}">
					<a @click="activateMenu('feed')" title="">
						<img :src="$store.state.apiUrl + 'vendor/workwise/images/menu/blackboard.png'" alt="">
						<span>Feed</span>
					</a>
				</li>
				<li data-tab="info-dd" :class="{active: menu.nilai}">
					<a @click="activateMenu('nilai')" title="">
						<img :src="$store.state.apiUrl + 'vendor/workwise/images/menu/mortarboard.png'" alt="">
						<span>Nilai</span>
					</a>
				</li>
				<li data-tab="user-dd" :class="{active: menu.user}" v-if="$store.state.session.role == 'admin' || $store.state.session.role == 'superadmin'">
					<a @click="activateMenu('user')" title="">
						<img :src="$store.state.apiUrl + 'vendor/workwise/images/menu/student.png'" alt="">
						<span>User</span>
					</a>
				</li>
			</ul>
		</div><!-- tab-feed end-->
	</div><!--user-tab-sec end-->
	<div class="product-feed-tab" id="feed-dd" :class="{current: menu.feed}">
		<div class="post-topbar" v-if="$store.state.session.role == 'superadmin' || $store.state.session.role == 'admin'">
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
						<div class="ed-opts" v-if="post.post_created_by == $store.state.session.id">
							<a title="" class="ed-opts-open" @click="toogleEdOption(index)"><i class="fa fa-trash"></i></a>
							<!--
							<ul class="ed-options" :class="{'active': edOptsCls[index]}">
								<li><a href="#" title="">Edit Post</a></li>
								<li><a @click="deletePost(post.id)" title="">Delete Post</a></li>
							</ul>-->
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
	</div><!--product-feed-tab end-->
	<div class="product-feed-tab" id="info-dd" :class="{current: menu.nilai}">
		<div v-if="$store.state.session.role == 'siswa' || $store.state.session.role == 'ortu'">
			<murid-score></murid-score>
		</div>
		<div class="posts-section" v-else>
			<div class="posty">
				<div class="post-bar no-margin">
					<div class="post_topbar">
						<upload-score></upload-score>
						<score-table></score-table>
					</div>
				</div>
			</div>
		</div>
	</div><!--product-feed-tab end-->
	<div class="product-feed-tab" id="user-dd" :class="{current: menu.user}" v-if="$store.state.session.role == 'admin' || $store.state.session.role == 'superadmin'">
		<div class="posts-section">
			<div class="posty">
				<div class="post-bar no-margin">
					<div class="post_topbar">
						<user-import></user-import>
						<user-show></user-show>
					</div>
				</div>
			</div>
		</div>
	</div><!--product-feed-tab end-->
</div><!--main-ws-sec end-->
</template>
<script>
import VueMomentsAgo from 'vue-moments-ago';
import uploadScore from './../profile/UploadScore.vue';
import userImport from './../user/Import.vue';
import userShow from './../user/Show.vue';
import muridScore from './../profile/MuridScore.vue';
import scoreTable from './../profile/ScoreTable.vue';
export default{
	components:{
		uploadScore, muridScore, VueMomentsAgo, scoreTable, userImport, userShow
	},
	data(){
		return{
			menu: {
				feed: true,
				nilai: false,
				user: false
			},
			addPostText: '',
			addPostTitle: '',
			posts: {
				data:[]
			},
			edOptsCls: [],
			user_id: 0
		}
	},
	mounted(){
		this.user_id = this.$route.params.id;
		this.getPost();
	},
	methods: {
		activateMenu: function(mode){
			for(var prop in this.menu){
				this.menu[prop] = false;
			}
			this.menu[mode] = true;
		},
		getPost: function(page=1){/*
			let loader = this.$loading.show();
			axios.get(this.$store.state.apiUrl + 'post/from/' + this.user_id + '?page=' + page).then(response=>{
				this.posts = response.data.posts;
				loader.hide();
			}).catch(error=>{
				loader.hide()
				console.log(error.response);
				alert(error.response.data.error);
			});*/

			axios.get(this.$store.state.apiUrl + 'post/self?page=' + page).then(response=>{
				this.posts = response.data.posts;
			}).catch(error=>{
				alert(error.response.data.error);
			});
		},
		addPost: function(){
			axios.post(this.$store.state.apiUrl + 'post',{addPostText: this.addPostText, addPostTitle: this.addPostTitle}).then(response=>{
				this.getPost();
				this.addPostTitle = '';
				this.addPostText = '';
			}).catch(error=>{
				alert(error.response.data.error);
			});
		},
		deletePost: function(id){
			if(confirm('Yakin akan menghapus postingan ini?')){
				axios.delete(this.$store.state.apiUrl + 'post/' + id).then(response=>{
					this.getPost();
				});
			}
		},
		toogleEdOption: function(nm){
			for(var i=0; i<this.posts.data.length; i++){
				if(i == nm){
					this.edOptsCls[i] = !this.edOptsCls[i];
				}
				else{
					this.edOptsCls[i] = false;
				}
			}
		}
	}
}
</script>