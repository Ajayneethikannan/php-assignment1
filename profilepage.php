<?php
session_start();
include 'dbh.inc.php';


if(!isset($_SESSION['u_id']))
{
	header("Location: login_page.php");
}

else 
{
 //getting data from the server

	$id=$_SESSION['u_id'];

	$sql = "SELECT * FROM users WHERE user_id='$id'";
      $result= mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($result);


      $flag=1;

      foreach($row as $key => $value)
      {
      	if($value == "")
      	{
      		$flag=0;
      		break;
      	}
      }

      



 //defining the variables




      	$user_uname =$row['user_uname'];
      	$user_name=$row['user_name'];
      	$user_email=$row['user_email'];
      	$user_gender=$row['user_gender'];
      	$user_phone=$row['user_phone'];
      	$user_profession=$row['user_profession'];
      	$user_interests=$row['user_interests'];
      	$user_branch=$row['user_branch'];




}


?>
<!doctype html>
<html>
<head>
	<link rel="stylesheet" href="profile.css">
</head>
<body>



<div id="cover_photo" >
<?php
	   $sqlimg="SELECT * FROM image WHERE uname='$user_uname'";
	   $resultimg=mysqli_query($conn,$sqlimg);
	   if($rowimg=mysqli_fetch_assoc($resultimg))
	   {
	   	echo "<img src='{$rowimg['img2']}'>";
	   }

	else echo"<img src='default-profile.png'>"
	?>
</div>
<div style="position:absolute;left:3vw;">
	<?php

	if($flag==1)
		{echo "<button id='change'><a href='comment_page.php'>POST!</a></button>";
	}
	else
			{echo "<button id='change'><a href='completeprofile.php'>Complete your profile to post!</a></button>";
}
	?>
</div>
<div style="position:absolute;right:35vw;">
	<button id='change'><a href='logout.php'>Logout</a></button>
</div> 
<div id="profile_photo">
	<?php
	   $sqlimg="SELECT * FROM image WHERE uname='$user_uname'";
	   $resultimg=mysqli_query($conn,$sqlimg);
	   if($rowimg=mysqli_fetch_assoc($resultimg))
	   {
	   	echo "<img src='{$rowimg['img1']}'>";
	   }

	else echo"<img src='default-profile.png'>"
	?>
</div>
<div id="button_collection">
<button><a href="upload_page.php">UPDATE PHOTOS</a></button>
<button><a href="completeprofile.php">UPDATE PROFILE</a></button>
<button><a href="change_password.php">CHANGE PASSWORD</a></button>
</div>


<div id="profile">
<div id="question">
	<div id="q">
		User Name
	</div>

    
	<div id="q">
		Name
	</div>

	<div id="q">
		Gender
	</div>
	<div id="q">
		Email Id
	</div>
	<div id="q">
		Phone Number
	</div>
	<div id="q">
		Profession
	</div>
	<div id="q">
		Branch
	</div>
	<div id="q">
		Hobbies and interests
	
	</div>
</div>


<div id="answer">
	<?php
	echo "<div id='a'>
      $user_uname
	</div>
	<div id='a'>
	$user_name
	</div>
	<div id='a'>
	$user_gender
	</div>
	<div id='a'>
	$user_email
	</div>
	<div id='a'>
	$user_phone
	</div>
	<div id='a'>
	$user_profession
	</div>
	<div id='a'>
	$user_branch
	</div>
	<div id='a'>
	$user_interests
	</div>
	"
?>
</div>





</body>
</html>