<?php 


    require("connection.php"); 
     

    if(empty($_SESSION['user'])) 
    { 

        header("Location: index.php"); 

        die("Redirecting to index.php"); 
    } 
	
    $user=$_SESSION['user']['username'];
?>
<?php
if(isset ($_REQUEST['mode']) && $_REQUEST['mode']=='edit_emp')
{
$mkt_name= mysql_real_escape_string($_REQUEST['mkt_name']);
$mkt_code= mysql_real_escape_string($_REQUEST['mkt_code']);
$address= mysql_real_escape_string($_REQUEST['address']);
$blood_group= mysql_real_escape_string($_REQUEST['blood_group']);
$contact= mysql_real_escape_string($_REQUEST['contact']);
$area= mysql_real_escape_string($_REQUEST['area']);
$salary= mysql_real_escape_string($_REQUEST['salary']);
$username= mysql_real_escape_string($_REQUEST['username']);
$password= mysql_real_escape_string($_REQUEST['password']);
$email= mysql_real_escape_string($_REQUEST['email']);
$id= mysql_real_escape_string($_REQUEST['id']);

$query_update= "UPDATE `emp_login` SET 
			`emp_name`='$mkt_name',
			`empId`='$mkt_code',
			`address`='$address',
			`blood_group`='$blood_group',
			`contact`='$contact',
			`area`='$area',
			`salary`='$salary',
			`username`='$mkt_code',
			`password`='$password',
			`email`='$email'
			 WHERE `id`='$id'";
            $qu_up= mysql_query($query_update) or die(mysql_error());

echo "<script> window.location= 'edit_emp.php?edit'; </script>";

}
?>
 
<!----------------------validation----------------------------->

 <script type="text/javascript" src="js/jquery.js"></script>  
  <script type="text/javascript" src="js/validate.js"></script>  
<script type="text/javascript">
$(document).ready(function(){ 
    

	$("#mkt").validate({
		rules: {
			mkt_name: {
				required: true
			},
			mkt_code: {
				required: true
			},
			username: {
				required: true
			},
			password: {
				required: true
			},
			email: {
				required: true,
				email: true
			}
			/*address: {
				required: true
			},
			blood_group: {
				required: true
			},
			contact: {
				required: true
			},
			file: {
				required: true
			},
			area: {
				required: true
			},
			salary: {
				required: true
			},*/
			
			
		 
		}, //end rules
		messages: {
			
			mkt_name: {
				required: "<br /> Please Enter Name."
			
			},
			mkt_code: {
				required: "<br /> Please Enter Code."
			
			},
			username: {
				required: "<br />Enter Username."
			
			},
			password: {
				required: "<br />Enter Password."
			
			},
			email: {
				required: "<br />Enter Email.",
			    email: "Enter Valid Email."
			}
			/*address: {
				required: "<br /> Please Enter Address."
			
			},
			blood_group: {
				required: "<br /> Please Enter Blood Group."
			
			},
			contact: {
				required: "<br /> Please Enter Contact."
			
			},
			file: {
				required: "<br /> Please Enter Image."
			
			},
			area: {
				required: "<br /> Please Enter Area."
			
			},
			salary: {
				required: "<br /> Please Enter Salary."
			
			},*/
			
			
		} //end messages
		
	}); //end validate
  });
</script>
<!----------------------validation----------------------------->
<!--//////////////popup///////////////////-->
<script language="javascript" type="text/javascript">
<!--
function popitup(url) {
	newwindow=window.open(url,'name','height=500,width=700');
	if (window.focus) {newwindow.focus()}
	return false;
}

