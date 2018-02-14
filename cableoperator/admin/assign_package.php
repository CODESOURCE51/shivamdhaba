<?php 
require("connection.php"); 
if(empty($_SESSION['user'])) 
{ 

header("Location: index.php"); 
die("Redirecting to index.php");
 
} 

if(isset($_REQUEST['code'])){
	//echo $_REQUEST['code'];
	$pkgRCli=mysql_fetch_array(mysql_query("select c_id from pkg_assign where track_code = '".$_REQUEST['code']."'"));
	$cid=$pkgRCli['c_id'];
	$Clinm= mysql_fetch_array(mysql_query("select c_name, box_no from client_entry where c_id = '".$pkgRCli['c_id']."'"));
	//echo $Clinm['box_no'];
}
if(isset($_REQUEST['cid'])){
	//echo $_REQUEST['code'];
	//$pkgRCli=mysql_fetch_array(mysql_query("select c_id from pkg_assign where track_code = '".$_REQUEST['code']."'"));
	$cid=$_REQUEST['cid'];
	$Clinm= mysql_fetch_array(mysql_query("select c_name, box_no from client_entry where c_id = '".$_REQUEST['cid']."'"));
	//echo $Clinm['box_no'];
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
      
$query_2= "INSERT INTO `pkg_assign`(`c_id`,`box_no`,`pkg_name`,`from_date`,`to_date`,`track_code`,`pkg_duration`,`status`) 
VALUES ('$clientId','".$_REQUEST['box_no']."','$pkg_nm','$form_date','$to_date','$track_code','".$Pkgm."','1')";
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
xmlhttp.open("POST","ajax_pkgMode.php?id="+id,true);
xmlhttp.send();
}
</script>

<script>
function getboxno(id)
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
    document.getElementById("box").innerHTML=xmlhttp.responseText;
    }
  }
 // var name=document.getElementById("c_name").value;
  //var contact=document.getElementById("c_num").value;
 // var type=document.getElementById("client_type").value;
 
xmlhttp.open("POST","ajax_box.php?id="+id,true);
xmlhttp.send();
}
</script>  

<!-----------------------------Two drops-------------------->

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
           <input type="hidden" name="mode" value="assgn_pkg" />
            <table width="500" border="0" cellspacing="1" cellpadding="0">
              <tr class="drive">
                <td colspan="3" align="center"><p style="background-color:#fff1ab; padding:5px; text-align:center; font-family:Verdana, Geneva, sans-serif; font-size:20px; border:1px solid #EFDC86; border-radius:25px; font-weight:lighter;">Assign Package</p></td>
                </tr>
              <tr>
                <td height="18" colspan="3" align="center"><?php
if (isset($_REQUEST['success']))
{
echo "<span class='succ'>Package Assigned Successfully.</span>";
} ?></td>
                </tr>
              <tr>
                <td width="223" height="50" align="left" bgcolor="#FFFFFF" class="drive_txt" style="padding-left:15px;">Client Id</td>
                <td width="45" height="50" align="center" bgcolor="#FFFFFF" class="drive_txt">:</td>
                <td width="226" height="50" align="left" bgcolor="#FFFFFF" class="drive_txt" valign="middle"> 
                <?php if(isset($_REQUEST['code']) || isset($_REQUEST['cid'])){?>
                 <input type="text" name="clientId" class="rounded" value="<?php echo $cid; ?>" readonly="readonly" />
                <?php }else{?>
                <input type="text" name="clientId" id="clientId" class="rounded" onselect="getclient(this.value)" onfocus="getboxno(this.value)" required="required" />
                <?php }?>
                </td>
                </tr>
                <tr>
                <td colspan="3" id="client"></td>
              </tr>
              <tr>
                <td height="50" align="left" bgcolor="#FFFFFF" class="drive_txt" style="padding-left:15px;">SetTopBox No.</td>
                <td align="center" bgcolor="#FFFFFF" class="drive_txt">:</td>
                <td height="50" align="left" bgcolor="#FFFFFF" id="box">
                <?php if(isset($_REQUEST['code']) || isset($_REQUEST['cid'])){?>
                <input type="text" name="box_no" id="box_no" class="rounded" style="width:190px; height:20px;" readonly="readonly" value="<?php echo $Clinm['box_no']; ?>" />
                <?php }?>
                </td>
              </tr>
              <tr>
              <tr>
                <td height="50" align="left" bgcolor="#FFFFFF" class="drive_txt" style="padding-left:15px;">Package</td>
                <td height="50" align="center" bgcolor="#FFFFFF" class="drive_txt">:</td>
                <td height="50" align="left" bgcolor="#FFFFFF" class="drive_txt" valign="middle">
                
               <select name="pkg" id="pkg" class="rounded" onChange="getarea(this.value)" required="required">
                <option value="">Select Package</option>
                  <?php
                 $sql = "SELECT DISTINCT pkg from `package`";
                 $rs = mysql_query($sql);
                 while($row = mysql_fetch_array($rs))
                  {
                  ?>
                <option value="<?php echo $row['pkg']; ?>"><?php echo $row['pkg']; ?></option>
                <?php } ?> 
                </select>
                </td>
              </tr>
              <tr>
                <td height="50" align="left" bgcolor="#FFFFFF" class="drive_txt" style="padding-left:15px;">Package Mode</td>
                <td height="50" align="center" bgcolor="#FFFFFF" class="drive_txt">:</td>
                <td height="50" align="left" bgcolor="#FFFFFF" class="drive_txt" valign="middle" id="area">
                
                </td>
              </tr>
              
              <tr>
                <td height="50" align="left" bgcolor="#FFFFFF" class="drive_txt" style="padding-left:15px;">Form Date</td>
                <td align="center" bgcolor="#FFFFFF" class="drive_txt">:</td>
                <td height="50" align="left" bgcolor="#FFFFFF"><input type="text" name="form_date" id="calendar2" class="rounded" style="width:190px; height:20px;" required="required" />&nbsp;</td>
              </tr>
              <tr>
                <td height="50" align="left" bgcolor="#FFFFFF" class="drive_txt" style="padding-left:15px;">To Date</td>
                <td align="center" bgcolor="#FFFFFF" class="drive_txt">:</td>
                <td height="50" align="left" bgcolor="#FFFFFF" ><input type="text" name="to_date" id="calendar" class="rounded" style="width:190px; height:20px;" required="required" />&nbsp;</td>
              </tr>
              <tr>
                <td height="40" colspan="3" align="center" bgcolor="#FFFFFF" class="drive_txt"><input type="image" src="image/submit.jpg" name="submit" id="submit" value="submit" /> </td>
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
