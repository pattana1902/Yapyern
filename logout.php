<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>
	<?php
	session_destroy();
	Header("refresh:0;url=index.php");
	
	?>
</body>
</html>