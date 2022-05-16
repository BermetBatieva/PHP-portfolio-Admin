<?php 
	session_start();

		if (!isset($_SESSION['logged_email']) && !isset($_SESSION['logged_email']) ) {
			
			header('location: page-login.php');
		}
//        else
//            header('location: dashboard.php');


?>