<?php
require("../../connection.php");

$code=$_REQUEST['code'];
$rand= rand(1000,9999);
$pkgAssign= mysql_query("select * from `pkg_assign` where track_code='".$code."'");
$FetchPackage= mysql_fetch_array($pkgAssign);
$FetchClient= mysql_fetch_array(mysql_query("select * from `client_entry` where c_id='".$FetchPackage['c_id']."'"));
$FetchPackNm= mysql_fetch_array(mysql_query("select * from `package` where pkg_name='".$FetchPackage['pkg_name']."'"));
$FetchPackPy= mysql_fetch_array(mysql_query("select * from `pkg_payment` where track_code='".$code."'"));

function singledigit($number){
        switch($number){
            case 0:$word = "Zero";break;
            case 1:$word = "One";break;
            case 2:$word = "Two";break;
            case 3:$word = "Three";break;
            case 4:$word = "Four";break;
            case 5:$word = "Five";break;
            case 6:$word = "Six";break;
            case 7:$word = "Seven";break;
            case 8:$word = "Eight";break;
            case 9:$word = "Nine";break;
        }
        return $word;
    }

    function doubledigitnumber($number){
        if($number == 0){
            $word = "";
        }
        else{
            $word = singledigit($number);
        }       
        return $word;
    }

    function doubledigit($number){
        switch($number[0]){
            case 0:$word = doubledigitnumber($number[1]);break;
            case 1:
                switch($number[1]){
                    case 0:$word = "Ten";break;
                    case 1:$word = "Eleven";break;
                    case 2:$word = "Twelve";break;
                    case 3:$word = "Thirteen";break;
                    case 4:$word = "Fourteen";break;
                    case 5:$word = "Fifteen";break;
                    case 6:$word = "Sixteen";break;
                    case 7:$word = "Seventeen";break;
                    case 8:$word = "Eighteen";break;
                    case 9:$word = "Ninteen";break;
                }break;
            case 2:$word = "Twenty".doubledigitnumber($number[1]);break;                
            case 3:$word = "Thirty".doubledigitnumber($number[1]);break;
            case 4:$word = "Forty".doubledigitnumber($number[1]);break;
            case 5:$word = "Fifty".doubledigitnumber($number[1]);break;
            case 6:$word = "Sixty".doubledigitnumber($number[1]);break;
            case 7:$word = "Seventy".doubledigitnumber($number[1]);break;
            case 8:$word = "Eighty".doubledigitnumber($number[1]);break;
            case 9:$word = "Ninety".doubledigitnumber($number[1]);break;

        }
        return $word;
    }

    function unitdigit($numberlen,$number){
        switch($numberlen){         
            case 3:$word = "Hundred";break;
            case 4:$word = "Thousand";break;
            case 5:$word = "Thousand";break;
            case 6:$word = "Lakh";break;
            case 7:$word = "Lakh";break;
            case 8:$word = "Crore";break;
            case 9:$word = "Crore";break;

        }
        return $word;
    }

    function numberToWord($number){

        $numberlength = strlen($number);
        if ($numberlength == 1) { 
            return singledigit($number);
        }elseif ($numberlength == 2) {
            return doubledigit($number);
        }
        else {

            $word = "";
            $wordin = "";

            if($numberlength == 9){
                if($number[0] >0){
                    $unitdigit = unitdigit($numberlength,$number[0]);
                    $word = doubledigit($number[0].$number[1]) ." ".$unitdigit." ";
                    return $word." ".numberToWord(substr($number,2));
                }
                else{
                    return $word." ".numberToWord(substr($number,1));
                }
            }

            if($numberlength == 7){
                if($number[0] >0){
                    $unitdigit = unitdigit($numberlength,$number[0]);
                    $word = doubledigit($number[0].$number[1]) ." ".$unitdigit." ";
                    return $word." ".numberToWord(substr($number,2));
                }
                else{
                    return $word." ".numberToWord(substr($number,1));
                }

            }

            if($numberlength == 5){
                if($number[0] >0){
                    $unitdigit = unitdigit($numberlength,$number[0]);
                    $word = doubledigit($number[0].$number[1]) ." ".$unitdigit." ";
                    return $word." ".numberToWord(substr($number,2));
                }
                else{
                    return $word." ".numberToWord(substr($number,1));
                }


            }
            else{
                if($number[0] >0){
                    $unitdigit = unitdigit($numberlength,$number[0]);
                    $word = singledigit($number[0]) ." ".$unitdigit." ";
                }               
                return $word." ".numberToWord(substr($number,1));
            }
        }
    } 		

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
border:solid #999 1px;

}
.grey {border-bottom:solid #999 1px;
background:#EFEFEF;
padding-left:2px;
}

