<?php 


    require("connection.php"); 
     

    if(empty($_SESSION['user'])) 
    { 

        header("Location: index.php"); 

        die("Redirecting to index.php"); 
    } 
    
?> 
<?php
if(isset ($_REQUEST['mode']) && $_REQUEST['mode']=='emp_entry')
{
$mkt_name= mysql_real_escape_string($_REQUEST['mkt_name']);
$mkt_code= mysql_real_escape_string($_REQUEST['mkt_code']);
$address= mysql_real_escape_string($_REQUEST['address']);
$blood_group= mysql_real_escape_string($_REQUEST['blood_group']);
$contact= mysql_real_escape_string($_REQUEST['contact']);
$area= mysql_real_escape_string($_REQUEST['area']);
$salary= mysql_real_escape_string($_REQUEST['salary']);
$username= mysql_real_escape_string($_REQUEST['mkt_code']);
$password= mysql_real_escape_string($_REQUEST['password']);
$email= mysql_real_escape_string($_REQUEST['email']);


$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 2097152)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
		
		$tmp_name=$_FILES["file"]["tmp_name"];
        $rand= rand(1000, 9999);
		$target = "employee/"; 
        $target = $target .$rand. basename( $_FILES["file"]["name"]) ; 
      move_uploaded_file($_FILES["file"]["tmp_name"],$target);
	  $item_image= basename($rand.$_FILES['file']['name']);
      }
	  
    }
$employee_checking=	mysql_fetch_array(mysql_query("SELECT count(id) as no_id FROM emp_login"));
if($employee_checking['no_id'] < 3){
	
$check_for_username = mysql_query("SELECT username FROM emp_login WHERE username='$username'");
//Query to check if username is available or not 

if(mysql_num_rows($check_for_username)>0)
{
echo "<script> window.location= 'emp_entry.php?error'; </script>";//If there is a  record match in the Database - Not Available
}
else
{
//No Record Found - Username is available 

	  $query_2= "INSERT INTO `emp_login` (`emp_name`,`empId`,`address`,`blood_group`,`contact`,`photo`,`area`,`salary`,`username`,`password`,`email`) 
VALUES ('$mkt_name','$mkt_code','$address','$blood_group','$contact','$item_image','$area','$salary','$username','$password','$email')";
	  
$result_2= mysql_query($query_2) or die (mysql_error());

echo "<script> window.location= 'edit_emp.php?insert'; </script>";
}
}else{
	
echo "<script> window.location= 'emp_entry.php?fail'; </script>";	
	
}
}
?>

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
<!----------------------user name validation----------------------------->


<script type="text/javascript">
$(document).ready(function()//When the dom is ready 
{
$("#username").change(function() 
{ //if theres a change in the username textbox

var username = $("#username").val();//Get the value in the username textbox
if(username.length > 3)//if the lenght greater than 3 characters
{
$("#availability_status").html('<img src="loader1.gif" align="absmiddle">&nbsp;Checking availability...');
//Add a loading image in the span id="availability_status"

$.ajax({  //Make the Ajax Request
    type: "POST",  
    url: "ajax_check_username.php",  //file name
    data: "username="+ username,  //data
    success: function(server_response){  
   
   $("#availability_status").ajaxComplete(function(event, request){ 

	if(server_response == '0')//if ajax_check_username.php return value "0"
	{ 
	$("#availability_status").html('<img src="tick.gif" align="absmiddle"> <font color="Green"> Available </font>  ');
	//add this image to the span with id "availability_status"
	}  
	else  if(server_response == '1')//if it returns "1"
	{  
	 $("#availability_status").html('<img src="not_available.png" align="absmiddle"> <font color="red">Not Available </font>');
	}  
   
   });
   } 
   
  }); 

}




return false;
});

});
</script>
<!----------------------user name validation----------------------------->
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
        <td height="30">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" class="error"><?php

if (isset($_REQUEST['fail']))
{
echo "<span class='errors'>Sorry! you have reached maximum no of employee</span>";
}
?></td>
      </tr>
      <tr>
        <td align="center">
        <form action="" method="post" name="mkt" id="mkt" enctype="multipart/form-data"> 
    <input type="hidden" name="mode" value="emp_entry" />
    <table width="650" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="40" colspan="3" align="center" valign="middle"><p style="background-color:#fff1ab; padding:5px; text-align:center; font-family:Verdana, Geneva, sans-serif; font-size:22px; border:1px solid #EFDC86; border-radius:25px;">Add Employee</p>

</td>
        </tr>
      <tr>
        <td height="18" align="left" valign="middle" class="form_txtr">&nbsp;</td>
        <td height="18" align="center" valign="middle">&nbsp;</td>
        <td height="18" align="left" valign="middle" class="error">

</td>
      </tr>
      <tr>
        <td width="205" height="35" align="left" valign="middle" class="master">Employee Name</td>
        <td width="22" height="35" align="left" valign="middle">:</td>
        <td width="423" height="35" align="left" valign="middle" class="error"><input type="text" name="mkt_name" id="mkt_name" class="in_box" value="" /></td>
        </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Employee Id/Username</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="mkt_code" class="in_box" value="<?php $random= rand(1000, 9999); echo "EMP-".$random; ?>" readonly="readonly"/></td>
      </tr>
        <tr>
          <td height="35" align="left" valign="middle" class="master">Password</td>
          <td height="35" align="left" valign="middle">:</td>
          <td height="35" align="left" valign="middle"><input type="text" name="password" class="in_box" value=""/></td>
        </tr>
      <tr>
        <td height="65" align="left" valign="middle" class="master">Address</td>
        <td height="65" align="left" valign="middle">:</td>
        <td height="65" align="left" valign="middle"><textarea name="address" class="rounded1" id="address" ></textarea></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Blood Group</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><!--<input type="text" name="blood_group" class="in_box" value=""/>-->
        <select name="blood_group" id="blood_group" class="rounded2" >
          <option value="">Select Blood Group</option>
          <option value="A">A</option>
		  <option value="A+">A+</option>
		  <option value="B">B</option>
		  <option value="B+">B+</option>
		  <option value="O">O</option>
		  <option value="O+">O+</option>
		  <option value="AB">AB</option>
		  <option value="AB+">AB+</option>
        </select>
        
        </td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Contact No.</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="contact" class="in_box" value=""/></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Photo</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="file" name="file" id value=""/></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Area</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="area" class="in_box" value=""/></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Salary</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="salary" class="in_box" value=""/></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Email</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="email" class="in_box" value=""/></td>
      </tr>
      <tr>
        <td height="20" align="left" valign="middle">&nbsp;</td>
        <td height="20" align="left" valign="middle">&nbsp;</td>
        <td height="20" align="left" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle"><input type="image" src="image/submit.jpg" border="0" name="submit" id="submit" value="submit" /></td>
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
