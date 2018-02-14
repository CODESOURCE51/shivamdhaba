<?php
require("../../../connection.php");


$admno=$_REQUEST['admno'];
$select_for_stu="select * from student where admissionno='$admno'";
$res_stu=mysql_query($select_for_stu) or die(mysql_error());
$former_student=mysql_fetch_array($res_stu);
$bid=$former_student['course'];
$pid=$former_student['emergency_contact'];

$parents=mysql_fetch_array(mysql_query("select * from  parents_detail where id='$pid' and admno='$admno'"));

$previous=mysql_fetch_array(mysql_query("select * from  previous_details where admno='$admno'"));

$sub=mysql_fetch_array(mysql_query("select * from  subjects where id='$bid'"));

$select_s=mysql_query("select * from settings where id='1'")or die (mysql_error());
$s=mysql_fetch_array($select_s);
$image=$s['logo'];





$html='<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN""http://www.w3.org/TR/html4/loose.dtd">
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
.transfer {
font-size:22px;
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
.table_left_col {border-bottom:solid #999 2px;
border-right:solid #999 2px;
background:#EFEFEF;
padding-left:15px;
}
.table_right_col {border-bottom:solid #999 2px;
background:#EFEFEF;
padding-left:15px;
}
.white_left_col {border-bottom:solid #999 2px;
border-right:solid #999 2px;
background:#FFFFFF;
padding-left:15px;
}
.white_right_col {border-bottom:solid #999 2px;
background:#FFFFFF;
padding-left:15px;
}
</style>
<head>
<title>Transfer Certificate</title>
</head>

<body>
<table width="595" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="151" height="100" align="left" valign="top"><div style="float:left; width:125px; height:125px; border: 8px solid #EFEFEF;"><img src="../../../configuration/upload_logo/'.$image.'" height="125" width="125" /></div></td>
    <td width="444" height="100" align="left" valign="middle"><div class="school_name">'.$s['name'].'</div>
    <div class="school_add">'.$s['address'].'</div>
    </td>
  </tr>
  <tr>
    <td height="35" colspan="2" align="center" valign="middle" style="border-bottom:solid #000 2px; border-top:solid #000 2px;" class="transfer">Profile</td>
  </tr>
   <tr>
    <td height="30" colspan="2">'.$former_student['fname'].''.$former_student['lname'].'</td>
  </tr>
  <tr>
    <td height="30" colspan="2" align="center" valign="top">
    <table width="595" border="0" cellspacing="0" cellpadding="0" align="center" class="table_border">
      <tr>
        <td width="276" height="30" align="left" valign="middle" class="table_left_col">Name:</td>
        <td width="315" height="30" align="left" valign="middle" class="table_right_col">'.$former_student['fname'].''.$former_student['lname'].'</td>
      </tr>
      <tr>
        <td width="276" height="30" align="left" valign="middle" class="white_left_col">Admission no:</td>
        <td width="315" height="30" align="left" valign="middle" class="white_right_col">'.$former_student['admissionno'].'</td>
      </tr>
      <tr>
        <td width="276" height="30" align="left" valign="middle" class="table_left_col">Admission Date:</td>
        <td width="315" height="30" align="left" valign="middle" class="table_right_col">'.$former_student['admissiondate'].'</td>
      </tr>
      <tr>
        <td width="276" height="30" align="left" valign="middle" class="white_left_col">Date Of Birth</td>
        <td width="315" height="30" align="left" valign="middle" class="white_right_col">'.$former_student['dob'].'</td>
      </tr>
      <tr>
        <td width="276" height="30" align="left" valign="middle" class="table_left_col">Last Attended Course:</td>
        <td width="315" height="30" align="left" valign="middle" class="table_right_col">'.$sub['name'].'</td>
      </tr>
      <tr>
        <td width="276" height="30" align="left" valign="middle" class="white_left_col">Blood Group:</td>
        <td width="315" height="30" align="left" valign="middle" class="white_right_col">'.$former_student['bloodgroup'].'</td>
      </tr>
      <tr>
        <td width="276" height="30" align="left" valign="middle" class="table_left_col">Gender</td>
        <td width="315" height="30" align="left" valign="middle" class="table_right_col">'.$former_student['gender'].'</td>
      </tr>
      <tr>
        <td width="276" height="30" align="left" valign="middle" class="white_left_col">Nationality:</td>
        <td width="315" height="30" align="left" valign="middle" class="white_right_col">'.$former_student['nationality'].'</td>
      </tr>
      <tr>
        <td width="276" height="30" align="left" valign="middle" class="table_left_col">Language:</td>
        <td width="315" height="30" align="left" valign="middle" class="table_right_col">'.$former_student['language'].'</td>
      </tr>
      <tr>
        <td width="276" height="30" align="left" valign="middle" class="white_left_col">Religion:</td>
        <td width="315" height="30" align="left" valign="middle" class="white_right_col">'.$former_student['religion'].'</td>
      </tr>
      <tr>
        <td width="276" height="30" align="left" valign="middle" class="table_left_col">Birth Place:</td>
        <td width="315" height="30" align="left" valign="middle" class="table_right_col">'.$former_student['birthplace'].'</td>
      </tr>
      <tr>
        <td width="276" height="30" align="left" valign="middle" class="white_left_col">Address:</td>
        <td width="315" height="30" align="left" valign="middle" class="white_right_col">'.$former_student['address1'].''.$former_student['address2'].'</td>
      </tr>
      <tr>
        <td width="276" height="30" align="left" valign="middle" class="table_left_col">City:</td>
        <td width="315" height="30" align="left" valign="middle" class="table_right_col">'.$former_student['city'].'</td>
      </tr>
      <tr>
        <td width="276" height="30" align="left" valign="middle" class="white_left_col">State:</td>
        <td width="315" height="30" align="left" valign="middle" class="white_right_col">'.$former_student['state'].'</td>
      </tr>
      <tr>
        <td width="276" height="30" align="left" valign="middle" class="table_left_col">Pincode:</td>
        <td width="315" height="30" align="left" valign="middle" class="table_right_col">'.$former_student['pincode'].'</td>
      </tr>
      <tr>
        <td width="276" height="30" align="left" valign="middle" class="white_left_col">Country:</td>
        <td width="315" height="30" align="left" valign="middle" class="white_right_col">'.$former_student['country'].'</td>
      </tr>
      <tr>
        <td width="276" height="30" align="left" valign="middle" class="white_left_col">Phone:</td>
        <td width="315" height="30" align="left" valign="middle" class="white_right_col">'.$former_student['phone'].'</td>
      </tr>
      <tr>
      <td width="276" height="30" align="left" valign="middle" class="table_left_col">Mobile:</td>
        <td width="315" height="30" align="left" valign="middle" class="table_right_col">'.$former_student['mobile'].'</td>
      </tr>
      <tr>
        <td width="276" height="30" align="left" valign="middle" class="white_left_col">Email:</td>
        <td width="315" height="30" align="left" valign="middle" class="white_right_col">'.$former_student['email'].'</td>
      </tr>
      <tr>
        <td width="276" height="30" align="left" valign="middle" class="table_left_col">Immediate Contact:</td>
        <td width="315" height="30" align="left" valign="middle" class="table_right_col">'.$parents['fname'].'</td>
      </tr>
      <tr>
        <td width="276" height="30" align="left" valign="middle" class="white_left_col">Previuos Details:</td>
        <td width="315" height="30" align="left" valign="middle" class="white_right_col">'.$previous['institution'].'</td>
      </tr>
    </table>
    </td>
  </tr>
  <tr>
        <td colspan="2"> </td>
  </tr>
</table>

</body>
</html>';
//phptopdf_html($html,'pdf/', 'my_pdf_filename.pdf');
//echo "<a href='pdf/my_pdf_filename.pdf' target='_blank'><img src='../image/pdf_report.png' border='0' /></a>";

require_once(dirname(__FILE__).'/../html2pdf.class.php');
    $html2pdf = new HTML2PDF('P','A4','fr');
	$html2pdf->pdf->SetDisplayMode('fullpage');
	
	 //$html2pdf->SetFont('times', 'BI', 20, '', 'false');
    $html2pdf->WriteHTML($html);
    $html2pdf->Output('exemple.pdf');
	
?>