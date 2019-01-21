<?php
ob_start();
?>


<section class="g-mb-150 g-mt-50">

	<h1 class="text-center">Asisten Administrasi</h1>
	<table id="asisten"  class="display" width="100%">
	    <thead>
	        <tr class="text-center">
	        	<th style="background-color: #47d147;color: #fff;">Bagian</th>
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
						where tm_data.asisten = 3";
				$result = mysqli_query($link,$query);
				if (mysqli_num_rows($result) > 0) {
					while ($data = mysqli_fetch_array($result)) {
					$anggaran = number_format($data['total_anggaran']);
					$bagian = $data['bagian'];

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
	        	<td><?php echo $bagian ; ?></td>
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
$asmin = ob_get_clean();
?>