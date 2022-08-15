        <!--session-->
        <?php include 'include/session.php'?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Profile</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="../assets/css/Map-Clean.css">
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
var ierror=document.getElementById("ierror");

if(document.forms["form"]["name"].value==""&&
 document.forms["form"]["surname"].value==""&&
 document.forms["form"]["gender"].value==""&&
 document.forms["form"]["idno"].value==""&&
 document.forms["form"]["cellno"].value==""

 )
{

nerror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>"
serror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>"


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
//

//
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



}
}
</script>







<script>

    
function validate() 
{





var errormessage=document.getElementById("errorpass");
var ierror=document.getElementById("ierror");

if(document.forms["form1"]["pwd"].value=="")
{

errormessage.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>"

return false;


}else
{


//
var passd=document.forms["form1"]["pwd"].value;
var cpassd=document.forms["form1"]["cpwd"].value;




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
<body id="page-top" style="font-family: Poppins, sans-serif;">
    <div id="wrapper">
            <!--nav-->
<?php include 'include/nav.php'?>
    
<?php





$qry=mysqli_query($conn,"select * from customer WHERE customer_id='$id'");
$data=mysqli_fetch_array($qry);


if(isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['gender'])&& isset($_POST['email']) &&isset($_POST['cellno']) && isset($_POST['idno']))
{

    
    
$name=$_POST['name'];
$surname=$_POST['surname'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$cellno=$_POST['cellno'];


$idno=$_POST['idno'];
//$password=md5($_POST['password']);
  

  
$command="UPDATE  customer
 SET 
 firstname='$name', lastname='$surname',id_number='$idno', gender='$gender', email='$email', phone_number='$cellno'
 WHERE customer_id='$id'";



$edit=mysqli_query($conn,$command);
  

if($edit){
mysqli_close($conn);

     
echo '<script>alert("Information Updated.");window.location = "profile.php";</script>';

exit;

}
else
{
    echo mysqli_error();

}
}


?>
                    <h3 class="text-dark mb-4">Profile</h3>
                    <div class="row mb-3">
                        <div class="col-lg-12 offset-lg-0">
                            <div class="card shadow mb-3">
                                <div class="card-header py-3">
                                    <p class="m-0 fw-bold" style="color: rgb(188,0,0);">User Details</p>
                                </div>
                                <div class="card-body">
                                    <form action="" name="form" onsubmit="return validateForm();" method="post">
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3"><label class="form-label" for="username"><strong>First Name</strong></label><input class="form-control" type="text" id="name" value="<?php echo $data['firstname']?>" name="name" style="border-radius: 0px;"><span id="nerror"></span></div>
                                            </div>
                                            
                                            <div class="col">
                                                <div class="mb-3"><label class="form-label" for="email"><strong>Last Name</strong><br></label><input class="form-control" type="text" value="<?php echo $data['lastname']?>" name="surname" id="surname"style="border-radius: 0px;"><span id="serror"></span></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3"><label class="form-label" for="first_name"><strong>Identity Number</strong><br></label><input class="form-control" type="text" value="<?php echo $data['id_number']?>" name="idno" id="idno" style="border-radius: 0px;" readonly=""><span id="iderror"></span></div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3"><label class="form-label" for="last_name"><strong>Gender</strong><br></label><input class="form-control" type="text" value="<?php echo $data['gender']?>" id="gender" name="gender" readonly="" style="border-radius: 0px;"><span id="gerror"></span></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3"><label class="form-label" for="first_name"><strong>Email&nbsp;</strong><br></label><input class="form-control" type="email" id="email"  value="<?php echo $data['email']?>" name="email"  style="border-radius: 0px;" readonly=""><span id="error"></div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3"><label class="form-label" for="last_name"><strong>Phone Number</strong><br></label><input class="form-control" type="text" name="cellno" id="cellno"  value="<?php echo $data['phone_number']?>" style="border-radius: 0px;"><span id="cerror"></span></div>
                                            </div>
                                        </div>
                                        <div class="mb-3"><button class="btn btn-sm" type="submit" style="background: rgb(188,0,0);border-radius: 0px;color: rgb(255,255,255);">Save</button></div>
                                    </form>
                                </div>
                            </div>
                           

                            
                            <?php


                            if(isset($_POST['password']))
                        {
                            $password=md5($_POST['password']);
  

  
                            $com="UPDATE  customer
                            SET 
                            password='$password'
                            WHERE customer_id='$id'";



                            $e=mysqli_query($conn,$com);
  

                            if($e){
                                mysqli_close($conn);

     
                                echo '<script>alert("Password Changed.");window.location = "profile.php";</script>';

                                exit;

                                }
                                else
                                {
                                    echo mysqli_error();

                                }
                            }


                                    ?>

                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <p class="m-0 fw-bold" style="color: rgb(188,0,0);">Change Password</p>
                                </div>
                                <div class="card-body">
                                    <form action="" name="form1" onsubmit="return validate();" method="post">
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3"><label class="form-label" for="city"><strong>New Password</strong><br></label><input class="form-control" type="password" name="password" id="pwd" style="border-radius: 0px;"><span id="errorpass"></span></div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3"><label class="form-label" for="country"><strong>Confirm Password</strong><br></label><input class="form-control" type="password" name="Cpassword" id="cpwd" style="border-radius: 0px;"><span id="cerrorpass"></span></div>
                                            </div>
                                        </div>
                                        <div class="mb-3"><button class="btn btn-sm" type="submit" style="border-radius: 0px;background: #bc0000;color: rgb(255,255,255);">Save&nbsp;</button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span >Copyright © PTYH 2022</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/theme.js"></script>
</body>

</html>