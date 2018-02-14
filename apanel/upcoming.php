<?php 


    require("../include/connection.php"); 
     


    if(empty($_SESSION['user'])) 
    { 

        header("Location: index.php"); 

        die("Redirecting to index.php"); 
    } 
	
     
if(isset($_REQUEST['mode']) && $_REQUEST['mode']=='product'){

	$target_path = "../upcoming/";
	$target_path = $target_path . basename( $_FILES['image']['name']); 

	move_uploaded_file($_FILES['image']['tmp_name'], $target_path);  

$query_exi=mysql_query("INSERT INTO `upcoming_products` SET
						`des`='".$_REQUEST['des']."',
						`image`='".basename( $_FILES['image']['name'])."'");

echo "<script type='text/javascript'> window.location= 'upcoming.php?success'; </script>";	
}

if(isset($_REQUEST['mode']) && $_REQUEST['mode']=='edit_product'){

if($_FILES['image']['tmp_name']!=''){
 	
	$target_path = "../upcoming/";
	$target_path = $target_path . basename( $_FILES['image']['name']); 

	move_uploaded_file($_FILES['image']['tmp_name'], $target_path); 
	$img= basename( $_FILES['image']['name']); 

}else{
$img= $_REQUEST['img'];	
}
$query_exi=mysql_query("UPDATE `upcoming_products` SET
						`des`='".$_REQUEST['des']."',
						`image`='".$img."' where id='".$_REQUEST['id']."'");

echo "<script type='text/javascript'> window.location= 'upcoming.php?success'; </script>";	
}
if(isset($_REQUEST['action']) && $_REQUEST['action']=='del'){
	
	$query_exi=mysql_query("delete from `upcoming_products` where id='".$_REQUEST['id']."'");
	
echo "<script type='text/javascript'> window.location= 'upcoming.php?deleted'; </script>";	
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
			
			image: {

              required: true

            },
			des: {

              required: true

            }
			
		 
		}, //end rules
		messages: {
			
			
			image: {

              required: "<br /> <font color='red'>Required.</font>"

            },
			des: {

              required: "<br /> <font color='red'>Required.</font>"

            }
			
		} //end messages
		
	}); //end validate
  });
</script>
<!----------------------validation----------------------------->

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
	$fpro= mysql_fetch_array(mysql_query("select * from upcoming_products where id='".$_REQUEST['edit']."'"));?>
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
        <td height="35" width="200" align="left" valign="middle" class="master">Product Text</td>
        <td height="35" width="50" align="center" valign="middle">:</td>
        <td height="35" width="200" align="left" valign="middle"><input type="text" name="des" id="des" class="rounded" value="<?php if(isset($_REQUEST['edit'])){ echo  $fpro['des'];}?>"/></td>
        </tr>
        <tr>
        <td height="35" width="200" align="left" valign="middle" class="master">Product Image:</td>
        <td height="35" width="50" align="center" valign="middle">:</td>
        <td height="35" width="200" align="left" valign="middle">
        <?php if(isset($_REQUEST['edit'])){?>
        <img src="../upcoming/<?php echo $fpro['image'] ;?>" height="120" width="150">
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
        <td height="40" colspan="2" align="center" valign="middle"  style="font-family:Verdana, Geneva, sans-serif; font-size:22px; border-bottom:#3B7F95 1px solid;">Upcoming Products</td>
        <td height="40" align="center" valign="middle"  style="font-family:Verdana, Geneva, sans-serif; font-size:22px;border-bottom:#3B7F95 1px solid;"><a href="upcoming.php?action=new"><img src="img/add_new.png" title="add new product"></a></td>
        </tr>
      <tr>
        <td width="140" height="35" align="center" valign="middle" class="master" style="border-bottom:#3B7F95 1px solid; font-weight:bold;">Model</td>
        <td width="140" height="35" align="center" valign="middle" class="master" style="border-bottom:#3B7F95 1px solid; font-weight:bold;">Image</td>
        <td width="140" height="35" align="center" valign="middle" class="master" style="border-bottom:#3B7F95 1px solid; font-weight:bold;">Action</td>
      </tr>
      <tr>
        <td height="10" colspan="3" align="center" valign="middle"></td>
        </tr>
      <?php 
	  $f_pro= mysql_query("select * from upcoming_products");
	  while($pro= mysql_fetch_array($f_pro)){
	  
	  ?>
      <tr>
        <td width="140" align="center" valign="middle" class="master" style="border-bottom:#3B7F95 1px solid;"><?php echo $pro['des'] ;?></td>
        <td width="140" align="center" valign="middle" class="master" style="border-bottom:#3B7F95 1px solid;"><img src="../upcoming/<?php echo $pro['image'] ;?>" height="50" width="100"></td>
        <td width="140" align="center" valign="middle" class="master" style="border-bottom:#3B7F95 1px solid;"><a href="upcoming.php?action=new&edit=<?php echo $pro['id'] ;?>"><img src="img/edit_icon.png"></a>|<a href="upcoming.php?action=del&id=<?php echo $pro['id'] ;?>"><img src="img/del_icon.png"></a></td>
      </tr>
       <tr>
        <td height="10" colspan="3" align="center" valign="middle"></td>
        </tr>
      <?php }?>
      </table>

</form>
<?php }?>
</div>
</body>
</html>