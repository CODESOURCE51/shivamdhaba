<?php require("include/connection.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.2/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.2/owl.theme.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/responsive.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


</head>
<body>
<!--Header Start-->
<section class="header">
    <div>
        <img src="images/shivamdhaba_logo.jpg" alt="">
        <a style="position:absolute; top: calc(50% - 16px); right: 0; font-size: 32px; color: yellow" href="https://www.facebook.com/Shivam-Dhaba-426078704100556/?fref=ts" target="_blank"><i class="fa fa-fw fa-facebook-square"></i></a>
    </div>
</section>
<section class="nav">
    <div>
        <nav class="mobile">
            <select name="menuMobile" id="menuMobile" onchange="window.location=this.value;">
                <option value="" disabled selected>SITE NAVIGATION</option>
                <option value="index.php" disabled>HOME</option>
                <option value="services.php">SERVICE</option>
                <option value="menu.php">MENU</option>
                <option value="contact-us.php">CONTACT US</option>
            </select>
        </nav>
        <nav class="desktop">
            <ul>
                <li class="current"><a href="index.php"><i class="fa fa-fw fa-home" style="font-size: 19px"></i></a></li>
                <li><a href="services.php">Services</a></li>
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
            <div class="vid-container">
                <img src="http://perthantennaservices.com.au/communities/8/004/012/242/558//images/4613159198.png" alt="">
                <div id="player"></div>
                <div class="vid-list-cont">
                    <a href="#" class="prev"></a>
                    <div class="vid-list">
                        <ul>
                        <?php 
						$vurl= mysql_query("select * from video_url order by id desc");
						while($vid_id= mysql_fetch_array($vurl)){
						?>
                            <li><img src="http://img.youtube.com/vi/<?php echo $vid_id['video_id'];?>/default.jpg" alt="" onclick="player.loadVideoById('<?php echo $vid_id['video_id'];?>', 5, 'large');"></li>
                         <?php }?>   
                        </ul>
                    </div>
                    <a href="#" class="next"></a>
                </div>
            </div>
            <div class="content">
                <h2>Welcome to Shivam Dhaba</h2>
                <p>Shivam Dhaba, about 1 km from the Mani Square 6 kms from Airport, is also known as shivam for the street food lovers. We are the leading non vegetarian food chain that is highly popular because of its exotic spices, delicate herbs with vegetables or meat. SHIVAM DHABA By nature offers the finest in food, service and ambiance. Shivam Dhaba By Nature a preferred dining destination of today’s discerning diners.</p>
                <p>SHIVAM DHABA being incorporated on 2000, is serving the food loving people of Kolkata with a variety of Mughlai dishes starting from a range of Tandoors, Kababs, Biryanis, Rotis and other delicious dishes.Shivam Dhaba wants to cater the best facilities for the people so that they can come and enjoy the food . Not only that we are open upto midnight serving for the common people. We have the best of people who are specialized in making the popular dishes for the customers.We are known for the taste, quality and service in the hospitality segment.</p>
            </div>
            <div class="content">
                <marquee direction="left" style="width: 57.5%; float: left; clear: left; font-size: 16px;color: #CD3301;border-top: 1px solid #EFD44C;border-bottom: 1px solid #EFD44C;margin-bottom: 20px; min-width: 360px; padding: 7px 0">
                <?php 
                        $text= mysql_query("select * from td_text order by txt_id desc");
                        while($txt_id= mysql_fetch_array($text)){
                        ?><span style="margin-right:30px;"><?php echo $txt_id['text'];?></span><?php }?></marquee>
            </div>
        </div>
        <div class="four">
            <div id="sl-slider">
                <div><img src="images/carousel/BPM-Dhaba-11.jpg" height="120" alt=""></div>
                <div><img src="images/carousel/Egg%20Roll%20F.jpg" height="120" alt=""></div>
                <div><img src="images/carousel/milkshakes.png" height="120" alt=""></div>
                <div><img src="images/carousel/prodMarinadeShot.png" height="120" alt=""></div>
                <div><img src="images/carousel/reis-web.png" height="120" alt=""></div>
                <div><img src="images/carousel/shutterstock_74484601.jpg" height="120" alt=""></div>
                <div><img src="images/carousel/Slider-object.png" height="120" alt=""></div>
                <div><img src="images/carousel/TANDOORI-ROTI-1024x682.jpg" height="120" alt=""></div>
                <div><img src="images/carousel/1.JPG" height="120" alt=""></div>
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

<?php $video= mysql_fetch_array(mysql_query("select * from video_url order by id desc limit 1"));?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.2/owl.carousel.min.js"></script>
<script src="js/jcarousellite.js"></script>
<script>
    // 2. This code loads the IFrame Player API code asynchronously.
    var tag = document.createElement('script');

    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    // 3. This function creates an <iframe> (and YouTube player)
    //    after the API code downloads.
    var player;
    function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
            videoId: '<?php echo $video['video_id'];?>',
        });
    }
    jQuery(document).ready(function($) {

        $("#sl-slider").owlCarousel({
            autoPlay : true,
        });
        $(".vid-list").jCarouselLite({
            visible: 6,
            btnNext: ".next",
            btnPrev: ".prev",
            auto: false,
            speed: 600    });
    });
</script>

</body>
</html>