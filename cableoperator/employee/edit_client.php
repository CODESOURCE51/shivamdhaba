<?php 
    require("connection.php"); 
    if(empty($_SESSION['user'])) 
    { 
        header("Location: index.php"); 
        die("Redirecting to index.php"); 
    } 
   // $user=$_SESSION['user']['username'];
?>
<?php

$id=$_REQUEST['id'];
$query="SELECT * FROM `client_entry` where `id`='$id'";
$result=mysql_query($query) or die(mysql_error());
$row_client = mysql_fetch_array($result);
$photo=$row_client['image'];						

?>

<?php
if(isset ($_REQUEST['mode']) && $_REQUEST['mode']=='edit_client')
{
$customer_name= mysql_real_escape_string($_REQUEST['customer_name']);
$cust_code= mysql_real_escape_string($_REQUEST['cust_code']);
$email= mysql_real_escape_string($_REQUEST['email']);
$subs_date= mysql_real_escape_string($_REQUEST['subs_date']);
$zone= mysql_real_escape_string($_REQUEST['zone']);
$area= $_REQUEST['area'];
$address= mysql_real_escape_string($_REQUEST['address']);
$dob= mysql_real_escape_string($_REQUEST['dob']);
$contact= mysql_real_escape_string($_REQUEST['contact']);



$query_update= "UPDATE `client_entry` SET 
			`email`='$email',
			`subscription_date`='$subs_date',
			`box_no`='".$_REQUEST['box_no']."',
			`zone`='$zone',
			`area`='$area',
			`address`='$address',
			`dob`='$dob',
			`phone`='$contact'
			 WHERE `id`='$id'";
            $qu_up= mysql_query($query_update) or die(mysql_error());


echo "<script> window.location= 'all_client.php?update'; </script>";

}
?>
 
<!----------------------validation----------------------------->

 <script src="assets/jquery.min.js"></script>  
  <script type="text/javascript" src="js/validate.js"></script>  
<script type="text/javascript">
$(document).ready(function(){ 
    

	$("#mkt").validate({
		rules: {
			customer_name: {
				required: true
			},
			email: {
				email:true
			},
			address: {
				required: true
			},
			subs_date: {
				required: true
			},
			contact: {
				required: true
			},
			zone: {
				required: true
			},
			area: {
				required: true
			},
			box_no: {
				required: true
			}
			
		 
		}, //end rules
		messages: {
			
			customer_name: {
				required: "<br /> Please Entry Customer name."
			
			},
			email: {
				email: "Enter Valid Email."
			
			},
			address: {
				required: "<br /> Please Enter Address."
			
			},
			subs_date: {
				required: "<br /> Please Enter subscription date."
			
			},
			contact: {
				required: "<br /> Please Enter Contact no."
			
			},
			zone: {
				required:" <br /> Please Enter Zone."
			},
			area: {
				required: "<br /> Please Enter Area."
			
			},
			box_no: {
				required: "<br /> Please Enter Box No."
			
			}
			
			
		} //end messages
		
	}); //end validate
  });
</script>
<!----------------------validation----------------------------->
<SCRIPT language=Javascript>
<!--
function isNumberKey(evt)
{
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))
return false;

return true;
}
//-->
</SCRIPT>
<!----------------------phone no----------------------------->
<!-----------------------------Two drops-------------------->
<script>
function getarea(id)
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("area").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("POST","ajax_area.php?id="+id,true);
xmlhttp.send();
}
</script>
<!-----------------------------Two drops-------------------->
<!-----------------------------datepicker-------------------->
<link rel="stylesheet" type="text/css" href="codebase/dhtmlxcalendar.css">
<link rel="stylesheet" type="text/css" href="codebase/skins/dhtmlxcalendar_dhx_skyblue.css">
<script src="codebase/dhtmlxcalendar.js"></script>
<style>
#calendar,
#calendar2,
#calendar3,
#calendar4 {
	border: 1px solid #909090;
	font-size: 12px;
}
</style>
<script>
var myCalendar;
function doOnLoad() {
myCalendar = new dhtmlXCalendarObject(["calendar","calendar2","calendar3","calendar4","calendar5","calendar6","calendar7","calendar8"]);
}
</script>
<!-----------------------------datepicker-------------------->
<!--//////////////popup///////////////////-->
<script language="javascript" type="text/javascript">
<!--
function popitup(url) {
	newwindow=window.open(url,'name','height=500,width=700');
	if (window.focus) {newwindow.focus()}
	return false;
}


