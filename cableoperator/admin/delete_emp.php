<?php 

    require("connection.php"); 
     

    if(empty($_SESSION['user'])) 
    { 

        header("Location: index.php"); 

        die("Redirecting to index.php"); 
    } 
	
	
$del=mysql_query("delete from `emp_login` where id='".$_REQUEST['id']."'");	
     
echo "<script> window.location= 'edit_emp.php?delete'; </script>";
?>