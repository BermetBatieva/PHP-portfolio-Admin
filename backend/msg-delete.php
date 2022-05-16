<?php
$db =  mysqli_connect('localhost','root','','test');
//$db =  mysqli_connect('31.186.53.200','Batieva_db','CiZTlVaNf7','Batieva_db');
mysqli_set_charset($db, "utf8mb4");
	session_start();
	$id = $_GET['id'];

	$del = "DELETE  FROM msg WHERE id = '$id'";
	$query = mysqli_query($db,$del);
	if ($query) {
		$_SESSION['delete'] = "Your Data deleted successfully!";
		header('location:../view-msg.php');
	}else{
		$_SESSION['delete'] = "Sorry Something wrong! Please try again later.";
		header('location:../view-msg.php');
	}
 ?>