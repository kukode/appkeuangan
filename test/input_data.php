<?php 
include 'inc/db.php';
if (isset($_POST['submit'])): 
	$data = $_POST['jumlah'];
	$deskripsi = $_POST['deskripsi'];

	$sql = "INSERT INTO tm_data(data_masuk,data_sisa,deskipsi) VALUES('$data','$data','$deskripsi')";
	$query = mysqli_query($db,$sql);
	if ($query) {
		$result = "Sukses!";
	}else{
		$result = "Gagal!";
	}
 endif; ?>
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
				    <label for="jumlah">Jumlah</label>
				    <input type="number" name="jumlah" class="form-control" id="jumlah" placeholder="Jumlah....">
				  </div>
				  <div class="form-group">
				    <label for="deskripsi">Deskripsi</label>
				    <textarea name="deskripsi" class="form-control" id="deskripsi" placeholder="Deskripsi...."></textarea>
				  </div>
				<button type="submit" name="submit" class="btn btn-danger btn-block">Input</button>		
			</form>
		</div>
	</div>
</div>
</body>
</html>