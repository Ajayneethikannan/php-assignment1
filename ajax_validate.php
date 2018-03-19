<?php

$a=$_POST['user'];

  include_once 'dbh.inc.php';
   
    $user = mysqli_real_escape_string($conn,$_POST['user']);
      $sql = "SELECT * FROM users WHERE user_uname='$user'";
      $result= mysqli_query($conn,$sql);
      $resultCheck = mysqli_num_rows($result);


      if($resultCheck>0){
      	echo "username taken";
        }
        else
        {
        	echo "available";
        }


?>