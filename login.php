<?php
session_start();
if (isset($_SESSION['username']) == "member" && isset($_SESSION['username']) == "admin") {
	Header("refresh:0;url=index.php");
	die();
}

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1" ;>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/login_css.css">
	<script src="bootstrap/js/jquery-3.5.1.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title></title>

</head>

<body>

	<div class="container">
		<?php
		if (!isset($_SESSION["error"])) {
			Header("url=login.php");
		} else if (($_SESSION["error"]) == "f") {
			session_destroy();
			echo "<div class='row'>
				<div class='col-md-offset-3 col-md-6'>
				<center>
				<div class='alert alert-danger'>ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง</div>
				</center>
				</div>
				</div>";
		}
		?>
		<br>
		<form action="verify.php" method="post">

			<div class="container">
				<center><img src="./images/logo remove-bg.png" width="110%"></center>
				<div class="row">
					<div class="col-md-offset-3 col-md-6">
						<div class="form-group col-md-12">
							<center>
								<div class="input-icons">
									<i class="fa fa-user icon">
									</i>
									<input class="input-field" type="text" name="Name" placeholder="Username">
									<center>
								</div>
						</div>
						<div class="form-group col-md-12">
							<center>
								<div class="input-icons">
									<i class="fa fa-key icon">
									</i>
									<input class="input-field" type="password" name="Password" placeholder="Password">
									<br>
										<button type="submit" class="button">Login</button>
							</center>
						</div>
						</center>
					</div>


					<br>
				</div>
				<center>
					<p>ถ้ายังไม่ได้เป็นสมาชิก <a href="register.php">กรุณาสมัคร</a></p>
				</center>
			</div>

		</form>
	</div>

</body>

</html>