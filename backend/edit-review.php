<?php

$db =  mysqli_connect('localhost','root','','test');
//$db =  mysqli_connect('31.186.53.200','Batieva_db','CiZTlVaNf7','Batieva_db');
mysqli_set_charset($db, "utf8mb4");			$id = $_GET['id'];

			$select = "SELECT * FROM review where id = '$id'";
			$query = mysqli_query($db,$select);
			$assoc = mysqli_fetch_assoc($query);
			if (isset($id)) {
				$update = "UPDATE review SET status = 2 where id = $id";
				$query_up = mysqli_query($db,$update);
				header('location:../view-review.php');
			}
		?>	