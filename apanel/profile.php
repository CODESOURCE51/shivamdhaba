<?php 
include_once ("../admin/include/connection.php");
    if(empty($_SESSION['user'])) 
    { 
        header("Location: index.php"); 
        die("Redirecting to index.php"); 
    }
	
	if(isset($_REQUEST['mode']) && $_REQUEST['mode']=="edit"){
	
	
if($_FILES['image']['tmp_name']!=''){		
$tmp_name=$_FILES['image']['tmp_name'];
$rand= rand(10000000, 99999999);
$target = "../photo/"; 
$target = $target .$rand. basename( $_FILES['image']['name']) ; 
move_uploaded_file($_FILES['image']['tmp_name'], $target); 
$valid_img= basename($rand.$_FILES['image']['name']);
}else{
$valid_img= $_REQUEST['image'];
}

if($_FILES['image_sig']['tmp_name']!=''){	
$tmp_name_up=$_FILES['image_sig']['tmp_name'];
$rand1= rand(10000000, 99999999);
$target_up = "../signature/"; 
$target_up = $target_up .$rand1. basename( $_FILES['image_sig']['name']) ; 
move_uploaded_file($_FILES['image_sig']['tmp_name'], $target_up); 
$valid_img_up= basename($rand1.$_FILES['image_sig']['name']);
}else{
$valid_img_up= $_REQUEST['image_sig'];	
}
$dob= $_REQUEST['yy']."-".$_REQUEST['mm']."-".$_REQUEST['dd'];

//$pwd= $nm[0].$dob;

$sql= mysql_query("update reg_table set
				`bengali_r`='".$_REQUEST['bengali_r']."',
				`bengali_w`='".$_REQUEST['bengali_w']."',
				`bengali_s`='".$_REQUEST['bengali_s']."',
				`english_r`='".$_REQUEST['english_r']."',
				`english_w`='".$_REQUEST['english_w']."',
				`english_s`='".$_REQUEST['english_s']."',
				`mobile`='".$_REQUEST['mobile']."',
				`name`='".$_REQUEST['name']."',
				`m_name`='".$_REQUEST['m_name']."',
				`l_name`='".$_REQUEST['l_name']."',
				`fname`='".$_REQUEST['fname']."',
				`mname`='".$_REQUEST['mname']."',
				`dob`='".$dob."',
				`village_present`='".$_REQUEST['village_present']."',
				`po_present`='".$_REQUEST['po_present']."',
				`ps_present`='".$_REQUEST['ps_present']."',
				`dist_present`='".$_REQUEST['dist_present']."',
				`pin_present`='".$_REQUEST['pin_present']."',
				`state_present`='".$_REQUEST['state_present']."',
				`email_present`='".$_REQUEST['email_present']."',
				`village_permanent`='".$_REQUEST['village_permanent']."',
				`po_permanent`='".$_REQUEST['po_permanent']."',
				`ps_permanent`='".$_REQUEST['ps_permanent']."',
				`dist_permanent`='".$_REQUEST['dist_permanent']."',
				`pin_permanent`='".$_REQUEST['pin_permanent']."',
				`state_permanent`='".$_REQUEST['state_permanent']."',
				`email_permanent`='".$_REQUEST['email_permanent']."',
				`gender`='".$_REQUEST['gender']."',
				`nationality`='".$_REQUEST['nationality']."',
				`category`='".$_REQUEST['category']."',
				`caste_certificate`='".$_REQUEST['caste_certificate']."',
				`sub_caste`='".$_REQUEST['sub_caste']."',
				`disability`='".$_REQUEST['disability']."',
				`disability_certificate`='".$_REQUEST['disability_certificate']."',
				`minority`='".$_REQUEST['minority']."',
				`minority_certificate`='".$_REQUEST['minority_certificate']."',
				`ex_serviceman`='".$_REQUEST['ex_serviceman']."',
				`bank_acc_no`='".$_REQUEST['bank_acc_no']."',
				`bank_branch`='".$_REQUEST['bank_branch']."',
				`bank_name`='".$_REQUEST['bank_name']."',
				`bank_ifsc`='".$_REQUEST['bank_ifsc']."',
				`sf_marks`='".$_REQUEST['sf_marks']."',
				`sf_percentage`='".$_REQUEST['sf_percentage']."',
				`sf_yr`='".$_REQUEST['sf_yr']."',
				`hs_marks`='".$_REQUEST['hs_marks']."',
				`hs_percentage`='".$_REQUEST['hs_percentage']."',
				`hs_yr`='".$_REQUEST['hs_yr']."',
				`ba_marks`='".$_REQUEST['ba_marks']."',
				`ba_percentage`='".$_REQUEST['ba_percentage']."',
				`ba_yr`='".$_REQUEST['ba_yr']."',
				`ma_marks`='".$_REQUEST['ma_marks']."',
				`ma_percentge`='".$_REQUEST['ma_percentge']."',
				`ma_yr`='".$_REQUEST['ma_yr']."',
				`ex1_marks`='".$_REQUEST['ex1_marks']."',
				`ex1_percentge`='".$_REQUEST['ex1_percentge']."',
				`ex1_yr`='".$_REQUEST['ex1_yr']."',
				`ex2_marks`='".$_REQUEST['ex2_marks']."',
				`ex2_percentge`='".$_REQUEST['ex2_percentge']."',
				`ex2_yr`='".$_REQUEST['ex2_yr']."',
				`ex3_marks`='".$_REQUEST['ex3_marks']."',
				`ex3_percentge`='".$_REQUEST['ex3_percentge']."',
				`ex3_yr`='".$_REQUEST['ex3_yr']."',
				`other1_marks`='".$_REQUEST['other1_marks']."',
				`other1_percentge`='".$_REQUEST['other1_percentge']."',
				`other1_yr`='".$_REQUEST['other1_yr']."',
				`other2_marks`='".$_REQUEST['other2_marks']."',
				`other2_percentge`='".$_REQUEST['other2_percentge']."',
				`other2_yr`='".$_REQUEST['other2_yr']."',
				`ex1_course`='".$_REQUEST['ex1_course']."',
				`ex2_course`='".$_REQUEST['ex2_course']."',
				`ex3_course`='".$_REQUEST['ex3_course']."',
				`other1_course`='".$_REQUEST['other1_course']."',
				`other2_course`='".$_REQUEST['other2_course']."',
				`image`='".$valid_img."',
				`signature`='".$valid_img_up."'
				where `id`='".$_REQUEST['id']."'");
				
	echo "<script type='text/javascript'>window.location='home.php?success;</script>";
	} 
	?>
    <!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="css/main.css"/>
    <link rel="stylesheet" href="css/mainmou.css"/>
    <link rel="stylesheet" type="text/css" href="css/formstyle.css">
<style>
.abcd {
width: 313px;
  height: 21px;
  border: 1px solid #CCC;
  font-size:13px;
  
}
</style>
<!-------------------same as------------------>
<script type="text/javascript">
function FillBilling(f) {
  if(f.billingtoo.checked == true) {
   f.village_permanent.value = f.village_present.value;   
   f.po_permanent.value = f.po_present.value;
   f.ps_permanent.value = f.ps_present.value;
   f.dist_permanent.value = f.dist_present.value;
   f.pin_permanent.value = f.pin_present.value;
   f.state_permanent.value = f.state_present.value;
   f.email_permanent.value = f.email_present.value;
  }
}
</script>
<!-------------------same as------------------>
<!----------------------validation----------------------------->

 <script type="text/javascript" src="js/jquery.js"></script>  
  <script type="text/javascript" src="js/validate.js"></script>  
<script type="text/javascript">
$(document).ready(function(){ 
    

	$("#edit_form").validate({
		rules: {
			mobile: {
				required: true
			},
			name: {
				required: true
			},
			l_name: {
				required: true
			},
			fname: {
				required: true
			},
			mname: {
				required: true
			},
			nationality: {
				required: true
			},
			sub_caste: {
				required: true
			},
			sf_marks: {
				required: true
			},
			sf_percentage: {
				required: true
			},
			sf_yr: {
				required: true
			},
			dd: {
				required: true
			},
			mm: {
				required: true
			},
			yy: {
				required: true
			},
			email_present: {
				required: true,
				email: true
			},
			village_present: {
				required: true
			},
			po_present: {
				required: true
			},
			ps_present: {
				required: true
			},
			dist_present: {
				required: true
			},
			pin_present: {
				required: true
			},
			state_present: {
				required: true
			},
			email_permnent: {
				email: true
			}
		 
		}, //end rules
		messages: {
			
			mobile: {
				required: "<br /><span style='color:red;'> Required.</span>"
			
			},
			name: {
				required: "<br /><span style='color:red;'> Required.</span>"
			
			},
			l_name: {
				required: "<br /><span style='color:red;'> Required.</span>"
			},
			fname: {
				required: "<br /><span style='color:red;'> Required.</span>"
			
			},
			mname: {
				required: "<br /><span style='color:red;'> Required.</span>"
			
			},
			nationality: {
				required: "<br /><span style='color:red;'> Required.</span>"
			
			},
			sub_caste: {
				required: "<br /><span style='color:red;'> Required.</span>"
			
			},
			sf_marks: {
				required: "<br /><span style='color:red;'> Required.</span>"
			
			},
			sf_percentage: {
				required: "<br /><span style='color:red;'> Required.</span>"
			
			},
			sf_yr: {
				required: "<br /><span style='color:red;'> Required.</span>"
			
			},
			dd: {
				required: "<br /><span style='color:red;'> Required.</span>"
			},
			mm: {
				required: "<br /><span style='color:red;'> Required.</span>"
			},
			yy: {
				required: "<br /><span style='color:red;'> Required.</span>"
			},
			email_present: {
				required: "<br /><span style='color:red;'> Required.</span>",
				email: "<br /><span style='color:red;'> Required a valid email.</span>"
			},
			village_present: {
				required: "<br /><span style='color:red;'> Required.</span>"
			},
			po_present: {
				required: "<br /><span style='color:red;'> Required.</span>"
			},
			ps_present: {
				required: "<br /><span style='color:red;'> Required.</span>"
			},
			dist_present: {
				required: "<br /><span style='color:red;'> Required.</span>"
			},
			pin_present: {
				required: "<br /><span style='color:red;'> Required.</span>"
			},
			state_present: {
				required: "<br /><span style='color:red;'> Required.</span>"
			},
			email_permnent: {
				email: "<br /><span style='color:red;'> Required a valid email.</span>"
			}
			
		} //end messages
		
	}); //end validate
  });
</script>

<!----------------------number validation---------------->
<SCRIPT language=Javascript>
<!--
function isNumberKey(evt)
{
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))
return false;

