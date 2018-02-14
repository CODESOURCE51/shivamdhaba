<?php 

    require("connection.php"); 
 
    $submitted_username = ''; 
     

    if(!empty($_POST)) 
    { 

        $query = " 
            SELECT 
                id, 
                username, 
                password 
 
            FROM emp_login 
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
              $name=$_POST['username'];
			  $pass=$_POST['password'];
			 
            $_SESSION['user'] = $row;
			
			date_default_timezone_set("ASIA/KOLKATA");
	        $last_login_date= date("d/m/Y h:i:s a");
			
			$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);

			$query_3= "UPDATE `emp_login` SET `last_login_date`='$last_login_date',`user_ip`='$hostname'  WHERE username = '$name' and password= '$pass'";
            $result_3= mysql_query($query_3);
 
            header("Location: home.php"); 
            die("Redirecting to: home.php"); 
        } 
        else 
        { 
           echo "<script> window.location= 'index.php?error'; </script>";
        } 
    } 
	
	

?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Employee Login</title>
  <link rel="stylesheet" href="css/style.css">
<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
<script src="//html5shim.googlecode.com/svn/trunk/html5-els.js"></script>
<!----------------------validation----------------------------->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script> 
<script type="text/javascript">
$(document).ready(function(){


$("#login").validate({
rules: {
username: {
required: true
},
password: {
required: true,
}

}, //end rules
messages: {

username: {
required: "<br /> Please enter Username."
},
password: {
required: "<br /> Please enter password.",
}


} //end messages

}); //end validate
});
</script>
<!----------------------validation----------------------------->

  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
  <div class="container">
    <div class="login">
      <h1>EMPLOYEE LOGIN</h1>
      <form method="post" action="" name="login" id="login">
        <p><input type="text" id="username" name="username" value="" placeholder="Username"></p>
        <p><input type="password" id="password" name="password" value="" placeholder="Password"></p>
        <p class="remember_me">
          <label>
            <?php
	if (isset($_REQUEST['success']))
	{
	echo "Thanks! Blog inserted successfully.";
	}
	if (isset($_REQUEST['error']))
	{
	echo "<span style='color:#FF0000;'>Wrong Username & Password</span>";
	}
    ?>
      </label>
        </p>
        <p class="submit"><input type="submit" name="commit" value="Login"></p>
      </form>
    </div>

    <div class="login-help">
      <p>&nbsp;</p>
    </div>
  </div>
</body>
</html>
