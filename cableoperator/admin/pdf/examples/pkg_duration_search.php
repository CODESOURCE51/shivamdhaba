<?php
require("../../connection.php");

$radios=$_REQUEST['radios'];
$fromdate= $_REQUEST['fromdate'];
$to_date= $_REQUEST['to_date'];
	


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

<table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="595" height="30" align="center" valign="middle" class="transfer" style="border-bottom:solid #000 2px; border-top:solid #000 2px;">Pakage listed from '.$fromdate.' to '.$to_date.'</td>
  </tr>
  
  <tr>
    <td align="center" valign="top"><table width="900" border="0" cellspacing="0" cellpadding="0" align="center" class="table_border">
      <tr>
                  <td width="85" height="30" align="left" valign="middle" class="grey heading">Client Name</td>
                  <td width="80" height="30" align="left" valign="middle" class="grey heading">ClientId</td>
                  <td width="80" align="left" valign="middle" class="grey heading">Box No.</td>
                  <td width="80" height="30" align="left" valign="middle" class="grey heading">From Date</td>
                  <td width="80" height="30" align="left" valign="middle" class="grey heading">To date</td>
                  <td width="80" height="30" align="left" valign="middle" class="grey heading">Package Amount</td>
                  <td width="80" height="30" align="left" valign="middle" class="grey heading">Addons Amount</td>
                  <td width="60" height="30" align="left" valign="middle" class="grey heading">Total</td>
                  <!--<td width="94" align="left" bgcolor="#fff1ab" class="drive">Delete</td>-->
                </tr>
				';
     		
$sql5 = "SELECT * from `pkg_assign` where `pkg_duration`='$radios' and `activ_status`=1 and `from_date` between '$fromdate' and '$to_date'";
$rs5 = mysql_query($sql5);
$pkgRow= mysql_num_rows($rs5);
if($pkgRow > 0){
		  while ($row= mysql_fetch_array($rs5)) {  
		  $cus_id=$row['c_id'];
		  $track_code=$row['track_code']; 
		  
$sql55 = "SELECT * from `client_entry` Where `c_id`='$cus_id'";
$rs55 = mysql_query($sql55);
$row55 = mysql_fetch_array($rs55);
$c_name = $row55['c_name'];

$sql66 = "SELECT * from `pkg_payment` Where `track_code`='$track_code'";
$rs66 = mysql_query($sql66);
$row66 = mysql_fetch_array($rs66);
$tot_payed = $row66['tot_payed'];

$query_2= "SELECT SUM(total_amount) as total_amount FROM `addons_payment` WHERE `track_code`='$track_code'";
$result_2= mysql_query($query_2) or die(mysql_error());
$row_2= mysql_fetch_array($result_2);
$total_amount= $row_2['total_amount'];

$grand_total=$tot_payed+$total_amount;
$net_bill_amount[]= round($grand_total);
				
   $html .=  '<tr>
                    <td height="30" align="left" valign="middle" class="white result">'. $c_name.'</td>
                    <td height="30" align="left" valign="middle" class="white result">'.$row['c_id'].'</td>
                    <td height="30" align="left" valign="middle" class="white result">'.$row55['box_no'].'</td>
                    <td height="30" align="left" valign="middle" class="white result">'.$row['from_date'].'</td>
                    <td height="30" align="left" valign="middle" class="white result">'.$row['to_date'].'</td>
                    <td height="30" align="left" valign="middle" class="white result">'.round($tot_payed).'</td>
                    <td height="30" align="left" valign="middle" class="white result">'.round($total_amount).'</td>
                    <td height="30" align="left" valign="middle" class="white result">'.round($grand_total).'</td>
                 
                </tr>';
        }
       $html .=  '
      <tr>
                  <td height="20" class="white result">&nbsp;</td>
				  <td height="20" class="white result">&nbsp;</td>
                  <td height="20" class="white result">&nbsp;</td>
                  <td height="20" class="white result">&nbsp;</td>
                  <td height="20" class="white result">&nbsp;</td>
                  <td height="20" class="white result">&nbsp;</td>
                  <td height="20" align="left" class="grey heading">Net Total</td>
                  <td height="20" align="left" class="white result">'.array_sum($net_bill_amount).'</td>
                  </tr>';
				  
		}else{
		$html .=  '<tr>
                  <td colspan="8">No Records Found</td>
                </tr>';	
		}
       
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