<?php

include 'connect.php';
if(!isset($_SESSION)) 
{ 
    session_start(); 
    $email=$_SESSION['email'];
    $id=$_SESSION['admin_id'];

}


$qry=mysqli_query($conn,"select * from customer WHERE customer_id='$id'");

$data=mysqli_fetch_array($qry);

$cu=$_GET['url'];

$command="UPDATE  customer
 SET 
 account_status='0'
 WHERE customer_id='$cu'";


$edit=mysqli_query($conn,$command);
  

if($edit){
mysqli_close($conn);

echo '<script>alert("Account activated");window.location = "customers.php";</script>';

exit;

}
else
{
    echo mysqli_error();

}



?>
