<?php
ob_start();
$id = abs($_GET['id']);


if (isset($_POST['update'])){


    $nama_kegiatan = $_POST['nama_kegiatan'];
         
		$query = "update tm_kegiatan set nama_kegiatan='$nama_kegiatan' where tm_kegiatan.id_kegiatan = '$id'";
		$result = mysqli_query($link, $query);
		if ($result)
		{
			echo "<script>alert('sukses edit');window.location.assign(\"page.php?page=kegiatan\")</script>";

		}
		else {
			echo "<script>alert('gagal');window.location.assign(\"page.php?page=kegiatan\")</script>";
		}

}
else {
	$sql = "SELECT * FROM tm_kegiatan  where tm_kegiatan.id_kegiatan = '$id'";
	$result = mysqli_query($link,$sql);
	$row = mysqli_fetch_assoc($result);
	
?>
<div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
        	<a href="?page=dataSekda" style="color:#ed1c24"><h2 class="pull-right"><i class="fa fa-window-close" aria-hidden="true"></i></h2></a>
            <h2 class="text-left"><b>Edit Data </b></h2>
        </div>
        <div class="ibox-content">
            <div class="row">
                <div class="col-sm-12 b-r">

                    <form role="form" method="post" enctype="multipart/form-data">
                        
                    	
                       
                        
                        <div class="form-group"><label class="col-sm-3 control-label"> Nama Kegiatan <span>*</span></label>
                          <input type="text" class="form-control" name="nama_kegiatan"   style="width: 70%"  value="<?php echo $row['nama_kegiatan'] ?>" />
                        </div>
                        
                       
                        
                        <div>
                            <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit" name="update" style="margin-right: 35px;"><strong>Update Data</strong></button>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>


<?php }?>
<?php $editKegiatan = ob_get_clean();?>
