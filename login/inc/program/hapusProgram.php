<?php
ob_start();
$id = $_GET['id'];
$result = mysqli_query($link,"delete from tm_program where id_program = '$id'");
if ($result){
	echo "<script>alert('sukses hapus');window.location.assign(\"page.php?page=program\")</script>";
}
else {
	echo "<script>alert('gagal hapus');window.location.assign(\"page.php?page=program\")</script>";
}
?>

<?php 
$hapusProgram = ob_get_clean();
?>