return true;
}
//-->
</SCRIPT>

<!----------------------validation---------------->

<script type="text/javascript">
	$(function(){
		$('#image').change(function(){
			var f=this.files[0]
			var t=f.size||f.fileSize
			if (t<=12001) {
            return true
        }else{
            alert("File Size should be less than 12 kb");
			document.getElementById("image").value = "";
			return false;
        }
			
		})
		$('#image_sig').change(function(){
			var f=this.files[0]
			var t=f.size||f.fileSize
			if (t<=8401) {
            return true
        }else{
            alert("File Size should be less than 8.4 kb");
			document.getElementById("image_sig").value = "";
			return false;
        }
			
		})
	})
	</script>
</head>
<body>
<?php include "header.php" ?>
<div id="siteWrapper">
    <table class="page">
        <tr>
            <td style="width: 100%">
            <table width="100%" border="0" style="color:#333; background:#fff; border-collapse:separate;" class="padded">
  <tr>
    <td>
    <?php 
	$Fetch= mysql_fetch_array(mysql_query("select * from reg_table where username='".$_SESSION['user']."'"));

$dob_arr= explode("-",$Fetch['dob']);
$dd= $dob_arr[2];
$mm= $dob_arr[1];
$yy= $dob_arr[0];
	 ?>
    <form name="edit_form" id="edit_form" action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="mode" value="edit">
    <input type="hidden" name="id" value="<?php echo $Fetch['id'];?>">
    <input type="hidden" name="image" value="<?php echo $Fetch['image'];?>">
    <input type="hidden" name="image_sig" value="<?php echo $Fetch['signature'];?>">
 
<table width="100%" align="center" cellpadding = "10" style="color:#333; font-family: 'Oswald', sans-serif; font-size:14px;">

 <tr bgcolor="#666666" style="border-spacing: 2px;
  border-color: grey; background:rgb(153,153,153); color:#fff;">
   <td height="20" colspan="2" bgcolor="#666666"><b>Language Known : </b><font color="#990000">*</font></td>
   </tr>
 <tr>
<td><img src="img/formbullet.gif" style="width:12px; height:13px;"/>Bengali</td>
 
