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
<!----------------------validation----------------------------->

<script type='text/javascript' src='jquery.autocomplete.js'></script>
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
<!-----------------------------Two drops-------------------->
<script>
function getclient(id)
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
xmlhttp.onreadystatechange()=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("client").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("POST","ajax_client.php?id="+id,true);
xmlhttp.send();
}
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
    <td align="center" valign="top"><table width="1024" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #CCC;">
      <tr>
        <td><?php include_once("menu.php"); ?></td>
      </tr>
      <tr>

        <td height="30">&nbsp;</td>
      </tr>
      <tr>
        <td height="100" align="center">
          <form name="drive" id="drive" method="post" action="" enctype="multipart/form-data">
           <input type="hidden" name="mode" value="search" />
            <table width="550" border="0" cellspacing="1" cellpadding="0">
              <tr class="drive">
                <td colspan="4" align="center"><p style="background-color:#fff1ab; padding:5px; text-align:center; font-family:Verdana, Geneva, sans-serif; font-size:20px; border:1px solid #EFDC86; border-radius:25px; font-weight:lighter;">Customer Details</p></td>
              </tr>
              <tr>
                <td width="104" height="70" align="left" bgcolor="#FFFFFF" class="master" style="padding-left:15px;">Client Id</td>
                <td width="20" height="70" align="center" bgcolor="#FFFFFF" class="drive_txt">:</td>
                <td width="284" height="70" align="left" bgcolor="#FFFFFF" class="drive_txt" valign="middle"> 
                  
                  <input type="text" name="clientId" id="clientId" class="rounded" onselect="getclient(this.value)"  />
                  
                  </td>
                <td width="137" height="70" align="left" valign="middle" bgcolor="#FFFFFF" class="drive_txt"><span class="drive_txt" style="padding-right:10px;">
                  <input type="image" src="image/submit.jpg" name="submit" id="submit" value="submit" />
                </span></td>
              </tr>
                <tr>
                <td colspan="4" id="client"></td>
              </tr>
              <tr>
                <td height="40" colspan="4" align="right" bgcolor="#FFFFFF" class="drive_txt" style="padding-right:10px;">&nbsp;</td>
              </tr>
              
              
          </table></form></td>
      </tr>
      <tr>
        <td height="30" align="center">
        <style type="text/css">
