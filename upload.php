<?php
session_start();
 include 'dbh.inc.php';


if(isset($_POST['submit']))
{
  $file=$_FILES['file'];

  $fileName =$_FILES['file']['name'];
  $fileType =$_FILES['file']['type'];
  
  $fileTmpName =$_FILES['file']['tmp_name'];
  
  $fileSize =$_FILES['file']['size'];
  
  $fileError =$_FILES['file']['error'];

   $fileName2 =$_FILES['file2']['name'];
  $fileType2 =$_FILES['file2']['type'];
  
  $fileTmpName2 =$_FILES['file2']['tmp_name'];
  
  $fileSize2 =$_FILES['file2']['size'];
  
  $fileError2 =$_FILES['file2']['error'];




  $fileExt=explode('.',$fileName );
    $fileExt2=explode('.',$fileName2 );

  $fileActualExt = strtolower(end($fileExt));
  $fileActualExt2 = strtolower(end($fileExt2));

  $allowed =array('jpg','jpeg','png');

  if(in_array($fileActualExt,$allowed) && in_array($fileActualExt2,$allowed ))
  	{

  if($fileError===0 && $fileError2===0)
  {
  	  if($fileSize<1000000 && $fileSize2<1000000)
{
    $fileNameNew=$_SESSION['u_uname'].".".$fileActualExt;
    $fileDestination = 'profile/'.$fileNameNew;

    $fileNameNew2=$_SESSION['u_uname'].".".$fileActualExt2;
    $fileDestination2 = 'cover/'.$fileNameNew2;
    //unlink($fileDestination); run a query here to eliminate

    $sql="SELECT * FROM image where uname='{$_SESSION['u_uname']}'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $resultCheck=mysqli_num_rows($result);
    if($resultCheck>1)
    {
      unlink($row['img1']);
      unlink($row['img2']);
      $sql="DELETE * FROM image WHERE uname='{$row['uname']}'";
      $result=mysqli_query($conn,$sql);
    }

    move_uploaded_file($fileTmpName,$fileDestination);
    move_uploaded_file($fileTmpName2,$fileDestination2);
   

   $sql="INSERT INTO image VALUES('{$_SESSION['u_uname']}','$fileDestination', '$fileDestination2')";
 
   

    $result=mysqli_query($conn,$sql);

    

    header("Location: profilepage.php?upload=success");

}
else
{
	echo"too big";

}
  }
  else
  {
  	echo "error";
  }

  	}
else
{
	echo "not possible";
}

  


}
else
{
   print_r("why");
}