<?php
switch ($_GET['page']){

	
			
	//user//
	case 'user':
		if ($_GET['page']){
			include 'inc/users/user.php';
			$content = $user;
		}
		break;
			


	
	default:
		include 'inc/main.php';
		$content = $main;
		break;
}
?>
