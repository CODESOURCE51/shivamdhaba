<?php
require("../../../connection.php");


$admno=$_REQUEST['admno'];
$select_for_stu="select * from student where admissionno='$admno'";
$res_stu=mysql_query($select_for_stu) or die(mysql_error());
$id_student=mysql_fetch_array($res_stu);
$id_s=$id_student['course'];
$cors=mysql_fetch_array(mysql_query("select * from course where id='".$id_student['course']."'"));
$name=$id_student['fname']." ".$id_student['mname']." ".$id_student['lname'];

$select_s=mysql_query("select * from settings where id='1'")or die (mysql_error());
$s=mysql_fetch_array($select_s);
$image=$s['logo'];
$r= rand(999999,111111);
$rand="BBS-".$r; 




$html='<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
<title>Transfer Certificate</title>
</head>

<body>

<table width="290" align="center" height="350" cellspacing="0" cellpadding="0" style="border-bottom:1px thin #06C; border-top:1px thin #06C; border-right:1px thin #06C; border-left:1px thin #06C; border-radius:5px;">
  <tr>
    <td height="50" align="center" valign="middle" colspan="2" style="font-size:18px; font-weight:bold; color:#FFF; background-color:#1D84CF; border-bottom:1px solid #FFF;">'.$s['name'].'<br /><span style="font-size:12px;">LIBRARY CARD</span></td>
  </tr>
  <tr>
    <td height="150" colspan="2" align="center">
      
        <img src="../../upload/'.$id_student['image'].'" height="140" width="135" style="border:2px thin #069;" />
     </td>
  </tr>
  <tr>
    <td height="15" colspan="2" align="center" style="font-size:14px; font-weight:bold;">'.$name.'</td>
  </tr>
  <tr>
    <td height="15" colspan="2" align="center">ID NO: '.$id_student['id_no'].'</td>
  </tr>
  <tr>
    <td height="15" colspan="2" align="center">Blood Grp: '.$id_student['bloodgroup'].'</td>
  </tr>
  <tr>
    <td height="15" colspan="2" align="center">DOB: '.$id_student['dob'].'</td>
  </tr>
  <tr>
    <td height="15" colspan="2" align="center">CLASS: '.$cors['name'].'&nbsp;SEC: '.$cors['section_name'].'</td>
  </tr>
  <tr>
    <td height="15" colspan="2" align="center"></td>
  </tr>
  <tr style="font-size:14px; font-weight:600; color:#FFF; background-color:#1D84CF; border-bottom:1px solid #FFF;">
    <td width="64" height="50"><img src="../../../configuration/upload_logo/'.$image.'" height="50" width="61" /></td>
    <td width="226" height="50">'.$s['address'].'<br/>Tel: '.$s['phone'].' Email: '.$s['email'].'</td>
  </tr>
</table>











</body>
</html>';
//phptopdf_html($html,'pdf/', 'my_pdf_filename.pdf');
//echo "<a href='pdf/my_pdf_filename.pdf' target='_blank'><img src='../image/pdf_report.png' border='0' /></a>";

 require_once(dirname(__FILE__).'/../html2pdf.class.php');
    $html2pdf = new HTML2PDF('P','A6','fr');
	
	 //$html2pdf->SetFont('times', 'BI', 20, '', 'false');
    $html2pdf->WriteHTML($html);
    $html2pdf->Output('exemple.pdf');
	
?>