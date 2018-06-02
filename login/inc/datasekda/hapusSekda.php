<?php
ob_start();
$id = $_GET['id'];
$result = mysqli_query($link,"delete from tm_data where id_data = '$id'");
if ($result){
	echo "<script>alert('sukses hapus');window.location.assign(\"page.php?page=dataSekda\")</script>";
}
else {
	echo "<script>alert('gagal hapus');window.location.assign(\"page.php?page=dataSekda\")</script>";
}
?>

<?php 
$hapusSekda = ob_get_clean();
?>