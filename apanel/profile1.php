<?php 
include_once ("../admin/include/connection.php");
    if(empty($_SESSION['user'])) 
    { 
        header("Location: index.php"); 
        die("Redirecting to index.php"); 
    } 
	?>
    <!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>

    <link rel="stylesheet" href="css/main.css"/>
    <link rel="stylesheet" type="text/css" href="css/formstyle.css">

</head>
<body>
<?php include "header.php" ?>
<div id="siteWrapper">
    <table class="page">
        <tr>
            <td style="width: 100%">
                <form name="form1" method="post" action="http://wbsscregistration.nic.in/online2/form3.php" autocomplete="off"><table align="center" class="table" cellspacing="6" width="93%">
  <tbody>
  
   
<tr class="formfieldheading" id="lang_disp">
    <td colspan="3" class="mou"><strong>Language Known : </strong><font color="red">*</font></td>
  </tr>
  <tr>
  <td id="lang_disp1" colspan="4">
		   <table width="100%" border="0" align="center">
		  <tbody><tr>	
		<td height="25" width="200" class="table"><img src="img/formbullet.gif" style="width:12px !important; height:13px !important;">&nbsp;&nbsp;Bengali :</td>
		<td height="25" width="1200" class="table" colspan="3">
        Read <input type="checkbox" id="bng_rd" name="bng_rd" value="Y">
        Write <input type="checkbox" id="bng_wrt" name="bng_wrt" value="Y">
        Speak <input type="checkbox" id="bng_spk" name="bng_spk" value="Y">
        </td>
        </tr>
		</tbody></table></td></tr>
      <tr>
  <td id="lang_disp1" colspan="4">
		   <table width="100%" border="0" align="center">
		  <tbody><tr>	
		<td height="25" width="200" class="table"><img src="img/formbullet.gif" style="width:12px !important; height:13px !important;">&nbsp;&nbsp;English :</td>
		<td height="25" width="1200" class="table" colspan="3">
        Read <input type="checkbox" id="bng_rd" name="bng_rd" value="Y">
        Write <input type="checkbox" id="bng_wrt" name="bng_wrt" value="Y">
        Speak <input type="checkbox" id="bng_spk" name="bng_spk" value="Y">
        </td>
        </tr>
		</tbody></table></td></tr>
      <!--<tr class="formfieldheading">
        <td colspan="3" class="mou"><strong>Name of the Centre</strong> </td>
      </tr>-->
      <!--<tr>
        <td><img src="img/formbullet.gif" style="width:12px !important; height:13px !important;" alt="test">&nbsp;&nbsp;Select Centre<font color="red">*</font> : </td>
        <td colspan="2" id="centerByState">
		<select name="centercode" id="centercode">
		<option value="0" class="selInstruct">[ Select Centre ]</option>
                    <option value="1">Bankura (01) </option>
                        <option value="2">Bardhaman (02)</option>
                        <option value="3">Birbhum (03)</option>
                        <option value="4">Darjeeling (04)</option>
                        <option value="5">Howrah (05)</option>
                        <option value="6">Hoogly (06)</option>
                        <option value="7">Jalpaiguri (07)</option>
                        <option value="8">CoochBehar (08)</option>
                        <option value="9">Malda (09)</option>
                        <option value="10">Paschim Medinipur (10)</option>
                        <option value="11">Purba Medinipur (11)</option>
                        <option value="12">Murshidabad (12)</option>
                        <option value="13">Nadia (13)</option>
                        <option value="14">Purulia (14)</option>
                        <option value="15">North 24 Parganas (15)</option>
                        <option value="16">South 24 Parganas (16)</option>
                        <option value="17">Dakshin Dinajpur (17)</option>
                        <option value="18">Uttar Dinajpur (18)</option>
                        <option value="19">Kolkata North (19)</option>
                        <option value="20">Kolkata South (20)</option>
                        <option value="21">Salt Lake (21)</option>
                        <option value="22">Siliguri (22)</option>
                        <option value="23">Alipurduar (23)</option>
                        <option value="24">Asansol (24)</option>
                   </select>	 
	   </td>
      </tr>-->
       <tr class="formfieldheading">
        <td colspan="3" class="mou">
         <strong>Personal Details</strong>        </td>
      </tr>
      <tr>
        <td width="28%" valign="">
          <img src="img/formbullet.gif" style="width:12px !important; height:13px !important;">&nbsp;&nbsp;Referral  ID <font color="red">*</font> :        </td>
        <td colspan="2">
         <input name="cand_name" type="text" maxlength="30" id="cand_name" value="" size="40" title="Name as recorded in Matriculation Certificate"><br>
                  </td>
		  
      </tr>
      <tr>
        <td width="28%" valign="top">
          <img src="img/formbullet.gif" style="width:12px !important; height:13px !important;">&nbsp;&nbsp;Mobile No<font color="red">*</font> :        </td>
        <td colspan="2">
         <input name="cand_name" type="text" maxlength="30" id="cand_name" value="" size="40" title="Name as recorded in Matriculation Certificate"><br>
                  </td>
		  
      </tr>
      <tr>
        <td width="28%" valign="top">
          <img src="img/formbullet.gif" style="width:12px !important; height:13px !important;">&nbsp;&nbsp;Name<font color="red">*</font> :        </td>
        <td colspan="2">
         <input name="cand_name" type="text" maxlength="30" id="cand_name" value="" size="40" title="Name as recorded in Matriculation Certificate"><br>
         <span class="note"><b><u>Note </u>:</b> Name as recorded in the Matriculation/Secondary Examination Certificate.<br>
         Please do not use any prefix such as Mr. or Ms. etc.</span>         </td>
		  
      </tr>
      <tr>
        <td valign="top"><img src="img/formbullet.gif" style="width:12px !important; height:13px !important;">&nbsp;&nbsp;Father's Name<font color="red">*</font> : </td>
        <td colspan="2"><input name="fname" type="text" maxlength="30" size="40" id="fname" value="">           <br>
          <span class="note">[Please do not use any prefix such as Shri or Dr. etc.]</span></td>
      </tr>
      <tr>
        <td valign="top"><img src="img/formbullet.gif" style="width:12px !important; height:13px !important;">&nbsp;&nbsp;Mother's Name<font color="red">*</font> : </td>
        <td colspan="2"><input name="mname" type="text" maxlength="30" size="40" id="mname" value=""> 		
          <br>
		  
          <span class="note">[Please do not use any prefix such as Smt or Dr. etc.]</span></td>
      </tr>
	  <!-- <tr>
	  <td></td>
	  
	  </tr>
	  <tr>
	  <td></td>
	  
	  </tr>
	   <tr>
	  <td></td>
	  
	  </tr>
	   <tr>
	  <td></td>
	  
	  </tr>-->

	  
      <tr>
        <td valign="top"><img src="img/formbullet.gif" style="width:12px !important; height:13px !important;">&nbsp;&nbsp;Date of Birth<font color="red">*</font> : </td>
		        <td colspan="2">
          <select name="date1" id="date1" onChange="computeAge(this.form,2015,01,02)">
          <option class="seldate" value="0">Day</option>
        <option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option></select>		  
          <select name="month1" id="month1" onChange="computeAge(this.form,2015,01,02)">
            <option class="seldate" value="0">Month</option><option value="01">Jan</option><option value="02">Feb</option><option value="03">Mar</option><option value="04">Apr</option><option value="05">May</option><option value="06">Jun</option><option value="07">Jul</option><option value="08">Aug</option><option value="09">Sep</option><option value="10">Oct</option><option value="11">Nov</option><option value="12">Dec</option>          </select>
		  
          &nbsp;
		  
		            <select name="year1" id="year1" onChange="computeAge(this.form,2015,01,02)">
          <option class="seldate" value="0">Year</option>
          <option value="1954">1954</option><option value="1955">1955</option><option value="1956">1956</option><option value="1957">1957</option><option value="1958">1958</option><option value="1959">1959</option><option value="1960">1960</option><option value="1961">1961</option><option value="1962">1962</option><option value="1963">1963</option><option value="1964">1964</option><option value="1965">1965</option><option value="1966">1966</option><option value="1967">1967</option><option value="1968">1968</option><option value="1969">1969</option><option value="1970">1970</option><option value="1971">1971</option><option value="1972">1972</option><option value="1973">1973</option><option value="1974">1974</option><option value="1975">1975</option><option value="1976">1976</option><option value="1977">1977</option><option value="1978">1978</option><option value="1979">1979</option><option value="1980">1980</option><option value="1981">1981</option><option value="1982">1982</option><option value="1983">1983</option><option value="1984">1984</option><option value="1985">1985</option><option value="1986">1986</option><option value="1987">1987</option><option value="1988">1988</option><option value="1989">1989</option><option value="1990">1990</option><option value="1991">1991</option><option value="1992">1992</option><option value="1993">1993</option><option value="1994">1994</option><option value="1995">1995</option><option value="1996">1996</option><option value="1997">1997</option>          </select><br>
          <span class="note">[Date of Birth as recorded in the Matriculation/Secondary Examination Certificate]</span>          </td>
      </tr>
      <tr>

      	<td valign="top"><img src="img/formbullet.gif" style="width:12px !important; height:13px !important;">&nbsp;&nbsp;Age as on
		   	    01-01-2015 :</td>
         	 
        <td width="63%"><div id="displayAge">
		<strong id="y">0</strong>&nbsp;Years&nbsp;<strong id="m">0</strong>&nbsp;Months&nbsp;<strong id="d">0</strong>&nbsp;Days
