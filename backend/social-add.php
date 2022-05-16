<?php
$db =  mysqli_connect('localhost','root','','test');
//
//mysqli_set_charset($db, "utf8mb4");


//$db =  mysqli_connect('31.186.53.200','Batieva_db','CiZTlVaNf7','Batieva_db');
mysqli_set_charset($db, "utf8mb4");
	session_start();
 ?>
 <?php 
 	$label = $_POST['label'];
 	$link = $_POST['link'];

 	if ($_SESSION['REQUEST_METHOD']='POST') {
 		if (!empty($label)) {
 			switch ($label) {
 				case 'facebook':
 					$social_icon = 'fab fa-facebook-f'; 
 					break;
 				case 'twitter':
 					$social_icon = 'fab fa-twitter'; 
 					break;
 				case 'instagram':
 					$social_icon = 'fab fa-instagram'; 
 					break;
 				case 'pinterest':
 					$social_icon = 'fab fa-pinterest'; 
 					break;
 				case 'linkedin':
 					$social_icon = 'fab fa-linkedin-in'; 
 					break;
 				
 				default:
 					$_SESSION['label_empty'] = 'Пожалуйста, введите название социальной сети маленькими буквами!';
 					header('location:../social.php');
 					break;
 			}
 			$label_name = $social_icon;
 			$insert = "INSERT INTO social_media(label,link) VALUES('$label_name','$link')";
 			$query = mysqli_query($db,$insert);

 			if ($query) {
 				$_SESSION['insert'] = "Успешно добавлен!";
 				header('location:../social.php');
 			}
 			else{
 				$_SESSION['label_empty'] = "Произошла ошибка...";
 				header('location:../social.php');
 			}
 		} else {
 			$_SESSION['label_empty'] = 'Пожалуйста, введите название социальной сети!';
 			header('location:../social.php');
 		}
 		
 	}
  ?>