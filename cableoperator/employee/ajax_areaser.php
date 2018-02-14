<?php 
require("connection.php"); 
if(empty($_SESSION['user'])) 
{ 

header("Location: index.php"); 
die("Redirecting to index.php");
 
} 
?>
<!-----------------------------Two drops-------------------->

<!-----------------------------Two drops-------------------->


                <select name="area" id="area" class="rounded" onChange="getcust(this.value)">
                <option value="">Select area</option>
                 <?php
                 $sql=mysql_query("select * from location where zone='".$_REQUEST['id']."'");
                 while($row = mysql_fetch_array($sql))
                  {
                  ?>
                <option value="<?php echo $row['area']; ?>"><?php echo $row['area']; ?></option>
                <?php } ?> 
                </select>
                