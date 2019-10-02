<template>
<div>
	<div class="row">
		<div class="col-md-12">
			<div class="usy-name">
				<h3>Upload</h3><a href="format/siswa.xlsx">[format siswa]</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label>File</label>
				<input type="file" ref="excel" id="excel" class="form-control" @change="userImport">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label>Role</label>
				<select v-model="role" class="form-control" @change="userImport">
					<option value="siswa">Siswa</option>
				</select>
			</div>
		</div>
		<div class="col-md-1">
			<button class="btn btn-info" @click="submitExcel" v-if="uploadedExcel != ''">Go</button>
		</div>
	</div>
	<hr>
</div>
</template>
<script>
export default{
	data(){
		return {
			role: 'siswa',
			uploadedExcel: ''
		}
	},
	methods: {
		userImport: function(){
			this.uploadedExcel = this.$refs.excel.files[0];
		},
		submitExcel: function(){
			if(this.role){
				let formData = new FormData();
		        formData.append('file', this.uploadedExcel);
		        formData.append('role', this.role);
				axios.post(this.$store.state.apiUrl + 'user/upload', formData,
		            {
		                headers: {
		                    'Content-Type': 'multipart/form-data'
		                }
		            }).then(response=>{
		            this.$swal("Good job!", response.data.message, "success");
				}).catch(error=>{
					this.$swal("Ada Masalah", response.statusText, "danger");
				});
			}
			else{
				alert("Isi dulu rolenya");
			}
		}
	}
}
</script>
