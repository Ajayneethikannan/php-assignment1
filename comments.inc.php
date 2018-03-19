<?php

function setComments($conn)
{
   if(isset($_POST['commentSubmit']))
   {
   	   
   	   $name=$_POST['uname'];
   	    $date=$_POST['date'];
   	     $message=$_POST['message'];

   	     $sql= "INSERT INTO comments (name,date,message) VALUES ('$name','$date','$message')";
   	     $result=mysqli_query($conn,$sql);


   }
	
}



function getComments($conn)
{

      $sql="SELECT * FROM comments";
      $result=mysqli_query($conn,$sql);
    while( $row=  mysqli_fetch_assoc($result))  //running a while loop to get all
     {  echo "<div id='a'>";
     echo"<p>";
     	echo "<h4>".$row['name']."</h4>";
     	echo "<h5>".$row['date']."</h5>";
     	echo"<hr>";
     	echo $row['message'];
     	echo "</p>";
     	echo "</div>";
     }
      


}
?>