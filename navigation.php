<?php
switch ($_GET['page']){

	case 'ranking':
		if ($_GET['page']){
			include 'inc/ranking.php';
			$content = $ranking;
		}
		break;
	case 'lra':
		if ($_GET['page']){
			include 'inc/lra.php';
			$content = $lra;
		}
		break;
	case 'lrasearchbl':
		if ($_GET['page']){
			include 'inc/lrasearchbl.php';
			$content = $lrasearchbl;
		}
		break;

	case 'lrasearchbtl':
		if ($_GET['page']){
			include 'inc/lrasearchbtl.php';
			$content = $lrasearchbtl;
		}
		break;

	case 'lrakepda':
		if ($_GET['page']){
			include 'inc/lrakepda.php';
			$content = $lrakepda;
		}
		break;
			
	//bagian//
	case 'umum':
		if ($_GET['page']){
			include 'inc/bagian/umum.php';
			$content = $umum;
		}
		break;
	case 'keuangan':
		if ($_GET['page']){
			include 'inc/bagian/keuangan.php';
			$content = $keuangan;
		}
		break;

	case 'kerjasama':
		if ($_GET['page']){
			include 'inc/bagian/kerjasama.php';
			$content = $kerjasama;
		}
		break;
	case 'undang':
		if ($_GET['page']){
			include 'inc/bagian/undang.php';
			$content = $undang;
		}
		break;
	case 'adpem':
		if ($_GET['page']){
			include 'inc/bagian/adpem.php';
			$content = $adpem;
		}
		break;
	case 'kesra':
		if ($_GET['page']){
			include 'inc/bagian/kesra.php';
			$content = $kesra;
		}
		break;
	case 'ekonomi':
		if ($_GET['page']){
			include 'inc/bagian/ekonomi.php';
			$content = $ekonomi;
		}
		break;
	case 'organisasi':
		if ($_GET['page']){
			include 'inc/bagian/organisasi.php';
			$content = $organisasi;
		}
		break;
	case 'progdalbang':
		if ($_GET['page']){
			include 'inc/bagian/progdalbang.php';
			$content = $progdalbang;
		}
		break;
	case 'barangjasa':
		if ($_GET['page']){
			include 'inc/bagian/barangjasa.php';
			$content = $barangjasa;
		}
		break;
	case 'hukum':
		if ($_GET['page']){
			include 'inc/bagian/hukum.php';
			$content = $hukum;
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
	case 'asper':
		if ($_GET['page']){
			include 'inc/asisten/asper.php';
			$content = $asper;
		}
		break;
	case 'asmin':
		if ($_GET['page']){
			include 'inc/asisten/asmin.php';
			$content = $asmin;
		}
		break;

	
	default:
		include 'inc/main.php';
		$content = $main;
		break;
}
?>
