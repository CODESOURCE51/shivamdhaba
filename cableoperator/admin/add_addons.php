<?php 


    require("connection.php"); 
     

    if(empty($_SESSION['user'])) 
    { 

        header("Location: index.php"); 

        die("Redirecting to index.php"); 
    } 
    
?> 
<?php 
$cid=mysql_fetch_array(mysql_query("select c_id from `pkg_assign` where track_code='".$_REQUEST['code']."'"));

if(isset ($_REQUEST['mode']) && $_REQUEST['mode']=='addons_submit')
{
$chk_val=$_REQUEST['addons'];
$amnt=$_REQUEST['amount'];
$dys=$_REQUEST['days'];
$tcode=$_REQUEST['code'];
$cl_id=$_REQUEST['cid'];
for($i=0,$j=0,$k=0; $i < count($chk_val),$j < count($amnt),$k < count($dys);$i++,$j++,$k++ ){
	
	
	$date1 = date("Y-m-d");// current date
if($dys[$k]> 0){
	
	$total=$amnt[$j] * $dys[$k];
	$total_dys=$dys[$k]*30;
	$date = strtotime(date("Y-m-d", strtotime($date1)) . " +$total_dys day");
	$todate= date('Y-m-d', $date);
	
	

	$ADonsPay=mysql_query("INSERT INTO `addons_payment` SET
							`addons_id`='".$chk_val[$i]."',
							`amount`='".$amnt[$j]."',
							`duartion`='".$total_dys."',
							`total_amount`='".round($total)."',
							`pay_date`='".date('Y-m-d')."',
							`to_date`='".$todate."',
							`track_code`='".$tcode."',
							`c_id`='".$cl_id."'");
}					
						
}
//exit();	
echo "<script> window.location= 'view_assign_package.php?added'; </script>";

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
<script type="text/javascript">
function subtot() {
var amount = 0;
var days = 0;

var obj = document.getElementsByTagName("input");
      for(var i=0; i<obj.length; i++){
		   if(obj[i].name == "amount"){var amount = obj[i].value;}
		   if(obj[i].name == "days"){var ded_amt = obj[i].value;}
		   
         if(obj[i].name == "total"){
          		if(amount >= 0 && days>=0)
				{
					obj[i].value = amount*days;
					total+=(obj[i].value*1);
					}
          				else
						{
							obj[i].value = 0;total+=(obj[i].value*1);
							}
          		}
         	 }
        document.getElementById("total").value = total*1;
        total=0;
}
</script>


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
if (isset($_REQUEST['fail']))
{
echo "<span class='succ'>Total month cant be blank.Please Filled atleast one.</span>";
} ?></td>
      </tr>
      <tr>
        <td align="center"></td>
      </tr>
      <tr>
        <td align="center">
          <table width="458" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
            <tr>
              
              <td width="144" height="40" align="center" bgcolor="#fff1ab" class="drive">AddOns Channel</td>
              <td width="109" height="40" align="center" bgcolor="#fff1ab" class="drive">Price</td>
              <td width="119" align="center" bgcolor="#fff1ab" class="drive">Total Month</td>
              </tr>
            <tr>
             
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              </tr>
              <form name="drive" id="drive" method="post" action="" enctype="multipart/form-data">
              <input type="hidden" name="mode" value="addons_submit" />
            <?php
		  
$select_user = "SELECT * from `addons_channels`";
$exe_selectuser = mysql_query($select_user) or die (mysql_error());

while ($row= mysql_fetch_array($exe_selectuser))
{ 
    $id= $row['id']; 
	
	
	 
?>
            <tr>
              
               
                <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['channel_name']; ?><input type="hidden" name="addons[]" id="addons" value="<?php echo $id;?>" /></td>
                <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><input type="text" name="amount[]" id="amount" value="<?php echo $row['total_amt']; ?>" style="width:35px; background-color:#FEEDE7; border:#FEEDE7;" border="0" /></td>
                <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><input type="text" name="days[]" id="days" value="" style="width:25px;"/></td>
                
            </tr>
            <tr>
              
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              </tr>
            <?php } ?>
             <tr>
              <td colspan="3" align="center"> 
              <input type="hidden" name="cid" value="<?php echo $cid['c_id'];?>"  />
              <input type="image" src="image/submit.jpg" name="submit" value="submit"  />
              </td>
              
              
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
