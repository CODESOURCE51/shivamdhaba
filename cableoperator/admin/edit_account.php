<?php 


    require("connection.php"); 
     

    if(empty($_SESSION['user'])) 
    { 

        header("Location: index.php"); 

        die("Redirecting to index.php"); 
    } 
     

    if(!empty($_POST)) 
    { 
        
        if($_POST['username'] != $_SESSION['user']['username']) 
        { 
            // Define our SQL query 
            $query = " 
                SELECT 
                    1 
                FROM admin_login 
                WHERE 
                    username = :username 
            "; 

            $query_params = array( 
                ':username' => $_POST['username'] 
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
             

            $row = $stmt->fetch(); 
            if($row) 
            { 
                die("This Username is already in use"); 
            } 
        } 

        if(!empty($_POST['password'])) 
        { 
            $password = $_POST['password']; 
            
        } 
        else 
        { 
         
            $password = null; 
           
        } 

        $query_params = array( 
            ':username' => $_POST['username'], 
            ':user_id' => $_SESSION['user']['id'], 
        ); 
         
 
        if($password !== null) 
        { 
            $query_params[':password'] = $password; 
            
        } 
         

        $query = " 
            UPDATE admin_login
            SET 
                username = :username 
        "; 

        if($password !== null) 
        { 
            $query .= " 
                , password = :password 
               
            "; 
        } 

        $query .= " 
            WHERE 
                id = :user_id 
        "; 
         
        try 
        { 

            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 
 
            die("Failed to run query: " . $ex->getMessage()); 
        } 
         
   
        $_SESSION['user']['username'] = $_POST['username']; 

       echo "<script> window.location= 'edit_account.php?success'; </script>";
    } 
     
?> 
<!----------------------validation----------------------------->

 <script type="text/javascript" src="js/jquery.js"></script>  
  <script type="text/javascript" src="js/validate.js"></script>  
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
				required: "<br /> Please Enter Username."
			
			},
			password: {
				required: "<br /> Please Enter New Password."
			
			}
			
		} //end messages
		
	}); //end validate
  });
</script>
<!----------------------validation----------------------------->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cable-Operator</title>
<link href="css/template.css" rel="stylesheet" type="text/css" />


<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #FFFFFF;
}
</style>


</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th height="60" align="center" valign="middle"><?php include_once("header.php"); ?></th>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="top"><table width="1024" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #CCC;">
      <tr>
        <td><?php include_once("menu.php"); ?></td>
      </tr>
      <tr>
        <td height="50">&nbsp;</td>
      </tr>
      <tr>
        <td align="center"> <?php
if (isset($_REQUEST['success']))
{
echo "<span class='succ'>updated successfully.</span>";
}
?></td>
      </tr>
      <tr>
        <td height="50" align="center"><form action="edit_account.php" method="post" name="change_password" id="change_password"> 
    
    <table width="450" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="40" colspan="3" align="center" valign="middle" style="font-family:Verdana, Geneva, sans-serif; font-size:22px;">Edit Account</td>
        </tr>
      <tr>
        <td width="137" height="35" align="left" valign="middle" class="master">Username</td>
        <td width="21" height="35" align="center" valign="middle">:</td>
        <td width="292" height="35" align="left" valign="middle" class="error"><input type="text" name="username" id="" class="rounded" value="<?php echo htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8'); ?>" readonly /></td>
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
        <td height="35" align="left" valign="middle"><input type="image" src="image/submit.jpg" border="0" value="submit" /></td>
        </tr>
      </table>
</form></td>
      </tr>
      <tr>
        <td height="50">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="40">&nbsp;</td>
  </tr>
  <tr>
    <td height="40" align="center" valign="middle"><?php include_once("footer.php"); ?></td>
  </tr>
</table>
</body>
</html>
