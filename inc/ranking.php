<?php
ob_start();
?>
<h1 class="text-center">Ranking</h1>

<table class="table">
	<thead>
		<tr>
			<th>Ranking</th>
			<th>Bagian</th>
			<th>Persen</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			
			// $query = "SELECT bagian, SUM(persen/100) as jumlahPersen FROM tm_detail_data
			// 			INNER JOIN tm_data ON tm_data.id_data = tm_detail_data.id_data
			// 			GROUP BY tm_data.bagian
			// 			ORDER BY tm_detail_data.persen desc ";


			// $query = "SELECT  bagian,sum(persen)s as jumlahPersen FROM tm_detail_data
			// 			INNER JOIN tm_data ON tm_data.id_data = tm_detail_data.id_data
			// 			GROUP BY tm_data.bagian
			// 			ORDER BY tm_detail_data.persen desc";
			$query = mysqli_query($link,"SET @ranking=0;");
			$query = "SELECT @ranking:=@ranking+1 AS ranking,bagian,sum(persen) AS jumlahPersen FROM tm_detail_data 
						INNER JOIN tm_data ON tm_data.id_data = tm_detail_data.id_data
						GROUP BY tm_data.bagian
						ORDER BY jumlahPersen DESC";
			$result = mysqli_query($link,$query);
			$no = 1;
			
			if (mysqli_num_rows($result) > 0) {	
	
			while ($row = mysqli_fetch_array($result)) {

					
					$bagian = $row['bagian'];

					$totalPersen = $row['jumlahPersen'] /100 ;
					//$data[] = $totalPersen;
					//echo "<pre>". var_dump($data) . "</pre>";
					
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
			
		?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $bagian; ?></td>
			<td><?php echo substr($totalPersen, 0,4)?>%</td>
		</tr>
		<?php

			}
			}
		?>
	</tbody>
</table>
<?php
$ranking = ob_get_clean();
?>