<?php 
require("connection.php"); 
if(empty($_SESSION['user'])) 
{ 

header("Location: index.php"); 
die("Redirecting to index.php");
 
} 
$user=$_SESSION['user']['username'];

?>
<?php
$id=$_REQUEST['id'];

$sql=mysql_query("select * from `job_info` where `id`='$id'") or die(mysql_error());
$row=mysql_fetch_array($sql);
$operating_person_code= $row['operating_person_code'];

$query="SELECT * FROM `operation_details` where `per_code`='$operating_person_code'";
$result=mysql_query($query) or die(mysql_error());
$row1 = mysql_fetch_array($result);
$email= $row1['email'];
							
$to = $email;
$subject = "Job Information";
$message = '<table width="650" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #CCC;">
  <tr>
    <td height="40" colspan="3" align="center" bgcolor="#fff1ab">JOB</td>
  </tr>
  <tr>
    <td height="40" colspan="3" align="center" class="job_txt"><a href="http://orliv.net/marketing/projects/'.$row['project_up'].'" target="_blank">Click Here</a></td>
  </tr>
  <tr>
    <td width="255" height="40" align="left" class="job_txt">Visited Date</td>
    <td width="69" align="center">:</td>
    <td width="320" height="40" align="left" class="error">'.$row['visited_date'].'</td>
  </tr>
  <tr>
    <td height="40" align="left" class="job_txt">Customer Name</td>
    <td align="center">:</td>
    <td height="40" align="left" class="error">'.$row['cust_code'].'</td>
  </tr>
  <tr>
    <td height="40" align="left" class="job_txt">Visited By</td>
    <td align="center">:</td>
    <td height="40" align="left" class="error">'.$row['visited_by'].'</td>
  </tr>
  <tr>
    <td height="40" align="left" class="job_txt">Job Type</td>
    <td align="center">:</td>
    <td height="40" align="left" class="error">'.$row['job_type'].'</td>
  </tr>
  <tr>
    <td height="40" align="left" class="job_txt">Next Visited Date</td>
    <td align="center">:</td>
    <td height="40" align="left" class="error">'.$row['next_date'].'</td>
  </tr>
  <tr>
    <td height="40" align="left" class="job_txt">BOQ/Quotation</td>
    <td align="center">:</td>
    <td height="40" align="left" class="error">'.$row['boq_quot'].'</td>
  </tr>
  <tr>
    <td height="40" align="left" class="job_txt">Quotation No</td>
    <td align="center">:</td>
    <td height="40" align="left" class="error">'.$row['boq_quot_no'].'</td>
  </tr>
  <tr>
    <td height="40" align="left" class="job_txt">Order Number</td>
    <td align="center">:</td>
    <td height="40" align="left" class="error">'.$row['order_no'].'</td>
  </tr>
  <tr>
    <td height="40" align="left" class="job_txt">Order Date</td>
    <td align="center">:</td>
    <td height="40" align="left" class="error">'.$row['order_date'].'</td>
  </tr>
  <tr>
    <td height="40" align="left" class="job_txt">PO No</td>
    <td align="center">:</td>
    <td height="40" align="left" class="error">'.$row['po_no'].'</td>
  </tr>
  
  <tr>
    <td height="40" align="left" class="job_txt">Project Cost</td>
    <td align="center">:</td>
    <td height="40" align="left" class="error">'.$row['cost'].'</td>
  </tr>
  <tr>
    <td height="40" align="left" class="job_txt">Completion Date</td>
    <td align="center">:</td>
    <td height="40" align="left" class="error">'.$row['completion_date'].'</td>
  </tr>
 
</table>';

    $headers = "From: info@orliv.net\r\nReply-To: info@orliv.net";
	$headers .= "\r\nMIME-Version: 1.0\r\nContent-Type: text/html; charset=iso-8859-1";
				
mail($to, $subject, $message, $headers);		

echo "<script> window.location= 'job_status.php?sent'; </script>";


ob_flush();
?>