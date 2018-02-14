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
        <td align="center"></td>
      </tr>
      <tr>
        <td align="center">
          <table width="900" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
          <tr>
            <td width="96" height="40" align="center" bgcolor="#fff1ab" class="drive"> Package Name</td>
            <td width="97" align="center" bgcolor="#fff1ab" class="drive">Mode</td>
            <td width="106" height="40" align="center" bgcolor="#fff1ab" class="drive">Description</td>
            <td width="157" height="40" align="center" bgcolor="#fff1ab" class="drive">Cost of All channels</td>
            <td width="137" align="center" bgcolor="#fff1ab" class="drive">Service Tax</td>
            <td width="112" align="center" bgcolor="#fff1ab" class="drive">Tax Amount</td>
            <td width="106" align="center" bgcolor="#fff1ab" class="drive">Service Charge</td>
            <td width="78" align="center" bgcolor="#fff1ab" class="drive">Total Cost</td>
            </tr>
          <tr>
            <td colspan="8" align="center"><?php
			$tbl_name="package";
			$adjacents = 3;
			
			$query = "SELECT COUNT(*) as num FROM $tbl_name";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages['num'];
	
	/* Setup vars for query. */
	$targetpage = "package_view.php"; 	//your file name  (the name of this file)
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
	$pkg_name= explode("**",$row['pkg_name']); 
	$desc=$row['desc'];
    $price=$row['price'];
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
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $tax_amount; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $service_chrg; ?></td>
 <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $price; ?></td>
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
