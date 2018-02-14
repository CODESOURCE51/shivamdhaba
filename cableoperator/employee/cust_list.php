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
if(isset ($_REQUEST['mode']) && $_REQUEST['mode']=='client_entry')
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
$random= rand(10000, 99999); 
$pwd= $cust_code."-".$random;

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
		$target = "clients/"; 
        $target = $target .$rand. basename( $_FILES["file"]["name"]) ; 
      move_uploaded_file($_FILES["file"]["tmp_name"],$target);
	  $item_image= basename($rand.$_FILES['file']['name']);
      }
	  
}



$query_2= "INSERT INTO `client_entry` (`c_name`,`c_id`,`email`,`subscription_date`,`zone`,`area`,`address`,`dob`,`phone`,`image`,`password`,`username`) 
VALUES ('$customer_name','$cust_code','$email','$subs_date','$zone','$area','$address','$dob','$contact','$item_image','$pwd','$cust_code')";
$result_2= mysql_query($query_2) or die (mysql_error());


$to=$email;
$subject="Message from CableComm";
$message='<table align="center" width="700" style="border:outset #0099FF;">

<tr>
	<td width="700" align="center" style="font-family:Arial, Helvetica, sans-serif; font-size:14px; text-align:left; width:400; padding:10px; height:10px;"><img src="employee/image/logo.png"/></td>
</tr>
<tr>
  <td style="font-family:Arial, Helvetica, sans-serif; font-size:14px; text-align:left; padding:10px;">Hi '.$customer_name.' </td>
</tr>
<tr>
  <td style="font-family:Arial, Helvetica, sans-serif; font-size:14px; text-align:left; padding:10px;">
  Welcome To 
  <span style="font-family:Arial, Helvetica, sans-serif; font-size:14px; text-align:left; width:400; padding:10px; height:15px;">CableComm.</span>
   Your Username is: '.$cust_code.'
  </td>
</tr>
<tr>
	<td style="font-family:Arial, Helvetica, sans-serif; font-size:14px; text-align:left; width:400; padding:10px; height:15px;"> Thanks for using CableComm!</td>
</tr>

</table>';
$headers = "From: admin@cablecomm.com\r\nReply-To: admin@cablecomm.com";
$headers .= "\r\nMIME-Version: 1.0\r\nContent-Type: text/html; charset=iso-8859-1";
        mail($to, $subject, $message, $headers);
		

