<?php 


    require("../include/connection.php"); 
     


    if(empty($_SESSION['user'])) 
    { 

        header("Location: index.php"); 

        die("Redirecting to index.php"); 
    } 
	
     


if(isset($_REQUEST['mode']) && $_REQUEST['mode']=='sub_cat'){

$query_update= "insert into `sub_category` SET 
            `cat_id`='".$_REQUEST['cat_id']."',
			`sname`='".$_REQUEST['sname']."'";
 $qu_up= mysql_query($query_update) or die(mysql_error());	

echo "<script type='text/javascript'> window.location= 'add_sub.php?success'; </script>";
}

if(isset($_REQUEST['mode']) && $_REQUEST['mode']=='edit_cat'){

$query_update= "UPDATE `sub_category` SET 
            `cat_id`='".$_REQUEST['cat_id']."',
			`sname`='".$_REQUEST['sname']."' where id='".$_REQUEST['id']."'";
			
 $qu_up= mysql_query($query_update) or die(mysql_error());	

echo "<script type='text/javascript'> window.location= 'add_sub.php?updated'; </script>";
}

if(isset($_REQUEST['action']) && $_REQUEST['action']=='del'){
	
$query= mysql_num_rows(mysql_query("select * from product where subcat_id= '".$_REQUEST['id']."' "));	

if($query > 0)	{

echo "<script type='text/javascript'> window.location= 'add_sub.php?error'; </script>";
	
}else{
	
$query_exi=mysql_query("delete from `sub_category` where id='".$_REQUEST['id']."'");
echo "<script type='text/javascript'> window.location= 'add_sub.php?deleted'; </script>";

}
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
    

	$("#change_password").validate({
		rules: {
			cat_id: {
				required: true
			},
			sname: {

              required: true

            }
			
		 
		}, //end rules
		messages: {
			
			cat_id: {
				required: "<br /> <font color='red'>Required.</font>"
			
			},
			sname: {
				required: "<br /> <font color='red'>Required.</font>"
			
			}
			
		} //end messages
		
	}); //end validate
  });
</script>
<!----------------------validation----------------------------->
<script>

function getpg(d)
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

        
    document.getElementById("getpg").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("POST","page_get.php?d="+d,true);
xmlhttp.send();
}
</script>

</head>
<body>
<?php include "header.php" ?>
<div id="siteWrapper">


<?php if(isset($_REQUEST['updated'])) { echo "<div style='color:#090;font-size:16px;'>Thanks! Record updated successfully.</div>"; } ?>


<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="dis_set" id="dis_set" enctype="multipart/form-data" >
  
    <input type="hidden" name="mode" id="mode" value="sub_cat">
    
    <table width="450" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="40" colspan="3" align="center" valign="middle"  style="font-family:Verdana, Geneva, sans-serif; font-size:22px;">Product Dispaly Arrangemnet</td>
        </tr>
       <tr>
        <td width="137" height="35" align="left" valign="middle" class="master">Display By:</td>
        <td width="21" height="35" align="center" valign="middle">:</td>
        <td width="292" height="35" align="left" valign="middle" class="error">
        <select name="orderby" id="orderby" onchange="getpg(this.value);">
        <option value="id">Subcategory Added</option>
        <option value="name">Subcategory Name</option>
        <option value="date">Subcategory Modified</option>
        </select>
        
       </td>
        </tr>
      <tr>
        <td height="35" align="left" valign="middle" class="master">Order By:</td>
        <td height="35" align="center" valign="middle">:</td>
        <td height="35" align="left" valign="middle" id="getpg">
        
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
    

</div>
</body>
</html>