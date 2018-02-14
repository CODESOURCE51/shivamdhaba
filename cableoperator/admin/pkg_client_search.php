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
<!----Poopup----->
<style type="text/css">
* {margin: 0; padding: 0}
.shadow {width: 100%; height: 100%; position: fixed; background-color: #444; top: 0; left:0; z-index: 400}
#modal {z-index: 500; position: absolute; background: #fff; top: 50px;}
#modal iframe {width: 100%; height: 100%}
#closeModal {position: absolute; top: -15px; right: -15px; font-size: 0.8em; }
#closeModal img {width: 30px; height: 30px;}
</style>

<script type="application/ecmascript">
var shadow, modalX, modalY, modalWidth, modalHeight;

function modal(url) {
    return '<div id="modal"><a id="closeModal" title="close" href="javascript:;"><img src="http://findicons.com/files/icons/2212/carpelinx/64/fileclose.png" alt="close" /></a><iframe src="' + url + '"></iframe></div>';
}
shadow = "<div class='shadow'></div>";

$(document).ready(function() {
    $(".myModal").on("click", function(e) {
        e.preventDefault();
        // get size and position
        modalWidth = $(this).data("width");
        modalHeight = $(this).data("height");
        modalX = (($(window).innerWidth()) - modalWidth) / 2;
        modalY = (($(window).innerHeight()) - modalHeight) / 2;
        // append shadow layer
        $(shadow).prependTo("body").css({
            "opacity": 0.7
        });
        // append modal
        $(modal(this.href)).appendTo("body").css({
            "top": modalY,
            "left": modalX,
            "width": modalWidth,
            "height": modalHeight
        });
        // close and remove
        $("#closeModal").on("click", function() {
            $("#modal, .shadow").remove();
        });
        $(document).keyup(function(event) {
            if (event.keyCode === 27) {
                $("#modal, .shadow").remove();
            }
        }); //keyup
    }); // on
}); // ready
</script>


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
          <table width="520" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="40" colspan="2" align="center" valign="middle"><p style="background-color:#fff1ab; padding:5px; text-align:center; font-family:Verdana, Geneva, sans-serif; font-size:18px; border:1px solid #EFDC86; border-radius:25px;">Clients Record According to Package</p></td>
              </tr>
              <tr>
              <td colspan="2" height="18" align="left" valign="middle" class="error">&nbsp;</td>
              </tr>
            <tr>
              <td height="18" align="left" valign="middle" class="form_txtr">&nbsp;</td>
              <td width="100" height="18" align="left" valign="middle">&nbsp;</td>
              </tr>
              
            <tr>
              <td height="35" align="left" valign="middle" class="master"><div class="radio-toolbar">  
                <input type="radio" id="radio1" name="radios" value="Monthly" <?php if(isset($_REQUEST['mode']) && $_REQUEST['mode']=='search' && $_REQUEST['radios']=='Monthly'){echo "checked";}?>>
                <label for="radio1">Monthly</label>
                
                <input type="radio" id="radio4" name="radios" value="Quarterly" <?php if(isset($_REQUEST['mode']) && $_REQUEST['mode']=='search' && $_REQUEST['radios']=='Quarterly'){echo "checked";}?>>
                <label for="radio4">Quarterly</label>
                
                <input type="radio" id="radio2" name="radios"value="Haly Yearly" <?php if(isset($_REQUEST['mode']) && $_REQUEST['mode']=='search' && $_REQUEST['radios']=='Haly Yearly'){echo "checked";}?>>
                <label for="radio2">Haly Yearly</label>
                
                <input type="radio" id="radio3" name="radios" value="Annually" <?php if(isset($_REQUEST['mode']) && $_REQUEST['mode']=='search' && $_REQUEST['radios']=='Annually'){echo "checked";}?>>
                <label for="radio3">Annually</label>
                
</div></td>
              <td height="35" align="left" valign="middle" class="master"><input type="image" src="image/submit.jpg" border="0" name="Search" id="Search" value="submit" /></td>
              </tr>
            <tr>
              <td height="18" align="left" valign="middle">&nbsp;</td>
              <td height="18" align="left" valign="middle">&nbsp;</td>
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
	$radios= mysql_real_escape_string($_REQUEST['radios']);
	?>
	<p style="background-color:#fff1ab; padding:5px; text-align:center; font-family:Verdana, Geneva, sans-serif; font-size:16px; border:1px solid #EFDC86; border-radius:20px; width:120px;"><?php echo $_REQUEST['radios']; ?></p>
	
	
              <table width="950" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
                <tr>
                  <td width="124" height="43" align="center" bgcolor="#fff1ab" class="drive">Client Name</td>
                  <td width="105" height="43" align="center" bgcolor="#fff1ab" class="drive">ClientId</td>
                  <td width="105" align="center" bgcolor="#fff1ab" class="drive">Box No.</td>
                  <td width="91" height="43" align="center" bgcolor="#fff1ab" class="drive">Zone</td>
                  <td width="89" align="center" bgcolor="#fff1ab" class="drive">Area</td>
                  <td width="104" height="43" align="center" bgcolor="#fff1ab" class="drive">Package Name</td>
                  <td width="125" align="center" bgcolor="#fff1ab" class="drive"><p>Package</p>
                    <p>Mode</p></td>
                  <td width="98" height="43" align="center" bgcolor="#fff1ab" class="drive">Addons</td>
                  <td width="97" height="43" align="center" bgcolor="#fff1ab" class="drive">Subscription Date</td>
                  <!--<td width="94" align="center" bgcolor="#fff1ab" class="drive">Delete</td>-->
                </tr>
                <tr>
                  <td colspan="9" align="center">
                  <?php 
				$sql5 = "SELECT * from `pkg_assign` where `pkg_duration`='$radios' and `status`='1'";
$rs5 = mysql_query($sql5);
$rowPk= mysql_num_rows($rs5);

if($rowPk > 0){
		  while ($row= mysql_fetch_array($rs5)) {  
		  $cus_id=$row['c_id'];
		  $track_code=$row['track_code']; 
		  
$sql55 = "SELECT * from `client_entry` Where `c_id`='$cus_id'";
$rs55 = mysql_query($sql55);
$row55 = mysql_fetch_array($rs55);
$c_name = $row55['c_name'];
$pkg=explode("**",$row['pkg_name']);
/*$sql66 = "SELECT * from `pkg_payment` Where `track_code`='$track_code'";
$rs66 = mysql_query($sql66);
$row66 = mysql_fetch_array($rs66);
$tot_payed = $row66['tot_payed'];

$query_2= "SELECT SUM(total_amount) as total_amount FROM `addons_payment` WHERE `track_code`='$track_code'";
$result_2= mysql_query($query_2) or die(mysql_error());
$row_2= mysql_fetch_array($result_2);
$total_amount= $row_2['total_amount'];

$grand_total=$tot_payed+$total_amount;
$net_bill_amount[]= round($grand_total);*/

$query_2= "SELECT * FROM `addons_payment` WHERE `track_code`='$track_code'";
$result_2= mysql_query($query_2) or die(mysql_error());
$row_2= mysql_num_rows($result_2);
?>                  </td>
                  </tr>
                <tr>
                    <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php  echo $c_name; ?></td>
                    <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['c_id']; ?></td>
                    <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row55['box_no']; ?></td>
                    <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row55['zone']; ?></td>
                    <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row55['area']; ?></td>
                    <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $pkg[0]; ?></td>
                    <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $pkg[1]; ?></td>
                    <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php if($row_2 > 0){?>
                   <a href="addon_list.php?track_code=<?php echo $track_code; ?>" class="myModal" data-width="675" data-height="500">Check List</a>
                    <?php }else{?>
                    No Assigned Addons
                    <?php }?>
                    </td>
                    <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['from_date']; ?></td>
                </tr>
                <tr>
                  <td colspan="9"><?php }}else{  ?></td>
                </tr>
                 <tr>
                  <td height="30" colspan="9" align="center" class="drive_txt">No records found</td>
                </tr>
                <?php } ?>
              </table>
              <?php } ?>
          </td>
          </tr>
          <tr><td height="10"></td></tr>
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
