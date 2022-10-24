<?php
	session_start();
	//if (!isset($_SESSION["username"])
	if ($_SESSION["role"]!="a"){
		header("refresh:0; url = index.php");
		die();
		
	}else{
	$conn = new PDO("mysql:host=localhost;dbname=yapyernlnw_webboard;charset=utf8" , "yapyernlnw_root" , "Kaekosa001");
	$sql = "DELETE FROM post WHERE id=$_GET[id]";
	$conn->exec($sql);
	$sql2 = "DELETE FROM comment WHERE post_id=$_GET[id]";
	$conn->exec($sql2);
	$conn = null;
	header("refresh:0;url=index.php"); 
	//echo "ลบกระทู้ หมายเลข ".$_GET['id'];
	}
//	if(!isset($_SESSION["id"])||$_SESSION["id"]!=session_id()){
//		header("refresh:1; url = login.php");
//		//die();
//	}
