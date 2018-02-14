<?php
require("../../connection.php");

$code=$_REQUEST['code'];
$pkgAssign= mysql_query("select * from `pkg_assign` where track_code='".$code."'");
$FetchPackage= mysql_fetch_array($pkgAssign);
$FetchClient= mysql_fetch_array(mysql_query("select * from `client_entry` where c_id='".$FetchPackage['c_id']."'"));
$FetchPackNm= mysql_fetch_array(mysql_query("select * from `package` where pkg_name='".$FetchPackage['pkg_name']."'"));
$FetchPackPy= mysql_fetch_array(mysql_query("select * from `pkg_payment` where track_code='".$code."'"));

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

<table width="596" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2" width="596" height="30" align="center" valign="middle" class="transfer" style="border-bottom:solid #000 1px; border-top:solid #000 1px;">Bill Details of '.$FetchClient['c_name'].'</td>
  </tr>
  <tr>
      <td width="298" height="30" align="left" valign="middle" class="grey heading">Client Name: '.$FetchClient['c_name'].'</td>
      <td width="298" height="30" align="left" valign="middle" class="grey heading">Package Name: '.$FetchPackage['pkg_name'].'</td>
    </tr>
        <tr>
          <td width="298" height="30" align="left" valign="middle" class="grey heading">ClientId: '.$FetchClient['c_id'].'</td>
          <td width="298" height="30" align="left" valign="middle" class="grey heading">Form Date: '.$FetchPackage['from_date'].'</td>
        </tr>
        <tr>
          <td width="298" height="30" align="left" valign="middle" class="grey heading">Email: '.$FetchClient['email'].'</td>
          <td width="298" height="30" align="left" valign="middle" class="grey heading">To Date: '.$FetchPackage['to_date'].'</td>
        </tr>
        <tr>
          <td width="298" height="30" align="left" valign="middle" class="grey heading">Contact No.: '.$FetchClient['phone'].'</td>
          <td width="298" height="30" align="left" valign="middle" class="grey heading">Location: '.$FetchClient['area'].'-'.$FetchClient['zone'].'</td>
        </tr>
        <tr>
          <td height="30" colspan="2" align="left" valign="middle" width="596">&nbsp;</td>
        </tr>
		<tr>
    <td colspan="2" width="596" height="30" align="center" valign="middle" class="transfer">
	Normal Channel Charges
	</td></tr>
  <tr>
    <td colspan="2" width="596" >
    <table width="596" border="0" cellspacing="0" cellpadding="0" align="center" class="table_border">
    
      <tr>
                  <td width="85" height="30" align="left" valign="middle" class="grey heading" style="border-top:solid #000 1px;">Channel Cost</td>
                  <td width="85" height="30" align="left" valign="middle" class="grey heading" style="border-top:solid #000 1px;">Service Tax</td>
                  <td width="85" height="30" align="left" valign="middle" class="grey heading" style="border-top:solid #000 1px;">Tax Amount</td>
                  <td width="85" height="30" align="left" valign="middle" class="grey heading" style="border-top:solid #000 1px;">Service Charge</td>
                  <td width="85" height="30" align="left" valign="middle" class="grey heading" style="border-top:solid #000 1px;">Deduction</td>
                  <td width="85" height="30" align="left" valign="middle" class="grey heading" style="border-top:solid #000 1px;">Late Fine</td>
                  <td width="86" height="30" align="left" valign="middle" class="grey heading" style="border-top:solid #000 1px;">Total</td>
                </tr>
				';
     		

				
   $html .=  '<tr>
                    <td width="85" height="30" align="left" valign="middle" class="white result">'. $FetchPackNm['all_ch'].'</td>
                    <td width="85" height="30" align="left" valign="middle" class="white result">'.$FetchPackNm['service_tax'].'</td>
                    <td width="85" height="30" align="left" valign="middle" class="white result">'.$FetchPackNm['tax_amount'].'</td>
                    <td width="85" height="30" align="left" valign="middle" class="white result">'.$FetchPackNm['service_chrg'].'</td>
                    <td width="85" height="30" align="left" valign="middle" class="white result">'.$FetchPackPy['ded_amt'].'</td>
                    <td width="85" height="30" align="left" valign="middle" class="white result">'.$FetchPackPy['late_fine'].'</td>
                    <td width="85" height="30" align="left" valign="middle" class="white result">'.round($FetchPackPy['tot_payed'], 2).'</td>
                 
                </tr>';
       
       $html .=  '
      <tr>
                  <td colspan="7" width="596" height="8"></td>
                </tr>
                </table></td>
  </tr>';
			
			
			
			
				  
		
		$html .=  '
		<tr>
    <td colspan="2" width="596" height="30" align="center" valign="middle" class="transfer">
	Addon Channel(s) Charges
	</td></tr>
		<tr><td width="596" colspan="2">
                <table width="596" border="0" cellspacing="0" cellpadding="0" align="center" class="table_border">
                <tr>
                  <td width="68" height="30" align="left" valign="middle" class="grey heading" style="border-top:solid #000 1px;">Addon Chnl</td>
                  <td width="66" height="30" align="left" valign="middle" class="grey heading" style="border-top:solid #000 1px;">Form Date</td>
                  <td width="66" height="30" align="left" valign="middle" class="grey heading" style="border-top:solid #000 1px;">To Date</td>
                  <td width="66" height="30" align="left" valign="middle" class="grey heading" style="border-top:solid #000 1px;">Price</td>
                  <td width="66" height="30" align="left" valign="middle" class="grey heading" style="border-top:solid #000 1px;">Service Tax</td>
                  <td width="66" height="30" align="left" valign="middle" class="grey heading" style="border-top:solid #000 1px;">Tax Amount</td>
                  <td width="66" height="30" align="left" valign="middle" class="grey heading" style="border-top:solid #000 1px;">Amount/day</td>
                  <td width="66" height="30" align="left" valign="middle" class="grey heading" style="border-top:solid #000 1px;">Days</td>
                  <td width="66" align="left" valign="middle" class="grey heading" style="border-top:solid #000 1px;">Total Charges</td>
                </tr>';	
				$query_2= mysql_fetch_array(mysql_query("SELECT SUM(total_amount) as total_amount FROM `addons_payment` WHERE `track_code`='".$code."'"));
				$grand_total=$FetchPackPy['tot_payed']+$query_2['total_amount'];
				$AddonAssign= mysql_query("select * from `addons_payment` where track_code='".$code."'");
				if(mysql_num_rows($AddonAssign) > 0){
				while($FetchAddons= mysql_fetch_array($AddonAssign)){
					$Addons= mysql_fetch_array(mysql_query("select * from `addons_channels` where id='".$FetchAddons['addons_id']."'"));
				
				
				
		$html .='<tr>
                    <td width="68" height="30" align="left" valign="middle" class="white result">'.$Addons['channel_name'].'</td>
                    <td width="66" height="30" align="left" valign="middle" class="white result">'.$FetchAddons['pay_date'].'</td>
                    <td width="66" height="30" align="left" valign="middle" class="white result">'.$FetchAddons['to_date'].'</td>
                    <td width="66" height="30" align="left" valign="middle" class="white result">'.$Addons['price'].'</td>
                    <td width="66" height="30" align="left" valign="middle" class="white result">'.$Addons['serv_tax'].'</td>
                    <td width="66" height="30" align="left" valign="middle" class="white result">'.$Addons['tax_amt'].'</td>
                    <td width="66" height="30" align="left" valign="middle" class="white result">'.$Addons['total_amt'].'</td>
                    <td width="66" height="30" align="left" valign="middle" class="white result">'.$FetchAddons['duartion'].'</td>
                    <td width="66" height="30" align="left" valign="middle" class="white result">'.$FetchAddons['total_amount'].'</td>
                 
                </tr>';
				}}else{
    $html .=  '<tr>
                  <td colspan="9" width="596">No Records Found</td>
                </tr>';
				}
			$html .=  '</table></td>
  </tr>
    
    <tr>
    
    <td colspan="2" height="20" align="right" class="grey heading" width="596" style="padding-right:25px; font-size:14px;">Net Total:  '.round($grand_total, 2).'</td>
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