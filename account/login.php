<!DOCTYPE html>
<html lang="en">
<?php
 
 //connection
 include 'connect.php'; 
if(isset($_POST['email']) && isset($_POST['password'])){
 
//Assign

$email=$_POST['email'];
$password=md5($_POST['password']);
$accounttype=$_POST['accounttype'];
 session_start();

//check record customer
$query="select * from customer where email='$email'and password='$password'";
$result=mysqli_query($conn,$query) or die(mysqli_error($conn));
$row=mysqli_fetch_array($result);
//check record shipper
$squery="select * from shipper where email='$email'and password='$password'";
$sresult=mysqli_query($conn,$squery) or die(mysqli_error($conn));
$srow=mysqli_fetch_array($sresult);
//check record admin
$aquery="select * from admin where email='$email'and password='$password'";
$aresult=mysqli_query($conn,$aquery) or die(mysqli_error($conn));
$arow=mysqli_fetch_array($aresult);

if($accounttype=="customer")
{
    if($row !==NULL && strtolower($row['email'])==strtolower($email) && $row['account_status']=='1')
    {
    
        $err="NOTICE";
        $message="Your Account has been suspended Please contact the admin.";
        $_SESSION['message']=$message;
        $message=$_SESSION['message'];
        //
        $_SESSION['err']=$err;
        $err=$_SESSION['err'];
        require 'error.php';
         exit;
    
    
    }elseif($row !==NULL && strtolower($row['email'])==strtolower($email) && $row['password']==$password && $row['account_status']=='0')
    {
    
    
       
        $_SESSION['email']=$row['email'];
        $email=$_SESSION['email'];
        $_SESSION['customer_id']=$row['customer_id'];
        $id=$_SESSION['customer_id'];
        echo'<script>alert("Login was successful")</script>'; 
      
        header('Location: ../users/customer/index.php');
        
        
    
    }else
    {

        $err="NOTICE";
        $message="Customer email doesnt match records in the database.";
        $_SESSION['message']=$message;
        $message=$_SESSION['message'];
        //
        $_SESSION['err']=$err;
        $err=$_SESSION['err'];
        require 'error.php';
         exit;

    }

}elseif($accounttype=="shipper")
{
    if($srow !==NULL && strtolower($srow['email'])==strtolower($email) && $srow['account_status']=='1')
    {
    
        $err="NOTICE";
        $message="Your Account has been suspended Please contact the admin.";
        $_SESSION['message']=$message;
        $message=$_SESSION['message'];
        //
        $_SESSION['err']=$err;
        $err=$_SESSION['err'];
        require 'error.php';
         exit;
    
    
    }elseif($srow !==NULL && strtolower($srow['email'])==strtolower($email) && $srow['password']==$password && $srow['account_status']=='0')
    {
    
    
       
        $_SESSION['email']=$srow['email'];
        $email=$_SESSION['email'];
        $_SESSION['shipper_id']=$srow['shipper_id'];
        $id=$_SESSION['shipper_id'];
        echo'<script>alert("Login was successful")</script>'; 
      
        header('Location: ../users/shipper/index.php');
        
        
    
    }else
    {

        $err="NOTICE";
        $message="Shipper email doesnt match records in the database.";
        $_SESSION['message']=$message;
        $message=$_SESSION['message'];
        //
        $_SESSION['err']=$err;
        $err=$_SESSION['err'];
        require 'error.php';
         exit;

    }

}elseif($accounttype=="admin")
{
  if($arow !==NULL && strtolower($arow['email'])==strtolower($email) && $arow['password']==$password )
    {
    
    
       
        $_SESSION['email']=$arow['email'];
        $email=$_SESSION['email'];
        $_SESSION['admin_id']=$arow['admin_id'];
        $id=$_SESSION['admin_id'];
        echo'<script>alert("Login was successful")</script>'; 
      
        header('Location: ../users/admin/index.php');
        
        
    
    }else
    {

        $err="NOTICE";
        $message="Youre credentials confirms that youre not an admin.";
        $_SESSION['message']=$message;
        $message=$_SESSION['message'];
        //
        $_SESSION['err']=$err;
        $err=$_SESSION['err'];
        require 'error.php';
         exit;

    }


}else
{

    $err="NOTICE";
    $message="Wrong email or password.";
    $_SESSION['message']=$message;
    $message=$_SESSION['message'];
    //
    $_SESSION['err']=$err;
    $err=$_SESSION['err'];
    require 'error.php';
     exit;
}

}

?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Authentication-Login</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins&amp;display=swap">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="../assets/css/Beautiful-Contact-from-animated.css">
    <link rel="stylesheet" href="../assets/css/Customizable-Background--Overlay.css">
    <link rel="stylesheet" href="../assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="../assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<script>

    
function validateForm() 
{
var uerror=document.getElementById("uerror");
var perror=document.getElementById("perror");
var accounttypeerror=document.getElementById("accounttypeerror");

if(document.forms["form"]["email"].value=="" && document.forms["form"]["password"].value==""&& document.forms["form"]["accounttype"].value=="")
{

uerror.innerHTML="<span style='color:red;''>"+" Email field should not be empty *</span>"
perror.innerHTML="<span style='color:red;''>"+"Password field should not be empty *</span>"
accounttypeerror.innerHTML="<span style='color:red;''>"+" Select Account type please! *</span>"

return false;

}else
if(document.forms["form"]["email"].value=="")
{

uerror.innerHTML="<span style='color:red;''>"+"Please fill the email field *</span>"

return false;

}else if(document.forms["form"]["password"].value=="")
{


perror.innerHTML="<span style='color:red;''>"+" Please fill the password field *</span>"

return false;

}

//account type

var accounttype=document.forms["form"]["accounttype"].value;


if(accounttype=="")
{

    accounttypeerror.innerHTML="<span style='color:red;''>"+"account type field should be selected *</span>";
  return false;


}else
{

    accounttypeerror.innerHTML="";  
}

}
</script>
<body>
    <section class="register-photo">
        <div class="form-container">
            <form name="form" onsubmit="return validateForm();"  method="post"><a class="float-end" href="../index.php"><i class="fa fa-close" style="font-size: 27px;color: rgb(188,0,0);"></i></a>
                <h4 class="text-center"><strong>Login</strong>&nbsp;</h4>
                <div class="mb-3">
                    <select class="form-select" name="accounttype" id="accounttype" style="border-radius: 0px;background: rgb(247,249,252);border-style: none;color: rgb(80,94,108);">
                        <option value="" selected="">Account type</option>
                        <option value="shipper">shipper</option>
                        <option value="customer">customer</option>
                        <option value="admin">admin</option>
                    </select><span id="accounttypeerror"></span></div>
                <div class="mb-3" style="margin-top: 25px;"><input class="form-control" type="email" name="email" placeholder="Email"><span id="uerror"></span></div>
                <div class="mb-3"><input class="form-control" type="password" name="password" placeholder="Password"><span id="perror"></span></div>
                <div class="mb-3"><button class="btn btn-success d-block w-100" type="submit" style="border-radius: 0px;">Sign in</button></div><a class="already" href="register.php" style="font-size: 15px;">You have no account? register here.</a><a class="already" href="password_recovery.php" style="font-size: 15px;">Forgot password? click here.</a>
            </form>
        </div>
    </section>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/Beautiful-Contact-from-animated.js"></script>
</body>

</html>