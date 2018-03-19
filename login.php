<?php
session_start();

if(isset($_POST['user']))
{

    
    include 'dbh.inc.php';



    $user =mysqli_real_escape_string($conn,$_POST['user']);
    $pwd =mysqli_real_escape_string($conn,$_POST['password']);



    //error handling

    if(empty($user) || empty($pwd)){
        
        header("Location: login_page.php?error=empty");
        exit();

    }


    else
    {
           $sql="SELECT * FROM users WHERE user_uname ='$user' and  user_password='$pwd';";
           $result = mysqli_query($conn,$sql);
           $resultCheck= mysqli_num_rows($result);
          $row = mysqli_fetch_assoc($result);

           if($resultCheck<1)
           {
            header("Location: login_page.php?login=error1");
            exit();


           }
           else 
          	{

          		//login the user here


          		$_SESSION['u_id']=$row['user_id'];
              $_SESSION['u_uname']=$row['user_uname'];
          		

              if(!empty($_POST['remember']))
              {
                setcookie("member_login",$_POST['user'],time()+( 365*10*24*60*60));
                setcookie("member_password",$_POST['password'],time()+( 365*10*24*60*60));
              }
               
                header("Location: profilepage.php");
               exit();


          	}

          }


           }


    






else 
{


	header("Location: login.php?login=error");
}
