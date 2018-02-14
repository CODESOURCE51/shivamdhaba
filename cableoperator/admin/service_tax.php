<?php 
require("connection.php"); 
if(empty($_SESSION['user'])) 
{ 

header("Location: index.php"); 
die("Redirecting to index.php");
 
} 
?>
<?php
if (isset($_REQUEST['submit']))
{
$tax= mysql_real_escape_string($_REQUEST['tax']);

$sql="SELECT * FROM `service_tax` WHERE `id`=1";
$result=mysql_query($sql) or die (mysql_error());
$row= mysql_fetch_array($result);
$id=$row['id'];
$count=mysql_num_rows($result);

if($count>0)
{
  
 $query_update= "UPDATE `service_tax` SET 
			`tax`='$tax'
			 WHERE `id`='$id'";
            $qu_up= mysql_query($query_update) or die(mysql_error());

echo "<script> window.location= 'service_tax.php?update'; </script>";

}
else
{
	$sql="INSERT INTO `service_tax` (`tax`) VALUES ('$tax')";
     mysql_query($sql) or die(mysql_error());
	 
	echo "<script> window.location= 'service_tax.php?insert'; </script>"; 
	}

}
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cable-Operator</title>
<link href="login.css" rel="stylesheet" type="text/css" />
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
    

	$("#drive").validate({
		rules: {

			tax: {
				required: true
			}
			
		 
		}, //end rules
		messages: {
			
			tax: {
				required: "<br />Enter Tax Amount."
			
			}
			
		} //end messages
		
	}); //end validate
  });
</script>
<!----------------------validation----------------------------->

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
        <td align="center">
        <form action="" method="post" name="drive" id="drive" enctype="multipart/form-data"> 
        <table width="380" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #CCC;">
          <tr>
            <td width="265" height="40" align="center" bgcolor="#fff1ab" class="drive">Service Tax</td>
            <td width="112" align="center" bgcolor="#fff1ab" class="drive">Save</td>
          </tr>
          <tr>
            <td height="60" align="center"><input type="text" name="tax" id="tax"  class="rounded" /></td>
            <td height="60" align="center"><input type="image" src="image/submit.jpg" border="0" name="submit" id="submit" value="submit" /></td>
          </tr>
          </table>
          </form>
          </td>
      </tr>
      <tr>
        <td height="20" align="center"><?php
if (isset($_REQUEST['success']))
{
echo "Inserted successfully.";
}
if (isset($_REQUEST['insert']))
{
echo "<span class='succ'>Data Inserted Successfully.</span>";
}

if (isset($_REQUEST['update']))
{
echo "<span class='succ'>Data Updated Successfully.</span>";
}

if (isset($_REQUEST['delete']))
{
echo "<span class='errors'>Deleted Successfully.</span>";
}

?></td>
      </tr>
      <tr>
        <td height="50" align="center"><table width="207" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #CCC;">
          <tr>
            <td width="207" height="40" align="center" bgcolor="#fff1ab" class="drive">Service Tax</td>
            </tr>
          <tr>
            <td align="center">&nbsp;</td>
            </tr>
          <?php
$select_user = "SELECT * FROM `service_tax` order by id DESC";
$exe_selectuser = mysql_query($select_user) or die (mysql_error());

while ($row= mysql_fetch_array($exe_selectuser))
{ 
    $id= $row['id']; 
	$tax=$row['tax'];
	 
?>
          <tr>
     
 <td height="35" align="center" valign="middle" bgcolor="#FEEDE7" class="drive_txt"><?php echo $tax; ?></td>
 </tr>
          <tr>
            <td>&nbsp;</td>
            </tr>
        <?php } ?>  
        </table></td>
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
