<?php

session_start();

include "../db_config.php";

if(isset($_POST['addpost'])) {

	$content = mysqli_real_escape_string($conn, $_POST['content']);
	$user_id = mysqli_real_escape_string($conn, $_POST['userId']);

	date_default_timezone_set('Asia/Tashkent');

	$createdAt = date("F j, Y");

	$insertPost = $conn->query("INSERT INTO posts(user_id, content, createdAt) VALUES ('$user_id', '$content', '$createdAt')");

	if($insertPost) {
		header("Location: ../index.php");
		exit;
	} else {
		header("Location: ../index.php?error=insertPost");
		exit;
	}
}

?>