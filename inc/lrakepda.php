<?php 
ob_start();


?>
<h2 class="text-center">Belanja Tidak Langsung Kepda</h2>


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
			$sqlBTL = "SELECT tm_kepda.belanja_kepda,sum(tm_kepda.total_anggaran) as totalBTL,sum(tm_kepda.realisasi) as jumRealisasi,sum(tm_kepda.sisa_anggaran) as jumAnggaran, sum(tm_kepda.persen) as jumPersen  FROM tm_kepda 
			where month(tgl_program)='$bulan'
			GROUP BY tm_kepda.belanja_kepda
			
			
			";
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
		}
		?>
	</tbody>

</table>
<?php 
$lrakepda = ob_get_clean();
?>