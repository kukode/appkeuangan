<?php
ob_start();


$query = "select * from tm_user > 1";
$result = mysqli_query($link,$query);
if (mysqli_num_rows($result) > 0)
{
	while ($row = mysqli_fetch_array($result)){
		$username = $row['username'];
		$v .= 	"<tr>
		<td><a href=?page=hapusPasar&id={$row['id_pasar']}><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></a></td>
		<td>{$username}</td>
		<td>{$row['password']}</td>
		<td>{$row['nama_pasar']}</td>
		<td>{$row['wilayah']}</td>
		<td>{$row['alamat']}</td>
		<td><a href=?page=editPasar&id={$row['id_pasar']}><i class=\"fa fa-pencil\" aria-hidden=\"true\"></i></a></td>
		
		</tr>";
	}
}

if (isset($_POST['simpan']))
{
	
	
	$namaPasar = $_POST['nama_pasar'];
	$alamatPasar = $_POST['alamat'];
	$wilayahPasar = $_POST['wilayah'];
	$username = $_POST['username'];
	$password = sha1($_POST['password']);
	$query = "insert into pasar (nama_pasar,alamat,wilayah,username,password,level_login) values ('$namaPasar','$alamatPasar','$wilayahPasar','$username','$password','admin')";
	$result = mysqli_query($link, $query);
	if ($result){
		echo "<script>alert('sukses');window.location.assign(\"page.php?page=pasar\")</script>";
	}
	else {
		echo "<script>alert('gagal');window.location.assign(\"page.php?page=pasar\")</script>";
	}
}

?>

					<div class="ibox-content">
                                <button class="btn btn-primary dim" type="button" data-toggle="modal" data-target="#myModal2"><i class="fa fa-plus"></i> Tambah Data Operator</button>
                    </div>
					<div class="ibox-content">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                            <tr>
                            	<th>Hapus</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Edit</th>
                               
                            </tr>
                            </thead>
                            <tbody>
                           		<?php echo $v;?>
                            </table>
                    </div>

                    </div>
                    
                    
<div class="col-lg-12">
    <div class="ibox float-e-margins">
        
                <div class="modal inmodal" id="myModal2" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="false">
                    <div class="modal-dialog">
                        <div class="modal-content animated flipInY">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title">Form User Operator</h4>
                                
                            </div>
                            <div class="modal-body">
                              
		                            
                               
                                <form role="form" method="post">
									<div class="form-group"><label class=" control-label">Nama Operator </label> 
                                    	<input type="text" class="form-control" name="nama_pasar" placeholder="nama pasar" required="required"/>
                                    </div>
                                   <div class="form-group"><label class=" control-label">Alamat Pasar </label>
                                    	<textarea rows="5" cols="10" class="form-control" name="alamat"></textarea>
                                    </div>
                                    
                                    <div class="form-group"><label class=" control-label">Wilayah </label> 
                                    	<select class="form-control" name="wilayah">
                    
		                    				 <option value="timur">Timur</option>
							 				 <option value="tengah">Tengah</option>
							 				 <option value="barat">Barat</option>
							 				 <option value="utara">Utara</option>
					                     
                   			 			</select>
                                    </div>
                                	<div class="form-group"><label class=" control-label">Username </label> 
                                    	<input type="text" class="form-control" name="username" placeholder="username" required="required"/>
                                    </div>
                                   <div class="form-group"><label class=" control-label">Password </label> 
                                    	<input type="password" class="form-control" name="password" placeholder="password" required="required"/>
                                    </div>
                                  
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-white" data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                                    </div>
                                </form>
                           
		                            
		                       
                            </div>
                            
                        </div>
                    </div>
                </div>
       </div>
   </div>

<?php 
$user = ob_get_clean();
?>