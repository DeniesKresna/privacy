<template>
<div class="container">
	<div class="header-data">
		<div class="logo">
			<a href="" title=""><img :src="$store.state.apiUrl + 'images/web/petraa1.png'" width="150" alt=""></a>
		</div><!--logo end-->
		<div class="search-bar"><!--
			<form>
				<input type="text" name="search" placeholder="Search...">
				<button type="submit"><i class="la la-search"></i></button>
			</form>-->
		</div><!--search-bar end-->
		<nav :class="{active: navActive}">
			<ul>
				<li v-if="$store.state.session.role != 'murid' && $store.state.session.role != 'ortu'">
					<router-link :to="'/home'" title="">
						<span><img :src="$store.state.apiUrl +'vendor/workwise/images/icon1.png'" alt=""></span>
						Home
					</router-link>
				</li>
				<li>
					<router-link :to="'/profile'" title="">
						<span><img :src="$store.state.apiUrl +'vendor/workwise/images/icon4.png'" alt=""></span>
							Profiles
					</router-link>
					<ul>
						<li><router-link :to="'profile/' + $store.state.session.id" title="">User Profile</router-link></li>
					</ul>
				</li>
				<li>
					<a @click="logout" title="">
						<span><img :src="$store.state.apiUrl +'vendor/workwise/images/icon3.png'" alt=""></span>
						Logout
					</a>
				</li>
			</ul>
		</nav><!--nav end-->
		<div class="menu-btn">
			<a @click="navActive = !navActive" title=""><i class="fa fa-bars"></i></a>
		</div><!--menu-btn end-->
		<!--
		<div class="user-account">
			<div class="user-info">
				<img :src="$store.state.apiUrl +'images/web/siswa.jpg'" width="30" alt="" v-if="$store.state.session.gender == 'L'">
				<img :src="$store.state.apiUrl +'images/web/siswi.jpg'" width="30" alt="" v-else>
				<a @click="settingActive = !settingActive" title="">{{username.substring(0,3)}}</a>
				<i class="la la-sort-down"></i>
			</div>
			<div class="user-account-settingss" :class="{active: settingActive}">
				<h3 class="tc"><a @click="logout" title="">Logout</a></h3>
			</div>
		</div>-->
	</div><!--header-data end-->
</div>
</template>
<script>
	export default{
		data(){
			return{
				settingActive: false,
				navActive: false
			}
		},
		mounted(){
			this.init();
		},
		methods: {
			init: function(){
				axios.get(this.$store.state.apiUrl + 'usersession').then(response=>{
	        		this.$store.state.session = response.data.user;
	        	}).catch(error=>{});
			},
			logout: function(){
				axios.get(this.$store.state.apiUrl + 'logout').then(response=>{
					this.$store.state.session = {
						name: '',
						gender: '',
						role: ''
					};
					window.location.href = this.$store.state.apiUrl;
				}).catch(error=>{
				})
			}
		},
		computed: {
			username: function(){
				return this.$store.getters.username;
			}
		}
	}
</script>