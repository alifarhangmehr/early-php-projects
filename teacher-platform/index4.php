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
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="ّبزرگترین مرجع ورد آف وارکرفت فارسی" /> 
<meta name="keywords" content="وارکرافت دانلود,وارکرافت,استارتژی کشتن باس وارکرافت,عکس وارکرفت,آموزش تصوری وارکرفت, pdf , آموزش وارکرافت, ورد آف وارکرفت, ورد آف وارکرفت" />
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



<title>سایت علی فرهنگ مهر</title>
</head>
<body>




<p align="center">

<table border="0" cellpadding="0" cellspacing="0" width="960px" align="center">
<tr>
<td align="right">
<img src="themes/default/images/header.png" width="175" height="208" /> </p>
</td>
<td>
<?php
	if ($userLoginCondition==0){
	echo'
    <form method="post" action="userLoginP.php">
    <table align="left" id="userLoginTable">
    <tr>
    <td>نام کاربری</td><td><input type="text" name="user" id="user" class="input" /></td></tr>
    <tr>
    <td>کلمه عبور</td><td><input type="password" name="pass" id="pass" class="input" /></td></tr>
    <tr>
    <td colspan="2"><input type="submit" value="ورود" class="greenBut" /></td>
    </tr>
    </table>
    </form>
	';
	}else{
	echo '
	<table align="center" id="userLoginTable">
    <tr>
    <td>خوش آمدید '.$name.'</td></tr>
	<tr><td align="center"><a href="users/index.php">مدیریت</a></td></tr>
	<tr><td align="center"><a href="userLogout.php">خروج</a></td></tr>
	</table>
	';
		
	}
?>
</td>
</tr>
</table>

    
    
<br />



<table border="0" id="newsTable" align="center">
<?php
	include('class/connect.php');
	include('includes/shamsiDate.php');
	include('class/playWithDate.php');
	include('class/phpFarsiNumberFULL.php');
	
	$language='fa'; //temp
	$con=new connect();
	$con-> dbConnect();
	$query = "SELECT * from news ORDER BY id DESC";
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
	
			
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#1a1a1a; color:#FFF; font-size:12px">
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
    <td height="50%"><a href="fullNews.php?id='.$row['id'].'" style="font-weight:bold">'.$row['newsTitle'].'</a>
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
	<a onclick="showCommentsDiv('.$row['id'].');" style="color:#390; font-size:12px; cursor:pointer">ثبت نظر
	<img src="themes/default/images/commentIcon.png" width="32" height="32" align="middle" onclick="showCommentsDiv('.$row['id'].');"  /> 
	</a></td>
  </tr>
  <tr>
    <td height="50%"><a style="color:#09F; font-size:12px" >گروه خبری : '.$row['newsGroup'].'</a></td>
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
        echo '<tr><td width="110px"><img src= '.$row['image'].' /></td><td id="newsBriefTd'.$row['id'].'" width="870px">'.$row['brief'].'<br /><br />
		</a>
		<table border="0" cellpadding="0" cellspacing="0" align="left"><tr><td style="background:#232323">
		<a onclick="showNewsBody('.$row['id'].')" style="cursor:pointer; color:#FC0; font-weight:bold; font-size:12px">ادامه ...</a>
		</td><tr></table>
		<a style="color:#390; font-size:12px">تعداد نظرات : '.$Convertnumber2farsi-> Convertnumber2farsi($num2).'</a>
		<br />
		<a href="fullNews.php?id='.$row['id'].'" style="color:#36C; font-size:12px">متن کامل در صفحه جدید</a></td></tr>';
        echo '</td></tr><tr><td colspan="2" style="font-size:12px">نوشته شده توسط <a style="color:#FC0" id="newsAuthor'.$row['id'].'">'.$row['author'].'</a>'.' در تاریخ <a style="color:#FC0" id="newsDateFA'.$row['id'].'">'.$Convertnumber2farsi-> Convertnumber2farsi($row['dateFA']).'</a>'.' شمسی و <a style="color:#FC0" id="newsDateEN'.$row['id'].'">'.$Convertnumber2farsi-> Convertnumber2farsi($row['dateEN']).'</a>'.' میلادی'.' در ساعت : <a style="color:#FC0" id="newsTime'.$row['id'].'">'.$Convertnumber2farsi-> Convertnumber2farsi($row['newsTime']).'</a> | <a style="color:#390; cursor:pointer" onclick="showCommentsDiv('.$row['id'].');" >ثبت نظر</a><hr width="100%"></td></tr>';
    }

    echo '</table></div>';
	?>


 
































<div id="outerNewBody">
  <div id="newsBody">

<div id="fullNewsPanelDiv">
<table width="670px" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td colspan="3" id="fullNewsTitleTd"></td>
        <td align="center" style="background:#1a1a1a">
        <img src="themes/default/images/close.png" width="22" height="22" onclick="hideNewsBody()" alt="X" style="cursor:pointer" />
        </td>
      </tr>
</table>

</div>
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
   	  <tr>
        <td colspan="3" height="50px"></td>
      </tr>
      <tr>
        <td colspan="3" id="fullNewsTitleTd" style="color:#FC0"><br /></td>
      </tr>
      <tr>
        <td id="fullNewsImage" style="vertical-align:top"></td>
        <td width="560" id="fullNewsTd" style="padding:10px;"></td>
        <td width="20">&nbsp;</td>
      </tr>
      
      <tr>
        <td colspan="3" height="20px"></td>
      </tr>
      
      <tr>

        <td colspan="3" id="whoAndWhenTd" style="font-size:12px; background:#444" align="center"></td>

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
        <table width="600" border="0" cellpadding="0" cellspacing="0" class="grayAndblue">
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
            <td colspan="3" id="testTd" width="500px" align="center">
            <a onclick="runEditor()">salam</a>
            <textarea name="cBody" cols="45" rows="15" id="cBody"></textarea>
            </td>
            <td width="0px"><input type="hidden" name="newsId" id="newsId" /></td>
          </tr>
          <tr>
            <td colspan="3" align="center" height="40px"><input type="submit" name="sendCommentBut" id="sendCommentBut" value="ارسال نظر"></td>
          </tr>
        </table>
        </form>
         </td></tr>
        </table>
    </div>
</div>


<div align="center" id="footer">طراحی شده توسط <a href="mailto:ali.farhangmehr@gmail.com">علی فرهنگ مهر</a></div>










</body>
</html>



























