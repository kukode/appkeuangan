<?php
ob_start();
$queryTotal = mysqli_query($link,"SELECT SUM(total_anggaran) as jumanggaran FROM `tm_data` where tm_data.bagian = 8");
$resultTotal = mysqli_fetch_array($queryTotal);
?>

<h1 class="text-center">Bagian Organisasi</h1>
<h3 class="text-center">Total : Rp. <?php echo number_format($resultTotal['jumanggaran'],2);  ?></h3>
<section class="g-mb-150 g-mt-50">
	<table id="bagian" class="display" width="100%">
	    <thead>
	        <tr class="text-center">
	            <th style="background-color: #47d147;color: #fff;">Program</th>
	            <th style="background-color: #ffad33;color: #fff;">Kegiatan</th>
	            <th style="background-color: #444;color: #fff;">Total Anggaran</th>
	        </tr>
	    </thead>
	    <tbody>
	    	<?php 

				$query = "select * from tm_data
						inner join tm_program on tm_program.id_program = tm_data.id_program
						inner join tm_kegiatan on tm_kegiatan.id_kegiatan = tm_data.id_kegiatan
						where tm_data.bagian = 8";
				$result = mysqli_query($link,$query);
				if (mysqli_num_rows($result) > 0) {
					while ($data = mysqli_fetch_array($result)) {
					$anggaran = number_format($data['total_anggaran']);

	    	?>
	        <tr>
	            <td><?php echo $data['nama_program'] ; ?></td>
	            <td><a href="?page=detailAnggaran&id=<?php echo $data['id_data'] ?>" style="color:blue;"><?php echo $data['nama_kegiatan'] ; ?></a></td>
	            <td>Rp. <?php echo str_replace(',', '.', $anggaran) ; ?></td>
	        </tr>
	        
	        <?php
	        		}
				}

	        ?>
	    </tbody>
	</table>
</section>
<?php
$organisasi = ob_get_clean();
?>