<td>
Read
<input type="checkbox" name="bengali_r" id="bengali_r" value="Y"<?php if($Fetch['bengali_r']=='Y'){ echo "checked";}?> />
Write
<input type="checkbox" name="bengali_w" id="bengali_w" value="Y"<?php if($Fetch['bengali_w']=='Y'){ echo "checked";}?> />
Speak
<input type="checkbox" name="bengali_s" id="bengali_s" value="Y"<?php if($Fetch['bengali_s']=='Y'){ echo "checked";}?> /></td>
</tr>
 
<tr>
<td> <img src="img/formbullet.gif" style="width:12px; height:13px;" />English</td>
 
<td>
Read
<input type="checkbox" name="english_r" id="english_r" value="Y"<?php if($Fetch['english_r']=='Y'){ echo "checked";}?> />
Write
<input type="checkbox" name="english_w" id="english_w" value="Y"<?php if($Fetch['english_w']=='Y'){ echo "checked";}?> />
Speak
<input type="checkbox" name="english_s" id="english_s" value="Y"<?php if($Fetch['english_s']=='Y'){ echo "checked";}?> /></td>
</tr>

<!----- First Name ---------------------------------------------------------->
<tr bgcolor="#666666" style="border-spacing: 2px;
  border-color: grey; background:rgb(153,153,153); color:#fff;">
  <td height="20" colspan="2" bgcolor="#666666"><b>Personal Details : </b><font color="#990000">*</font></td>
  </tr>
<tr>
<td><img src="img/formbullet.gif" style="width:12px; height:13px;" />Referral &nbsp;ID :</td>
<td><?php echo $Fetch['reff_id'];?></td>
</tr>
<tr>
<td><img src="img/formbullet.gif" style="width:12px; height:13px;" />Refferral side:</td>
<td><?php echo $Fetch['s_side'];?></td>
</tr>
 
<!----- Last Name ---------------------------------------------------------->
<tr>
  <td><p><img src="img/formbullet.gif" style="width:12px; height:13px;" />*Mobile No :</p></td>
  <td><input type="text" class="abcd" name="mobile" id="mobile" value="<?php echo $Fetch['mobile'];?>" onKeyPress="return isNumberKey(event);"/></td>
</tr>
<tr>
<td><p><img src="img/formbullet.gif" style="width:12px; height:13px;" />*Name:</p></td>
<td><input type="text" class="abcd" name="name" id="name" value="<?php echo $Fetch['name'];?>"/></td>
</tr>
<tr>
<td><p><img src="img/formbullet.gif" style="width:12px; height:13px;" />Middle Name:</p></td>
<td><input type="text" class="abcd" name="m_name" id="m_name" value="<?php echo $Fetch['m_name'];?>"/></td>
</tr>
<tr>
<td><p><img src="img/formbullet.gif" style="width:12px; height:13px;" />*Last Name:</p></td>
<td><input type="text" class="abcd" name="l_name" id="l_name" value="<?php echo $Fetch['l_name'];?>"/></td>
</tr>
<tr>
<td><p><img src="img/formbullet.gif" style="width:12px; height:13px;" />*Fathers Name:</p></td>
<td><input type="text" class="abcd" name="fname" id="fname" value="<?php echo $Fetch['fname'];?>"/></td>
</tr>
<tr>
<td><p><img src="img/formbullet.gif" style="width:12px; height:13px;" />*Mothers Name:</p></td>
<td><input type="text" class="abcd" name="mname" id="mname" value="<?php echo $Fetch['mname'];?>"/></td>
</tr>
 
<!----- Date Of Birth -------------------------------------------------------->
<tr>
<td><img src="img/formbullet.gif" style="width:12px; height:13px;" />Date Of Birth</td>
 
<td>
<select name="dd" id="dd" class="abcd" style="width:100px;">
<option value="">Day:</option>
<option value="1"<?php if($dd=='1'){ echo "selected";}?>>1</option>
<option value="2"<?php if($dd=='2'){ echo "selected";}?>>2</option>
<option value="3"<?php if($dd=='3'){ echo "selected";}?>>3</option>

 
<option value="4"<?php if($dd=='4'){ echo "selected";}?>>4</option>
<option value="5"<?php if($dd=='5'){ echo "selected";}?>>5</option>
<option value="6"<?php if($dd=='6'){ echo "selected";}?>>6</option>
<option value="7"<?php if($dd=='7'){ echo "selected";}?>>7</option>
<option value="8"<?php if($dd=='8'){ echo "selected";}?>>8</option>
<option value="9"<?php if($dd=='9'){ echo "selected";}?>>9</option>
<option value="10"<?php if($dd=='10'){ echo "selected";}?>>10</option>
<option value="11"<?php if($dd=='11'){ echo "selected";}?>>11</option>
<option value="12"<?php if($dd=='12'){ echo "selected";}?>>12</option>
 
<option value="13"<?php if($dd=='13'){ echo "selected";}?>>13</option>
<option value="14"<?php if($dd=='14'){ echo "selected";}?>>14</option>
<option value="15"<?php if($dd=='15'){ echo "selected";}?>>15</option>
<option value="16"<?php if($dd=='16'){ echo "selected";}?>>16</option>
<option value="17"<?php if($dd=='17'){ echo "selected";}?>>17</option>
<option value="18"<?php if($dd=='18'){ echo "selected";}?>>18</option>
<option value="19"<?php if($dd=='19'){ echo "selected";}?>>19</option>
<option value="20"<?php if($dd=='20'){ echo "selected";}?>>20</option>
<option value="21"<?php if($dd=='21'){ echo "selected";}?>>21</option>
 
<option value="22"<?php if($dd=='22'){ echo "selected";}?>>22</option>
<option value="23"<?php if($dd=='23'){ echo "selected";}?>>23</option>
<option value="24"<?php if($dd=='24'){ echo "selected";}?>>24</option>
<option value="25"<?php if($dd=='25'){ echo "selected";}?>>25</option>
<option value="26"<?php if($dd=='26'){ echo "selected";}?>>26</option>
<option value="27"<?php if($dd=='27'){ echo "selected";}?>>27</option>
<option value="28"<?php if($dd=='28'){ echo "selected";}?>>28</option>
<option value="29"<?php if($dd=='29'){ echo "selected";}?>>29</option>
<option value="30"<?php if($dd=='30'){ echo "selected";}?>>30</option>
 
<option value="31"<?php if($dd=='31'){ echo "selected";}?>>31</option>
</select>
 
