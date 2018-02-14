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
			c_id: {
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
			

			c_id: {
				required: " <br /> Please select Customer."
			
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
          <table width="450" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="40" colspan="3" align="center" valign="middle"><p style="background-color:#fff1ab; padding:5px; text-align:center; font-family:Verdana, Geneva, sans-serif; font-size:22px; border:1px solid #EFDC86; border-radius:25px;">Bill Details</p></td>
              </tr>
              <tr>
              <td colspan="3" height="18" align="left" valign="middle" class="error">&nbsp;</td>
              </tr>
            <tr>
              <td width="165" height="35" align="left" valign="middle" class="master" >Client Id</td>
              <td width="9" height="35" align="left" valign="middle">:</td>
              <td width="276" height="35" align="left" valign="middle"><select name="c_id" id="c_id" class="rounded">
                <option value="">Select Client</option>
                 <?php
                 $sql=mysql_query("select * from client_entry ");
                 while($row = mysql_fetch_array($sql))
                  {
                  ?>
                <option value="<?php echo $row['c_id']; ?>"><?php echo $row['c_id']."|".$row['c_name']; ?></option>
                <?php } ?> 
                </select></td>
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
	$c_id= mysql_real_escape_string($_REQUEST['c_id']);
	$fromdate= mysql_real_escape_string($_REQUEST['from_date']);
	$to_date= mysql_real_escape_string($_REQUEST['to_date']);
	?>
              <table width="950" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
                <tr>
                  <td height="25" colspan="10" align="center" bgcolor="#fff1ab" class="drive" style="font-size:18px;">
				  <a href="clients.php?cid=<?php echo $c_id; ?>" class="myModal" data-width="520" data-height="500">
				  <?php 
				  $sql55 = "SELECT * from `client_entry` Where `c_id`='$c_id'";
                  $rs55 = mysql_query($sql55);
                  $row55 = mysql_fetch_array($rs55);
                  $c_name = $row55['c_name'];
                  echo $c_name;
				  ?>
                  </a></td>
                  </tr>
                <tr>
                  <td width="112" height="30" align="center" bgcolor="#fff1ab" class="drive">Box No.</td>
                  <td width="112" align="center" bgcolor="#fff1ab" class="drive">Package Name</td>
                  <td width="97" align="center" bgcolor="#fff1ab" class="drive">Mode</td>
                  <td width="104" height="30" align="center" bgcolor="#fff1ab" class="drive">Addons Name</td>
                  <td width="107" height="30" align="center" bgcolor="#fff1ab" class="drive">From Date</td>
                  <td width="93" height="30" align="center" bgcolor="#fff1ab" class="drive">To date</td>
                  <td width="110" height="30" align="center" bgcolor="#fff1ab" class="drive">Package Amount</td>
                  <td width="91" height="30" align="center" bgcolor="#fff1ab" class="drive">Addons Amount</td>
                  <td width="57" height="30" align="center" bgcolor="#fff1ab" class="drive">Total</td>
                  <td width="54" align="center" bgcolor="#fff1ab" class="drive">Pdf Report</td>
                  <!--<td width="94" align="center" bgcolor="#fff1ab" class="drive">Delete</td>-->
                </tr>
                <tr>
                  <td colspan="10" align="center"> <?php 
				$sql5 = "SELECT * from `pkg_assign` where `c_id`='$c_id' and `activ_status`=1 and `from_date` between '$fromdate' and '$to_date'";
$rs5 = mysql_query($sql5);
		  while ($row= mysql_fetch_array($rs5)) {  
		  $cus_id=$row['c_id'];
		  $track_code=$row['track_code']; 

$sql66 = "SELECT * from `pkg_payment` Where `track_code`='$track_code'";
$rs66 = mysql_query($sql66);
$row66 = mysql_fetch_array($rs66);
$tot_payed = $row66['tot_payed'];
$Pkg= explode("**",$row['pkg_name']);
$query_2= "SELECT SUM(total_amount) as total_amount FROM `addons_payment` WHERE `track_code`='$track_code'";
$result_2= mysql_query($query_2) or die(mysql_error());
$row_2= mysql_fetch_array($result_2);
$total_amount= $row_2['total_amount'];
//echo $total_amount;

$grand_total= $tot_payed+$total_amount;

?></td>
                  </tr>
                <tr>
                    <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['box_no'] ?></td>
                    <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $Pkg[0]; ?></td>
                    <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $Pkg[1]; ?></td>
                    <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php if($total_amount > '0'){ ?> 
                    <a href="addon_list.php?track_code=<?php echo $track_code; ?>" class="myModal" data-width="675" data-height="500">Check List</a>
                    <?php }else{ ?>
                    No Addons Assigned
                    <?php }?>					</td>
                    <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['from_date']; ?></td>
                    <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['to_date']; ?></td>
                    <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo round($tot_payed); ?></td>
                    <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $total_amount; ?></td>
                    <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo round($grand_total); ?></td>
                    <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt">
                    <a href="pdf/examples/client_bill_report.php?code=<?php echo $track_code;?>&gt=<?php echo round($grand_total); ?>" target="_blank">
                  <img src="image/pdf_icon.png" border="1"/>                  </a>                    </td>
                </tr>
                <tr>
                  <td colspan="10"><?php }  ?></td>
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
