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
if (isset($_REQUEST['submit']))
{
$channel_name= mysql_real_escape_string($_REQUEST['channel_name']);
$desc= mysql_real_escape_string($_REQUEST['desc']);
$price= mysql_real_escape_string($_REQUEST['price']);
$sql="SELECT * FROM `service_tax` WHERE `id`=1";
$result=mysql_query($sql) or die (mysql_error());
$row= mysql_fetch_array($result);
$serv_tax=$row['tax'];
$tax_amt=($serv_tax*$price)/100;
$total_amt=$tax_amt+$price;
$id= mysql_real_escape_string($_REQUEST['id']);

$query_update= "UPDATE `addons_channels` SET 
			`channel_name`='$channel_name',
			`desc`='$desc',
			`price`='$price',
			`serv_tax`='$serv_tax',
			`tax_amt`='$tax_amt',
			`total_amt`='$total_amt'
			 WHERE `id`='$id'";
            $qu_up= mysql_query($query_update) or die(mysql_error());

echo "<script> window.location= 'add_ons.php?update'; </script>";

}
?>
 
<!----------------------validation----------------------------->

 <script type="text/javascript" src="js/jquery.js"></script>  
  <script type="text/javascript" src="js/validate.js"></script>  
<script type="text/javascript">
$(document).ready(function(){ 
    

	$("#mkt").validate({
			rules: {
			channel_name: {
				required: true
			},
			desc: {
				required: true
			},
			price: {
				required: true
			}
			
		 
		}, //end rules
		messages: {
			
			channel_name: {
				required: "<br /> Please Package Name."
			
			},
			desc: {
				required: "<br /> Please Enter Description."
			
			},
			price: {
				required: "<br /> Please Enter Price."
			
			}
			
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
        <form action="" method="post" name="mkt" id="mkt" enctype="multipart/form-data"> 
    
    <table width="650" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="40" colspan="3" align="center" valign="middle"><p style="background-color:#fff1ab; padding:5px; text-align:center; font-family:Verdana, Geneva, sans-serif; font-size:22px; border:1px solid #EFDC86; border-radius:25px;">EDIT PACKAGE</p>

</td>
        </tr>
      <tr>
        <td height="18" align="left" valign="middle" class="form_txtr">&nbsp;</td>
        <td height="18" align="center" valign="middle">&nbsp;</td>
        <td height="18" align="left" valign="middle" class="error">
<?php 
                            $id=$_REQUEST['id'];
                            $query="SELECT * FROM `addons_channels` where `id`='$id'";
							$result=mysql_query($query) or die(mysql_error());
							$row = mysql_fetch_array($result);
							$channel_name= $row['channel_name'];
							$desc= $row['desc'];
							$price= $row['price'];
							
?>
</td>
      </tr>
      <tr>
        <td width="137" height="35" align="left" valign="middle" class="master">Name</td>
        <td width="21" height="35" align="left" valign="middle">:</td>
        <td width="292" height="35" align="left" valign="middle" class="error"><input type="text" name="channel_name" id="channel_name" class="rounded" value="<?php echo $channel_name; ?>" /></td>
        </tr>
      <tr>
        <td height="65" align="left" valign="middle" class="master">Description</td>
        <td height="65" align="left" valign="middle">:</td>
        <td height="65" align="left" valign="middle"><textarea name="desc" class="rounded1" id="desc" ><?php echo $desc; ?></textarea></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Price</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="price" class="rounded" value="<?php echo $price; ?>"/></td>
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
         
       </td>
      </tr>
      <tr>
        <td height="50" align="center">&nbsp;</td>
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
