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
        <td height="30" align="center"><?php
if (isset($_REQUEST['success']))
{
echo "<span class='succ'>Package payed Successfully.</span>";
}
if (isset($_REQUEST['added']))
{
echo "<span class='succ'>Addons assigned Successfully.</span>";
}
if (isset($_REQUEST['assigned']))
{
echo "<span class='succ'>Package assigned Successfully.</span>";
}

 ?></td>
      </tr>
      <tr>
        <td align="center"></td>
      </tr>
      <tr>
        <td align="center">
          <table width="950" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
            <tr align="center">
              <td width="102" height="40" bgcolor="#fff1ab" class="drive"> Package Name</td>
              <td width="70" bgcolor="#fff1ab" class="drive">Mode</td>
              <td width="105" height="40" bgcolor="#fff1ab" class="drive">Client</td>
              <td width="105" bgcolor="#fff1ab" class="drive">Box No</td>
              <td width="112" height="40" bgcolor="#fff1ab" class="drive">From Date</td>
              <td width="98" bgcolor="#fff1ab" class="drive">To Date</td>
              <td width="86" bgcolor="#fff1ab" class="drive">Active status</td>
              <td width="92" bgcolor="#fff1ab" class="drive">Renew status</td>
              <td width="101" bgcolor="#fff1ab" class="drive">ADDOns</td>
              <td width="66" bgcolor="#fff1ab" class="drive">Payment</td>
              </tr>
            <tr>
              <td colspan="10" align="center">
              <?php
			$tbl_name="pkg_assign";
			$adjacents = 3;
			
			$query = "SELECT COUNT(*) as num FROM $tbl_name";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages['num'];
	
	/* Setup vars for query. */
	$targetpage = "view_assign_package.php"; 	//your file name  (the name of this file)
	$limit = 30; 								//how many items to show per page
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

?>              </td>
              </tr>
            <?php

while ($row= mysql_fetch_array($result))
{ 
    $id= $row['id']; 
	$pkgPayment= mysql_query("select * from `pkg_payment` where track_code='".$row['track_code']."'");	
	$RowPkgPay= mysql_num_rows($pkgPayment);
	$row66 = mysql_fetch_array($pkgPayment);
	$tot_payed = $row66['tot_payed'];
	$ClientR = mysql_fetch_array(mysql_query("SELECT max(id) as r_id from `pkg_assign` where c_id='".$row['c_id']."'"));
	$Pkg= explode("**",$row['pkg_name']);
	$AddonsPayment= mysql_query("select *, SUM(total_amount) as total_amount from `addons_payment` where track_code='".$row['track_code']."'");	
	$RowAddPay= mysql_num_rows($AddonsPayment);
	$row_2= mysql_fetch_array($AddonsPayment);
	$total_amount= $row_2['total_amount'];
	$grand_total= $tot_payed+$total_amount;
	 
?>
            <tr align="center">
              <form name="drive" id="drive" method="post" action="" enctype="multipart/form-data">
                <td height="30" bgcolor="#FEEDE7" class="drive_txt"><?php echo $Pkg[0]; ?></td>
                <td height="30" bgcolor="#FEEDE7" class="drive_txt"><?php echo $Pkg[1]; ?></td>
                <td height="30" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['c_id']; ?></td>
                <td height="30" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['box_no']; ?></td>
                <td height="30" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['from_date']; ?></td>
                <td height="30" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['to_date']; ?></td>
                <td height="30" bgcolor="#FEEDE7" class="drive_txt">
				<?php if($row['activ_status']== 0){echo "Not Active";}
				elseif($row['activ_status']== 2){echo "Pending";}
				elseif($row['activ_status']== 3){echo "blocked";}
				elseif($row['activ_status']== 1){echo "Active";} ?>                </td>
                <td height="30" bgcolor="#FEEDE7" class="drive_txt">
                <?php if($ClientR['r_id']== $row['id']){ ?>
                <?php if($row['renew_status']== 0){echo "Not Active";}
				elseif($row['activ_status']== 2){echo "Pending";}
				elseif($row['activ_status']== 1 || $row['activ_status']== 3){?>
                <a href="assign_package.php?code=<?php echo $row['track_code'];?>"><img src="image/renew.png" width="21" height="21" /></a>
                <?php }}?></td>
                <td height="30" bgcolor="#FEEDE7" class="drive_txt">
                <?php /*if($RowAddPay > 0){ echo "Addons Added";} else{ */?>
				<?php if($ClientR['r_id']==$row['id']){ if($row['activ_status']== 1){?>
                <a href="add_addons.php?code=<?php echo $row['track_code'];?>">Add AddOns</a>
                <?php }}//}?>                </td>
                <td height="30" bgcolor="#FEEDE7" class="drive_txt">
                <?php if($RowPkgPay>0){?>
                <a href="pdf/examples/client_bill_report.php?code=<?php echo $row['track_code'];?>&gt=<?php echo round($grand_total);?>" target="_blank">
                Print Bill
                </a>
                <?php }else{?>
                <a href="package_payment.php?id=<?php echo $id;?>"><img src="image/payment.png" /></a>
                <?php }?>                </td>
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
