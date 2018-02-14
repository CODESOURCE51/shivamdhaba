<?php 


    require("connection.php"); 
     

    if(empty($_SESSION['user'])) 
    { 

        header("Location: index.php"); 

        die("Redirecting to index.php"); 
    } 
	
    $user=$_SESSION['user']['username'];
?>

<!--/////////////////////////////////-->
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
        <td height="20" align="center">
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
?>
          </td>
      </tr>
      <tr>
        <td height="50" align="center">
        <table width="1008" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="1008" align="center">
            <table width="980" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC; padding-bottom:10px;">
          <tr>
            <td width="136" height="43" align="center" bgcolor="#fff1ab" class="drive">Client Name</td>
            <td width="101" height="43" align="center" bgcolor="#fff1ab" class="drive">ClientId</td>
            <td width="89" height="43" align="center" bgcolor="#fff1ab" class="drive">Zone</td>
            <td width="98" align="center" bgcolor="#fff1ab" class="drive">Area</td>
            <td width="125" height="43" align="center" bgcolor="#fff1ab" class="drive">Subscription Date</td>
            <td width="125" height="43" align="center" bgcolor="#fff1ab" class="drive">Address</td>
            <td width="107" height="43" align="center" bgcolor="#fff1ab" class="drive">Contact No</td>
           <!-- <td width="93" align="center" bgcolor="#fff1ab" class="drive">Update</td>-->
            <td width="94" align="center" bgcolor="#fff1ab" class="drive">Delete</td>
            </tr>
          <tr>
            <td colspan="8" align="center">
            <?php
			$tbl_name="client_entry";
			$adjacents = 3;
			
			$query = "SELECT COUNT(*) as num FROM $tbl_name";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages['num'];
	
	/* Setup vars for query. */
	$targetpage = "clients.php"; 	//your file name  (the name of this file)
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
            </tr>
          <?php
		  
while ($row= mysql_fetch_array($result))
{ 
	 
?>
          <tr>
      <form name="drive" id="drive" method="post" action="edit_client.php?id=<?php echo $row['id'];?>" enctype="multipart/form-data">    
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['c_name']; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['c_id']; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['zone']; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['area']; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['subscription_date']; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['address']; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['phone']; ?></td>
<!-- <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><input type="image" src="image/update.png" height="25" width="70" border="0" name="submit2" id="submit2" value="submit" /></td>-->
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><a href="delete_client.php?id=<?php echo $row['id'];?>"><img src="image/delete.png" height="25" width="70" border="0" /></a></td>
      </form>
          </tr>
          <tr>
            <td colspan="8"><?php } ?><span style="float:right"><?=$pagination?></span></td>
            </tr>
 
        </table>
            </td>
          </tr>
        </table></td>
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
