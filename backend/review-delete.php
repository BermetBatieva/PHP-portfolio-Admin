<?php 
	require 'db.php';
	session_start();
	$id = $_GET['id'];

	$del = "DELETE FROM review WHERE id = '$id'";
	$query = mysqli_query($db,$del);
	if ($query) {
		$_SESSION['delete'] = "Your Data deleted successfully!";
		header('location:../view-review.php');
	}else{
		$_SESSION['delete'] = "Sorry Something wrong! Please try again later.";
		header('location:../view-review.php');
	}
 ?>