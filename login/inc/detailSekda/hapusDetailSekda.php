<?php
ob_start();
$id = $_GET['id'];
$result = mysqli_query($link,"delete from tm_detail_data where tm_detail_data.id_detail_data = '$id'");
if ($result){
	echo "<script>alert('sukses hapus');window.location.assign(\"page.php?page=dataSekda\")</script>";
}
else {
	echo "<script>alert('gagal hapus');window.location.assign(\"page.php?page=dataSekda\")</script>";
}
?>

<?php 
$hapusDetailSekda = ob_get_clean();
?>