* {margin: 0; padding: 0}
.shadow {width: 100%; height: 100%; position: fixed; background-color: #444; top: 0; left:0; z-index: 400}
#modal {z-index: 500; position: absolute; background: #fff; top: 50px;}
#modal iframe {width: 100%; height: 100%}
#closeModal {position: absolute; top: -15px; right: -15px; font-size: 0.8em; }
#closeModal img {width: 30px; height: 30px;}
.sevendays{
	background-color:#FF8000;
}
.expiredays{
	background-color:#F32136;
}
.deactivated{
	background-color:#CE6474;
}
.beforeseven{
	background-color:#00FF66;
}
</style>


<link rel="stylesheet" href="blink.css" type="text/css" />
<script type="text/javascript" src="jquery.blink.js" /></script>


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
        <table width="980" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
          <tr>
            <td width="85" height="43" align="center" bgcolor="#fff1ab" class="drive">Client Name</td>
            <td width="80" height="43" align="center" bgcolor="#fff1ab" class="drive">ClientId</td>
            <td width="62" height="43" align="center" bgcolor="#fff1ab" class="drive">Zone</td>
            <td width="61" align="center" bgcolor="#fff1ab" class="drive">Area</td>
            <td width="101" height="43" align="center" bgcolor="#fff1ab" class="drive">Subscription Date</td>
            <td width="93" height="43" align="center" bgcolor="#fff1ab" class="drive">Box No.</td>
            <td width="83" height="43" align="center" bgcolor="#fff1ab" class="drive">Contact No</td>
            <td width="186" align="center" bgcolor="#fff1ab" class="drive">Package</td>
            <td width="144" align="center" bgcolor="#fff1ab" class="drive">Addons</td>
            <td width="72" align="center" bgcolor="#fff1ab" class="drive">Status</td>
            <!--<td width="94" align="center" bgcolor="#fff1ab" class="drive">Delete</td>-->
          </tr>
          <tr>
            <td colspan="10" align="center"><?php
if(isset ($_REQUEST['mode']) && $_REQUEST['mode']=='search')
{
	$c_id= mysql_real_escape_string($_REQUEST['clientId']);
	
$sql5 = "SELECT * from `client_entry` where `c_id`='$c_id'";
$rs5 = mysql_query($sql5);


		  
while ($row= mysql_fetch_array($rs5))
{ 
	 
	$present_date= date("Y-m-d");
	$SPkg= mysql_query("SELECT * from `pkg_assign` where `c_id`='".$row['c_id']."'");
	$SpkgRws= mysql_num_rows($SPkg);
	$SAdd= mysql_query("SELECT * from `addons_payment` where `c_id`='".$row['c_id']."'");
	$SAddRws= mysql_num_rows($SAdd);
	$select_client = mysql_fetch_array($SPkg);
	$completion_date= $select_client['from_date'];
	$to_date= $select_client['to_date'];
	
	$diff_date = "SELECT DATEDIFF('$to_date','$present_date') AS DiffDate";
	$c_date = mysql_query($diff_date) or die (mysql_error());
	$row_date= mysql_fetch_array($c_date); 
	$count_day= $row_date['DiffDate'];
	if($count_day > 7){ $cla='beforeseven'; } 
	elseif($count_day <= 7 && $count_day > 1 ){ $cla='sevendays'; } 
	elseif($count_day<=1 && $count_day>=0){ $cla='myClass'; }
	elseif($count_day < 0){ $cla='expiredays';} 
	 
?></td>
            <!-- <td align="center">&nbsp;</td>-->
          </tr>
          <tr>
            <form name="drive" id="drive2" method="post" action="edit_client.php?id=<?php echo $row['id'];?>" enctype="multipart/form-data">
              <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['c_name']; ?></td>
              <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><a href="clients.php?cid=<?php echo $row['c_id']; ?>" class="myModal" data-width="520" data-height="500"> <?php echo $row['c_id']; ?></a></td>
              <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['zone']; ?></td>
              <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['area']; ?></td>
              <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['subscription_date']; ?></td>
              <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['box_no']; ?></td>
              <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['phone']; ?></td>
              <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt">
              <?php if($SpkgRws!=''){?>
              <a href="pkg_new_des.php?c_id=<?php echo $row['c_id'];?>" target="_blank"><img src="image/pkg.png" height="25" width="25" /></a>
              <?php }else{?>Package Not Assigned<?php }?>
              </td>
              <td align="center" bgcolor="#FEEDE7" class="drive_txt">
              <?php if($SpkgRws!=''){ if($SAddRws > 0){?>
              <a href="add_new_des.php?c_id=<?php echo $row['c_id'];?>" target="_blank"><img src="image/addon.png" height="25" width="25"/></a>
              <?php }else{ echo "No Assigned Addons";}}else{?>Package Not Assigned<?php }?>
              </td>
              <td align="center" bgcolor="#FEEDE7">
              <?php if($SpkgRws!=''){?>
              <div class="<?php if($select_client['activ_status']!='2'){ echo $cla;}if($select_client['activ_status']=='2'){?>deactivated<?php }?>" style="height:10px; width:60px;"></div>
              <?php }?>
              </td>
              <!--<td width="0" height="30" align="center" bgcolor="#FEEDE7" class="drive_txt ">&nbsp;</td>-->
            </form>
          </tr>
          <tr>
            <td colspan="10"><?php }} ?></td>
            <!--<td>&nbsp;</td>-->
          </tr>
        </table></td>
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
