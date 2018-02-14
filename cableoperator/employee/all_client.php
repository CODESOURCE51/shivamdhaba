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
    <td align="center" valign="top"><table width="1024" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #CCC;">
      <tr>
        <td><?php include_once("menu.php"); ?></td>
      </tr>
      <tr>
        <td height="10">&nbsp;</td>
      </tr>
      
      <tr>
      <td height="30">
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
        <td align="center">
            </td>
      </tr>
      <tr>
        <td height="50" align="center"><?php 
if (isset($_REQUEST['insert'])){ echo "<span class='succ'>Record Inserted Successfully.</span>"; }
if (isset($_REQUEST['update'])) { echo "<span class='succ'>Record Updated Successfully.</span>"; }
if (isset($_REQUEST['delete'])) { echo "<span class='succ'>Record Deleted Successfully.</span>"; }
   ?>  </td>
      </tr>
      <tr>
        <td height="50" align="center">
         
        <table width="1000" border="0" cellspacing="0" cellpadding="0">
        
          <tr>
            <td align="center">
            <?php
		  if (isset($_POST['clientId']))
           {
			   $clientId=$_REQUEST['clientId'];
			   if($clientId!=''){
		  ?>
          <table width="980" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
          <tr align="center">
            <td width="118" height="43" bgcolor="#fff1ab" class="drive">Client Name</td>
            <td width="122" height="43" bgcolor="#fff1ab" class="drive">ClientId</td>
            <td width="106" height="43" bgcolor="#fff1ab" class="drive">Zone</td>
            <td width="100" bgcolor="#fff1ab" class="drive">Area</td>
            <td width="117" height="43" bgcolor="#fff1ab" class="drive">Subscription Dt.</td>
            <td width="118" bgcolor="#fff1ab" class="drive">Box No.</td>
            <td width="119" height="43" bgcolor="#fff1ab" class="drive">Address</td>
            <td width="108" height="43" bgcolor="#fff1ab" class="drive">Contact No</td>
            <td colspan="2" bgcolor="#fff1ab" class="drive">Action</td>
            <!--<td width="94" align="center" bgcolor="#fff1ab" class="drive">Delete</td>-->
            </tr>
          <tr>
            <td colspan="10" align="center">
             </td>
            </tr>
          <?php $QueryClient= mysql_query("select * from client_entry where c_id = '".$clientId."'"); 
		  		while($ClientSearch = mysql_fetch_array($QueryClient)){
		  ?>
          <tr>
      <form name="drive" id="drive" method="post" action="edit_client.php?id=<?php echo $ClientSearch['id'];?>" enctype="multipart/form-data">    
 <td height="30" align="left" bgcolor="#FEEDE7" class="drive_txt"><?php echo $ClientSearch['c_name']; ?></td>
 <td height="30" align="left" bgcolor="#FEEDE7" class="drive_txt"><?php echo $ClientSearch['c_id']; ?></td>
 <td height="30" align="left" bgcolor="#FEEDE7" class="drive_txt"><?php echo $ClientSearch['zone']; ?></td>
 <td height="30" align="left" bgcolor="#FEEDE7" class="drive_txt"><?php echo $ClientSearch['area']; ?></td>
 <td height="30" align="left" bgcolor="#FEEDE7" class="drive_txt"><?php echo $ClientSearch['subscription_date']; ?></td>
 <td height="30" align="left" bgcolor="#FEEDE7" class="drive_txt"><?php echo $ClientSearch['box_no']; ?></td>
 <td height="30" align="left" bgcolor="#FEEDE7" class="drive_txt"><?php echo $ClientSearch['address']; ?></td>
 <td height="30" align="left" bgcolor="#FEEDE7" class="drive_txt"><?php echo $ClientSearch['phone']; ?></td>
 <td width="30" height="30" align="center" bgcolor="#FEEDE7" class="drive_txt">
 <input type="image" src="image/edit.png" height="18" width="18" border="0" name="submit2" id="submit2" value="submit" />
 </td>
 <td width="29" height="30" align="center" bgcolor="#FEEDE7" class="drive_txt">
 <a href="delete_client.php?id=<?php echo $ClientSearch['id'];?>"><img src="image/cros.png" height="14" width="17" border="0" /></a>
 </td>
 <!--<td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><a href="delete_client.php?id=<?php // echo $ClientSearch['id'];?>"><img src="image/delete.png" height="25" width="70" border="0" /></a></td>-->
      </form>
          </tr>
          <?php }?>
          <tr>
            <td colspan="10"></td>
            <!--<td>&nbsp;</td>-->
            </tr>
 
        </table>
         <?php }else{ echo "Sorry! No clients found";} ?> 
          <?php }else{ ?>
            <table width="980" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
          <tr align="center">
            <td width="120" height="43" bgcolor="#fff1ab" class="drive">Client Name</td>
            <td width="122" height="43" bgcolor="#fff1ab" class="drive">ClientId</td>
            <td width="106" height="43" bgcolor="#fff1ab" class="drive">Zone</td>
            <td width="102" bgcolor="#fff1ab" class="drive">Area</td>
            <td width="116" height="43" bgcolor="#fff1ab" class="drive">Subscription Dt.</td>
            <td width="116" bgcolor="#fff1ab" class="drive">Box No.</td>
            <td width="119" height="43" bgcolor="#fff1ab" class="drive">Address</td>
            <td width="108" height="43" bgcolor="#fff1ab" class="drive">Contact No</td>
            <td colspan="2" bgcolor="#fff1ab" class="drive">Action</td>
            <!--<td width="94" align="center" bgcolor="#fff1ab" class="drive">Delete</td>-->
            </tr>
          <tr>
            <td colspan="10" align="center">
            <?php
			$tbl_name="client_entry";
			$adjacents = 3;
			
			$query = "SELECT COUNT(*) as num FROM $tbl_name";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages['num'];
	
	/* Setup vars for query. */
	$targetpage = "all_client.php"; 	//your file name  (the name of this file)
	$limit = 3; 								//how many items to show per page
	$page = $_GET["page"];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	$sql = "SELECT * FROM $tbl_name order by id desc LIMIT $start, $limit";
	$result = mysql_query($sql);
			
if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage?page=$prev\">previous</a>";
		else
			$pagination.= "<span class=\"disabled\">previous</span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage?page=$next\">next</a>";
		else
			$pagination.= "<span class=\"disabled\">next</span>";
		$pagination.= "</div>\n";		
	}

