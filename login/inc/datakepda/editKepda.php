<?php
ob_start();
$id = abs($_GET['id']);


if (isset($_POST['update'])){

	  $belanja_kepda = $_POST['belanja_kepda'];
    $nama_kegiatan = $_POST['nama_kegiatan'];
    $total_anggaran = $_POST['total_anggaran'];
    $realisasi = $_POST['realisasi'];
    $tanggal = date('Y-m-d',strtotime($_POST['tgl_program']));
    

    $total_persen = ($realisasi / 100) / ($total_anggaran / 100) * 100; 
    $total_sisa_anggran = $total_anggaran - $realisasi;
        
		$query = "update tm_kepda set belanja_kepda='$belanja_kepda',tgl_program= '$tanggal',nama_kegiatan='$nama_kegiatan',total_anggaran='$total_anggaran',realisasi='$realisasi',sisa_anggaran = '$total_sisa_anggran',persen = '$total_persen' where tm_kepda.id_kepda = '$id'";
		$result = mysqli_query($link, $query);
		if ($result)
		{
			echo "<script>alert('sukses edit');window.location.assign(\"page.php?page=dataKepda\")</script>";

		}
		else {
			echo "<script>alert('gagal');window.location.assign(\"page.php?page=dataKepda\")</script>";
		}

}
else {
	$sql = "SELECT * FROM tm_kepda  where tm_kepda.id_kepda = '$id'";
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
                        
                    	
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Pilih Sub Belanja <span>*</span></label>
                          <select name="belanja_kepda" class="form-control" style="width: 70%">
                            <option value="1" <?php if($row['belanja_kepda'] == "1"){ echo "selected";} ?> >Belanja Pegawai</option>
                            <option value="2" <?php if($row['belanja_kepda'] == "2"){ echo "selected";} ?> >Belanja Operasional</option>
                          
                            
                          </select>
                        </div>

                        <div class="form-group"><label class="col-sm-3 control-label"> Tanggal <span>*</span></label>
                          <input type="date" class="form-control" name="tgl_program" required="required" style="width: 70%" value="<?php echo $row['tgl_program'] ?>" />
                        </div>

                        <div class="form-group"><label class="col-sm-3 control-label"> Nama Kegiatan <span>*</span></label>
                          <input type="text" class="form-control" name="nama_kegiatan" placeholder="Masukan  Nama Kegiatan" required="required" style="width: 70%" value="<?php echo $row['nama_kegiatan'] ?>"  />
                        </div>

                        <div class="form-group"><label class="col-sm-3 control-label">Total Anggaran <span>*</span></label>
                          <input type="text" class="form-control" name="total_anggaran" placeholder="Masukan  Anggaran" required="required" style="width: 70%" value="<?php echo $row['total_anggaran'] ?>" />
                        </div>

                        <div class="form-group"><label class="col-sm-3 control-label"> Realisasi <span>*</span></label>
                          <input type="text" class="form-control" name="realisasi" placeholder="Masukan  Realisasi" required="required" style="width: 70%"  value="<?php echo $row['realisasi'] ?>" />
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
<?php $editKepda = ob_get_clean();?>