echo "<script> window.location= 'client_entry.php?insert'; </script>";

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
				required: true,
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
			
		 
		}, //end rules
		messages: {
			
			customer_name: {
				required: "<br /> Please Entry Customer name."
			
			},
			email: {
				required: "<br /> Please Entry email.",
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
<!-----------------------------ajax search-------------------->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="jquery.autocomplete.js"></script>
<link rel="stylesheet" type="text/css" href="jquery.autocomplete.css" />

<script type="text/javascript">
$().ready(function() {
	$("#clientId").autocomplete("get_list.php", {
		width: 260,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});
});
</script>
<!-----------------------------ajax search-------------------->
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cable-Operator</title>
<link href="css/template.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/multiple-select.css" />
<link rel="stylesheet" href="css/page_style.css" type="text/css" />

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
    <td align="center" valign="top"><table width="1044" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #CCC;">
      <tr>
        <td><?php include_once("menu.php"); ?></td>
      </tr>
      <tr>
        <td align="center">
          </td>
      </tr>
      <tr>
      <td height="80">
          <form action="" name="form" id="form" method="post" enctype="multipart/form-data">
          <table align="right" width="300" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="30" align="left" valign="middle" class="adm1_txt"><input type="text" name="clientId" id="clientId" class="rounded" />              </td>
              <td height="30" align="left" valign="middle" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#999;"><input type="image" src="image/search.png" /></td>
              </tr>
          </table>
          </form>
      </td>
      </tr>
      <tr>
        <td height="50" align="center">
        <table width="1020" border="0" cellspacing="0" cellpadding="0">
        
          <tr>
            <td align="center">
            <?php
		  if (isset($_POST['clientId']))
           {
			   $clientId=$_REQUEST['clientId'];
			   if($clientId!=''){
		  ?>
          <table width="1020" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
          <tr align="center" style="padding-left:10px;">
            <td width="111" height="43" bgcolor="#fff1ab" class="drive">Client Id</td>
            <td width="132" height="43" bgcolor="#fff1ab" class="drive">Client Name</td>
            <td width="80" height="43" bgcolor="#fff1ab" class="drive">Zone</td>
            <td width="108" bgcolor="#fff1ab" class="drive">Area</td>
            <td width="105" height="43" bgcolor="#fff1ab" class="drive">Subscription Dt.</td>
            <td width="105" bgcolor="#fff1ab" class="drive">Box No.</td>
            <td width="107" height="43" bgcolor="#fff1ab" class="drive">Address</td>
            <td width="131" height="43" bgcolor="#fff1ab" class="drive">Contact No</td>
            <td width="129" bgcolor="#fff1ab" class="drive">Package</td>
            <!--<td width="94" align="center" bgcolor="#fff1ab" class="drive">Delete</td>-->
            </tr>
          <tr>
            <td colspan="9" align="center"> 
			<?php $QueryClient= mysql_query("select * from client_entry where c_id = '".$clientId."'"); 
		  		while($ClientSearch = mysql_fetch_array($QueryClient)){
					$pkgFetch= mysql_fetch_array(mysql_query("select max(id) as MCli from `pkg_assign` where `c_id` = '".$clientId."'"));
					$pkgFetch2= mysql_fetch_array(mysql_query("select * from `pkg_assign` where `id` = '".$pkgFetch['MCli']."'"));
					$pkg= explode("**",$pkgFetch2['pkg_name']);
		  ?>
            </td>
            <!-- <td align="center">&nbsp;</td>-->
            </tr>
         
          <tr align="center" style="padding-left:10px;">
      <form name="drive" id="drive" method="post" action="edit_client.php?id=<?php echo $ClientSearch['id'];?>" enctype="multipart/form-data">    
 <td height="30" bgcolor="#FEEDE7" class="drive_txt"><?php echo $ClientSearch['c_id']; ?></td>
 <td height="30" bgcolor="#FEEDE7" class="drive_txt"><?php echo $ClientSearch['c_name']; ?></td>
 <td height="30" bgcolor="#FEEDE7" class="drive_txt"><?php echo $ClientSearch['zone']; ?></td>
 <td height="30" bgcolor="#FEEDE7" class="drive_txt"><?php echo $ClientSearch['area']; ?></td>
 <td height="30" bgcolor="#FEEDE7" class="drive_txt"><?php echo $ClientSearch['subscription_date']; ?></td>
 <td height="30" bgcolor="#FEEDE7" class="drive_txt"><?php echo $ClientSearch['box_no']; ?></td>
 <td height="30" bgcolor="#FEEDE7" class="drive_txt"><?php echo $ClientSearch['address']; ?></td>
 <td height="30" bgcolor="#FEEDE7" class="drive_txt"><?php echo $ClientSearch['phone']; ?></td>
 <td height="30" bgcolor="#FEEDE7" class="drive_txt">
 <?php if($pkg[0]!=""){ echo $pkg[0];}else{ echo "No Package Assigned";} ?><br /><a href="assign_package.php?cid=<?php echo $ClientSearch['c_id'];?> ">[Assign New]</a></td>
 <!--<td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><a href="delete_client.php?id=<?php //echo $row['id'];?>"><img src="image/delete.png" height="25" width="70" border="0" /></a></td>-->
      </form>
          </tr>
          <tr>
            <td colspan="9"><?php } ?></td>
            <!--<td>&nbsp;</td>-->
            </tr>
 
        </table>
        <?php }else{ echo "Sorry! No clients found";} ?> 
          <?php }else{ ?>
            <table width="1020" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
          <tr align="center" style="padding-left:10px;">
            <td width="111" height="43" bgcolor="#fff1ab" class="drive">Client Id</td>
            <td width="132" height="43" bgcolor="#fff1ab" class="drive">Client Name</td>
            <td width="82" height="43" bgcolor="#fff1ab" class="drive">Zone</td>
            <td width="106" bgcolor="#fff1ab" class="drive">Area</td>
            <td width="103" height="43" bgcolor="#fff1ab" class="drive">Subscription Dt.</td>
            <td width="104" bgcolor="#fff1ab" class="drive">Box No.</td>
            <td width="112" height="43" bgcolor="#fff1ab" class="drive">Address</td>
            <td width="128" height="43" bgcolor="#fff1ab" class="drive">Contact No</td>
            <td width="130" bgcolor="#fff1ab" class="drive">Package</td>
            <!--<td width="94" align="center" bgcolor="#fff1ab" class="drive">Delete</td>-->
            </tr>
          <tr>
            <td colspan="9" align="center"> <?php
		  $tbl_name="client_entry";
		  $sql = "SELECT * FROM $tbl_name order by id desc";
	$result = mysql_query($sql);
		  
while ($row= mysql_fetch_array($result))
{ 
$pkgFetch= mysql_fetch_array(mysql_query("select max(id) as MCli from `pkg_assign` where `c_id` = '".$row['c_id']."'"));
					$pkgFetch2= mysql_fetch_array(mysql_query("select * from `pkg_assign` where `id` = '".$pkgFetch['MCli']."'"));
					$pkg= explode("**",$pkgFetch2['pkg_name']);	 
?>
            </td>
            <!-- <td align="center">&nbsp;</td>-->
            </tr>
         
          <tr align="center" style="padding-left:10px;">
      <form name="drive" id="drive" method="post" action="edit_client.php?id=<?php echo $row['id'];?>" enctype="multipart/form-data">    
 <td height="30" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['c_id']; ?></td>
 <td height="30" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['c_name']; ?></td>
 <td height="30" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['zone']; ?></td>
 <td height="30" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['area']; ?></td>
 <td height="30" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['subscription_date']; ?></td>
 <td height="30" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['box_no']; ?></td>
 <td height="30" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['address']; ?></td>
 <td height="30" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['phone']; ?></td>
 <td height="30" bgcolor="#FEEDE7" class="drive_txt">
 <?php if($pkg[0]!=""){ echo $pkg[0];}else{ echo "No Package Assigned";} ?><br /><a href="assign_package.php?cid=<?php echo $row['c_id'];?> ">[Assign New]</a></td>
 <!--<td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><a href="delete_client.php?id=<?php echo $row['id'];?>"><img src="image/delete.png" height="25" width="70" border="0" /></a></td>-->
      </form>
          </tr>
          <tr>
            <td colspan="9"><?php } ?></td>
            <!--<td>&nbsp;</td>-->
            </tr>
 
        </table>
        <?php }?>
           </td>
          </tr>
        </table>
 
        </td>
      </tr>
      <tr>
        <td height="26" align="center">&nbsp;</td>
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
