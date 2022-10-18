<?php
session_start();
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
	<?php if(isset($_SESSION['username'])){
			Header("refresh:0;url=index.php");
			die();
		}

		


	?>

<div class="container">
	<div class="plnel panel-default">
		<div class="panel-body"><center><h1>สมัครสมาชิก</h1></center></div>
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
</div>



	<div class="container">

		<?php

		if(!isset($_SESSION["error"])){
			Header("url=login.php");
		}else if(($_SESSION["error"])=="f"){
			echo "<div class='row'><div class='col-md-offset-3 col-md-6'><center><div class='alert alert-danger'>ชื่อผู้ใช้งานหรือรหัสผ่านซ้ำหรือฐานข้อมูลมีปํญหา</div></center></div></div>";

		}


		if(!isset($_SESSION["ss"])){
			Header("url=login.php");
		}else if(($_SESSION["ss"])=="t"){
			echo "<div class='row'><div class='col-md-offset-3 col-md-6'><center><div class='alert alert-success'>สมัครชื่อผู้ใช้งานเรียบร้อยแล้ว</div></center></div></div>";
			$_SESSION['ss'] = "f";
		}

		?>
	
		<form class = "form-horizon" action="register_save.php" method="post">
		
			<div class="row">
				<div class="col-md-offset-3 col-md-6">
					<div class="panel panel-default">
						<div class="panel-heading" style="background: #6CD2FE">สมัครสมาชิก</div><br>

						<div class="form-group">
							<label for="txt_username" class="col-sm-4 control-lable">ชื่อบัญชี :</label>
							<div class = "col-sm-8"><input type="text" class="form-control" name="username" placeholder="Username" required></div><br><br>
						</div>

						<div class="form-group">
							<label for="txt_pass" class="col-sm-4 control-lable">รหัสผ่าน :</label>
							<div class = "col-sm-8"><input type="password" class="form-control" name="password" placeholder="Password" required></div><br><br>
						</div>

						<div class="form-group">
							<label for="txt_name" class="col-sm-4 control-lable">ชื่อ-นามสกุล :</label>
							<div class = "col-sm-8"><input type="text" class="form-control" name="name" placeholder="Surname" required></div><br><br>
						</div>

						<div class="form-group">
							<label for="txt_name" class="col-sm-5 control-lable">เพศ :</label>

							<div class="custom-control custom-radio">
  								<input type="radio" class="custom-control-input" id="m" name="gender" value="m">
  								<label class="custom-control-label" for="gender">ชาย</label>
							</div>

							<div class="custom-control custom-radio col-sm-offset-5">
  								<input type="radio" class="custom-control-input" id="f" name="gender"value="f">
  								<label class="custom-control-label" for="gender">หญิง</label>
							</div>

							<div class="custom-control custom-radio col-sm-offset-5">
  								<input type="radio" class="custom-control-input" id="o" name="gender"value="o">
  								<label class="custom-control-label" for="gender">อื่นๆ</label>
							</div>

							
						</div>

						<div class="form-group">
							<label for="txt_name" class="col-sm-4 control-lable">อีเมล :</label>
							<div class = "col-sm-8"><input type="email" class="form-control" name="email" placeholder="E-mail" required></div><br><br>
						</div>

						

						<center>
							<a href="register.php"><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"> สมัครสมาชิก</span></button></a>
						</center>
						<br>

					</div>
				</div>
			</div>
			</form>
		</div>
	


</body>
</html>