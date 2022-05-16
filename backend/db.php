<?php
//const host = 'localhost';
//const user = 'root';
//const pass = '';
//const db = 'test';


//$db =  mysqli_connect('31.186.53.200','Batieva_db','CiZTlVaNf7','Batieva_db');

$db =  mysqli_connect('localhost','root','','test');

mysqli_set_charset($db, "utf8mb4");

	if (!$db) {
		echo "Database not connected";
	}
	// $text = "";

	// echo strlen($text);
	


 ?>