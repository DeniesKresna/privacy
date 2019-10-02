<template>
<div>
<div class="user_profile">
	<div class="user-pro-img">
		<img :src="$store.state.apiUrl + 'images/web/siswa.jpg'" alt="" v-if="userData.gender == 'L'">
		<img :src="$store.state.apiUrl + 'images/web/siswi.jpg'" alt="" v-else>
	</div><!--user-pro-img end-->
	<div class="user_pro_status">
		<ul class="flw-hr">
			<li @click="showPasswordModal"><a href="#" title="" class="flww"><i class="fa fa-lock"></i> Password</a></li>
			<li @click="showModal"><a href="#" title="" class="hre"><i class="fa fa-pencil"></i> Edit</a></li>
		</ul>
		<ul class="flw-status">
			<!--<li>
				<span>Kelas</span>
				<b>XII IPA 1</b>
			</li>
			<li>
				<span>Absen</span>
				<b>30</b>
			</li>-->
		</ul>
	</div><!--user_pro_status end-->
	<ul class="social_links">
		<li><i class="fa fa-user-md"></i> {{userData.birth_place}}</li>
		<li><i class="fa fa-calendar"></i> {{userData.birth_date}}</li>
		<li><i class="fa fa-map-marker"></i> {{userData.address}}</li>
		<li><i class="fa fa-phone"></i> {{userData.phone}}</li>
		<li><i class="fa fa-envelope-o"></i> {{userData.email}}</li>
	</ul>
</div><!--user_profile end-->
		<div class="post-popup job_post" :class="{ active: editModal }">
			<div class="post-project">
				<h3>Edit User</h3>
				<div class="post-project-fields">
					<form @submit.prevent="updateUserData">
						<div class="row">
							<div class="col-lg-12">
								<input type="text" maxlength="191" v-model="userData.name" placeholder="Masukkan Nama" required readonly>
							</div>
							<div class="col-lg-12">
								<div class="inp-field" v-model="userData.gender">
									<select>
										<option>Laki-laki</option>
										<option>Perempuan</option>
									</select>
								</div>
							</div>
							<div class="col-lg-12">
								<input type="email" maxlength="191" v-model="userData.email" placeholder="Masukkan Email">
							</div>
							<div class="col-lg-12">
								<input type="text" maxlength="191" v-model="userData.birth_place" placeholder="Masukkan Tempat Lahir">
							</div>
							<div class="col-lg-12">
								<input type="date" v-model="userData.birth_date" placeholder="Masukkan Tanggal Lahir">
							</div>
							<div class="col-lg-12">
								<input type="text" maxlength="191" v-model="userData.address" placeholder="Masukkan Alamat" required>
							</div>
							<div class="col-lg-12">
								<input type="text" maxlength="191" v-model="userData.phone" placeholder="Masukkan Telepon" required>
							</div>
							<!--
							<div class="col-lg-6">
								<div class="price-br">
									<input type="text" name="price1" placeholder="Price">
									<i class="la la-dollar"></i>
								</div>
							</div>

							<div class="col-lg-12">
								<textarea name="description" placeholder="Description"></textarea>
							</div>-->
							<div class="col-lg-12">
								<ul>
									<li><button class="active" type="submit" value="post">Update</button></li>
									<li><a href="#" title="" @click="closeModal">Cancel</a></li>
								</ul>
							</div>
						</div>
					</form>
				</div><!--post-project-fields end-->
			</div><!--post-project end-->
		</div><!--post-project-popup end-->
		<div class="post-popup job_post" :class="{ active: editPasswordModal }">
			<div class="post-project">
				<h3>Ganti Password</h3>
				<div class="post-project-fields">
					<form @submit.prevent="updateUserPassword">
						<div class="row">
							<div class="col-lg-12">
								<input type="password" maxlength="191" v-model="userPassword.oldpassword" placeholder="Password Lama">
							</div>
							<div class="col-lg-12">
								<input type="password" minlength="8" maxlength="191" v-model="userPassword.newpassword1" placeholder="Password Baru">
							</div>
							<div class="col-lg-12">
								<input type="password" minlength="8" maxlength="191" v-model="userPassword.newpassword2" placeholder="Konfirmasi Password Baru">
							</div>
							<div class="col-lg-12">
								<ul>
									<li><button class="active" type="submit" value="post">Update</button></li>
									<li><a href="#" title="" @click="closeModal">Cancel</a></li>
								</ul>
							</div>
						</div>
					</form>
				</div><!--post-project-fields end-->
			</div><!--post-project end-->
		</div><!--post-project-popup end-->
</div>
</template>
<script>
	export default{
		data(){
			return{
				userData: {},
				userPassword: {},
				editModal: false,
				editPasswordModal: false
			}
		},
		mounted(){
			axios.get(this.$store.state.apiUrl + 'usersession').then((response)=>{
	    		this.userData = response.data.user;
	    	});
		},
		methods: {
			showModal: function(){
				this.editModal=true;
				this.$store.state.overlay = true;
			},
			showPasswordModal: function(){
				this.editPasswordModal=true;
				this.$store.state.overlay = true;
			},
			closeModal: function(){
				this.editModal= false;
				this.editPasswordModal= false;
				this.$store.state.overlay = false;
			},
			updateUserData: function(){
				axios.patch(this.$store.state.apiUrl + 'usersession',{'userdata': this.userData}).then(response=>{
					this.$swal({
					  title: "Berhasil!",
					  icon: "success"
					}).then(()=>{
						this.closeModal();
					});
				}).catch(error=>{
					alert('gagal menghubungi server');
				});
			},
			updateUserPassword: function(){
				if(this.userPassword.newpassword1 == this.userPassword.newpassword2){
					axios.patch(this.$store.state.apiUrl + 'userpassword',{'userpassword': this.userPassword}).then(response=>{
						this.$swal({
						  title: "Berhasil!",
						  icon: "success"
						}).then(()=>{
							this.closeModal();
						});
					}).catch(error=>{
						alert(error.response.data.error);
					})
				}
				else
					alert("Konfirmasi Password Salah");
			}	
		}
	}
</script>