// -->
</script>
<!--/////////////////////////////////-->
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
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="center">
        <?php if (isset($_REQUEST['update'])) { ?>
        <form action="" method="post" name="mkt" id="mkt" enctype="multipart/form-data"> 
    <input type="hidden" name="mode" value="edit_emp" />
    <table width="650" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="40" colspan="3" align="center" valign="middle"><p style="background-color:#fff1ab; padding:5px; text-align:center; font-family:Verdana, Geneva, sans-serif; font-size:22px; border:1px solid #EFDC86; border-radius:25px;">EDIT EMPLOYEE</p>

</td>
        </tr>
      <tr>
        <td height="18" align="left" valign="middle" class="form_txtr">&nbsp;</td>
        <td height="18" align="center" valign="middle">&nbsp;</td>
        <td height="18" align="left" valign="middle" class="error">
<?php 
                            $id=$_REQUEST['id'];
                            $query="SELECT * FROM `emp_login` where `id`='$id'";
							$result=mysql_query($query) or die(mysql_error());
							$row = mysql_fetch_array($result);
							$photo= $row['photo'];
							$mkt_name= $row['emp_name'];
							$mkt_code= $row['empId'];
							$address= $row['address'];
							$blood_group= $row['blood_group'];
							$contact= $row['contact'];
							$area= $row['area'];
							$salary= $row['salary'];
							//$username= $row['username'];
							$password= $row['password'];
							$email= $row['email'];
?>
</td>
      </tr>
      <tr>
        <td width="213" height="35" align="left" valign="middle" class="master">Employee Name</td>
        <td width="14" height="35" align="left" valign="middle">:</td>
        <td width="423" height="35" align="left" valign="middle" class="error"><input type="text" name="mkt_name" id="mkt_name" class="rounded" value="<?php echo $mkt_name; ?>" /></td>
        </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Employee Id/Username</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="mkt_code" class="rounded" value="<?php echo $mkt_code; ?>" readonly/></td>
        </tr>
        <!--<tr>
        <td height="35" align="left" valign="middle" class="master">Username</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="username" class="rounded" value="<?php //echo $username; ?>" readonly/></td>
      </tr>-->
      <tr>
        <td height="35" align="left" valign="middle" class="master">Password</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="password" class="rounded" value="<?php echo $password; ?>" /></td>
      </tr>
      <tr>
        <td height="65" align="left" valign="middle" class="master">Address</td>
        <td height="65" align="left" valign="middle">:</td>
        <td height="65" align="left" valign="middle"><textarea name="address" class="rounded1" id="address" ><?php echo $address; ?></textarea></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Blood Group</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="blood_group" class="rounded" value="<?php echo $blood_group; ?>"/></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Contact No.</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="contact" class="rounded" value="<?php echo $contact; ?>"/></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Photo</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><a href="all_img.php?id=<?php echo $_REQUEST['id'];?>&tablename=<?php echo "emp_login";?>">
        <?php if($photo!=''){
		 echo "<img src='employee/$photo' border='0'  width='50' height='50'/>"; 
		}else{
		echo "<img src='employee/default.png' border='0'  width='50' height='50'/>";
		}
			?>
        </a></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Area</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="area" class="rounded" value="<?php echo $area; ?>"/></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Salary</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="salary" class="rounded" value="<?php echo $salary; ?>"/></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Email</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="email" class="rounded" value="<?php echo $email; ?>"/></td>
      </tr>
      <tr>
        <td height="20" align="left" valign="middle">&nbsp;</td>
        <td height="20" align="left" valign="middle">&nbsp;</td>
        <td height="20" align="left" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle"><input type="hidden" name="id" value="<?php echo $id ?>" /><input type="image" src="image/submit.jpg" border="0" name="submit" id="submit" value="submit" /></td>
        </tr>
      </table>
</form>
         <?php } ?>
       </td>
      </tr>
      <tr>
        <td height="50" align="center">
        <?php

if (isset($_REQUEST['insert']))
{
echo "<span class='succ'>Employee Added successfully.</span>";
}

if (isset($_REQUEST['edit']))
{
echo "<span class='succ'>Record updated successfully.</span>";
}

if (isset($_REQUEST['delete']))
{
echo "<span class='errors'>One record deleted successfully.</span>";
}
if (isset($_REQUEST['error']))
{
echo "<span class='errors'>Invalid Image File.</span>";
}
?>
        </td>
      </tr>
      <tr>
        <td height="50" align="center">
        <table width="1000" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><div style="overflow-y:scroll; height:300px;">
            <table width="1000" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
          <tr>
            <td width="131" height="40" align="center" bgcolor="#fff1ab" class="drive"> Name</td>
            <td width="80" height="40" align="center" bgcolor="#fff1ab" class="drive">EmpId</td>
            <td width="93" height="40" align="center" bgcolor="#fff1ab" class="drive">Address</td>
            <td width="148" height="40" align="center" bgcolor="#fff1ab" class="drive">Contact No</td>
            <td width="108" height="40" align="center" bgcolor="#fff1ab" class="drive">Password</td>
            <td width="135" align="center" bgcolor="#fff1ab" class="drive">Last Login IP</td>
            <td width="138" height="40" align="center" bgcolor="#fff1ab" class="drive">Last Login Date</td>
            <td width="77" align="center" bgcolor="#fff1ab" class="drive">Update</td>
            <td width="78" align="center" bgcolor="#fff1ab" class="drive">Delete</td>
            </tr>
          <tr>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            
            </tr>
          <?php
		  
$select_user = "SELECT * from `emp_login` order by id DESC";
$exe_selectuser = mysql_query($select_user) or die (mysql_error());

while ($row= mysql_fetch_array($exe_selectuser))
{ 
    $id= $row['id']; 
	$mkt_name= $row['emp_name']; 
	$mkt_code=$row['empId'];
    $address=$row['address'];
    $contact= $row['contact'];
	$password=$row['password'];
	$user_ip=$row['user_ip'];
	$last_login_date=$row['last_login_date'];
	
	 
?>
          <tr>
      <form name="drive" id="drive" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $id;?>" enctype="multipart/form-data">    
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $mkt_name; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $mkt_code; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $address; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $contact; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $password; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $user_ip; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $last_login_date; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt">
 <input type="image" src="image/update.png" height="25" width="70" border="0" name="update" id="update" value="update" />
 </td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt">
 <a href="delete_emp.php?id=<?php echo $row['id'];?>" onClick="return confirm('Want to remove from employee list?');"><img src="image/delete.png" height="25" width="70" border="0" /></a>
 </td>
      </form>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            </tr>
        <?php } ?>  
        </table>
            </div></td>
          </tr>
        </table></td>
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
