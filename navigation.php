<?php
switch ($_GET['page']){

	
			
	//bagian//
	case 'umum':
		if ($_GET['page']){
			include 'inc/bagian/umum.php';
			$content = $umum;
		}
		break;
			
	//detail//
	case 'detailAnggaran':
		if ($_GET['page']){
			include 'inc/detail/detailAnggaran.php';
			$content = $detailAnggaran;
		}
		break;

	//asisten//
	case 'aspem':
		if ($_GET['page']){
			include 'inc/asisten/aspem.php';
			$content = $aspem;
		}
		break;

	
	default:
		include 'inc/main.php';
		$content = $main;
		break;
}
?>
