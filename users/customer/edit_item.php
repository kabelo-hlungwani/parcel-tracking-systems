     <!--session-->
     <?php include 'include/session.php'?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Add Parcel</title>
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
var perror=document.getElementById("perror");
var errorpic=document.getElementById("errorpic");
var errordesc=document.getElementById("errordesc");
var errororigin=document.getElementById("errororigin");
var errordes=document.getElementById("errordes");
var errorkey=document.getElementById("errorkey");


if(
    document.forms["form"]["parcelname"].value==""&&   
 document.forms["form"]["photo"].value==""
 &&document.forms["form"]["description"].value==""&&
 document.forms["form"]["origin"].value==""
 &&document.forms["form"]["destination"].value==""&&
 document.forms["form"]["key"].value==""

 )
{



    perror.innerHTML="<span style='color:red;''>"+" please should be filled. *</span>"
    errorpic.innerHTML="<span style='color:red;''>"+" please upload an image. *</span>"
    errordesc.innerHTML="<span style='color:red;''>"+" please should be filled. *</span>"
    errororigin.innerHTML="<span style='color:red;''>"+" please should be filled. *</span>"
    errordes.innerHTML="<span style='color:red;''>"+" please should be filled. *</span>"
    errorkey.innerHTML="<span style='color:red;''>"+" please should be filled. *</span>"

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
                    <h3 class="text-dark mb-4">New Parcel</h3>
                    <div class="row mb-3">
                        <div class="col-lg-12 offset-lg-0">
                            <div class="card shadow mb-3">
                                <div class="card-header py-3">
                                    <p class="m-0 fw-bold" style="color: rgb(188,0,0);">Parcel Infomation</p>
                                </div>
                                <?php

$id=$_GET['url'];

$qry=mysqli_query($conn,"select * from parcel WHERE parcel_id='$id'");
$data=mysqli_fetch_array($qry);

if(isset($_POST['parcelname']) &&isset($_POST['description']) &&
   isset($_POST['origin']) &&isset($_POST['destination']) && 
   isset($_POST['key']))
{
    //add image
    $allow=array('jpg');
    $temp=explode(".",$_FILES['photo']['name']);
    $extension=end($temp);
    $upload_file=$_FILES['photo']['name'];
    move_uploaded_file($_FILES['photo']['tmp_name'],"items/".$_FILES['photo']['name']);




$parcelname=$_POST['parcelname'];
$description=$_POST['description'];
$origin=str_replace(' ', '+',$_POST['origin'] );
$destination=str_replace(' ', '+',$_POST['destination'] );

//use google map api for co ordination

$link='https://www.google.com/maps/embed/v1/directions?key=AIzaSyCrTCu8FVMX4YQQSGFA3xhfgs8pDwA12q8&amp;origin='.$origin.'&amp;destination='.$destination.'&amp;zoom=7';


//$link= $origin$destination;
$trackkey=$_POST['key'];

   


            $command="UPDATE  parcel
            SET 
            parcel_name='$parcelname', parcel_image='".$upload_file."',description='$description', origin='$origin', track_key='$trackkey'
            WHERE parcel_id='$id'";

$edit=mysqli_query($conn,$command);  


if($edit){
mysqli_close($conn);

echo '<script>alert(" parcel updated successfully");window.location = "parcel-list.php";</script>';

exit;

}






}


?>



                               <div class="card-body">
                                    <form action="" name="form" enctype="multipart/form-data" onsubmit="return validateForm();"  method="post">
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3"><label class="form-label" for="username"><strong>Parcel Name</strong></label><input class="form-control" type="text" name="parcelname" value="<?php echo $data['parcel_name']?>"  id="parcelname" style="border-radius: 0px;"><span id="perror"></span></div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3"><label class="form-label" for="email"><strong>Parcel Image</strong><br></label><input class="form-control" type="file" name="photo" id="photo" accept="image/x-png,image/jpeg,image/jpg" value="<?php echo $data['parcel_image']?>" style="border-radius: 0px;"><span id="errorpic"></span></div>
                                                <input hidden name="stiker" value="<?php echo $data['parcel_image']?>" >
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3"><label class="form-label" for="first_name"><strong>Description</strong><br></label><textarea class="form-control" name="description" id="description" style="border-radius: 0px;"><?php echo $data['description']?></textarea><span id="errordesc"></span></div>
                                            </div>
                                        </div>
                                    
                                </div>
                            </div>
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <p class="m-0 fw-bold" style="color: rgb(188,0,0);">Location information</p>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3"><label class="form-label" for="city"><strong>Origin</strong><br></label><input class="form-control" type="text" name="origin" id="origin" style="border-radius: 0px;" value="<?php echo str_replace('+', ' ',$data['origin'] )?>" placeholder="e.g bloed street mall, pretoria"><span id="errororigin"></span></div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3"><label class="form-label" for="city"><strong>Destination</strong><br></label><input class="form-control" type="text" name="destination" id="destination" style="border-radius: 0px;" value="<?php echo str_replace('+', ' ',$data['destination'] )?>" placeholder="e.g crossing mall, soshanguve"><span id="errordes"></span></div>
                                            </div>
                                        </div>
                                    
                                </div>
                            </div>
                            <div class="card shadow" style="margin-top: 14px;">
                                <div class="card-header py-3">
                                    <p class="m-0 fw-bold" style="color: rgb(188,0,0);">Tracking information</p>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3"><label class="form-label" for="city"><strong>Tracker Key</strong><br></label><input class="form-control" type="url" name="key" id="key" value="<?php echo $data['track_key']?>" style="border-radius: 0px;"><span id="errorkey"></span></div>
                                            </div>
                                        </div>
                                        <div class="mb-3"><button class="btn btn-sm" type="submit" style="border-radius: 0px;background: #bc0000;color: rgb(255,255,255);">update the parcel</button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="row mb-3 d-none">
                                <div class="col">
                                    <div class="card textwhite bg-primary text-white shadow">
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col">
                                                    <p class="m-0">Peformance</p>
                                                    <p class="m-0"><strong>65.2%</strong></p>
                                                </div>
                                                <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                            </div>
                                            <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card textwhite bg-success text-white shadow">
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col">
                                                    <p class="m-0">Peformance</p>
                                                    <p class="m-0"><strong>65.2%</strong></p>
                                                </div>
                                                <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                            </div>
                                            <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow mb-5"></div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span style="font-size: 16px;">Copyright © PTYH 2022</span></div>
                </div>
            </footer>
        </div>
    </div>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/theme.js"></script>
</body>

</html>