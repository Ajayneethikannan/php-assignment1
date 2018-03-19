<?php
session_start();

include 'dbh.inc.php';

if(isset($_POST['uname']) )
{


$id=$_SESSION['u_id'];


    
      $sql = "UPDATE users
       set
      user_uname ='{$_POST['uname']}' ,
      user_name  = '{$_POST['name']}' ,
      user_phone = '{$_POST['phone']}' ,
      user_gender = '{$_POST['gender']}' ,
      user_profession =  '{$_POST['profession']}' ,
      user_branch   =  '{$_POST['branch']}' ,
      user_interests = '{$_POST['int']}' 
       where user_id='$id';";
      	$result= mysqli_query($conn,$sql);
      	
      	if($result)
      	header("Location: profilepage.php?signup=success");


}

else 
{

	header("Location: profilepage.php");
}


