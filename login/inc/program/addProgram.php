<?php
ob_start();
if (isset($_POST['simpan']))
{
	
	
	$nama_program = $_POST['nama_program'];
	
	//$persen = $_POST['persen'];
	//$sisa_anggaran = $_POST['sisa_anggaran'];

	//$total_persen = ($realisasi / 100) / ($anggaran / 100) * 100; 
	//$total_sisa_anggran = $anggaran - $realisasi;

	
	$query = "insert into tm_program(nama_program) values('$nama_program')";
	$result = mysqli_query($link, $query);
	if ($result)
	{
		echo "<script>alert('sukses');window.location.assign(\"page.php?page=program\")</script>";
	}
	else {
		echo "<script>alert('gagal');window.location.assign(\"page.php?page=program\")</script>";
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
			

			<div class="form-group"><label class="col-sm-3 control-label"> Nama Program <span>*</span></label>
			  <input type="text" class="form-control" name="nama_program" placeholder="Masukan Nama Program" required="required" style="width: 70%"  />
			</div>

			

			<button type="submit" class="btn btn-primary pull-right" name="simpan" style="margin-right: 35px;">Simpan</button>
			<br>
		</form>
	</div>
</div>
<br>
<?php
$addProgram = ob_get_clean();
?>
