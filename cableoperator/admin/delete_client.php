<?php 

    require("connection.php"); 
     

    if(empty($_SESSION['user'])) 
    { 

        header("Location: index.php"); 

        die("Redirecting to index.php"); 
    } 
	
	
$del=mysql_query("delete from `client_entry` where id='".$_REQUEST['id']."'");	
     
echo "<script> window.location= 'all_client.php?delete'; </script>";
?>