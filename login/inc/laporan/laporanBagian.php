<?php 
ob_start();
include 'mpdf/mpdf.php';
?>
<form method="post">
<div class="row">
	<div class="form-group">
	 
	  <select name="bagian" class="form-control" style="width: 30%">
	  	<option value="1">BAGIAN UMUM</option>
	  	<option value="2">BAGIAN KEUANGAN</option>
	  	<option value="3">BAGIAN KERJASAMA</option>
	  	<option value="4">BAGIAN PERUNDANG - UNDANGAN</option>
	  	<option value="5">BAGIAN ADMINISTRASI PEMERINTAHAN</option>
	  	<option value="6">BAGIAN KESEJAHTERAAN RAKYAT</option>
	  	<option value="7">BAGIAN PEREKONOMIAN</option>
	  	<option value="8">BAGIAN ORGANSASI</option>
	  	<option value="9">BAGIAN PROGDALBANG</option>
	  	<option value="10">BAGIAN PENGADAAN BARANG/JASA</option>
	  	<option value="11">BAGIAN BANTUAN HUKUM</option>
	  	
	  </select>
	  <input type="submit" name="cari" value="Cari Bagian" class="btn btn-primary">
	  <input type="submit" name="print" value="Cetak Laporan" class="btn btn-success">
	</div>
</div>
<div class="row">
<?php 
    if (isset($_POST['cari'])) {

    ?>
    <table class="table table-striped table-bordered table-hover dataTables-example">
    	<thead>
    		<tr>
    		   <th>Tanggal</th>
	           <th>Nama Program</th>
               <th>Nama Kegiatan</th>
	           <th>Total Anggaran</th>
	          
	          
    		</tr>
    	</thead>
    	<tbody>
    		<?php 
	          	$searchBagian = $_POST['bagian'];
  		

				$query = "select * from tm_data 
                inner join tm_program on tm_program.id_program = tm_data.id_program	
                inner join tm_kegiatan on tm_kegiatan.id_kegiatan = tm_data.id_kegiatan
				where tm_data.bagian like '%$searchBagian%' 
				order by tm_data.tgl_sistem desc";

				$result = mysqli_query($link, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while ($row = mysqli_fetch_array($result))
					{
						$tanggal = date('d-m-Y' , strtotime($row['tanggal']));
						

						

	          ?>
	          	<tr>
				<td><?php echo $row['tgl_update']?></td>
			   	<td><?php echo $row['nama_program']?></td>
                <td><?php echo $row['nama_kegiatan']?></td>
			   	<td><?php echo "Rp. " . number_format($row['total_anggaran'],2) ?></td>
			  
			   
       			
				</tr>
	          <?php 
		          	}
				}
	          ?>
    	</tbody>
    </table>
   <?php 
   	 }

   ?>
<?php 

if (isset($_POST['print']))
{
    //echo "<script>alert('test');</script>";
            
    $searchBagian = $_POST['bagian'];
    $querys = "select * from tm_data 	
    inner join tm_program on tm_program.id_program = tm_data.id_program
				where tm_data.bagian like '%$searchBagian%' ";
    $results = mysqli_query($link,$querys);
    $no = 1;
    
    if (mysqli_num_rows($results) > 0)
    {
        while ($datas = mysqli_fetch_array($results))
        {
            
           $bagian = $datas['bagian'];	
           $asisten = $datas['asisten'];
           $tanggal = $datas['tgl_update'];
           $nama_program = strtoupper($datas['nama_program']);
           $total_anggaran = "Rp. " . number_format($datas['total_anggaran'],2);
           
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
            
            
            
            
            //$nomor = $no++;
            $viewInvoice .= "
				
				<tr>
				
				<td>$tanggal</td>
				<td>$nama_program</td>
				<td>$total_anggaran</td>
				
                </tr>
                
				
				
				";
            
            
        }
    }
    
    
    
    $print_content .= "<p id='logo'><img src=\"img/logo.png\"/ style=\"margin:0 auto;\"></p>";

    $print_content .="<h3>Laporan $bagian</h3>";
    
    $print_content .= "<table id='dataBagian'>
                		<thead id='data-center'>
                    		<tr>
                        	  
					           <th>Tanggal</th>
					           <th id='nama-prog'>Nama Program</th>
					           <th>Total Anggaran</th>
					           
                        		
                    		</tr>
                		</thead>
                		<tbody id='data-center'>
	                		
	                        	$viewInvoice;
	                       
                		</tbody>
                		
                		</table>";
    
                       
        
        
                    		
		$mpdf = new mPDF('c','A4','','',10,20,5,25,0,0);
		$mpdf->SetDisplayMode('fullpage');
		$mpdf->list_indent_first_level = 0;
		//$mpdf->SetHtmlHeader('');
		//load syle
		$css = file_get_contents('css/pdf/pdf.css');
		$mpdf->WriteHTML($css,1);
		$mpdf->WriteHTML($print_content,2);
		$mpdf->Output('invoice.pdf','I');
}

?>
</div>
</form>
<?php 
$laporanBagian = ob_get_clean();
?>