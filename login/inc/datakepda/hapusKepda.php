<?php
ob_start();
$id = $_GET['id'];
$result = mysqli_query($link,"delete from tm_kepda where id_kepda = '$id'");
if ($result){
	echo "<script>alert('sukses hapus');window.location.assign(\"page.php?page=dataKepda\")</script>";
}
else {
	echo "<script>alert('gagal hapus');window.location.assign(\"page.php?page=dataKepda\")</script>";
}
?>

<?php 
$hapusKepda = ob_get_clean();
?>