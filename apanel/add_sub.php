<?php 


    require("../include/connection.php"); 
     


    if(empty($_SESSION['user'])) 
    { 

        header("Location: index.php"); 

        die("Redirecting to index.php"); 
    } 
	
     


if(isset($_REQUEST['mode']) && $_REQUEST['mode']=='sub_cat'){
	
if($_FILES['image']['name']==''){
				echo "<script type='text/javascript'> window.location= 'add_sub.php?&image_error'; </script>";}
		else{
		$image_info = getimagesize($_FILES['image']['tmp_name']);
		$image_width = $image_info[0];
		$image_height = $image_info[1];
		//echo $image_width;exit;
		
		$target_path = "../cat_image/";
		$target_path = $target_path . basename( $_FILES['image']['name']);
		
		move_uploaded_file($_FILES['image']['tmp_name'], $target_path); 
		$image= $target_path;
			

$query_update= "insert into `category` SET 
			`name`='".$_REQUEST['name']."',
			`image`='".$image."'";
 $qu_up= mysql_query($query_update) or die(mysql_error());	

echo "<script type='text/javascript'> window.location= 'add_sub.php?success'; </script>";
		}
}

if(isset($_REQUEST['mode']) && $_REQUEST['mode']=='edit_cat'){

if($_FILES['image']['tmp_name']==''){
			$image= $_REQUEST['im_edit'];	
			}
		else{
		$image_info = getimagesize($_FILES['image']['tmp_name']);
		$image_width = $image_info[0];
		$image_height = $image_info[1];
		//echo $image_width;exit;
		
		$target_path = "../cat_image/";
		$target_path = $target_path . basename( $_FILES['image']['name']);
		
		move_uploaded_file($_FILES['image']['tmp_name'], $target_path); 
		$image= $target_path;
}		
$query_update= "UPDATE `category` SET 
            `name`='".$_REQUEST['name']."',
			`image`='".$image."' where id='".$_REQUEST['id']."'";
	
 $qu_up= mysql_query($query_update) or die(mysql_error());	

echo "<script type='text/javascript'> window.location= 'add_sub.php?updated'; </script>";

}

if(isset($_REQUEST['action']) && $_REQUEST['action']=='del'){
	
$query= mysql_num_rows(mysql_query("select * from menu where cat_id= '".$_REQUEST['id']."' "));	

if($query > 0)	{

echo "<script type='text/javascript'> window.location= 'add_sub.php?error'; </script>";
	
}else{
	
$query_exi=mysql_query("delete from `category` where id='".$_REQUEST['id']."'");
echo "<script type='text/javascript'> window.location= 'add_sub.php?deleted'; </script>";

}
}  
     
?> 

    <!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>SHIVAM DHABA</title>

    <link rel="stylesheet" href="css/main.css"/>
<!----------------------validation----------------------------->

 <script type="text/javascript" src="../js/jquery.js"></script>  
  <script type="text/javascript" src="../js/validate.js"></script>  
