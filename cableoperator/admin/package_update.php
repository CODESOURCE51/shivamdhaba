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
if(isset ($_REQUEST['mode']) && $_REQUEST['mode']=='pkg')
{
$pkg_nm= mysql_real_escape_string($_REQUEST['pkg_name']);
$pkg_m= mysql_real_escape_string($_REQUEST['pkg_m']);
$pkg_name=$pkg_nm."**".$pkg_m; 
$desc= mysql_real_escape_string($_REQUEST['desc']);
$grand_total= mysql_real_escape_string($_REQUEST['grand_total']);
$td_percent= mysql_real_escape_string($_REQUEST['td_percent']);
$td= mysql_real_escape_string($_REQUEST['td']);
$misc_charges= mysql_real_escape_string($_REQUEST['misc_charges']);
$price= mysql_real_escape_string($_REQUEST['price']);
$id= mysql_real_escape_string($_REQUEST['id']);

$query_update= "UPDATE `package` SET 
			`pkg_name`='$pkg_name',
			`desc`='$desc',
			`all_ch`='$grand_total',
			`service_tax`='$td_percent',
			`tax_amount`='$td',
			`service_chrg`='$misc_charges',
			`price`='$price'
			 WHERE `id`='$id'";
            $qu_up= mysql_query($query_update) or die(mysql_error());

echo "<script> window.location= 'packages.php?update'; </script>";

}
?>
 
<!----------------------validation----------------------------->

 <script type="text/javascript" src="js/jquery.js"></script>  
  <script type="text/javascript" src="js/validate.js"></script>  
<script type="text/javascript">
$(document).ready(function(){ 
    

	$("#mkt").validate({
			rules: {
			pkg_name: {
				required: true
			},
			desc: {
				required: true
			},
			price: {
				required: true
			}
			
		 
		}, //end rules
		messages: {
			
			pkg_name: {
				required: "<br /> Please Package Name."
			
			},
			desc: {
				required: "<br /> Please Enter Description."
			
			},
			price: {
				required: "<br /> Please Enter Price."
			
			}
			
		} //end messages
		
	}); //end validate
  });
</script>
<!----------------------validation----------------------------->
<!--//////////////popup///////////////////-->
<script language="javascript" type="text/javascript">
<!--
function popitup(url) {
	newwindow=window.open(url,'name','height=500,width=700');
	if (window.focus) {newwindow.focus()}
	return false;
}

// -->
</script>
<!--/////////////////////////////////-->
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
<!----------------------number----------------------------->
<!-----------------------------auto calculation-------------------->
<script type="text/javascript">
function gettdis() {
var grand_total=document.getElementById("grand_total").value;
var td_percent=document.getElementById("td_percent").value;
var total=(parseFloat(grand_total)* parseFloat(td_percent))/100;
document.getElementById("td").value=total;		
/*var grand_total = 0;
var td_percent = 0;
var obj = document.getElementsByTagName("input");
      for(var i=0; i<obj.length; i++){
		   if(obj[i].name == "grand_total"){var grand_total = obj[i].value;}
		   if(obj[i].name == "td_percent"){var td_percent = obj[i].value;}
         if(obj[i].name == "td"){
          		if(grand_total >= 0)
				{
					obj[i].value = (td_percent*grand_total)/100;
					total+=(obj[i].value*1);
					}
          				else
						{
							obj[i].value = 0;total+=(obj[i].value*1);
							}
          		}
         	 }
        document.getElementById("total").value = total*1;
        total=0;*/
}
</script>
<script type="text/javascript">
function subtot() {
var grand_total=document.getElementById("grand_total").value;	
var td=document.getElementById("td").value;
var misc_charges=document.getElementById("misc_charges").value;	
var total=parseFloat(grand_total)+ parseFloat(td)+ parseFloat(misc_charges);
document.getElementById("price").value=total;	
/*var grand_total = 0;
var td = 0;
var misc_charges = 0;
var obj = document.getElementsByTagName("input");
      for(var i=0; i<obj.length; i++){
		   if(obj[i].name == "grand_total"){var grand_total = obj[i].value;}
		   if(obj[i].name == "td"){var td = obj[i].value;}
		   if(obj[i].name == "misc_charges"){var misc_charges = obj[i].value;}
         if(obj[i].name == "price"){
          		if(grand_total >= 0 && td>=0 && misc_charges>=0)
				{
					obj[i].value = grand_total-(-td)-(-misc_charges);
					total+=(obj[i].value*1);
					}
          				else
						{
							obj[i].value = 0;total+=(obj[i].value*1);
							}
          		}
         	 }
        document.getElementById("total").value = total*1;
        total=0;*/
}
</script>

