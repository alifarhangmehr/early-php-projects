<?php
//flag
error_reporting(0);
session_start();
if(!isset($_SESSION['validUser']))
$userLoginCondition=0 ;	
else{
$name=$_SESSION['validName'];
$email=$_SESSION['validEmail'];
$site=$_SESSION['validSite'];
$userLoginCondition=1 ;
}
$getId=$_GET['id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="ّسایت رسمی نرم افزار فروش و حسابداری قیف" /> 
<meta name="keywords" content="نرم افزرا حسابداری قیف" />
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-23712100-1']);
  _gaq.push(['_setDomainName', '.lich.ir']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<link rel="stylesheet" type="text/css" href="themes/default/css/index.css">
<link rel="stylesheet" type="text/css" href="modules/ColorPicker/plugin.css" />
<script language="javascript" type="text/javascript" src="js/index.js"></script>
<script type="text/javascript">
    _editor_url  = "modules/xinha/"  // (preferably absolute) URL (including trailing slash) where Xinha is installed
    _editor_lang = "en";      // And the language we need to use in the editor.
    _editor_skin = "silva";   // If you want use a skin, add the name (of the folder) here
</script>
<script type="text/javascript" src="modules/xinha/XinhaCore.js"></script>
<script type="text/javascript" src="js/xinha/index/newsComment.js"></script>
<script language="Javascript" src="modules/dl/display.php"></script>











<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>

<script>
		!window.jQuery && document.write('<script src="modules/jquery-1.4.3.min.js"><\/script>');
	</script>
	<script type="text/javascript" src="modules/fancybox/fancyBox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="modules/fancybox/fancyBox/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="modules/fancybox/fancyBox/jquery.fancybox-1.3.4.css" media="screen" />
	<script type="text/javascript">
		$(document).ready(function() {

			$("a#newsImageLink").fancybox();


		});
	</script>

















<style type="text/css">
img { behavior: url(iepngfix.htc) }
#pageflip {
	position: relative;
	right: 0; top: 0;
	float: right; 
}
#pageflip img {
	width: 50px;
	height: 52px;
	z-index: 999;
	position: absolute;
	right: 0;
	top: 0;
	-ms-interpolation-mode: bicubic;
}
#pageflip .msg_block {
	width: 50px; height: 50px;
	overflow: hidden;
	position: absolute;
	right: 0; top: 0;
	background: url(image/underPage.jpg) no-repeat right top;
}
</style>
<title>قیف</title>
</head>
<body>
<table border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
    	<td width="955px">
        
        
        
        
        
        
        <link rel="stylesheet" href="modules/orbit-1.2.3/orbit-1.2.3.css">
		<!-- Attach necessary JS -->
		<script type="text/javascript" src="modules/orbit-1.2.3/jquery-1.5.1.min.js"></script>
		<script type="text/javascript" src="modules/orbit-1.2.3/jquery.orbit-1.2.3.min.js"></script>	
		
			<!--[if IE]>
			     <style type="text/css">
			         .timer { display: none !important; }
			         div.caption { background:transparent; filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000,endColorstr=#99000000);zoom: 1; }
			    </style>
			<![endif]-->
		
		<!-- Run the plugin -->
		<script type="text/javascript">
			$(window).load(function() {
				$('#featured').orbit();
			});
		</script>
		
	</head>
	<body>
	
	<div class="container">
		<div id="featured"> 

			<img src="themes/default/images/slide1.jpg" />
			<img src="themes/default/images/slide2.jpg" />
			<img src="themes/default/images/slide3.jpg" />
			<img src="themes/default/images/slide4.jpg" />
		</div>
		</div>

        
        
        
        </td>
    </tr>
</table>             
    <table border="0" id="newsTable" align="center">
<?php
	include('class/connect.php');
	include('includes/shamsiDate.php');
	include('class/playWithDate.php');
	include('class/phpFarsiNumberFULL.php');
	
	$language='fa'; //temp
	$con=new connect();
	$con-> dbConnect();
	$query = "SELECT * from news where id='$getId'";
	$result=$con->queryRun($query);
	$num=mysql_num_rows($result);
  
  
    for($i=0;$i<$num;$i++){
        $row = mysql_fetch_array($result);
        $newsId[$i]=$row['id'];
		
		
		$playWithDate=new playWithDate();
		$dateExplode=$playWithDate-> getDate($row['dateFA'],$row['dateEN'],$language);
		
		
		$Convertnumber2farsi=new Convertnumber2farsi();
		//$Convertnumber2farsi-> Convertnumber2farsi($string);
		
		
		//echo 'date : '.$dateExplodeFA[1];
		//echo $dateExplode[0];
        echo '<tr><td colspan="2" >

		
			
<div id="newsTitleTd'.$row['id'].'" >
	
			
<table width="100%" border="0" cellspacing="2" cellpadding="2" id="newsTitleBar">
  <tr>
    <td rowspan="3" width="60px">
	
	
	
<table width="40px" height="100%" align="right" id="tinyNewsDateTable" border="1" cellspacing="0" cellpadding="1">
     <tr height="25px">
	  <td colspan="2" align="center" style="background:#666; color:#FFF">'.$dateExplode[1].'</td>
	  </tr>
	  <tr>
		<td align="center">'.$Convertnumber2farsi-> Convertnumber2farsi($dateExplode[2]).'</td>
		<td align="center">'.$Convertnumber2farsi-> Convertnumber2farsi($dateExplode[0]).'</td>
      </tr>
</table>
		
		
		
    </td>
    <td height="50%" ><a href="fullNews.php?id='.$row['id'].'" style="font-weight:bold; color:#f8ec9a">'.$row['newsTitle'].'</a>
	<a style="color:#666">&nbsp;&nbsp;'.$Convertnumber2farsi-> Convertnumber2farsi($playWithDate-> howLongAgo($row['dateFA'],$row['dateEN'],$row['newsTime'],$language)).'</a></td>
   
   
   
   <div>
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
    <td rowspan="2" align="left">
	
	<div  style="background:url(themes/default/images/colorPicker.png) no-repeat; min-width:32px; min-height:32px; float:left; cursor:pointer" onclick="toolTipShow(event)">
1	<div id="colorToolTipDiv'.$row['id'].'" class="toolTipDiv">
	  
	  
	  
	  <table width="90px" height="90px" border="0" cellspacing="0" cellpadding="0" style="cursor:pointer">

	  <tr>
		<td bgcolor="#f36ac5" onmouseover=changeColor('.$row['id'].',"#f36ac5") onclick="hideChangeColor('.$row['id'].')" >&nbsp;</td>
		<td bgcolor="#f36a6a" onmouseover=changeColor('.$row['id'].',"#f36a6a") onclick="hideChangeColor('.$row['id'].')">&nbsp;</td>
		<td bgcolor="#f3c56a" onmouseover=changeColor('.$row['id'].',"#f3c56a") onclick="hideChangeColor('.$row['id'].')">&nbsp;</td>
	  </tr>
	  <tr>
		<td bgcolor="#c56af3" onmouseover=changeColor('.$row['id'].',"#c56af3") onclick="hideChangeColor('.$row['id'].')">&nbsp;</td>
		<td bgcolor="#f3f3f3" onmouseover=changeColor('.$row['id'].',"#f3f3f3") onclick="hideChangeColor('.$row['id'].')">&nbsp;</td>
		<td bgcolor="#c5f36a" onmouseover=changeColor('.$row['id'].',"#c5f36a") onclick="hideChangeColor('.$row['id'].')">&nbsp;</td>
	  </tr>
	  <tr>
		<td bgcolor="#6a6af3" onmouseover=changeColor('.$row['id'].',"#6a6af3") onclick="hideChangeColor('.$row['id'].')">&nbsp;</td>
		<td bgcolor="#6ac5f3" onmouseover=changeColor('.$row['id'].',"#6ac5f3") onclick="hideChangeColor('.$row['id'].')">&nbsp;</td>
		<td bgcolor="#6ae46a" onmouseover=changeColor('.$row['id'].',"#6ae46a") onclick="hideChangeColor('.$row['id'].')">&nbsp;</td>
	  </tr>
	</table>
	  
	  
	  
	  
	  
	</div>
	</div>
	&nbsp;&nbsp;&nbsp;
	<img src="themes/default/images/font-.png" width="32" height="32" align="middle" title="کاهش اندازه فونت" style="cursor:pointer" onclick="fontMin('.$row['id'].')" />
	<img src="themes/default/images/fontNormal.png" width="32" height="32" align="middle" title="اندازه عادی" style="cursor:pointer" onclick="fontNormal('.$row['id'].')" />
	<img src="themes/default/images/font+.png" width="32" height="32" align="middle" title="افزایش اندازه فونت" style="cursor:pointer" onclick="fontPlus('.$row['id'].')" />
	&nbsp;&nbsp;&nbsp;
	<a onclick="showCommentsDiv('.$row['id'].');" style="color:#FFF; font-size:14px; cursor:pointer">ثبت نظر
	<img src="themes/default/images/commentIcon.png" width="32" height="32" align="middle" onclick="showCommentsDiv('.$row['id'].');"  /> 
	</a></td>
  </tr>
  <tr>
    <td height="50%"><a style="color:#bae8ff; font-size:12px" >گروه خبری : '.$row['newsGroup'].'</a></td>
  </tr>
</table>	
	
			
			
		
			
			
		
		
		
		<div id=hideNewsBody'.$row['id'].' style="display:none">'.$row['newsBody'].'</div>
		<div id=hideNewsImage'.$row['id'].' style="display:none">'.$row['image'].'</div>
		<div id=hideNewsTitle'.$row['id'].' style="display:none">'.$Convertnumber2farsi-> Convertnumber2farsi($row['newsTitle']).'</div>
		</td></tr>';
		$newsId = $row['id'];
		$query2 = "SELECT * from comments WHERE newsId = '$newsId' AND cConfirm = 'yes' ORDER BY cId ASC";
		$result2=$con->queryRun($query2);
		$num2=mysql_num_rows($result2);
		echo '<tr><td colspan="2"><div id="commentsBodyDiv'.$row['id'].'" style="display:none" ><table border="0" width="500px" cellpading="0" cellspacing="0" id="commentsTable'.$row['id'].'">';
		
		
		for($j=0;$j<$num2;$j++){
        $row2 = mysql_fetch_array($result2);
		//echo 'newsID : '.$newsId[i].' ' ;
		echo '<tr style="background:#69F; color:#FFF; font-size:14px" id="commentsTr'.$row2['newsId'].'">';
		echo '<td><a>نوشته شده توسط </a><a class="commentsDetails">'.$row2['cUser'].'</a><a> در تاریخ </a><a class="commentsDetails">'.$Convertnumber2farsi-> Convertnumber2farsi($row2['dateFA']).'</a><a> و در ساعت </a><a class="commentsDetails">'.$Convertnumber2farsi-> Convertnumber2farsi($row2['cTime']).'</a></td>';

		echo '</tr><tr>';
		echo '<td colspan="3" style="background:#F4F2FF; color:#000; font-size:14px; padding:12px" " id="cBody'.$row2['cId'].'">'.$row2['cBody'].'</td></tr>';
		echo '<tr style="background:#F4F2FF">';
		echo '<td colspan="3" align="left" id="cEmailAndSite'.$row2['cId'].'"><a style="color:#69F; font-size:14px" href="mailto:'.$row2['cEmail'].'">ایمیل</a><a style="color:#FC0"> | </a><a style="color:#69F; font-size:14px" href="'.$row2['cWebPage'].'">سایت</a><br /></td></tr>';
	} 
		echo '</table>';
        echo '<tr><td width="110px" ><a id="newsImageLink" href="'.$row['photoSource'].'"><img style="border:medium solid #FC0; padding:5px; margin:5px" src= '.$row['photo1'].' border="0" /></a></td><td id="newsBriefTd'.$row['id'].'" width="870px">'.$row['newsBody'].'<br /><br />
		</a>
		<table border="0" cellpadding="0" cellspacing="0" align="left"><tr><td style="background:#232323">
		</td><tr></table>
		<a style="color:#390; font-size:12px">تعداد نظرات : '.$Convertnumber2farsi-> Convertnumber2farsi($num2).'</a>
		</td></tr>';
        echo '</td></tr>
		<tr style="background:#d6edf7"><td colspan="2" style="font-size:12px">نوشته شده توسط <a style="color:#3f9cc8; font-weight:bold" id="newsAuthor'.$row['id'].'">'.$row['author'].'</a>'.' در تاریخ <a style="color:#3f9cc8; font-weight:bold" id="newsDateFA'.$row['id'].'">'.$Convertnumber2farsi-> Convertnumber2farsi($row['dateFA']).'</a>'.' شمسی و <a style="color:#3f9cc8; font-weight:bold" id="newsDateEN'.$row['id'].'">'.$Convertnumber2farsi-> Convertnumber2farsi($row['dateEN']).'</a>'.' میلادی'.' در ساعت : <a style="color:#3f9cc8; font-weight:bold" id="newsTime'.$row['id'].'">'.$Convertnumber2farsi-> Convertnumber2farsi($row['newsTime']).'</a> | <a style="color:#390; cursor:pointer" onclick="showCommentsDiv('.$row['id'].');" >ثبت نظر</a></td></tr>';
    }

    echo '</table></div>';
	?>


 
































<div id="outerNewBody">

  <div id="newsBody">
  <div style="position:relative; left:65px;">
<div style="position:fixed">
<table border="0" cellpadding="2" cellspacing="2" style="background:#333; border: thick solid #F60; cursor:pointer"  onclick="hideNewsBody()">
<tr><td align="center"><img src="themes/default/images/close.png" width="22" height="22" onclick="hideNewsBody()" alt="X" style="cursor:pointer" /></td></tr>
<tr><td align="center"><span alt="X" style="color:#FFCC00" >بستن</span></td></tr>
</table>

</div>
</div>



<div id="fullNewsPanelDiv">
<table width="880px" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td id="fullNewsTitleTd"></td>
      </tr>
</table>

</div>
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
   	  <tr>
        <td colspan="2" height="50px"></td>
      </tr>
      <tr>
        <td colspan="2" id="fullNewsTitleTd" style="color:#FC0"><br /></td>
      </tr>
      <tr>
        <td id="fullNewsImage" style="vertical-align:top"></td>
	  </tr>
      <tr>
        <td width="560" id="fullNewsTd" style="padding:10px;"></td>
        <td width="20">&nbsp;</td>
      </tr>
      
      <tr>
        <td colspan="2" height="20px"></td>
      </tr>
      
      <tr>

        <td colspan="2" id="whoAndWhenTd" style="font-size:12px; background:#444" align="center"></td>

      </tr>
      
    </table>
</div></div>

















<div id="outreCommentsDiv">
    <div id="commentsDiv">
    <div id="commentsPanelDiv">
    <img src="themes/default/images/close.png" width="22" height="22" alt="X" onclick="hideCommentsDiv()" style="cursor:pointer" />
    </div>
        <table width="600px" border="0" cellpadding="0" cellspacing="0">
        <tr>
        <td width="600px" height="70px" align="center" id="commetnsTitleTd"></td>
        </tr>
          <tr>
            <td id="commentsTd" align="center"></td>
          </tr>
          <tr>
          <td class="grayAndblue"><hr width="80%" /></td>
          </tr>
          <tr><td>
        <form method="post" action="commentInsert.php">
        <input type="hidden" name="cReallEmail" id="cReallEmail" value="<?php echo $email; ?>" />
        <table width="600px" border="0" cellpadding="0" cellspacing="0" class="grayAndblue">
          <tr>
            <td align="right" style="color:#000" width="100px" class="test">&nbsp;&nbsp;&nbsp;نام</td>
            <td colspan="2" align="right"><input type="text" name="cName" id="cName" value="<?php echo $name; ?>"></td>
          </tr>
          <tr>
            <td align="right" style="color:#000">&nbsp;&nbsp;&nbsp;ایمیل</td>
            <td colspan="2" align="right"><input type="text" name="cEmail" id="cEmail" value="<?php echo $email; ?>"></td>
          </tr>
          <tr>
            <td align="right" style="color:#000">&nbsp;&nbsp;&nbsp;سایت</td>
            <td colspan="2" align="right"><input type="text" name="cSite" id="cSite" value="<?php echo $site; ob_end_flush(); ?>"></td>
          </tr>
          <tr>
            <td colspan="3" id="testTd" width="600px" align="center">
            <textarea name="cBody" id="cBody"></textarea>
            </td>
            <td width="0px"><input type="hidden" name="newsId" id="newsId" /></td>
          </tr>
          <tr>
            <td colspan="3" align="center" height="40px"><input type="submit" name="sendCommentBut" id="sendCommentBut" value="ارسال نظر" /></td>
          </tr>
        </table>
        </form>
         </td></tr>
        </table>
    </div>
</div>





</body>
</html>