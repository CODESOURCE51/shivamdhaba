<?php 

    require("../include/connection.php"); 
 
    $submitted_username = ''; 
     

    if(!empty($_POST)) 
    { 

        $query = " 
            SELECT 
                id, 
                username, 
                password 
 
            FROM admin_login 
            WHERE 
                username = :username and
				password= :password
        "; 
         

        $query_params = array( 
            ':username' => $_POST['username'],
			 ':password' => $_POST['password']
        ); 
         
        try 
        { 

            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 
 
            die("Failed to run query: " . $ex->getMessage()); 
        } 
 
        $login_ok = false; 

        $row = $stmt->fetch(); 
        if($row) 
        { 

            $check_password = $row['password']; 
             
            if($check_password == $row['password']) 
            { 

                $login_ok = true; 
            } 
        } 

        if($login_ok) 
        { 
		$id = $row['id'];

            $_SESSION['user'] = $row['username'];
			
			date_default_timezone_set("ASIA/KOLKATA");
	        $last_login_date= date("d/m/Y h:i:s a");
			
			$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);

			/*$query_3= "UPDATE `reg_table` SET `last_login_date`='$last_login_date',`user_ip`='$hostname'  WHERE `id`= '$id'";
            $result_3= mysql_query($query_3);*/
 
            header("Location: home.php"); 
            die("Redirecting to: home.php"); 
        } 
        else 
        { 
           print("Login Failed."); 
             
           $submitted_username = htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8'); 
        } 
    } 
	
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    
<!-- Mirrored from vozting.com/Login/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 Jun 2015 05:36:25 GMT -->
<head>
        <title>SHIVAM DHABA</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
       

        <link rel="stylesheet" type="text/css" href="css/login.css" />
		
        
        <!-- Css Spinners -->
        <!----------------------validation----------------------------->

 <script type="text/javascript" src="../js/jquery.js"></script>  
  <script type="text/javascript" src="../js/validate.js"></script>  
<script type="text/javascript">
$(document).ready(function(){ 
    

	$("#login").validate({
		rules: {
			username: {
				required: true
			},
			password: {
				required: true
			}
			
		 
		}, //end rules
		messages: {
			
			username: {
				required: "<span style='font-size:11px; color:#F00'>Please Enter Username.</span>"
			
			},
			password: {
				required: "<span style='font-size:11px; color:#F00'>Please Enter New Password.</span>"
			
			}
			
		} //end messages
		
	}); //end validate
  });
</script>
<!----------------------validation----------------------------->
    </head>
    <body class="bg">
        
       
		<div class="wrapper">	
        	<div class="head">
            <img src="images/shivamdhaba_logo.png"/>
            
            </div>
			<div class="content">
            
				<div id="form_wrapper" class="form_wrapper">
					
					<form id="login" action="" method="post" name="login" enctype="multipart/form-data" class="login active">
						<h3>Admin Login</h3>
						<div>
							<label>Username:</label>
							<input id="username" name="username" type="text" />
							
						</div>
						<div>
							<label>Password:</label>
							<input id="password"  name="password" type="password" />
                            <span class="error">This is an error</span>
							
						</div>
						<div class="bottom">
							<div class="remember">
                                <div id="message" class="message">
                                </div>
                            </div>
							<input id="loginButton" name="loginButton" type="submit" value="Login" />
                            
							<!--<a href="register.html" rel="register" class="linkform">You don't have an account yet? Register here</a>-->
							<div class="clear"></div>
                           
						</div>
					</form>
					
				</div>
				<div class="clear"></div>
			</div>
			
		</div>
      
		

		<!-- The JavaScript -->
	
    </body>

<!-- Mirrored from vozting.com/Login/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 18 Jun 2015 05:36:39 GMT -->
</html>