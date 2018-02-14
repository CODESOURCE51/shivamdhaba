<?php 


    require("connection.php"); 
     

    if(empty($_SESSION['user'])) 
    { 

        header("Location: index.php"); 

        die("Redirecting to index.php"); 
    } 
	
    $user=$_SESSION['user']['username'];
?>

 
<!----------------------validation----------------------------->

 <script src="assets/jquery.min.js"></script>  
  <script type="text/javascript" src="js/validate.js"></script>  
<script type="text/javascript">
$(document).ready(function(){ 
    

	$("#mkt").validate({
		rules: {
			zone: {
				required: true
			},
			c_id: {
				required: true
			},
			area: {
				required: true
			}
			
		 
		}, //end rules
		messages: {
			

			zone: {
				required: "<br /> Please select Zone."
			
			},
			c_id: {
				required:" <br /> Please select Zone."
			},
			area: {
				required: "<br /> Please select Area."
			
			}
			
			
		} //end messages
		
	}); //end validate
  });
</script>

<!-----------------------------Two drops-------------------->
<script>
function getarea(id)
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("area").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("POST","ajax_areaser.php?id="+id,true);
xmlhttp.send();
}
</script>
<script>
function getcust(id)
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("c_id").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("POST","ajax_cust.php?id="+id,true);
xmlhttp.send();
}
</script>
<!-----------------------------Two drops-------------------->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cable-Operator</title>
<link href="css/template.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/multiple-select.css" />

