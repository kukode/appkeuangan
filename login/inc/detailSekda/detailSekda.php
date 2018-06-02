<?php
ob_start();
include 'mpdf/mpdf.php';
include 'fungsi_terbilang.php';
$id = abs($_GET['id']);
$sql = "select * from tm_data 
        inner join tm_program on tm_program.id_program = tm_data.id_program
        inner join tm_kegiatan on tm_kegiatan.id_kegiatan = tm_data.id_kegiatan
         where  tm_data.id_data = '$id'";

$result = mysqli_query($link,$sql);
while ($row = mysqli_fetch_array($result)){
    $tanggal = $row['tgl_update'];
    $nama_program = strtoupper($row['nama_program']);
    $nama_kegiatan = strtoupper($row['nama_kegiatan']);
    $total_anggaran = "Rp. " . number_format($row['total_anggaran'],2);
    	
    $bagian =  $row['bagian'];
    $asisten =  $row['asisten'];
	
    if ($bagian == 1) {
        $bagian = "Bagian Umum";
    }
    if ($bagian == 2) {
        $bagian =  "Bagian Keuangan";
    }
    if ($bagian == 3) {
        $bagian = "Bagian Kerjasama";
    }
    if ($bagian == 4) {
        $bagian = "Bagian Perundang - Undangan";
    }
    if ($bagian == 5) {
        $bagian = "Bagian Administrasi Pemerintahan";
    }
    if ($bagian == 6) {
        $bagian = "Bagian Kesejahteraan Rakyat";
    }
    if ($bagian == 7) {
        $bagian = "Bagian Perekenomian";
    }
    if ($bagian == 8) {
        $bagian = "Bagian Organisasi";
    }
    if ($bagian == 9) {
        $bagian = "Bagian Progdalbang";
    }
    if ($bagian == 10) {
        $bagian = "Bagian Pengadaan Barang/Jasa";
    }
    if ($bagian == 11) {
        $bagian = "Bagian Bantuan Hukum";
    }
    if ($asisten == 1) {
        $asisten = "Asisten Pemerintahan";
    }
    if ($asisten == 2) {
        $asisten = "Asisten Perekenomian dan Pembangunan";
    }
    if ($asisten == 3) {
        $asisten = "Asisten Administrasi";
    }

	
	

if (isset($_POST['simpan']))
{
	$id = abs($_GET['id']);
	$tgl_uraian = date('Y-m-d',strtotime($_POST['tgl_uraian']));
    $kode_rek_uraian = $_POST['kode_rek_uraian'];
    $uraian = $_POST['uraian'];
    $anggaran = $_POST['anggaran'];
    $realisasi = $_POST['realisasi'];

    $total_persen = ($realisasi / 100) / ($anggaran / 100) * 100; 
    $total_sisa_anggran = $anggaran - $realisasi;
	
	
	$query = "insert into tm_detail_data(id_data,tgl_uraian,kode_rek_uraian,uraian,anggaran,realisasi,persen,sisa_anggaran)
	values('$id','$tgl_uraian','$kode_rek_uraian','$uraian','$anggaran','$realisasi','$total_persen','$total_sisa_anggran')";
	$result = mysqli_query($link, $query);
	if ($result){
		echo "<script>alert('sukses');window.location.assign(\"page.php?page=detailSekda&id={$row['id_data']}\")</script>";
	}
	else {
		echo "<script>alert('gagal');window.location.assign(\"page.php?page=detailSekda&id={$row['id_data']}\")</script>";
	}
	
}

else {
	$query = "select * from tm_detail_data where tm_detail_data.id_data = '$id'";
	$result = mysqli_query($link,$query);
	if (mysqli_num_rows($result) > 0)
	{
		while ($rows = mysqli_fetch_array($result)){
			$tanggal = date('d-m-Y', strtotime($rows['tgl_uraian']));
            $anggaran = "Rp. ". number_format($rows['anggaran'],2);
            $realisasi = "Rp. ". number_format($rows['realisasi'],2);
            $sisa_anggaran  = "Rp. ". number_format($rows['sisa_anggaran'],2);
            $persen = substr($rows['persen'],0,4);
			$v .= 	"<tr>
			
			<td>{$tanggal}</td>
			<td>{$rows['uraian']}</td>
            <td>{$anggaran}</td>
            <td>{$realisasi}</td>
            <td>{$persen}%</td>
            <td>{$sisa_anggaran}</td>
            <td>
			<a href=?page=editDetailSekda&id={$rows['id_detail_data']} ><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></a>
            <a href=?page=hapusDetailSekda&id={$rows['id_detail_data']} ><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a>
			
			</td>
			
			</tr>";
		}
	}
}
if (isset($_POST['print']))
{
    //echo "<script>alert('test');</script>";
            
    
    $querys = "select * from tm_detail_data
            inner join tm_data on tm_data.id_data = tm_detail_data.id_data
            inner join tm_program on tm_program.id_program = tm_data.id_program 
            inner join tm_kegiatan on tm_kegiatan.id_kegiatan = tm_data.id_kegiatan
            where tm_detail_data.id_data = '$id' ";
   
    $results = mysqli_query($link,$querys);
    $no = 1;
    
    if (mysqli_num_rows($results) > 0)
    {
        while ($datas = mysqli_fetch_array($results))
        {
            
           $bagian = $datas['bagian'];  
           $asisten = $datas['asisten'];
           $tgl_update = $datas['tgl_update'];
           
           

           $kode_rek_uraian = $datas['kode_rek_uraian'];
           $tgl_uraian = $datas['tgl_uraian'];
           $uraian = $datas['uraian'];
           $anggaran = "Rp. " . number_format($datas['anggaran'],2);
           $realisasi = "Rp. " . number_format($datas['realisasi'],2);
           $persen = substr($datas['persen'], 0,4);
           $sisa_anggaran = "Rp. " . number_format($datas['sisa_anggaran'],2);
           
           if ($bagian == 1) {
                $bagian = "Bagian Umum";
            }
            if ($bagian == 2) {
                $bagian =  "BAGIAN Keuangan";
            }
            if ($bagian == 3) {
                $bagian = "Bagian Kerjasama";
            }
            if ($bagian == 4) {
                $bagian = "Bagian Perundang - Undangan";
            }
            if ($bagian == 5) {
                $bagian = "Bagian Administrasi Pemerintahan";
            }
            if ($bagian == 6) {
                $bagian = "Bagian Kesejahteraan Rakyat";
            }
            if ($bagian == 7) {
                $bagian = "Bagian Perekenomian";
            }
            if ($bagian == 8) {
                $bagian = "Bagian Organisasi";
            }
            if ($bagian == 9) {
                $bagian = "Bagian Progdalbang";
            }
            if ($bagian == 10) {
                $bagian = "Bagian Pengadaan Barang/Jasa";
            }
            if ($bagian == 11) {
                $bagian = "Bagian Bantuan Hukum";
            }
            
            $viewData .= "<tr>
                    <td>{$kode_rek_uraian}</td> 
                    <td>{$tgl_uraian}</td>
                    <td>{$uraian}</td>
                    <td>{$anggaran}</td>
                    <td>{$realisasi}</td>
                    <td>{$persen}%</td>
                    <td>{$sisa_anggaran}</td>     
                </tr>";    
            
        }
    }
    
    
    
    $print_content .= "<p id='logo'><img src=\"img/logo.png\"/ style=\"margin:0 auto;\"></p>";

    $print_content .="<h3>Laporan $bagian</h3>";
    
    
    $print_content .= "<div>Tanggal :</div>";
    $print_content .= "<div>{$tanggal}</div>";
    $print_content .= "<div>Nama Program :</div>";
    $print_content .= "<div>{$nama_program}</div>";
    $print_content .= "<div>Nama Kegiatan :</div>";
    $print_content .= "<div>{$nama_kegiatan}</div>";
    $print_content .= "<div>Total Anggaran :</div>";
    $print_content .= "<div>{$total_anggaran}</div>";  

    $print_content .= "<p>Rincian Anggaran :</p>";
    $print_content .= "<table id='data'>";
    $print_content .= "<tr>";
    $print_content .= "<th>Kode Rekening</th>";
    $print_content .= "<th>Tanggal</th>";
    $print_content .= "<th>Uraian</th>";
    $print_content .= "<th>Anggaran</th>";
    $print_content .= "<th>Realisasi</th>";
    $print_content .= "<th>%</th>";
    $print_content .= "<th>Sisa Anggaran</th>";
    $print_content .= "</tr>";

    $print_content .=  $viewData;
             

    $print_content .= "</table>";

        
                            
        $mpdf = new mPDF('c','A4','','',10,20,5,25,0,0);
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->list_indent_first_level = 0;
        //$mpdf->SetHtmlHeader('');
        //load syle
        $css = file_get_contents('css/pdf/pdf.css');
        $mpdf->WriteHTML($css,1);
        $mpdf->WriteHTML($print_content,2);
        $mpdf->Output('Laporan.pdf','I');
}
?>
<div class="ibox float-e-margins">
   <div class="ibox-title">
   		<a href="?page=dataSekda" style="color:#ed1c24"><h2 class="pull-right"><i class="fa fa-window-close" aria-hidden="true"></i></h2></a>
		<h2 class="text-left"><b>Data <?php echo $bagian; ?></b></h2>
		<h5 class="text-center"><?php echo $asisten; ?></h5>
		
		<br>
	</div>
	<div class="ibox-content">
		<form method="post">
		<button class="btn btn-primary pull-right" type="submit" name="print"> <i class="fa fa-print"></i> Print Rincian Anggaran</button>
		</form>
		<table class="table table-hover" >
			<tbody >
              
              <tr style="border: none;">
                <td><b>Tanggal Anggaran</b></td>
                <td>:</td>
                <td><?php echo $row['tgl_update'];?></td>
              </tr>  

		      <tr style="border: none;">
		        <td><b>Nama Program</b></td>
		        <td>:</td>
		        <td><?php echo $nama_program;?></td>
		      </tr>
		      <tr style="border: none;">
                <td><b>Nama Kegiatan</b></td>
                <td>:</td>
                <td><?php echo $row['nama_kegiatan'];?></td>
              </tr>
		      <tr>
		        <td><b>Total Anggaran</b></td>
		        <td>:</td>
		        <td><?php echo $total_anggaran?></td>
		      </tr>
		      
		      </tbody>
		</table>



</div>
</div>

<div class="container">
<form method="post">

 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"> + Tambah  Tagihan</button>
 
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body">
        <label class=" control-label"> Tanggal Kegiatan <span>*</span></label>
          <input type="date" class="form-control" name="tgl_uraian" placeholder="Masukan  Tanggal" required="required"  />
      <label class="control-label">Kode Rekening :</label>
       <input type="text" class="form-control" name="kode_rek_uraian">
       <label class="control-label">Uraian :</label>
       <input type="text" class="form-control" name="uraian">
        <label class="control-label">Anggaran :</label>
       <input type="text" class="form-control" name="anggaran" value="<?php echo $row['total_anggaran'] ?>" readonly="readonly">
        <label class="control-label">Realisasi :</label>
       <input type="text" class="form-control" name="realisasi">
       
      
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default" name="simpan">Simpan</button>
      </div>
    </div>

  </div>
</div>

</form>
</div>
<br>
<div class="row">
	 <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example" >
            <thead>
            <tr>
           
            <th>Tanggal</th>
             <th>Uraian</th>
             <th>Anggaran</th>
             <th>Realisasi</th>
             <th>%</th>
             <th>Sisa Anggaran</th>
             <th>Action</th>
             
            </tr>
            </thead>
            <tbody>
           		<?php echo $v;?>
            </table>
        </div>
</div>

            
<?php 
}
?>
<?php 
$detailSekda = ob_get_clean();
?>