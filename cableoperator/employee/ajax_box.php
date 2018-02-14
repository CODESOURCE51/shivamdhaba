<?php 
require("connection.php"); 
if(empty($_SESSION['user'])) 
{ 

header("Location: index.php"); 
die("Redirecting to index.php");
 
} 

			$Clinm= mysql_fetch_array(mysql_query("select box_no from client_entry where c_id = '".$_REQUEST['id']."'"));
			

?>
			<input type="text" name="box_no" id="box_no" class="rounded" style="width:190px; height:20px;" readonly="readonly" value="<?php echo $Clinm['box_no']; ?>" />