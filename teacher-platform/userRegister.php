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
<script language="javascript" type="text/javascript" src="js/formValidation.js"></script>

<script type="text/javascript">
    _editor_url  = "modules/xinha/"  // (preferably absolute) URL (including trailing slash) where Xinha is installed
    _editor_lang = "en";      // And the language we need to use in the editor.
    _editor_skin = "silva";   // If you want use a skin, add the name (of the folder) here
</script>
<script type="text/javascript" src="modules/xinha/XinhaCore.js"></script>
<script type="text/javascript" src="js/xinha/index/newsComment.js"></script>
<script language="Javascript" src="modules/dl/display.php"></script>

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
<title>ثبت نام</title>
</head>
<body>
	
    <div style="text-align: center;"></div>
	
<div class="div0">
<a href="index.php">صفحه اول</a> | 
<a href="gallery/index.php">گالری عکس</a> | 
<a href="forum/index.php">تالار گفتگو</a> | 
<a href="ehop/index.php">فروشگاه</a> | 
<a href="downloads/index.php">دانلود آموزش ها و ...</a> | 
<a href="userRegister.php">ثبت نام</a>
</div>
<table width="959px" class="table1" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr height="35px">
    <td colspan="3" width="959" height="35px">&nbsp;</td>
  </tr>
  <tr>
    <td width="116px" height="307px">&nbsp;</td>
    <td width="727px" height="307px"><img src="themes/default/images/arthasTitle.jpg" width="727" height="307" /></td>
    <td width="116px" height="307px">&nbsp;</td>
  </tr>
  <tr height="20px">
    <td colspan="3" width="959" height="20px">&nbsp;</td>
  </tr>
  <tr height="220px">
    <td width="116px" height="220px">&nbsp;</td>
    <td width="727px" height="220px">
    	<table width="727px" height="230px" border="0" cellpadding="0" cellspacing="0">
        	<tr height="220px">
            	<td width="500px" height="230px">
                    <div class="div2"></div><div class="div1">
                    <p>سلام به همه دوستان WoW باز خوبم</p>
                    <p>برگشتم ولی اینبار با قدرت</p>
                    <p>سایت به زودی از ورژن Alpha به Beta و در نهایت به ورژن Stable ارتقا پیدا میکنه ولی به شرطی که لطف کنید همه باگ ها و Error های سایت را در قسمت نظرات اعلام کنید با تشکر</p>
                    <a href="http://lich.ir/modules/dl/click.php?id=3" style="font-weight:bold">دانلود متن کامل آموزش WoW </a> | تعداد دانلود : <script language="Javascript">ccount_display('3')</script>
                    </div>
              </td>
                <td width="27px" height="220px"></td>
                <td width="200px" height="220px">
                	<div class="div4"></div>
                    <div class="div3">
                    <table border="0" cellpadding="0" cellspacing="0" align="center">
<tr>
<td>
<?php

	if ($userLoginCondition==0){
	echo'
    <form method="post" action="userLoginP.php">
    <table align="center" id="userLoginTable">
    <tr>
    <td>نام کاربری</td>
	</tr>
	<tr><td><input type="text" name="user" id="user" class="input" /></td></tr>
    <tr>
    <td>کلمه عبور</td></tr>
	<tr><td><input type="password" name="pass" class="input" /></td></tr>
    <tr>
    <td height="50px"><input type="submit" value="ورود" class="greenBut" /></td>
    </tr>
    </table>
    </form>
	';
	}else{
	echo '
	<table align="center" id="userLoginTable">
    <tr>
    <td>خوش اومدی '.$name.'</td></tr>
	<tr><td align="center"><a href="users/index.php">مدیریت</a></td></tr>
	<tr><td align="center"><a href="userLogout.php">خروج</a></td></tr>
	</table>
	';
		
	}
?>
</td>
</tr>
</td>
</table>

