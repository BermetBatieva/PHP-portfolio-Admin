<?php
$db =  mysqli_connect('localhost','root','','test');

//$db =  mysqli_connect('31.186.53.200','Batieva_db','CiZTlVaNf7','Batieva_db');
mysqli_set_charset($db, "utf8mb4");	session_start();
	error_reporting(0);
	$id = $_POST['id'];
	$heading = $_POST['heading'];
	$desc = $_POST['description'];
	$service_icon = $_POST['icon'];


	if ($_SERVER['REQUEST_METHOD']=='POST') {
		if (!empty($heading)) {
			$head_len = strlen($heading);
			if ($head_len > 25) {
				$_SESSION['name_err'] = "Ваш заголовок должен менее 25 символов!";
				header('location:../edit-services.php');
			} else {
				//description validation start here
				if (empty($desc)) {
					$_SESSION['desc_err'] = "Пожалуйста, напишите о ваших навыках!";
					header('location:../edit-services.php');
				} else {
					$desc_len = strlen($desc);
					if ($desc_len > 1000) {
						$_SESSION['desc_err'] = "Ваш заголовок должен содержать менее 1000 символов!";
						header('location:../edit-services.php');
				}
				else{
					if (!empty($service_icon)) {
						$update = "UPDATE services SET heading='$heading',description='$desc',img='$service_icon' where id='$id'";
							$query = mysqli_query($db,$update);
							if ($query) {
								$_SESSION['success'] = "Ваши навыки успешно обновлены!";
								header('location:../edit-services.php');
							}
						}else{
							$_SESSION['icon_err'] = "Пожалуйста, введите название значка";
							header('location:../edit-services.php');
						}
					}
					
				}
				
			}
		}
	
		else{
			$_SESSION['name_err'] = "Please enter service heading";
			header('location:../edit-services.php');
		}
}
 ?>