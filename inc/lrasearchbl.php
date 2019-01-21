<?php 
ob_start();
?>

<h2 class="text-center">Belanja Langsung Setda</h2>


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
			$q = "select tm_data.subbelanja,tm_data.tgl_update,sum(tm_data.total_anggaran) as tAnggaran,tRealisasi from tm_data 
				LEFT  JOIN (
					   SELECT tm_data.id_data, SUM(tm_detail_data.realisasi) as tRealisasi
					   FROM   tm_detail_data,tm_data
					    WHERE   tm_data.id_data=tm_detail_data.id_data and month(tgl_update)='$bulan' and year(tgl_update) = '$tahun'
					   GROUP  BY tm_data.subbelanja 
					   ) as pakai ON tm_data.id_data = pakai.id_data
			where month(tgl_update)='$bulan' and year(tgl_update) = '$tahun'
			
			group by tm_data.subbelanja";
			$rs = mysqli_query($link,$q);
			while ($r = mysqli_fetch_array($rs)) {

							$subbelanja = $r['subbelanja'];
						    $jumlah_anggaran  = $r['tAnggaran'];

							$realisasi = $r['tRealisasi'];
							$total_realisasi = $jumlah_anggaran - $realisasi;
							//$hasilRealisasi = number_format($total_realisasi);
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
				<td><?php echo $subbelanja?></td>
				<td>Rp. <?php echo number_format($jumlah_anggaran,2)?></td>
				<td>Rp. <?php echo number_format($realisasi,2)?></td>
				<td>Rp. <?php echo number_format($total_realisasi,2)?></td>
				<td><?php echo substr($total_persen,0,5)?>%</td>
			</tr>
		<?php 
		}
}
		?>
	</tbody>

</table>


<?php 

$lrasearchbl = ob_get_clean();
?>