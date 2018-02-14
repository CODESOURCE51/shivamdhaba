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
if (isset($_REQUEST['submit']))
{
$customer_name= mysql_real_escape_string($_REQUEST['customer_name']);
$location= mysql_real_escape_string($_REQUEST['location']);
$address= mysql_real_escape_string($_REQUEST['address']);
$contact_person= mysql_real_escape_string($_REQUEST['contact_person']);
$contact= mysql_real_escape_string($_REQUEST['contact']);
$assigned= mysql_real_escape_string($_REQUEST['assigned']);
$cust_code= mysql_real_escape_string($_REQUEST['cust_code']);
$id= mysql_real_escape_string($_REQUEST['id']);
$cat_job_type = implode(',', $_POST['job_type']);

$query_update= "UPDATE `customer_details` SET 
			`customer_name`='$customer_name',
			`cust_code`='$cust_code',
			`address`='$address',
			`job_type`='$cat_job_type',
			`location`='$location',
			`contact_person`='$contact_person',
			`contact`='$contact',
			`assigned`='$assigned'
			 WHERE `id`='$id'";
            $qu_up= mysql_query($query_update) or die(mysql_error());

echo "<script> window.location= 'edit_cust.php?edit&id=$id'; </script>";

}
?>
 
<!----------------------validation----------------------------->

 <script src="assets/jquery.min.js"></script>   
  <script type="text/javascript" src="js/validate.js"></script>  
<script type="text/javascript">
$(document).ready(function(){ 
    

	$("#mkt").validate({
		rules: {
			customer_name: {
				required: true
			},
			job_type: {
				required: true
			},
			address: {
				required: true
			},
			contact_person: {
				required: true
			},
			contact: {
				required: true
			},
			assigned: {
				required: true
			},
			
			
		 
		}, //end rules
		messages: {
			
			customer_name: {
				required: "<br /> Please Entry Customer name."
			
			},
			job_type: {
				required: "<br /> Please Entry Job type."
			
			},
			address: {
				required: "<br /> Please Enter Address."
			
			},
			contact_person: {
				required: "<br /> Please Enter Contact person."
			
			},
			contact: {
				required: "<br /> Please Enter Contact no."
			
			},
			assigned: {
				required: "<br /> Please Enter Name."
			
			},
			
			
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ORLIV</title>
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
        <form action="" method="post" name="mkt" id="mkt" enctype="multipart/form-data"><table width="650" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="40" colspan="3" align="center" valign="middle"><p style="background-color:#fff1ab; padding:5px; text-align:center; font-family:Verdana, Geneva, sans-serif; font-size:22px; border:1px solid #EFDC86; border-radius:25px;">Customer Entry</p></td>
        </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="form_txtr">&nbsp;</td>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle" class="error">
<?php 
                            $id=$_REQUEST['id'];
                            $query="SELECT * FROM `customer_details` where `id`='$id'";
							$result=mysql_query($query) or die(mysql_error());
							$row = mysql_fetch_array($result);
							$customer_name= $row['customer_name'];
							$cust_code= $row['cust_code'];
							$address= $row['address'];
							$location= $row['location'];
							$contact_person= $row['contact_person'];
							$contact= $row['contact'];
							$assigned= $row['assigned'];
							$job_type= $row['job_type'];
							$id=$row['id'];
?>
<?php
if (isset($_REQUEST['success']))
{
echo "<span class='succ'>Inserted successfully.</span>";
}
if (isset($_REQUEST['insert']))
{
echo "<span class='succ'>Inserted successfully.</span>";
}

if (isset($_REQUEST['edit']))
{
echo "<span class='succ'>Data updated successfully.</span>";
}

if (isset($_REQUEST['delete']))
{
echo "<span class='errors'>One record deleted successfully.</span>";
}
if (isset($_REQUEST['error']))
{
echo "<span class='errors'>Invalid Image File.</span>";
}
?></td>
      </tr>
      <tr>
        <td width="137" height="35" align="left" valign="middle" class="master">Customer Name</td>
        <td width="21" height="35" align="left" valign="middle">:</td>
        <td width="292" height="35" align="left" valign="middle" class="error"><input type="text" name="customer_name" id="" class="rounded" value="<?php echo $customer_name; ?>" /></td>
        </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Customer Code</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle" class="error"><input type="text" name="cust_code" class="rounded" value="<?php echo $cust_code; ?>" readonly/></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Job type</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle">
         <select name="job_type[]" id="ms" multiple="multiple" class="rounded"  style="height:30px; width:200px;">
               <?php
$sql4 = "SELECT * from `job_type` group by job";
$rs4 = mysql_query($sql4);
while($row4 = mysql_fetch_array($rs4))
{
?>
            <option value="<?php echo $row4['job']; ?>"><?php echo $row4['job']; ?></option>
            <?php } ?>
              </select>
             
<script src="js/jquery.multiple.select.js"></script>
<script>
    $(function() {
        $('#ms').multipleSelect();
    });
</script>
        </td>
        </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Location</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="location" class="rounded" value="<?php echo $location; ?>" ></td>
      </tr>
      <tr>
        <td height="60" align="left" valign="middle" class="master">Address</td>
        <td height="60" align="left" valign="middle">:</td>
        <td height="60" align="left" valign="middle"><textarea name="address" class="rounded1" id="address" ><?php echo $address; ?></textarea></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Contact Person</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="contact_person" class="rounded" value="<?php echo $contact_person; ?>"/></td>
      </tr>
      
      <tr>
        <td height="35" align="left" valign="middle" class="master">Contact No.</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="contact" class="rounded" value="<?php echo $contact; ?>"/></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Person Assigned</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><select name="assigned" class="rounded" style="height:30px; width:200px;">
         <option value="<?php echo $assigned; ?>"><?php echo $assigned; ?></option>
               <?php
$sql4 = "SELECT * from `marketing_details` group by mkt_name";
$rs4 = mysql_query($sql4);
while($row4 = mysql_fetch_array($rs4))
{
?>
            <option value="<?php echo $row4['mkt_code']; ?>"><?php echo $row4['mkt_name']; ?></option>
            <?php } ?>
        </select></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle"><input type="hidden" name="id" value="<?php echo $id; ?>" /></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle"><input type="image" src="image/submit.jpg" border="0" name="submit" id="submit" value="submit" /></td>
        </tr>
      </table>
</form>
       </td>
      </tr>
      <tr>
        <td height="50" align="center">
          
          </td>
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
