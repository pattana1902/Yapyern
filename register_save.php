<?php
	session_start();
	$login = $_POST['username'];
	$passwd = $_POST['password'];
	$name = $_POST['name'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
$_SESSION['error'] = "t";
$_SESSION['ss'] = "f";
	
	$conn = new PDO("mysql:host=localhost;dbname=yapyernlnw_webboard;charset=utf8" , "root" , "root");
	$sql1 = "SELECT * FROM user where login = '$login' ";
	$re=$conn->query($sql1);
		if($re->rowCount()>=1){
			$_SESSION['error'] = "f";
			$_SESSION['ss'] = "f";
			Header("refresh:0;url=register.php");
			die();
		}else{

	$sql = "INSERT INTO user (login,password,name,gender,email,role) VALUES ('$login',sha1('$passwd'),'$name','$gender','$email','m')";

	$conn->exec($sql);
	Header("refresh:0;url=register.php");
	$_SESSION['ss'] = "t";
}
	$conn = null;

	

?>