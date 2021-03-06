<?php 
include 'inc/db.php';
$sql = "SELECT * FROM tm_detail_data INNER JOIN tm_data ON tm_data.id_data = tm_detail_data.id_data";
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
			<h1>Data Masuk</h1>
			 <table class="table table-hover">
			    <thead>
			      <tr>
			        <th>#</th>
			        <th>Realisasi</th>
			        <th>Sisa</th>
			        <th>Dari</th>
			        <th>Persen</th>
			        <th>Deskipsi</th>
			      </tr>
			    </thead>
			    <tbody>
			    	<?php while($row = $row = $query->fetch_assoc()): ?>
			    		<tr>
			    			<td><?= $row['id_detail_data']  ?></td>
			    			<td><?= rp($row['realisasi']) ?></td>
			    			<td><?= rp($row['sisa_anggaran'])  ?></td>
			    			<td><?= rp($row['data_masuk'])  ?></td>
			    			<td><?= $row['persen']  ?></td>
			    			<td><?= $row['uraian']  ?></td>
			    		</tr>
			    	<?php endwhile; ?>
			    </tbody>
			  </table>
		</div>
	</div>
</div>
</body>
</html>