<select id="mm" name="mm" class="abcd" style="width:100px;">
<option value="">Month:</option>
<option value="1"<?php if($mm=='1'){ echo "selected";}?>>Jan</option>
<option value="2"<?php if($mm=='2'){ echo "selected";}?>>Feb</option>
<option value="3"<?php if($mm=='3'){ echo "selected";}?>>Mar</option>
<option value="4"<?php if($mm=='4'){ echo "selected";}?>>Apr</option>
<option value="5"<?php if($mm=='5'){ echo "selected";}?>>May</option>
<option value="6"<?php if($mm=='6'){ echo "selected";}?>>Jun</option>
<option value="7"<?php if($mm=='7'){ echo "selected";}?>>Jul</option>
<option value="8"<?php if($mm=='8'){ echo "selected";}?>>Aug</option>
<option value="9"<?php if($mm=='9'){ echo "selected";}?>>Sep</option>
<option value="10"<?php if($mm=='10'){ echo "selected";}?>>Oct</option>
<option value="11"<?php if($mm=='11'){ echo "selected";}?>>Nov</option>
<option value="12"<?php if($mm=='12'){ echo "selected";}?>>Dec</option>
</select>
 
<select name="yy" id="yy" class="abcd" style="width:100px;">
 
<option value="">Year:</option>
<option value="2012"<?php if($yy=='2012'){ echo "selected";}?>>2012</option>
<option value="2011"<?php if($yy=='2011'){ echo "selected";}?>>2011</option>
<option value="2010"<?php if($yy=='2010'){ echo "selected";}?>>2010</option>
<option value="2009"<?php if($yy=='2009'){ echo "selected";}?>>2009</option>
<option value="2008"<?php if($yy=='2008'){ echo "selected";}?>>2008</option>
<option value="2007"<?php if($yy=='2007'){ echo "selected";}?>>2007</option>
<option value="2006"<?php if($yy=='2006'){ echo "selected";}?>>2006</option>
<option value="2005"<?php if($yy=='2005'){ echo "selected";}?>>2005</option>
<option value="2004"<?php if($yy=='2004'){ echo "selected";}?>>2004</option>
<option value="2003"<?php if($yy=='2003'){ echo "selected";}?>>2003</option>
<option value="2002"<?php if($yy=='2002'){ echo "selected";}?>>2002</option>
<option value="2001"<?php if($yy=='2001'){ echo "selected";}?>>2001</option>
<option value="2000"<?php if($yy=='2000'){ echo "selected";}?>>2000</option>
 
<option value="1999"<?php if($yy=='1999'){ echo "selected";}?>>1999</option>
<option value="1998"<?php if($yy=='1998'){ echo "selected";}?>>1998</option>
<option value="1997"<?php if($yy=='1997'){ echo "selected";}?>>1997</option>
<option value="1996"<?php if($yy=='1996'){ echo "selected";}?>>1996</option>
<option value="1995"<?php if($yy=='1995'){ echo "selected";}?>>1995</option>
<option value="1994"<?php if($yy=='1994'){ echo "selected";}?>>1994</option>
<option value="1993"<?php if($yy=='1993'){ echo "selected";}?>>1993</option>
<option value="1992"<?php if($yy=='1992'){ echo "selected";}?>>1992</option>
<option value="1991"<?php if($yy=='1991'){ echo "selected";}?>>1991</option>
<option value="1990"<?php if($yy=='1990'){ echo "selected";}?>>1990</option>
 
<option value="1989"<?php if($yy=='1989'){ echo "selected";}?>>1989</option>
<option value="1988"<?php if($yy=='1988'){ echo "selected";}?>>1988</option>
<option value="1987"<?php if($yy=='1987'){ echo "selected";}?>>1987</option>
<option value="1986"<?php if($yy=='1986'){ echo "selected";}?>>1986</option>
<option value="1985"<?php if($yy=='1985'){ echo "selected";}?>>1985</option>
<option value="1984"<?php if($yy=='1984'){ echo "selected";}?>>1984</option>
<option value="1983"<?php if($yy=='1983'){ echo "selected";}?>>1983</option>
<option value="1982"<?php if($yy=='1982'){ echo "selected";}?>>1982</option>
<option value="1981"<?php if($yy=='1981'){ echo "selected";}?>>1981</option>
<option value="1980"<?php if($yy=='1980'){ echo "selected";}?>>1980</option>
</select></td>
</tr>
<tr>
  <td><img src="img/formbullet.gif" style="width:12px; height:13px;" />Email Id</td>
  <td><input type="text" class="abcd" name="email_present" id="email_present" value="<?php echo $Fetch['email_present'];?>"/></td>
</tr>
<!----- Gender ----------------------------------------------------------->
<tr>
<td><img src="img/formbullet.gif" style="width:12px; height:13px;" />*Gender </td>
<td>
<select name="gender" id="gender" style="height:22px;" class="abcd">
<option value="Male" <?php if($Fetch['gender']=='Male'){ echo "selected";}?>>Male</option>
<option value="Female" <?php if($Fetch['gender']=='Female'){ echo "selected";}?>>Female</option>
</select></td>
</tr>
 

 
<!----- City ---------------------------------------------------------->
<tr>
<td><img src="img/formbullet.gif" style="width:12px; height:13px;" />*Nationality</td>
<td><input type="text" name="nationality" class="abcd" id="nationality" value="<?php echo $Fetch['nationality'];?>"/></td>
</tr>
 <td><img src="img/formbullet.gif" style="width:12px; height:13px;" />*Category </td>
 
<td>
<select name="category" id="category" style="height:22px;" class="abcd">
<option value="SC" <?php if($Fetch['category']=='SC'){ echo "selected";}?>>SC</option>
<option value="ST" <?php if($Fetch['category']=='ST'){ echo "selected";}?>>ST</option>
<option value="OBC_A" <?php if($Fetch['category']=='OBC_A'){ echo "selected";}?>>OBC (A)</option>
<option value="OBC_B" <?php if($Fetch['category']=='OBC_B'){ echo "selected";}?>>OBC (B)</option>
<option value="GEN" <?php if($Fetch['category']=='GEN'){ echo "selected";}?> >GEN</option>
</select></td>
</tr>
 <tr>
<td><img src="img/formbullet.gif" style="width:12px; height:13px;" />Caste Certificate no :</td>
<td><input type="text" name="caste_certificate" class="abcd" id="caste_certificate" value="<?php echo $Fetch['caste_certificate'];?>" /></td>
</tr>
 
