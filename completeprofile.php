<?php
session_start();

if(!isset($_SESSION['u_id']))
{
      header("Location: login_page.php");
}

else{


 $id= $_SESSION['u_id'];
 include 'dbh.inc.php';

 $sql="SELECT * FROM users WHERE user_id ='$id';";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);




}


?>

<!doctype html>
<html>
<head>
	<script type="text/javascript">
	</script>

	<link rel="stylesheet" href="complete.css">

</head>

<body>

<?php
echo 
 "<form id='FORM' method='post' action='complete.php' >
       <div id='login_box'>
         	   <h2 >Complete your profile!</h2>
         	  
              <p>UserName</p>
              <input type='text' name='uname' value='{$row['user_uname']}'>
                <p>Name</p>
         	   	<input type='text' name='name' value='{$row['user_name']}'>
         	   	
         	   	<p >Gender</p>
         	   	<div id='radio'>

         	   	   <input type='radio' name='gender' value='male'  style='display:inline;' > Male
                   <input type='radio' name='gender' value='female' style='display:inline;'' > Female<br>
                    <input type='radio' name='gender' value='other' style='display:inline;' > Other  
                 </div>
                 <p>Phone Number</p>
           <input type='text' name='phone' value='{$row['user_phone']}'>
           <p>Profession</p>
           <input type='text' name='profession' value='{$row['user_profession']}'>
               

         	   
         
         
         	

         	  

                <p>Branch</p>
         	   	<input type='text' name='branch' value='{$row['user_branch']}'>
         	   	
         	   	<p>Interests</p>
         	   	<input type='text' name='int' value='{$row['user_interests']}'>
              
                
         	    <button type='submit' value='submit' >Update</button>
         </div>
</form>"
?>
	</body>
</html>
