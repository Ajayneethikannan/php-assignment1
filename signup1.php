<?php

?>
<!doctype html>
<html>
<head>
	<link rel='stylesheet' href="sign_up.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
    	

//front end validation

        function validate_form()
    	{



        var a="";
        var b="";
        var c="";
       

            var regex_email = /^(([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5}){1,25})+([;.](([a-zA-Z0-9_\-\.]+)@{[a-zA-Z0-9_\-\.]+0\.([a-zA-Z]{2,5}){1,25})+)*$/;

            if(regex_email.test(FORM.mail_id.value)==true){
      	    a="";

           }
           else a="Incorrect email format";


            var pass1=FORM.password.value;
            var pass2 =FORM.password2.value;

            if(pass1!=pass2  || pass1=="")b="confirm your password properly!";

      
            var regex_name = /^[a-zA-Z]+$/;
            if(regex_name.test(FORM.user.value)==false  || FORM.user.value=="")c="Your name can contain only letters and shouldn't be empty";
       
            if(!(a=="" && b=="" && c==""))
            alert(a +"\n" + b+ "\n"+c);
       

}



// ajax based validation

function ajax_validate()


{


   var a=FORM.user.value;


   xhttp=new XMLHttpRequest();


   xhttp.onreadystatechange= function()
   {

    if(this.readyState==4 &&this.status==200){

        document.getElementById("user_validate")=this.responseText;
    }
    };
    xhttp.open("POST","ajax_validate.php",true);
    xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhttp.send("user="+a);
   }























// back-end validation


    </script>
	</head>
	<body>

      
         <div id="login_box">
         	   <h2 >Sign Up here</h2>
         	   <form id="FORM" action="http://192.168.121.187:8001/ajay/signup.php" method="post" onSubmit="validate_form()">

                <p>User Name</p>
         	   	<input type="text" name="user" onKeyPress="ajax_validate()">
                <div id="user_validate"></div>
         	   	<p>Password</p>
         	   	<input type="password" name="password">
         	   		<p>Confirm Password</p>
         	   	<input type="password" name="password2">
         	   	<p>Email Id</p>
                <input type="text" name="mail_id">
           
                <button type="submit" value="submit" >Sign Up</button>

         	   </form>
         </div>

    </body>
</html>
