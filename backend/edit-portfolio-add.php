<?php

$db =  mysqli_connect('localhost','root','','test');

//$db =  mysqli_connect('31.186.53.200','Batieva_db','CiZTlVaNf7','Batieva_db');
mysqli_set_charset($db, "utf8mb4");
	session_start();
?>

<?php
	$id = $_POST['id'];
	$catagory = $_POST['catagory'];
	$heading = $_POST['heading'];
	$desc = $_POST['description'];

	$img = $_FILES['image'];
	
		if ($_SERVER['REQUEST_METHOD']='POST') {
		// checking title1
		if (!empty($catagory)) {
			$title_len = strlen($catagory);
			if ($title_len >50 || $title_len <3 ) {
				$_SESSION['title1_err'] = 'Please input a valid category!';
				header('location:../edit-portfolio.php');
			} else {
				//checking title2 value here
				if (!empty($heading)) {
					$title2_len = strlen($heading);
					if ($title2_len >100) {
						$_SESSION['title2_err'] = 'Заголовок должен содержать менее 100 символов!';
						header('location:../edit-portfolio.php');
					}
				//Checking description
					if (!empty($desc)) {
						$desc_len = strlen($desc);

						if ($desc_len >5000) {
							$_SESSION['desc_err'] = 'Descripiton should be less than 2000 character and more than 100 character!';
							header('location:../edit-portfolio.php');
						}
					}else{
						$_SESSION['desc_err'] = 'Descripiton is required!';
						header('location:../edit-portfolio.php');
					}
					/*=========image validation started here==================*/
					/*===========================================================*/
					if ($_FILES['image']['name']==''){
						$_SESSION['empty_image'] = 'Please upload a image';
						header('location:../edit-portfolio.php');
					}
					else{
						$img = explode('.', $_FILES['image']['name']);
						$ext = end($img);
						$allow_formate = ['jpg','jpeg','png','svg','JPG','JPEG','webp'];
						if (in_array($ext, $allow_formate)) {
							if ($_FILES['image']['size'] < 1000000) {
								/*========================INSERT TO DATABASE===========================*/
								/*=====================================================================*/
								

								$img = $_FILES['image']['name'];
								$update = "UPDATE portfolio SET catagory='$catagory',heading='$heading',description='$desc',img='$img' where id='$id'";
								$q = mysqli_query($db,$update);

								$location = "../img/portfolio/".$img;
								move_uploaded_file($_FILES['image']['tmp_name'], $location);

								if ($q) {
									$_SESSION['success'] = "Your Data added Successfully!";
									header('location:../edit-portfolio.php');
								}

								

								/*========================INSERTION COMPLETE===========================*/
								/*=====================================================================*/

							} else {
								$_SESSION['img_err'] = 'Your Image is too large!';
							header('location:../edit-portfolio.php');
							}
							
						}
						else{
							$_SESSION['img_err'] = 'This kind of image format is not allowed';
							header('location:../edit-portfolio.php');
						}
						
					}

				} else {
					$_SESSION['empty_title2'] = 'Please enter portfolio heading';
					header('location:../edit-portfolio.php');
				}
				
			}
			
		}
		else{
			$_SESSION['empty_title1'] = 'Please enter portfolio category';
			header('location:../edit-portfolio.php');
		}
	}



 ?>
