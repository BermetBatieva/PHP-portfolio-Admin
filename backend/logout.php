<?php 
	//require 'db.php';
	require '../session.php';
	
	if (isset($_SESSION['logged_email']) && isset($_SESSION['logged_password'])) {
		session_destroy();
		header('location:../page-logout.php');
	}else{
		header('location:../page-logout.php');
	}
	?>