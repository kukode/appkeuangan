<?php 
ob_start();
?>

<h2 class="text-center">Belanja Tidak Langsung Setda</h2>


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
<table border="1" id="bagian" class="display" width="100%">
	<thead>
		<tr>
		<th>Sub belanja</th>
		
		<th>Total Anggaran</th>
		<th> Realisasi</th>
		<th>Sisa Anggaran</th>
		<th>Total Persen</th>
	</tr>
	</thead>
	<tbody>
		<?php 
			if (isset($_POST['cari'])) {
			$bulan = $_POST['bulan'];
			$tahun = $_POST['tahun'];
			$sqlBTL = "SELECT tm_setda_btl.belanja_setda,sum(tm_setda_btl.total_anggaran) as totalBTL,sum(tm_setda_btl.realisasi) as jumRealisasi,sum(tm_setda_btl.sisa_anggaran) as jumAnggaran, sum(tm_setda_btl.persen) as jumPersen  FROM tm_setda_btl 
			where month(tgl_program)='$bulan' and year(tgl_program) = '$tahun'
			GROUP BY tm_setda_btl.belanja_setda
			
			
			";
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
		}
		?>
	</tbody>

</table>


<?php 

$lrasearchbtl = ob_get_clean();
?>