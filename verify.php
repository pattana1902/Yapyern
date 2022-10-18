<?php 
	session_start();
	

//////////////////////////////////////////////////////////////
	if(isset($_SESSION['username'])&&$_SESSION['id']==session_id()){
		Header("refresh:0;url=login.php");
		die();
	}

	$u = $_POST['Name'];
	$p = $_POST['Password'];

	$conn = new PDO("mysql:host=localhost;dbname=yapyernlnw_webboard;charset=utf8" , "root" , "root");
	$sql = "SELECT * FROM user where login = '$u' and password=sha1('$p')";
	$result = $conn->query($sql);
	if($result->rowCount() == 1){
		$data = $result->fetch(PDO::FETCH_ASSOC);
		$_SESSION['username'] = $data['login'];
		$_SESSION['role'] = $data['role'];
		$_SESSION['user_id'] = $data['id'];
		$_SESSION['id'] = session_id();
		$_SESSION['error'] = "t";
		Header("refresh:0;url=index.php");
		die();
	}else{
		$_SESSION['error'] = "f";
		Header("refresh:0;url=login.php");
		die();
	}
/////////////////////////////////////////////////////////////////

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>	
		<?php


		if(isset($_SESSION['username'])){
			if (($_SESSION["username"]=="admin")||($_SESSION["username"]=="member")) {
				Header("refresh:0;url=index.php");
				die();
			}
		}

	else if(!isset($_SESSION['username'])){

		if(($_POST['Name']=="admin")&&($_POST['Password']=="ad1234")){
			//echo "ยินดีต้อนรับคุณ ADMIN";
			$_SESSION["id"] = session_id();
			$_SESSION["username"] = $_POST['Name'];
			$_SESSION["role"] = "a";
			$_SESSION["error"] = "t";
			Header("refresh:0;url=index.php");
			die();		
		}else if(($_POST['Name']=="member")&&($_POST['Password']=="mem1234")){
			//echo "ยินดีต้อนรับคุณ MEMBER";
			$_SESSION["id"] = session_id();
			$_SESSION["username"] = $_POST['Name'];
			$_SESSION["role"] = "m";
			$_SESSION["error"] = "t";
			Header("refresh:0;url=index.php");
			die();
		}
		//else{

		//	$_SESSION["error1"] = "f";
		//	Header("refresh:0;url=login.php");
		//	die();
		//}
	}
		?>
	
		

		
	

	</center>


</body>
</html>

