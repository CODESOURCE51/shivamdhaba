<?php

require("connection.php"); 


$q = strtolower($_GET["q"]);
if (!$q) return;

$sql = "select DISTINCT c_id as client from `pkg_assign` where c_id LIKE '%$q%' and DATEDIFF(to_date,CURDATE())<= 7";
$rsd = mysql_query($sql);
while($rs = mysql_fetch_array($rsd)) {
		
	$client = $rs['client'];
	echo "$client\n";
	
}
?>
