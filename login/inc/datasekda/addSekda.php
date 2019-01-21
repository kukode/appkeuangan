<?php
ob_start();
if (isset($_POST['simpan']))
{
	
	$subbelanja = $_POST['subbelanja'];
	$bagian = $_POST['bagian'];
	$asisten = $_POST['asisten'];
	$tanggal = date('Y-m-d',strtotime($_POST['tgl_update']));

	$id_program = $_POST['id_program'];
	$id_kegiatan = $_POST['id_kegiatan'];
	$total_anggaran = $_POST['total_anggaran'];
	$data_sisa = $_POST['data_sisa'];
	//$persen = $_POST['persen'];
	//$sisa_anggaran = $_POST['sisa_anggaran'];

	//$total_persen = ($realisasi / 100) / ($anggaran / 100) * 100; 
	//$total_sisa_anggran = $anggaran - $realisasi;

	
	$query = "insert into tm_data(subbelanja,bagian,asisten,tgl_update,id_program,id_kegiatan,total_anggaran,data_sisa) 
	values('$subbelanja','$bagian','$asisten','$tanggal','$id_program','$id_kegiatan','$total_anggaran','$data_sisa')";
	$result = mysqli_query($link, $query);
	if ($result)
	{
		echo "<script>alert('sukses');window.location.assign(\"page.php?page=dataSekda\")</script>";
	}
	else {
		echo "<script>alert('gagal');window.location.assign(\"page.php?page=addSekda\")</script>";
	}
}

?>
<div class="ibox float-e-margins">
   <div class="ibox-title">
		<a href="?page=dataSekda" style="color:#ed1c24"><h2 class="pull-right"><i class="fa fa-window-close" aria-hidden="true"></i></h2></a>
		<h2 class="text-left"><b>Form</b></h2>
	</div>
	<div class="ibox-content">
		<form method="post">
			<div class="form-group">
			  <label class="col-sm-3 control-label">Pilih Sub Belanja <span>*</span></label>
			  <select name="subbelanja" class="form-control" style="width: 70%">
			  	<option value="1">Belanja Barang dan Jasa</option>
			  	<option value="2">Belanja Modal</option>
			  	<option value="3">Belanja Pegawai</option>
			  	
			  </select>
			</div>
			<div class="form-group">
			  <label class="col-sm-3 control-label">Pilih Bagian <span>*</span></label>
			  <select name="bagian" class="form-control" style="width: 70%">
			  	<option value="1">BAGIAN UMUM</option>
			  	<option value="2">BAGIAN KEUANGAN</option>
			  	<option value="3">BAGIAN KERJASAMA</option>
			  	<option value="4">BAGIAN PERUNDANG - UNDANGAN</option>
			  	<option value="5">BAGIAN ADMINISTRASI PEMERINTAHAN</option>	
			  	<option value="6">BAGIAN KESEJAHTERAAN RAKYAT</option>
			  	<option value="7">BAGIAN PEREKONOMIAN</option>
			  	<option value="8">BAGIAN ORGANSASI</option>
			  	<option value="9">BAGIAN PROGDALBANG</option>
			  	<option value="10">BAGIAN PENGADAAN BARANG/JASA</option>
			  	<option value="11">BAGIAN BANTUAN HUKUM</option>
			  	
			  </select>
			</div>
			<div class="form-group">
			  <label class="col-sm-3 control-label">Pilih Asisten <span>*</span></label>
			  <select name="asisten" class="form-control" style="width: 70%">
			  	<option value="1">ASISTEN PEMERINTAHAN DAN KESEJAHTERAAN RAKYAT</option>
			  	<option value="2">ASISTEN PEREKONOMIAN DAN PEMBANGUNAN</option>
			  	<option value="3">ASISTEN ADMINISTRASI</option>
			  	
			  </select>
			</div>

			<div class="form-group"><label class="col-sm-3 control-label"> Tanggal Program <span>*</span></label>
			  <input type="date" class="form-control" name="tgl_update" placeholder="Masukan  Tanggal" required="required" style="width: 70%"  />
			</div>
			
			

			<div class="form-group"><label class="col-sm-3 control-label"> Nama Program <span>*</span></label>
			   <select name="id_program" class="form-control" style="width: 70%">
			   	<?php 
			   		$queryProgram = "select * from tm_program";
			   		$resultProgram = mysqli_query($link,$queryProgram);
			   		while ($row = mysqli_fetch_array($resultProgram)) {
			   		
			   		
			   	 ?>
			  	<option value="<?php echo $row['id_program'] ?>"><?php echo strtoupper($row['nama_program']); ?></option>
			  	<?php 
			  		}

			  	?>
			  	
			  	
			  </select>
			</div>
			<div class="form-group"><label class="col-sm-3 control-label"> Nama Kegiatan <span>*</span></label>
			   <select name="id_kegiatan" class="form-control" style="width: 70%">
			   	<?php 
			   		$queryKegiatan = "select * from tm_kegiatan";
			   		$resultKegiatan = mysqli_query($link,$queryKegiatan);
			   		while ($row = mysqli_fetch_array($resultKegiatan)) {
			   		
			   		
			   	 ?>
			  	<option value="<?php echo $row['id_kegiatan'] ?>"><?php echo strtoupper($row['nama_kegiatan']); ?></option>
			  	<?php 
			  		}

			  	?>
			  	
			  	
			  </select>
			</div>
			<div class="form-group"><label class="col-sm-3 control-label">Total Anggaran <span>*</span></label>
			  <input type="text" class="form-control" name="total_anggaran" placeholder="Masukan  Anggaran" required="required" style="width: 70%"  />
			</div>

			<div class="form-group"><label class="col-sm-3 control-label">Realisasi Anggaran  <span>*</span></label>
			  <input type="text" class="form-control" name="data_sisa" placeholder="Masukan  Anggaran" required="required" style="width: 70%"  />
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
$addSekda = ob_get_clean();
?>