</div>
        <input type="hidden" name="da" id="da" size="2" value="0">
        <input type="hidden" name="ma" id="ma" size="2" value="0">
        <input type="hidden" name="ya" id="ya" size="2" value="0">
</td>
      </tr>
      <tr>
        <td valign="top">
          <img src="img/formbullet.gif" style="width:12px !important; height:13px !important;">&nbsp;&nbsp;Gender<font color="red">*</font> :        </td>
        <td colspan="2">
		   			  
			    <select name="sex" id="sex">
				<option value="2">Male</option>
				<option value="1">Female</option>
			</select>
			          </td>
      </tr>
      <tr>
        <td>
         <img src="img/formbullet.gif" style="width:12px !important; height:13px !important;">&nbsp;&nbsp;Nationality<font color="red">*</font> :        </td>
        <td colspan="2">
          <select name="nationality" id="nationality"><option value="1">Indian</option><option value="2">Others</option></select>          </td>
      </tr>
      <tr>
        <td><img src="img/formbullet.gif" style="width:12px !important; height:13px !important;">&nbsp;&nbsp;Category<font color="red">*</font> : </td>
		
       <td>
	      <select name="community" id="community" onChange="show_certificate_state();">
          <option class="selInstruct" value="0">Select</option>
            <option id="3" value="3">BC:A</option><option id="4" value="4">BC:B</option><option id="1" value="1">SC</option><option id="2" value="2">ST</option><option id="9" value="9">Unreserved</option>          </select>
         <!-- <br>
          <span class="note">[Candidates belonging to OBCs but
          coming in the ' Creamy Layer ' and thus not being entitled to
        OBC reservation should indicate their category as ' General '] </span> -->
       <span id="cat_crt_st" style="display:none">&nbsp;&nbsp;Certificate Issued From<font color="red">*</font> :
		
       
	      <select name="cat_cert" id="cat_cert">
          <option class="selInstruct" value="0">Select</option>
          <option value="1">Andaman &amp; Nicobar Island</option><option value="2">Andhra Pradesh</option><option value="3">Arunachal Pradesh</option><option value="4">Assam</option><option value="5">Bihar</option><option value="6">Chandigarh</option><option value="7">Chhattisgarh</option><option value="8">Dadar &amp; Nagar Haveli</option><option value="9">Daman &amp; Diu</option><option value="10">Delhi</option><option value="11">Goa</option><option value="12">Gujarat</option><option value="13">Haryana</option><option value="14">Himachal Pradesh</option><option value="15">Jammu &amp; Kashmir</option><option value="16">Jharkhand</option><option value="17">Karnataka</option><option value="18">Kerala</option><option value="19">Lakshadweep</option><option value="20">Madhya Pradesh</option><option value="21">Maharashtra</option><option value="22">Manipur</option><option value="23">Meghalaya</option><option value="24">Mizoram</option><option value="25">Nagaland</option><option value="26">Orissa</option><option value="27">Pudduchery</option><option value="28">Punjab</option><option value="29">Rajasthan</option><option value="30">Sikkim</option><option value="31">Tamil Nadu</option><option value="32">Tripura</option><option value="33">Uttar Pradesh</option><option value="34">Uttrakhand</option><option value="35">West Bengal</option>          </select></span></td>
        
      </tr>

	  <!--
	  <tr>
        <td><img src="images/formbullet.gif">&nbsp;&nbsp;Fee Exemption claimed : </td>
        <td colspan="2">
		</td>
      </tr>
	  -->
        <tr style="">
                <td>
                  <img src="img/formbullet.gif" style="width:12px !important; height:13px !important;">&nbsp; Person with disability (40% &amp; above) : </td>
                <td>
                <table border="0" cellpadding="0" cellspacing="0" class="table">
                <tbody><tr>
                  <td width="7%">
				   
				  <select name="handicapp" id="handicapp" onChange="phyhan();"><option value="2">No</option><option value="1">Yes</option></select></td><td id="ycategory" style="display:none;float:left;margin-left:2px;width:auto">Code: <select name="hcategory" id="hcategory" onChange="VHhan()"><option value="0">[ Select ]</option><option value="11">LV (Blindness or Low Vision)</option><option value="12">HI (Hearing Impairment)</option><option value="13">LMCP (Locomotor Disability or Cerebral Palsy)</option></select></td><td id="vhcategory" style="display:none;float:left;margin-left:4px;">Scribe required:<select name="scribe" id="scribe" onChange="dispScribe()"><option value="0">[ Select ]</option><option value="2">No</option><option value="1">Yes</option></select></td><td id="spancategory" style="display:none;float:left;margin-left:3px;"> Medium:<select name="scribe_medium" id="scribe_medium"><option value="1">English</option><option value="2">Bengali</option><option value="3">Hindi</option><option value="4">Urdu</option><option value="5">Nepali</option></select></td>				  
                </tr></tbody></table>          </td></tr>
	
	<tr>
        <td height="25"> <img src="img/formbullet.gif" style="width:12px !important; height:13px !important;" alt="x1">&nbsp; Whether Ex-Serviceman:</td>
        <td><select name="exservice" id="exservice" onChange="show_length()"><option value="2">No</option><option value="1">Yes</option></select>        <script>
		function show_length()
		{
			if($("#exservice").val()==1)
			{
				$("#service_len").show();
			}
			else
			{
				$("#service_length").val('');
				$("#service_len").hide();
			}
		}
		</script>
		<span class="table" id="service_len" style="display:none;">Length of Service (in years):&nbsp;
		  <input type="text" style="text-align:center" onKeyUp="checknumeric(this.value)" size="2" maxlength="2" name="service_length" id="service_length" value="">
        </span>  </td> 
     </tr>
      
      <tr id="rowb1" style="display:none">
    <td>
    	<img src="img/formbullet.gif" style="width:12px !important; height:13px !important;">&nbsp;&nbsp;If Yes enter the category code :    </td>
    <td>
      <input name="exsercode" readonly id="exsercode" type="text" size="1" maxlength="2" value="">
		<span class="linkspan" onClick="showeqdetails1()"><img src="./WBSSC - Registration_files/info.gif" title="details"><b>View Details</b></span> </td>
  </tr>
   <tr>
        <td height="25"> <img src="img/formbullet.gif" style="width:12px !important; height:13px !important;" alt="x1">&nbsp; Whether Exempted Category:</td>
        <td><select name="exempt" id="exempt" onChange="show_ec_crt()"><option value="2">No</option><option value="1">Yes</option></select>        <script>
		function show_ec_crt()
		{
			if($("#exempt").val()==1)
			{
				$("#ec_crt").show();
			}
			else
			{
				$("#ec_crt_no").val('');
				$("#ec_crt").hide();
			}
		}
		</script>
		<span class="table" id="ec_crt" style="display:none;">EC Certificate No:&nbsp;
		  <input type="text" style="text-align:center" onKeyUp="checknumeric(this.value)" size="50" maxlength="50" name="ec_crt_no" id="ec_crt_no" value="">
        </span>  </td> 
      </tr>
  <tr style="display:none">
    <td>
    	<img src="img/formbullet.gif" style="width:12px !important; height:13px !important;">&nbsp;&nbsp;Seeking age relaxation :</td>
    <td>
      <select name="agerelax" id="agerelax" onChange="relax();"><option value="2">No</option><option value="1">Yes</option></select>     
	</td>
  </tr>
  
  <tr id="rowb" style="display:none">
    <td>
    	<img src="img/formbullet.gif" style="width:12px !important; height:13px !important;">&nbsp;&nbsp;If Yes enter the category code :    </td>
    <td>
      <input name="agerelaxcode1" readonly id="agerelaxcode1" type="text" size="1" maxlength="2" value="">
		<span class="linkspan" onClick="showeqdetails()"><img src="./WBSSC - Registration_files/info.gif" title="details"><b>View Details</b></span> </td>
  </tr>


