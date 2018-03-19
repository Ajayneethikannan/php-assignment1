<?php
session_start()
?>
<!doctype html>
<html>
<head>
       <link rel="stylesheet" href="login_style.css">

	</head>
	<body>

		 <div id="login_box">
         	   <h2 >Change Passworde</h2>
         	   <form id="FORM" action="change.php" method="POST">
                   
                       	   	
         	   	<p>Old Password</p>
         	   	<input type="password" name="op">
         	   	<p>New Password</p>
         	   	<input type="password" name="np">
         	   		<p >Confirm Password</p>
         	   		<input type="password" name="np2">
         	   
                <button type="submit" name="submit" value="submit">Change password</button>


         	   </form>
         </div>
	</body>
</html>
