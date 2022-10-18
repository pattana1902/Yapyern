<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1" ;>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/register_css.css">
	<script src="bootstrap/js/jquery-3.5.1.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<title></title>

</head>

<body>
	<div class="divfix">
		<?php if (isset($_SESSION['username'])) {
			Header("refresh:0;url=index.php");
			die();
		}
		?>
		<div class="container">
			<div class="plnel panel-default">
				<div class="panel-body">
					<center>
						<h1>Register</h1>
					</center>
				</div>
			</div>
		</div>
		<div class="container">

			<?php

			if (!isset($_SESSION["error"])) {
				Header("url=login.php");
			} else if (($_SESSION["error"]) == "f") {
				echo "<div class='row'>
			<div class='col-md-offset-3 col-md-6'>
			<center>
			<div class='alert alert-danger'>ชื่อผู้ใช้งานหรือรหัสผ่านซ้ำหรือฐานข้อมูลมีปํญหา</div>
			</center>
			</div>
			</div>";
			}
			if (!isset($_SESSION["ss"])) {
				Header("url=login.php");
			} else if (($_SESSION["ss"]) == "t") {
				echo "<div class='row'><div class='col-md-offset-3 col-md-6'><center><div class='alert alert-success'>สมัครชื่อผู้ใช้งานเรียบร้อยแล้ว</div></center></div></div>";
				$_SESSION['ss'] = "f";
			}

			?>

			<form class="form-horizon" action="register_save.php" method="post">
				<div class="row">
					<div class="col-md-offset-3 col-md-6">
						<div class="form-group">
							<label for="txt_username">
								USERNAME :
							</label>
							<input type="text" class="form-control" name="username" placeholder="Username" required>
						</div>

						<div class="form-group">
							<label for="txt_pass">
								PASSWORD :
							</label>
							<input type="password" class="form-control" name="password" placeholder="Password" required>
						</div>

						<div class="form-group">
							<label for="txt_name">
								E-MAIL :
							</label>
							<input type="email" class="form-control" name="email" placeholder="E-mail" required>
						</div>
						<div class="form-group">
							<label for="txt_name">NAME :</label>
							<input type="text" class="form-control" name="name" placeholder="Name and Surname" required><br><br>
						</div>
						<div class="form-group">
							<label for="txt_name" class="col-sm-5 control-lable">SEX :</label>

							<div class="custom-control custom-radio">
								<input type="radio" class="custom-control-input" id="m" name="gender" value="m">
								<label class="custom-control-label" for="gender">ชาย</label>
							</div>

							<div class="custom-control custom-radio col-sm-offset-5">
								<input type="radio" class="custom-control-input" id="f" name="gender" value="f">
								<label class="custom-control-label" for="gender">หญิง</label>
							</div>

							<div class="custom-control custom-radio col-sm-offset-5">
								<input type="radio" class="custom-control-input" id="o" name="gender" value="o">
								<label class="custom-control-label" for="gender">อื่นๆ</label>
							</div>
						</div>

						<center>
							<a href="register.php"><button type="submit" class="button"><span class="glyphicon glyphicon-floppy-disk"> SIGN UP</span></button></a>
						</center>
						<br>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>

</html>