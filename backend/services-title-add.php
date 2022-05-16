<?php
$db =  mysqli_connect('localhost','root','','test');
//
//mysqli_set_charset($db, "utf8mb4");
//$db =  mysqli_connect('31.186.53.200','Batieva_db','CiZTlVaNf7','Batieva_db');
mysqli_set_charset($db, "utf8mb4");
session_start();
?>

<?php 
	$stitle = $_POST['short-title'];
	$title  = $_POST['title']; 

	if ($_SERVER['REQUEST_METHOD']="POST") {
		if (!empty($stitle)) {
			$stitle_len = strlen($stitle);
			if ($stitle_len >30) {
				$_SESSION['stitle_err'] = "Ваш заголовок должен содержать менее 30 символов!";
				header('location:../services-title.php');
			}
			else{
				if (!empty($title)) {
					$title_len = strlen($title);
					if ($title_len >50) {
						$_SESSION['title_err'] = "Ваш заголовок должен содержать менее 50 символов!";
						header('location:../services-title.php');
					
				}else{
					/*============INSERT DATA TO DATABASE==============*/
					/*===================================================*/
					$insert = "UPDATE service_section SET short_title = '$stitle',head_title='$title' where id=1";
					$query = mysqli_query($db,$insert);
					if ($query) {
						$_SESSION['success'] = "Ваши данные успешно обновлены!";
						header('location:../services-title.php');
					}
				}
				
			}else{
				$_SESSION['title_err'] = "Пожалуйста, Введите Свое краткое название!";
				header('location:../services-title.php');
			}
		} 
		
	}
	else {
			$_SESSION['stitle_err'] = "Пожалуйста, Введите Свое краткое название!";
			header('location:../services-title.php');
		}
}
 ?>

 