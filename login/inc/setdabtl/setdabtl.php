<?php 
ob_start();


?>
<div class="ibox-content">
	<a href="?page=addsetdabtl">
	<button class="btn btn-success dim " type="button" ><i class="fa fa-plus"></i> Data Setda BTL</button>
	</a>
	
</div>

<div class="ibox-content">
     <div class="table-responsive">
		 <table class="table table-striped table-bordered table-hover dataTables-example" >
		      <thead>
		         <tr>
		           <th>Sub Belanja</th>
		           <th>Program</th>
	         	   <th>Tanggal</th>
		           <th>Nama Kegiatan</th>
		           <th>Total Anggaran</th>
		           <th>Realisasi</th>
		           <th>Sisa Anggaran</th>
		           <th>Persen</th>
		           
		           <th>Action</th>
		          
		          </tr>
		       </thead>
		       <tbody>
		          <?php 
		          	$query = "select * from tm_setda_btl ";
					$result = mysqli_query($link, $query);
					if(mysqli_num_rows($result) > 0)
					{
						while ($row = mysqli_fetch_array($result))
						{
							$tanggal = date('d-m-Y' , strtotime($row['tgl_program']));
							$subbelanja =  $row['belanja_setda'];
							$kode_program = $row['kode_program'];
							$nama_kegiatan =  $row['nama_kegiatan'];
							$total_anggaran = $row['total_anggaran'];
							$realisasi = $row['realisasi'];
							$sisa_anggaran = $row['sisa_anggaran'];
							$persen = $row['persen'];

							if ($subbelanja == 1) {
								$subbelanja = "Belanja Pegawai";
							}

							if ($kode_program == 1) {
								$kode_program = "Gaji dan Tunjangan";
							}

							if ($kode_program == 2) {
								$kode_program = "Tambahan Penghasilan PNS";
							}
							
							

		          ?>
		          	<tr>
		          	<td><?php echo $subbelanja ?></td>
		          	<td><?php echo $kode_program ?></td>
		          	<td><?php echo $tanggal ?></td>
					<td><?php echo $nama_kegiatan ?></td>
					<td>Rp. <?php echo number_format($total_anggaran,2) ?></td>
					<td>Rp. <?php echo number_format($realisasi,2) ?></td>
				   	<td>Rp. <?php echo number_format($sisa_anggaran,2) ?></td>
				   	<td><?php echo substr($persen,0,4) ?>%</td>
				   
				   
				   
           			<td><a href="?page=editsetdabtl&id=<?php echo $row['id_setda_btl'] ?>" class="btn btn-warning">Edit</a>
					
					<a href="?page=hapussetdabtl&id=<?php echo $row['id_setda_btl'] ?>" class="btn btn-primary">Delete</a>
					</td>
					
					</tr>
		          <?php 
			          	}
					}
		          ?>


		
		
		       </tbody>
		  </table>
      </div>
</div>
<?php
$datasetdabtl = ob_get_clean();
?>