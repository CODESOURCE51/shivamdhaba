<?php

require("connection.php"); 


$q = strtolower($_GET["q"]);
if (!$q) return;

$sql = "select DISTINCT c_id as client from client_entry where c_id LIKE '%$q%'";
$rsd = mysql_query($sql);
while($rs = mysql_fetch_array($rsd)) {
	$client = $rs['client'];
	echo "$client\n";
}

?>
