        <!--session-->
        <?php include 'include/session.php'?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Add complain</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="../assets/css/Map-Clean.css">
    <link rel="stylesheet" href="../assets/css/pagination.css">
</head>
<script>

    
function validateForm() 
{
var perror=document.getElementById("perror");
var errorpic=document.getElementById("errorpic");
var errordesc=document.getElementById("errordesc");
var errororigin=document.getElementById("errororigin");
var errordes=document.getElementById("errordes");
var errorkey=document.getElementById("errorkey");


if(document.forms["form"]["description"].value=="")
{




    errordesc.innerHTML="<span style='color:red;''>"+" please should be filled. *</span>"
    
return false;


}else
{
//name
var name=document.forms["form"]["parcelname"].value;


if(name=="")
{

    perror.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>";
  return false;

}
else if(!name.match(/[a-zA-Z][a-zA-Z ]+[a-zA-Z]$/))
{
perror.innerHTML="<span style='color:red;''>"+" field should contain alphabetical characters.*</span>";
return false;

}else
{

    perror.innerHTML="";  
}

//photo
var photo=document.forms["form"]["photo"].value;



if(photo=="")
{

    errorpic.innerHTML="<span style='color:red;''>"+" field should be selected *</span>";
  return false;


}else if(!(/\.(gif|jpe?g|tiff?|png|webp|bmp)$/i).test(photo))
{
    errorpic.innerHTML="<span style='color:red;''>"+" file extension should be (.jpg,.png,.jpeg,.gif).*</span>";

 
  return false;

}
else
{

    errorpic.innerHTML="";  
}
    //description
    var description=document.forms["form"]["description"].value;


if(description=="")
{

    errordesc.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>";
  return false;

}
else if(description.match(/^(?=.*[!@#\$%\^&\*])/))
{
errordesc.innerHTML="<span style='color:red;''>"+" field should not contain characters.*</span>";
return false;

}else
{

    errordesc.innerHTML="";  
}

    //origin
    var origin=document.forms["form"]["origin"].value;


if(origin=="")
{

    errororigin.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>";
  return false;

}
else if(!origin.match(/[a-zA-Z][a-zA-Z ]+[a-zA-Z]$/))
{
    errororigin.innerHTML="<span style='color:red;''>"+" field should contain alphabetical characters.*</span>";
return false;

}else
{

    errororigin.innerHTML="";  
}
    //destination
    var destination=document.forms["form"]["destination"].value;


if(destination=="")
{

    errordes.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>";
  return false;

}
else if(!destination.match(/[a-zA-Z][a-zA-Z ]+[a-zA-Z]$/))
{
    errordes.innerHTML="<span style='color:red;''>"+" field should contain alphabetical characters.*</span>";
return false;

}else
{

    errordes.innerHTML="";  
}

    //key
    

    var key=document.forms["form"]["key"].value;
   
   if(key=="")
   {
   
       errorkey.innerHTML="<span style='color:red;''>"+" field should not be empty *</span>";
     return false;
   
   }
   else if(key.substring(0,24)!="https://maps.app.goo.gl/")
   {
       errorkey.innerHTML="<span style='color:red;''>"+" Error Track Key NB Get Key on Google Map.*</span>";
   return false;
   
   }else
   {
   
       errorkey.innerHTML="";  
   }



}
}
</script>
<body id="page-top" style="font-family: Poppins, sans-serif;">
    <div id="wrapper">
          <!--nav-->
<?php include 'include/nav.php'?>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Complain</h3>
                    <div class="row mb-3">
                        <div class="col-lg-12 offset-lg-0">
                            <div class="card shadow mb-3">
                                <div class="card-header py-3">
                                    <p class="m-0 fw-bold" style="color: rgb(188,0,0);"> Add Complain</p>
                                </div>

                                <?php

$iid=$_GET['url'];

$qry=mysqli_query($conn,"select * from complaints WHERE c_id='$iid'");
$data=mysqli_fetch_array($qry);

if(isset($_POST['description']))
{
    $description=$_POST['description'];

   


            $command="UPDATE  complaints
            SET 
            message='$description'
            WHERE c_id='$iid'";

$edit=mysqli_query($conn,$command);  


if($edit){
mysqli_close($conn);

echo '<script>alert(" Complain updated successfully");window.location = "complain.php";</script>';

exit;

}






}


?>


                                <div class="card-body">
                                    <form action="" name="form" enctype="multipart/form-data" onsubmit="return validateForm();"  method="post">
                                        <div class="row">
                                          
                                         
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3"><label class="form-label" for="first_name"><strong>Complain</strong><br></label><textarea class="form-control" name="description" id="description" style="border-radius: 0px;"><?php echo $data['message']?></textarea><span id="errordesc"></span></div>
                                            </div>
                                        </div>
                                        <div class="mb-3"><button class="btn btn-sm" type="submit" style="border-radius: 0px;background: #bc0000;color: rgb(255,255,255);">Send</button></div>
                                </div>
                               

                           




                            </div>
                        </form>
                          
                        </div>

    
                                            </div>
                    
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span >Copyright © PTYH 2022</span></div>
                </div>
            </footer>
        </div>
    </div>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/theme.js"></script>
</body>

</html>