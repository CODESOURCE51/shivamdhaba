<?php 
require("connection.php"); 
if(empty($_SESSION['user'])) 
{ 

header("Location: index.php"); 
die("Redirecting to index.php");
 
} 



?>

                <select name="pkg_m" id="pkg_m" class="rounded" required="required">
                <option value="">Select Package Mode</option>
                 <?php
                 $sql = "SELECT DISTINCT pkg_mode from `package` where pkg='".$_REQUEST['id']."'";
                 $rs = mysql_query($sql);
                 while($rowP = mysql_fetch_array($rs))
                  {
                  ?>
                <option value="<?php echo $rowP['pkg_mode']; ?>"><?php echo $rowP['pkg_mode']; ?></option>
                <?php } ?> 
                </select>