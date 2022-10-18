<?php
session_start();
	$title_t = $_POST['title_name'];
	$content_c = $_POST['content_name'];
	
	$cat = $_POST['category'];
	$user = $_SESSION['user_id'];

	
	
	
	$conn = new PDO("mysql:host=localhost;dbname=yapyernlnw_webboard;charset=utf8" , "root" , "");

	$sql = "INSERT INTO post (title,content,post_date,cat_id,user_id) VALUES ('$title_t','$content_c',NOW(),'$cat','$user')";

	$conn->exec($sql);
	$conn = null;

	Header("refresh:0;url=index.php");

?>