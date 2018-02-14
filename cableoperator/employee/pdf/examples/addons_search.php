<?php
require("../../connection.php");

$fromdate=$_REQUEST['fromdate'];
$todate=$_REQUEST['todate'];

$sql5 = "SELECT * from `addons_payment` where `pay_date` between '$fromdate' and '$todate'";
$rs5 = mysql_query($sql5);	


$html = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">
<html>
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.school_name {
font-size:18px;
font-weight:bold;
color:#990000;
}
.school_add {
font-size:16px;
font-weight:bold;
color:#000000;
padding-top:15px;
}
.subheading {
font-size:11px;
font-weight:lighter;
color:#666666;
}
.transfer {
font-size:14px;
font-weight:bold;
color:#000000;
}
.table_border {
font-size:14px;
color:#333;
font-weight:bold;
letter-spacing:0.5px;
border:solid #999 2px;

}
.grey {border-bottom:solid #999 2px;
border-right:solid #999 2px;
background:#EFEFEF;
padding-left:2px;
}

.white {border-bottom:solid #999 2px;
border-right:solid #999 2px;
background:#FFFFFF;
padding-left:2px;
}
.heading {
font-size:11px;
font-weight:bold;
color:#990000;
}
.result {
font-size:10px;
font-weight:700;
color:#003333;
}
</style>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Search Report</title>



</head>

<body>

<table width="595" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="595" height="30" align="center" valign="middle" class="transfer" style="border-bottom:solid #000 2px; border-top:solid #000 2px;">Addons list from '.$fromdate.' to '.$todate.'</td>
  </tr>
  <tr>
    <td align="center" valign="top"><table width="595" border="0" cellspacing="0" cellpadding="0" align="center" class="table_border">
      <tr>
        <td width="69" height="20" align="left" valign="middle" class="grey heading">Customer Name</td>
        <td width="100" height="20" align="left" valign="middle" class="grey heading">Customer Id</td>
        <td width="100" align="left" valign="middle" class="grey heading">Box No.</td>
        <td width="118" height="20" align="left" valign="middle" class="grey heading">From Date</td>
        <td width="108" height="20" align="left" valign="middle" class="grey heading">To Date</td>
        <td width="100" height="20" align="left" valign="middle" class="grey heading">Amount</td>
      </tr>';
     		
	  				 while ($row= mysql_fetch_array($rs5)) {  
		  $cus_id=$row['c_id'];
		  $total_amount=round($row['total_amount']); 
		  
$sql55 = "SELECT * from `client_entry` Where `c_id`='$cus_id'";
$rs55 = mysql_query($sql55);
$row55 = mysql_fetch_array($rs55);
$c_name = $row55['c_name'];

$net_bill_amount[]= round($total_amount);
				
   $html .=  '<tr>
        <td height="20" align="left" valign="middle" class="white result">'.$c_name.'</td>
        <td height="20" align="left" valign="middle" class="white result">'.$row['c_id'].'</td>
        <td height="20" align="left" valign="middle" class="white result">'.$row55['box_no'].'</td>
        <td height="20" align="left" valign="middle" class="white result">'.$row['pay_date'].'</td>
        <td height="20" align="left" valign="middle" class="white result">'.$row['to_date'].'</td>
        <td height="20" align="left" valign="middle" class="white result">'.$total_amount.'</td>
      </tr>';
        }
       
  $html .=  '<tr>
        <td height="20" align="left" valign="middle" class="white result">&nbsp;</td>
        <td height="20" align="left" valign="middle" class="white result">&nbsp;</td>
        <td height="20" align="left" valign="middle" class="white result">&nbsp;</td>
        <td height="20" align="left" valign="middle" class="white result">&nbsp;</td>
        <td height="20" align="left" valign="middle" class="grey heading">Net Amount</td>
        <td height="20" align="left" valign="middle" class="white result">'.array_sum($net_bill_amount).'</td>
      </tr>';
    $html .=  '</table></td>
  </tr>
  <tr>
    <td></td>
  </tr>
</table>
</body>
</html>';
require_once(dirname(__FILE__).'/../html2pdf.class.php');
    $html2pdf = new HTML2PDF('P','A4','fr');
	$html2pdf->pdf->SetDisplayMode('fullpage');
	
	 //$html2pdf->SetFont('times', 'BI', 20, '', 'false');
    $html2pdf->WriteHTML($html);
    $html2pdf->Output('exemple.pdf');
	
?>