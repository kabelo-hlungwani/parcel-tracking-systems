<?PHP  

         
$result=mysqli_query($conn,"SELECT * from admin where email='$email'");
$rows=mysqli_num_rows($result);        

if ($rows>0) {
  
while ($rows=mysqli_fetch_array($result)) {
   
   ?>
    <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="background: rgb(188,0,0);">
        <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                <div class="sidebar-brand-icon rotate-n-15"></div>
                <div class="sidebar-brand-text mx-3"><span>PTYH system</span></div>
            </a>
            <hr class="sidebar-divider my-0">
            <ul class="navbar-nav text-light" id="accordionSidebar">
                <li class="nav-item"><a class="nav-link active" href="index.php" ><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                <li class="nav-item"><a class="nav-link" href="profile.php" ><i class="fas fa-user"></i><span>Profile</span></a></li>
                <li class="nav-item"><a class="nav-link" href="customers.php" ><i class="fa fa-user" ></i><span>Customer list</span></a>
                <a class="nav-link" href="shippers.php" ><i class="fa fa-user" ></i><span>Shipper list</span></a>
                <a class="nav-link" href="ccomplaints.php" ><i class="fa fa-comments" ></i><span>Customer Complaints</span></a>
                <a class="nav-link" href="scomplaints.php" ><i class="fa fa-comments" ></i><span>Shipper Complaints</span></a>
                <a class="nav-link" href="track.php" ><i class="fa fa-map-marker" ></i><span>Track Parcel</span></a>
                <a class="nav-link" href="report.php" ><i class="fa fa-book" ></i><span>Report</span></a>
                <a class="nav-link" href="logout.php" ><i class="fa fa-power-off" ></i><span>Logout</span></a></li>
                <li class="nav-item"></li>
            </ul>
            <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
        </div>
    </nav>
  
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars" style="color: rgb(188,0,0);"></i></button>
                    <h6 style="font-size: 17px;height: 25.8px;margin-top: 14px;">&nbsp;<span style="font-weight: bold;color: rgb(188,0,0);">Logged as- <a style="font-weight: bold;color: rgb(188,0,0);text-decoration: none" href="index.php"><?php echo $rows['firstname'].' '.$rows['lastname']?></a>(Admin)<br><br></span></h6>
                    <ul class="navbar-nav flex-nowrap ms-auto">
                        <div class="d-none d-sm-block topbar-divider"></div>
                        <li class="nav-item dropdown no-arrow"></li>
                    </ul><a href="logout.php" style="font-size: 27px;color: rgb(188,0,0);"><i class="fa fa-power-off"></i></a>
                </div>
            </nav>
            <?php
              
            }
      
          } ?>