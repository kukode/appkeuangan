<?php
ob_start();
$id = abs($_GET['id']);


if (isset($_POST['update'])){

    $subbelanja = $_POST['subbelanja'];
	  $bagian = $_POST['bagian'];
    $asisten = $_POST['asisten'];
    $id_program = $_POST['id_program'];
    $id_kegiatan = $_POST['id_kegiatan'];
    $total_anggaran = $_POST['total_anggaran'];
    $data_sisa = $_POST['data_sisa'];
    $tanggal = date('Y-m-d',strtotime($_POST['tgl_update']));
    

    //$total_persen = ($realisasi / 100) / ($anggaran / 100) * 100; 
    //$total_sisa_anggran = $anggaran - $realisasi;
        
		$query = "update tm_data set subbelanja='$subbelanja', bagian='$bagian',asisten='$asisten',tgl_update= '$tanggal',id_program='$id_program',id_kegiatan='$id_kegiatan',total_anggaran='$total_anggaran',data_sisa='$data_sisa' where tm_data.id_data = '$id'";
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
	$idProgram = $row['id_program'];
    $idKegiatan = $row['id_kegiatan'];
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
                        <select name="subbelanja" class="form-control" style="width: 70%">
                          <option value="1" <?php if($row['subbelanja'] == "1"){ echo "selected";} ?>>Belanja Barang dan Jasa</option>
                          <option value="2" <?php if($row['subbelanja'] == "2"){ echo "selected";} ?>>Belanja Modal</option>
                          <option value="3" <?php if($row['subbelanja'] == "3"){ echo "selected";} ?>>Belanja Pegawai</option>
                          
                        </select>
                      </div>

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
                            <option value="1" <?php if($row['asisten'] == "1"){ echo "selected";} ?> >ASISTEN PEMERINTAHAN</option>
                            <option value="2" <?php if($row['asisten'] == "2"){ echo "selected";} ?> >ASISTEN PEREKONOMIAN DAN PEMBANGUNAN</option>
                            <option value="3" <?php if($row['asisten'] == "3"){ echo "selected";} ?> >ASISTEN ADMINISTRASI</option>
                            
                          </select>
                        </div>
                        <div class="form-group"><label class="col-sm-3 control-label"> Tanggal Program </label>
                          <input type="date" class="form-control" name="tgl_update" value="<?php echo $row['tgl_update'] ?>" style="width: 70%"  />
                        </div>

                        <div class="form-group"><label class="col-sm-3 control-label">Nama Program</label>
                                        
                            <select class="form-control m-b" name="id_program" style="width: 70%;">
                                <?php 
                                   $queryProgram = "select * from tm_program order by nama_program";
                                   $resultProgram = mysqli_query($link, $queryProgram);
                                   while ($data = mysqli_fetch_assoc($resultProgram))
                                   {
                                    $idProg = $data['id_program'];
                                    $program_name = $data['nama_program'];
                                    if ($idProgram == $idProg)
                                    {
                                         $selected = "selected";
                                         print ("<option value=\"$idProg\""."$selected>$program_name</option>");
                                    }
                                    else {
                                        $selected = "";
                                        print ("<option value=\"$idProg\""."$selected>$program_name</option>");
                                    }
                                    
                                   }
                            ?>
                             
                            
                            </select>
                           
                        </div>

                        <div class="form-group"><label class="col-sm-3 control-label">Nama Kegiatan</label>
                                        
                            <select class="form-control m-b" name="id_kegiatan" style="width: 70%;">
                                <?php 
                                   $queryKegiatan = "select * from tm_kegiatan order by nama_kegiatan";
                                   $resultKegiatan = mysqli_query($link, $queryKegiatan);
                                   while ($data = mysqli_fetch_assoc($resultKegiatan))
                                   {
                                    $idKeg = $data['id_kegiatan'];
                                    $activity_name = $data['nama_kegiatan'];
                                    if ($idKegiatan == $idKeg)
                                    {
                                         $selected = "selected";
                                         print ("<option value=\"$idKeg\""."$selected>$activity_name</option>");
                                    }
                                    else {
                                        $selected = "";
                                        print ("<option value=\"$idKeg\""."$selected>$activity_name</option>");
                                    }
                                    
                                   }
                            ?>
                             
                            
                            </select>
                           
                        </div>

                        <div class="form-group"><label class="col-sm-3 control-label">Total Anggaran <span>*</span></label>
                          <input type="text" class="form-control" name="total_anggaran"   style="width: 70%" value="<?php echo $row['total_anggaran'] ?>" />
                        </div>
                        <div class="form-group"><label class="col-sm-3 control-label">Sisa Anggaran <span>*</span></label>
                          <input type="text" class="form-control" name="data_sisa"   style="width: 70%" value="<?php echo $row['data_sisa'] ?>" />
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
