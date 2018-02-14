<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    
<!-- Mirrored from vozting.com/Login/forgot_password.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 Jun 2015 05:36:46 GMT -->
<head>
        <title>service of India
       </title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="description" content="Expand, contract, animate forms with jQuery wihtout leaving the page" />
        <meta name="keywords" content="expand, form, css3, jquery, animate, width, height, adapt, unobtrusive javascript"/>
		<link rel="shortcut icon" href="http://vozting.com/favicon.ico" type="image/x-icon"/>
        <link rel="stylesheet" type="text/css" href="css/login.css" />
           <!----------------------validation----------------------------->

 <script type="text/javascript" src="../admin/js/jquery.js"></script>  
  <script type="text/javascript" src="../admin/js/validate.js"></script>  
<script type="text/javascript">
$(document).ready(function(){ 
    

	$("#login").validate({
		rules: {
			email: {
				required: true,
				email: true
			}
			
		 
		}, //end rules
		messages: {
			
			email: {
				required: "<span style='font-size:11px; color:#F00'>Please Enter Username.</span>",
				email: "<span style='font-size:11px; color:#F00'>Enter Valid Email Id.</span>"
			
			}
			
		} //end messages
		
	}); //end validate
  });
</script>
<!----------------------validation----------------------------->
		
    </head>
    <body>
		<div class="wrapper">
			<div class="head">
            <img src="images/Logo.png"/>
            
            </div>
	  <div class="content">
				<div id="form_wrapper" class="form_wrapper">
					<form id="login" action="" method="post" name="login" enctype="multipart/form-data" class="forgot_password active">
						<h3>Forgot Password</h3>
						<div>
							<label>Email:</label>
							<input type="text" name="email" id="email" />
							<span class="error">This is an error</span>
						</div>
						<div class="bottom">
							<input type="submit" name="submit" id="submit" value="Send reminder"></input>
							<a href="index-2.html" rel="login" class="linkform">Please Check Your Mail For Password.</a>
							
							<div class="clear"></div>
						</div>
					</form>
				</div>
				<div class="clear"></div>
			</div>
			
		</div>

		<!-- The JavaScript -->
		
		
    </body>

<!-- Mirrored from vozting.com/Login/forgot_password.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 Jun 2015 05:36:47 GMT -->
</html>