</script>
<!--/////////////////////////////////-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cable-Operator</title>
<link href="css/template.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/multiple-select.css" />

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

<body topmargin="0" onLoad="doOnLoad();">
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
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="50" align="center">
        <form action="" method="post" name="mkt" id="mkt" enctype="multipart/form-data"> 
    <input type="hidden" name="mode" value="edit_client" />
    <table width="650" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="40" colspan="3" align="center" valign="middle"><p style="background-color:#fff1ab; padding:5px; text-align:center; font-family:Verdana, Geneva, sans-serif; font-size:22px; border:1px solid #EFDC86; border-radius:25px;">Edit Client</p></td>
        </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="form_txtr">&nbsp;</td>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle" class="error"><?php
if (isset($_REQUEST['success']))
{
echo "Inserted successfully.";
}
if (isset($_REQUEST['insert']))
{
echo "<span class='succ'>Inserted successfully.</span>";
}

if (isset($_REQUEST['update']))
{
echo "<span class='succ'>Data updated successfully.</span>";
}
if (isset($_REQUEST['imgupdate']))
{
echo "<span class='succ'>Image updated successfully.</span>";
}

if (isset($_REQUEST['delete']))
{
echo "<span class='errors'>One record deleted successfully.</span>";
}
if (isset($_REQUEST['error']))
{
echo "<span class='errors'>Out of Stock.</span>";
}
?>
</td>
      </tr>
      <tr>
        <td width="137" height="35" align="left" valign="middle" class="master">Client Name</td>
        <td width="21" height="35" align="left" valign="middle">:</td>
        <td width="292" height="35" align="left" valign="middle" class="error"><input type="text" name="customer_name" class="rounded" value="<?php echo $row_client['c_name']; ?>" readonly /></td>
        </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Client Id</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle" class="error"><input type="text" name="cust_code" class="rounded" value="<?php echo $row_client['c_id']; ?>" readonly/></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Email</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="email" class="rounded" value="<?php echo $row_client['email']; ?>"/></td>
        </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Subscription Date</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="subs_date" class="rounded" id="calendar" value="<?php echo $row_client['subscription_date']; ?>" ></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">SetTopBox No.</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="box_no" class="rounded" id="box_no" value="<?php echo $row_client['box_no']; ?>" ></td>
      </tr>
      <tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Zone</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle">
        <select name="zone" id="zone" class="rounded" onChange="getarea(this.value)">
                <option value="<?php echo $row_client['zone']; ?>"><?php echo $row_client['zone']; ?></option>
                 <?php
                 $sql = "SELECT DISTINCT zone from `location`";
                 $rs = mysql_query($sql);
                 while($row = mysql_fetch_array($rs))
                  {
                  ?>
                <option value="<?php echo $row['zone']; ?>"><?php echo $row['zone']; ?></option>
                <?php } ?> 
                </select></td>
      </tr>
       <tr>
        <td height="35" align="left" valign="middle" class="master">Area</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle" id="area">
        <select name="area" id="area" class="rounded">
                <option value="<?php echo $row_client['area']; ?>"><?php echo $row_client['area']; ?></option>
                 <?php
                 $sql=mysql_query("select * from location where zone='".$row_client['zone']."'");
                 while($row = mysql_fetch_array($sql))
                  {
                  ?>
                <option value="<?php echo $row['area']; ?>"><?php echo $row['area']; ?></option>
                <?php } ?> 
                </select>
        </td>
      </tr>
      <tr>
        <td height="60" align="left" valign="middle" class="master">Address</td>
        <td height="60" align="left" valign="middle">:</td>
        <td height="60" align="left" valign="middle"><textarea name="address" class="rounded1" id="address" ><?php echo $row_client['address']; ?></textarea></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Date Of Birth</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="dob" class="rounded" value="<?php echo $row_client['dob']; ?>" id="calendar2"/></td>
      </tr>
      
      <tr>
        <td height="35" align="left" valign="middle" class="master">Contact No.</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="contact" class="rounded" value="<?php echo $row_client['phone']; ?>" onKeyPress="return isNumberKey(event);"/></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Photo</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle">
        <a href="all_img.php?id=<?php echo $_REQUEST['id'];?>&tablename=<?php echo "client_entry";?>">
        <?php if($photo!=''){
		 echo "<img src='clients/$photo' border='0'  width='50' height='50'/>"; 
		}else{
		echo "<img src='clients/default.png' border='0'  width='50' height='50'/>";
		}
			?>
            </a>
        </td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle">&nbsp;</td>
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
      <tr>
        <td height="50" align="center"></td>
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
