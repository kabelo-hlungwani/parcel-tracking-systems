<?php

include 'connect.php';
if(!isset($_SESSION)) 
{ 
    session_start(); 
    $email=$_SESSION['email'];
    $id=$_SESSION['shipper_id'];

}

$pid=$_GET['url'];

$qry=mysqli_query($conn,"select * from parcel WHERE parcel_id='$id'");

$data=mysqli_fetch_array($qry);




$command="UPDATE  parcel
 SET 
 shipper_id='$id'
 WHERE parcel_id='$pid'";


$edit=mysqli_query($conn,$command);
  

if($edit){
mysqli_close($conn);

echo '<script>alert("Parcel accepted for shipping service.");window.location = "accepted parcel.php";</script>';

exit;

}
else
{
    echo mysqli_error();

}



?>
