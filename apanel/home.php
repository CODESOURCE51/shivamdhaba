<?php 


    require("../include/connection.php"); 
     


    if(empty($_SESSION['user'])) 
    { 

        header("Location: index.php"); 

        die("Redirecting to index.php"); 
    } 
	
     
if(isset($_REQUEST['mode']) && $_REQUEST['mode']=='login_account'){

    $username=$_SESSION['user'];
	$password=$_REQUEST['password'];

$query_update= "UPDATE `admin_login` SET 
            `password`='$password'
			 WHERE `username`='".$username."'";
 $qu_up= mysql_query($query_update) or die(mysql_error());	

echo "<script type='text/javascript'> window.location= 'home.php?success'; </script>";
}
     
?> 

    <!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>SHIVAM DHABA</title>

    <link rel="stylesheet" href="css/main.css"/>
<!----------------------validation----------------------------->

 <script type="text/javascript" src="../js/jquery.js"></script>  
  <script type="text/javascript" src="../js/validate.js"></script>  
<script type="text/javascript">
$(document).ready(function(){ 
    

	$("#change_password").validate({
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
				required: "<br /> <font color='red'>Please Enter Username.</font>"
			
			},
			password: {
				required: "<br /> <font color='red'>Please Enter New Password.</font>"
			
			}
			
		} //end messages
		
	}); //end validate
  });
</script>
<!----------------------validation----------------------------->

</head>
<body>
<?php include "header.php" ?>
<div id="siteWrapper">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="change_password" id="change_password" enctype="multipart/form-data" >
                               <input type="hidden" name="mode" id="mode" value="login_account">
                               <table width="450" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="40" colspan="3" align="center" valign="middle"  style="font-family:Verdana, Geneva, sans-serif; font-size:22px;">Edit Account</td>
        </tr>
      <tr>
        <td width="137" height="35" align="left" valign="middle" class="master">Username</td>
        <td width="21" height="35" align="center" valign="middle">:</td>
        <td width="292" height="35" align="left" valign="middle" class="error"><input type="text" name="username" id="" class="rounded" value="<?php echo htmlentities($_SESSION['user'], ENT_QUOTES, 'UTF-8'); ?>" readonly /></td>
        </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">New password</td>
        <td height="35" align="center" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="password" name="password" class="rounded" value=""/></td>
        </tr>
      <tr>
        <td height="20" align="left" valign="middle">&nbsp;</td>
        <td height="20" align="left" valign="middle">&nbsp;</td>
        <td height="20" align="left" valign="middle"> <i>(leave blank if you do not want to change your password)</i> </td>
        </tr>
      <tr>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle"><input type="image" src="img/submit.png" border="0" value="submit" /></td>
        </tr>
      </table>

</form>
</div>
</body>
</html>