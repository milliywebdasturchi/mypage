<?php

include "../db_config.php";

if(isset($_POST['register'])) {
	// list
	$username = checkInput($_POST['username']);
	$password = checkInput($_POST['password']);
	$cpassword = checkInput($_POST['cpassword']);

	// check empty fields
	if(!empty($username)) {
		if(!preg_match("/[a-z]/", $username)) {
			header("location: ../register?error=matchUsername");
			exit;
		}
	} else {
		header("location: ../register?error=emptyUsername");
		exit;
	}

	if(!empty($password)) {
		if($password === $cpassword) {
			// check user database
			$checkUserQuery = $conn->query("SELECT * FROM users WHERE username = '$username'");
			if($checkUserQuery->num_rows > 0) {
				header("location: ../register?error=alreadyUser");
				exit;
			} else {
				// password hash
				$passwordHash = password_hash($password, PASSWORD_BCRYPT);
				// insert user database
				$insertUser = $conn->query("INSERT INTO users(username, password) VALUES ('$username', '$passwordHash')");
				if($insertUser) {					
					header("location: ../register?success=insertUser");
					exit;
				} else {
					header("location: ../register?error=insertUser");
					exit;
				}
			}
		} else {
			header("location: ../register?error=errorPassword");
			exit;
		}
	} else {
		header("location: ../register?error=emptyPassword");
		exit;
	}
}

function checkInput($data) {
	$data = trim($data);
	$data = htmlentities($data);
	$data = htmlspecialchars($data);
	return $data;
}


?>