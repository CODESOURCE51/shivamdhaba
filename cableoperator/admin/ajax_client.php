<?php 
require("connection.php"); 
if(empty($_SESSION['user'])) 
{ 

header("Location: index.php"); 
die("Redirecting to index.php");
 
} 




if(isset($_POST['c_id']))//If a username has been submitted 

{



$c_id = mysql_real_escape_string($_POST['c_id']);


if($c_id!=''){
	
			$Clinm= mysql_fetch_array(mysql_query("select box_no from client_entry where c_id = '".$_POST['c_id']."'"));
	
			$box= $Clinm['box_no'];
			
			 echo '1';
			 echo $box;

		}

			else 

        { 

         	echo '0';

        } 

	}







?>