<?php

include 'connect.php';
if(!isset($_SESSION)) 
{ 
    session_start(); 
    $email=$_SESSION['email'];
    $id=$_SESSION['admin_id'];

}




$cu=$_GET['url'];

$command="UPDATE  shipper
 SET 
 account_status='0'
 WHERE shipper_id='$cu'";


$edit=mysqli_query($conn,$command);
  

if($edit){
mysqli_close($conn);

echo '<script>alert("Account activated");window.location = "shippers.php";</script>';

exit;

}
else
{
    echo mysqli_error();

}



?>
