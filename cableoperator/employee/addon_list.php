<?php 


    require("connection.php"); 
     

    if(empty($_SESSION['user'])) 
    { 

        header("Location: index.php"); 

        die("Redirecting to index.php"); 
    } 
    
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cable-Operator</title>
<link href="css/template.css" rel="stylesheet" type="text/css" />
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

<body>
<table width="675" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
            <tr>
              <td width="129" height="40" align="center" bgcolor="#fff1ab" class="drive">Addons Channel</td>
              <td width="108" height="40" align="center" bgcolor="#fff1ab" class="drive">Active From</td>
              <td width="115" align="center" bgcolor="#fff1ab" class="drive">Active To</td>
              <td width="131" align="center" bgcolor="#fff1ab" class="drive">Duration(Days)</td>
              <td width="80" align="center" bgcolor="#fff1ab" class="drive">Cost/Day</td>
              <td width="105" align="center" bgcolor="#fff1ab" class="drive">Total Amount</td>
              </tr>
            <tr>
              <td colspan="6" align="center"><?php
		  $track_code=$_REQUEST['track_code'];
	$sql = "SELECT * FROM addons_payment where `track_code`='$track_code' order by id desc";
	$result = mysql_query($sql);
while ($row= mysql_fetch_array($result))
{ 
    //$id= $row['id']; 
	$client=mysql_fetch_array(mysql_query("select c_name from `client_entry` where c_id='".$row['c_id']."'"));
	$addons=mysql_fetch_array(mysql_query("select channel_name from `addons_channels` where id='".$row['addons_id']."'"));
	
	 
?></td>
              </tr>
            <tr>
              <form name="drive" id="drive" method="post" action="" enctype="multipart/form-data">
                <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $addons['channel_name']; ?></td>
                <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['pay_date']; ?></td>
                <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['to_date']; ?></td>
                <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['duartion']."days"; ?></td>
                <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['amount']; ?></td>
                <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['total_amount']; ?></td>
                </form>
              </tr>
            <tr>
              <td colspan="6"><?php } ?></td>
              </tr>
            </table>
</body>
</html>
