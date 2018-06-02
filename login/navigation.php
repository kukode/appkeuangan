<?php
switch ($_GET['page']){

	//data kegiatan//
	case 'kegiatan':
		if ($_GET['page']){
			include 'inc/kegiatan/kegiatan.php';
			$content = $kegiatan;
		}
		break;
	case 'addKegiatan':
			if ($_GET['page']){
				include 'inc/kegiatan/addKegiatan.php';
				$content = $addKegiatan;
			}
			break;
	case 'hapusKegiatan':
			if ($_GET['page']){
				include 'inc/kegiatan/hapusKegiatan.php';
				$content = $hapusKegiatan;
			}
			break;

	case 'editKegiatan':
			if ($_GET['page']){
				include 'inc/kegiatan/editKegiatan.php';
				$content = $editKegiatan;
			}
			break;

	//data program//
	case 'program':
		if ($_GET['page']){
			include 'inc/program/program.php';
			$content = $program;
		}
		break;
	case 'addProgram':
			if ($_GET['page']){
				include 'inc/program/addProgram.php';
				$content = $addProgram;
			}
			break;
	case 'hapusProgram':
			if ($_GET['page']){
				include 'inc/program/hapusProgram.php';
				$content = $hapusProgram;
			}
			break;
	case 'editProgram':
			if ($_GET['page']){
				include 'inc/program/editProgram.php';
				$content = $editProgram;
			}
			break;

	//data sekda//
	case 'dataSekda':
		if ($_GET['page']){
			include 'inc/datasekda/datasekda.php';
			$content = $datasekda;
		}
		break;
	case 'addSekda':
			if ($_GET['page']){
				include 'inc/datasekda/addSekda.php';
				$content = $addSekda;
			}
			break;
	case 'hapusSekda':
			if ($_GET['page']){
				include 'inc/datasekda/hapusSekda.php';
				$content = $hapusSekda;
			}
			break;
	case 'editSekda':
			if ($_GET['page']){
				include 'inc/datasekda/editSekda.php';
				$content = $editSekda;
			}
			break;



	//laporan//
	case 'laporanBagian':
		if ($_GET['page']){
			include 'inc/laporan/laporanBagian.php';
			$content = $laporanBagian;
		}
		break;

	//detail data//
	case 'detailSekda':
	    if ($_GET['page']){
	        include 'inc/detailSekda/detailSekda.php';
	        $content = $detailSekda;
	        
	    }
	    break;


	case 'editDetailSekda':
	    if ($_GET['page']){
	        include 'inc/detailSekda/editDetailSekda.php';
	        $content = $editDetailSekda;
	        
	    }
	    break;

	case 'hapusDetailSekda':
	    if ($_GET['page']){
	        include 'inc/detailSekda/hapusDetailSekda.php';
	        $content = $hapusDetailSekda;
	        
	    }
	    break;
			
	//user//
	case 'user':
		if ($_GET['page']){
			include 'inc/users/user.php';
			$content = $user;
		}
		break;
			


	
	default:
		include 'inc/home.php';
		$content = $home;
		break;
}
?>
