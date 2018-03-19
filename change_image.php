<?php
session_start();
include 'dbh.inc.php' ;

if(!isset($_SESSION['u_uname']))
{
	header("Location: login_page.php");
	exit();
}
?>


<html>
<head>
	<link rel="stylesheet" href="change.css">
</head>
<body>
  <div>
  	<form name="FORM" action="upload.php" method="post">
  		
  	</form>
  </div>

	</body>
</html>