<!----- State ---------------------------------------------------------->
<tr>
<td><img src="img/formbullet.gif" style="width:12px; height:13px;" />*Sub caste :</td>
<td><input type="text" name="sub_caste" id="sub_caste" value="<?php echo $Fetch['sub_caste'];?>" class="abcd"/></td>
</tr>
<tr>
 <td><img src="img/formbullet.gif" style="width:12px; height:13px;" />*Person  with disability (40% &amp; above) : </td>
 
<td>
<select name="disability" id="disability" style="height:22px;" class="abcd">
<option value="N" <?php if($Fetch['disability']=='N'){ echo "selected";}?>>No</option>
<option value="Y" <?php if($Fetch['disability']=='Y'){ echo "selected";}?>>Yes</option>
</select></td>
</tr>
 <tr>
<td><img src="img/formbullet.gif" style="width:12px; height:13px;" />Certificate  No :</td>
<td><input type="text" name="disability_certificate" id="disability_certificate" value="<?php echo $Fetch['disability_certificate'];?>"  class="abcd"/></td>
</tr>
 <tr>
<!----- Hobbies ---------------------------------------------------------->
 <td><img src="img/formbullet.gif" style="width:12px; height:13px;" />*Whether  belong to Minority Community : </td>
 
<td>
<select name="minority" id="minority" style="height:22px;" class="abcd">
<option value="N" <?php if($Fetch['minority']=='N'){ echo "selected";}?>>No</option>
<option value="Y" <?php if($Fetch['minority']=='Y'){ echo "selected";}?>>Yes</option>
</select></td>
</tr>
 <tr>
<td><img src="img/formbullet.gif" style="width:12px; height:13px;" />Certificate  No :</td>
<td><input type="text" name="minority_certificate" id="minority_certificate" value="<?php echo $Fetch['disability_certificate'];?>" class="abcd"/></td>
</tr>
<tr>
   <td><img src="img/formbullet.gif" style="width:12px; height:13px;" />*Whether Ex-Serviceman: : </td>
 
<td>
<select name="ex_serviceman" id="ex_serviceman" style="height:22px;" class="abcd">
<option value="N" <?php if($Fetch['ex_serviceman']=='N'){ echo "selected";}?>>No</option>
<option value="Y" <?php if($Fetch['ex_serviceman']=='Y'){ echo "selected";}?>>Yes</option>
</select></td>
</tr>
 <tr>
  <td><img src="img/formbullet.gif" style="width:12px; height:13px;" />Bank  A/C No : </td>
  <td><input type="text" name="bank_acc_no" id="bank_acc_no" value="<?php echo $Fetch['bank_acc_no'];?>" class="abcd"/></td>
</tr>
<tr>
<td><img src="img/formbullet.gif" style="width:12px; height:13px;" />Branch  : </td>
<td><input type="text" name="bank_branch" id="bank_branch" value="<?php echo $Fetch['bank_branch'];?>" class="abcd" /></td>
</tr>
<tr>
<td><img src="img/formbullet.gif" style="width:12px; height:13px;" />Name  of Bank :</td>
<td><input type="text" name="bank_name" id="bank_name" value="<?php echo $Fetch['bank_name'];?>" class="abcd" /></td>
</tr>
<tr>
<td><img src="img/formbullet.gif" style="width:12px; height:13px;" />IFSC  Code :</td>
<td><input type="text" name="bank_ifsc" id="bank_ifsc" value="<?php echo $Fetch['bank_ifsc'];?>" class="abcd" /></td>
</tr>
<!----- Qualification---------------------------------------------------------->
<tr>
  <td colspan="2" height="20" bgcolor="#666666" style="border-spacing: 2px;
  border-color: grey;  color:#fff;"><b>Postal Address : </b><font color="#990000">*</font></td>
  </tr> 

<tr>
<td></td>
<td></td>
</tr>
<tr>
  <td><img src="img/formbullet.gif" style="width:12px; height:13px;" />Village</td>
  <td><input type="text" class="abcd" name="village_present" id="village_present" value="<?php echo $Fetch['village_present'];?>" /></td>
</tr>
<tr>
  <td><img src="img/formbullet.gif" style="width:12px; height:13px;" />Post Office</td>
  <td><input type="text" class="abcd" name="po_present" id="po_present" value="<?php echo $Fetch['po_present'];?>" /></td>
</tr>
<tr>
  <td><img src="img/formbullet.gif" style="width:12px; height:13px;" />Police Station</td>
  <td><input type="text" class="abcd" name="ps_present" id="ps_present" value="<?php echo $Fetch['ps_present'];?>" /></td>
</tr>
<tr>
  <td><img src="img/formbullet.gif" style="width:12px; height:13px;" />Dist</td>
  <td><input type="text" class="abcd" name="dist_present" id="dist_present" value="<?php echo $Fetch['dist_present'];?>"/></td>
</tr>
<tr>
  <td><img src="img/formbullet.gif" style="width:12px; height:13px;" />Pin</td>
  <td><input type="text" class="abcd" name="pin_present" id="pin_present" value="<?php echo $Fetch['pin_present'];?>" onKeyPress="return isNumberKey(event);"/></td>
</tr>
<tr>
  <td><img src="img/formbullet.gif" style="width:12px; height:13px;" />State</td>
  <td><select name="state_present" id="state_present" style="height:22px;" class="abcd">
