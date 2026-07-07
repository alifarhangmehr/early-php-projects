<?php
session_start();
if(!isset($_SESSION['validAdmin'])) exit;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../themes/default/css/index.css"/>
<title>خروج از قسمت مدیریت</title>
</head>

<body>
<br /><br /><br /><br /><br />

</body>
</html>
<?php
$_SESSION['validAdmin']=false;
// store  to test if they *were* logged in
unset($HTTP_SESSION_VARS);
$result_dest = session_destroy();
  if ($result_dest)
  {
    echo  '<div align="center" dir="rtl"><font color=green>شما با موفقیت از قسمت مدیریت  خارج شده اید </font></div>';
	echo  '<div align="center" dir="rtl"><font color=green><br />پس از 2 ثانیه به صفحه اول نرم افزار منتقل می شوید ...</font></div>';
	?>
	 <script language="javascript" type="text/javascript">
	   setTimeout("document.location.replace('../index.php')",2000);
       //alert('1');
       //document.location.replace('admin/adminMainPage.php');
	   </script>
	<?php
  }
  else
  {
   // they were logged in and could not be logged out
     echo  '<div align="center" dir="rtl"><font color=orange>اشکال در خروج از حساب کاربری لطفاً جهت خروج قطعی ، پنجره مرورگر را ببندید</font></div>';
  }


?>