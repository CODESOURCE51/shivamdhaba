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
                <option value="menu.php">MENU</option>
                <option value="contact-us.php" disabled>CONTACT US</option>
            </select>
        </nav>
        <nav class="desktop">
            <ul>
                <li><a href="index.php"><i class="fa fa-fw fa-home" style="font-size: 19px"></i></a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="menu.php">Menu</a></li>
                <li class="current"><a href="contact-us.php">Contact Us</a></li>
            </ul>
        </nav>
    </div>
</section>
<!--Header End-->

<!--Body Start-->
<section class="body">
    <div>
        <div class="four">
            <h2>Contact Us</h2>
        </div>
        <div class="two">
            <strong>Shivam Dhaba</strong><br>
            26/0 Duttabad Road<br>
            Saltlake, Kolkata - 700064<br>
            Phone No - 033-6500-6482<br>
            Near of Ultodanga New flyover<br>
            E-mail: kkhandikar@gmail.com<br><br>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3683.955142195027!2d88.4041221!3d22.580780999999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a0275d8c258515f%3A0xe13e9c60ce5cfc2!2sDuttabad+Rd%2C+EA+Block%2C+Sector-1%2C+Kolkata%2C+West+Bengal!5e0!3m2!1sen!2sin!4v1444207143117" width="95%" height="250" frameborder="0" style="border:0; margin-bottom: 30px" allowfullscreen></iframe>
        </div>
        <div class="two">
            <h3>Leave Us a Message</h3>
            <form action="">
                <label for="cname">Name</label>
                <input type="text" name="cname" id="cname" placeholder="e.g. Sujan Mallik" required>
                <label for="phone">Phone</label>
                <input type="tel" name="phone" id="phone" placeholder="e.g. 913324331234" required>
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" placeholder="e.g. someone23@email.com" required>
                <label for="msg">Message</label>
                <textarea name="msg" id="msg" placeholder="Type Your Message Here" required></textarea>
                <button type="submit">Send Message</button>
                <div id="result" style="text-align: center"></div>
            </form>
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
<script>
    $('form').on('submit',function(e){
        e.preventDefault();
        $this = $(this);
        $this.children('input, button, textarea').prop('disabled', true);
        $.post('mail.php',$this.serialize(),function(data){
            $('#result').html(data);
        }).done(function(){
            $this.children('input,textarea').val('');
            $this.children('input, button, textarea').prop('disabled', false);
        }).fail(function(){
            alert('Oops! looks like server is experiencing some problems. Please try again later.');
            $this.children('input, button, textarea').prop('disabled', false);
        });
    });
</script>


</body>
</html>