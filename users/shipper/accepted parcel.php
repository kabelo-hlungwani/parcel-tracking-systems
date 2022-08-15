<!--nav-->
<?php include 'include/session.php'?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Accepted parcel</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="../assets/css/Map-Clean.css">
    <link rel="stylesheet" href="../assets/css/pagination.css">
</head>

<body id="page-top" style="font-family: Poppins, sans-serif;">
    <div id="wrapper">
<!--nav-->
<?php include 'include/nav.php'?>
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Accepted parcels</h3>
                    </div>
   
                    <div class="row mb-3">
                        <div class="col-lg-12 offset-lg-0">
                            <div class="card shadow mb-3">
                                <div class="card-header py-3">
                                    <p class="m-0 fw-bold" style="color: rgb(188,0,0);">Accepted Parcel List</p>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr style="background: #bc0000;color: rgb(255,255,255);font-size: 14px;">
                                                    <th>Parcel Image</th>
                                                    <th>Parcel Name</th>
                                                    <th colspan="3">Description</th>
                                                    <th colspan="3"><i class="fa fa-map-marker"></i>&nbsp; Location information</th>
                                                    <th colspan="3"><i class="fa fa-cogs"></i>&nbsp;status</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                
                                            <?PHP
              
             

              //pagination



  if (isset($_GET['page_no']) && $_GET['page_no']!="") {
      $page_no = $_GET['page_no'];
      } else {
          $page_no = 1;
          }
  
      $total_records_per_page = 3;
      $offset = ($page_no-1) * $total_records_per_page;
      $previous_page = $page_no - 1;
      $next_page = $page_no + 1;
      $adjacents = "2"; 
  
      $result_count = mysqli_query($conn,"SELECT COUNT(*) As total_records FROM `parcel` where shipper_id='$id' and delivered='0'");
      $total_records = mysqli_fetch_array($result_count);
      $total_records = $total_records['total_records'];
      $total_no_of_pages = ceil($total_records / $total_records_per_page);
      $second_last = $total_no_of_pages - 1; // total page minus 1     

     

  

                            

            $query="SELECT * from parcel where shipper_id='$id'and delivered='0'
            LIMIT $offset, $total_records_per_page";
            $result=mysqli_query($conn,$query);
            
            $rows=mysqli_num_rows($result);
            
           
            
            if ($rows>0) {
              
              ?>
                                            <?php
                                               
                                               while ($rows=mysqli_fetch_array($result)) {
                                             ?>
                                                <tr>
                                                    <td style="font-size: 13px;"><img src="../customer/items/<?php echo $rows['parcel_image'];?>" style="height: 100px;width: 120px;"></td>
                                                    <td style="font-size: 13px;"><?php echo $rows['parcel_name'];?></td>
                                                    <td colspan="3" style="font-size: 13px;"><?php echo $rows['description'];?></td>
                                                    <td colspan="3" style="font-size: 13px;"><iframe allowfullscreen frameborder="0" src="<?php echo $rows['location_link'] ?>" loading="lazy" width="100%" height="400" style="height: 115px;width: 175px;"></iframe></td>
                                                    <td colspan="3">
                                                        <p><a class="btn btn-sm" role="button" href="complete.php?url=<?php echo $rows['parcel_id'] ?>" style="background: #bc0000;color: rgb(255,255,255);border-radius: 0px;">Complete</a>&nbsp;<a class="btn btn-sm" href="shipping-cancel.php?url=<?php echo $rows['parcel_id'] ?>" role="button" style="background: #bc0000;color: rgb(255,255,255);border-radius: 0px;">Cancel</a>&nbsp;</p>
                                                    </td>
                                                </tr>
                                                <?php
                                                            
                  
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