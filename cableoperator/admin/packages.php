<?php 


    require("connection.php"); 
     

    if(empty($_SESSION['user'])) 
    { 

        header("Location: index.php"); 

        die("Redirecting to index.php"); 
    } 
    
?> 
<?php
if(isset ($_REQUEST['mode']) && $_REQUEST['mode']=='pkg')
{
$sess= mysql_real_escape_string($_REQUEST['sess']);
$pkg_name= $_REQUEST['pkg_name']."**".$sess;
$desc= mysql_real_escape_string($_REQUEST['desc']);
$grand_total= mysql_real_escape_string($_REQUEST['grand_total']);
$td_percent= mysql_real_escape_string($_REQUEST['td_percent']);
$td= mysql_real_escape_string($_REQUEST['td']);
$misc_charges= mysql_real_escape_string($_REQUEST['misc_charges']);
$price=round($_REQUEST['price']);

       $query_2= "INSERT INTO `package` (`pkg`,`pkg_mode`,`pkg_name`,`desc`,`all_ch`,`service_tax`,`tax_amount`,`service_chrg`,`price`) VALUES ('".$_REQUEST['pkg_name']."','".$sess."','$pkg_name','$desc','$grand_total','$td_percent','$td','$misc_charges','".$price."')";
	   
$result_2= mysql_query($query_2) or die (mysql_error());




echo "<script> window.location= 'packages.php?insert'; </script>";

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
			pkg_name: {
				required: true
			},
			desc: {
				required: true
			},
			price: {
				required: true
			},
			sess: {
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
			
			},
			sess: {
				required: "<br /> Please Select One."
			
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
    <input type="hidden"  name="mode" value="pkg">
    <table width="500" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="40" colspan="3" align="center" valign="middle"><p style="background-color:#fff1ab; padding:5px; text-align:center; font-family:Verdana, Geneva, sans-serif; font-size:22px; border:1px solid #EFDC86; border-radius:25px;">Packages</p>

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
echo "<span class='errors'>Invalid Image File.</span>";
}
?>
</td>
      </tr>
      <tr>
        <td width="137" height="35" align="left" valign="middle" class="master">Package Name</td>
        <td width="21" height="35" align="left" valign="middle">:</td>
        <td width="292" height="35" align="left" valign="middle" class="error"><input type="text" name="pkg_name" id="pkg_name" class="in_box" value="" style="width:150px;" /></td>
        </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Mode</td>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle" class="error"><select name="sess" id="sess" style="width:100px; height:28px;" class="in_box">
                      <option value="">Select One</option>
                      <option value="Monthly">Monthly</option>
                      <option value="Quarterly">Quarterly</option>
                      <option value="Half Yearly">Half Yearly</option>
                      <option value="Annually">Annually</option>
                      </select></td>
      </tr>
      <tr>
        <td height="65" align="left" valign="middle" class="master">Description</td>
        <td height="65" align="left" valign="middle">:</td>
        <td height="65" align="left" valign="middle"><textarea name="desc" class="rounded1" id="desc" ></textarea></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Cost of All Channel</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" id="grand_total" name="grand_total" onkeyup="return gettdis();" class="in_box" style="width:80px;"/></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Service Tax <input type="text" name="td_percent" id="td_percent" readonly="readonly" value="<?php
$select_user = "SELECT * FROM `service_tax` where id=1";
$exe_selectuser = mysql_query($select_user) or die (mysql_error());
$row= mysql_fetch_array($exe_selectuser);
echo $row['tax']; ?>" style="width:30px;" />
          %</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="td" id="td" value="0" style="width:80px;" class="in_box" onkeyup="gettdis()"/></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Service Charge</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="misc_charges" id="misc_charges" value="0" required="required"  onkeyup="return subtot();" class="in_box" style="width:80px;" /></td>
      </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Price</td>
        <td height="35" align="left" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="price" id="price" value="" style="width:80px;" class="in_box" onclick="return subtot();"/></td>
      </tr>
      <tr>
        <td height="50" align="left" valign="top">&nbsp;</td>
        <td height="50" align="left" valign="top">&nbsp;</td>
        <td height="50" align="left" valign="top"><input type="image" src="image/submit.jpg" border="0" name="submit" id="submit" value="submit" /></td>
      </tr>
      </table>
</form></td>
      </tr>
      <tr>
        <td align="center">
            <table width="950" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
          <tr>
            <td width="92" height="40" align="center" bgcolor="#fff1ab" class="drive"> Package Name</td>
            <td width="92" align="center" bgcolor="#fff1ab" class="drive">Package Mode</td>
            <td width="81" height="40" align="center" bgcolor="#fff1ab" class="drive">Description</td>
            <td width="118" height="40" align="center" bgcolor="#fff1ab" class="drive">Cost of All channels</td>
            <td width="100" align="center" bgcolor="#fff1ab" class="drive">Service Tax</td>
            <td width="95" align="center" bgcolor="#fff1ab" class="drive">Tax Amount</td>
            <td width="110" align="center" bgcolor="#fff1ab" class="drive">Service Charge</td>
            <td width="93" align="center" bgcolor="#fff1ab" class="drive">Total Cost</td>
            <td width="80" align="center" bgcolor="#fff1ab" class="drive">Delete</td>
            <td width="76" align="center" bgcolor="#fff1ab" class="drive">Update</td>
            </tr>
          <tr>
            <td colspan="10" align="center"><?php
			$tbl_name="package";
			$adjacents = 3;
			
			$query = "SELECT COUNT(*) as num FROM $tbl_name";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages['num'];
	
	/* Setup vars for query. */
	$targetpage = "packages.php"; 	//your file name  (the name of this file)
	$limit = 10; 								//how many items to show per page
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
	$pkg_name=explode("**", $row['pkg_name']); 
	
	$desc=$row['desc'];
    $price=round($row['price']);
	$all_ch= $row['all_ch']; 
	$service_tax= $row['service_tax']; 
	$tax_amount=$row['tax_amount'];
    $service_chrg=$row['service_chrg'];
	
	 
?>
          <tr>
      <form name="drive" id="drive" method="post" action="package_update.php?id=<?php echo $id;?>" enctype="multipart/form-data">    
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $pkg_name[0]; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $pkg_name[1]; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $desc; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $all_ch; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $service_tax; ?>%</td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo round($tax_amount,2); ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $service_chrg; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $price; ?></td>
 <td align="center" bgcolor="#FEEDE7" class="drive_txt"><a href="package_del.php?id=<?php echo $id;?>"><img src="image/delete.png" height="25" width="70" border="0" /></a></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><input type="image" src="image/update.png" height="25" width="70" border="0" name="update" id="update" value="update" /></td>
 </form>
          </tr>
          <tr>
            <td colspan="10"><?php } ?><span style="float:right"><?=$pagination?></span></td>
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
