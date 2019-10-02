<template>
<div>
	<div class="row">
		<div class="col-md-12">
			<div class="usy-name">
				<h3>Daftar User Tahun Ajaran Aktif</h3>
			</div>
		</div>
	</div>
	<div class="row">
		<div class='col-md-6'>
			<div class="form-group">
				<input type="text" class="form-control" v-model="main_search" placeholder="Kelas Siswa">
			</div>
		</div>
		<div class="col-md-3">
			<button class="btn btn-default" @click="getUsers"><span class="fa fa-search"> Cari</span></button>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div v-if="users.data.length > 0">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Id</th>
							<th>Induk</th>
							<th>Nama</th>
							<th>L/P</th>
							<th>Telepon</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="(user,index) in users.data">
							<td>{{user.id}}</td>
							<td>{{user.code}}</td>
							<td>{{user.name}}</td>
							<td>{{user.gender}}</td>
							<td>{{user.phone}}</td>
							<td><a @click="resetPassword(user.id)">[<span class="fa fa-refresh" style="color: orange"></span> siswa]</a><a @click="resetPassword(user.id)">[<span class="fa fa-refresh" style="color: orange"></span> ortu]</a></td>
						</tr>
					</tbody>
				</table>
				<pagination :data="users" @pagination-change-page="getUsers"></pagination>
			</div>
			<div v-else>
				<p>Tidak ada data</p>
			</div>
		</div>
	</div>
</div>
</template>
<script>
export default{
	data(){
		return {
			main_search: '',
			users: {
				data: []
			}
		}
	},
	methods: {
		getUsers: function(page = 1){
			axios.get(this.$store.state.apiUrl + 'user/yearactive/class/' + this.main_search + "?page=" + page).then(response=>{
				this.users = response.data.users;
			});
		},
		resetPassword: function(id){
			if(confirm("Yakin reset password siswa ini?")){
				axios.get(this.$store.state.apiUrl + 'user/reset/' + id).then(response=>{
					this.$swal("Berhasil!", response.data.message, "success");
				});
			}
		}
	}
}
</script>
