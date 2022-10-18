<?php 
	session_start();
	if(isset($_GET['name'])){
		$catname = $_GET['name'];
	}else{
		$catname = '--ทั้งหมด--';
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

<style>
.dropbtn {
  background-color: #3498DB;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #2980B9;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
</style>
	
</head>
<body>

	<script>
		function myFunction(){
			var txt;
			var r = confirm('ต้องการจะลบจริงหรือไม่');
			if(r==true){
				return true;
			}else{
				return false;
			}
		}


function myFunction1() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

	</script>

	<div class="plnel panel-default">
		<div class="panel-body"><center><h1>ยับเยิน</h1></center></div>
	</div>
	

<div class="container">
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
						}else{

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

	

	<div class="row">
		<div class="form-group">
      		<div class="col-sm-1 col-md-3">
	      		<div class="dropdown"><label>หมวดหมู่</label>
	      			<div class="dropdown">
  					<button onclick="myFunction1()" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?php echo $catname; ?> &nbsp;&nbsp;<span class="caret"></span></button>
 						<div id="myDropdown" class="dropdown-content">
    						<a href="index.php">-- ทั้งหมด --</a>
    						<?php
    							$conn = new PDO("mysql:host=localhost;dbname=yapyernlnw_webboard;charset=utf8" , "root" , "root");
    							$sql = "SELECT*FROM category";
    							foreach ($conn->query($sql) as $row) {
    								echo "<a href='index.php?catid=".$row['id']."&name=".$row['name']."'>".$row['name']."</a>";
    							}
    							$conn = null;
    						?>
  						</div>
  					</div>
				</div>
      		</div>
   	 	</div>


   	 	<?php

			if(isset($_SESSION['id'])){
   	 			echo "<a href='newpost.php'><button class='btn btn-success pull-right'><span class='glyphicon glyphicon-plus'></span>สร้างกระทู้ใหม่</button></a>";
   	 		}
   	 		echo "</div>";
   	 		echo "<br>";
   	 		echo "<table class='table table-striped'>";		

			$conn = new PDO("mysql:host=localhost;dbname=yapyernlnw_webboard;charset=utf8" , "root" , "root");
			$sql = "SELECT t3.name,t1.id,t1.title,t2.login,t1.post_date FROM post as t1 INNER JOIN user as t2 ON (t1.user_id=t2.id) INNER JOIN category as t3 ON(t1.cat_id=t3.id) ORDER BY t1.post_date DESC";
			$re = $conn->query($sql);

			if(isset($_SESSION['id'])){

				if($_SESSION['role']=="a"){
					while($row = $re->fetch() ){
						if(isset($_GET['name'])){
							if($row['0']==$_GET['name']){
								echo "<tr><td>[ ".$row['0'] . " ] <a href=post.php?id=".$row['1'].">".$row['2']."</a><br>".$row['3']." - ".$row['4']."</td><td></td><td><a href=delete.php?id=".$row['1']." onclick='return myFunction();'><button type='button' class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span></button></a></td></tr>";
								}
						}else{
							echo "<tr><td>[ ".$row['0'] . " ] <a href=post.php?id=".$row['1'].">".$row['2']."</a><br>".$row['3']." - ".$row['4']."</td><td></td><td><a href=delete.php?id=".$row['1']." onclick='return myFunction();'><button type='button' class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span></button></a></td></tr>";
							}
						}

				}else if($_SESSION['role']=="m"){
					while($row = $re->fetch() ){

						if(isset($_GET['name'])){
							if($row['0']==$_GET['name']){
								echo "<tr><td>[ ".$row['0'] . " ] <a href=post.php?id=".$row['1'].">".$row['2']."</a><br>".$row['3']." - ".$row['4']."</td></tr>";
							}
						}else{
							echo "<tr><td>[ ".$row['0'] . " ] <a href=post.php?id=".$row['1'].">".$row['2']."</a><br>".$row['3']." - ".$row['4']."</td></tr>";
						}
					
					}
				}
			}else{
				while($row = $re->fetch() ){

					if(isset($_GET['name'])){
						if($row['0']==$_GET['name']){
						echo "<tr><td>[ ".$row['0'] . " ] <a href=post.php?id=".$row['1'].">".$row['2']."</a><br>".$row['3']." - ".$row['4']."</td></tr>";
						}
					}else{
						echo "<tr><td>[ ".$row['0'] . " ] <a href=post.php?id=".$row['1'].">".$row['2']."</a><br>".$row['3']." - ".$row['4']."</td></tr>";
						}
					}
				}

			$conn = null;

			
			echo "</table>";
			


?>

		
</div>

</body>
</html>