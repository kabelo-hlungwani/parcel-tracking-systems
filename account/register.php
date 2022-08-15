<!DOCTYPE html>
<html lang="en">

<?php

include 'connect.php'; 

if(isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['dob']) && isset($_POST['dob1']) && isset($_POST['idno'])
&& isset($_POST['gender']) && isset($_POST['email']) && isset($_POST['cellno']) && isset($_POST['accounttype']) && isset($_POST['password']))
{
    //start session
    session_start();
//variables
    $name=$_POST['name'];
    $surname=$_POST['surname'];
    $year=$_POST['dob'];
    $dob=$_POST['dob1'];
    $idno=$_POST['idno'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $cellno=$_POST['cellno'];
    $accounttype=$_POST['accounttype'];
    //hash up password
    $password=md5($_POST['password']);
    
    //customer
    $cquery="select * from customer where email='$email'";
    $cresult=mysqli_query($conn,$cquery) or die(mysqli_error($conn));
    $crow=mysqli_fetch_array($cresult);
    //shipper
    $squery="select * from shipper where email='$email'";
    $sresult=mysqli_query($conn,$squery) or die(mysqli_error($conn));
    $srow=mysqli_fetch_array($sresult);
    //admin
    $aquery="select * from admin where email='$email'";
    $aresult=mysqli_query($conn,$aquery) or die(mysqli_error($conn));
    $arow=mysqli_fetch_array($aresult);
    //
    //space
    //
    if($accounttype=='customer')
    {


      if($crow !== NULL && $crow['email']==$email)
      {
      
      
       $err="NOTICE";
       $message="Email exists within the database.";
       $_SESSION['message']=$message;
       $message=$_SESSION['message'];
     //
     $_SESSION['err']=$err;
     $err=$_SESSION['err'];
       require 'success.php';
       exit;
      
      }                         
      else{
      
      $sql="INSERT INTO customer(firstname, lastname,id_number,gender,phone_number,email,password,account_status) 
                     VALUES ('$name','$surname','$dob$idno','$gender','$cellno','$email','$password','0')";
      
      
      
                          
      
                  if(mysqli_query($conn,$sql))
                  {
                      $err="CUSTOMER ACCOUNT CREATED SUCCESSFULLY";
                      $message="Thanks for Registering your account with us.";
                      $_SESSION['message']=$message;
                      $message=$_SESSION['message'];
                      //
                      $_SESSION['err']=$err;
                      $err=$_SESSION['err'];
  
                      require 'success.php';
                      exit;
               
                                                               
                }
                else{
                  
                 die("<h3>unsuccessfully not registered </h3>".mysqli_error($conn));
               
               }
             }
  

    }elseif($accounttype=='shipper')
    {


      if($srow !== NULL && $srow['email']==$email)
      {
      
      
       $err="NOTICE";
       $message="Email exists within the database.";
       $_SESSION['message']=$message;
       $message=$_SESSION['message'];
     //
     $_SESSION['err']=$err;
     $err=$_SESSION['err'];
       require 'success.php';
       exit;
      
      }                         
      else{
      
      $sql="INSERT INTO shipper(firstname, lastname,id_number,gender,phone_number,email,password,account_status) 
                     VALUES ('$name','$surname','$dob$idno','$gender','$cellno','$email','$password','0')";
      
      
      
                          
      
                  if(mysqli_query($conn,$sql))
                  {
                      $err="SHIPPER ACCOUNT CREATED SUCCESSFULLY";
                      $message="Thanks for Registering your account with us.";
                      $_SESSION['message']=$message;
                      $message=$_SESSION['message'];
                      //
                      $_SESSION['err']=$err;
                      $err=$_SESSION['err'];
  
                      require 'success.php';
                      exit;
               
                                                               
                }
                else{
                  
                 die("<h3>unsuccessfully not registered </h3>".mysqli_error($conn));
               
               }
             }
  

    }
   


}

   
   
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Authentication-Registration</title>
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
var nerror=document.getElementById("nerror");
var serror=document.getElementById("serror");
var gerror=document.getElementById("gerror");
var cerror=document.getElementById("cerror");
var error=document.getElementById("error");
var iderror=document.getElementById("iderror");
var standerror=document.getElementById("standerror");
var streeterror=document.getElementById("streeterror");
var suberror=document.getElementById("suberror");
var cityerror=document.getElementById("cityerror");
var proverror=document.getElementById("proverror");

var accounttypeerror=document.getElementById("accounttypeerror");


var errormessage=document.getElementById("errorpass");
var ierror=document.getElementById("ierror");

if(document.forms["form"]["name"].value==""&&
 document.forms["form"]["surname"].value==""&&
 document.forms["form"]["gender"].value==""&&
 document.forms["form"]["idno"].value==""&&
 document.forms["form"]["cellno"].value==""&&
 document.forms["form"]["email"].value==""&&
 


 document.forms["form"]["accounttype"].value==""&&

 document.forms["form"]["pwd"].value==""

 )
{

nerror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>"
serror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>"
doberror.innerHTML="<span style='color:red;''>"+" select Date of birth. *</span>"
gerror.innerHTML="<span style='color:red;''>"+" select gender please!*</span>"
cerror.innerHTML="<span style='color:red;''>"+" field should not be empty*</span>"
error.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>"
iderror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>"


accounttypeerror.innerHTML="<span style='color:red;''>"+" Select Account type please! *</span>"

errormessage.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>"

return false;


}else
{
//name 
var name=document.forms["form"]["name"].value;


if(name=="")
{

   nerror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>";
  return false;

}else if(!name.match(/[a-zA-Z][a-zA-Z ]+[a-zA-Z ]$/))
{
nerror.innerHTML="<span style='color:red;''>"+" field should contain alphabetical characters.*</span>";
return false;

}else
{

nerror.innerHTML=""; 
}
//surname

var surname=document.forms["form"]["surname"].value;


if(surname=="")
{

   serror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>";
  return false;

}
else if(!surname.match(/[a-zA-Z][a-zA-Z ]+[a-zA-Z]$/))
{
serror.innerHTML="<span style='color:red;''>"+" field should contain alphabetical characters.*</span>";
return false;

}else
{

serror.innerHTML="";  
}
//id


var Idno=document.forms["form"]["idno"].value;


var dob=document.forms["form"]["dob"].value;

if(dob=="")
{
   doberror.innerHTML="<span style='color:red;''>"+"select Date of birth.*</span>";
   return false;
}else
{

    doberror.innerHTML="";
}

var year=document.getElementById('dob').value;
        var month=document.getElementById('dob').value;
        var day=document.getElementById('dob').value;
        //day.substring(7,5)
         var id=year.substring(2,4)+ month.substring(7,5)+day.substring(10,8);

        document.getElementById('dob1').value = id;
if(Idno=="")
{

  iderror.innerHTML="<span style='color:red;''>"+" field should not be empty. *</span>"
return false;

}else
if(Idno.toString().length!=7)
{

iderror.innerHTML="<span style='color:red;''>"+" Please check the field length,it should be 7. *</span>"
return false;

}
else 
if(!Idno.match(/^[0-9]+$/))
{

iderror.innerHTML="<span style='color:red;''>"+"field should be filled with number only. *</span>"
return false;  
}else
{
    iderror.innerHTML=""; 
}
//addtional

      
        //add2

        var cit=Idno.substring(5,4);
   if(cit!="0")
   {
 
   iderror.innerHTML="<span style='color:red;''>"+" Invalid Id Number,Youre not a RSA citizen. *</span>"
return false;    
   }

var cite=Idno.substring(6,5);
   if(cite!="8")
   {
    iderror.innerHTML="<span style='color:red;''>"+" Invalid Rsa Id Number. *</span>"
return false;    
   }   
  else
{
  iderror.innerHTML="";

}

//addtional

//check year


var gender=Idno.substring(0,1);


if(gender <= "4")
{
  
  document.forms["form"]["gender"].value="Female";


}else
{

  document.forms["form"]["gender"].value="Male";
 
}

//gender
var gender=document.forms["form"]["gender"].value;


if(gender=="")
{

   gerror.innerHTML="<span style='color:red;''>"+" Gender missing *</span>";
  return false;


}else
{

gerror.innerHTML="";  
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
}else if(email.slice(-3)!="com" && email.slice(-5)!="ac.za" && email.slice(-6)!="gov.za" && email.slice(-3)!="org" && email.slice(-5)!="co.za")
{
  error.innerHTML="<span style='color:red;''>"+" Invalid email.*</span>";

return false;
}
else
{
error.innerHTML="";
}

//cellno
var cellno=document.forms["form"]["cellno"].value;

if(cellno=="")
{

   cerror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>";
  return false;

}
if(cellno.substring(0,3)!='071'&& cellno.substring(0,3)!='072'&&
   cellno.substring(0,3)!='073'&& cellno.substring(0,3)!='074'&&
   cellno.substring(0,3)!='076'&& cellno.substring(0,3)!='060'&&
   cellno.substring(0,3)!='078'&& cellno.substring(0,3)!='079'&&
   cellno.substring(0,3)!='061'&& cellno.substring(0,3)!='062'&&
   cellno.substring(0,3)!='063'&& cellno.substring(0,3)!='064'&&
   cellno.substring(0,3)!='065'&& cellno.substring(0,3)!='066'&&
   cellno.substring(0,3)!='067'&& cellno.substring(0,3)!='068'&&
   cellno.substring(0,3)!='010'&& cellno.substring(0,3)!='011'&&
   cellno.substring(0,3)!='012'&& cellno.substring(0,3)!='013'&&
   cellno.substring(0,3)!='014'&& cellno.substring(0,3)!='015'&&
   cellno.substring(0,3)!='016'&& cellno.substring(0,3)!='017'&&
   cellno.substring(0,3)!='018'&& cellno.substring(0,3)!='021'&&
   cellno.substring(0,3)!='022'&& cellno.substring(0,3)!='023'&&
   cellno.substring(0,3)!='027'&& cellno.substring(0,3)!='028'&&
   cellno.substring(0,3)!='031'&& cellno.substring(0,3)!='032'&&
   cellno.substring(0,3)!='033'&& cellno.substring(0,3)!='034'&&
   cellno.substring(0,3)!='035'&& cellno.substring(0,3)!='036'&&
   cellno.substring(0,3)!='039'&& cellno.substring(0,3)!='040'&&
   cellno.substring(0,3)!='041'&& cellno.substring(0,3)!='042'&&
   cellno.substring(0,3)!='043'&& cellno.substring(0,3)!='044'&&
   cellno.substring(0,3)!='045'&& cellno.substring(0,3)!='046'&&
   cellno.substring(0,3)!='047'&& cellno.substring(0,3)!='048'&&
   cellno.substring(0,3)!='049'&& cellno.substring(0,3)!='051'&&
   cellno.substring(0,3)!='053'&& cellno.substring(0,3)!='054'&&
   cellno.substring(0,3)!='056'&& cellno.substring(0,3)!='057'&&
   cellno.substring(0,3)!='058'&& 
   cellno.substring(0,3)!='083'&& cellno.substring(0,3)!='084')
   {

 cerror.innerHTML="<span style='color:red;''>"+" Surfix of phone number invalid. *</span>"
    return false;
   
}
else if(cellno.substring(0,1)!="0")
{


cerror.innerHTML="<span style='color:red;''>"+" cellno number must start with 0.*</span>";
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
else
{
cerror.innerHTML="";

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

//
var passd=document.forms["form"]["pwd"].value;
var cpassd=document.forms["form"]["cpwd"].value;




var cerrormessage=document.getElementById("cerrorpass");
var pass=document.getElementById("pwd").value;

if(pass=="")
{

   errormessage.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>";
  return false;

}else
{
errormessage.innerHTML="";
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

cerrormessage.innerHTML="<span style='color:red;''>"+" confirm Password.*</span>";
return false;   
}else
{

cerrormessage.innerHTML="";
}




if(cpassd!=passd){

errormessage.innerHTML="<span style='color:red;''>"+" Password doesnt match.*</span>"
cerrormessage.innerHTML="<span style='color:red;''>"+" Password doesnt match.*</span>"
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
            <form name="form" onsubmit="return validateForm();" method="post"><a class="float-end" href="../index.php"><i class="fa fa-close" style="font-size: 27px;color: rgb(188,0,0);"></i></a>
                <h4 class="text-center"><strong>Create</strong> an account.</h4>
                <div class="mb-3"><label class="form-label">First Name</label><input class="form-control" type="text" name="name" id="name" placeholder="e.g Mighty"><span id="nerror"></span></div>
            
                <div class="mb-3"><label class="form-label">Last Name</label>
                    <input class="form-control" type="text" name="surname"  id="surname" placeholder="e.g Doe"><span id="serror"></span></div>
                <div class="mb-3"><label class="form-label">Date of Birth</label><input class="form-control" name="dob"  id="dob" max="2004-12-31" min="1960-01-31" type="date"><span id="doberror"></span></div>
                <div class="mb-3"><label class="form-label">Identity Number</label>
                    <div class="input-group"><input class="form-control" type="text" maxlength="6" name="dob1" id="dob1"  placeholder="DOB" readonly="" style="margin-right: 4px;"><input class="form-control" type="text"  id="idno" name="idno" maxlength="7" placeholder="Complete ID" style="background: rgb(247, 249, 252);"><span id="iderror"></span></div>
                </div>
                <div class="mb-3"><label class="form-label">Gender</label>
                    <div class="form-check" style="font-size: 16px;"><input class="form-check-input" type="radio" name="gender"   maxlength="13" id="gender" value="Male"><label class="form-check-label" for="formCheck-1">Male</label></div>
                    <div class="form-check" style="font-size: 16px;"><input class="form-check-input" type="radio" name="gender"   maxlength="13" id="gender" value="Female"><label class="form-check-label" for="formCheck-3">Female</label></div>
                    <div class="form-check" style="font-size: 16px;"><input class="form-check-input" type="radio" name="gender"   maxlength="13" id="gender" value="Other"><label class="form-check-label" for="formCheck-2">Other</label></div>
                    <span id="gerror"></span></div>
                <div class="mb-3"><label class="form-label">Phone Number</label><input class="form-control" type="text"name="cellno" id="cellno" placeholder="e.g 0721234567" placeholder="Phone number"><span id="cerror"></span></div>
                <div class="mb-3"><label class="form-label">Email</label><input class="form-control" type="email"  name="email" id="email" placeholder="e.g user@email.com"><span id="error"></span></div>
                <div class="mb-3"><label class="form-label">Account Type</label><select class="form-select" name="accounttype" id="accounttype" style="border-radius: 0px;background: rgb(247,249,252);border-style: none;color: rgb(80,94,108);">
                        <option value="" selected="">Account type</option>
                        <option value="shipper">shipper</option>
                        <option value="customer">customer</option>
                    </select><span id="accounttypeerror"></span></div>
                <div class="mb-3"><label class="form-label">Password</label><input class="form-control" type="password" name="password" id="pwd" placeholder="Your password"><span id="errorpass"></span></div>
                <div class="mb-3"><label class="form-label">Confirm Password</label><input class="form-control" type="password" name="Cpassword" id="cpwd" placeholder="Password (repeat)"><span id="cerrorpass"></span></div>
                <div class="mb-3"><button class="btn btn-success d-block w-100" type="submit" name"send" style="border-radius: 0px;">Sign Up</button></div><a class="already" href="login.php" style="font-size: 15px;">You already have an account? Login here.</a>
            </form>
        </div>
    </section>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/Beautiful-Contact-from-animated.js"></script>
</body>

</html>