<template>
<div>
	<div class="row">
		<div class="col-md-12">
			<div class="usy-name">
				<h3>Upload</h3>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label>File</label>
				<input type="file" ref="excel" id="excel" class="form-control" @change="scoreImport">
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<label>Format File</label>
				<select class="form-control" v-model="picked_format">
					<option value="pppk">PPPK Petra</option>
					<option value="local">Local</option>
				</select>
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<label>Mapel</label>
				<select class="form-control" v-model="picked_subject">
					<option value="0">Pilih Mapel</option>
					<option :value="subject.id" v-for="(subject,index) in subjects">{{subject.subject_name}}</option>
				</select>
			</div>
		</div>
		<div class="col-md-2">
			<div class="form-group">
				<label>KD Berapa?</label>
				<input type="number" min="1" max="20" class="form-control" v-model="picked_kd">
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<label>Jenis</label>
				<select class="form-control" v-model="picked_type">
					<option value="0">Pilih Jenis</option>
					<option :value="type.val" v-for="(type,index) in types">{{type.text}}</option>
				</select>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label>Tanggal Tes</label>
				<input type="date" class="form-control" v-model="datetest" placeholder="tanggal test">
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
			picked_subject: 1,
			picked_type: 'Tes',
			picked_kd: 1,
			picked_format: 'pppk',
			uploadedExcel: '',
			subjects: [],
			datetest: '2019-01-01',
			types: [
				{val: 'Tes', text: 'Tes'},
				{val: 'Tugas', text: 'Tugas'},
				{val: 'PAS', text: 'PAS'}
			]
		}
	},
	mounted(){
		this.initUploadForm();
	},
	methods:{
		initUploadForm: function(){
	        axios.get(this.$store.state.apiUrl + 'subject').then(response=>{
	        	this.subjects = response.data.subjects;
	        }).catch(error=>{
	        });
		},
		scoreImport: function(){
			this.uploadedExcel = this.$refs.excel.files[0];
		},
		submitExcel: function(){
			if(this.picked_subject != null && this.picked_type != null && this.picked_kd != null && this.picked_type != null && this.datetest != null){
				let formData = new FormData();
		        formData.append('file', this.uploadedExcel);
		        formData.append('formad', this.picked_format);
		        formData.append('subject', this.picked_subject);
		        formData.append('type', this.picked_type);
		        formData.append('datetest', this.datetest);
		        formData.append('kd', this.picked_kd);

		        axios.post(this.$store.state.apiUrl + 'scoreupload',
		            formData,
		            {
		                headers: {
		                    'Content-Type': 'multipart/form-data'
		                }
		            }
		        ).then(response=>{
		        	this.$swal("Good job!", response.data.message, "success");
		        }).catch(error=>{
		        });
	    	}
	    	else
	    		alert("isi dulu form dengan benar");
		}
	}
}
</script>