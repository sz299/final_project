<?php
	$dsn = 'mysql:host=sql2.njit.edu;dbname=sz299';
  $username = 'sz299';
	$password = '19islam82';
	//Command to connect to MySQL database and select the database
	//Using try and catch to avoid crash and showing proper error message
	try {
		$db = new PDO($dsn, $username, $password);
	} catch (PDOException $e) {
		$error_message = $e->getMessage();
		echo $error_message;
		exit();
	}
?>