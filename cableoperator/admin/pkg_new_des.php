<?php 
require("connection.php"); 
if(empty($_SESSION['user'])) 
{ 

header("Location: index.php"); 
die("Redirecting to index.php");
 
} 

if(isset($_REQUEST['code'])){
	$pkgRCli=mysql_fetch_array(mysql_query("select c_id from pkg_assign where track_code = '".$_REQUEST['code']."'"));
	$Clinm= mysql_fetch_array(mysql_query("select c_name from client_entry where c_id = '".$pkgRCli['c_id']."'"));
}

?>
<?php
if(isset ($_REQUEST['mode']) && $_REQUEST['mode']=='assgn_pkg')
{
$clientId= mysql_real_escape_string($_REQUEST['clientId']);
$pakg= mysql_real_escape_string($_REQUEST['pkg']);
$Pkgm= mysql_real_escape_string($_REQUEST['pkg_m']);
//$pkg_nm= mysql_real_escape_string($_REQUEST['pkg_nm']);
$pkg_nm=$pakg."**".$Pkgm;

$form_date= $_REQUEST['form_date'];
$to_date= $_REQUEST['to_date'];
$random= rand(1000, 9999); 
$track_code= "code-".$random;

//$diff_date = "SELECT DATEDIFF('$to_date','$from_date') AS DiffDate";
//$c_date = mysql_query($diff_date) or die (mysql_error());
//$row_date= mysql_fetch_array($c_date);
//$count_day= $row_date['DiffDate'];
$SelPkg=mysql_query("select * from `pkg_assign` where c_id='".$clientId."'");
$RowSelPkg= mysql_num_rows($SelPkg);
if($RowSelPkg > 0){
	$UpPkg= mysql_query("UPDATE `pkg_assign` SET `status`='0' where c_id='".$clientId."'");
}
      
$query_2= "INSERT INTO `pkg_assign`(`c_id`,`pkg_name`,`from_date`,`to_date`,`track_code`,`pkg_duration`,`status`) 
VALUES ('$clientId','$pkg_nm','$form_date','$to_date','$track_code','".$Pkgm."','1')";
$result_2= mysql_query($query_2) or die (mysql_error());



echo "<script> window.location= 'view_assign_package.php?assigned'; </script>";

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

 <script type="text/javascript" src="js/jquery.js"></script>  
  <script type="text/javascript" src="js/validate.js"></script>  
<script type="text/javascript">
$(document).ready(function(){ 
    

	$("#drive").validate({
		rules: {
			clientId: {
				required: true
			},
			pkg_nm: {
				required: true
			},
			form_date: {
				required: true
			},
			to_date: {
				required: true
			}
			
			
		 
		}, //end rules
		messages: {
			
			clientId: {
				required: "<br />Enter Client Name."
			
			},
			pkg_nm: {
				required: "<br />Enter Package Name."
			
			},
			form_date: {
				required: "<br />Enter Date."
			
			},
			to_date: {
				required: "<br />Enter Price."
			
			}

			
		} //end messages
		
	}); //end validate
  });
</script>


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
    <td align="center" valign="top"><div style="overflow-y:scroll; height:300px; width:925px;">
          <table width="900" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
            <tr>
              <td width="125" height="40" align="center" bgcolor="#fff1ab" class="drive"> Package Name</td>
              <td width="100" height="40" align="center" bgcolor="#fff1ab" class="drive">Client</td>
              <td width="118" height="40" align="center" bgcolor="#fff1ab" class="drive">From Date</td>
              <td width="122" align="center" bgcolor="#fff1ab" class="drive">To Date</td>
              <td width="110" align="center" bgcolor="#fff1ab" class="drive">Active status</td>
              <td width="105" align="center" bgcolor="#fff1ab" class="drive">Renew status</td>
              <td width="105" align="center" bgcolor="#fff1ab" class="drive">ADDOns</td>
              <td width="104" align="center" bgcolor="#fff1ab" class="drive">Payment</td>
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
              </tr>
            <?php
		  
		  $c_id= $_REQUEST['c_id'];
$select_user = "SELECT * from `pkg_assign` where `c_id`='$c_id'  order by id DESC";
$exe_selectuser = mysql_query($select_user) or die (mysql_error());

while ($row= mysql_fetch_array($exe_selectuser))
{ 
    $id= $row['id']; 
	$pkgPayment= mysql_query("select * from `pkg_payment` where track_code='".$row['track_code']."'");	
	$RowPkgPay= mysql_num_rows($pkgPayment);
	$ClientR = mysql_fetch_array(mysql_query("SELECT max(id) as r_id from `pkg_assign` where c_id='".$row['c_id']."'"));
	
	 
?>
            <tr>
              <form name="drive" id="drive" method="post" action="" enctype="multipart/form-data">
                <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['pkg_name']; ?></td>
                <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['c_id']; ?></td>
                <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['from_date']; ?></td>
                <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['to_date']; ?></td>
                <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt">
				<?php if($row['activ_status']== 0){echo "Not Active";}elseif($row['activ_status']== 2){echo "Pending";}elseif($row['activ_status']== 1){echo "Active";} ?></td>
                <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt">
                <?php if($ClientR['r_id']==$row['id']){?>
                <?php if($row['renew_status']== 0){echo "Not Active";}elseif($row['activ_status']== 2){echo "Pending";}elseif($row['activ_status']== 1){?>
                <a href="assign_package.php?code=<?php echo $row['track_code'];?>"><img src="image/renew.png" width="21" height="21" /></a>
                <?php }}?></td>
                <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt">
                <?php if($ClientR['r_id']==$row['id']){?>
				<?php if($row['activ_status']== 1){?>
                <a href="add_addons.php?code=<?php echo $row['track_code'];?>">Add AddOns</a>
                <?php }}?>
                </td>
                <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt">
                <?php if($RowPkgPay>0){echo "Payed";}else{?>
                <a href="package_payment.php?id=<?php echo $id;?>"><img src="image/payment.png" /></a>
                <?php }?>
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
              </tr>
            <?php } ?>
          </table>
        </div></td>
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
