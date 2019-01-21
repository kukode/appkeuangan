<?php
ob_start();

$id = $_GET['id'];
 
$sql = "SELECT * FROM tm_detail_data  
             inner join tm_data on tm_data.id_data= tm_detail_data.id_data
            where tm_detail_data.id_detail_data = '$id'";
$query = mysqli_query($link,$sql);
$row = mysqli_fetch_array($query);
 
$id_data = $row['id_data'];
$sql2 = "SELECT * FROM tm_data WHERE id_data = '$id_data'";
$query = mysqli_query($link,$sql2);
$rowData = mysqli_fetch_array($query);
 

    $anggaran = $rowData['data_sisa'];
    $realisasi = $row['realisasi'];
    $total_sisa_anggran = $anggaran - $realisasi;
    
    $query = "UPDATE tm_data SET data_sisa = '$total_sisa_anggran' WHERE id_data = '$id_data'";
	$result = mysqli_query($link,$query);

    $query = "UPDATE tm_detail_data SET sisa_anggaran = '$total_sisa_anggran' WHERE id_detail_data = '$id'";
    $result = mysqli_query($link,$query);
    if ($result){
        echo "<script>alert('sukses');window.location.assign(\"page.php?page=detailSekda&id={$row['id_data']}\")</script>";
    }
    else {
        echo "<script>alert('gagal');window.location.assign(\"page.php?page=detailSekda&id={$row['id_data']}\")</script>";
    }



    // $id = abs($_GET['id']);


//     $sql = "SELECT * FROM tm_detail_data  
//             inner join tm_data on tm_data.id_data= tm_detail_data.id_data
//             where tm_detail_data.id_detail_data = '$id'";
//     $result = mysqli_query($link,$sql);
//     $row = mysqli_fetch_assoc($result);


//         $anggaran = $row['data_sisa'];
//         $realisasi = $row['realisasi'];
//         $total_sisa_anggran = $anggaran - $realisasi;

//         $query = "UPDATE tm_data SET data_sisa = '$total_sisa_anggran' WHERE id_data = '$id'";
// 	    $result = mysqli_query($link,$query);
	
    
//         $query = "UPDATE tm_detail_data SET sisa_anggaran = '$total_sisa_anggran' WHERE id_detail_data = '$id'";
//         $result = mysqli_query($link,$query);
//         if ($result){
//             echo "<script>alert('sukses');window.location.assign(\"page.php?page=detailSekda&id={$row['id_data']}\")</script>";
//         }
//         else {
//             echo "<script>alert('gagal');window.location.assign(\"page.php?page=detailSekda&id={$row['id_data']}\")</script>";
//         }
        
   

	
?>
<!-- <div class="col-lg-12">
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
                          <input type="date" class="form-control" name="tgl_uraian" value="<?php echo $row['tgl_uraian'] ?>" style="width: 70%"  readonly="readonly"/>
                        </div>

                        <div class="form-group"><label class="col-sm-3 control-label"> Kode Rekening  </label>
                          <input type="text" class="form-control" name="kode_rek_uraian" value="<?php echo $row['kode_rek_uraian'] ?>" style="width: 70%" readonly="readonly" />
                        </div>

                        <div class="form-group"><label class="col-sm-3 control-label"> Anggaran  </label>
                          <input type="text" class="form-control" name="data_sisa" value="<?php echo $row['data_sisa'] ?>" style="width: 70%"  readonly="readonly"/>
                        </div>


                        <div class="form-group"><label class="col-sm-3 control-label">Uraian <span>*</span></label>
                          <input type="text" class="form-control" name="uraian"  style="width: 70%" value="<?php echo $row['uraian'] ?>" readonly="readonly"/>
                        </div>
                       
                       <div class="form-group"><label class="col-sm-3 control-label">Realisasi <span>*</span></label>
                          <input type="text" class="form-control" name="realisasi"  style="width: 70%" value="<?php echo $row['realisasi'] ?>" if(isset($_POST['kalkulasi'])){/>
                        </div>
                        
                        <div>
                            <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit" name="kalkulasi" style="margin-right: 35px;"><strong>Update Data</strong></button>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div> -->



<?php $kalkulasiDetailSekda = ob_get_clean();?>
