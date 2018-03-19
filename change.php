<?php
session_start();
include 'dbh.inc.php';


if(isset($_POST['submit']))
{

 $op = mysqli_real_escape_string($conn,$_POST['op']);
   $np = mysqli_real_escape_string($conn,$_POST['np']);
   $np2= mysqli_real_escape_string($conn,$_POST['np2']);

   if (preg_match('/^[A-Za-z0-9!@#$%^&*()_]{6,20}$/',$np) && ($np==$np2))
{

$sql="SELECT * FROM users WHERE user_uname='{$_SESSION['u_uname']}'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

if($row['user_password']==$op)
  
{
$sql="UPDATE users
SET
user_password='$np'
WHERE user_uname='{$_SESSION['u_uname']}'";

$result=mysqli_query($conn,$sql);
header("Location: profilepage.php?change_password=success");
}

else 
{
	header("Location: change_password?authentication=failed");
}

}
else
{
	header("Location: change_password.php?error=tryagain");
}
}