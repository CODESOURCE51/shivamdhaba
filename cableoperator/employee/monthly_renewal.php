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
			radios: {
				required: true
			},
			from_date: {
				required: true
			},
			to_date: {
				required: true
			}
			
		 
		}, //end rules
		messages: {
			

			radios: {
				required: "REQUIRED"
			
			},
			from_date: {
				required:" <br /> Please select form date."
			},
			to_date: {
				required: "<br /> Please select to date."
			
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
<!---------hidden Popup---------------->
  <script language="JavaScript">
    function showDiv(divID,show) {
      var w=document.getElementById(divID);
      w.style.visibility=(show==1)?'visible':'hidden';
    }
  </script>
<style type="text/css">
.hidden {
position: fixed; 
right: 28%; 
visibility: hidden; 
margin-top: 5px; 
background: #fff1ab; 
border: 1px solid #333; 
width:100px;
height:70px;
} 
 
.pop-header {
padding:0px 0px 25px 0px ;
border-bottom: 1px solid #eee;
}
.pop-body {
  overflow-y: auto;
  max-height: 400px;
  padding: 10px;
}
.photo {width:185px;
height:150px;
border:solid #999 1px;
}
.clse {
background:#333333;
height:15px;
width:15px;
border-radius:50%;
-webkit-border-radius:50%;
-moz-border-radius:50%;
text-decoration:none;
}
.clsetxt {text-decoration:none; color:#FFF;
font-weight:bold;
font-size:12px;}
  </style>
<!---------hidden Popup---------------->

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
        <td height="50" align="center"><form action="" method="post" name="mkt" id="mkt" enctype="multipart/form-data" onSubmit=""> 
          <input type="hidden" name="mode" value="search" />
          <table width="450" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="40" colspan="3" align="center" valign="middle"><p style="background-color:#fff1ab; padding:5px; text-align:center; font-family:Verdana, Geneva, sans-serif; font-size:22px; border:1px solid #EFDC86; border-radius:25px;">Monthly Renewal Search</p></td>
            </tr>
              <tr>
                <td width="165" height="18" align="left" valign="middle" class="form_txtr">&nbsp;</td>
                <td width="9" height="18" align="left" valign="middle">&nbsp;</td>
                <td width="276" height="18" align="left" valign="middle">&nbsp;</td>
              </tr>
              
            <tr>
              <td height="35" align="left" valign="middle" class="master">From Date</td>
              <td height="35" align="left" valign="middle">:</td>
              <td height="35" align="left" valign="middle" id="area">
                <input type="text" name="from_date" class="rounded" id="calendar" value="" onSelect="gett"></td>
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
              <table width="800" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
                <tr>
                  <td width="101" height="43" align="center" bgcolor="#fff1ab" class="drive">Client Name</td>
                  <td width="95" height="43" align="center" bgcolor="#fff1ab" class="drive">ClientId</td>
                  <td width="96" align="center" bgcolor="#fff1ab" class="drive">Box No.</td>
                  <td width="94" height="43" align="center" bgcolor="#fff1ab" class="drive">From Date</td>
                  <td width="92" align="center" bgcolor="#fff1ab" class="drive">To date</td>
                  <td width="103" height="43" align="center" bgcolor="#fff1ab" class="drive">Package Name</td>
                  <td width="102" align="center" bgcolor="#fff1ab" class="drive">Package Mode</td>
                  <td width="106" height="43" align="center" bgcolor="#fff1ab" class="drive">Notification Alert</td>
                  <!--<td width="94" align="center" bgcolor="#fff1ab" class="drive">Delete</td>-->
                </tr>
                <tr>
                  <td colspan="8" align="center">
                    <?php 
				$sql5 = "SELECT * from `pkg_assign` where `activ_status`=1 and `to_date` between '$fromdate' and '$to_date'";
$rs5 = mysql_query($sql5);
$j=0;
		  while ($row= mysql_fetch_array($rs5)) {  
		  $j++;
		  $cus_id=$row['c_id'];
		  $track_code=$row['track_code']; 
		  
$sql55 = "SELECT * from `client_entry` Where `c_id`='$cus_id'";
$rs55 = mysql_query($sql55);
$row55 = mysql_fetch_array($rs55);
$c_name = $row55['c_name'];
$Pkg= explode("**",$row['pkg_name']);
	$from_date= $row['from_date'];
	$to_date= $row['to_date'];
	$diff_date = "SELECT DATEDIFF('$to_date','$from_date') AS DiffDate";
	$c_date = mysql_query($diff_date) or die (mysql_error());
	$row_date= mysql_fetch_array($c_date); 
	$count_day= $row_date['DiffDate'];
?>                  </td>
                  </tr>
                <tr>
                    <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $c_name; ?></td>
                    <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['c_id']; ?></td>
                    <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row55['box_no']; ?></td>
                    <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['from_date']; ?></td>
                    <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['to_date']; ?></td>
                    <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $Pkg[0]; ?></td>
                    <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $Pkg[1]; ?></td>
                    <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt">
             <?php if($count_day > 7){ ?>
                <img src="image/1406222141_OK.png" width="21" height="21"/>
                <?php }else{ ?>        
       <div class="hidden" id="dv<?php echo $j;?>">
	<div style="float:right; margin-left:7.4em; margin-top:-1.4em; position:relative;" class="clse">
    <a href="javascript:showDiv('dv<?php echo $j;?>',0)" class="clsetxt">&times;</a>    </div>
    <div style="margin-top:7px;">
        <span style="font-weight:bold; font-family:Arial, Helvetica, sans-serif; font-size:14px; text-align:center;"><?php echo $count_day." Days Remaining"; ?></span> 		</div>		
				</div>
                 <a href="javascript:showDiv('dv<?php echo $j;?>',1)">
                <img src="image/icon_alert.png" width="21" height="19" /></a>
                <?php } ?>                </td>
                    </tr>
                <tr>
                  <td colspan="8"><?php }  ?></td>
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
