<?php
ob_start();

$queryBelanjaLangsung = mysqli_query($link,"SELECT  sum(total_anggaran)as jum from tm_data");
$resultBL = mysqli_fetch_array($queryBelanjaLangsung);  

$queryBTL = mysqli_query($link,"SELECT sum(total_anggaran)as jumBTL from tm_setda_btl");
$resultBTL = mysqli_fetch_array($queryBTL);  


//kepda query //
$queryBTL = mysqli_query($link,"SELECT sum(total_anggaran)as jumBTL from tm_kepda");
$resultBTL = mysqli_fetch_array($queryBTL); 

	
 
			
?>
<h1 class="text-center">
	Laporan Realisasi Anggaran Setda
</h1>

<table class="table">

	<h2 class="text-center">Belanja Langsung : Rp <?php 
		echo number_format($resultBL['jum']	);
	?></h2>
	<thead>
		<tr>
			<th>Belanja</th>
			<th>Total Anggaran</th>
			
			<th>Realisasi</th>
			<th>Sisa Anggaran</th>
			<th>(%)</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		//$query = "SELECT subbelanja,sum(total_anggaran) as hasil,realisasi as jumlahRealisasi FROM tm_detail_data INNER JOIN tm_data ON tm_data.id_data = tm_detail_data.id_data ";
		
		$query = "SELECT tm_data.tgl_update as tgl, tm_data.subbelanja,SUM(tm_data.total_anggaran) as totalAnggaran,totalRealisasi FROM tm_data
			LEFT  JOIN (
			   SELECT tm_data.id_data, SUM(tm_detail_data.realisasi) as totalRealisasi
			   FROM   tm_detail_data,tm_data
			    WHERE   tm_data.id_data=tm_detail_data.id_data 
			   GROUP  BY tm_data.subbelanja 
			   ) as pakai ON tm_data.id_data = pakai.id_data

			GROUP BY tm_data.subbelanja ";

		
			$result = mysqli_query($link,$query);
			
			
			if (mysqli_num_rows($result) > 0) {	
	
			while ($row = mysqli_fetch_array($result)) {

					$tgl = date('m');
					$tanggalTampil  = $row['tgl'];
					$subbelanja = $row['subbelanja'];
				    $jumlah_anggaran  = $row['totalAnggaran'];

					$realisasi = $row['totalRealisasi'];
					$total_realisasi = $jumlah_anggaran - $realisasi;
					//$jumlahPersen = $row['jumlahPersen'] ;
					$total_persen = ($realisasi / $jumlah_anggaran) * 100;


					if ($subbelanja == 1) {
						$subbelanja = "Belanja Barang dan Jasa";
					}
					if ($subbelanja == 2) {
						$subbelanja = "Belanja Modal";
					}
					if ($subbelanja == 3) {
						$subbelanja = "Belanja Pegawai";
					} 

					
			?>
				
						
					 
				
					<tr>
						<td> <?php echo $subbelanja.$tanggalTampil; ?>
						<td>Rp. <?php echo number_format($jumlah_anggaran) ; ?>
						
						<td>Rp. <?php echo number_format($realisasi); ?></td>
						<td>Rp. <?php echo number_format($total_realisasi); ?></td>
						<td> <?php echo substr($total_persen, 0,5); ?>%</td>
					</tr>
			
		<?php
				
				
			}
		} 
		?>
	</tbody>
