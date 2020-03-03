<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "musicdb";

	try {
		$pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
		$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			echo "Connected";
	} catch(PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
?>
