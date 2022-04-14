<?php

include "db_config.php";

if(isset($_GET['id'])) {
	
	$post_id = $_GET['id'];

	$result = $conn->query("DELETE FROM posts WHERE id = '$post_id'");

	if($result) {
		header("Location: index.php");
		exit;
	} else {
		header("Location: index.php?error=delete_post");
		exit;
	}
}