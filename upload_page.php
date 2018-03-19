<?php
session_start();
?>
<!doctype html>
<html>
</html>
<head>
	</head>
<body>
	<form  method="POST" action="upload.php" enctype="multipart/form-data" >
		<input type="file" name="file">
		<input type="file" name="file2">
		<button type="submit" name="submit">Submit</button>
	</form>
	</body>