<?php 
ob_start();


?>
<div class="ibox-content">
	<a href="?page=addProgram">
	<button class="btn btn-success dim " type="button" ><i class="fa fa-plus"></i> Data Program</button>
	</a>
	
</div>

<div class="ibox-content">
     <div class="table-responsive">
		 <table class="table table-striped table-bordered table-hover dataTables-example" >
		      <thead>
		         <tr>
	         	   <th>Nama Program</th>
	         	  
		           <th>Action</th>
		           
		          </tr>
		       </thead>
		       <tbody>
		          <?php 
		          	$query = "select * from tm_program";
					$result = mysqli_query($link, $query);
					if(mysqli_num_rows($result) > 0)
					{
						while ($row = mysqli_fetch_array($result))
						{
							

		          ?>
		          	<tr>
					<td><?php echo $row['nama_program'] ?></td>
				   
           			<td><a href="?page=editProgram&id=<?php echo $row['id_program'] ?>" class="btn btn-warning">Edit</a>
					
					<a href="?page=hapusProgram&id=<?php echo $row['id_program'] ?>" class="btn btn-primary">Delete</a>
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
$program = ob_get_clean();
?>