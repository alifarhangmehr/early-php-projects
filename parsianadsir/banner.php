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
<link rel="stylesheet" type="text/css" href="themes/default/css/index.css"/>

<title>Untitled Document</title>
</head>

<body>
<p align="center">اسلاید شو</p>
<form method="post" action="banner1P.php" enctype="multipart/form-data">
<table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><input type="file" name="image1" /></td>
    <td>تصویر 1</td>
  </tr>
  <tr>
    <td><input type="file" name="image2" /></td>
    <td>تصویر 2</td>
  </tr>
  <tr>
    <td><input type="file" name="image3" /></td>
    <td>تصویر 3</td>
  </tr>
  <tr>
    <td><input type="file" name="image4" /></td>
    <td>تصویر 4</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" value="ارسال تصاویر" /></td>
  </tr>
</table>
</form>
<br />
<br />
<p align="center">بنر پایین صفحه</p>

<form method="post" action="banner2P.php" enctype="multipart/form-data">
<table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><input type="file" name="image5" /></td>
    <td>تصویر 1</td>
  </tr>
  <tr style="display:none">
    <td><input type="file" name="image6" /></td>
    <td>تصویر 2</td>
  </tr>
  <tr style="display:none">
    <td><input type="file" name="image7" /></td>
    <td>تصویر 3</td>
  </tr>
  <tr style="display:none">
    <td><input type="file" name="image8" /></td>
    <td>تصویر 4</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" value="ارسال تصاویر" /></td>
  </tr>
</table>
</form>
<br />
<br />
<p align="center">عکس های کناری</p>

<form method="post" action="banner3P.php" enctype="multipart/form-data">
<table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><input type="file" name="image9" /></td>
    <td>تصویر 1</td>
  </tr>
  <tr>
    <td><input type="file" name="image10" /></td>
    <td>تصویر 2</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" value="ارسال تصاویر" /></td>
  </tr>
</table>
</form>
<?php
require('class/connection.php');
$connector=new connection();
$query="SELECT * FROM goods WHERE goodName LIKE '%$search%'";
$result=$connector->queryRun($query);



?>
</body>
</html>