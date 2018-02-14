<?php 


    require("connection.php"); 
     

    if(empty($_SESSION['user'])) 
    { 

        header("Location: index.php"); 

        die("Redirecting to index.php"); 
    } 
	
if(isset($_REQUEST['code'])){
	$pkgRCli=mysql_query("UPDATE pkg_assign SET activ_status='2' WHERE track_code = '".$_REQUEST['code']."'");
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
<link rel="stylesheet" href="css/page_style.css" type="text/css" />

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
.beforeseven{
	background-color:#00FF66;
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
right: 28%; 
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
          <table width="900" border="0" cellspacing="1" cellpadding="0" style="border:1px solid #CCC;">
            <tr>
              <td width="118" height="40" align="center" bgcolor="#fff1ab" class="drive"> Package Name</td>
              <td width="99" align="center" bgcolor="#fff1ab" class="drive">Mode</td>
              <td width="126" height="40" align="center" bgcolor="#fff1ab" class="drive">Client</td>
              <td width="127" align="center" bgcolor="#fff1ab" class="drive">Box No.</td>
              <td width="101" height="40" align="center" bgcolor="#fff1ab" class="drive">From Date</td>
              <td width="90" align="center" bgcolor="#fff1ab" class="drive">To Date</td>
              <td width="117" align="center" bgcolor="#fff1ab" class="drive">Notification Alert</td>
              <td width="50" align="center" bgcolor="#fff1ab" class="drive">Block</td>
              <td width="60" align="center" bgcolor="#fff1ab" class="drive">Status</td>
              </tr>
            <tr>
              <td colspan="9" align="center">
              <?php
			$tbl_name="pkg_assign";
			$adjacents = 3;
			
			$query = "SELECT COUNT(*) as num FROM $tbl_name";
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages['num'];
	
	/* Setup vars for query. */
	$targetpage = "client_list.php"; 	//your file name  (the name of this file)
	$limit = 30; 								//how many items to show per page
	$page = $_GET["page"];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	$sql = "SELECT * FROM $tbl_name order by id desc LIMIT $start, $limit";
	$result = mysql_query($sql);
			
if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage?page=$prev\">previous</a>";
		else
			$pagination.= "<span class=\"disabled\">previous</span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage?page=$next\">next</a>";
		else
			$pagination.= "<span class=\"disabled\">next</span>";
		$pagination.= "</div>\n";		
	}

?>              </td>
              </tr>
            <?php
$j= 0;
while ($row= mysql_fetch_array($result))
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
	if($count_day > 7){ $cla='beforeseven'; } 
	elseif($count_day <= 7 && $count_day > 1 ){ $cla='sevendays'; } 
	elseif($count_day<=1 && $count_day>=0){ $cla='myClass'; }
	elseif($count_day < 0){ $cla='expiredays';} 
?>
            <tr>
                <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $Pkg[0]; ?></td>
                <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><?php echo $Pkg[1]; ?></td>
                <td height="30" align="center" bgcolor="#FEEDE7" class="drive_txt"><a href="clients.php?cid=<?php echo $row['c_id']; ?>" class="myModal" data-width="520" data-height="500"><?php echo $row['c_id']; ?></a></td>
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
    <div style="margin-top:15px;">
         <span style="font-weight:bold; font-family:Arial, Helvetica, sans-serif; font-size:14px; text-align:center;"><?php echo $count_day." Days Remaining"; ?></span> 		</div>		
				</div>
                 <a href="javascript:showDiv('dv<?php echo $j;?>',1)">
                <img src="image/icon_alert.png" width="21" height="19" /></a>
                <?php } ?>                </td>
                <td height="30" bgcolor="#FEEDE7" align="center" class="drive_txt"><?php if($row['activ_status']!='3'){?>
                <a href="expiry.php?code=<?php echo $row['track_code'];?>">
                <img src="image/unblock.png" width="21" height="21"/>                </a><?php }?>                </td>
                <td height="30" align="center" bgcolor="#FEEDE7" ><div class="<?php if($row['activ_status']!='3'){ echo $cla;}else{?>deactivated<?php }?>" style="height:10px; width:60px;"></div></td>
            </tr>
            <tr>
              <td colspan="9"><?php } ?><span style="float:right"><?=$pagination?></span></td>
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