<!--Sports Quota-->
<tr style="display:none">
    <td>
    	<img src="img/formbullet.gif" style="width:12px !important; height:13px !important;">&nbsp; Eligible under Meritorious Sports Persons Quota :    </td>
    
    <td>
      <select name="squota" id="squota" onChange="relaxsquota();"><option value="2">No</option><option value="1">Yes</option></select>     </td>
 </tr>
  <tr id="rowsq" style="display:none">
    <td>
    	<img src="img/formbullet.gif" style="width:12px !important; height:13px !important;">&nbsp;&nbsp;If Yes, enter the category code :    </td>
    <td>
      <input name="sqcode" readonly id="sqcode" type="text" size="1" maxlength="2" value="">
		<span class="linkspan" onClick="sqdetails()"><img src="./WBSSC - Registration_files/info.gif" title="details"><b>View Details</b></span> </td>
  </tr>
<!--Sports Quota-->

<tr>
    <td>
    	<img src="img/formbullet.gif" style="width:12px !important; height:13px !important;">&nbsp;&nbsp;Departmental Candidate :    </td>
    
    <td>
      <select name="deptcand" id="deptcand"><option value="2">No</option><option value="1">Yes</option></select>     </td>
  </tr>
  <tr id="rowd1" style="display:none">
    <td>
    	<img src="img/formbullet.gif" style="width:12px !important; height:13px !important;">&nbsp;&nbsp;If Yes enter the Department code :    </td>
    <td>
      <input name="dptccode" readonly onClick="ddetails()" id="dptccode" type="text" size="1" maxlength="4" value="">
		<span class="linkspan" onClick="ddetails()"><img src="./WBSSC - Registration_files/info.gif" title="details"><b>View Details</b></span>    </td>
  </tr>

  <tr>
    <td><img src="img/formbullet.gif" style="width:12px !important; height:13px !important;">&nbsp;&nbsp;Whether belong to Minority Community :</td>
    <td>
      <select name="minorcommunity" id="minorcommunity"><option value="2">No</option><option value="1">Yes</option>     </select></td>
  </tr>
  
  

      <tr class="formfieldheading">
        <td colspan="3" class="mou">
         <strong>Postal Address</strong>        </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="2">
         <span class="note">
          [Do not enter your name again in the address field]         </span>        </td>
      </tr>
      <tr>
        <td>
         <img src="img/formbullet.gif" style="width:12px !important; height:13px !important;">&nbsp;&nbsp;Line 1<font color="red">*</font> :        </td>
        <td colspan="2">
        <input name="add1" type="text" id="add1" size="40" value="" maxlength="30">        </td>
      </tr>
      <tr>
        <td>
          <img src="img/formbullet.gif" style="width:12px !important; height:13px !important;">&nbsp;&nbsp;Line 2<font color="red">*</font> :        </td>
        <td colspan="2">
        <input name="add2" type="text" id="add2" size="40" value="" maxlength="30">        </td>
      </tr>
      <tr>
        <td>
          <img src="img/formbullet.gif" style="width:12px !important; height:13px !important;">&nbsp;&nbsp;Line 3 :        </td>
        <td colspan="2">
        <input name="po" type="text" id="po" size="40" value="" maxlength="30">        </td>
      </tr>
      <tr>
        <td>
          <img src="img/formbullet.gif" style="width:12px !important; height:13px !important;">&nbsp;&nbsp;District<font color="red">*</font> :    
		</td>
        <td colspan="2">
        <input name="district" type="text" id="district" size="40" value="" maxlength="30">    
			
		</td>
      </tr>
      <tr>
        <td>
                <img src="img/formbullet.gif" style="width:12px !important; height:13px !important;">&nbsp;&nbsp;State/UT<font color="red">*</font> :        </td>
        <td colspan="2">
          <select name="state" id="state">
            <option value="0">[ Select State ]</option>
          <option value="1">Andaman &amp; Nicobar Island</option><option value="2">Andhra Pradesh</option><option value="3">Arunachal Pradesh</option><option value="4">Assam</option><option value="5">Bihar</option><option value="6">Chandigarh</option><option value="7">Chhattisgarh</option><option value="8">Dadar &amp; Nagar Haveli</option><option value="9">Daman &amp; Diu</option><option value="10">Delhi</option><option value="11">Goa</option><option value="12">Gujarat</option><option value="13">Haryana</option><option value="14">Himachal Pradesh</option><option value="15">Jammu &amp; Kashmir</option><option value="16">Jharkhand</option><option value="17">Karnataka</option><option value="18">Kerala</option><option value="19">Lakshadweep</option><option value="20">Madhya Pradesh</option><option value="21">Maharashtra</option><option value="22">Manipur</option><option value="23">Meghalaya</option><option value="24">Mizoram</option><option value="25">Nagaland</option><option value="26">Orissa</option><option value="27">Pudduchery</option><option value="28">Punjab</option><option value="29">Rajasthan</option><option value="30">Sikkim</option><option value="31">Tamil Nadu</option><option value="32">Tripura</option><option value="33">Uttar Pradesh</option><option value="34">Uttrakhand</option><option value="35">West Bengal</option>          </select> </td>
      </tr>
      <tr>
        <td>
          <img src="img/formbullet.gif" style="width:12px !important; height:13px !important;">&nbsp;&nbsp;Pincode<font color="red">*</font> :        </td>
        <td colspan="2">
        <input name="pincode" type="text" id="pincode" size="4" maxlength="6" value="" onKeyUp="checknumericpin(this.value);">        </td>
		
		<!-- done by Ankita Dey  -->
		<script>
		function checknumericpin(v)
		{
		   //alert(v);
		   if(isNaN(v))
		   {
		     alert("Please use Numeric 0-9 only");
			 form1.pincode.value='';
			 form1.pincode.focus();
			 
		   }
		}
		</script>
		<!-- done by Ankita Dey  -->
      </tr>
	         <tr>
        <td>
          <img src="img/formbullet.gif" style="width:12px !important; height:13px !important;">&nbsp;&nbsp;Mobile  <font color="red">*</font> :    </td>
        <td colspan="2">
        <input name="mobile" type="text" id="mobile" size="15" maxlength="10" value="" onKeyUp="checknumericmob(this.value)">
		<!-- done by Ankita Dey  -->
		<script>
		function checknumericmob(v)
		{
		   if(isNaN(v))
		   {
		       alert("Please use Numeric 0-9 only");
			   form1.mobile.value='';
			   form1.mobile.focus();
		   }    
		}
		</script>
		<!-- done by Ankita Dey  -->
      </td></tr>
      <tr>
        <td>
          <img src="img/formbullet.gif" style="width:12px !important; height:13px !important;">&nbsp;&nbsp;E-Mail   :       
		</td>
        <td colspan="2">
        <input name="email" type="text" id="email" size="40" value="">        
		</td>
		
      </tr>
  <tr>
    <td><img src="img/formbullet.gif" style="width:12px !important; height:13px !important;">&nbsp;&nbsp;Enter the Security Code<font color="red">*</font> :</td>
    <td> 
    <input type="text" name="captcha" size="6" maxlength="4" id="captcha">&nbsp;&nbsp;
    <img src="./WBSSC - Registration_files/captcha.php" alt="captcha image" id="captchaimg">&nbsp;&nbsp;<a href="http://wbsscregistration.nic.in/online2/#anchor_captcha" onClick="document.getElementById(&#39;captchaimg&#39;).src=&#39;captcha.php?&#39;+Math.random();document.form1.captcha.focus();" id="change-image"><font color="#000066">Change 
    Image</font></a><a name="anchor_captcha"></a></td>
  </tr>
   <input type="hidden" name="captcha1" id="captcha1" value="7269">  
	  
    </tbody></table>
 
  <div style="margin:1%">
  <span class="flashnote">(*) - Star marked fields are essentially to be filled by the candidate.</span>
  </div>
  <p align="center"><input type="reset" name="Reset" value="Reset" class="button">
    &nbsp;&nbsp;
    	
    <input name="Submit2" type="button" onClick="validform1()" value="Continue" class="button">
  </p>
  </form>
            </td>
        </tr>
    </table>
</div>
</body>
</html>