<!--session-->
<?php include 'include/session.php'?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Brand</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="../assets/css/Map-Clean.css">
</head>

<body id="page-top" style="font-family: Poppins, sans-serif;">
    <div id="wrapper">
        <!--nav-->
<?php include 'include/nav.php'?>
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">View parcels</h3>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12 offset-lg-0">
                            <div class="card shadow mb-3">
                                <div class="card-header py-3">
                                    <p class="m-0 fw-bold" style="color: rgb(188,0,0);">Customer Details</p>
                                </div>

                                <?PHP
              
             
              $pid=$_GET['url'];

            $query="SELECT * from parcel,customer where customer.customer_id=parcel.customer_id and parcel.parcel_id='$pid'";
            $result=mysqli_query($conn,$query);
            
            $rows=mysqli_num_rows($result);
            
           
            
            if ($rows>0) {
              
              ?>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr style="background: #bc0000;color: rgb(255,255,255);font-size: 14px;">
                                                    <th>Customer Name&nbsp;</th>
                                                    <th>Customer Surname</th>
                                                    <th colspan="3">Customer Phone Number</th>
                                                    <th colspan="3">Customer Email</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                               
                                               while ($rows=mysqli_fetch_array($result)) {
                                             ?>
                                                <tr>
                                                    <td style="font-size: 13px;"><?php echo $rows['firstname'];?></td>
                                                    <td style="font-size: 13px;"><?php echo $rows['lastname'];?></td>
                                                    <td colspan="3" style="font-size: 13px;"><?php echo $rows['phone_number'];?></td>
                                                    <td colspan="3" style="font-size: 13px;"><?php echo $rows['email'];?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 offset-lg-0">
                            <div class="card shadow mb-3">
                                <div class="card-header py-3">
                                    <p class="m-0 fw-bold" style="color: rgb(188,0,0);">Parcel Details</p>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr style="background: #bc0000;color: rgb(255,255,255);font-size: 14px;">
                                                    <th>Parcel Image</th>
                                                    <th>Parcel name</th>
                                                    <th colspan="3">Description</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="font-size: 13px;"><img src="../customer/items/<?php echo $rows['parcel_image'];?>" style="height: 100px;width: 120px;"></td>
                                                    <td style="font-size: 13px;"><?php echo $rows['parcel_name'];?></td>
                                                    <td colspan="3" style="font-size: 13px;"><?php echo $rows['description'];?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 offset-lg-0">
                            <div class="card shadow mb-3">
                                <div class="card-header py-3">
                                    <p class="m-0 fw-bold" style="color: rgb(188,0,0);">Location Map</p>
                                </div>
                                <div class="card-body">
                                    <section class="map-clean"><iframe allowfullscreen frameborder="0" src="<?php echo $rows['location_link'] ?>" loading="lazy" width="100%" height="450"></iframe></section>
                                    <p><a class="btn btn-sm" href="ship-parcel.php?url=<?php echo $rows['parcel_id'] ?>" role="button" style="background: #bc0000;color: rgb(255,255,255);border-radius: 0px;">Accept</a>&nbsp;<a class="btn btn-sm" role="button" style="color: rgb(255,255,255);background: #bc0000;border-radius: 0px;" href="parcel-list.php">Back</a></p>
                                </div>
                            </div>
                        </div>
                        <?php
                                                            
                  
                }
            }
                ?>
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