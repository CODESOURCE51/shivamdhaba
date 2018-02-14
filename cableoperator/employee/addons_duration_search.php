<?php 


    require("connection.php"); 
     

    if(empty($_SESSION['user'])) 
    { 

        header("Location: index.php"); 

        die("Redirecting to index.php"); 
    } 
	
    $user=$_SESSION['user']['username'];
?>

 
<!----------------------validation----------------------------->

 <script src="assets/jquery.min.js"></script>  
  <script type="text/javascript" src="js/validate.js"></script>  
<script type="text/javascript">
$(document).ready(function(){ 
    

	$("#mkt").validate({
		rules: {
			zone: {
				required: true
			},
			c_id: {
				required: true
			},
			area: {
				required: true
			}
			
		 
		}, //end rules
		messages: {
			

			zone: {
				required: "<br /> Please select Zone."
			
			},
			c_id: {
				required:" <br /> Please select Zone."
			},
			area: {
				required: "<br /> Please select Area."
			
			}
			
			
		} //end messages
		
	}); //end validate
  });
</script>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cable-Operator</title>
<link href="css/template.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/multiple-select.css" />
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

<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #FFFFFF;
}
.radio-toolbar input[type="radio"] {
    display:none;
}

.radio-toolbar label {
    display:inline-block;
    background-color:#ddd;
    padding:4px 11px;
    font-family:Arial;
    font-size:16px;
}

.radio-toolbar input[type="radio"]:checked + label {
    background-color:#FC6;
}
.beforeseven{
	background-color:#00FFCC;
}
.sevendays{
	background-color:#FF8000;
}
.expiredays{
	background-color:#F32136;
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
        <td height="30">&nbsp;</td>
      </tr>
      <tr>
        <td height="50" align="center"><form action="" method="post" name="mkt" id="mkt" enctype="multipart/form-data"> 
          <input type="hidden" name="mode" value="search" />
          <table width="450" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="40" colspan="3" align="center" valign="middle"><p style="background-color:#fff1ab; padding:5px; text-align:center; font-family:Verdana, Geneva, sans-serif; font-size:22px; border:1px solid #EFDC86; border-radius:25px;">Addons Duration Search</p></td>
              </tr>
            <tr>
              <td width="165" height="18" align="left" valign="middle" class="form_txtr">&nbsp;</td>
              <td width="9" height="18" align="left" valign="middle">&nbsp;</td>
              <td width="276" height="18" align="left" valign="middle" class="error">&nbsp;</td>
            </tr>
            <tr>
              <td height="35" align="left" valign="middle" class="master">From Date</td>
              <td height="35" align="left" valign="middle">:</td>
              <td height="35" align="left" valign="middle" id="area"><input type="text" name="from_date" class="rounded" id="calendar" ></td>
            </tr>
            <tr>
              <td height="35" align="left" valign="middle" class="master">To Date</td>
              <td height="35" align="left" valign="middle">:</td>
              <td height="35" align="left" valign="middle" id="c_id"><input type="text" name="to_date" class="rounded" id="calendar2" ></td>
              </tr>
            <tr>
              <td height="18" align="left" valign="middle">&nbsp;</td>
              <td height="18" align="left" valign="middle">&nbsp;</td>
              <td height="18" align="left" valign="middle">&nbsp;</td>
              </tr>
            <tr>
              <td height="35" align="left" valign="middle">&nbsp;</td>
              <td height="35" align="left" valign="middle">&nbsp;</td>
              <td height="35" align="left" valign="middle"><input type="image" src="image/submit.jpg" border="0" name="Search" id="Search" value="submit" /></td>
              </tr>
            </table>
  </form></td>
      </tr>
      <tr>
        <td height="30">&nbsp;</td>
      </tr>
      <tr>
        <td height="50" align="center"><table width="1000" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="center">
            <?php
if(isset ($_REQUEST['mode']) && $_REQUEST['mode']=='search')
{
	$fromdate= mysql_real_escape_string($_REQUEST['from_date']);
	$to_date= mysql_real_escape_string($_REQUEST['to_date']);
	?>
              <table width="750" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
                <tr>
                  <td width="144" height="43" align="center" bgcolor="#fff1ab" class="drive">Client Name</td>
                  <td width="132" height="43" align="center" bgcolor="#fff1ab" class="drive">ClientId</td>
                  <td width="133" align="center" bgcolor="#fff1ab" class="drive">Box no.</td>
                  <td width="128" height="43" align="center" bgcolor="#fff1ab" class="drive">From Date</td>
                  <td width="98" align="center" bgcolor="#fff1ab" class="drive">To date</td>
                  <td width="106" height="43" align="center" bgcolor="#fff1ab" class="drive">Addons Amount</td>
                  <!--<td width="94" align="center" bgcolor="#fff1ab" class="drive">Delete</td>-->
                </tr>
                <tr>
                  <td align="center">
                  <?php 
				$sql5 = "SELECT * from `addons_payment` where `pay_date` between '$fromdate' and '$to_date'";
$rs5 = mysql_query($sql5);
		  while ($row= mysql_fetch_array($rs5)) {  
		  $cus_id=$row['c_id'];
		  $total_amount=$row['total_amount']; 
		  
$sql55 = "SELECT * from `client_entry` Where `c_id`='$cus_id'";
$rs55 = mysql_query($sql55);
$row55 = mysql_fetch_array($rs55);
$c_name = $row55['c_name'];

$net_bill_amount[]= round($total_amount);
?>
                  </td>
                  <td colspan="2" align="center">&nbsp;</td>
                  <td align="center">&nbsp;</td>
                  <td align="center">&nbsp;</td>
                  <td align="center">&nbsp;</td>
                  </tr>
                <tr>
                    <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php  echo $c_name; ?></td>
                    <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['c_id']; ?></td>
                    <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row55['box_no']; ?></td>
                    <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['pay_date']; ?></td>
                    <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['to_date']; ?></td>
                    <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $total_amount; ?></td>
                    </tr>
                <tr>
                  <td><?php }  ?></td>
                  <td colspan="2">&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  </tr>
                <tr>
                  <td><a href="pdf/examples/addons_search.php?fromdate=<?php echo $fromdate;?>&todate=<?php echo $to_date; ?>" target="_blank"><img src="image/pdf_icon.png" border="0" /></a></td>
                  <td colspan="2">&nbsp;</td>
                  <td>&nbsp;</td>
                  <td align="right" class="drive_txt">Net Total</td>
                  <td align="center" class="drive_txt"><?php echo array_sum($net_bill_amount);?></td>
                  </tr>
              </table>
              <?php } ?>
          </td>
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
