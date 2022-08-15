<?php
include 'connect.php';

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
 
    $id=$_GET['url'];


    $sql=" DELETE From complaints WHERE c_id='$id'";
  
    $result=mysqli_query($conn,$sql);
  


    if (!$result) {
    	echo "db access denied ".mysqli_error();
    }else{
      echo '<script>alert("complain succesfully deleted.");window.location = "complain.php";</script>';
  }
  

?>