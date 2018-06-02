<?php
session_start();
error_reporting('E_ALL');
include 'lib/db.php';
if ($_SESSION){
	header('location:page.php');
}
if (isset($_POST['masuk'])){
	$username = preg_replace('/[^A-Za-z0-9\  ]/', '', $_POST['username']);
	$password = preg_replace('/[^A-Za-z0-9\  ]/', '', sha1($_POST['password']));
	$level  = $_POST['id_kategori'];

	$sql = "select * from tm_user where username = '$username' AND password = '$password' AND id_level = '$level'";
	$result = mysqli_query($link,$sql);

	if ($row = mysqli_fetch_assoc($result)){
		if ($row['id_level']==1)
		{
			$_SESSION['user'] = $row['id_user'];
			$_SESSION['nama'] = $row['nama'];
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			$_SESSION['level'] = 1;
			header('location:page.php');
		}
		elseif ($row['id_level']==2)
		{
			$_SESSION['user'] = $row['id_user'];
			$_SESSION['nama'] = $row['nama'];
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			$_SESSION['level'] = 2;
			header('location:page.php');
		}
		
	}
	else {
		echo "<script>alert('gagal')</script>";
	}


}


?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Aplikasi Keuangan</title>
    <link rel="shortcut icon" href="img/icon.png">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name"><img class="img-responsive" src="img/logo.png"/></h1>

            </div>
            <h3>Silahkan Login  </h3>

            <form class="m-t" role="form" method="post">
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <input type="password"  name="password" class="form-control" placeholder="Password" required>
                </div>
                 <div class="form-group">
						<select name="id_kategori" class="form-control" required>
							<option value="">Pilih Level User</option>
							<option value="1">Admin</option>
							<option value="2">Operator</option>
							
						</select>
					</div>
                <button type="submit" class="btn btn-primary block full-width m-b" name="masuk">Login</button>


            </form>

        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
