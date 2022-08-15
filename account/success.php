<!DOCTYPE html>
<html lang="en">
<?php //message session
   

    $message=$_SESSION['message'];
    $err=$_SESSION['err'];
    ?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Courier</title>
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

<body>
    <div style="height: 310px;background: url(&quot;../assets/img/pexels-vojtech-okenka-392018.jpg&quot;) center / cover no-repeat;">
        <div class="d-flex justify-content-center align-items-center" style="height: inherit;min-height: initial;width: 100%;position: absolute;left: 0;background: rgba(0,0,0,0.53);">
            <div class="d-flex align-items-center order-5" style="height:200px;">
                <div class="container">
                    <h3 class="text-center" style="color: var(--bs-white);padding-top: 0.25em;padding-bottom: 0.25em;font-weight: normal;"><i class="fa fa-quote-left" style="color: #bc0000;"></i>&nbsp;PTYH System&nbsp;<i class="fa fa-quote-right" style="color: #bc0000;"></i></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row" style="margin-top: 21px;">
            <div class="col-md-8 col-lg-6 offset-lg-3 text-center"><i class="fas fa-smile" style="font-size: 40px;margin-top: 29px;"></i>
                <h4 style="color: #bc0000;margin-top: 30px;"><?php echo $err; ?></h4>
                <p style="font-size: 20px;color: var(--bs-gray);"><?php echo $message; ?></p><a href="login.php" style="color: rgb(80,94,108);">Go to login page</a>
            </div>
        </div>
    </div>
    <footer class="footer-basic" style="padding-top: 171px;">
        <p class="copyright" style="font-size: 16px;">PTYH System © <?php echo date('Y') ?></p>
    </footer>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Beautiful-Contact-from-animated.js"></script>
</body>

</html>