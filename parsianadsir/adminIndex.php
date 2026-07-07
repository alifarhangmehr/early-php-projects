<?php
session_start();
if($_SESSION['allowEnterAdminArea']!=true){
	echo '
	<html><body>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="themes/default/css/index.css">
	<p align="center">ّبرای دسترسی به این قسمت باید از لینک زیر افدام نمایید</p>
	<p align="center">ّ<a href="adminLogin.php">ورود مدیر</a></p>
</body>
</html>
';
	exit;	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>صفحه مدیریت</title>
    </head>
    <style type="text/css">
		body{font-family:tahoma; font-size:12px; direction:rtl;}
		.menu a:link,.menu a:active,.menu a:visited{background:#eee; color:#555; padding:5px 15px 7px 15px; margin-left:10px; text-decoration:none; border-top-left-radius:50px;}
		.menu a:hover{background:#09F; color:#fff; }
		img{margin-left:5px;}
	</style>
    <body style="direction:rtl; overflow:auto">
    	<table border="0" cellpadding="0" cellspacing="0" align="center" width="95%" style="border-radius:10px; margin-top:10px;">
        	<tr>
            	<td width="100" class="menu">
                	<a href="index.php" target="adminFrame"><img src="img/home.gif" align="middle" border="0" />صفحه اصلی</a>
                	<a href="showGood.php" target="adminFrame"><img src="img/show.gif" align="middle" border="0" />نمایش کالا</a>
                	<a href="addGood.php" target="adminFrame"><img src="img/add.gif" align="middle" border="0" />افزودن کالا</a>
                	<a href="banner.php" target="adminFrame"><img src="img/mngkala.gif" align="middle" border="0" />مدیریت بنر</a>
                	<a href="showLink.php" target="adminFrame"><img src="img/mnglink.gif" align="middle" border="0" />مدیریت لینکها</a>
                </td>
            </tr>
        	<tr>
            	<td style="background:#eee;">
                	<iframe width="100%" height="600px" frameborder="0" scrolling="no" src="showGood.php" name="adminFrame" style="border:thin solid #000; overflow:scroll"></iframe>
                </td>
            </tr>
        </table>
    </body>
</html>
