<!doctype html>
<hmtl>
	<head>

<link rel="stylesheet" href="login_style.css">



	</head>
	<body><?php

      if(!isset($_COOKIE['member_login']))
        
        {
                $_COOKIE['member_login']="";
                $_COOKIE['member_password']="";
        }


        echo "
              <div><form action='login.php' method='post'>
                <p>User Name</p>
         	   	<input type='text' name='user' value='{$_COOKIE['member_login']}'>
         	   	<p>Password</p>
         	   	<input type='password' name='password' value='{$_COOKIE['member_password']}'>
         	   	
                
                <button type='submit' value='submit' >Log In</button>
              
 <input  type='checkbox' name='remember' value='remember'>Remember Me</button>
         	   </form>
                   
         </div>" ?>
	</body>
</html>