<script type="text/javascript">
$(document).ready(function(){ 
    

	$("#change_password").validate({
		rules: {
			
			name: {

              required: true

            }
			
		 
		}, //end rules
		messages: {
			
			name: {
				required: "<br /> <font color='red'>Required.</font>"
			
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
<?php if(isset($_REQUEST['error'])) { echo "<div style='color:#FF0000;font-size:16px;'>Sorry! There are menu under this category.</div>"; } ?>
<?php if(isset($_REQUEST['image_error'])) { echo "<div style='color:#FF0000;font-size:16px;'>Sorry! Image cant be blank.</div>"; } ?>
<?php if(isset($_REQUEST['deleted'])) { echo "<div style='color:#090;font-size:16px;'>Thanks! Record deleted successfully.</div>"; } ?>
<?php if(isset($_REQUEST['updated'])) { echo "<div style='color:#090;font-size:16px;'>Thanks! Record updated successfully.</div>"; } ?>

  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="change_password" id="change_password" enctype="multipart/form-data" >
    <?php if(isset($_REQUEST['edit'])){ 
	$fpro= mysql_fetch_array(mysql_query("select * from category where id='".$_REQUEST['edit']."'"));?>
    <input type="hidden" name="mode" id="mode" value="edit_cat">
    <!--<input type="hidden" name="img" id="img" value="<?php //echo $fpro['image'] ;?>">-->
    <input type="hidden" name="id" id="id" value="<?php echo $fpro['id'] ;?>">
	<?php }else{?>
    <input type="hidden" name="mode" id="mode" value="sub_cat">
    <?php }?>
                               <table width="450" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="40" colspan="3" align="center" valign="middle"  style="font-family:Verdana, Geneva, sans-serif; font-size:22px;">Add Menu Category</td>
        </tr>
      
      <tr>
        <td height="35" align="left" valign="middle" class="master">Category Name</td>
        <td height="35" align="center" valign="middle">:</td>
        <td height="35" align="left" valign="middle">
        <input type="text" name="name" id="name" class="rounded" value="<?php if(isset($_REQUEST['edit'])){ echo $fpro['name'];}?>"/>
        </td>
        </tr>
        <tr>
        <td height="35" align="left" valign="middle" class="master">Upload Image</td>
        <td height="35" align="center" valign="middle">:</td>
        <td height="35" align="left" valign="middle">
        <?php if(isset($_REQUEST['edit'])){ ?>
        <input type="hidden" name="im_edit" id="im_edit" value="<?php echo $fpro['image'];?>">
        <img src="../cat_image/<?php echo $fpro['image'];?>" height="100px" width="100px"><br>
        <?php }?>
        <input type="file" name="image" id="image" style="width:250px; height:20px;" onchange="readURL(this);" />
        <?php /*?><input type="text" name="image" id="dis_num" class="rounded" value="<?php if(isset($_REQUEST['edit'])){ echo $fpro['dis_num'];}?>"/><?php */?>
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
        <td height="40" colspan="3" align="center" valign="middle"  ></td>
        </tr>
      <tr>
        <td height="40" colspan="3" align="center" valign="middle"  style="font-family:Verdana, Geneva, sans-serif; font-size:22px; border-bottom:#3B7F95 1px solid;">Menu Category Details</td>
        </tr>
      <tr>
        <td width="179" height="30" align="left" valign="bottom" style="font-family:Verdana, Geneva, sans-serif; font-size:16px; border-bottom:#3B7F95 1px solid;">Category</td>
        <td height="30" align="left" valign="bottom" style="font-family:Verdana, Geneva, sans-serif; font-size:16px; border-bottom:#3B7F95 1px solid;">Image</td>
        <td width="118" height="30" align="left" valign="bottom" style="font-family:Verdana, Geneva, sans-serif; font-size:16px; border-bottom:#3B7F95 1px solid;">Action</td>
        </tr>
<?php
	$adjacents = 3;			
	$query = "SELECT COUNT(*) as num FROM category";

	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages['num'];
	if($total_pages>0)

	{

	/* Setup vars for query. */

	$targetpage = "add_sub.php"; 	//your file name  (the name of this file)
	$limit = 15; 								//how many items to show per page
	$page = $_GET["page"];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0

	/* Get data. */

	$sql = "select * from category order by id desc LIMIT $start, $limit";
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
	 // $cat= mysql_fetch_array(mysql_query("select * from category where id='".$row['cat_id']."'"));
	  ?>
      <tr>
        <td height="20" align="left" valign="middle"><?php echo $row['name'] ;?></td>
        <td height="20" align="left" valign="middle"><img src="../cat_image/<?php echo $row['image'];?>" height="100px" width="135px" align="baseline"></td>
        <td height="20" align="left" valign="middle">
        <a href="add_sub.php?action=new&edit=<?php echo $row['id'] ;?>"><img src="img/edit_icon.png"></a>|
        <a href="add_sub.php?action=del&id=<?php echo $row['id'] ;?>"><img src="img/del_icon.png"></a>
         </td>
        </tr>
      <?php }}?>
        <tr>
            <td colspan="3"><?=$pagination?></td>
          </tr>

      </table>
</div>
</body>
</html>