<option value="">select one</option>
<option value="Andaman and Nicobar Islands"<?php if($Fetch['state_present']=='Andaman and Nicobar Islands'){ echo "selected";}?>>Andaman and Nicobar Islands</option>
<option value="Andhra Pradesh"<?php if($Fetch['state_present']=='Andhra Pradesh'){ echo "selected";}?>>Andhra Pradesh</option>
<option value="Arunachal Pradesh"<?php if($Fetch['state_present']=='Arunachal Pradesh'){ echo "selected";}?>>Arunachal Pradesh</option>
<option value="Assam"<?php if($Fetch['state_present']=='Assam'){ echo "selected";}?>>Assam</option>
<option value="Bihar"<?php if($Fetch['state_present']=='Bihar'){ echo "selected";}?>>Bihar</option>
<option value="Chandigarh"<?php if($Fetch['state_present']=='Chandigarh'){ echo "selected";}?>>Chandigarh</option>
<option value="Chhattisgarh"<?php if($Fetch['state_present']=='Chhattisgarh'){ echo "selected";}?>>Chhattisgarh</option>
<option value="Dadra and Nagar Haveli"<?php if($Fetch['state_present']=='Dadra and Nagar Haveli'){ echo "selected";}?>>Dadra and Nagar Haveli</option>
<option value="Daman and Diu"<?php if($Fetch['state_present']=='Daman and Diu'){ echo "selected";}?>>Daman and Diu</option>
<option value="Delhi"<?php if($Fetch['state_present']=='Delhi'){ echo "selected";}?>>Delhi</option>
<option value="Goa"<?php if($Fetch['state_present']=='Goa'){ echo "selected";}?>>Goa</option>
<option value="Gujarat"<?php if($Fetch['state_present']=='Gujarat'){ echo "selected";}?>>Gujarat</option>
<option value="Haryana"<?php if($Fetch['state_present']=='Haryana'){ echo "selected";}?>>Haryana</option>
<option value="Himachal Pradesh"<?php if($Fetch['state_present']=='Himachal Pradesh'){ echo "selected";}?>>Himachal Pradesh</option>
<option value="Jammu and Kashmir"<?php if($Fetch['state_present']=='Jammu and Kashmir'){ echo "selected";}?>>Jammu and Kashmir</option>
<option value="Jharkhand"<?php if($Fetch['state_present']=='Jharkhand'){ echo "selected";}?>>Jharkhand</option>
<option value="Karnataka"<?php if($Fetch['state_present']=='Karnataka'){ echo "selected";}?>>Karnataka</option>
<option value="Kerala"<?php if($Fetch['state_present']=='Kerala'){ echo "selected";}?>>Kerala</option>
<option value="Lakshadweep"<?php if($Fetch['state_present']=='Lakshadweep'){ echo "selected";}?>>Lakshadweep</option>
<option value="Madhya Pradesh"<?php if($Fetch['state_present']=='Madhya Pradesh'){ echo "selected";}?>>Madhya Pradesh</option>
<option value="Maharashtra"<?php if($Fetch['state_present']=='Maharashtra'){ echo "selected";}?>>Maharashtra</option>
<option value="Manipur"<?php if($Fetch['state_present']=='Manipur'){ echo "selected";}?>>Manipur</option>
<option value="Meghalaya"<?php if($Fetch['state_present']=='Meghalaya'){ echo "selected";}?>>Meghalaya</option>
<option value="Mizoram"<?php if($Fetch['state_present']=='Mizoram'){ echo "selected";}?>>Mizoram</option>
<option value="Nagaland"<?php if($Fetch['state_present']=='Nagaland'){ echo "selected";}?>>Nagaland</option>
<option value="Orissa"<?php if($Fetch['state_present']=='Orissa'){ echo "selected";}?>>Orissa</option>
<option value="Pondicherry"<?php if($Fetch['state_present']=='Pondicherry'){ echo "selected";}?>>Pondicherry</option>
<option value="Punjab"<?php if($Fetch['state_present']=='Punjab'){ echo "selected";}?>>Punjab</option>
<option value="Rajasthan"<?php if($Fetch['state_present']=='Rajasthan'){ echo "selected";}?>>Rajasthan</option>
<option value="Sikkim"<?php if($Fetch['state_present']=='Sikkim'){ echo "selected";}?>>Sikkim</option>
<option value="Tamil Nadu"<?php if($Fetch['state_present']=='Tamil Nadu'){ echo "selected";}?>>Tamil Nadu</option>
<option value="Tripura"<?php if($Fetch['state_present']=='Tripura'){ echo "selected";}?>>Tripura</option>
<option value="Uttaranchal"<?php if($Fetch['state_present']=='Uttaranchal'){ echo "selected";}?>>Uttaranchal</option>
<option value="Uttar Pradesh"<?php if($Fetch['state_present']=='Uttar Pradesh'){ echo "selected";}?>>Uttar Pradesh</option>
<option value="West Bengal"<?php if($Fetch['state_present']=='West Bengal'){ echo "selected";}?>>West Bengal</option>
</select></td>
</tr>
<tr>
  <td><img src="img/formbullet.gif" style="width:12px; height:13px;" />If Same</td>
  <td>
  <input type="checkbox" name="billingtoo" onClick="FillBilling(this.form)" class="abcd"></td>
</tr>
<tr>
  <td colspan="2" height="20" bgcolor="#666666" style="border-spacing: 2px;
  border-color: grey;  color:#fff;"><b>Permanent Address : </b><font color="#990000">*</font></td>
  </tr>
<tr>
  <td><img src="img/formbullet.gif" style="width:12px; height:13px;" />Village</td>
  <td><input type="text" class="abcd" name="village_permanent" id="village_permanent" value="<?php echo $Fetch['village_permanent'];?>" /></td>
</tr>
<tr>
  <td><img src="img/formbullet.gif" style="width:12px; height:13px;" />Post Office</td>
  <td><input type="text" class="abcd" name="po_permanent" id="po_permanent" value="<?php echo $Fetch['po_permanent'];?>" /></td>
</tr>
<tr>
  <td><img src="img/formbullet.gif" style="width:12px; height:13px;" />Police Station</td>
  <td><input type="text" class="abcd" name="ps_permanent" id="ps_permanent" value="<?php echo $Fetch['ps_permanent'];?>" /></td>
</tr>
<tr>
  <td><img src="img/formbullet.gif" style="width:12px; height:13px;" />Dist</td>
  <td><input type="text" class="abcd" name="dist_permanent" id="dist_permanent" value="<?php echo $Fetch['dist_permanent'];?>"/></td>
</tr>
<tr>
  <td><img src="img/formbullet.gif" style="width:12px; height:13px;" />Pin</td>
  <td><input type="text" class="abcd" name="pin_permanent" id="pin_permanent" value="<?php echo $Fetch['pin_permanent'];?>" onKeyPress="return isNumberKey(event);"/></td>
</tr>
<tr>
  <td><img src="img/formbullet.gif" style="width:12px; height:13px;" />State</td>
  <td><select name="state_permanent" id="state_permanent" style="height:22px;" class="abcd">
