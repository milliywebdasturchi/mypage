<?php
session_start();
include "../db_config.php";

if(isset($_POST['login'])) {

	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	// check user database
	$checkUserQuery = $conn->query("SELECT * FROM users WHERE username = '$username' LIMIT 1");
	if($checkUserQuery->num_rows > 0) {

		// password check
		$passwordCheck = $checkUserQuery->fetch_assoc();

		if(password_verify($password, $passwordCheck['password'])) {
			$_SESSION['id'] = $passwordCheck['id'];
			$_SESSION['username'] = $passwordCheck['username'];
			header("Location: ../index");
			exit;
		} else {
			header("Location: ../login?error=errorPassword");
			exit;
		}
	}
}

?>