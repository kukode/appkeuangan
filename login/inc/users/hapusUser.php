<?php
ob_start();
$id = $_GET['id'];
$result = mysqli_query($link,"delete from pasar where id_pasar = '$id'");
if ($result){
	echo "<script>alert('sukses hapus');window.location.assign(\"page.php?page=user\")</script>";
}
else {
	echo "<script>alert('gagal hapus');window.location.assign(\"page.php?page=user\")</script>";
}
?>

<?php 
$hapusPasar = ob_get_clean();
?>