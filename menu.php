<?php require("include/connection.php"); ?>
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
                <option value="services.php">SERVICE</option>
                <option value="menu.php" disabled>MENU</option>
                <option value="contact-us.php">CONTACT US</option>
            </select>
        </nav>
        <nav class="desktop">
            <ul>
                <li><a href="index.php"><i class="fa fa-fw fa-home" style="font-size: 19px"></i></a></li>
                <li><a href="services.php">Services</a></li>
                <li class="current"><a href="menu.php">Menu</a></li>
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
            <h2>Menu</h2>
        </div>
        <?php $cat= mysql_query("select * from category order by id desc");
		while($fcat= mysql_fetch_array($cat)){
		?>
        <div class="four">
            <div class="food-category">
                <h3><?php echo $fcat['name'];?></h3>
                <img src="cat_image/<?php echo $fcat['image'];?>" alt="">
                <?php 
				$menu= mysql_query("select * from menu where cat_id='".$fcat['id']."'");
				while($fmenu= mysql_fetch_array($menu)){
				?>
                <div class="food-item">
                    <div><?php echo $fmenu['mname'];?></div>
                    <div>&#x20b9;<?php echo $fmenu['mprice'];?>/-</div>
                </div>
                <?php }?>
            </div>
        </div>
        <?php }?>
        
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