<option value="">select one</option>
<option value="Andaman and Nicobar Islands"<?php if($Fetch['state_permanent']=='Andaman and Nicobar Islands'){ echo "selected";}?>>Andaman and Nicobar Islands</option>
<option value="Andhra Pradesh"<?php if($Fetch['state_permanent']=='Andhra Pradesh'){ echo "selected";}?>>Andhra Pradesh</option>
<option value="Arunachal Pradesh"<?php if($Fetch['state_permanent']=='Arunachal Pradesh'){ echo "selected";}?>>Arunachal Pradesh</option>
<option value="Assam"<?php if($Fetch['state_permanent']=='Assam'){ echo "selected";}?>>Assam</option>
<option value="Bihar"<?php if($Fetch['state_permanent']=='Bihar'){ echo "selected";}?>>Bihar</option>
<option value="Chandigarh"<?php if($Fetch['state_permanent']=='Chandigarh'){ echo "selected";}?>>Chandigarh</option>
<option value="Chhattisgarh"<?php if($Fetch['state_permanent']=='Chhattisgarh'){ echo "selected";}?>>Chhattisgarh</option>
<option value="Dadra and Nagar Haveli"<?php if($Fetch['state_permanent']=='Dadra and Nagar Haveli'){ echo "selected";}?>>Dadra and Nagar Haveli</option>
<option value="Daman and Diu"<?php if($Fetch['state_permanent']=='Daman and Diu'){ echo "selected";}?>>Daman and Diu</option>
<option value="Delhi"<?php if($Fetch['state_permanent']=='Delhi'){ echo "selected";}?>>Delhi</option>
<option value="Goa"<?php if($Fetch['state_permanent']=='Goa'){ echo "selected";}?>>Goa</option>
<option value="Gujarat"<?php if($Fetch['state_permanent']=='Gujarat'){ echo "selected";}?>>Gujarat</option>
<option value="Haryana"<?php if($Fetch['state_permanent']=='Haryana'){ echo "selected";}?>>Haryana</option>
<option value="Himachal Pradesh"<?php if($Fetch['state_permanent']=='Himachal Pradesh'){ echo "selected";}?>>Himachal Pradesh</option>
<option value="Jammu and Kashmir"<?php if($Fetch['state_permanent']=='Jammu and Kashmir'){ echo "selected";}?>>Jammu and Kashmir</option>
<option value="Jharkhand"<?php if($Fetch['state_permanent']=='Jharkhand'){ echo "selected";}?>>Jharkhand</option>
<option value="Karnataka"<?php if($Fetch['state_permanent']=='Karnataka'){ echo "selected";}?>>Karnataka</option>
<option value="Kerala"<?php if($Fetch['state_permanent']=='Kerala'){ echo "selected";}?>>Kerala</option>
<option value="Lakshadweep"<?php if($Fetch['state_permanent']=='Lakshadweep'){ echo "selected";}?>>Lakshadweep</option>
<option value="Madhya Pradesh"<?php if($Fetch['state_permanent']=='Madhya Pradesh'){ echo "selected";}?>>Madhya Pradesh</option>
<option value="Maharashtra"<?php if($Fetch['state_permanent']=='Maharashtra'){ echo "selected";}?>>Maharashtra</option>
<option value="Manipur"<?php if($Fetch['state_permanent']=='Manipur'){ echo "selected";}?>>Manipur</option>
<option value="Meghalaya"<?php if($Fetch['state_permanent']=='Meghalaya'){ echo "selected";}?>>Meghalaya</option>
<option value="Mizoram"<?php if($Fetch['state_permanent']=='Mizoram'){ echo "selected";}?>>Mizoram</option>
<option value="Nagaland"<?php if($Fetch['state_permanent']=='Nagaland'){ echo "selected";}?>>Nagaland</option>
<option value="Orissa"<?php if($Fetch['state_permanent']=='Orissa'){ echo "selected";}?>>Orissa</option>
<option value="Pondicherry"<?php if($Fetch['state_permanent']=='Pondicherry'){ echo "selected";}?>>Pondicherry</option>
<option value="Punjab"<?php if($Fetch['state_permanent']=='Punjab'){ echo "selected";}?>>Punjab</option>
<option value="Rajasthan"<?php if($Fetch['state_permanent']=='Rajasthan'){ echo "selected";}?>>Rajasthan</option>
<option value="Sikkim"<?php if($Fetch['state_permanent']=='Sikkim'){ echo "selected";}?>>Sikkim</option>
<option value="Tamil Nadu"<?php if($Fetch['state_permanent']=='Tamil Nadu'){ echo "selected";}?>>Tamil Nadu</option>
<option value="Tripura"<?php if($Fetch['state_permanent']=='Tripura'){ echo "selected";}?>>Tripura</option>
<option value="Uttaranchal"<?php if($Fetch['state_permanent']=='Uttaranchal'){ echo "selected";}?>>Uttaranchal</option>
<option value="Uttar Pradesh"<?php if($Fetch['state_permanent']=='Uttar Pradesh'){ echo "selected";}?>>Uttar Pradesh</option>
<option value="West Bengal"<?php if($Fetch['state_permanent']=='West Bengal'){ echo "selected";}?>>West Bengal</option>
</select></td>
</tr>

<tr>
  <td colspan="2" bgcolor="#666666" style="border-spacing: 2px;
  border-color: grey;  color:#fff;"><b>QUALIFICATION </b><font color="#990000">*</font></td>
  </tr>
<tr>
<td colspan="2"><table width="100%" style="border:0px; color:#000;font-family: 'Oswald', sans-serif; font-size:14px;">
 
<tr>
<td align="center" valign="middle"><b>Examination</b></td>
<td align="center" valign="middle"><strong>Marks obtained&nbsp;&nbsp;&nbsp;&nbsp;</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
<td align="center" valign="middle"><b>Percentage</b></td>
<td align="center" valign="middle"><b>Year of Passing</b></td>
</tr>
 
<tr>
<td>**Madhyamik or Equivalent :</td>
<td><input type="text" name="sf_marks" id="sf_marks" value="<?php echo $Fetch['sf_marks'];?>" class="abcd" style="width:173px;" /></td>
<td><input type="text" name="sf_percentage" id="sf_percentage" value="<?php echo $Fetch['sf_percentage'];?>" class="abcd" style="width:173px;"/></td>
<td><input type="text" name="sf_yr" id="sf_yr" value="<?php echo $Fetch['sf_yr'];?>" class="abcd" style="width:173px;"/></td>
</tr>
 
<tr>
<td>Higher Secondary or Equivalent :</td>
<td><input type="text" name="hs_marks" id="hs_marks" value="<?php echo $Fetch['hs_marks'];?>" class="abcd" style="width:173px;"/></td>
<td><input type="text" name="hs_percentage" id="hs_percentage" value="<?php echo $Fetch['hs_percentage'];?>" class="abcd" style="width:173px;"/></td>
<td><input type="text" name="hs_yr" id="hs_yr" value="<?php echo $Fetch['hs_yr'];?>" class="abcd" style="width:173px;"/></td>
</tr>
 