<!-----------------------------auto calculation-------------------->
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
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="center">
        <form action="" method="post" name="mkt" id="mkt" enctype="multipart/form-data"> 
     <input type="hidden"  name="mode" value="pkg">
    <table width="650" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="40" colspan="3" align="center" valign="middle"><p style="background-color:#fff1ab; padding:5px; text-align:center; font-family:Verdana, Geneva, sans-serif; font-size:22px; border:1px solid #EFDC86; border-radius:25px;">EDIT PACKAGE</p>

</td>
        </tr>
      <tr>
        <td height="18" align="left" valign="middle" class="form_txtr">&nbsp;</td>
        <td height="18" align="center" valign="middle">&nbsp;</td>
        <td height="18" align="left" valign="middle" class="error">
<?php 
                            $id=$_REQUEST['id'];
                            $query="SELECT * FROM `package` where `id`='$id'";
							$result=mysql_query($query) or die(mysql_error());
							$row = mysql_fetch_array($result);
							$pkg_name= explode("**", $row['pkg_name']);
							$desc= $row['desc'];
							$price=$row['price'];
	                        $all_ch= $row['all_ch']; 
	                        $service_tax= $row['service_tax']; 
	                        $tax_amount=$row['tax_amount'];
                            $service_chrg=$row['service_chrg'];
							
?>
</td>
      </tr>
      <tr>
        <td width="137" height="35" align="left" valign="middle" class="master">Package Name</td>
        <td width="21" height="35" align="left" valign="middle">:</td>
        <td width="292" height="35" align="left" valign="middle" class="error"><input type="text" name="pkg_name" id="pkg_name" class="rounded" value="<?php echo $pkg_name[0]; ?>" readonly /></td>
        </tr>
        <tr>
        <td width="137" height="35" align="left" valign="middle" class="master">Package Mode</td>
        <td width="21" height="35" align="left" valign="middle">:</td>
        <td width="292" height="35" align="left" valign="middle" class="error"><input type="text" name="pkg_m" id="pkg_m" class="rounded" value="<?php echo $pkg_name[1]; ?>" readonly /></td>
        </tr>
      <tr>
        <td height="65" align="left" valign="middle" class="master">Description</td>
        <td height="65" align="left" valign="middle">:</td>
        <td height="65" align="left" valign="middle"><textarea name="desc" class="rounded1" id="desc" ><?php echo $desc; ?></textarea></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Cost of All Channel</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" id="grand_total" name="grand_total" onKeyUp="return gettdis();" class="in_box" style="width:80px;" value="<?php echo $all_ch; ?>"/></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Service Tax
          <input type="text" name="td_percent" id="td_percent" value="<?php echo $service_tax; ?>" style="width:30px;" />
%</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="td" id="td" value="<?php echo $tax_amount; ?>" style="width:80px;" class="in_box" onKeyUp="gettdis()"/></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Service Charge</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="misc_charges" id="misc_charges" value="<?php echo $service_chrg; ?>" required class="in_box" style="width:80px;" onkeyup="return subtot();"/></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Price</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="price" id="price" style="width:80px;" class="in_box" value="<?php echo $price; ?>" onClick="return subtot()"/></td>
      </tr>
      <tr>
        <td height="20" align="left" valign="middle">&nbsp;</td>
        <td height="20" align="left" valign="middle">&nbsp;</td>
        <td height="20" align="left" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle"><input type="hidden" name="id" value="<?php echo $id ?>" /><input type="image" src="image/submit.jpg" border="0" name="submit" id="submit" value="submit" /></td>
        </tr>
      </table>
</form>
         
       </td>
      </tr>
      <tr>
        <td height="50" align="center">&nbsp;</td>
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
