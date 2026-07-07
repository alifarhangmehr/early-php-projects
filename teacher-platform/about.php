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
<title>درباره</title>
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
	<tr><td align="center"><a href="users/index.php">مدیریت</a></td></tr>
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
    <td width="683" colspan="2" align="center" dir="ltr">
	<p align="center">.:: Ali Farhangmerh ::.</p>
    Web Designer
    <br />
    IGW+ Certificate Authorised Teaching Assistant (TA)
    <br />
    Advance theme designing
    <br />
    Modern CMS design and programming
    <br />
    Online office automation
    <br />
    XHTML | CSS | ActionScript | JavaScript | PHP | Ajax
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



























