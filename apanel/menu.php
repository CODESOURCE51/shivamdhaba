<?php 


    require("../include/connection.php"); 
     


    if(empty($_SESSION['user'])) 
    { 

        header("Location: index.php"); 

        die("Redirecting to index.php"); 
    } 
	
     


if(isset($_REQUEST['mode']) && $_REQUEST['mode']=='sub_cat'){

$query_update= "insert into `menu` SET 
            `cat_id`='".$_REQUEST['cat_id']."',
			`mname`='".$_REQUEST['mname']."',
			`mprice`='".$_REQUEST['mprice']."'";
 $qu_up= mysql_query($query_update) or die(mysql_error());	

echo "<script type='text/javascript'> window.location= 'menu.php?success'; </script>";
}

if(isset($_REQUEST['mode']) && $_REQUEST['mode']=='edit_cat'){

$query_update= "UPDATE `menu` SET 
            `cat_id`='".$_REQUEST['cat_id']."',
			`mname`='".$_REQUEST['mname']."',
			`mprice`='".$_REQUEST['mprice']."' where id='".$_REQUEST['id']."'";
			
 $qu_up= mysql_query($query_update) or die(mysql_error());	

echo "<script type='text/javascript'> window.location= 'menu.php?updated'; </script>";
}

if(isset($_REQUEST['action']) && $_REQUEST['action']=='del'){

$query_exi=mysql_query("delete from `menu` where id='".$_REQUEST['id']."'");

echo "<script type='text/javascript'> window.location= 'menu.php?deleted'; </script>";


}  
     
?> 

    <!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title> SHIVAM DHABA</title>

    <link rel="stylesheet" href="css/main.css"/>
<!----------------------validation----------------------------->

 <script type="text/javascript" src="../js/jquery.js"></script>  
  <script type="text/javascript" src="../js/validate.js"></script>  
<script type="text/javascript">
$(document).ready(function(){ 
    

	$("#change_password").validate({
		rules: {
			cat_id: {
				required: true
			},
			mname: {

              required: true

            },
			mprice:{
				
				required: true,
				digits:true
				
			}
			
		 
		}, //end rules
		messages: {
			
			cat_id: {
				required: "<br /> <font color='red'>Required.</font>"
			
			},
			mname: {
				required: "<br /> <font color='red'>Required.</font>"
			
			},
			mprice:{
				
				required: "<br /> <font color='red'>Required.</font>",
				digits: "<br /> <font color='red'>Digits Only.</font>"
				
			}
			
		} //end messages
		
	}); //end validate
  });
</script>
<!----------------------validation----------------------------->
<style>
div.pagination {
padding: 3px;
margin: 3px;
}
div.pagination a {
padding: 2px 5px 2px 5px;
margin: 2px;
border: 1px solid #000000;
font-size:16px;
text-decoration: none; /* no underline */
color: #000000;
}

div.pagination a:hover, div.pagination a:active {
border: 1px solid #000000;
color: #000;
}

div.pagination span.current {
padding: 2px 5px 2px 5px;
margin: 2px;
border: 1px solid #000000;
font-size:16px;
font-weight: bold;
background-color: #000000;
color: #F60;
}

div.pagination span.disabled {
padding: 2px 5px 2px 5px;
margin: 2px;
border: 1px solid #EEE;
font-size:16px;
color: #DDD;
}
</style>
</head>
<body>
<?php include "header.php" ?>
<div id="siteWrapper">

