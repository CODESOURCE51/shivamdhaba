<?php 
    require("../include/connection.php"); 

    if(empty($_SESSION['user'])) 
    { 
        header("Location: index.php"); 
        die("Redirecting to index.php"); 
    } 
     
if(isset($_REQUEST['mode']) && $_REQUEST['mode']=='product'){

	$target_path = "../product/";
	$target_path = $target_path . basename( $_FILES['image']['name']); 

	move_uploaded_file($_FILES['image']['tmp_name'], $target_path);  

$query_exi=mysql_query("INSERT INTO `product` SET
			            `cat_id`='".$_REQUEST['cat_id']."',
						`subcat_id`='".$_REQUEST['subcat_id']."',
						`model_no`='".$_REQUEST['model_no']."',
						`des1`='".$_REQUEST['des1']."',
						`des2`='".$_REQUEST['des2']."',
						`des3`='".$_REQUEST['des3']."',
						`image`='".basename( $_FILES['image']['name'])."'");

echo "<script type='text/javascript'> window.location= 'product.php?success'; </script>";	
}

if(isset($_REQUEST['mode']) && $_REQUEST['mode']=='edit_product'){

if($_FILES['image']['tmp_name']!=''){
 	
	$target_path = "../product/";
	$target_path = $target_path . basename( $_FILES['image']['name']); 

	move_uploaded_file($_FILES['image']['tmp_name'], $target_path); 
	$img= basename( $_FILES['image']['name']); 

}else{
$img= $_REQUEST['img'];	
}
$query_exi=mysql_query("UPDATE `product` SET
			            `cat_id`='".$_REQUEST['cat_id']."',
						`subcat_id`='".$_REQUEST['subcat_id']."',
						`model_no`='".$_REQUEST['model_no']."',
						`des1`='".$_REQUEST['des1']."',
						`des2`='".$_REQUEST['des2']."',
						`des3`='".$_REQUEST['des3']."',
						`image`='".$img."' where id='".$_REQUEST['id']."'");

echo "<script type='text/javascript'> window.location= 'product.php?success'; </script>";	
}
if(isset($_REQUEST['action']) && $_REQUEST['action']=='del'){
	
	$query_exi=mysql_query("delete from `product` where id='".$_REQUEST['id']."'");
	
echo "<script type='text/javascript'> window.location= 'product.php?deleted'; </script>";	
}     
?> 

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>ASKOL INDIA</title>

    <link rel="stylesheet" href="css/main.css"/>
<!----------------------validation----------------------------->

 <script type="text/javascript" src="../js/jquery.js"></script>  
  <script type="text/javascript" src="../js/validate.js"></script>  
<script type="text/javascript">
$(document).ready(function(){ 
    

	$("#product").validate({
		rules: {
			cat_id: {
				required: true
			},
			subcat_id: {

              required: true

            },
			model_no: {

              required: true

            },
			image: {

              required: true

            },
			des1: {

              required: true

            }
			
		 
		}, //end rules
		messages: {
			
			cat_id: {
				required: "<br /> <font color='red'>Required.</font>"
			
			},
			subcat_id: {
				required: "<br /> <font color='red'>Required.</font>"
			
			},
			model_no: {

              required: "<br /> <font color='red'>Required.</font>"

            },
			image: {

              required: "<br /> <font color='red'>Required.</font>"

            },
			des1: {

              required: "<br /> <font color='red'>Required.</font>"

            }
			
		} //end messages
		
	}); //end validate
  });
</script>
<!----------------------validation----------------------------->
<script>

function getcategory(id)
{


var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {

        
    document.getElementById("scat").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("POST","subcat.php?id="+id,true);
xmlhttp.send();
}
</script>

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
<?php if(isset($_REQUEST['success'])) { echo "<div style='color:#090;font-size:16px;'>Thanks! Product Details Inserted successfully.</div>"; } ?>
<?php //if(isset($_REQUEST['size_error'])) { echo "<div style='color:#FF0000;font-size:16px;'>Please select an image of size 465 * 430.</div>"; } ?>
<?php if(isset($_REQUEST['deleted'])) { echo "<div style='color:#090;font-size:16px;'>Thanks! Product deleted successfully.</div>"; } ?>
<?php if(isset($_REQUEST['action']) && $_REQUEST['action']=="new") {    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="product" id="product" enctype="multipart/form-data" >
    <?php if(isset($_REQUEST['edit'])){ 
	$fpro= mysql_fetch_array(mysql_query("select * from product where id='".$_REQUEST['edit']."'"));?>
    <input type="hidden" name="mode" id="mode" value="edit_product">
    <input type="hidden" name="img" id="img" value="<?php echo $fpro['image'] ;?>">
    <input type="hidden" name="id" id="id" value="<?php echo $fpro['id'] ;?>">
	<?php }else{?>
    <input type="hidden" name="mode" id="mode" value="product">
	<?php }?>
    <table width="450" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr>
        <td height="50" colspan="3" align="center" valign="middle"  >
        
        </td>
        </tr>
      <tr>
        <td height="40" colspan="3" align="center" valign="middle"  style="font-family:Verdana, Geneva, sans-serif; font-size:22px;">Upload Product</td>
        </tr>
      <tr>
        <td width="137" height="35" align="left" valign="middle" class="master">Category</td>
        <td width="21" height="35" align="center" valign="middle">:</td>
        <td width="292" height="35" align="left" valign="middle" class="error">
        <select name="cat_id" id="cat_id" onchange="getcategory(this.value);">
        <option value="">Select Category</option>
        <?php $q_cat=mysql_query("select * from category");
		while($f_cat=mysql_fetch_array($q_cat)){?>
        <option value="<?php echo $f_cat['id'];?>" <?php if(isset($_REQUEST['edit'])){if($f_cat['id']==$fpro['cat_id']){ echo "selected";}}?>><?php echo $f_cat['name'];?></option>
        <?php }?>
        </select>
        
       </td>
        </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Sub-Category:</td>
        <td height="35" align="center" valign="middle">:</td>
        <td height="35" align="left" valign="middle" id="scat">
        <?php if(isset($_REQUEST['edit'])){?>
        <select name="subcat_id" id="subcat_id">
        <?php $q_scat=mysql_query("select * from sub_category where cat_id='".$fpro['subcat_id']."'");
		while($f_scat=mysql_fetch_array($q_scat)){?>
        <option value="<?php echo $f_scat['id'];?>" <?php if($f_scat['id']=$fpro['subcat_id']){ echo "selected";}?>><?php echo $f_scat['sname'];?></option>
        <?php }?>
        </select>
        <?php }?>
        </td>
        </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Model:</td>
        <td height="35" align="center" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="model_no" id="model_no" class="rounded" value=" <?php if(isset($_REQUEST['edit'])){ echo  $fpro['model_no'];}?>"/></td>
        </tr>
        <tr>
        <td height="35" align="left" valign="middle" class="master">Product Description:</td>
        <td height="35" align="center" valign="middle"></td>
        <td height="35" align="left" valign="middle"></td>
        </tr>
        <tr>
        <td height="35" align="left" valign="middle" class="master">Line 1:</td>
        <td height="35" align="center" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="des1" id="des1" class="rounded" value="<?php if(isset($_REQUEST['edit'])){ echo  $fpro['des1'];}?>"/></td>
        </tr>
        <tr>
        <td height="35" align="left" valign="middle" class="master">Line 2:</td>
        <td height="35" align="center" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="des2" id="des2" class="rounded" value="<?php if(isset($_REQUEST['edit'])){ echo  $fpro['des2'];}?>"/></td>
        </tr>
        <tr>
        <td height="35" align="left" valign="middle" class="master">Line 3:</td>
        <td height="35" align="center" valign="middle">:</td>
        <td height="35" align="left" valign="middle"><input type="text" name="des3" id="des3" class="rounded" value="<?php if(isset($_REQUEST['edit'])){ echo  $fpro['des3'];}?>"/></td>
        </tr>
        <tr>
        <td height="35" align="left" valign="middle" class="master">Product Image:</td>
        <td height="35" align="center" valign="middle">:</td>
        <td height="35" align="left" valign="middle">
        <?php if(isset($_REQUEST['edit'])){?>
        <img src="../product/<?php echo $fpro['image'] ;?>" height="120" width="150">
        <?php }?>
        <input type="file" name="image" id="image" class="rounded" value=""/></td>
        </tr>
        <tr>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        </tr>
      <tr>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle">&nbsp;</td>
        <td height="35" align="left" valign="middle"><input type="image" src="img/submit.png" border="0" value="submit" /></td>
        </tr>
      </table>

</form>
<?php }else{?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="p_details" id="p_details" enctype="multipart/form-data" >
                               
      <table width="700" border="0" cellspacing="0" cellpadding="0" align="center">
      <tr>
        <td height="40" colspan="4" align="center" valign="middle"  style="font-family:Verdana, Geneva, sans-serif; font-size:22px; border-bottom:#3B7F95 1px solid;">Products</td>
        <td height="40" align="center" valign="middle"  style="font-family:Verdana, Geneva, sans-serif; font-size:22px;border-bottom:#3B7F95 1px solid;"><a href="product.php?action=new"><img src="img/add_new.png" title="add new product"></a></td>
        </tr>
      <tr>
        <td height="35" width="140" align="center" valign="middle" class="master" style="border-bottom:#3B7F95 1px solid; font-weight:bold;">Category</td>
        <td width="140" align="center" valign="middle" class="master" style="border-bottom:#3B7F95 1px solid; font-weight:bold;">Sub-Category</td>
        <td width="140" align="center" valign="middle" class="master" style="border-bottom:#3B7F95 1px solid; font-weight:bold;">Model</td>
        <td width="140" align="center" valign="middle" class="master" style="border-bottom:#3B7F95 1px solid; font-weight:bold;">Image</td>
        <td width="140" align="center" valign="middle" class="master" style="border-bottom:#3B7F95 1px solid; font-weight:bold;">Action</td>
      </tr>
      <tr>
        <td height="10" colspan="5" align="center" valign="middle"></td>
        </tr>
      <?php
	  $adjacents = 3;			
	$query = "SELECT COUNT(*) as num FROM product";

	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages['num'];
	if($total_pages>0)

	{

	/* Setup vars for query. */

	$targetpage = "product.php"; 	//your file name  (the name of this file)
	$limit = 15; 								//how many items to show per page
	$page = $_GET["page"];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0

	/* Get data. */

	$sql = "select * from product order by id desc LIMIT $start, $limit";
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
	  //$f_pro= mysql_query("select * from product");
	  //while($pro= mysql_fetch_array($f_pro)){
	  $cat= mysql_fetch_array(mysql_query("select * from category where id='".$row['cat_id']."'"));
	  $scat= mysql_fetch_array(mysql_query("select * from sub_category where id='".$row['subcat_id']."'"));
	  ?>
      <tr>
        <td height="35" width="140" align="center" valign="middle" class="master" style="border-bottom:#3B7F95 1px solid;"><?php echo $cat['name'] ;?></td>
        <td width="140" align="center" valign="middle" class="master" style="border-bottom:#3B7F95 1px solid;"><?php echo $scat['sname'] ;?></td>
        <td width="140" align="center" valign="middle" class="master" style="border-bottom:#3B7F95 1px solid;"><?php echo $row['model_no'] ;?></td>
        <td width="140" align="center" valign="middle" class="master" style="border-bottom:#3B7F95 1px solid;"><img src="../product/<?php echo $row['image'] ;?>" height="50" width="100"></td>
        <td width="140" align="center" valign="middle" class="master" style="border-bottom:#3B7F95 1px solid;"><a href="product.php?action=new&edit=<?php echo $row['id'] ;?>"><img src="img/edit_icon.png"></a>|<a href="product.php?action=del&id=<?php echo $row['id'] ;?>"><img src="img/del_icon.png"></a></td>
      </tr>
       <tr>
        <td height="10" colspan="5" align="center" valign="middle"></td>
        </tr>
      <?php }}?>
      <tr>
        <td height="10" colspan="5" align="center" valign="middle"><?=$pagination?></td>
        </tr>
      </table>

</form>
<?php }?>
</div>
</body>
</html>