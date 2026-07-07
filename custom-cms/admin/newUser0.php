<?php
session_start();
if(!isset($_SESSION['validAdmin'])) exit;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="../themes/default/css/admin.css">
<script language="javascript" type="text/jscript"></script>
<script language="javascript" type="text/javascript" src="../modules/ckeditor/ckeditor.js"></script>
<script language="javascript" type="text/javascript" src="../modules/ckeditor/_samples/sample.js"></script>
<link href="../modules/ckeditor/_samples/sample.css" rel="stylesheet" type="text/css" />
</head>

<body style="font-family:tahoma">
<br /><br />
<form action="newUserP.php" method="post" name="newUserForm">
  <table align="center" id="newsInsertTable" width="250" border="0">
    <tr>
      <td id="photoName" width="96" align="right">نام</td>
      <td width="144" align="right"><input type="text" name="name" id="name" /></td>
    </tr>
    <tr>
      <td align="right" id="serie"><span style="text-align: right">کلمه عبور</span></td>
      <td align="right"><input type="text" name="pass" id="pass" /></td>
    </tr>
    <tr>
      <td><span style="text-align: right">ایمیل</span></td>
      <td style="text-align: right"><input type="text" name="email" id="email" />
      </td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" id="registerUserBut" value="ارسال" width="100px" /></td>
    </tr>
  </table>
</form>


</body>
</html>