</div>
                    
                </td>
            </tr>
        </table>    
    </td>
    <td width="116px" height="220px">&nbsp;</td>
  </tr>
  <tr height="20px">
    <td colspan="3" height="20px" width="959px">&nbsp;</td>
  </tr>
  <tr>
    <td width="116px">&nbsp;</td>
    <td width="727px" class="td1">
    
    <div class="div5" >
    
              
    <table border="0" id="newsTable" align="center">
<?php
	include('class/connect.php');
	include('includes/shamsiDate.php');
	include('class/playWithDate.php');
	include('class/phpFarsiNumberFULL.php');
	$Convertnumber2farsi=new Convertnumber2farsi();
?>

	<table width="100%" border="0" cellpadding="0" cellspacing="0">
   	  <tr>
        <td colspan="3" height="50px"></td>
      </tr>
      <tr>
        <td colspan="3" style="color:#FC0"><br /></td>
      </tr>
      <tr>
        <td style="vertical-align:top"></td>
        <td width="560" style="padding:10px;">
        <form method="post" action="userRegisterP.php" name="form1" id="form1">
       <table width="560" border="0" align="center" cellpadding="3" cellspacing="2" onkeydown="formValidation()" onkeyup="formValidation()" dir="ltr" class="registerTable">
      <tr>
        <td width="250" align="left" id="tempId">&nbsp;</td>
        <td width="150" align="center" valign="middle"><input type="text" name="id" id="id" maxlength="12" /></td>
        <td width="160" align="right">آیدی </td>
      </tr>
      <tr>
        <td align="left" id="passTd">&nbsp;</td>
        <td align="center" valign="middle"><input type="password" name="pass" id="pass" maxlength="35" /></td>
        <td align="right">کلمه عبور </td>
      </tr>
      <tr>
        <td align="left" id="emailTd">&nbsp;</td>
        <td align="center" valign="middle"><input type="text" name="email" id="email" maxlength="50"/></td>
        <td align="right">ایمیل</td>
      </tr>
      <tr>
        <td align="left">&nbsp;</td>
        <td align="center" id="engDate">
        <?php
		echo '<input type="text" name="miladiDate" readonly="readonly" value="'.date(Y.'/'.m.'/'.d).'" />';
		?>       
        </td>
        <td align="right" dir="rtl">تاریخ عضویت ( میلادی )</td>
      </tr>
      <tr>
        <td align="left">&nbsp;</td>
        <td align="center"  id="shamsiDate">
        <?php
        include("php/shamsiDate.php");
		echo '<input type="text" value="'.$Convertnumber2farsi-> Convertnumber2farsi(jdate("Y")."/".jdate("m")."/".jdate("d")).'" readonly="readonly" />
		<div style="display:none">
		<input type="text" name="shamsiDate" value="'.jdate("Y")."/".jdate("m")."/".jdate("d").'"  />
		'.'</div>';
		
		?>
        </td>
        <td align="right" dir="rtl">تاریخ عضویت ( خورشیدی )</td>
      </tr>
      <tr>
        <td align="left">&nbsp;</td>
        <td align="center" valign="middle"><input type="button" onclick="finalFormValidate()" value="ثبت نام" class="button3" />
          </td>
        <td align="right">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3" align="right" dir="rtl" style="color:#F90"><p></p></td>
        </tr>
    </table>

       

		






		
















       
       
       
       

        </td>
        <td width="20">&nbsp;</td>
      </tr>
      
      <tr>
        <td colspan="3" height="20px"></td>
      </tr>
      
      <tr>

        <td colspan="3" id="whoAndWhenTd" style="font-size:12px; background:#444" align="center"></td>

      </tr>
      
    </table>

















    
    
    
    <td width="116px">&nbsp;</td>
  </tr>
  <tr>
    <td width="116px">&nbsp;</td>
    <td width="727px">


    <p align="center"><img src="themes/default/images/blizzardLogo.jpg" width="150" height="84" /></p>
    <div id="flashcontent" style="text-align:center" dir="ltr">
		To view the <a href="http://www.e-phonic.com/mp3player/" target="_blank">E-Phonic MP3 Player</a> you will need to have Javascript turned on and have <a href="http://www.adobe.com/go/getflashplayer/" target="_blank">Flash Player 9</a> or better installed.
	</div>
	<script type="text/javascript">
		// <![CDATA[

		var so = new SWFObject("flash/ep_player.swf", "ep_player", "301", "16", "9", "#FFFFFF");
		so.addVariable("skin", "skins/micro_player/skin.xml");
		so.addVariable("playlist", "playlist.xml");
		so.addVariable("autoplay", "false");
		so.addVariable("shuffle", "false");
		so.addVariable("repeat", "false");
		so.addVariable("buffertime", "1");
		so.addParam("allowscriptaccess", "always");
		so.write("flashcontent");

		// ]]>
	</script>
    <p class="footerText" align="center">هرگونه کپی برداری تنها با ذکر نام Arthas.ir | Lich.ir امکان پیذیر میباشد :: این سایت مورد تایید Blizzard نمی باشد</p>
