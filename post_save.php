<?php
	session_start();
	$comment = $_POST['comment'];
	$post_id = $_POST['post_id'];
	$user_id = $_SESSION['user_id'];
	
	$conn = new PDO("mysql:host=localhost;dbname=yapyernlnw_webboard;charset=utf8" , "yapyernlnw_root" , "Kaekosa001");
	$sql = "INSERT INTO comment (content, post_date, user_id, post_id) VALUES ('$comment',NOW(),'$user_id','$post_id')";
	$conn->exec($sql);
	$conn = null;
	header("location:post.php?id=$post_id"); 
?>