<?php 
require("connection.php"); 
if(empty($_SESSION['user'])) 
{ 

header("Location: index.php"); 
die("Redirecting to index.php");
 
} 

$Package=mysql_query("select * from `pkg_assign` where id='".$_REQUEST['id']."'");
$FetchPackage=mysql_fetch_array($Package);
$Pkg_price=mysql_fetch_array(mysql_query("select * from `package` where pkg_name='".$FetchPackage['pkg_name']."'"));

?>
<?php
if(isset ($_REQUEST['mode']) && $_REQUEST['mode']=='pkg_payment')
{

if($_REQUEST['ded_amt']== 0){
$query_update= "INSERT into `pkg_payment` SET
			`c_id`='".$_REQUEST['client']."',
			`pkg_name`='".$_REQUEST['pkg_nm']."',
			`from_date`='".$_REQUEST['form_date']."',
			`to_date`='".$_REQUEST['to_date']."',
			`track_code`='".$_REQUEST['track_code']."',
			`amount`='".$_REQUEST['amount']."',
			`ded_chnl`='".$_REQUEST['deduct']."',
			`ded_amt`='".$_REQUEST['ded_amt']."',
			`tot_payed`='".round($_REQUEST['price'])."',
			`pay-date`='".date('Y-m-d')."',
			`late_fine`='".$_REQUEST['fine']."',
			`approval`='1',
			`pkg_duration`='".$_REQUEST['pkg_duration']."'";
            $qu_up= mysql_query($query_update) or die(mysql_error());


	
	$upPkg=mysql_query("update `pkg_assign` set `activ_status`='1' , `renew_status`='1' where id='".$_REQUEST['id']."'");
	
}elseif($_REQUEST['ded_amt'] > 0){
	
$query_update= "INSERT into `pkg_payment` SET
			`c_id`='".$_REQUEST['client']."',
			`pkg_name`='".$_REQUEST['pkg_nm']."',
			`from_date`='".$_REQUEST['form_date']."',
			`to_date`='".$_REQUEST['to_date']."',
			`track_code`='".$_REQUEST['track_code']."',
			`amount`='".$_REQUEST['amount']."',
			`ded_chnl`='".$_REQUEST['deduct']."',
			`ded_amt`='".$_REQUEST['ded_amt']."',
			`tot_payed`='".round($_REQUEST['price'])."',
			`pay-date`='".date('Y-m-d')."',
			`late_fine`='".$_REQUEST['fine']."',
			`approval`='0',
			`pkg_duration`='".$_REQUEST['pkg_duration']."'";
            $qu_up= mysql_query($query_update) or die(mysql_error());	
			
$upPkg=mysql_query("update `pkg_assign` set `activ_status`='2' , `renew_status`='2' where id='".$_REQUEST['id']."'");

} 
echo "<script> window.location= 'view_assign_package.php?success'; </script>";

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


<!----------------------phone no----------------------------->
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
<script type="text/javascript">
function subtot() {
var amount = 0;
var ded_amt = 0;
var fine = 0;
var obj = document.getElementsByTagName("input");
      for(var i=0; i<obj.length; i++){
		   if(obj[i].name == "amount"){var amount = obj[i].value;}
		   if(obj[i].name == "ded_amt"){var ded_amt = obj[i].value;}
		   if(obj[i].name == "fine"){var fine = obj[i].value;}
         if(obj[i].name == "price"){
          		if(amount >= 0 && ded_amt>=0 && fine>=0)
				{
					obj[i].value = amount-ded_amt-(-fine);
					total+=(obj[i].value*1);
					}
          				else
						{
							obj[i].value = 0;total+=(obj[i].value*1);
							}
          		}
         	 }
        document.getElementById("total").value = total*1;
        total=0;
}
</script>

<!-----------------------------auto calculation-------------------->

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

        <td height="30">&nbsp;</td>
      </tr>
      <tr>
        <td height="350" align="center">
          <form name="drive" id="drive" method="post" action="" enctype="multipart/form-data">
           <input type="hidden" name="mode" value="pkg_payment" />
            <table width="500" border="0" cellspacing="1" cellpadding="0">
              <tr class="drive">
                <td height="39" colspan="3" align="center"><p style="background-color:#fff1ab; padding:5px; text-align:center; font-family:Verdana, Geneva, sans-serif; font-size:20px; border:1px solid #EFDC86; border-radius:25px; font-weight:lighter;">Package Payment</p></td>
                </tr>
              <tr>
                <td height="18" colspan="3" align="center"></td>
                </tr>
              <tr>
                <td width="223" height="50" align="left" bgcolor="#FFFFFF" class="drive_txt" style="padding-left:15px;">Client </td>
                <td width="45" height="50" align="center" bgcolor="#FFFFFF" class="drive_txt">:</td>
                <td width="226" height="50" align="left" bgcolor="#FFFFFF" class="drive_txt" valign="middle"> 
                <input type="text" name="client" value="<?php echo $FetchPackage['c_id'];?>" readonly="readonly" class="rounded" />
                </td>
                </tr>
              <tr>
                <td height="50" align="left" bgcolor="#FFFFFF" class="drive_txt" style="padding-left:15px;">Package Name</td>
                <td height="50" align="center" bgcolor="#FFFFFF" class="drive_txt">:</td>
                <td height="50" align="left" bgcolor="#FFFFFF" class="drive_txt" valign="middle">
                 <input type="text" name="pkg_nm" value="<?php echo $FetchPackage['pkg_name'];?>" readonly="readonly" class="rounded" />
                </td>
              </tr>
              <tr>
                <td height="50" align="left" bgcolor="#FFFFFF" class="drive_txt" style="padding-left:15px;">Form Date</td>
                <td align="center" bgcolor="#FFFFFF" class="drive_txt">:</td>
                <td height="50" align="left" bgcolor="#FFFFFF"><input type="text" name="form_date" class="rounded" value="<?php echo $FetchPackage['from_date'];?>" readonly="readonly"/></td>
              </tr>
              <tr>
                <td height="50" align="left" bgcolor="#FFFFFF" class="drive_txt" style="padding-left:15px;">To Date</td>
                <td align="center" bgcolor="#FFFFFF" class="drive_txt">:</td>
                <td height="50" align="left" bgcolor="#FFFFFF" ><input type="text" name="to_date" class="rounded" value="<?php echo $FetchPackage['to_date'];?>" readonly="readonly" /></td>
              </tr>
               <tr>
                <td height="50" align="left" bgcolor="#FFFFFF" class="drive_txt" style="padding-left:15px;">Amount</td>
                <td align="center" bgcolor="#FFFFFF" class="drive_txt">:</td>
                <td height="50" align="left" bgcolor="#FFFFFF" ><input type="text" id="amount" name="amount" value="<?php echo $Pkg_price['price'];?>" class="rounded" readonly="readonly"/></td>
              </tr>
              <tr>
                <td height="50" align="left" bgcolor="#FFFFFF" class="drive_txt" style="padding-left:15px;">Deducted Channel</td>
                <td align="center" bgcolor="#FFFFFF" class="drive_txt">:</td>
                <td height="50" align="left" bgcolor="#FFFFFF" ><textarea name="deduct" class="rounded"></textarea></td>
              </tr>
              <tr>
                <td height="50" align="left" bgcolor="#FFFFFF" class="drive_txt" style="padding-left:15px;">Total Deducted Amount</td>
                <td align="center" bgcolor="#FFFFFF" class="drive_txt">:</td>
                <td height="50" align="left" bgcolor="#FFFFFF" ><input type="text" name="ded_amt" id="ded_amt" value="0" class="rounded" onkeypress="return isNumberKey(event);"/></td>
              </tr>
              <tr>
                <td height="50" align="left" bgcolor="#FFFFFF" class="drive_txt" style="padding-left:15px;">Late Fines</td>
                <td align="center" bgcolor="#FFFFFF" class="drive_txt">:</td>
                <td height="50" align="left" bgcolor="#FFFFFF" ><input type="text" name="fine" id="fine" value="0" class="rounded" onkeypress="return isNumberKey(event);"/></td>
              </tr>
              <tr>
                <td height="50" align="left" bgcolor="#FFFFFF" class="drive_txt" style="padding-left:15px;">Total</td>
                <td align="center" bgcolor="#FFFFFF" class="drive_txt">:</td>
                <td height="50" align="left" bgcolor="#FFFFFF" ><input type="text" name="price" id="price" value="" style="width:80px;" class="rounded" onclick="subtot()"/></td>
              </tr>
              <tr>
                <td height="40" colspan="3" align="center" bgcolor="#FFFFFF" class="drive_txt">
                <input type="hidden" name="track_code" value="<?php echo $FetchPackage['track_code'];?>" />
                <input type="hidden" name="pkg_duration" value="<?php echo $FetchPackage['pkg_duration'];?>" />
                <input type="image" src="image/submit.jpg" name="submit" id="submit" value="submit" /> </td>
              </tr>
              
              
          </table></form></td>
      </tr>
      <tr>
        <td height="30">&nbsp;</td>
      </tr>
      <tr>
        <td height="30">&nbsp;</td>
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
