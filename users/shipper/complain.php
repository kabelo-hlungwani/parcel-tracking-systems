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



if(isset($_POST['description']))
{
 

$description=$_POST['description'];


   
$command="
INSERT INTO complaints(shipper_id, message) 
            VALUES ('$id','$description')";



$edit=mysqli_query($conn,$command);  


if($edit){
mysqli_close($conn);

echo '<script>alert(" Complain submitted");window.location = "complain.php";</script>';

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
                                                <div class="mb-3"><label class="form-label" for="first_name"><strong>Complain</strong><br></label><textarea class="form-control" name="description" id="description" style="border-radius: 0px;"></textarea><span id="errordesc"></span></div>
                                            </div>
                                        </div>
                                        <div class="mb-3"><button class="btn btn-sm" type="submit" style="border-radius: 0px;background: #bc0000;color: rgb(255,255,255);">Send</button></div>
                                </div>
                               

                           




                            </div>
                        </form>
                          
                        </div>

                        <!--test-->


                        <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Complaints</h3>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12 offset-lg-0">
                            <div class="card shadow mb-3">
                                <div class="card-header py-3">
                                    <p class="m-0 fw-bold" style="color: rgb(188,0,0);">complaints List</p>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr style="background: #bc0000;color: rgb(255,255,255);font-size: 14px;">
                                                    <th>#</th>
                                                    
                                                    <th>Message</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <!-- table area -->
                                            <tbody>
                                            <?PHP
              
             

              //pagination



  if (isset($_GET['page_no']) && $_GET['page_no']!="") {
      $page_no = $_GET['page_no'];
      } else {
          $page_no = 1;
          }
  
      $total_records_per_page = 10;
      $offset = ($page_no-1) * $total_records_per_page;
      $previous_page = $page_no - 1;
      $next_page = $page_no + 1;
      $adjacents = "2"; 
  
      $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM complaints,shipper where complaints.shipper_id =shipper.shipper_id and complaints.shipper_id ='$id'");
      $total_records = mysqli_fetch_array($result_count);
      $total_records = $total_records['total_records'];
      $total_no_of_pages = ceil($total_records / $total_records_per_page);
      $second_last = $total_no_of_pages - 1; // total page minus 1     

     

  

                            

            $query="SELECT * from complaints,shipper where complaints.shipper_id =shipper.shipper_id and complaints.shipper_id ='$id'
            LIMIT $offset, $total_records_per_page";
            $result=mysqli_query($conn,$query);
            
            $rows=mysqli_num_rows($result);
            
           
            
            if ($rows>0) {
              
              ?>
                                            <?php
                                               $x=1;
                                               while ($rows=mysqli_fetch_array($result)) {

                                               
                             
                                             ?>
                                                <tr>
                                                    <td style="font-size: 13px;"><?php echo $x; ?></td>
                                                
                                                    <td style="font-size: 13px;"><?php echo $rows['message']; ?></td>
                                                    <td style="font-size: 13px;"><?php echo $rows['date']; ?></td>
                                                    <td style="font-size: 13px;">
                                                        <p><a class="btn btn-sm" role="button" href="edit_com.php?url=<?php echo $rows['c_id'];?>" style="background: #bc0000;color: rgb(255,255,255);border-radius: 0px;">Edit</a>&nbsp;&nbsp;  <a class="btn btn-sm" href="del_com.php?url=<?php echo $rows['c_id'];?>" role="button" style="color: rgb(255,255,255);background: #bc0000;border-radius: 0px;">Delete</a></p>
                                                    </td>
                                                </tr>
                                                <?php
                                                        $x++;    
                                              
                                                        }
                                                       
                                                    }
                                                        ?>
                                                
                                               
                                            </tbody>
                                        
                                        </table>
                                    </div>
                                   
                                    <div class="container" style="text-align:center">
        <p class="text-center" ><div style='padding: 10px 20px 0px; border-top: dotted 0px #CCC;'>
<strong style="color:white">Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
</div>

<ul class="pagination">
	<?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>
    
	<li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
	<a <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Previous</a>
	</li>
       
    <?php 
	if ($total_no_of_pages <= 10){  	 
		for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
			if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}
        }
	}
	elseif($total_no_of_pages > 10){
		
	if($page_no <= 4) {			
	 for ($counter = 1; $counter < 8; $counter++){		 
			if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}
        }
		echo "<li><a>...</a></li>";
		echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
		echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
		}

	 elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
		echo "<li><a href='?page_no=1'>1</a></li>";
		echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
           if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}                  
       }
       echo "<li><a>...</a></li>";
	   echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
	   echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
            }
		
		else {
        echo "<li><a href='?page_no=1'>1</a></li>";
		echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";

        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}                   
                }
            }
	}
?>
    
	<li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
	<a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Next</a>
	</li>
    <?php if($page_no < $total_no_of_pages){
		echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
		} ?>
</ul></p>
    </div>



                                </div>
                            </div>
                        <!--end-->
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