<p class="footerText" align="center">طراحی توسط .:: <a href="mailto:ali.farhangmehr@gmail.com">علی فرهنگ مهر</a></p>
<p class="footerText" align="center">&nbsp;</p>

   
    </td>
    <td width="116px">&nbsp;</td>
  </tr>
  
</table>
<div id="outerAlertDiv">
<div id="alertDiv">
<table width="600px" border="0" cellpadding="0" cellspacing="0">
	<tr>
    	<td height="18" align="center"><br />
   	    <p style="font-size:12px; font-weight:bold; color:#F90">لطفا همه کادرها را به درستی تکمیل کنید</p></td>
    </tr>
	<tr>
    	<td><p align="center"><img src="photo/alertIcon.png" width="80" height="80" /></p>
    	  <p align="center">
          <input type="button" value="این کادر را ببند" onclick="closeAlertDiv()" class="button3" />
      	  </p>
      	</td>
    </tr>

</table>
</div>
</div>
<div id="outerCoverDiv">
<div id="coverDiv" align="center">
<p>&nbsp;</p>

<table align="center" width="600px" border="0" cellspacing="0" cellpadding="0" style="font-size:10px; margin:5px; z-index:999" dir="ltr">
  <tr>
    <td colspan="4" style="text-align: right"><p style="font-size:12px">تایید این فرم به منزله تایید اطلاعات ورودی است . لطفا با دقت همه ورودی ها را چک و سپس بر روی تایید نهایی کلیک کنید در غیر این صورت بر روی کلید تصحیح کلیک نمایی</p>
      <p>&nbsp;</p></td>
    </tr>
  <tr>
    <td width="40%" class="coverDivResult" id="idTdCheck" style="text-align: right"></td>
    <td style="text-align: center">..................</td>
    <td width="40%" style="text-align: left">نام کاربری</td>
  </tr>
  <tr>
    <td width="40%" class="coverDivResult" id="passTdCheck" style="text-align: right"></td>
    <td style="text-align: center">..................</td>
    <td width="40%" style="text-align: left">کلمه عبور</td>
  </tr>
  <tr>
    <td width="40%" class="coverDivResult" id="emailTdCheck" style="text-align: right"></td>
    <td style="text-align: center">..................</td>
    <td width="40%" style="text-align: left">ایمیل</td>
  </tr>
  <tr>
    <td colspan="4" style="text-align: right">
      <p align="center">&nbsp;</p>
      <p align="center">
        <input type="submit" value="تایید نهایی" class="button2" style="z-index:999" />
        &nbsp;
        <input type="button" value="تصحیح" onclick="correction()" class="button1" style="z-index:999" />
      </p>
    </td>
    </tr>

</table>
<div style="display:none; position:absolute">
<input type="text" name="hiddenId" id="hiddenId" value="" />
<input type="text" name="hiddenPass" id="hiddenPass" value="" />
<input type="text" name="hiddenEmail" id="hiddenEmail" value="" />
</div>

</div>
</div>
</div>
</form>
</body>
</html>