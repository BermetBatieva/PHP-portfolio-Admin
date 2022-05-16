<?php 
	session_start();
    //$db =  mysqli_connect('31.186.53.200','Batieva_db','CiZTlVaNf7','Batieva_db');
	//taking value from user input
$db =  mysqli_connect('localhost','root','','test');

	$email = $_POST['email'];
	$pass = $_POST['password'];

    mysqli_set_charset($db, "utf8mb4");


	$sel = "SELECT * FROM users where email = '$email'";
	$query = mysqli_query($db,$sel);
	$assoc = mysqli_fetch_assoc($query);

	if ($assoc['email']==$email) {
		if (password_verify($pass, $assoc['password'])) {
			$_SESSION['logged_email'] = $email;
			$_SESSION['logged_password'] = $pass;
			$_SESSION['name'] = $assoc['name'];
			$_SESSION['role'] = $assoc['role'];
			$_SESSION['email'] = $assoc['email'];
			$_SESSION['phone'] = $assoc['phone'];
			$_SESSION['id'] = $assoc['id'];
			$_SESSION['img'] = $assoc['img'];
			$_SESSION['status'] = $assoc['status'];

			header('location: dashboard.php');
		}else{
			$_SESSION['err'] ="Email and Password doesn't match!";
			header('location: page-login.php');
		} 
	}
	else{
		$_SESSION['err'] ="Email and Password doesn't match!";
		header('location:../page-login.php');
	}

 ?>