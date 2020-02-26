<?php

// db connection
$mysqli = new mysqli('localhost', 'root', '', 'musicdb');

if ($mysqli->connect_error) {
	die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}

?>
