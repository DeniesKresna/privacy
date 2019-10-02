<template>
<div>
	<div class="row">
		<div class="col-md-12">
			<div class="usy-name">
				<h3>Cek Data Upload</h3>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label>Mapel</label>
				<select class="form-control" v-model="picked_subject">
					<option value="0">Pilih Mapel</option>
					<option :value="subject" v-for="(subject,index) in subjects">{{subject.subject_name}}</option>
				</select>
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<label>Kelas</label>
				<select class="form-control" v-model="picked_class">
					<option value="0">Pilih Kelas</option>
					<option :value="kelas" v-for="(kelas,index) in classes">{{kelas.class_name}}</option>
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
				<label>Tipe</label>
				<select class="form-control" v-model="picked_type">
					<option value="0">Pilih Jenis</option>
					<option :value="type.val" v-for="(type,index) in types">{{type.text}}</option>
				</select>
			</div>
		</div>
		<div class="col-md-2">
			<button class="btn btn-info" @click="getScores" v-if="picked_subject != 0 && picked_class != 0 && picked_type != 0">Cari</button>
		</div>
		<div class="col-md-3" v-if="scores.data.length > 0">
			<button class="btn btn-danger" @click="deleteAllScore"><span class="fa fa-trash"></span> Hapus Semua</button>
		</div>
	</div>
	<div class="row" v-if="scores.data.length > 0">
		<div class="col-md-12">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Induk</th>
						<th>Nama</th>
						<th>Nilai</th>
						<th>Remedi</th>
						<th>NA</th>
						<th>Tgl Tes</th>
						<th>Waktu Upload</th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="(score,index) in scores.data">
						<td>{{score.code}}</td>
						<td>{{score.name}}</td>
						<td>{{score.score_nilai}}</td>
						<td>{{score.score_remed}}</td>
						<td>{{score.score_na}}</td>
						<td>{{score.score_date}}</td>
						<td>{{score.updated_at}}</td>
					</tr>
				</tbody>
			</table>
		</div>
		<pagination :data="scores" @pagination-change-page="getScores"></pagination>
	</div>
	<div class="row" v-else>
		<div class="col-md-12">
			<p>tidak ada nilai</p>
		</div>
	</div>
</div>
</template>
<script>
export default{
	data(){
		return {
			subjects: [],
			classes: [],
			types: [
				{val: 'Tes', text: 'Tes'},
				{val: 'Tugas', text: 'Tugas'},
				{val: 'PAS', text: 'PAS'}
			],
			picked_type: 0,
			picked_kd: 1,
			picked_subject: [],
			picked_class: [],
			scores: {
				data: []
			}
		}
	},
	mounted(){
		this.initScoreTableForm();
	},
	methods:{
		initScoreTableForm: function(){
	        axios.get(this.$store.state.apiUrl + 'subject').then(response=>{
	        	this.subjects = response.data.subjects;
	        	axios.get(this.$store.state.apiUrl + 'kelas/yearactive').then(response=>{
	        		this.classes = response.data.classes;
	        	}).catch(error=>{
	        	});
	        }).catch(error=>{
	        });
		},
		getScores: function(page=1){
			axios.post(this.$store.state.apiUrl + 'score/filteredone?page=' + page,{subject_id: this.picked_subject.id, class_id: this.picked_class.id, kd: this.picked_kd, type: this.picked_type}).then(response=>{
				this.scores = response.data.scores;
			}).catch(error=>{
	        });
		},
		deleteAllScore: function(){
			if(confirm('Yakin akan menghapus seluruh nilai ' + this.picked_type + " kd " + this.picked_kd + " pada pelajaran " +this.picked_subject.subject_name + " kelas " + this.picked_class.class_name + '?')){
				axios.post(this.$store.state.apiUrl + 'score/deletefilteredone', {subject_id: this.picked_subject.id, class_id: this.picked_class.id, kd: this.picked_kd, type: this.picked_type}).then(response=>{
					this.getScores();
					this.$swal("Berhasil!", response.data.message, "success");
				}).catch(error=>{
				});
			}
		}
	}
}
/*
if(response.data.scores.length == 0){
					alert("no score yet");
	        		this.bills = [];
				}
				else {
					this.bills = [];
					var billsFromDb = response.data.bills;
					var scores = response.data.scores;
					loop1:
					for(var i=0; i<billsFromDb.length; i++){
						var newbill = {};
						newbill['kd'] = billsFromDb[i]['bill_kd'];
						newbill['check'] = false;
						loop2:
						for(var j=0; j<scores.length; j++){
							if(scores[j]['score_kd'] == billsFromDb[i]['bill_kd']){
								newbill['check'] = true;
								break loop2;
							}
						}
						this.bills.push(newbill);
					}
				}
*/
</script>