</table>
<h1><?php echo $tanggalTampil	; ?></h1>
<table class="table">
	<h2 class="text-center">Belanja Tidak Langsung : Rp <?php echo number_format($resultBTL['jumBTL']	); ?></h2>
	<thead>
		<tr>
			<th>Belanja</th>
			<th>Total Anggaran</th>
			
			<th>Realisasi</th>
			<th>Sisa Anggaran</th>
			<th>(%)</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		//$query = "SELECT subbelanja,sum(total_anggaran) as hasil,realisasi as jumlahRealisasi FROM tm_detail_data INNER JOIN tm_data ON tm_data.id_data = tm_detail_data.id_data ";
		
		$sqlBTL = "SELECT tm_setda_btl.belanja_setda,sum(tm_setda_btl.total_anggaran) as totalBTL,sum(tm_setda_btl.realisasi) as jumRealisasi,sum(tm_setda_btl.sisa_anggaran) as jumAnggaran, sum(tm_setda_btl.persen) as jumPersen  FROM tm_setda_btl GROUP BY tm_setda_btl.belanja_setda ";

		
			$resultBelanjaTidakLangsung = mysqli_query($link,$sqlBTL);
			
			
			if (mysqli_num_rows($resultBelanjaTidakLangsung) > 0) {	
	
			while ($row = mysqli_fetch_array($resultBelanjaTidakLangsung)) {

					$belanja_setda = $row['belanja_setda'];
				    $jumlah_anggaran  = $row['totalBTL'];

					$realisasi = $row['jumRealisasi'];
					$jmlPersen = $row['jumPersen'];
					$jmlAnggaran = $row['jumAnggaran'];


					if ($belanja_setda == 1) {
						$belanja_setda = "Belanja Pegawai";
					}
				
			?>
		
					<tr>
						<td> <?php echo $belanja_setda; ?>
						<td>Rp. <?php echo number_format($jumlah_anggaran) ; ?>
						
						<td>Rp. <?php echo number_format($realisasi); ?></td>
						<td>Rp. <?php echo number_format($jmlAnggaran); ?></td>
						<td> <?php echo substr($jmlPersen, 0,4); ?>%</td>
					</tr>
		<?php

				}
		} 
		?>
	</tbody>
</table>




<h1 class="text-center">
	Laporan Realisasi Anggaran Kepda
</h1>
<table class="table">
	<h2 class="text-center">Belanja Tidak Langsung : Rp <?php echo number_format($resultBTL['jumBTL']	); ?></h2>
	<thead>
		<tr>
			<th>Belanja</th>
			<th>Total Anggaran</th>
			
			<th>Realisasi</th>
			<th>Sisa Anggaran</th>
			<th>(%)</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		//$query = "SELECT subbelanja,sum(total_anggaran) as hasil,realisasi as jumlahRealisasi FROM tm_detail_data INNER JOIN tm_data ON tm_data.id_data = tm_detail_data.id_data ";
		
		$sqlBTL = "SELECT tm_kepda.belanja_kepda,sum(tm_kepda.total_anggaran) as totalBTL,sum(tm_kepda.realisasi) as jumRealisasi,sum(tm_kepda.sisa_anggaran) as jumAnggaran, sum(tm_kepda.persen) as jumPersen  FROM tm_kepda GROUP BY tm_kepda.belanja_kepda ";

		
			$resultBelanjaTidakLangsung = mysqli_query($link,$sqlBTL);
			
			
			if (mysqli_num_rows($resultBelanjaTidakLangsung) > 0) {	
	
			while ($row = mysqli_fetch_array($resultBelanjaTidakLangsung)) {

					$belanja_kepda = $row['belanja_kepda'];
				    $jumlah_anggaran  = $row['totalBTL'];

					$realisasi = $row['jumRealisasi'];
					$jmlPersen = $row['jumPersen'];
					$jmlAnggaran = $row['jumAnggaran'];


					if ($belanja_kepda == 1) {
						$belanja_kepda = "Belanja Pegawai";
					}
					if ($belanja_kepda == 2) {
						$belanja_kepda = "Belanja Operasional";
					}
					 
			?>
		
					<tr>
						<td> <?php echo $belanja_kepda; ?>
						<td>Rp. <?php echo number_format($jumlah_anggaran) ; ?>
						
						<td>Rp. <?php echo number_format($realisasi); ?></td>
						<td>Rp. <?php echo number_format($jmlAnggaran); ?></td>
						<td> <?php echo substr($jmlPersen, 0,4); ?>%</td>
					</tr>
		<?php

				}
		} 
		?>
	</tbody>
</table>

<?php
$lra = ob_get_clean();
?>