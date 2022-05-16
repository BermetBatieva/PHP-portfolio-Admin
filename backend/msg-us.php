<?php 
session_start();
$db =  mysqli_connect('localhost','root','','test');
//$db =  mysqli_connect('31.186.53.200','Batieva_db','CiZTlVaNf7','Batieva_db');
mysqli_set_charset($db, "utf8mb4");
	$name = $_POST['name'];
	$email = $_POST['email'];
	$msg = $_POST['msg'];

	// echo $name.$email.$sub.$msg;
	// die();

	if ($_SERVER['REQUEST_METHOD']=='POST') {
		if (!empty($name)) {
			if (filter_var($email,FILTER_VALIDATE_EMAIL)) {
				if (!empty($msg)) {
					$insert = "INSERT INTO msg(name,email,msg) VALUES ('$name','$email','$msg')";
					$que = mysqli_query($db,$insert);
					$_SESSION['msg'] = 'Спасибо за ваше сообщение!';
					header('location:../index.php');
				}
			}else{
				header('location:../index.php');
			}
		}
	}
 ?>