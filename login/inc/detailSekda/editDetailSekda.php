<?php
ob_start();
$id = abs($_GET['id']);


    $sql = "SELECT * FROM tm_detail_data  
            inner join tm_data on tm_data.id_data= tm_detail_data.id_data
            where tm_detail_data.id_detail_data = '$id'";
    $result = mysqli_query($link,$sql);
    $row = mysqli_fetch_assoc($result);
if (isset($_POST['update'])){

	  
    $tanggal = date('Y-m-d',strtotime($_POST['tgl_uraian']));
    $kode_rek_uraian = $_POST['kode_rek_uraian'];
    $uraian = $_POST['uraian'];
    $realisasi = $_POST['realisasi'];
    $anggaran = $row['total_anggaran'];
    $total_persen = ($realisasi / 100) / ($anggaran / 100) * 100; 
    $total_sisa_anggran = $anggaran - $realisasi;

        
		$query = "update tm_detail_data set tgl_uraian= '$tanggal',kode_rek_uraian = '$kode_rek_uraian',uraian='$uraian',realisasi='$realisasi',persen='$total_persen',sisa_anggaran = '$total_sisa_anggran' where tm_detail_data.id_detail_data = '$id'";
		$result = mysqli_query($link, $query);
		if ($result)
		{
			echo "<script>alert('sukses edit');window.location.assign(\"page.php?page=dataSekda\")</script>";

		}
		else {
			echo "<script>alert('gagal');window.location.assign(\"page.php?page=dataSekda\")</script>";
		}

}

	
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
                        
                    	
                       
                        <div class="form-group"><label class="col-sm-3 control-label"> Tanggal  </label>
                          <input type="date" class="form-control" name="tgl_uraian" value="<?php echo $row['tgl_uraian'] ?>" style="width: 70%"  />
                        </div>

                        <div class="form-group"><label class="col-sm-3 control-label"> Kode Rekening  </label>
                          <input type="text" class="form-control" name="kode_rek_uraian" value="<?php echo $row['kode_rek_uraian'] ?>" style="width: 70%"  />
                        </div>

                        <div class="form-group"><label class="col-sm-3 control-label"> Anggaran  </label>
                          <input type="text" class="form-control" name="anggaran" value="<?php echo $row['total_anggaran'] ?>" style="width: 70%"  readonly="readonly"/>
                        </div>


                        <div class="form-group"><label class="col-sm-3 control-label">Uraian <span>*</span></label>
                          <input type="text" class="form-control" name="uraian"  style="width: 70%" value="<?php echo $row['uraian'] ?>" />
                        </div>
                       
                       <div class="form-group"><label class="col-sm-3 control-label">Realisasi <span>*</span></label>
                          <input type="text" class="form-control" name="realisasi"  style="width: 70%" value="<?php echo $row['realisasi'] ?>" />
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



<?php $editDetailSekda = ob_get_clean();?>
