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

$d=date('Y-m-d');
$t=date('H:i:s');


$command="UPDATE  parcel
 SET 
 delivered='1',dod='$d',time='$t'
 WHERE parcel_id='$pid'and shipper_id='$id'";


$edit=mysqli_query($conn,$command);
  

if($edit){
mysqli_close($conn);

echo '<script>alert("Parcel delivered.");window.location = "accepted parcel.php";</script>';

exit;

}
else
{
    echo mysqli_error();

}



?>
