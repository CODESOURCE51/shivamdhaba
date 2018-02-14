<?php 
require("connection.php"); 
if(empty($_SESSION['user'])) 
{ 

header("Location: index.php"); 
die("Redirecting to index.php");
 
} 
?>


                <select name="c_id" id="c_id" class="rounded">
                <option value="">Select Client</option>
                 <?php
                 $sql=mysql_query("select * from client_entry where area='".$_REQUEST['id']."'");
                 while($row = mysql_fetch_array($sql))
                  {
                  ?>
                <option value="<?php echo $row['c_id']; ?>"><?php echo $row['c_name']."|".$row['c_id']; ?></option>
                <?php } ?> 
                </select>
                