<?php 


    require("connection.php"); 
     

    if(empty($_SESSION['user'])) 
    { 

        header("Location: index.php"); 

        die("Redirecting to index.php"); 
    } 
    
?> 
<?php
if (isset($_REQUEST['submit']))
{
$channel_name= mysql_real_escape_string($_REQUEST['channel_name']);
$desc= mysql_real_escape_string($_REQUEST['desc']);
$price= mysql_real_escape_string($_REQUEST['price']);

$sql="SELECT * FROM `service_tax` WHERE `id`=1";
$result=mysql_query($sql) or die (mysql_error());
$row= mysql_fetch_array($result);
$serv_tax=$row['tax'];
$count=mysql_num_rows($result);

if($count>0)
{
	$tax_amt=($serv_tax*$price)/100;
	$total_amt=$tax_amt+$price;
  
 $query_update="INSERT INTO `addons_channels` (`channel_name`,`desc`,`price`,`serv_tax`,`tax_amt`,`total_amt`) VALUES ('$channel_name','$desc','$price','$serv_tax','$tax_amt','".round($total_amt)."')";
            $qu_up= mysql_query($query_update) or die(mysql_error());

echo "<script> window.location= 'add_ons.php?success'; </script>";

}
else
{	 
	echo "<script> window.location= 'add_ons.php?error'; </script>"; 
	}

}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cable-Operator</title>
<link rel="stylesheet" href="css/page_style.css" type="text/css" />
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
<!----------------------validation----------------------------->

 <script type="text/javascript" src="js/jquery.js"></script>  
  <script type="text/javascript" src="js/validate.js"></script>  
<script type="text/javascript">
$(document).ready(function(){ 
    

	$("#mkt").validate({
		rules: {
			channel_name: {
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
			
			channel_name: {
				required: "<br /> Please Channel Name."
			
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
        <td height="30">&nbsp;</td>
      </tr>
      <tr>
        <td align="center"><form action="" method="post" name="mkt" id="mkt" enctype="multipart/form-data"> 
    
    <table width="500" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="40" colspan="3" align="center" valign="middle"><p style="background-color:#fff1ab; padding:5px; text-align:center; font-family:Verdana, Geneva, sans-serif; font-size:22px; border:1px solid #EFDC86; border-radius:25px;">ADD ONS</p>

</td>
        </tr>
      <tr>
        <td height="18" align="left" valign="middle" class="form_txtr">&nbsp;</td>
        <td height="18" align="center" valign="middle">&nbsp;</td>
        <td height="18" align="left" valign="middle" class="error"><?php
if (isset($_REQUEST['success']))
{
echo "<span class='succ'>Inserted successfully.</span>";
}
if (isset($_REQUEST['insert']))
{
echo "<span class='succ'>Inserted successfully.</span>";
}

if (isset($_REQUEST['update']))
{
echo "<span class='succ'>Data updated successfully.</span>";
}

if (isset($_REQUEST['delete']))
{
echo "<span class='errors'>One record deleted successfully.</span>";
}
if (isset($_REQUEST['error']))
{
echo "<span class='errors'>Please Add Service Tax First.</span>";
}
?>
</td>
      </tr>
      <tr>
        <td width="137" height="35" align="left" valign="middle" class="master">Channel Name</td>
        <td width="21" height="35" align="left" valign="middle">:</td>
        <td width="292" height="35" align="left" valign="middle" class="error"><input type="text" name="channel_name" id="channel_name" class="in_box" value="" /></td>
        </tr>
      <tr>
        <td height="65" align="left" valign="middle" class="master">Description</td>
        <td height="65" align="left" valign="middle">:</td>
        <td height="65" align="left" valign="middle"><textarea name="desc" class="rounded1" id="desc" ></textarea></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Price</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="price" class="in_box" value="" onkeypress="return isNumberKey(event);"/></td>
      </tr>
      <tr>
        <td height="20" align="left" valign="middle">&nbsp;</td>
        <td height="20" align="left" valign="middle">&nbsp;</td>
        <td height="20" align="left" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle"><input type="image" src="image/submit.jpg" border="0" name="submit" id="submit" value="submit" /></td>
        </tr>
      </table>
</form></td>
      </tr>
      <tr>
        <td align="center">
            <table width="905" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
          <tr>
            <td width="105" height="40" align="center" bgcolor="#fff1ab" class="drive"> Channel Name</td>
            <td width="187" height="40" align="center" bgcolor="#fff1ab" class="drive">Description</td>
            <td width="119" height="40" align="center" bgcolor="#fff1ab" class="drive">Price</td>
            <td width="105" align="center" bgcolor="#fff1ab" class="drive">Tax</td>
            <td width="109" align="center" bgcolor="#fff1ab" class="drive">Tax Ammount</td>
            <td width="108" align="center" bgcolor="#fff1ab" class="drive">Total</td>
            <td width="80" align="center" bgcolor="#fff1ab" class="drive">Delete</td>
            <td width="81" align="center" bgcolor="#fff1ab" class="drive">Update</td>
            </tr>
          <tr>
            <td colspan="8" align="center"><?php
			$tbl_name="addons_channels";
			$adjacents = 3;
			
			$query = "SELECT COUNT(*) as num FROM $tbl_name";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages['num'];
	
	/* Setup vars for query. */
	$targetpage = "add_ons.php"; 	//your file name  (the name of this file)
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

?></td>
            </tr>
          <?php

while ($row= mysql_fetch_array($result))
{ 
    $id= $row['id']; 
	$channel_name= $row['channel_name']; 
	$desc=$row['desc'];
    $price=$row['price'];
	$serv_tax= $row['serv_tax']; 
	$tax_amt=$row['tax_amt'];
    $total_amt=$row['total_amt'];
	
	 
?>
          <tr>
      <form name="drive" id="drive" method="post" action="addons_update.php?id=<?php echo $id;?>" enctype="multipart/form-data">    
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $channel_name; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $desc; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $price; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $serv_tax; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $tax_amt; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $total_amt; ?></td>
 <td align="center" bgcolor="#FEEDE7" class="drive_txt"><a href="add_onsdel.php?id=<?php echo $id;?>"><img src="image/delete.png" height="25" width="70" border="0" /></a></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><input type="image" src="image/update.png" height="25" width="70" border="0" name="update" id="update" value="update" /></td>
 </form>
          </tr>
          <tr>
            <td colspan="8"><?php } ?><span style="float:right"><?=$pagination?></span></td>
            </tr>  
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
