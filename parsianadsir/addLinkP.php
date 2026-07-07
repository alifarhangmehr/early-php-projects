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

<title>افزودن لینک</title>
</head>

<body>
<?php


require("class/connection.php");
require("class/shamsiDate.php");
$linkName=$_POST['linkName'];
$linkTarget=$_POST['linkTarget'];
$connector=new connection();
$query="SELECT MAX(linkId) FROM links";
$result=$connector->queryRun($query);
$row = mysql_fetch_array($result);
$linkId=$row['MAX(linkId)']+1;


$connector=new connection();
$query="INSERT INTO `parsianads`.`links` (`linkId`, `linkName`, `linkTarget`) VALUES ('$linkId', '$linkName', '$linkTarget');";
$result=$connector->queryRun($query);

if($result) { 
echo '
<table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="246">اطلاعات با موفقیت ذخیره شد</td>
    <td width="48"><img src="themes/default/images/okIcon.png" width="48" height="48" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><a href="addLink.php">بازگشت</a></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><a href="index.php">صفحه اصلی</a></td>
  </tr>
</table>
';
}
else echo '

<table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="246">اشکال در ذخیره اطلاعات</td>
    <td width="48"><img src="themes/default/images/notOkIcon.png" width="48" height="48" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><a href="addLink.php">بازگشت</a></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><a href="index.php">صفحه اصلی</a></td>
  </tr>
</table>
';

?>
</body>
</html>