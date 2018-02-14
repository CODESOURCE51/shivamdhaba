<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/responsive.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


</head>
<body>
<!--Header Start-->
<section class="header">
    <div><img src="images/shivamdhaba_logo.jpg" alt=""></div>
</section>
<section class="nav">
    <div>
        <nav class="mobile">
            <select name="menuMobile" id="menuMobile" onchange="window.location=this.value;">
                <option value="" disabled selected>SITE NAVIGATION</option>
                <option value="index.php">HOME</option>
                <option value="services.php" disabled>SERVICE</option>
                <option value="menu.php">MENU</option>
                <option value="contact-us.php">CONTACT US</option>
            </select>
        </nav>
        <nav class="desktop">
            <ul>
                <li><a href="index.php"><i class="fa fa-fw fa-home" style="font-size: 19px"></i></a></li>
                <li class="current"><a href="services.php">Services</a></li>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="contact-us.php">Contact Us</a></li>
            </ul>
        </nav>
    </div>
</section>
<!--Header End-->

<!--Body Start-->
<section class="body">
    <div>
        <div class="four">
            <h2>Services</h2>
        </div>
        <div class="two">
            <div class="center300">
                <img src="images/food%20delivery%20services.jpg" alt="" height="300" width="300">
                <h3>Home Delivery</h3>
                <p>Check our menu and place your order now! Free home delivery available on orders of &#x20b9; 500/- or more. Place your orders at (033) 6500 6482</p>
            </div>
        </div>
        <div class="two">
            <div class="center300">
                <img src="images/12541034-cute-waiter-with-a-tray-Vector-Illustratio--Stock-Vector-waiter-catering-service.jpg" alt="" height="300" width="300">
                <h3>Catering Service</h3>
                <p>We provide professional catering services for all kinds of events. Contact us today to acquire quality catering service for your event. Reach us at (033) 6500 6482.</p>
            </div>
        </div>
    </div>
</section>
<!--Body End-->

<!--Footer Start-->
<section class="footer">
    <div style="text-align: center">
        &COPY; Shivam Dhaba, 2015. Powered by <a href="http://projukti.info">Projukti</a>.
    </div>
</section>
<!--Footer End-->



</body>
</html>