<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #FFFFFF;
}
</style>
<style type="text/css">
* {margin: 0; padding: 0}
.shadow {width: 100%; height: 100%; position: fixed; background-color: #444; top: 0; left:0; z-index: 400}
#modal {z-index: 500; position: absolute; background: #fff; top: 50px;}
#modal iframe {width: 100%; height: 100%}
#closeModal {position: absolute; top: -15px; right: -15px; font-size: 0.8em; }
#closeModal img {width: 30px; height: 30px;}
.sevendays{
	background-color:#FF8000;
}
.expiredays{
	background-color:#F32136;
}
.deactivated{
	background-color:#CE6474;
}
.beforeseven{
	background-color:#00FF66;
}
</style>


<link rel="stylesheet" href="blink.css" type="text/css" />
<script type="text/javascript" src="jquery.blink.js" /></script>


<script type="application/ecmascript">
var shadow, modalX, modalY, modalWidth, modalHeight;

function modal(url) {
    return '<div id="modal"><a id="closeModal" title="close" href="javascript:;"><img src="http://findicons.com/files/icons/2212/carpelinx/64/fileclose.png" alt="close" /></a><iframe src="' + url + '"></iframe></div>';
}
shadow = "<div class='shadow'></div>";

$(document).ready(function() {
    $(".myModal").on("click", function(e) {
        e.preventDefault();
        // get size and position
        modalWidth = $(this).data("width");
        modalHeight = $(this).data("height");
        modalX = (($(window).innerWidth()) - modalWidth) / 2;
        modalY = (($(window).innerHeight()) - modalHeight) / 2;
        // append shadow layer
        $(shadow).prependTo("body").css({
            "opacity": 0.7
        });
        // append modal
        $(modal(this.href)).appendTo("body").css({
            "top": modalY,
            "left": modalX,
            "width": modalWidth,
            "height": modalHeight
        });
        // close and remove
        $("#closeModal").on("click", function() {
            $("#modal, .shadow").remove();
        });
        $(document).keyup(function(event) {
            if (event.keyCode === 27) {
                $("#modal, .shadow").remove();
            }
        }); //keyup
    }); // on
}); // ready
</script>


</head>

<body topmargin="0" onLoad="doOnLoad();">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th height="60" align="center" valign="middle"><?php include_once("header.php"); ?></th>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="top"><table width="1024" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #CCC;">
      <tr>
        <td><?php include_once("menu.php"); ?></td>
      </tr>
      <tr>
        <td height="30">&nbsp;</td>
      </tr>
      <tr>
        <td height="50" align="center"><form action="" method="post" name="mkt" id="mkt" enctype="multipart/form-data"> 
          <input type="hidden" name="mode" value="search" />
          <table width="450" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="40" colspan="3" align="center" valign="middle"><p style="background-color:#fff1ab; padding:5px; text-align:center; font-family:Verdana, Geneva, sans-serif; font-size:22px; border:1px solid #EFDC86; border-radius:25px;">Customer Search</p></td>
              </tr>
            <tr>
              <td width="165" height="18" align="left" valign="middle" class="form_txtr">&nbsp;</td>
              <td width="9" height="18" align="left" valign="middle">&nbsp;</td>
              <td width="276" height="18" align="left" valign="middle" class="error">&nbsp;</td>
              </tr>
            <tr>
              <td height="35" align="left" valign="middle" class="master">Zone</td>
              <td height="35" align="left" valign="middle">:</td>
              <td height="35" align="left" valign="middle">
                <select name="zone" id="zone" class="rounded" onChange="getarea(this.value)">
                  <option value="">Select Zone</option>
                  <?php
                 $sql = "SELECT DISTINCT zone from `location`";
                 $rs = mysql_query($sql);
                 while($row = mysql_fetch_array($rs))
                  {
                  ?>
                  <option value="<?php echo $row['zone']; ?>"><?php echo $row['zone']; ?></option>
                  <?php } ?> 
                  </select></td>
              </tr>
            <tr>
              <td height="35" align="left" valign="middle" class="master">Area</td>
              <td height="35" align="left" valign="middle">:</td>
              <td height="35" align="left" valign="middle" id="area"></td>
              </tr>
            <!--<tr>
              <td height="35" align="left" valign="middle" class="master">Customer Name</td>
              <td height="35" align="left" valign="middle">:</td>
              <td height="35" align="left" valign="middle" id="c_id">&nbsp;</td>
              </tr>-->
            <tr>
              <td height="18" align="left" valign="middle">&nbsp;</td>
              <td height="18" align="left" valign="middle">&nbsp;</td>
              <td height="18" align="left" valign="middle">&nbsp;</td>
              </tr>
            <tr>
              <td height="35" align="left" valign="middle">&nbsp;</td>
              <td height="35" align="left" valign="middle">&nbsp;</td>
              <td height="35" align="left" valign="middle"><input type="image" src="image/submit.jpg" border="0" name="Search" id="Search" value="submit" /></td>
              </tr>
            </table>
  </form></td>
      </tr>
      <tr>
        <td height="30">&nbsp;</td>
      </tr>
      <tr>
        <td height="150" align="center"><table width="1000" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="80">

              <table width="1000" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
                <tr>
                  <td width="111" height="43" align="center" bgcolor="#fff1ab" class="drive">Client Name</td>
                  <td width="99" height="43" align="center" bgcolor="#fff1ab" class="drive">ClientId</td>
                  <td width="81" height="43" align="center" bgcolor="#fff1ab" class="drive">Zone</td>
                  <td width="80" align="center" bgcolor="#fff1ab" class="drive">Area</td>
                  <td width="112" height="43" align="center" bgcolor="#fff1ab" class="drive">Subscription Date</td>
                  <td width="142" height="43" align="center" bgcolor="#fff1ab" class="drive">Box No.</td>
                  <td width="129" height="43" align="center" bgcolor="#fff1ab" class="drive">Contact No</td>
                  <td width="91" align="center" bgcolor="#fff1ab" class="drive">Package</td>
                  <td width="72" align="center" bgcolor="#fff1ab" class="drive">Addons</td>
                  <td width="70" align="center" bgcolor="#fff1ab" class="drive">Status</td>
                  <!--<td width="94" align="center" bgcolor="#fff1ab" class="drive">Delete</td>-->
                </tr>
                <tr>
                  <td colspan="10" align="center"> <?php
if(isset ($_REQUEST['mode']) && $_REQUEST['mode']=='search')
{
	//$c_id= mysql_real_escape_string($_REQUEST['c_id']);
	$zone= mysql_real_escape_string($_REQUEST['zone']);
	$area= mysql_real_escape_string($_REQUEST['area']);
	
$sql5 = "SELECT * from `client_entry` where `zone`='".$zone."' and `area`='".$area."'";
$rs5 = mysql_query($sql5);


		  
while ($row= mysql_fetch_array($rs5))
{ 
	 
	$present_date= date("Y-m-d");
	$SPkg= mysql_query("SELECT * from `pkg_assign` where `c_id`='".$row['c_id']."'");
	$SpkgRws= mysql_num_rows($SPkg);
	$select_client = mysql_fetch_array($SPkg);
	$completion_date= $select_client['from_date'];
	$to_date= $select_client['to_date'];
	
	$query_2= "SELECT * FROM `addons_payment` WHERE `c_id`='".$row['c_id']."'";
	$result_2= mysql_query($query_2) or die(mysql_error());
	$row_2= mysql_num_rows($result_2);
	
	$diff_date = "SELECT DATEDIFF('$to_date','$present_date') AS DiffDate";
	$c_date = mysql_query($diff_date) or die (mysql_error());
	$row_date= mysql_fetch_array($c_date); 
	$count_day= $row_date['DiffDate'];
	if($count_day > 7){ $cla='beforeseven'; } 
	elseif($count_day <= 7 && $count_day > 1 ){ $cla='sevendays'; } 
	elseif($count_day<=1 && $count_day>=0){ $cla='myClass'; }
	elseif($count_day < 0){ $cla='expiredays';} 
	 
?></td>
                  <!-- <td align="center">&nbsp;</td>-->
                </tr>
                <tr>
                  <form name="drive" id="drive" method="post" action="edit_client.php?id=<?php echo $row['id'];?>" enctype="multipart/form-data">
                    <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['c_name']; ?></td>
                    <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt">
                    <a href="clients.php?cid=<?php echo $row['c_id']; ?>" class="myModal" data-width="520" data-height="500">
					<?php echo $row['c_id']; ?></a></td>
                    <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['zone']; ?></td>
                    <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['area']; ?></td>
                    <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['subscription_date']; ?></td>
                    <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['box_no']; ?></td>
                    <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['phone']; ?></td>
                    <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt">
                    <?php if($SpkgRws!=''){?>
                    <a href="pkg_des.php?c_id=<?php echo $row['c_id'];?>" class="myModal" data-width="930" data-height="300">
                    <img src="image/pkg.png" height="25" width="25" /></a>
                    <?php }else{?>
                    Package Not Assigned
                    <?php }?>
                    </td>
                    <td align="center" bgcolor="#FEEDE7" class="drive_txt">
                    <?php if($SpkgRws!=''){ if($row_2 > 0){?>
                    <a href="add_des.php?c_id=<?php echo $row['c_id'];?>" class="myModal" data-width="930" data-height="300">
                    <img src="image/addon.png" height="25" width="25"/></a>
					<?php }else{ echo "No Assigned Addons";} }else{?>
                    Addons Not Assigned
                    <?php }?>
					</td>
                    <td align="center" bgcolor="#FEEDE7"><?php if($SpkgRws!=''){?>
                    <div class="<?php if($select_client['activ_status']!='2'){ echo $cla;}if($select_client['activ_status']=='2'){?>deactivated<?php }?>" style="height:10px; width:60px;"></div><?php }?></td>
                    <!--<td width="0" height="30" align="center" bgcolor="#FEEDE7" class="drive_txt ">&nbsp;</td>-->
                   
                  </form>
                </tr>
                <tr>
                  <td colspan="10"> <?php }} ?></td>
                  <!--<td>&nbsp;</td>-->
                </tr>
               
              </table>
              
          </td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="40">&nbsp;</td>
  </tr>
  <tr>
    <td height="40" align="center" valign="middle"><?php include_once("footer.php"); ?></td>
  </tr>
</table>
</body>
</html>
