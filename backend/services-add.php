<?php
//
$db =  mysqli_connect('localhost','root','','test');
//
//mysqli_set_charset($db, "utf8mb4");
//$db =  mysqli_connect('31.186.53.200','Batieva_db','CiZTlVaNf7','Batieva_db');
mysqli_set_charset($db, "utf8mb4");
	session_start();
	error_reporting(0);

	$heading = $_POST['heading'];
	$desc = $_POST['description'];
	$service_icon = $_POST['icon'];


	if ($_SERVER['REQUEST_METHOD']=='POST') {
		if (!empty($heading)) {
			$head_len = strlen($heading);
			if ($head_len > 25 || $head_len <10) {
				$_SESSION['name_err'] = "Ваш заголовок должен содержать более 10 и менее 25 символов!";
				header('location:../services.php');
			} else {
				//description validation start here
				if (empty($desc)) {
					$_SESSION['desc_err'] = "Пожалуйста, напишите о ваших навыках.";
					header('location:../services.php');
				} else {
					$desc_len = strlen($desc);
					if ($desc_len > 200 || $desc_len <50) {
						$_SESSION['desc_err'] = "Ваш заголовок должен содержать более 50 и менее 200 символов!";
						header('location:../services.php');
				}
				else{
						if (!empty($service_icon)) {
							$insert = "INSERT INTO services (heading,description,img) VALUES('$heading','$desc','$service_icon')";
							$query = mysqli_query($db,$insert);
							if ($query) {
								$_SESSION['success'] = "Ваши навыки успешно добавлены!";
								header('location:../services.php');
							}
						}else{
							$_SESSION['icon_err'] = "Пожалуйста, введите название значка";
							header('location:../services.php');
						}
					}
					
				}
				
			}
		}
	
		else{
			$_SESSION['name_err'] = "Пожалуйста, введите заголовок";
			header('location:../services.php');
		}
}
 ?>