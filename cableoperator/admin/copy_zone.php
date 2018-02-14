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
$zone= mysql_real_escape_string($_REQUEST['zone']);
$area= mysql_real_escape_string($_REQUEST['area']);

$query_2= "INSERT INTO `location` (`zone`,`area`) VALUES ('$zone','$area')";
$result_2= mysql_query($query_2) or die (mysql_error());

echo "<script> window.location= 'zone.php?insert'; </script>";

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

			zone: {
				required: true
			},
			area: {
				required: true
			}
			
		 
		}, //end rules
		messages: {
			
			zone: {
				required: "<br />Enter Zone."
			
			},
			area: {
				required: "<br />Enter Material Name."
			
			}
			
		} //end messages
		
	}); //end validate
  });
</script>
<!----------------------validation----------------------------->
  <!-----------------------------selectbox with inputbox-------------------->	
  <script language="javascript" type="text/javascript">
     function DropDownTextToBox(objDropdown, strTextboxId) {
        document.getElementById(strTextboxId).value = objDropdown.options[objDropdown.selectedIndex].value;
        DropDownIndexClear(objDropdown.id);
        document.getElementById(strTextboxId).focus();
    }
    function DropDownIndexClear(strDropdownId) {
        if (document.getElementById(strDropdownId) != null) {
            document.getElementById(strDropdownId).selectedIndex = -1;
        }
    }
</script>


   <!-----------------------------selectbox with inputbox-------------------->	

</head>

<body topmargin="0" onload="doOnLoad();">
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
        <table width="500" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="40" colspan="3" align="center">
            <p style="background-color:#fff1ab; padding:5px; text-align:center; font-family:Verdana, Geneva, sans-serif; font-size:22px; border:1px solid #EFDC86; border-radius:25px;">
            Add Location
            </p>
            </td>
            </tr>
          <tr>
            <td width="173" height="60" align="center" class="master">Zone</td>
            <td width="50" height="60" align="center" class="master">:</td>
            <td width="275" height="60" align="left" valign="middle"><div style="position: relative;">
          <!--[if lte IE 6.5]><div class="select-free" id="dd3"><div class="bd" ><![endif]-->
          <input name="zone" type="text" id="TextboxExample" tabindex="2"
        onchange="DropDownIndexClear('DropDownExTextboxExample');" class="in_box" style="width: 180px;
        position: absolute; top: -10px; left: 0px; z-index: 2;" />
          <!--[if lte IE 6.5]><iframe></iframe></div></div><![endif]-->
          <select name="zone" id="DropDownExTextboxExample" tabindex="1000"
        onchange="DropDownTextToBox(this,'TextboxExample');" style="position: absolute;
        top: -8px; left: 1px; z-index: 1; width: 212px;">
                 <?php
                 $sql = "SELECT Distinct(zone) from `location`";
                 $rs = mysql_query($sql);
                 while($row = mysql_fetch_array($rs))
                  {
                  ?>
                <option value="<?php echo $row['zone']; ?>"><?php echo $row['zone']; ?></option>
                <?php } ?> 
            </select>
          <script language="javascript" type="text/javascript">
        //Since the first <option> will be preselected the IndexClear function must fire once to clear that out.
        DropDownIndexClear("DropDownExTextboxExample");
    </script>
  </div></td>
          </tr>
          <tr>
            <td height="40" align="center" class="master">Area</td>
            <td height="40" align="center" class="master">:</td>
            <td height="40" align="left"><input type="text" name="area" id="area"  class="in_box" /></td>
          </tr>
          <tr>
            <td height="60" colspan="2" align="center">&nbsp;</td>
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
echo "<span class='succ'>Inserted Successfully.</span>";
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
        <td height="50" align="center"><table width="550" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #CCC;">
          <tr>
            <td width="218" height="40" align="center" bgcolor="#fff1ab" class="drive">Zone</td>
            <td width="219" align="center" bgcolor="#fff1ab" class="drive">Area</td>
            <td width="111" align="center" bgcolor="#fff1ab" class="drive">Delete</td>
          </tr>
          <tr>
            <td colspan="2" align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
          </tr>
          <?php
$select_user = "SELECT * FROM `location` order by id DESC";
$exe_selectuser = mysql_query($select_user) or die (mysql_error());

while ($row= mysql_fetch_array($exe_selectuser))
{ 
    $id= $row['id']; 
	$zone=$row['zone'];
	$area=$row['area'];
	 
?>
          <tr>
     
 <td height="35" align="center" valign="middle" bgcolor="#FEEDE7" class="drive_txt"><?php echo $zone; ?></td>
 <td height="35" align="center" valign="middle" bgcolor="#FEEDE7" class="drive_txt"><?php echo $area; ?></td>
 <td height="35" align="center" valign="middle" bgcolor="#FEEDE7"><a href="location_del.php?id=<?php echo $id;?>"><img src="image/delete.png" height="25" width="70" border="0" /></a></td>
          </tr>
          <tr>
            <td colspan="2">&nbsp;</td>
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
