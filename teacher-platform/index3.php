<?php
ob_start();
//flag
error_reporting(0);

session_start();
if(!isset($_SESSION['validName'])){
$userLoginCondition=0 ;	
}else{
$name=$_SESSION['validName'];
$email=$_SESSION['validEmail'];
$site=$_SESSION['validSite'];
$userLoginCondition=1 ;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="themes/default/css/index.css">
<script language="javascript" type="text/javascript" src="js/index.js"></script>
<title>پروتال خبری گروه آرمای</title>
</head>
<body>
<table width="960px" border="0" cellspacing="0" cellpadding="0" align="center" style="background:url(image/bg3.jpg) no-repeat">
  <tr>
    <td colspan="4" height="80px"><p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>

    </td>
  </tr>
  <tr>
    <td colspan="4" height="300px"><p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <?php
	if ($userLoginCondition==0){
	echo'
    <form method="post" action="userLoginP.php">
    <table align="center" id="userLoginTable">
    <tr>
    <td>ایمیل</td><td><input type="text" name="email" id="email" class="input" /></td></tr>
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
    <td>خوش آمدیر '.$name.'</td></tr>
	<tr><td align="center"><a href="userLogout.php">خروج</a></td></tr>
	</table>
	';
		
	}
	?>
    <p>&nbsp;</p>
    <p>&nbsp;</p></td>
  </tr>
  <tr>
  	<td colspan="4"><p align="center"><a href="adminLogin.php">ورود مدیر</a> | <a href="register.php">ثبت نام</a> | <a href="contact.php"> تماس با ما</a> | <a href="about.php">درباره ما</a></p>
    <p>&nbsp;</p></td>
  </tr>

  <tr>
    <td width="65">&nbsp;</td>
    <td colspan="2" align="center">&nbsp;</td>
    <td width="65">&nbsp;</td>
  </tr>
  <tr>
    <td width="65">&nbsp;</td>
    <td width="683" colspan="2">
    <div id="randomNewsDiv" align="center">
    <table border="0" id="newsTable">
    <?php
		//echo 'vaziyate user : '.$a.' : '.$user;

	include('class/connect.php');

	$con=new connect();
	$con-> dbConnect();
	/*
	if($con){
		echo 'yes';
		
	}else{
		echo 'no';
	}
	*/
	
	
	$query = "SELECT * from news";
	
	//$query="INSERT INTO photo VALUES ('$id', '$group','$serie','$photoName', '$newFile', '$place','$date','$camera','$lens','$focus','$iso','$other') ";
	$result=$con->queryRun($query);
	
	/*
	if($result){
		echo 'added';
	}else{
		echo 'not added';
	}
	*/
	$num=mysql_num_rows($result);
    for($i=0;$i<$num;$i++){
        $row = mysql_fetch_array($result);
        $newsId[$i]=$row['id'];
	//	echo $row['newsId'];
	//	echo 'newsID : '.$newsId[$i].' ' ;
	        echo '<tr><td colspan="2" id="newsTitleTd'.$row['id'].'"><a style=" color:#39F; font-size:16px; font-weight:bold">'.$row['newsTitle'].'</a><br />
		<div id=hideNewsBody'.$row['id'].' style="display:none">'.$row['newsBody'].'</div>
		<div id=hideNewsImage'.$row['id'].' style="display:none">'.$row['image'].'</div>
		<div id=hideNewsTitle'.$row['id'].' style="display:none">'.$row['newsTitle'].'</div>
		</td></tr>';
        
    //	echo 'تاریخ میلادی : '.$row['dateEN'].'<br />'; 
    //	echo 'تاریخ فارسی : '.$row['dateFA'].'<br />';
    //	echo 'گروه خبری : '.$row['newsGroup'].'<br />';
    //	echo 'نویسنده : '.$row['author'].'<br />';
    //	echo 'خلاصه خبر : '.$row['newsBody'].'<br />';
		
		$newsId = $row['id'];
		//echo $newsId;
		$query2 = "SELECT * from comments WHERE newsId = '$newsId' AND cConfirm = 'yes'";
		$result2=$con->queryRun($query2);
		$num2=mysql_num_rows($result2);
		echo '<tr><td colspan="2"><div id="commentsBodyDiv'.$row['id'].'" style="display:none" ><table border="0" width="600px" cellpading="0" cellspacing="0" id="commentsTable'.$row['id'].'">';
		for($j=0;$j<$num2;$j++){
        $row2 = mysql_fetch_array($result2);
		//echo 'newsID : '.$newsId[i].' ' ;
		echo '<tr style="background:#69F; color:#FFF; font-size:14px" id="commentsTr'.$row2['newsId'].'">';
		echo '<td><a>نوشته شده توسط </a><a class="commentsDetails">'.$row2['cUser'].'</a><a> در تاریخ </a><a class="commentsDetails">'.$row2['dateFA'].'</a><a> و در ساعت </a><a class="commentsDetails">'.$row2['cTime'].'</a>';
		/*
		echo '<td width="33%" id="cName'.$row2['cId'].'"><a>نویسنده : '.$row2['cUser'].'</a></td>';
		echo '<td width="33%" id="cDate'.$row2['cId'].'">تاریخ : '.$row2['dateFA'].'</td>';
		echo '<td width="33%" id="cTime'.$row2['cId'].'">ساعت : '..'</td>';
		*/
		echo '</tr><tr>';
		echo '<td colspan="3" style="background:#F4F2FF; color:#000; font-size:14px; padding:12px" " id="cBody'.$row2['cId'].'">'.$row2['cBody'].'</td>';
		echo '</tr><tr style="background:#F4F2FF">';
		echo '<td colspan="3" align="left" id="cEmailAndSite'.$row2['cId'].'"><a style="color:#69F; font-size:14px" href="mailto:'.$row2['cEmail'].'">ایمیل</a><a style="color:#FC0"> | </a><a style="color:#69F; font-size:14px" href="'.$row2['cWebPage'].'">سایت</a><br /></td>';
	} 
		echo '</table>';
        echo '<tr><td width="150px" height="150px"><img src= '.$row['image'].' /></td><td id="newsBriefTd">'.$row['brief'].'<br /><br />
		<a href="#" style="color:#CC6" >گروه خبری : '.$row['newsGroup'].'</a><br />
		<a onclick="showNewsBody('.$row['id'].')">ادامه مطلب</a><br />
		<a onclick="">تعداد نظرات : '.$num2.'</a><br />
		<a href="fullNews.php?id='.$row['id'].'" style="color:#36C">متن کامل در صفحه جدید</a></td></tr>';
    //	echo 'عکس : '.$row['image'].'<br />';
        echo '</td></tr><tr><td colspan="2">نوشته شده توسط <a style="color:#FC0" id="newsAuthor'.$row['id'].'">'.$row['author'].'</a>'.' در تاریخ <a style="color:#FC0" id="newsDateFA'.$row['id'].'">'.$row['dateFA'].'</a>'.' شمسی و <a style="color:#FC0" id="newsDateEN'.$row['id'].'">'.$row['dateEN'].'</a>'.' میلادی'.' در ساعت : <a style="color:#FC0" id="newsTime'.$row['id'].'">'.$row['newsTime'].'</a> | <a style="color:#390" onclick="showCommentsDiv('.$row['id'].','.$row2['cId'].')" >ثبت نظر</a><hr width="100%"</td></tr>';
    }

    echo '</table></div>';
	?> 
    <p>&nbsp;</p>
<div id="outreCommentsDiv">
    <div id="commentsDiv">
    <div id="commentsPanelDiv"><img src="themes/default/images/closeComments.png" width="22" height="22" onclick="hideCommentsDiv()" /></div>
        <table width="600px" border="0" cellpadding="0" cellspacing="0">
        <tr>
        <td width="600px" height="70px" align="center" id="commetnsTitleTd"></td>
        </tr>
          <tr>
            <td id="commentsTd">

            
            
            
            
            
            
            
            
            
            
            
            
            <!--
            
            <table width="600" border="0" cellpading="0" cellspacing="0">
              <tr style="background:#69F; color:#FFF; font-size:14px">
                <td colspan="2" id="cAuthor" ></td>
                <td width="150" id="cDate"></td>
              </tr>
              <tr>
                <td colspan="3" id="cBody" style="background:#F4F2FF; color:#000; font-size:14px; padding:12px"></td>
              </tr>
              <tr style="background:#F4F2FF">
                <td colspan="3"m align="left"><a id="CEmailAndWebPage"></a><br /></td>
              </tr>
        
           </table>
            
            
            
            -->
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            </td>
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
         	<td width="100px">&nbsp;</td>
            <td width="500px" align="right"><textarea name="cBody" id="cBody" cols="50" rows="8"></textarea></td>
            <td width="0px"><input type="hidden" name="newsId" id="newsId" /></td>
          </tr>
          <tr>
            <td colspan="2" align="center" height="40px"><input type="submit" name="sendCommentBut" id="sendCommentBut" value="ارسال نظر"></td>
          </tr>
        </table>
        </form>
         </td></tr>
        </table>
    </div>
</div>
    <td width="65">&nbsp;</td>
  </tr>
   <tr>
    <td width="65">&nbsp;</td>
    <td colspan="2" align="center"><p>&nbsp;</p></td>
    <td width="65">&nbsp;</td>
  </tr>

  <tr>
    <td width="65">&nbsp;</td>
    <td>&nbsp;</td>
    <td width="147">&nbsp;</td>
    <td width="65">&nbsp;</td>
  </tr>
  <tr style="background:url(image/bg1-bot.jpg) no-repeat">
    <td colspan="4"><p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>

      
    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td width="65">&nbsp;</td>
    <td colspan="2" id="copyrightTd">طراحی شده توسط <a href="www.idealg.com" style="color:#CCC; font-size:12px">گروه آرمانی </a> - تابستان 1389</td>
    <td width="65">&nbsp;</td>
  </tr>
</table>
<div id="outerNewBody"><div id="newsBody">
	<table width="600" border="0">
      <tr>
        <th colspan="3" id="fullNewsTitleTd" style="color:#FC0"><br /></th>
      </tr>
      <tr>
        <td id="fullNewsImage" style="vertical-align:top"></td>
        <td width="560" id="fullNewsTd" style="padding:10px;"></td>
        <td width="20">&nbsp;</td>
      </tr>
      <tr>
        <td></td>
        <td id="whoAndWhenTd" style="font-size:12px"></td>
        <td><p align="center"><img src="themes/default/images/close.png" onclick="hideNewsBody()" width="48" height="48" alt="بستن صفحه" /><a style="font-size:14px; color:#F30">بستن</a></p></td>
      </tr>
    </table>
    </div></div>
</body>
</html>



























