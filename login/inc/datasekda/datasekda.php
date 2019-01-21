<?php 
ob_start();


?>
<div class="ibox-content">
	<a href="?page=addSekda">
	<button class="btn btn-success dim " type="button" ><i class="fa fa-plus"></i> Data Setda BL</button>
	</a>
	<a href="?page=laporanBagian">
	<button class="btn btn-danger dim " type="button" ><i class="fa fa-plus"></i> Laporan Bagian</button>
	</a>
</div>

<div class="ibox-content">
     <div class="table-responsive">
		 <table class="table table-striped table-bordered table-hover dataTables-example" >
		      <thead>
		         <tr>
		           <th>Sub Belanja</th>
	         	   <th>Bagian</th>
	         	   <th>Asisten</th>
	         	   <th>Tanggal</th>
		           <th>Nama Program</th>
		           <th>Nama Kegiatan</th>
		           <th>Total Anggaran</th>
		           
		           <th>Action</th>
		           <th>Rincian Anggaran</th>
		          </tr>
		       </thead>
		       <tbody>
		          <?php 
		          	$query = "select * from tm_data 
		          	inner join tm_program on tm_program.id_program = tm_data.id_program
		          	inner join tm_kegiatan on tm_kegiatan.id_kegiatan = tm_data.id_kegiatan";
					$result = mysqli_query($link, $query);
					if(mysqli_num_rows($result) > 0)
					{
						while ($row = mysqli_fetch_array($result))
						{
							$tanggal = date('d-m-Y' , strtotime($row['tanggal']));
							$bagian =  $row['bagian'];
							$asisten =  $row['asisten'];
							$subbelanja =  $row['subbelanja'];

							if ($bagian == 1) {
								$bagian = "Bagian UMUM";
							}
							if ($bagian == 2) {
								$bagian =  "BAGIAN KEUANGAN";
							}
							if ($bagian == 3) {
								$bagian = "Bagian KERJASAMA";
							}
							if ($bagian == 4) {
								$bagian = "Bagian PERUNDANG - UNDANGAN";
							}
							if ($bagian == 5) {
								$bagian = "Bagian ADMINISTRASI PEMERINTAHAN";
							}
							if ($bagian == 6) {
								$bagian = "Bagian KESEJAHTERAAN RAKYAT";
							}
							if ($bagian == 7) {
								$bagian = "Bagian PEREKONOMIAN";
							}
							if ($bagian == 8) {
								$bagian = "Bagian ORGANSASI";
							}
							if ($bagian == 9) {
								$bagian = "Bagian PROGDALBANG";
							}
							if ($bagian == 10) {
								$bagian = "Bagian PENGADAAN BARANG/JASA";
							}
							if ($bagian == 11) {
								$bagian = "Bagian BANTUAN HUKUM";
							}
							if ($asisten == 1) {
								$asisten = "ASISTEN PEMERINTAHAN";
							}
							if ($asisten == 2) {
								$asisten = "ASISTEN PEREKONOMIAN DAN PEMBANGUNAN";
							}
							if ($asisten == 3) {
								$asisten = "ASISTEN ADMINISTRASI";
							}
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
		          	<td><?php echo $subbelanja ?></td>
					<td><?php echo $bagian ?></td>
					<td><?php echo $asisten ?></td>
					<td><?php echo $row['tgl_update'] ?></td>
				   	<td><?php echo strtoupper($row['nama_program'])?></td>
				   	<td><?php echo strtoupper($row['nama_kegiatan'])?></td>
				   	<td><?php echo "Rp." . number_format($row['total_anggaran'],2) ?></td>
				   
				   
           			<td><a href="?page=editSekda&id=<?php echo $row['id_data'] ?>" class="btn btn-warning">Edit</a>
					
					<a href="?page=hapusSekda&id=<?php echo $row['id_data'] ?>" class="btn btn-primary">Delete</a>
					</td>
					<td><a href="?page=detailSekda&id=<?php echo $row['id_data'] ?>" class="btn btn-info">Rincian</td>
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
$datasekda = ob_get_clean();
?>