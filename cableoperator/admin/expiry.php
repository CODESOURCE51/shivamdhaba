<?php 


    require("connection.php"); 
     

    if(empty($_SESSION['user'])) 
    { 

        header("Location: index.php"); 

        die("Redirecting to index.php"); 
    } 
	
if(isset($_REQUEST['code'])){
	$pkgRCli=mysql_query("UPDATE pkg_assign SET activ_status='3' WHERE track_code = '".$_REQUEST['code']."'");
	//echo $pkgRCli;exit();
	echo "<script> window.location= 'expiry.php?deactivate'; </script>";
}
    
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cable-Operator</title>
<link href="css/template.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="blink.css" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="jquery.blink.js" /></script>


<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #FFFFFF;
}
.sevendays{
	background-color:#FF8000;
}
.expiredays{
	background-color:#F32136;
}
.deactivated{
	background-color:#CE6474;
}


</style>


<style type="text/css">
* {margin: 0; padding: 0}
.shadow {width: 100%; height: 100%; position: fixed; background-color: #444; top: 0; left:0; z-index: 400}
#modal {z-index: 500; position: absolute; background: #fff; top: 50px;}
#modal iframe {width: 100%; height: 100%}
#closeModal {position: absolute; top: -15px; right: -15px; font-size: 0.8em; }
#closeModal img {width: 30px; height: 30px;}
</style>
<script src="js/jquery-1.8.3.js"></script>
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
<!---------hidden Popup---------------->
  <script language="JavaScript">
    function showDiv(divID,show) {
      var w=document.getElementById(divID);
      w.style.visibility=(show==1)?'visible':'hidden';
    }
  </script>
<style type="text/css">
.hidden {
position: fixed; 
right: 35%; 
visibility: hidden; 
margin-top: 5px; 
background: #fff1ab; 
border: 1px solid #333; 
width:100px;
height:70px;
} 
 
.pop-header {
padding:0px 0px 25px 0px ;
border-bottom: 1px solid #eee;
}
.pop-body {
  overflow-y: auto;
  max-height: 400px;
  padding: 10px;
}
.photo {width:185px;
height:150px;
border:solid #999 1px;
}
.clse {
background:#333333;
height:15px;
width:15px;
border-radius:50%;
-webkit-border-radius:50%;
-moz-border-radius:50%;
text-decoration:none;
}
.clsetxt {text-decoration:none; color:#FFF;
font-weight:bold;
font-size:12px;}
  </style>
<!---------hidden Popup---------------->
<!-----------------------------ajax search-------------------->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="jquery.autocomplete.js"></script>
<link rel="stylesheet" type="text/css" href="jquery.autocomplete.css" />

<script type="text/javascript">
$().ready(function() {
	$("#clientId").autocomplete("get_list_expire.php", {
		width: 260,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});
});
</script>
<!-----------------------------ajax search-------------------->
</head>

<body>
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
      <td height="80">
          <form action="" name="form" id="form" method="post" enctype="multipart/form-data">
          <table align="right" width="300" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="30" align="left" valign="middle" class="adm1_txt"><input type="text" name="clientId" id="clientId" class="rounded" />              </td>
              <td height="30" align="left" valign="middle" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#999;"><input type="image" src="image/search.png" /></td>
              </tr>
          </table>
          </form>
      </td>
      </tr>
      <tr>
        <td height="30" align="center"><?php
if (isset($_REQUEST['deactivate']))
{
echo "<span class='succ'>Record Deactivated Successfully.</span>";
}
if (isset($_REQUEST['added']))
{
echo "<span class='succ'>Addons assigned Successfully.</span>";
}

 ?></td>
      </tr>
      <tr>
        <td align="center"></td>
      </tr>
      <tr>
        <td align="center">
          <table width="1000" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
            <tr>
              <td width="100" height="40" align="center" bgcolor="#fff1ab" class="drive"> Package Name</td>
              <td width="92" align="center" bgcolor="#fff1ab" class="drive">Mode</td>
              <td width="138" height="40" align="center" bgcolor="#fff1ab" class="drive">Client</td>
              <td width="138" align="center" bgcolor="#fff1ab" class="drive">Box No.</td>
              <td width="94" height="40" align="center" bgcolor="#fff1ab" class="drive">From Date</td>
              <td width="91" align="center" bgcolor="#fff1ab" class="drive">To Date</td>
              <td width="126" align="center" bgcolor="#fff1ab" class="drive">Notification Alert</td>
              <td width="69" align="center" bgcolor="#fff1ab" class="drive">Block</td>
              <td width="75" align="center" bgcolor="#fff1ab" class="drive">Assign Package</td>
              <td width="64" align="center" bgcolor="#fff1ab" class="drive">Status</td>
              </tr>
            <tr>
              <td height="8" colspan="10" align="center">
<?php
if (isset($_POST['clientId']))
{
	
$select_user = "SELECT * from `pkg_assign` WHERE activ_status!='3' and c_id='".$_REQUEST['clientId']."'";
$exe_selectuser = mysql_query($select_user) or die (mysql_error());
	}else{
$select_user = "SELECT * from `pkg_assign` WHERE activ_status!='3' ORDER BY id DESC";
	
$exe_selectuser = mysql_query($select_user) or die (mysql_error());
}
 $j=0;
while ($row= mysql_fetch_array($exe_selectuser))
{ 
$j++;
	$present_date= date("Y-m-d");
	$completion_date= $row['from_date'];
	$to_date= $row['to_date'];
	$Pkg= explode("**", $row['pkg_name']);
	$diff_date = "SELECT DATEDIFF('$to_date','$present_date') AS DiffDate";
	$c_date = mysql_query($diff_date) or die (mysql_error());
	$row_date= mysql_fetch_array($c_date); 
	$count_day= $row_date['DiffDate'];
	if($count_day <= 7)
	{
		
	if($count_day <= 7 && $count_day > 1 ){ $cla='sevendays'; } 
	elseif($count_day <= 1 && $count_day >= 0){ $cla='myClass'; }
	elseif($count_day < 0){ $cla='expiredays';} 
?>              </td>
              </tr>
            <tr>
                <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $Pkg[0]; ?></td>
                <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $Pkg[1]; ?></td>
                <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt">
                <a href="clients.php?cid=<?php echo $row['c_id']; ?>" class="myModal" data-width="520" data-height="500">
				<?php echo $row['c_id']; ?></a></td>
                <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $row['box_no']; ?></td>
                <td height="30" bgcolor="#FEEDE7" align="center" class="drive_txt"><?php echo $row['from_date']; ?></td>
                <td height="30" bgcolor="#FEEDE7" align="center" class="drive_txt"><?php echo $row['to_date']; ?></td>
                <td height="30" bgcolor="#FEEDE7" align="center" class="drive_txt">
                <?php if($count_day > 7){ ?>
                <img src="image/1406222141_OK.png" width="21" height="21"/>
                <?php }else{ ?>
                <div class="hidden" id="dv<?php echo $j;?>">
	<div style="float:right; margin-left:7.4em; margin-top:-1.4em; position:relative;" class="clse">
    <a href="javascript:showDiv('dv<?php echo $j;?>',0)" class="clsetxt">&times;</a>    </div>
    <div style="margin-top:7px;">
         <span style="font-weight:bold; font-family:Arial, Helvetica, sans-serif; font-size:14px; text-align:center;"><?php echo $count_day." Days Remaining"; ?></span> 		</div>		
				</div>
                 <a href="javascript:showDiv('dv<?php echo $j;?>',1)">
                <img src="image/icon_alert.png" width="21" height="19" /></a>
                <?php } ?>                </td>
                <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php if($row['activ_status']!='3'){?>
                <a href="expiry.php?code=<?php echo $row['track_code'];?>">
                <img src="image/unblock.png" width="21" height="21"/>                </a><?php }?>                </td>
                <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt">
                <a href="assign_package.php?code=<?php echo $row['track_code'];?>">Assign New</a>
                </td>
                <td height="30" align="center" bgcolor="#FEEDE7">
                <div class="<?php if($row['activ_status']!='3'){ echo $cla;}else{?>deactivated<?php }?>" style="height:10px; width:60px;"></div>
                </td>
            </tr>
            
            <tr>
              <td colspan="10" height="8"><?php }} ?></td>
              </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td height="50">&nbsp;</td>
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
