<?php 


    require("connection.php"); 
     

    if(empty($_SESSION['user'])) 
    { 

        header("Location: index.php"); 

        die("Redirecting to index.php"); 
    } 
	
    $user=$_SESSION['user']['username'];
	
	$FetchClient= mysql_fetch_array(mysql_query("select * from `client_entry` where c_id='".$_REQUEST['cid']."'"));
	$image= $FetchClient['image'];
	$FetchPackage= mysql_fetch_array(mysql_query("select * from `pkg_assign` where c_id='".$_REQUEST['cid']."'"));
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cable-Operator</title>
<link href="css/template.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/multiple-select.css" />

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

          
          <table width="500" border="0" cellspacing="0" cellpadding="0" align="center">
            <tr>
              <td height="40" colspan="3" align="center" valign="middle"><p style="background-color:#fff1ab; padding:2px; text-align:center; font-family:Verdana, Geneva, sans-serif; font-size:18px; border:1px solid #EFDC86; border-radius:22px;">Client Details</p></td>
              </tr>
            <tr>
              <td width="163" height="35" align="left" valign="middle" class="form_txtr">&nbsp;</td>
              <td height="35" align="left" valign="middle">&nbsp;</td>
              <td height="35" align="left" valign="middle" class="error">
  </td>
              </tr>
            <tr>
              <td rowspan="3" align="left" valign="middle" class="master">
                <div style="float:left; width:125px; height:125px; border: 1px solid #EFEFD1;">
                  <?php if($image!=''){ ?><img src="../employee/clients/<?php echo $image; ?>" width="125" height="125"/> 
		<?php }else{ ?><img src="../employee/clients/default.png" width="125" height="125"/> <?php } ?>
                  </div>
                </td>
              <td width="4" height="30" align="left" valign="middle">&nbsp;</td>
              <td width="333" height="30" align="left" valign="middle"><span class="master"><b>Client Id</b>:&nbsp;<?php echo $FetchClient['c_id'] ; ?></span></td>
              </tr>
            <tr>
              <td height="30" align="left" valign="middle">&nbsp;</td>
              <td height="30" align="left" valign="middle"><span class="master"><b>Location</b>:&nbsp;<?php echo $FetchClient['zone']."-".$FetchClient['area']; ?></span></td>
              </tr>
            <tr>
              <td height="30" align="left" valign="middle">&nbsp;</td>
              <td height="30" align="left" valign="middle"><span class="master"><b>Subscription Date</b>:&nbsp;<?php echo $FetchClient['subscription_date']; ?></span></td>
              </tr>
            <tr>
              <td colspan="3" height="30" align="left" valign="middle" class="master">&nbsp;</td>
              
              </tr>
            <tr>
              <td height="30" align="left" valign="middle" class="master"><b>Client Name</b></td>
              <td height="30" align="left" valign="middle">:</td>
              <td height="30" align="left" valign="middle" class="master"><?php echo $FetchClient['c_name']; ?></td>
              </tr>
            <tr>
              <td height="30" align="left" valign="middle" class="master"><b>Email</b></td>
              <td height="30" align="left" valign="middle">:</td>
              <td height="30" align="left" valign="middle" class="master"><?php echo $FetchClient['email']; ?></td>
              </tr>
            <tr>
              <td height="30" align="left" valign="middle" class="master"><b>Contact No.</b></td>
              <td height="30" align="left" valign="middle">:</td>
              <td height="30" align="left" valign="middle" class="master"><?php echo $FetchClient['phone']; ?></td>
              </tr>
            <tr>
              <td height="30" align="left" valign="middle" class="master"><b>Date of Birth</b></td>
              <td height="30" align="left" valign="middle">:</td>
              <td height="30" align="left" valign="middle" class="master"><?php echo $FetchClient['dob']; ?></td>
              </tr>
            
            <tr>
              <td height="30" align="left" valign="middle" class="master"><b>Address</b></td>
              <td height="30" align="left" valign="middle">:</td>
              <td height="30" align="left" valign="middle" class="master"><?php echo $FetchClient['address']; ?></td>
              </tr>
            <tr>
              <td height="35" colspan="3" align="center" valign="middle" >&nbsp;</td>
              </tr>
            </table>
 
</body>
</html>
