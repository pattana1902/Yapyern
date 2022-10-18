<?php
session_start();
if(isset($_SESSION['username'])=="member"&&isset($_SESSION['username'])=="admin"){
			Header("refresh:0;url=index.php");
			die();
		}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1";>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script src="bootstrap/js/jquery-3.5.1.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<title></title>
	
</head>
<body>
<div class="container">
	<div class="plnel panel-default">
		<div class="panel-body"><center><h1>ยับเยิน</h1></center></div>
	</div>
	
	

	


	<div class="row">
		<div class="col-lg-12">
			<nav class="navbar navbar-default">
  				<div class="container-fluid">
    				<ul class="nav navbar-nav">
						<li><a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-home"> HOME</span></a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<?php					
							echo "<a class='navbar-brand' href='login.php'><span class='glyphicon glyphicon-edit'> Login</span></a>";
						?>	
					</ul>
				</div>
			</nav>
		</div>
	</div>

<?php
		if(!isset($_SESSION["error"])){
			Header("url=login.php");
		}else if(($_SESSION["error"])=="f"){
			session_destroy();
			echo "<div class='row'><div class='col-md-offset-3 col-md-6'><center><div class='alert alert-danger'>ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง</div></center></div></div>";

		}
	?>


	<br>
	<form action="verify.php" method="post">
		<div class="container">
			<div class="row">
				<div class="col-md-offset-3 col-md-6">
					<div class="panel panel-default">
						<div class="panel-heading">เข้าสู่ระบบ</div><br>

						<div class="form-group col-md-12">
							<label for="txt_name" class="control-lable">Login :</label><br>
							<input type="text" class="form-control" name="Name" placeholder="Username">
						</div>

						<div class="form-group col-md-12">
							<label for="txt_password" class="control-lable">Password :</label><br>
							<input type="password" class="form-control" name="Password" placeholder="Password">
						</div>

						<br>
						<center>
							<button type="submit" class="btn btn-default">submit</button>	
						</center>
						<br>

					</div>
				</div>
			</div>
			<center><p>ถ้ายังไม่ได้เป็นสมาชิก <a href="register.php">กรุณาสมัคร</a></p></center>
		</div>
	</form>



</body>
</html>