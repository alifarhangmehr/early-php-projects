<?php
session_start();
if(!isset($_SESSION['validUser'])) exit;
require('../includes/shamsiDate.php');
require_once("../class/connect.php");
$user=$_SESSION['validUser'];
$connector=new connect();
if(!$connector->dbConnect()) echo 'error 1';
$query="SELECT * FROM igwstudents WHERE user='$user'"; 
$result=$connector->queryRun($query);
$num=mysql_num_rows($result);
    for($i=0;$i<$num;$i++){
        $row = mysql_fetch_array($result);
		//$studentNumber2= $row['studentNumber'];
		$name2= $row['name'];
		$name2= $row['family'];
		$pName2= $row['pName'];
		$pFamily2= $row['pFamily'];
//		$father= $row['father'];
//		$country= $row['country'];
//		$state= $row['state'];
//		$city= $row['city'];
//		$email= $row['email'];
//		$website= $row['website'];
//		$nationalCode= $row['nationalCode'];
//		$gender= $row['gender'];
//		$single= $row['single'];
//		$birthday= $row['birthday'];
//		$birthPlace= $row['birthPlace'];
//		$education= $row['education'];
//		$interest= $row['interest'];
//		$brief= $row['brief'];
//		$mobile1= $row['mobile1'];
//		$mobile2= $row['mobile2'];
//		$telephone= $row['telephone'];
//		$homeAddress= $row['homeAddress'];
//		$workAddress= $row['workAddress'];
//		$homePage= $row['homePage'];
		$image= $row['image'];
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>پنل کاربران</title>
<link rel="stylesheet" type="text/css" href="../themes/default/css/users.css">
<script language="javascript" type="text/javascript" src="../java/admin/admin.js"></script>


<!-- Sliding_login_panel_jquery_start -->
    
  	<link rel="stylesheet" href="../modules/Sliding_login_panel_jquery/css/slide.css" type="text/css" media="screen" />
  	<link rel="stylesheet" href="../modules/Sliding_login_panel_jquery/css/style.css" type="text/css" media="screen" />
	 <!-- jQuery - the core -->
	<script src="../modules/Sliding_login_panel_jquery/js/jquery-1.3.2.min.js" type="text/javascript"></script>
	<!-- Sliding effect -->
	<script src="../modules/Sliding_login_panel_jquery/js/slide.js" type="text/javascript"></script>
<!-- Sliding_login_panel_jquery_end -->


</head>
<body>

<div id="toppanel">
	<div id="panel">
		<div class="content clearfix">
			<div class="left">
				<h1>مشخصات دانشجو</h1>
				<p class="grey">در این قسمت مشخصات دانشجوی حاضر نمایش داده میشود</p>
                <br /><br />
                <table border="0" cellpadding="2" cellspacing="2" width="250px">
                <tr><td rowspan="4">
                <img src="<?php if($image!='')echo $image ; else echo '../themes/default/images/users/userPhoto.png' ; ?>" />
            	</td>
                <td align="center">
                <a>خوش آمدید </a><a style="color:#F90"><?php echo $pName2.' '.$pFamily2.' '; ?></a></td>
                <tr><td align="center">تاریخ شمسی : <a style="color:#6C3"><?php echo jdate("Y").'/'.jdate("m").'/'.jdate("d"); ?></a></td></tr>
                <tr><td align="center">تاریخ میلادی : <a style="color:#6C3"><?php echo date("Y").'/'.date("m").'/'.date("d"); ?></a></td></tr>
                <tr><td align="center"></td></tr>
                </td></tr>
                <tr><td colspan="2" align="left" style="color:#555">#<?php echo $studentNumber2; ?></td></tr>
                </table>
			</div>
			<div class="left">
					<h1>اطلاعات دانشجو</h1>
					<p class="grey">در این بخش ابزار مربوط به اطلاعات دانشجو گنجانده شده است</p>
              	 	<a href="editDetail.php" target="adminIframe"><img src="../themes/default/images/users/editUserDetailIcon.png" width="32" height="32" align="middle" />&nbsp;&nbsp; اصلاح مشخصات</a>
			</div>
			<div class="left right">
				<h1>ابزارها</h1>
                <p class="grey">در این قسمت ابزارهای مفید برای کاربران گلچین شده اند</p>
                 <a href="sendMsgToAdmin.php" target="adminIframe"><img src="../themes/default/images/users/sendMsgToAdminIcon.png" width="32" height="32" align="middle" />&nbsp;&nbsp; ارسال پیغام به مدیر </a>
                <br />
                <br />
                 <a href="msgInobx.php" target="adminIframe"><img src="../themes/default/images/users/inboxIcon.png" width="32" height="32" align="middle" />&nbsp;&nbsp;صندوق پیغام ها</a>
                <br />
                <br />
                <a href="board.php" target="adminIframe"><img src="../themes/default/images/users/stdBoardIcon.png" width="32" height="32" align="middle" />&nbsp;&nbsp;بورد </a>
                <br />
                <br />
                <a href="../userLogout.php" ><img src="../themes/default/images/logout.png" width="32" height="32" align="middle" />&nbsp;&nbsp;خروج از حساب </a>
                <br />
                <br />
                
                
                
                
			</div>
		</div>
</div> <!-- /login -->	

	<!-- The tab on top -->	
	<div class="tab">
		<ul class="login">
			<li class="left">&nbsp;</li>
			<li>ابزار ها</li>
			<li class="sep">|</li>
			<li id="toggle">
				<a id="open" class="open" href="#">نمایش</a>
				<a id="close" style="display: none;" class="close" href="#">مخفی کردن</a>			
			</li>
			<li class="right">&nbsp;</li>
		</ul> 
	</div> <!-- / top -->
	
</div> <!--panel -->

    <div id="container">
		<div id="content" style="padding-top:100px;">
	  </div>
		<!-- / content -->		
	</div><!-- / container -->
    <iframe id="adminIframe" name="adminIframe" src="board.php" width="100%" height="700px" style="background:#000; border:none"></iframe>
    </a></a>
<!-- PersianStat -->
<!-- URL: http://farhangmehr.ir -->
<script language='javascript' type='text/javascript' src='http://www.persianstat.com/service/stat.js'></script>
<script language='javascript' type='text/javascript'>
persianstat(10127655, 0);
</script>
<!-- /PersianStat -->

</body>
</html>