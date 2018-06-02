<?php
session_start();
if (empty($_SESSION)){
	header('location:index.php');
}
elseif (isset($_POST['logout']))
{
	session_destroy();

	// kembali ke halaman form login
	header("location:index.php");
}
else {


error_reporting("E_ALL ^ E_NOTICE");
include 'lib/db.php';
include 'navigation.php';
?>
<!--
*
*  INSPINIA - Responsive Admin Theme
*  version 2.7
*
-->

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Dashboard</title>
     <link rel="shortcut icon" href="img/icon.png">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">
	<link href="css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
    <!-- Gritter -->
    <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
	<link href="css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse" >
                <ul class="nav metismenu" id="side-menu">

                    <li>
                    	<img class="img img-responsive" src="img/logo-jdn-white.png" style="margin-top:10px;">
               		 </li>
                     <li>
                        <a href="?page=home"><i class="fa fa-tachometer" aria-hidden="true"></i> <span class="nav-label">Dashboard</span></a>
                    </li>
                    <li>
                        <a href="?page=dataSekda"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <span class="nav-label">Sekda</span></a>
                    </li>
                     <li>
                        <a href="?page=program"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <span class="nav-label">Program</span></a>
                    </li>
                    <li>
                        <a href="?page=kegiatan"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <span class="nav-label">Kegiatan</span></a>
                    </li>
                    <!--<li>
                        <a href="?page=dataSekda"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <span class="nav-label">Data Sekda</span></a>
                    </li>
                     <li>
                        <a href="?page=dataKepda"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> <span class="nav-label">Data Kepda</span></a>
                    </li>-->
                    
                    <li>
                        <a href="?page=user"><i class="fa fa-user" aria-hidden="true"></i> <span class="nav-label">Data Operator User</span></a>
                    </li>
                	
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
	        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
		        <div class="navbar-header">
		            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
		        </div>
						<ul class="nav navbar-top-links navbar-right">
                <li>
                    <form method="post"><a href="login.html" style="color:red;">
                        <button type="submit" class="btn btn-primary btn-block"  name="logout"><i class="fa fa-sign-out"  aria-hidden="true"></i> Log out</button>
                    </a></form>
                </li>
            </ul>
	        </nav>

        </div>

        	<div class="row">
        		<div class="col-md-12">
        			<?php echo $content;?>
        		</div>
        	</div>
        </div>




    </div>

    <!-- Mainly scripts -->
   <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

     <!-- jQuery UI -->
    <script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>

	<!-- Data picker -->
   <script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>

    <script src="js/plugins/clockpicker/clockpicker.js"></script>

   <!-- input mask -->
	<script src="js/plugins/jasny/jasny-bootstrap.min.js"></script>

   <!-- custom script -->
   <script type="text/javascript" src="js/custom.js"></script>

    <script>

        $('#data_1 .input-group.date').datepicker({
        	todayHighlight: true,
            calendarWeeks: true,
            format: 'yyyy-mm-dd',
            autoclose: true
        });

    </script>


   <script src="js/plugins/dataTables/datatables.min.js"></script>
	<script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,

            });

        });

    </script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
	
		
</body>
</html>
<?php }?>
