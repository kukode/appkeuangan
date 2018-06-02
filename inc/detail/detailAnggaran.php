<?php
ob_start();


$id = abs($_GET['id']);
$query = "select * from tm_data 
        inner join tm_program on tm_program.id_program = tm_data.id_program
        inner join tm_kegiatan on tm_kegiatan.id_kegiatan = tm_data.id_kegiatan
         where  tm_data.id_data = '$id'";

		$result = mysqli_query($link,$query);
		while ($row = mysqli_fetch_array($result)){
			
			$nama_program = strtoupper($row['nama_program']);
			$total_anggaran = "Rp. ". number_format($row['total_anggaran'],2);
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
?>
<section class="g-mt-50 g-mb-30">
   	<div class="ibox-title">
   		
		<h2 class="text-center"><b>Data <?php echo $bagian; ?></b></h2>
	</div>
	<div class="ibox-content">
		<form method="post">
		
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
</section>

<section class="g-mt-50 g-mb-30">
	<h2 class="text-center">Rincian Kegiatan</h2>
	<!-- Table Schedule -->
	<div class="table-responsive">
	  <table class="table table-bordered table-hover table-dark u-table--v2 text-center text-uppercase g-col-border-side-0">
	    <thead>
	      <tr class="g-bg-primary g-col-border-top-0">
	        <th class="g-brd-white-opacity-0_1">Tanggal</th>
	        <th class="g-brd-white-opacity-0_1">Uraian</th>
	        <th class="g-brd-white-opacity-0_1">Anggaran</th>
	        <th class="g-brd-white-opacity-0_1">Realisasi</th>
	        <th class="g-brd-white-opacity-0_1">%</th>
	        <th class="g-brd-white-opacity-0_1">Sisa Anggaran</th>
	       
	      </tr>
	    </thead>
	    <?php
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
					
			
	    ?>
	    <tbody class="g-font-size-12 g-color-white-opacity-0_5 g-font-weight-600">
	      <tr class="g-color-white-opacity-0_8">
	        <th class="g-brd-white-opacity-0_1" scope="row"><?php echo $tanggal;?> </th>
	        <td class="g-brd-white-opacity-0_1"><?php echo $rows['uraian'];?></td>
	        <td class="g-brd-white-opacity-0_1"><?php echo $anggaran;?></td>
	        <td class="g-brd-white-opacity-0_1"><?php echo $realisasi;?></td>
	        <td class="g-brd-white-opacity-0_1"><?php echo $persen;?>%</td>
	        <td class="g-brd-white-opacity-0_1"><?php echo $sisa_anggaran;?></td>
	        
	      </tr>
	      <?php
	      		}

			}
			else {
	      			echo "<tr><td>Belum ada data</td></tr>";
	      		}
	      ?>
	    </tbody>
	  </table>
	</div>
	<!-- End Table Schedule -->
</section>
<?php
}
$detailAnggaran = ob_get_clean();
?>