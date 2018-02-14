<?php 


    require("connection.php"); 
     

    if(empty($_SESSION['user'])) 
    { 

        header("Location: index.php"); 

        die("Redirecting to index.php"); 
    } 
    
?> 
<?php
//$tablename= mysql_real_escape_string($_REQUEST['tablename']);	

if(isset ($_REQUEST['mode']) && $_REQUEST['mode']=='addons_submit')
{

$id=$_REQUEST['id'];
$tablename= mysql_real_escape_string($_REQUEST['tablename']);	

//$arr2=explode("_",$tablename);
//$destination= $arr2[0]; 
//$det= $arr2[1];


$tmp_name=$_FILES['item_image']['tmp_name'];
$rand= rand(1000, 9999);
$target = "../employee/clients/"; 
$target = $target .$rand. basename( $_FILES['item_image']['name']) ; 
move_uploaded_file($_FILES['item_image']['tmp_name'], $target); 
$item_image= basename($rand.$_FILES['item_image']['name']);

/////////////////////////////////////////////////////
	  	  	
			$query_update= "UPDATE `$tablename` SET 
            `image`='$item_image'
			 WHERE `id`='$id'";
            $qu_up= mysql_query($query_update) or die(mysql_error());
echo "<script> window.location= 'edit_client.php?id=$id&imgupdate'; </script>";
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cable-Operator</title>
<link href="css/template.css" rel="stylesheet" type="text/css" />
<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
<link rel='stylesheet' type='text/css' href='styles.css' />
<link rel='stylesheet' type='text/css' href='css/admin.css' />
<script type='text/javascript' src='menu_jquery.js'></script>


<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #FFFFFF;
}


</style>
<!--//////////////image priview///////////////////-->
<script type="text/javascript">
function readURL(input) {
if (input.files && input.files[0]) {
var reader = new FileReader();
reader.onload = function (e) {
$('#test').attr('src', e.target.result);
}
reader.readAsDataURL(input.files[0]);
}
}
</script>
<!--/////////////////////////////////-->

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
        <td height="30" align="center"><?php
if (isset($_REQUEST['success']))
{
echo "<span class='succ'>Package payed Successfully.</span>";
} ?></td>
      </tr>
      <tr>
        <td align="center"></td>
      </tr>
      <tr>
        <td align="center">
          <table width="600" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
            <tr>
              
              <td height="40" colspan="3" align="center" bgcolor="#fff1ab" class="drive"><span class="edit">Client Image Update</span></td>
              </tr>
              <tr>
                  <td colspan="3" align="right" style="padding-right:15px;">&nbsp;</td>
                </tr>
              <form name="payslip" id="payslip" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $_REQUEST['id'];?>" enctype="multipart/form-data">
<?php
							$id=$_REQUEST['id'];
							$tablename=$_REQUEST['tablename'];
							
                            $query="SELECT * FROM `$tablename` where `id`='$id'";
							$result=mysql_query($query) or die(mysql_error());
							$row = mysql_fetch_array($result);
							
							?>
                <input type="hidden" name="mode" value="addons_submit" />
                  <tr>
                  <td width="181" align="center" class="drive_txt">Client Image</td>
                  <td width="222" align="center">
                  <!--<input type="file" name="item_image" id="item_image" style="width:250px; height:20px;" onchange="readURL(this);" /><input type="hidden" name="tablename" value="<?php //echo $tablename; ?>" />-->
                  <input type="file" name="item_image" id="item_image" style="width:250px; height:20px;" /><input type="hidden" name="tablename" value="<?php echo $tablename; ?>" />                  </td>
                  <td width="191" align="center"><!--<span class="edit"><img src="" alt="" width='150' height='200' id="test"/></span>-->
                    <span style="padding-right:15px;">
                    <input type="image" src="image/submit.jpg" border="0" value="submit" name="submit" id="submit" /></span></td>
                </tr>
               
                <tr>
                  <td colspan="3" align="right" style="padding-right:15px;">&nbsp;</td>
                </tr>
              </form>
          </table>
        </td>
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
