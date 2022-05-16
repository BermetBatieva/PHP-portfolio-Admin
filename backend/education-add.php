<?php
session_start();
$db =  mysqli_connect('localhost','root','','test');
//$db =  mysqli_connect('31.186.53.200','Batieva_db','CiZTlVaNf7','Batieva_db');
mysqli_set_charset($db, "utf8mb4");
?>

<?php 
	$name = $_POST['cir_name'];
	$year  = $_POST['year']; 
	$result  = $_POST['result'];

	if ($_SERVER['REQUEST_METHOD']="POST") {
		if (!empty($name)) {
			$title_len = strlen($name);
			if ($title_len >100) {
				$_SESSION['name_err'] = "Ваше имя сертификата должно содержать менее 100 символов!";
				header('location:../education.php');
			}
			else{
				if (!empty($year)) {
					if (!empty($result)) {
						if ($result < 101) {
							/*============INSERT DATA TO DATABASE==============*/
							/*===================================================*/
							$res = $result;
							$insert = "INSERT INTO education(name,year,result) VALUES('$name','$year','$res')";
							$query = mysqli_query($db,$insert);
							if ($query) {
								$_SESSION['success'] = "Ваши данные успешно добавлены!";
								header('location:../education.php');
							}

						}
						else{
							$_SESSION['result_empty'] = "Ваш результат должен быть меньше или равен 100 процентам!";
							header('location:../education.php');
						}
					} else {
						$_SESSION['result_empty'] = "Пожалуйста, Введите Свой результат!";
						header('location:../education.php');
					}
					
				}
				else{
					$_SESSION['year_empty'] = "Пожалуйста, введите год!";
					header('location:../education.php');
				}
			}
		} else {
			$_SESSION['name_err'] = "Пожалуйста, Введите имя сертификата!";
			header('location:../education.php');
		}
		
	}
 ?>