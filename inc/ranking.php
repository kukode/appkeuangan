<?php
ob_start();
?>
<h1 class="text-center">Ranking</h1>

<form method="post">
	<div class="col-md-4 text-center" style="margin:0 auto;">
		<div class="form-group">
		
			<select name="bulan" class="form-control text-center" >
				<option value="01">Januari</option>
				<option value="02">Februari</option>
				<option value="03">Maret</option>
				<option value="04">April</option>
				<option value="05">Mei</option>
				<option value="06">Juni</option>
				<option value="07">Juli</option>
				<option value="08">Agustus</option>
				<option value="09">September</option>
				<option value="10">Oktober</option>
				<option value="12">November</option>
				<option value="12">Desember</option>
			</select>
			
		</div>
		<div class="form-group">
			<select name="tahun" class="form-control text-center" >
				<!-- 	<option value="2017">2017</option> -->
				<option value="2018">2018</option>
				<option value="2019">2019</option>
				<option value="2020">2020</option>
				
			</select>
		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-primary" name="cari" value="cari">
		</div>
	</div>
</form>

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
		
		if(isset($_POST['cari'])){
			$bulan = $_POST['bulan'];
			$tahun = $_POST['tahun'];
			$queryPerMonthYear = mysqli_query($link,"SET @ranking=0;");
			$queryPerMonthYear = "SELECT @ranking:=@ranking+1 AS ranking,bagian,sum(persen) / 100 AS jumlahPersen FROM tm_detail_data 
						INNER JOIN tm_data ON tm_data.id_data = tm_detail_data.id_data
						where  month(tgl_uraian)='$bulan' and year(tgl_uraian) = '$tahun'
						GROUP BY tm_data.bagian
						ORDER BY jumlahPersen DESC";
			$resultPerMonthYear = mysqli_query($link,$queryPerMonthYear);
			$no = 1;
			
			if (mysqli_num_rows($resultPerMonthYear) > 0) {	
	
			while ($row = mysqli_fetch_array($resultPerMonthYear)) {

					
					$bagian = $row['bagian'];

					$totalPersen = $row['jumlahPersen']  ;
					// echo $totalPersen;
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
		}else {
			$query = mysqli_query($link,"SET @ranking=0;");
			$query = "SELECT @ranking:=@ranking+1 AS ranking,bagian,sum(persen) / 100 AS jumlahPersen FROM tm_detail_data 
						INNER JOIN tm_data ON tm_data.id_data = tm_detail_data.id_data
						where  MONTH(tgl_uraian) = MONTH(CURRENT_DATE()) 
						GROUP BY tm_data.bagian
						ORDER BY jumlahPersen DESC";
			$result = mysqli_query($link,$query);
			$no = 1;
			
			if (mysqli_num_rows($result) > 0) {	
	
			while ($row = mysqli_fetch_array($result)) {

					
					$bagian = $row['bagian'];

					$totalPersen = $row['jumlahPersen']  ;
					// echo $totalPersen;
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
		}
		?>
	</tbody>
</table>
<?php
$ranking = ob_get_clean();
?>