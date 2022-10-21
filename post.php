<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<!-- Java Script -->
	<script src="bootstrap/js/jquery-3.5.1.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
   
</head>
<style>
	table th {
		background-color: #6CD2FE;
	}
</style>

<body>
	<?php
	echo "<h1><center>ยับเยิน</center></h1><hr>";
	if (!isset($_SESSION["username"])) {
		echo "<div class='container'>
	 			<div class='panel panel-default'>
				<div class='panel-heading'><a href='index.php'><span class='glyphicon glyphicon-home'></span>  Home</a>
				<p style='float:right'><a href ='login.php?id='><span class='glyphicon glyphicon-edit'></span>
				&nbspเข้าสู่ระบบ</a></p>
				</div>
				</div>
				</div>";
	} else {
		echo "<div class='container'>
				<nav class='navbar navbar-default'>
					<ul class='nav navbar-nav'>
      				<li><a href='index.php'><span class='glyphicon glyphicon-home'></span>&nbsp;Home</a></li>
    				</ul>
    			<ul class='nav navbar-nav navbar-right'>";

		echo "<li class='dropdown' style='cursor: pointer';>
							<a class='dropdown-toggle' data-toggle='dropdown'>" .
			"<span class='glyphicon glyphicon-star'></span>" . $_SESSION['username'] . "<span class='caret'></span>
							</a>
							<ul class='dropdown-menu'>
									<li><a href=logout.php><span class='glyphicon glyphicon-off'></span>&nbsp;&nbsp;ออกจากระบบ</a></li>
							</ul>
						</li></ul></nav></div>";
	}
	?>
	<center>ต้องการดูกระทู้หมายเลข <?php echo $_GET["id"] ?><br>
		<?php $oe = $_GET["id"];
		if (($oe % 2) == 0)
			echo "เป็นกระทู้หมายเลขคู่" . "<br>";
		else
			echo "เป็นกระทู้หมายเลขคี่" . "<br>";
		?>
	</center>
	<div class='container'>
		<table class='table table-striped table-responsive'>
			<?php

			$conn = new PDO("mysql:host=localhost;dbname=yapyernlnw_webboard;charset=utf8", "root", "root");
			$sql = "
 		SELECT t1.title,t1.content,t2.login,t1.post_date FROM post as t1
 		INNER JOIN user as t2 ON (t1.user_id=t2.id) WHERE t1.id=$_GET[id]";

			$result = $conn->query($sql);

			while ($row = $result->fetch()) {
				echo "<div class='panel panel-primary'>
 						<div class='panel-heading'>" . $row['0'] . "</div>
 						<div class='panel-body'>" . $row['1'] . "<br><br>
 						"  . " โพสต์เมื่อวันที่ " . $row['3'] . "</div></div>
 				";
			}
			$conn = null;
			$conn = new PDO("mysql:host=localhost;dbname=yapyernlnw_webboard;charset=utf8", "root", "root");
			$sql = "
 		SELECT t1.content,t2.login,t1.post_date FROM comment as t1
 		INNER JOIN user as t2 ON (t1.user_id=t2.id) WHERE t1.post_id=$_GET[id]
 		ORDER BY t1.post_date ASC";
			$i = 1;
			$result = $conn->query($sql);

			while ($row = $result->fetch()) {
				echo "<div class='panel panel-info'>
 						<div class='panel-heading'>ความคิดเห็นที่ " . $i . "</div>
 						<div class='panel-body'>" . $row['0'] . "<br><br>
 						" . $row['1'] . " โพสต์เมื่อวันที่ " . $row['2'] . "</div></div>
 				";
				$i++;
			}
			$conn = null;
			?>
			<?php
			if (isset($_SESSION["id"])) {
			?>
				<div class='panel panel-success'>
					<div class='panel-heading'>แสดงความคิดเห็น</div>
					<div class='panel-body'>
						<form class='form-horizontal' role='form' action='post_save.php' method='post'>
							<input type='hidden' name='post_id' value='<?= $_GET['id']; ?>'>
							<div class='form-group'>
								<div class='col-md-offset-1 col-md-10'>
									<textarea name='comment' class='form-control' rows=8></textarea>
								</div>
							</div>
							<div class='form-group'>
								<center>
									<button type='submit' class='btn btn-success'><span class='glyphicon glyphicon-send'></span>ส่งข้อความ</button>
								</center>
							</div>
						</form>
					</div>
				</div>
			<?php
			}
			?>
		</table>
	</div>
	<!--<form>
	<table style="border:2px solid black;width:40% " align="center">
	<tr><th colspan="2"  align="left">แสดงความคิดเห็น</th></tr>	
	<tr><td><textarea name="" rows="3" cols="70"></textarea></td></tr>
	<tr><td colspan="2" align="center"><input type="submit" value="ส่งข้อความ"></td></tr>
	</table>
	</form>-->
	<p style="text-align: center;"> <a href="index.php">กลับไปหน้าหลัก</a></p>
	<!-- Sticky Note -->
	<h1>ส่งกำลังใจผ่านโพสอิท</h1>
    <div class="input-box">
        <input type="text" class="form-control form-control-lg" id="noteInput" placeholder="ใส่ข้อความกำลังใจที่นี่">
        <button id="addNoteBtn" type="submit">ส่งกำลังใจ</button>
        <p id="error-msg">Please enter a valid message!</p>
    </div>
    <div id="container">

    </div>
	<!-- Sticky Note -->
	<script src="script/script.js"></script>
</body>

</html>