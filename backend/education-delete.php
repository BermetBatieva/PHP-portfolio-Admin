<?php
$db =  mysqli_connect('localhost','root','','test');
//$db =  mysqli_connect('31.186.53.200','Batieva_db','CiZTlVaNf7','Batieva_db');
mysqli_set_charset($db, "utf8mb4");	session_start();
	$id = $_GET['id'];

	$del = "DELETE FROM education WHERE id = '$id'";
	$query = mysqli_query($db,$del);
	if ($query) {
		$_SESSION['delete'] = "Ваши данные успешно удалены!";
		header('location:../view-education.php');
	}else{
		$_SESSION['delete'] = "Извините, что-то не так! Пожалуйста, повторите попытку позже.";
		header('location:../view-education.php');
	}
 ?>