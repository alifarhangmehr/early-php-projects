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

<table width="500" border="1" align="center" >
  <tr>
    <td colspan="7">
    <form method="post" action="addLinkP.php">
<table align="center" width="100%" border="0">
<colgroup></colgroup>
<colgroup></colgroup>
<colgroup style="background:#CCC"></colgroup>	 	 	 	 	 	 	 	 
  <tr>
    <td width="343" align="right"><input type="text" name="linkName" id="linkName" /></td>
    <td width="101" align="right">نام لینک</td>
    <td width="32" align="center">1</td>
  </tr>
  <tr>
    <td width="343" align="right"><input type="text" name="linkTarget" id="linkTarget" /></td>
    <td width="101" align="right">هدف لینک</td>
    <td width="32" align="center">2</td>
  </tr>

  <tr>
    <td colspan="3" align="center"><input type="submit" value="افزودن" /></td>
  </tr>
  
</table>
</form>
    </td>
  </tr>
  

</table>
</body>
</html>