<tr>
<td>B.A. (Bachelor of Arts) or Equivalent :</td>
<td><input type="text" name="ba_marks" id="ba_marks" value="<?php echo $Fetch['ba_marks'];?>" class="abcd" style="width:173px;"/></td>
<td><input type="text" name="ba_percentage" id="ba_percentage" value="<?php echo $Fetch['ba_percentage'];?>" class="abcd" style="width:173px;"/></td>
<td><input type="text" name="ba_yr" id="ba_yr" value="<?php echo $Fetch['ba_yr'];?>" class="abcd" style="width:173px;" /></td>
</tr>
 
<tr>
<td>M.A. (Master of Arts) or Equivalent :</td>
<td><input type="text" name="ma_marks" id="ma_marks" value="<?php echo $Fetch['ma_marks'];?>" class="abcd" style="width:173px;"/></td>
<td><input type="text" name="ma_percentge" id="ma_percentge" value="<?php echo $Fetch['ma_percentge'];?>" class="abcd" style="width:173px;"/></td>
<td><input type="text" name="ma_yr" id="ma_yr" value="<?php echo $Fetch['ma_yr'];?>" class="abcd" style="width:173px;" /></td>
</tr>
</table></td>
</tr>
<tr>
  <td colspan="2" bgcolor="#666666" style="border-spacing: 2px;
  border-color: grey;color:#fff;"><b>Experience </b><font color="#990000">*</font></td>
  </tr>
<tr>
<td colspan="2"><table width="100%" style="border:0px; color:#000;font-family: 'Oswald', sans-serif; font-size:14px;">
 
<tr>
<td align="center"><b>Sl.No.</b></td>
<td align="center"><b>Course</b></td>
<td align="center"><strong>Marks obtained&nbsp;&nbsp;</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
<td align="center"><b>Percentage</b></td>
<td align="center"><b>Year of Passing</b></td>
</tr>
<tr>
<td>1</td>
<td><input type="text" name="ex1_course" id="ex1_course" value="<?php echo $Fetch['ex1_course'];?>" class="abcd" style="width:173px;"/></td>
<td><input type="text" name="ex1_marks" id="ex1_marks" value="<?php echo $Fetch['ex1_marks'];?>" class="abcd" style="width:173px;"/></td>
<td><input type="text" name="ex1_percentge" id="ex1_percentge" value="<?php echo $Fetch['ex1_percentge'];?>" class="abcd" style="width:173px;"/></td>
<td><input type="text" name="ex1_yr" id="ex1_yr" value="<?php echo $Fetch['ex1_yr'];?>" class="abcd" style="width:173px;"/></td>
</tr>
<tr>
<td>2</td>
<td><input type="text" name="ex2_course" id="ex2_course" value="<?php echo $Fetch['ex2_course'];?>" class="abcd" style="width:173px;"/></td>
<td><input type="text" name="ex2_marks" id="ex2_marks" value="<?php echo $Fetch['ex2_marks'];?>" class="abcd" style="width:173px;"/></td>
<td><input type="text" name="ex2_percentge" id="ex2_percentge" value="<?php echo $Fetch['ex2_percentge'];?>" class="abcd" style="width:173px;"/></td>
<td><input type="text" name="ex2_yr" id="ex2_yr" value="<?php echo $Fetch['ex2_yr'];?>" class="abcd" style="width:173px;"/></td>
</tr>
<tr>
<td>3</td>
<td><input type="text" name="ex3_course" id="ex3_course" value="<?php echo $Fetch['ex3_course'];?>" class="abcd" style="width:173px;"/></td>
<td><input type="text" name="ex3_marks" id="ex3_marks" value="<?php echo $Fetch['ex3_marks'];?>" class="abcd" style="width:173px;"/></td>
<td><input type="text" name="ex3_percentge" id="ex3_percentge" value="<?php echo $Fetch['ex3_percentge'];?>" class="abcd" style="width:173px;"/></td>
<td><input type="text" name="ex3_yr" id="ex3_yr" value="<?php echo $Fetch['ex3_yr'];?>" class="abcd" style="width:173px;"/></td>
</tr>
<tr>
  <td>4</td>
  <td><input type="text" name="other1_course" id="other1_course" value="<?php echo $Fetch['other1_course'];?>" class="abcd" style="width:173px;"/></td>
  <td><input type="text" name="other1_marks" id="other1_marks" value="<?php echo $Fetch['other1_marks'];?>" class="abcd" style="width:173px;"/></td>
<td><input type="text" name="other1_percentge" id="other1_percentge" value="<?php echo $Fetch['other1_percentge'];?>" class="abcd" style="width:173px;"/></td>
<td><input type="text" name="other1_yr" id="other1_yr" value="<?php echo $Fetch['other1_yr'];?>" class="abcd" style="width:173px;"/></td>
</tr>
<tr>
<td>5</td>
<td><input type="text" name="other2_course" id="other2_course" value="<?php echo $Fetch['other2_course'];?>" class="abcd" style="width:173px;"/></td>
<td><input type="text" name="other2_course" id="other2_course" value="<?php echo $Fetch['other2_course'];?>" class="abcd" style="width:173px;"/></td>
<td><input type="text" name="other2_percentge" id="other2_percentge" value="<?php echo $Fetch['other2_percentge'];?>" class="abcd" style="width:173px;"/></td>
<td><input type="text" name="other2_yr" id="other2_yr" value="<?php echo $Fetch['other2_yr'];?>" class="abcd" style="width:173px;"/></td>
</tr>
</table></td>
</tr>

<tr>
<td><img src="img/formbullet.gif" style="width:12px; height:13px;" />UPLOAD YOUR SCANNED PHOTO :</td>
<td><?php if($Fetch['image']!=''){?> <img src="../photo/<?php echo $Fetch['image'];?>" style="width:120px; height:50px;"><?php }?><br><input type="file" name="image" id="image" value="" /></td>
</tr>
<tr>
<td><img src="img/formbullet.gif" style="width:12px; height:13px;" />UPLOAD YOUR SCANNED SIGNATURE :</td>
<td><?php if($Fetch['signature']!=''){?> <img src="../signature/<?php echo $Fetch['signature'];?>" style="width:120px; height:50px;"><?php }?><br><input type="file" name="image_sig" id="image_sig" value=""  /></td>
</tr>
 
<!----- Course ---------------------------------------------------------->
 
<!----- Submit and Reset ------------------------------------------------->
<tr>
<td colspan="2" align="center">
<input type="submit" id="submit" name="submit" value="Done" class="button" style="float:none; padding: 6px 30px 10px 30px; font-family: 'Oswald', sans-serif;"></tr>
</table>
</form>    </td>
  </tr>
</table>
                 </td>
        </tr>
    </table>
</div>
</body>
</html>