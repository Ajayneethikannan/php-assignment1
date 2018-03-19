<?php

if(isset($_POST['user']))
{
   


   include_once 'dbh.inc.php'; //all n same folder

   $user = mysqli_real_escape_string($conn,$_POST['user']);
   $password = mysqli_real_escape_string($conn,$_POST['password']);
   $email = mysqli_real_escape_string($conn,$_POST['mail_id']);

$valid_name="";
$valid_password="";
$valid_email="";
   //error handling
if (preg_match('/^[A-Za-z0-9 ]{3,20}$/',$user))
{
$valid_name=$user;
}


// Email
if (preg_match('/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$/', $email))
{
$valid_email=$email; 
}


// Usename min 2 char max 20 char
if (preg_match('/^[A-Za-z0-9!@#$%^&*()_]{6,20}$/',$password))
{
$valid_password=$password;
}


if((strlen($valid_name)>0)&&(strlen($valid_email)>0)&&(strlen($valid_password)>0 ))

   
   {


      $sql = "SELECT * FROM users WHERE user_uname='$valid_name'" ;
      $result= mysqli_query($conn,$sql);
      $resultCheck = mysqli_num_rows($result);


      if($resultCheck>0){
        header("Location: signup_page.php?signup=usertaken");


      }

      else {

          //hashing the password


      	$sql = "INSERT INTO users (user_uname,user_email,user_password) VALUES ('$user','$email','$password');";
      	$result= mysqli_query($conn,$sql);
      	header("Location: home.php?signup=success");


      }


   }

else
{
   header("location: signup_page.php?login=error");
}


}
else 
{

	header("Location: signup_page.php");       
	exit();

}