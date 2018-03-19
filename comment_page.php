<?php
session_start();
include 'dbh.inc.php';
include 'comments.inc.php';



//checking if all the fields have been completed

if(!isset($_SESSION['u_uname']))
{
	header("Location: login_page.php");
}




?>


<html>
<head>
	<link rel="stylesheet" href="comment.css">
	</head>
	<body>
<div>
		<?php
            getComments($conn);
		?>
	</div>
		<?php echo"<div id='write'>
			<form name='FORM' method='post' action='".setComments($conn)."'>
			<input type='hidden' name='uname' value='{$_SESSION['u_uname']}'>
				<input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
				<input type='text'  name='message' placeholder='your comment here!'>
                 <button type='submit' name='commentSubmit'>Post</button>
			</form>
		</div>";
		?>
<div id="b"><a href="profilepage.php">Profile Page</a></div>
	</body>



</html>