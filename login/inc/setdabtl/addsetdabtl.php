<?php
ob_start();
if (isset($_POST['simpan']))
{
	
	$subbelanja = $_POST['belanja_setda'];
	$kode_program = $_POST['kode_program'];
	$tanggal = date('Y-m-d',strtotime($_POST['tgl_program']));
	$total_anggaran = $_POST['total_anggaran'];
	$nama_kegiatan = $_POST['nama_kegiatan'];
	$realisasi = $_POST['realisasi'];
	//$persen = $_POST['persen'];
	//$sisa_anggaran = $_POST['sisa_anggaran'];

	$total_persen = ($realisasi / 100) / ($total_anggaran / 100) * 100; 
	$total_sisa_anggran = $total_anggaran - $realisasi;

	
	$query = "insert into tm_setda_btl(kode_program,belanja_setda,tgl_program,nama_kegiatan,total_anggaran,realisasi,sisa_anggaran,persen) 
	values('$kode_program','$subbelanja','$tanggal','$nama_kegiatan','$total_anggaran','$realisasi','$total_sisa_anggran','$total_persen')";
	$result = mysqli_query($link, $query);
	if ($result)
	{
		echo "<script>alert('sukses');window.location.assign(\"page.php?page=datasetdabtl\")</script>";
	}
	else {
		echo "<script>alert('gagal');window.location.assign(\"page.php?page=addsetdabtl\")</script>";
	}
}

?>
<div class="ibox float-e-margins">
   <div class="ibox-title">
		<a href="?page=dataKepda" style="color:#ed1c24"><h2 class="pull-right"><i class="fa fa-window-close" aria-hidden="true"></i></h2></a>
		<h2 class="text-left"><b>Form</b></h2>
	</div>
	<div class="ibox-content">
		<form method="post">
			<div class="form-group">
			  <label class="col-sm-3 control-label">Pilih Sub Belanja <span>*</span></label>
			  <select name="belanja_setda" class="form-control" style="width: 70%">
			  	<option value="1">Belanja Pegawai</option>
			  	
			  	
			  </select>
			</div>

			<div class="form-group">
			  <label class="col-sm-3 control-label">Pilih Program <span>*</span></label>
			  <select name="kode_program" class="form-control" style="width: 70%">
			  	<option value="1">Gaji dan Tunjangan</option>
			  	<option value="2">Tambahan Penghasilan PNS</option>
			  	
			  </select>
			</div>

			<div class="form-group"><label class="col-sm-3 control-label"> Tanggal <span>*</span></label>
			  <input type="date" class="form-control" name="tgl_program" required="required" style="width: 70%"  />
			</div>

			<div class="form-group"><label class="col-sm-3 control-label"> Nama Kegiatan <span>*</span></label>
			  <input type="text" class="form-control" name="nama_kegiatan" placeholder="Masukan  Nama Kegiatan" required="required" style="width: 70%"  />
			</div>

			<div class="form-group"><label class="col-sm-3 control-label">Total Anggaran <span>*</span></label>
			  <input type="text" class="form-control" name="total_anggaran" placeholder="Masukan  Anggaran" required="required" style="width: 70%"  />
			</div>

			<div class="form-group"><label class="col-sm-3 control-label"> Realisasi <span>*</span></label>
			  <input type="text" class="form-control" name="realisasi" placeholder="Masukan  Realisasi" required="required" style="width: 70%"  />
			</div>
			

		 	<!--<div class="form-group"><label class="col-sm-3 control-label">% <span>*</span></label>
				<input type="text" class="form-control" name="persen" placeholder="Masukan %" required="required" style="width: 70%" id="persen" />
		 	</div>

		 	<div class="form-group"><label class="col-sm-3 control-label">Sisa Anggaran <span>*</span></label>
				<input type="text" class="form-control" name="sisa_anggaran" placeholder="Masukan Sisa Anggaran" required="required" style="width: 70%" id="sisa_anggaran" onchange='tryNumberFormat(this.form.thirdBox);'/>
		 	</div>-->


			<button type="submit" class="btn btn-primary pull-right" name="simpan" style="margin-right: 35px;">Simpan</button>
			<br>
		</form>
	</div>
</div>
<br>
<?php
$addsetdabtl = ob_get_clean();
?>
