<?php
ob_start();
$id = $_GET['id'];
$result = mysqli_query($link,"delete from tm_setda_btl where id_setda_btl = '$id'");
if ($result){
	echo "<script>alert('sukses hapus');window.location.assign(\"page.php?page=datasetdabtl\")</script>";
}
else {
	echo "<script>alert('gagal hapus');window.location.assign(\"page.php?page=datasetdabtl\")</script>";
}
?>

<?php 
$hapussetdabtl = ob_get_clean();
?>