<?php if(isset($_REQUEST['success'])) { echo "<div style='color:#090;font-size:16px;'>Thanks! Record added successfully.</div>"; } ?>
<?php if(isset($_REQUEST['error'])) { echo "<div style='color:#FF0000;font-size:16px;'>Sorry! There are products in this sub category.</div>"; } ?>
<?php if(isset($_REQUEST['deleted'])) { echo "<div style='color:#090;font-size:16px;'>Thanks! Record deleted successfully.</div>"; } ?>
<?php if(isset($_REQUEST['updated'])) { echo "<div style='color:#090;font-size:16px;'>Thanks! Record updated successfully.</div>"; } ?>

  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="change_password" id="change_password" enctype="multipart/form-data" >
    <?php if(isset($_REQUEST['edit'])){ 
	$fpro= mysql_fetch_array(mysql_query("select * from menu where id='".$_REQUEST['edit']."'"));?>
    <input type="hidden" name="mode" id="mode" value="edit_cat">
    <!--<input type="hidden" name="img" id="img" value="<?php //echo $fpro['image'] ;?>">-->
    <input type="hidden" name="id" id="id" value="<?php echo $fpro['id'] ;?>">
	<?php }else{?>
    <input type="hidden" name="mode" id="mode" value="sub_cat">
    <?php }?>
    <table width="450" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="40" colspan="3" align="center" valign="middle"  style="font-family:Verdana, Geneva, sans-serif; font-size:22px;">Add Menu Details</td>
        </tr>
      <tr>
        <td width="137" height="35" align="left" valign="middle" class="master">Category</td>
        <td width="21" height="35" align="center" valign="middle">:</td>
        <td width="292" height="35" align="left" valign="middle" class="error">
        <select name="cat_id" id="cat_id" onchange="getcategory(this.value);" style="width:auto;">
        <?php $q_cat=mysql_query("select * from category");
		while($f_cat=mysql_fetch_array($q_cat)){?>
        <option value="<?php echo $f_cat['id'];?>" <?php if(isset($_REQUEST['edit'])){if($f_cat['id']==$fpro['cat_id']){ echo "selected";}}?>><?php echo $f_cat['name'];?></option>
        <?php }?>
        </select>
        
       </td>
        </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Menu Name</td>
        <td height="35" align="center" valign="middle">:</td>
        <td height="35" align="left" valign="middle">
        <input type="text" name="mname" id="mname" class="rounded" value="<?php if(isset($_REQUEST['edit'])){ echo $fpro['mname'];}?>"/>
        </td>
        </tr>
        <tr>
        <td height="35" align="left" valign="middle" class="master">Menu Price</td>
        <td height="35" align="center" valign="middle">:</td>
        <td height="35" align="left" valign="middle">
        <input type="text" name="mprice" id="mprice" class="rounded" value="<?php if(isset($_REQUEST['edit'])){ echo $fpro['mprice'];}?>"/>
        </td>
        </tr>
      <tr>
        <td height="20" align="left" valign="middle">&nbsp;</td>
        <td height="20" align="left" valign="middle">&nbsp;</td>
        <td height="20" align="left" valign="middle"> </td>
        </tr>
      <tr>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle"><input type="image" src="img/submit.png" border="0" value="submit" /></td>
        </tr>
       <tr>
        <td height="40" colspan="3" align="center" valign="middle"  style="font-family:Verdana, Geneva, sans-serif; font-size:22px; border-bottom:#3B7F95 2px solid;"></td>
        </tr>
         
      </table>

</form>
<table width="500" border="0" cellspacing="0" cellpadding="0">
<tr>
        <td height="40" colspan="4" align="center" valign="middle"  ></td>
        </tr>
      <tr>
        <td height="40" colspan="4" align="center" valign="middle"  style="font-family:Verdana, Geneva, sans-serif; font-size:22px; border-bottom:#3B7F95 1px solid;">Menu Details</td>
        </tr>
      <tr>
        <td width="139" height="30" align="left" valign="bottom" style="font-family:Verdana, Geneva, sans-serif; font-size:16px; border-bottom:#3B7F95 1px solid;">Category</td>
        <td width="148" height="30" align="left" valign="bottom" style="font-family:Verdana, Geneva, sans-serif; font-size:16px; border-bottom:#3B7F95 1px solid;">Menu</td>
        <td width="117" align="left" valign="bottom" style="font-family:Verdana, Geneva, sans-serif; font-size:16px; border-bottom:#3B7F95 1px solid;">Price</td>
        <td width="96" height="30" align="left" valign="bottom" style="font-family:Verdana, Geneva, sans-serif; font-size:16px; border-bottom:#3B7F95 1px solid;">Action</td>
        </tr>
<?php
	$adjacents = 3;			
	$query = "SELECT COUNT(*) as num FROM menu";

	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages['num'];
	if($total_pages>0)

	{

	/* Setup vars for query. */

	$targetpage = "menu.php"; 	//your file name  (the name of this file)
	$limit = 15; 								//how many items to show per page
	$page = $_GET["page"];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0

	/* Get data. */

	$sql = "select * from menu order by cat_id desc LIMIT $start, $limit";
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
	$i=0;
	while ($row= mysql_fetch_array($result))

	{
		$i++;
        $id=$row['id'];
	 //$f_pro= mysql_query("select * from sub_category");
	 // while($pro= mysql_fetch_array($f_pro)){
	  $cat= mysql_fetch_array(mysql_query("select * from category where id='".$row['cat_id']."'"));
	  ?>
      <tr>
        <td height="20" align="left" valign="middle"><?php echo $cat['name'] ;?></td>
        <td height="20" align="left" valign="middle"><?php echo $row['mname'] ;?></td>
        <td height="20" align="left" valign="middle"><?php echo $row['mprice'] ;?></td>
        <td height="20" align="left" valign="middle">
        <a href="menu.php?action=new&edit=<?php echo $row['id'] ;?>"><img src="img/edit_icon.png"></a>|
        <a href="menu.php?action=del&id=<?php echo $row['id'] ;?>"><img src="img/del_icon.png"></a>
         </td>
        </tr>
      <?php }}?>
        <tr>
            <td colspan="4"><?=$pagination?></td>
          </tr>

      </table>
</div>
</body>
</html>