.white {
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

<table width="600" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
    <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
    <td width="600" height="15" colspan="4" align="center" valign="middle">Customer Copy</td>
   
    </tr>
    <tr>
    <td width="200" height="15" align="left" valign="middle">Invoice No:'.$FetchPackPy['invoice_no'].'</td>
    <td width="200" height="15" colspan="2" align="center" valign="middle" class="transfer">SATELLITE TV SYSTEMS</td>
    <td width="200" height="15" align="right" valign="middle">Service Tax No: AFRPK4615BST001</td>
    </tr>
  <tr>
    <td width="600" height="25" colspan="4" align="center" valign="middle" style="border-top:solid #000 1px;"><b>Name:</b>'.$FetchClient['c_name'].' &nbsp;|&nbsp;<b>Address:</b>'.$FetchClient['address'].'&nbsp;|&nbsp;<b>Box No:</b>'.$FetchClient['box_no'].'</td>
  </tr>
  <tr>
  	<td width="100" height="20" align="left" valign="middle">ClientId: '.$FetchClient['c_id'].'</td>	
      <td width="100" height="20" align="left" valign="middle">Contact No.: '.$FetchClient['phone'].'</td>
      <td width="250" height="20" align="left" valign="middle">Location: '.$FetchClient['area'].'-'.$FetchClient['zone'].'</td>
      <td width="150" height="20" align="left" valign="middle">Email: '.$FetchClient['email'].'</td>
    </tr>
       
		<tr>
    <td width="600" height="15" colspan="4" align="left" valign="middle" class="transfer" style="border-top:solid #999 1px;">
	Package Details
	</td></tr>
  <tr>
    <td width="600" colspan="4" >
    <table width="600" align="center">
    
      <tr>
      			<td width="135" height="15" align="center" valign="middle" class="grey heading">Package</td>
                  <td width="55" height="15" align="center" valign="middle" class="grey heading">Cost</td>
                  <td width="75" height="15" align="center" valign="middle" class="grey heading">form</td>
                  <td width="75" height="15" align="center" valign="middle" class="grey heading">To</td>
                  <td width="75" height="15" align="center" valign="middle" class="grey heading">Service Tax</td>
                  <td width="75" height="15" align="center" valign="middle" class="grey heading">Tax Amount</td>
                  <td width="55" height="15" align="center" valign="middle" class="grey heading">Service Charge</td>
                  <td width="55" height="15" align="center" valign="middle" class="grey heading">Total</td>
                </tr>
				';
     		

				
   $html .=  '<tr>
   					<td width="74" height="15" align="left" valign="middle" class="white result">'.$FetchPackage['pkg_name'].'</td>
                    <td width="74" height="15" align="center" valign="middle" class="white result">'.$FetchPackNm['all_ch'].'</td>
                    <td width="74" height="15" align="center" valign="middle" class="white result">'.$FetchPackage['from_date'].'</td>
                    <td width="74" height="15" align="center" valign="middle" class="white result">'.$FetchPackage['to_date'].'</td>
                    <td width="74" height="15" align="center" valign="middle" class="white result">'.$FetchPackNm['service_tax'].'</td>
                    <td width="74" height="15" align="center" valign="middle" class="white result">'.round($FetchPackNm['tax_amount']).'</td>
                    <td width="74" height="15" align="center" valign="middle" class="white result">'.$FetchPackNm['service_chrg'].'</td>
                    <td width="74" height="15" align="center" valign="middle" class="white result">'.round($FetchPackPy['tot_payed'], 2).'</td>
                 
                </tr>';
       
       $html .=  '
     
                </table></td>
  </tr>';
		$html .=  '
		<tr>
    <td width="600" height="15" colspan="4" align="left" valign="middle" class="transfer">
	Addon Details
	</td></tr>
		<tr><td width="600" colspan="4">
                <table width="600" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr>
                  <td width="68" height="15" align="left" valign="middle" class="grey heading">Addon Chnl</td>
                  <td width="66" height="15" align="left" valign="middle" class="grey heading">Form Date</td>
                  <td width="66" height="15" align="left" valign="middle" class="grey heading">To Date</td>
                  <td width="66" height="15" align="center" valign="middle" class="grey heading">Price</td>
                  <td width="66" height="15" align="center" valign="middle" class="grey heading">Service Tax</td>
                  <td width="66" height="15" align="center" valign="middle" class="grey heading">Tax Amount</td>
                  <td width="66" height="15" align="center" valign="middle" class="grey heading">Amount/day</td>
                  <td width="66" height="15" align="center" valign="middle" class="grey heading">Days</td>
                  <td width="66" align="center" valign="middle" class="grey heading">Total Charges</td>
                </tr>';	
				$query_2= mysql_fetch_array(mysql_query("SELECT SUM(total_amount) as total_amount FROM `addons_payment` WHERE `track_code`='".$code."'"));
				$grand_total= $FetchPackPy['tot_payed']+$query_2['total_amount'];
				$gt= round($grand_total, 2);
				$AddonAssign= mysql_query("select * from `addons_payment` where track_code='".$code."'");
				if(mysql_num_rows($AddonAssign) > 0){
				while($FetchAddons= mysql_fetch_array($AddonAssign)){
					$Addons= mysql_fetch_array(mysql_query("select * from `addons_channels` where id='".$FetchAddons['addons_id']."'"));
				
				
				
		$html .='<tr>
                    <td width="68" height="15" align="left" valign="middle" class="white result">'.$Addons['channel_name'].'</td>
                    <td width="66" height="15" align="left" valign="middle" class="white result">'.$FetchAddons['pay_date'].'</td>
                    <td width="66" height="15" align="left" valign="middle" class="white result">'.$FetchAddons['to_date'].'</td>
                    <td width="66" height="15" align="center" valign="middle" class="white result">'.$Addons['price'].'</td>
                    <td width="66" height="15" align="center" valign="middle" class="white result">'.$Addons['serv_tax'].'</td>
                    <td width="66" height="15" align="center" valign="middle" class="white result">'.$Addons['tax_amt'].'</td>
                    <td width="66" height="15" align="center" valign="middle" class="white result">'.$Addons['total_amt'].'</td>
                    <td width="66" height="15" align="center" valign="middle" class="white result">'.$FetchAddons['duartion'].'</td>
                    <td width="66" height="15" align="center" valign="middle" class="white result">'.$FetchAddons['total_amount'].'</td>
                 
                </tr>';
				}}else{
    $html .=  '<tr>
                  <td colspan="9" width="600">No Records Found</td>
                </tr>';
				}
			$html .=  '</table></td>
  </tr>
    
    <tr>
    
    <td width="600" height="15" colspan="4" align="right" style="padding-right:25px; font-size:14px; border-top:#999 1px; border-bottom:solid #000 1px;">Net Total:  '.round($grand_total, 2).'</td>
  </tr>
</table>
    </td>
  </tr>
  <tr>
    <td align="center">---------------------------------------------------------------------------------------------------------------------------------------------------
    </td>
  </tr>
  <tr>
    <td>
    <table align="center" width="600" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="198" height="18">No.:'.$rand.'</td>
    <td width="198" height="18" align="center"><u>MONEY RECEIPT</u></td>
    <td width="198" height="18" align="center">Date :'.date("d-m-Y").' </td>
  </tr>
  <tr>
    <td height="20" colspan="3" align="center">SATELLITE TV SYSTEMS</td>
  </tr>
  <tr>
    <td height="15" colspan="3" align="center" style="font-size:12px;">A-12/2, Purbasa, 160, Maniktala Main Road, Kolkata - 700 054  Phone : 2321 7713</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="20" colspan="3">Received with thanks from Mr./Mrs. : '.$FetchClient['c_name'].'</td>
  </tr>
  <tr>
    <td height="20" colspan="3">the sum of Rupees:  '.$wordnum = numberToWord($_REQUEST['gt']).'</td>
  </tr>
  <tr>
    <td height="20" colspan="3">for CATV, Broad Band Service / Monthly Subscription / Instalation charge etc.</td>
  </tr>
  <tr>
    <td height="20" align="left"> <div style="border:#000000 1px; width:100px;">Rs: '.round($grand_total, 2).'/-</div></td>
    <td height="20">&nbsp;</td>
    <td height="20" align="center">for <b>SATELLITE TV SYSTEMS</b></td>
  </tr>
</table>
    </td>
  </tr>
 <tr>
    <td align="center"><img src="../../image/cut.png">---------------------------------------------------------------------------------------------------------------------------------------------------
	
    </td>
  </tr>
  <tr>
    <td>
    <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
    <td width="600" height="15" colspan="4" align="center" valign="middle">Office Copy</td>
   
    </tr>
    <tr>
    <td width="200" height="15" align="left" valign="middle">Invoice No:'.$FetchPackPy['invoice_no'].'</td>
    <td width="200" height="15" colspan="2" align="center" valign="middle" class="transfer">SATELLITE TV SYSTEMS</td>
    <td width="200" height="15" align="right" valign="middle">Service Tax No: AFRPK4615BST001</td>
    </tr>
  <tr>
    <td width="600" height="25" colspan="4" align="center" valign="middle" style="border-top:solid #000 1px;"><b>Name:</b>'.$FetchClient['c_name'].' &nbsp;|&nbsp;<b>Address:</b>'.$FetchClient['address'].'&nbsp;|&nbsp;<b>Box No:</b>'.$FetchClient['box_no'].'</td>
  </tr>
  <tr>
  	<td width="100" height="20" align="left" valign="middle">ClientId: '.$FetchClient['c_id'].'</td>	
      <td width="100" height="20" align="left" valign="middle">Contact No.: '.$FetchClient['phone'].'</td>
      <td width="250" height="20" align="left" valign="middle">Location: '.$FetchClient['area'].'-'.$FetchClient['zone'].'</td>
      <td width="150" height="20" align="left" valign="middle">Email: '.$FetchClient['email'].'</td>
    </tr>
       
		<tr>
    <td width="600" height="15" colspan="4" align="left" valign="middle" class="transfer" style="border-top:solid #999 1px;">
	Package Details
	</td></tr>
  <tr>
    <td width="600" colspan="4" >
    <table width="600" align="center">
    
      <tr>
      			<td width="135" height="15" align="center" valign="middle" class="grey heading">Package</td>
                  <td width="55" height="15" align="center" valign="middle" class="grey heading">Cost</td>
                  <td width="75" height="15" align="center" valign="middle" class="grey heading">form</td>
                  <td width="75" height="15" align="center" valign="middle" class="grey heading">To</td>
                  <td width="75" height="15" align="center" valign="middle" class="grey heading">Service Tax</td>
                  <td width="75" height="15" align="center" valign="middle" class="grey heading">Tax Amount</td>
                  <td width="55" height="15" align="center" valign="middle" class="grey heading">Service Charge</td>
                  <td width="55" height="15" align="center" valign="middle" class="grey heading">Total</td>
                </tr>
				';
     		

				
   $html .=  '<tr>
   					<td width="74" height="15" align="left" valign="middle" class="white result">'.$FetchPackage['pkg_name'].'</td>
                    <td width="74" height="15" align="center" valign="middle" class="white result">'.$FetchPackNm['all_ch'].'</td>
                    <td width="74" height="15" align="center" valign="middle" class="white result">'.$FetchPackage['from_date'].'</td>
                    <td width="74" height="15" align="center" valign="middle" class="white result">'.$FetchPackage['to_date'].'</td>
                    <td width="74" height="15" align="center" valign="middle" class="white result">'.$FetchPackNm['service_tax'].'</td>
                    <td width="74" height="15" align="center" valign="middle" class="white result">'.round($FetchPackNm['tax_amount']).'</td>
                    <td width="74" height="15" align="center" valign="middle" class="white result">'.$FetchPackNm['service_chrg'].'</td>
                    <td width="74" height="15" align="center" valign="middle" class="white result">'.round($FetchPackPy['tot_payed'], 2).'</td>
                 
                </tr>';
       
       $html .=  '
     
                </table></td>
  </tr>';
		$html .=  '
		<tr>
    <td width="600" height="15" colspan="4" align="left" valign="middle" class="transfer">
	Addon Details
	</td></tr>
		<tr><td width="600" colspan="4">
                <table width="600" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr>
                  <td width="68" height="15" align="left" valign="middle" class="grey heading">Addon Chnl</td>
                  <td width="66" height="15" align="left" valign="middle" class="grey heading">Form Date</td>
                  <td width="66" height="15" align="left" valign="middle" class="grey heading">To Date</td>
                  <td width="66" height="15" align="center" valign="middle" class="grey heading">Price</td>
                  <td width="66" height="15" align="center" valign="middle" class="grey heading">Service Tax</td>
                  <td width="66" height="15" align="center" valign="middle" class="grey heading">Tax Amount</td>
                  <td width="66" height="15" align="center" valign="middle" class="grey heading">Amount/day</td>
                  <td width="66" height="15" align="center" valign="middle" class="grey heading">Days</td>
                  <td width="66" align="center" valign="middle" class="grey heading">Total Charges</td>
                </tr>';	
				$query_2= mysql_fetch_array(mysql_query("SELECT SUM(total_amount) as total_amount FROM `addons_payment` WHERE `track_code`='".$code."'"));
				$grand_total= $FetchPackPy['tot_payed']+$query_2['total_amount'];
				$gt= round($grand_total, 2);
				$AddonAssign= mysql_query("select * from `addons_payment` where track_code='".$code."'");
				if(mysql_num_rows($AddonAssign) > 0){
				while($FetchAddons= mysql_fetch_array($AddonAssign)){
					$Addons= mysql_fetch_array(mysql_query("select * from `addons_channels` where id='".$FetchAddons['addons_id']."'"));
				
				
				
		$html .='<tr>
                    <td width="68" height="15" align="left" valign="middle" class="white result">'.$Addons['channel_name'].'</td>
                    <td width="66" height="15" align="left" valign="middle" class="white result">'.$FetchAddons['pay_date'].'</td>
                    <td width="66" height="15" align="left" valign="middle" class="white result">'.$FetchAddons['to_date'].'</td>
                    <td width="66" height="15" align="center" valign="middle" class="white result">'.$Addons['price'].'</td>
                    <td width="66" height="15" align="center" valign="middle" class="white result">'.$Addons['serv_tax'].'</td>
                    <td width="66" height="15" align="center" valign="middle" class="white result">'.$Addons['tax_amt'].'</td>
                    <td width="66" height="15" align="center" valign="middle" class="white result">'.$Addons['total_amt'].'</td>
                    <td width="66" height="15" align="center" valign="middle" class="white result">'.$FetchAddons['duartion'].'</td>
                    <td width="66" height="15" align="center" valign="middle" class="white result">'.$FetchAddons['total_amount'].'</td>
                 
                </tr>';
				}}else{
    $html .=  '<tr>
                  <td colspan="9" width="600">No Records Found</td>
                </tr>';
				}
			$html .=  '</table></td>
  </tr>
    
    <tr>
    
    <td width="600" height="15" colspan="4" align="right" style="padding-right:25px; font-size:14px; border-top:#999 1px; border-bottom:solid #000 1px;">Net Total:  '.round($grand_total, 2).'</td>
  </tr>
</table>
	</td>
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