<?php
ob_start();
$id = $_GET['id'];
$result = mysqli_query($link,"delete from tm_kegiatan where id_kegiatan = '$id'");
if ($result){
	echo "<script>alert('sukses hapus');window.location.assign(\"page.php?page=kegiatan\")</script>";
}
else {
	echo "<script>alert('gagal hapus');window.location.assign(\"page.php?page=kegiatan\")</script>";
}
?>

<?php 
$hapusKegiatan = ob_get_clean();
?>