<?php 


    require("connection.php"); 
     

    if(empty($_SESSION['user'])) 
    { 

        header("Location: index.php"); 

        die("Redirecting to index.php"); 
    } 
    
?> 
<?php 

if(isset($_REQUEST['action'])=='approve'){
	
	$upPay=mysql_query("update pkg_payment set approval='1' where track_code='".$_REQUEST['code']."'");
	$upPayPkg=mysql_query("update pkg_assign set activ_status='1' and renew_status='1' where track_code='".$_REQUEST['code']."'");
	
echo "<script> window.location= 'pay_status.php?approved'; </script>";
}
if(isset($_REQUEST['action'])=='decline'){
	
	$delPay=mysql_query("delete from pkg_payment where track_code='".$_REQUEST['code']."'");
	$delPayPkg=mysql_query("delete from pkg_assign where track_code='".$_REQUEST['code']."'");
	
echo "<script> window.location= 'pay_status.php'; </script>";
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


</head>

<body>
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
        <td height="30"><?php
if (isset($_REQUEST['success']))
{
echo "<span class='succ'>Package payed Successfully.</span>";
} 
if (isset($_REQUEST['approved']))
{
echo "<span class='succ'>Package approved Successfully.</span>";
} 



?></td>
      </tr>
      <tr>
        <td align="center"></td>
      </tr>
      <tr>
        <td align="center"><div style="overflow-y:scroll; height:300px; width:925px;">
          <table width="900" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
            <tr>
              <td width="88" height="40" align="center" bgcolor="#fff1ab" class="drive"> Package Name</td>
              <td width="88" align="center" bgcolor="#fff1ab" class="drive">Mode</td>
              <td width="110" height="40" align="center" bgcolor="#fff1ab" class="drive">Client</td>
              <td width="105" height="40" align="center" bgcolor="#fff1ab" class="drive">From Date</td>
              <td width="95" align="center" bgcolor="#fff1ab" class="drive">To Date</td>
              <td width="128" align="center" bgcolor="#fff1ab" class="drive">Deduction</td>
              <td width="137" align="center" bgcolor="#fff1ab" class="drive">Deduction Amount</td>
              <td width="64" align="center" bgcolor="#fff1ab" class="drive">Approval</td>
              <td width="73" align="center" bgcolor="#fff1ab" class="drive">Decline</td>
              </tr>
            <tr>
              <td colspan="2" align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              </tr>
            <?php
		  
$select_user = "SELECT * from `pkg_payment` where approval='0' order by id DESC";
$exe_selectuser = mysql_query($select_user) or die (mysql_error());
if(mysql_num_rows($exe_selectuser) > 0){
while ($row= mysql_fetch_array($exe_selectuser))
{ 
    $id= $row['id']; 
	$Pkg= explode("**",$row['pkg_name']);
	
	 
?>
            <tr>
              <form name="drive" id="drive" method="post" action="" enctype="multipart/form-data">
                <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $Pkg[0]; ?></td>
                <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $Pkg[1]; ?></td>
                <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['c_id']; ?></td>
                <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['from_date']; ?></td>
                <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['to_date']; ?></td>
                <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['ded_chnl']; ?></td>
                <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['ded_amt']; ?></td>
                <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt">
                <a href="pay_status.php?code=<?php echo $row['track_code'];?>&action=approve"><img src="image/tick.png" /></a>                </td>
                <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt">
                <a href="pay_status.php?code=<?php echo $row['track_code'];?>&action=decline" onclick="return confirm('Want to remove the record?');"><img src="image/cros.png" /></a>                </td>
                </form>
            </tr>
            <tr>
              <td colspan="2">&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              </tr>
            <?php } }else{?>
             <tr>
              <td colspan="9" class="master" align="center" ><b style="color:#990000;">No Clients have any channel deduction.</b></td>
              </tr>
              <?php } ?>
          </table>
        </div></td>
      </tr>
      <tr>
        <td height="50">&nbsp;</td>
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
