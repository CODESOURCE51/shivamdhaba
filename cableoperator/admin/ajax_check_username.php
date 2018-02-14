<?php

    require("connection.php");

     if(empty($_SESSION['user'])) 
    { 

        header("Location: index.php"); 

        die("Redirecting to index.php"); 
    } 
     

//Include The Database Connection File 

if(isset($_POST['username']))//If a username has been submitted 
{
$username = mysql_real_escape_string($_POST['username']);//Some clean up :)

$check_for_username = mysql_query("SELECT username FROM emp_login WHERE username='$username'");
//Query to check if username is available or not 

if(mysql_num_rows($check_for_username))
{
echo '1';//If there is a  record match in the Database - Not Available
}
else
{
echo '0';//No Record Found - Username is available 
}

}

?>