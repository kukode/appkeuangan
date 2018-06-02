<?php
ob_start();
$id = abs($_GET['id']);


if (isset($_POST['update'])){

	$bagian = $_POST['bagian'];
    $asisten = $_POST['asisten'];
    $nama_program = $_POST['nama_program'];
    $total_anggaran = $_POST['total_anggaran'];
    $tanggal = date('Y-m-d',strtotime($_POST['tgl_update']));
    

    //$total_persen = ($realisasi / 100) / ($anggaran / 100) * 100; 
    //$total_sisa_anggran = $anggaran - $realisasi;
        
		$query = "update tm_data set bagian='$bagian',asisten='$asisten',tgl_update= '$tanggal',nama_program='$nama_program',total_anggaran='$total_anggaran' where tm_data.id_data = '$id'";
		$result = mysqli_query($link, $query);
		if ($result)
		{
			echo "<script>alert('sukses edit');window.location.assign(\"page.php?page=dataSekda\")</script>";

		}
		else {
			echo "<script>alert('gagal');window.location.assign(\"page.php?page=dataSekda\")</script>";
		}

}
else {
	$sql = "SELECT * FROM tm_data  where tm_data.id_data = '$id'";
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
                          <label class="col-sm-3 control-label">Pilih Bagian <span>*</span></label>
                          <select name="bagian" class="form-control" style="width: 70%">
                            <option value="1" <?php if($row['bagian'] == "1"){ echo "selected";} ?> >BAGIAN UMUM</option>
                            <option value="2" <?php if($row['bagian'] == "2"){ echo "selected";} ?> >BAGIAN KEUANGAN</option>
                            <option value="3" <?php if($row['bagian'] == "3"){ echo "selected";} ?> >BAGIAN KERJASAMA</option>
                            <option value="4" <?php if($row['bagian'] == "4"){ echo "selected";} ?> >BAGIAN PERUNDANG - UNDANGAN</option>
                            <option value="5" <?php if($row['bagian'] == "5"){ echo "selected";} ?> >BAGIAN ADMINISTRASI PEMERINTAHAN</option>
                            <option value="6" <?php if($row['bagian'] == "6"){ echo "selected";} ?> >BAGIAN KESEJAHTERAAN RAKYAT</option>
                            <option value="7" <?php if($row['bagian'] == "7"){ echo "selected";} ?> >BAGIAN PEREKONOMIAN</option>
                            <option value="8" <?php if($row['bagian'] == "8"){ echo "selected";} ?> >BAGIAN ORGANSASI</option>
                            <option value="9" <?php if($row['bagian'] == "9"){ echo "selected";} ?> >BAGIAN PROGDALBANG</option>
                            <option value="10" <?php if($row['bagian'] == "10"){ echo "selected";} ?> >BAGIAN PENGADAAN BARANG/JASA</option>
                            <option value="11" <?php if($row['bagian'] == "11"){ echo "selected";} ?> >BAGIAN BANTUAN HUKUM</option>
                            
                          </select>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Pilih Asisten <span>*</span></label>
                          <select name="asisten" class="form-control" style="width: 70%">
                            <option value="1" <?php if($row['bagian'] == "1"){ echo "selected";} ?> >ASISTEN PEMERINTAHAN</option>
                            <option value="2" <?php if($row['bagian'] == "2"){ echo "selected";} ?> >ASISTEN PEREKONOMIAN DAN PEMBANGUNAN</option>
                            <option value="3" <?php if($row['bagian'] == "3"){ echo "selected";} ?> >ASISTEN ADMINISTRASI</option>
                            
                          </select>
                        </div>
                        <div class="form-group"><label class="col-sm-3 control-label"> Tanggal Program </label>
                          <input type="date" class="form-control" name="tgl_update" value="<?php echo $row['tgl_update'] ?>" style="width: 70%"  />
                        </div>
                        <div class="form-group"><label class="col-sm-3 control-label"> Nama Program <span>*</span></label>
                          <input type="text" class="form-control" name="nama_program"   style="width: 70%"  value="<?php echo $row['nama_program'] ?>" />
                        </div>
                        <div class="form-group"><label class="col-sm-3 control-label">Total Anggaran <span>*</span></label>
                          <input type="text" class="form-control" name="total_anggaran"   style="width: 70%" value="<?php echo $row['total_anggaran'] ?>" />
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
<?php $editSekda = ob_get_clean();?>
