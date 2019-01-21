<?php 
ob_start();


?>
<div class="ibox-content">
	<a href="?page=addKepda">
	<button class="btn btn-success dim " type="button" ><i class="fa fa-plus"></i> Data Kepda</button>
	</a>
	
</div>

<div class="ibox-content">
     <div class="table-responsive">
		 <table class="table table-striped table-bordered table-hover dataTables-example" >
		      <thead>
		         <tr>
		           <th>Sub Belanja</th>
	         	   <th>Tanggal</th>
		           <th>Nama Program</th>
		           <th>Total Anggaran</th>
		           <th>Realisasi</th>
		           <th>Sisa Anggaran</th>
		           <th>Persen</th>
		           
		           <th>Action</th>
		          
		          </tr>
		       </thead>
		       <tbody>
		          <?php 
		          	$query = "select * from tm_kepda ";
					$result = mysqli_query($link, $query);
					if(mysqli_num_rows($result) > 0)
					{
						while ($row = mysqli_fetch_array($result))
						{
							$tanggal = date('d-m-Y' , strtotime($row['tgl_program']));
							$subbelanja =  $row['belanja_kepda'];
							$nama_kegiatan =  $row['nama_kegiatan'];
							$total_anggaran = $row['total_anggaran'];
							$realisasi = $row['realisasi'];
							$sisa_anggaran = $row['sisa_anggaran'];
							$persen = $row['persen'];

							if ($subbelanja == 1) {
								$subbelanja = "Belanja Pegawai";
							}
							if ($subbelanja == 2) {
								$subbelanja =  "Belanja Operasional";
							}
							

		          ?>
		          	<tr>
		          	<td><?php echo $subbelanja ?></td>
		          	<td><?php echo $tanggal ?></td>
					<td><?php echo $nama_kegiatan ?></td>
					<td>Rp. <?php echo number_format($total_anggaran,2) ?></td>
					<td>Rp. <?php echo number_format($realisasi,2) ?></td>
				   	<td>Rp. <?php echo number_format($sisa_anggaran,2) ?></td>
				   	<td><?php echo substr($persen,0,4) ?>%</td>
				   
				   
				   
           			<td><a href="?page=editKepda&id=<?php echo $row['id_kepda'] ?>" class="btn btn-warning">Edit</a>
					
					<a href="?page=hapusKepda&id=<?php echo $row['id_kepda'] ?>" class="btn btn-primary">Delete</a>
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
$datakepda = ob_get_clean();
?>