?>
            </td>
            <!-- <td align="center">&nbsp;</td>-->
            </tr>
          <?php
		  
while ($row= mysql_fetch_array($result))
{ 
	 
?>
          <tr>
      <form name="drive" id="drive" method="post" action="edit_client.php?id=<?php echo $row['id'];?>" enctype="multipart/form-data">    
 <td height="30" align="left" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['c_name']; ?></td>
 <td height="30" align="left" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['c_id']; ?></td>
 <td height="30" align="left" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['zone']; ?></td>
 <td height="30" align="left" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['area']; ?></td>
 <td height="30" align="left" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['subscription_date']; ?></td>
 <td height="30" align="left" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['box_no']; ?></td>
 <td height="30" align="left" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['address']; ?></td>
 <td height="30" align="left" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['phone']; ?></td>
 <td width="31" height="30" align="center" bgcolor="#FEEDE7" class="drive_txt">
 <input type="image" src="image/edit.png" height="18" width="18" border="0" name="submit2" id="submit2" value="submit" />
 </td>
 <td width="27" height="30" align="center" bgcolor="#FEEDE7" class="drive_txt">
 <a href="delete_client.php?id=<?php echo $row['id'];?>"><img src="image/cros.png" height="14" width="17" border="0" /></a>
 </td>
 <!--<td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><a href="delete_client.php?id=<?php echo $row['id'];?>"><img src="image/delete.png" height="25" width="70" border="0" /></a></td>-->
      </form>
          </tr>
          <tr>
            <td colspan="10"><?php } ?><span style="float:right"><?=$pagination?></span></td>
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
