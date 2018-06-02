<?php 
ob_start();


?>
<div class="ibox-content">
	<a href="?page=addKegiatan">
	<button class="btn btn-success dim " type="button" ><i class="fa fa-plus"></i> Data Kegiatan</button>
	</a>
	
</div>

<div class="ibox-content">
     <div class="table-responsive">
		 <table class="table table-striped table-bordered table-hover dataTables-example" >
		      <thead>
		         <tr>
	         	   <th>Nama Kegiatan</th>
	         	  
		           <th>Action</th>
		           
		          </tr>
		       </thead>
		       <tbody>
		          <?php 
		          	$query = "select * from tm_kegiatan";
					$result = mysqli_query($link, $query);
					if(mysqli_num_rows($result) > 0)
					{
						while ($row = mysqli_fetch_array($result))
						{
							

		          ?>
		          	<tr>
					<td><?php echo $row['nama_kegiatan'] ?></td>
				   
           			<td><a href="?page=editKegiatan&id=<?php echo $row['id_kegiatan'] ?>" class="btn btn-warning">Edit</a>
					
					<a href="?page=hapusKegiatan&id=<?php echo $row['id_kegiatan'] ?>" class="btn btn-primary">Delete</a>
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
$kegiatan = ob_get_clean();
?>