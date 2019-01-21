<?php 
include 'inc/db.php';
if (isset($_POST['submit'])): 
	$id_data = $_POST['data'];
	$sql="SELECT * FROM tm_data WHERE id_data = '$id_data'";
	$query = mysqli_query($db,$sql);

	// ngambil data
	$data = $query->fetch_assoc();
	$realisasi = $_POST['realisasi'];

	// validasi
	if ($data['data_sisa'] < $realisasi) {
		$result = "Gagal! Lebih";
		exit;
	}
	$tgl_uraian = $_POST['tgl_uraian'];
	$kode_rek_uraian = $_POST['kode_rek_uraian'];
	$uraian = $_POST['uraian'];

	$data_sisa = $data['data_sisa'];
	$persen = topersen($realisasi,$data['data_masuk'],'');
	$sisa_anggaran = $data_sisa - $realisasi;

	// update data sisa
	$sql="UPDATE tm_data SET data_sisa = '$sisa_anggaran' WHERE id_data = '$id_data'";
	$query = mysqli_query($db,$sql);	


	// input data details
	$sql = "INSERT INTO tm_detail_data(id_data,tgl_uraian,kode_rek_uraian,uraian,realisasi, persen,sisa_anggaran) VALUES('$id_data','$tgl_uraian','$kode_rek_uraian','$uraian',
									'$realisasi','$persen','$sisa_anggaran')";
	$query = mysqli_query($db,$sql);
	if ($query) {
		$result = "Sukses!";
	}else{
		$result = "Gagal!";
	}
 endif; 
$sql = "SELECT * FROM tm_data";
$query = mysqli_query($db, $sql);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Input data</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>	
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="input_data.php">Input Data Masuk</a></li>
      <li><a href="lihat_data.php">Lihat Data Masuk</a></li>
      <li><a href="input_data_detail.php">Input Data Detail</a></li>
      <li><a href="lihat_data_detail.php">Lihat Data Detail</a></li>
    </ul>
  </div>
</nav>
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h1>Input Data Masuk</h1>
			<?php if (isset($result)): ?>
				<div class="alert alert-info">
					<?= $result ?>
				</div>
			<?php endif ?>
			<form method="post">
				  <div class="form-group">
				  	<label for="data">Data</label>
				  	<select name="data" class="form-control">
			    	<?php while($row = $query->fetch_assoc()): ?>
			    		<option value="<?= $row['id_data']  ?>"><?= $row['data_sisa'] ?>(<?= $row['deskipsi'] ?>)</option>
			    	<?php endwhile; ?>				  		
				  	</select>
				  </div>
				  <div class="form-group">
				    <label for="tgl_uraian">tgl_uraian</label>
				    <input type="date" name="tgl_uraian" class="form-control" id="tgl_uraian" placeholder="Tanggal Uraian....">
				  </div>	
				  <div class="form-group">
				    <label for="kode_rek_uraian">Kode Uraian</label>
				    <input type="number" name="kode_rek_uraian" class="form-control" id="kode_rek_uraian" placeholder="Jumlah....">
				  </div>				  			  				
				  <div class="form-group">
				    <label for="uraian">Uraian</label>
				    <textarea name="uraian" class="form-control" id="uraian" placeholder="Deskripsi...."></textarea>
				  </div>
				  <div class="form-group">
				    <label for="realisasi">Realisasi</label>
				    <input type="number" name="realisasi" class="form-control" id="realisasi" placeholder="Jumlah....">
				  </div>
				<button type="submit" name="submit" class="btn btn-danger btn-block">Input</button>		
			</form>
		</div>
	</div>
</div>
</body>
</html>