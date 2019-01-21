<?php
ob_start();
$id = abs($_GET['id']);
if (isset($_POST['update']))
{
	
	$namaPasar = $_POST['nama_pasar'];
	$alamatPasar = $_POST['alamat'];
	$wilayahPasar = $_POST['wilayah'];
	$password = sha1($_POST['password']);


	$query = "update pasar set nama_pasar='$namaPasar',alamat='$alamatPasar',
	wilayah='$wilayahPasar', password='$password' where id_pasar = '$id'";
	$result = mysqli_query($link, $query);
	if ($result)
	{
		echo "<script>alert('sukses');window.location.assign(\"page.php?page=pasar\")</script>";
	}
	else {
		echo "<script>alert('gagal');window.location.assign(\"page.php?page=pasar\")</script>";
	}
		
}
else {
	$sql = "select * from pasar where  id_pasar = '$id'";
	$result = mysqli_query($link,$sql);
	$row = mysqli_fetch_assoc($result);
}

?>
	<h3>Setting Akun</h3>
	 <h4>Username : <?php echo $row['username']?></h4>
	 <form role="form" method="post">
		<div class="form-group"><label class=" control-label">Nama Pasar </label> 
        	<input type="text" class="form-control" name="nama_pasar" placeholder="nama pasar" value="<?php echo $row['nama_pasar'] ?>" />
        </div>
       <div class="form-group"><label class=" control-label">Alamat Pasar </label>
        	<textarea rows="5" cols="10" class="form-control" name="alamat"><?php echo $row['alamat'] ?></textarea>
        </div>
        
        <div class="form-group"><label class=" control-label">Wilayah </label> 
        	<select class="form-control" name="wilayah">
			
			<option <?php if( $row['wilayah'] =='timur'){echo "selected"; } ?> value="timur">Timur</option>

		 	<option <?php if( $row['wilayah'] =='tengah'){echo "selected"; } ?> value="tengah">Tengah</option>

			<option <?php if( $row['wilayah'] =='barat'){echo "selected"; } ?> value="barat">Barat</option>

			<option <?php if( $row['wilayah'] =='utara'){echo "selected"; } ?> value="utara">Utara</option>
		
		</select>
        </div>
    	
       <div class="form-group"><label class=" control-label">Password </label> 
        	<input type="password" class="form-control" name="password" placeholder="masukan password baru" />
        </div>
      
      
	   
        <button type="submit" class="btn btn-white" name="update">Simpan</button>
      </form>
<?php 
$editPasar = ob_get_clean();
?>