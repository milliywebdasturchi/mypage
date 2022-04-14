<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "mypage";

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if($conn->connect_error) {
	die("Database connection error: " . $conn->connect_error);
}

?>