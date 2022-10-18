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

<?php 
if(!isset($_SESSION['username'])){
	Header("refresh:0;url=index.php");
}?>

<div class="container">
	<div class="plnel panel-default">
		<div class="panel-body"><center><h1>NEW POST</h1></center></div>
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
						if(!isset($_SESSION['username'])){
							echo "<a class='navbar-brand' href='login.php'><span class='glyphicon glyphicon-edit'> Login</span></a>";
						}else if(($_SESSION['username'])=="admin"||($_SESSION['username'])=="member"){
							echo "<li class='dropdown' style='cursor: pointer';>
									<a class='dropdown-toggle' data-toggle='dropdown'>".
										"<span class='glyphicon glyphicon-user'></span>".$_SESSION['username']."<span class='caret'></span>
									</a>
									<ul class='dropdown-menu'>
									<li><a href=logout.php><span class='glyphicon glyphicon-off'></span>&nbsp;&nbsp;ออกจากระบบ</a></li>
										</ul>
									</li>";
						}
						?>	
					</ul>
				</div>
			</nav>
		</div>
	</div>
</div>


<div class="container">
	
		<form class = "form-horizon" action="newpost_save.php" method="post">
		
			<div class="row">
				<div class="col-md-offset-1 col-md-10">
					<div class="panel panel-default">
						<div class="panel-heading" style="background: #6CD2FE">สร้างกระทู้ใหม่</div><br>

						<div class="form-group">
							<label for="txt_username" class="col-sm-3 control-lable" style="text-align: right;">หมวดหมู่ :</label>	
							<div class = " col-sm-9">


	        					<select id="category" class='form-control' name="category">
	        						<?php
	        						/////////////////////////////////////////////////////////

	        						$conn = new PDO("mysql:host=localhost;dbname=yapyernlnw_webboard;charset=utf8" , "yapyernlnw_root" , "Kaekosa001");
	        						$sql = "SELECT * FROM category";

	        						foreach ($conn->query($sql) as $row) {
	        							echo "<option value=".$row['id'] . ">" . $row['name']."></option>";
	        						}
	        						$conn = null;
	        						/////////////////////////////////////////////////////////
	        						?>


	          						
	      	 					</select><br>
							</div>

						</div>

						<div class="form-group">
							<label for="txt_pass" class="col-sm-3 control-lable" style="text-align: right;">หัวข้อ :</label>
							<div class = "col-sm-9"><input type="text" class="form-control" name="title_name" required></div><br><br><br>
						</div>
						<br>

						<div class="form-group">
							<label for="txt_name" class="col-sm-3 control-lable" style="text-align: right;">เนื้อหา :</label>
							<div class="col-sm-9">
							<textarea class="form-control " id="content_name" rows="3" name="content_name"></textarea><br>
							</div>
							
						</div>

						<center>
							<a href="newpost_save.php"><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-send"> บันทึกข้อความ</span></button></a>
						</center>
						<br>

					</div>
				</div>
			</div>
			</form>
		</div>

</body>
</html>