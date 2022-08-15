<!--session-->
<?php include 'include/session.php'?>
<!DOCTYPE html>
<html>
<?php

$datebegan=$_POST['1date'];
$lastdate=$_POST['2date'];

$newdate=date("d-m-Y",strtotime($datebegan));
$ldate=date("d-m-Y",strtotime($lastdate));


?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Report</title>
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
  <!--navbar-->
  <?php include 'include/nav.php';?>
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Report</h3>
                    </div><!--filter-->
                                <?php  require'report/datefilter.php';?><br>
                    <div class="row mb-3">
                        <div class="col-lg-12 offset-lg-0">
                            <div class="card shadow mb-3">
                                <div class="card-header py-3">
                                    <p class="m-0 fw-bold" style="color: rgb(188,0,0);">Report filtered by date between <?php echo $datebegan; ?> and <?php echo $lastdate; ?></p>
                                </div>
                                
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table" id="tab">
                                            <thead>
                                                <tr style="background: #bc0000;color: rgb(255,255,255);font-size: 14px;">
                                     
                                                <th>#</th>
                                                    <th>Customer Name</th>
                                                    <th>Customer Surname</th>
                                                    <th>Parcel name</th>
                                                    <th>Parcel Picture</th>
                                                    <th>Parcel Description</th>
                                                    <th>Parcel Origin</th>
                                                    <th>Parcel Destination</th>
                                                    <th>Location Details</th>
                                                     <th>Shipper Name</th>
                                                    <th>Shipper Surname</th>
                                                    <th>Delivery date</th>
                                                    <th>Delivery Time</th>
                                                
                                                    <th>Parcel Status</th>
                                                    
                                                   
                                                </tr>
                                            </thead>
                                            <!-- table area -->
                                            <tbody>
                                            <?PHP
              
    



 

                            

            $query="SELECT customer.firstname as cn, customer.lastname as cl,parcel.parcel_name as pn,parcel.parcel_image as ppic,parcel.description as pdes,parcel.location_link as plink,
            shipper.firstname as sn,shipper.lastname as sl,parcel.dod as dod,parcel.time as time,parcel.shipper_id as shipdel,parcel.delivered as deli,parcel.origin as ori,parcel.destination as desti
          from customer,parcel,shipper where customer.customer_id =parcel.customer_id and parcel.shipper_id=shipper.shipper_id and delivered='1' and
            date_Format(parcel.dod,'%d-%m-%Y') BETWEEN '$newdate' AND '$ldate'";
            $result=mysqli_query($conn,$query);
            
            $rows=mysqli_num_rows($result);

           
            
           
            
            if ($rows>0) {
              
              ?>
                                            <?php
                                               $x=1;
                                               while ($rows=mysqli_fetch_array($result)) {

                                               
                                                if($rows['shipdel'] > 0 && $rows['deli']=='1')
                                                {
                                                    $delivered='<span style="background: #17e305;color: rgb(255,255,255);font-size: 14px;border-radius: 6px;padding-right: 3px;padding-left: 3px;padding-bottom: 2px;padding-top: -1px;">Delivered</span>';

                                                }elseif($rows['shipdel'] > 0 && $rows['deli']=='0')
                                                {

                                                  $delivered='<span style="background: #e3bf05;color: rgb(255,255,255);font-size: 14px;border-radius: 6px;padding-right: 3px;padding-left: 3px;padding-bottom: 2px;padding-top: -1px;">Accepted</span>';
                                                }
                                             ?>
                                                <tr>
                                                <td style="font-size: 13px;"><?php echo $x; ?></td>
                                                    <td style="font-size: 13px;"><?php echo $rows['cn']; ?></td>
                                                    <td style="font-size: 13px;"><?php echo $rows['cl']; ?></td>
                                                    <td style="font-size: 13px;"><?php echo $rows['pn']; ?></td>
                                                    <td style="font-size: 13px;"><img src="../customer/items/<?php echo $rows['ppic'];?>" style="height: 100px;width: 120px;"></td>
                                                    <td style="font-size: 13px;"><?php echo $rows['pdes']; ?></td>
                                                    <td style="font-size: 13px;"><?php echo str_replace('+',' ',$rows['ori']); ?></td>
                                                    <td style="font-size: 13px;"><?php echo str_replace('+',' ',$rows['desti']); ?></td>
                                                   
                                                    <td  style="font-size: 13px;"><iframe allowfullscreen frameborder="0" src="<?php echo $rows['plink'] ?>" loading="lazy" width="100%" height="400" style="height: 115px;width: 175px;"></iframe></td>
                                                     <td style="font-size: 13px;"><?php echo $rows['sn']; ?></td>
                                                    <td style="font-size: 13px;"><?php echo $rows['sl']; ?></td><td style="font-size: 13px;"><?php echo $rows['dod']; ?></td>
                                                    <td style="font-size: 13px;"><?php echo $rows['time']; ?></td>
                                                
                                                    <td style="font-size: 13px;"><?php echo $delivered; ?></td>
                                                </tr>
                                                <?php
                                                        $x++;    
                                              
                                                        }
                                                       
                                                    }
                                                        ?>
                                                
                                               
                                            </tbody>
                                        
                                        </table>
                                    </div>
    
<p style="text-align:center;">
            <button class="btn btn-sm" role="button"style="background: #bc0000;color: rgb(255,255,255);border-radius: 0px;" style="background-color:rgb(21,132,38);"onclick="$('table').table2csv();">Export csv</button>
            <button class="btn btn-sm" role="button"style="background: #bc0000;color: rgb(255,255,255);border-radius: 0px;" style="background-color:rgb(21,132,38);"onclick="$('table').wordExport({font:20});">Export Doc</button>
            <button class="btn btn-sm" role="button"style="background: #bc0000;color: rgb(255,255,255);border-radius: 0px;" style="background-color:rgb(21,132,38);"onclick="$('table').tblToExcel();">Export xls</button>
            <button class="btn btn-sm" role="button"style="background: #bc0000;color: rgb(255,255,255);border-radius: 0px;" style="background-color:rgb(21,132,38);"  onclick="myApp.printTable()">Print</button>
    
        </p> 
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="table2csv.js"></script>
<script src="jspdf.js"></script>
<script src="jspdf/libs/base64.js"></script>
<script src="jspdf/libs/sprintf.js"></script>
<script src="jquery.base64.js"></script>
<script src="tableExport.js"></script>
<script src="jquery.tableToExcel.js"></script>
<script src="FileSaver.js"></script> 
<script src="jquery.wordexport.js"></script>
</body>

</<script type="text/javascript">
    jQuery(document).ready(function($) {
        $("a.word-export").click(function(event) {
            $("#page-content").wordExport();
        });
    });
    </script>html>
<script>
    var myApp = new function () {
        this.printTable = function () {
            var tab = document.getElementById('tab');
            var win = window.open('', '', 'height=700,width=700');
            win.document.write(tab.outerHTML);
            win.document.close();
            win.print();
        }
    }
</script>