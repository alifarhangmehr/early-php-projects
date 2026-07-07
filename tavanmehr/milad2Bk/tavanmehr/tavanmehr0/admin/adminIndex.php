<?php
session_start();
if(!isset($_SESSION['validAdmin'])) exit;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../themes/default/css/index.css"/>
<title>مدیریت نرم افزار اتوماسیون </title>
</head>
<?php
session_start();
if(!isset($_SESSION['validAdmin'])) exit;
?>
<body>
<div style="position:absolute; bottom:0px; right:0px; z-index:1" ></div>
<table align="center" width="99%" border="0" cellpadding="0" cellspacing="0" bordercolor="#006666">
  <tr bgcolor="#C4DAF4" valign="middle" height="40px">
    <td width="62" align="left" valign="top"></td>
    <td width="78" align="center" valign="middle"><a href="logout.php" >خروج <img src="../themes/default/images/logout.png" width="32" height="32" style="vertical-align:middle" /></a></td>
    <td width="116" align="center" valign="middle"><a href="search.php" target="iframe1">جستجوی<img src="../themes/default/images/search.png" alt="" width="32" height="32" style="vertical-align:middle" /> مددجو</a><br />
    </td>
    <td width="75" align="center" valign="middle"><a href="addPatient.php" target="iframe1">افزودن &nbsp;<img src="../themes/default/images/addPatient.png" alt="" width="32" height="32" style="vertical-align:middle" />&nbsp;مددجو</a></td>
   <td width="85" align="center" valign="middle"><a href="showPatient.php" target="iframe1">لیست &nbsp;<img src="../themes/default/images/list.png" alt="" width="32" height="32" style="vertical-align:middle" />&nbsp;مددجویان</a></td>
  </tr>
</table>
<div align="center" id="iframeDiv"><iframe name="iframe1" id="iframe1" src="showPatient.php" frameborder="0" align="middle"  width="99%" height="530px" style="border:#176F99 thin solid"></iframe></div>


</body>
</html>