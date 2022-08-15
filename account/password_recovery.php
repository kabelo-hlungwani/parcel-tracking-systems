<!DOCTYPE html>
<html lang="en">
<?php

include 'connect.php';

if(isset($_POST['email']) && isset($_POST['cellno']) &&isset($_POST['password'])){
 //Assign
 $accounttype=$_POST['accounttype'];
 $cellno=$_POST['cellno'];
$email=$_POST['email'];
$password=md5($_POST['password']);
//check record
//connect

//customer
$cquery="select * from customer where email='$email'and phone_number='$cellno'";
$cresult=mysqli_query($conn,$cquery) or die(mysqli_error($conn));
$crow=mysqli_fetch_array($cresult);
//shipper
$squery="select * from shipper where email='$email'and phone_number='$cellno'";
$sresult=mysqli_query($conn,$squery) or die(mysqli_error($conn));
$srow=mysqli_fetch_array($sresult);
//admin
$aquery="select * from admin where email='$email'and phone_number='$cellno'";
$aresult=mysqli_query($conn,$aquery) or die(mysqli_error($conn));
$arow=mysqli_fetch_array($aresult);


if($accounttype=='customer')
{


    if($crow !==NULL && strtolower($crow['email'])==strtolower($email) && $crow['phone_number']==$cellno)
    {
         
    
        $command="UPDATE  customer SET password='$password'
        WHERE customer.email='$email'";
        
        
        $edit=mysqli_query($conn,$command);    
        
        if($edit){
        mysqli_close($conn);
        
        $err="SUCCESSFUL";
        $message="Password updated.";
        $_SESSION['message']=$message;
        $message=$_SESSION['message'];
        //
        $_SESSION['err']=$err;
        $err=$_SESSION['err'];
        require 'success.php';
         exit;
        
        }
        else
        {
            echo mysqli_error();
        
        }     
       
    
    }else
    {
    
       
        $err="ERROR";
        $message="Make sure email and phone number are correct.";
        $_SESSION['message']=$message;
        $message=$_SESSION['message'];
        //
        $_SESSION['err']=$err;
        $err=$_SESSION['err'];
        require 'error.php';
         exit;
      
    }


}elseif($accounttype=='shipper')
{


    if($srow !==NULL && strtolower($crow['email'])==strtolower($email) && $srow['phone_number']==$cellno)
    {
         
    
        $command="UPDATE  shipper SET password='$password'
        WHERE shipper.email='$email'";
        
        
        $edit=mysqli_query($conn,$command);    
        
        if($edit){
        mysqli_close($conn);
        
        $err="SUCCESSFUL";
        $message="Password updated.";
        $_SESSION['message']=$message;
        $message=$_SESSION['message'];
        //
        $_SESSION['err']=$err;
        $err=$_SESSION['err'];
        require 'success.php';
         exit;
        
        }
        else
        {
            echo mysqli_error();
        
        }     
       
    
    }else
    {
    
       
        $err="ERROR";
        $message="Make sure email and phone number are correct.";
        $_SESSION['message']=$message;
        $message=$_SESSION['message'];
        //
        $_SESSION['err']=$err;
        $err=$_SESSION['err'];
        require 'error.php';
         exit;
      
    }

}elseif($accounttype=='admin')
{

    if($arow !==NULL && strtolower($arow['email'])==strtolower($email) && $arow['phone_number']==$cellno)
    {
         
    
        $command="UPDATE  admin SET password='$password'
        WHERE admin.email='$email'";
        
        
        $edit=mysqli_query($conn,$command);    
        
        if($edit){
        mysqli_close($conn);
        
        $err="SUCCESSFUL";
        $message="Password updated.";
        $_SESSION['message']=$message;
        $message=$_SESSION['message'];
        //
        $_SESSION['err']=$err;
        $err=$_SESSION['err'];
        require 'success.php';
         exit;
        
        }
        else
        {
            echo mysqli_error();
        
        }     
       
    
    }else
    {
    
       
        $err="ERROR";
        $message="Make sure email and phone number are correct.";
        $_SESSION['message']=$message;
        $message=$_SESSION['message'];
        //
        $_SESSION['err']=$err;
        $err=$_SESSION['err'];
        require 'error.php';
         exit;
      
    }


}else{


    $err="ERROR";
    $message="Make sure email and phone number are correct.";
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
<!--password-->





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

  var cerror=document.getElementById("cerror");
  var error=document.getElementById("error");
  var errormessage=document.getElementById("errorpass");
  var accounttypeerror=document.getElementById("accounttypeerror");

  if(
     document.forms["form"]["cellno"].value==""&&
     document.forms["form"]["accounttype"].value==""&&
     document.forms["form"]["email"].value==""&&
     document.forms["form"]["pwd"].value=="")
  {

    
    cerror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>"
    error.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>"
    errormessage.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>"
    accounttypeerror.innerHTML="<span style='color:red;''>"+" Select Account type please! *</span>"
    return false;
    

  }else
  {
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
//cellno
   var cellno=document.forms["form"]["cellno"].value;
 
  if(cellno=="")
   {

       cerror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>";
      return false;
  
   }
   else if(cellno.substring(0,1)!="0")
    {
 

 cerror.innerHTML="<span style='color:red;''>"+" Cell number must start with 0.*</span>";
 return false;
 }
 else
 if(!cellno.match(/^[0-9]+$/))
 {

 cerror.innerHTML="<span style='color:red;''>"+"field should be filled with number only.*</span>";
 return false;   
 }
 else
 if(cellno.toString().length!=10)
 {
    cerror.innerHTML="<span style='color:red;''>"+"field should be 10 characters.*</span>";    

 return false;   
 }
else if(cellno.substring(0,3)!='071'&& cellno.substring(0,3)!='072'&&
       cellno.substring(0,3)!='073'&& cellno.substring(0,3)!='074'&&
       cellno.substring(0,3)!='076'&& cellno.substring(0,3)!='060'&&
       cellno.substring(0,3)!='061'&& cellno.substring(0,3)!='062'&&
       cellno.substring(0,3)!='063'&& cellno.substring(0,3)!='064'&&
       cellno.substring(0,3)!='065'&& cellno.substring(0,3)!='066'&&
       cellno.substring(0,3)!='067'&& cellno.substring(0,3)!='068'&&
       cellno.substring(0,3)!='081'&& cellno.substring(0,3)!='082'&&
       cellno.substring(0,3)!='083'&& cellno.substring(0,3)!='084')
       {

     cerror.innerHTML="<span style='color:red;''>"+" Surfix of phone number invalid. *</span>"
        return false;
       
    }else
{
    cerror.innerHTML="";

}


//email

   var email=document.forms["form"]["email"].value;
  
   if(email=="")
   {

       error.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>";
      return false;
  
   }
  else
  if(!((email.indexOf(".") > 0) && (email.indexOf("@") > 0)) ||/[^a-zA-Z0-9.@_-]/.test(email))
   {
    error.innerHTML="<span style='color:red;''>"+" Invalid email.*</span>";
   
    return false;
   }
  else
   {
   error.innerHTML="";
   }

   //
    var passd=document.forms["form"]["pwd"].value;
    var cpassd=document.forms["form"]["cpwd"].value;
   
   
   var cerrormessage=document.getElementById("cerrorpass");
   var pass=document.getElementById("pwd").value;

   if(pass=="")
   {

       errorpass.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>";
      return false;
  
   }else
   {
    errorpass.innerHTML="";
   }
  //contain atleast 1 lowercase

  if(!pass.match(/^(?=.*[a-z])/))
  {
      errormessage.innerHTML="<span style='color:red;''>"+" Password should contain atleast 1 lowercase alphabetical character.*</span>";
  return false;
    }
    else
   {
    errormessage.innerHTML="";
   }
//contain atleast 1 uppercase
   if(!pass.match(/^(?=.*[A-Z])/))
  {
      errormessage.innerHTML="<span style='color:red;''>"+" Password should contain atleast 1 uppercase alphabetical character.*</span>";
  return false;
    }
    else
   {
    errormessage.innerHTML="";
   }
//contain atleast 1 numeric
if(!pass.match(/^(?=.*[0-9])/))
  {
      errormessage.innerHTML="<span style='color:red;''>"+" Password should contain atleast 1 numeric character.*</span>"
  return false;
    }
    else
   {
    errormessage.innerHTML="";
   }
//contain special character
if(!pass.match(/^(?=.*[!@#\$%\^&\*])/))
  {
      errormessage.innerHTML="<span style='color:red;''>"+" Password should contain special character.*</span>";
  return false;
    }
    else
   {
    errormessage.innerHTML="";
   }
   //contain 8 or more characters
if(!pass.match(/^(?=.{8,})/))
  {
      errormessage.innerHTML="<span style='color:red;''>"+" Password shouldcontain 8 or more characters.*</span>";
  return false;
    }
    else
   {
    errormessage.innerHTML="";
   }
   //confirm password
//step 1
if(cpassd==""){

cerrorpass.innerHTML="<span style='color:red;''>"+" confirm Password.*</span>";
return false;   
}else
{

cerrorpass.innerHTML="";
}

   if(cpassd!=passd){

    errorpass.innerHTML="<span style='color:red;''>"+" Password doesnt match.*</span>"
    cerrorpass.innerHTML="<span style='color:red;''>"+" Password doesnt match.*</span>"
    return false;   
   }else
   {
    errormessage.innerHTML=""
    cerrormessage.innerHTML=""
   }
  }
   }
  </script>
<body>
    <section class="register-photo">
        <div class="form-container">
            <form name="form" onsubmit="return validateForm();"  method="post"><a class="float-end" href="login.php"><i class="fa fa-close" style="font-size: 27px;color: rgb(188,0,0);"></i></a>
                <h4 class="text-center"><strong>Password Recovery</strong>&nbsp;</h4>
                <div class="mb-3">
                    <select class="form-select" name="accounttype" id="accounttype" style="border-radius: 0px;background: rgb(247,249,252);border-style: none;color: rgb(80,94,108);">
                        <option value="" selected="">Account type</option>
                        <option value="shipper">shipper</option>
                        <option value="customer">customer</option>
                        <option value="admin">admin</option>
                    </select><span id="accounttypeerror"></span></div>
                <div class="mb-3" style="margin-top: 25px;"><input class="form-control" type="text" name="cellno" id="cellno" placeholder="Phone Number" ><span id="cerror"></span></div>
                <div class="mb-3" style="margin-top: 25px;"><input class="form-control" type="email" name="email" placeholder="Email"><span id="error"></span></div>
                <div class="mb-3"><input class="form-control" type="password" name="password" id="pwd" placeholder="New password"><span id="errorpass"></span></div>
                <div class="mb-3"><input class="form-control" type="password" name="Cpassword" id="cpwd" placeholder="Confirm Password (repeat)"><span id="cerrorpass"></span></div>
                <div class="mb-3"><button class="btn btn-success d-block w-100" type="submit" style="border-radius: 0px;">Save Password</button></div>
            </form>
        </div>
    </section>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/Beautiful-Contact-from-animated.js"></script>
</body>

</html>