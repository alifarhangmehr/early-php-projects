<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="themes/default/css/index.css"/>
<title>ثبت نام</title>
</head>
<body>
<?php
include('header.php');
?>
<br />

<form method="post" action="registerP.php" enctype="multipart/form-data">
<div align="center">
<fieldset style="width:500px">
<legend align="center" style="color:#666">ثبت نام</legend>
<br /><br />
<table align="center" width="500" border="0">
<colgroup></colgroup>
<colgroup></colgroup>
<colgroup style="background:#CCC"></colgroup>
  
  <tr>
    <td width="154" align="right" bgcolor="#CCCCCC"><input name="name" type="text" id="name" size="50"/></td>
    <td width="148" align="right" bgcolor="#CCCCCC">نام</td>
    <td width="20" align="center" bgcolor="#CCCCCC">1</td>
  </tr>
   <tr>
    <td width="154" align="right"><input name="family" type="text" id="family" size="50" /></td>
    <td width="148" align="right">نام خانوادگی</td>
    <td width="20" align="center">2</td>
  </tr>
  <tr>
    <td width="154" align="right"><input name="user" type="text" id="user" size="50" /></td>
    <td width="148" align="right">نام کاربری</td>
    <td width="20" align="center">3</td>
  </tr>
  <tr>
    <td width="154" align="right" bgcolor="#CCCCCC"><input name="academic" type="text" id="academic" value="" size="50" /></td>
    <td width="148" align="right" bgcolor="#CCCCCC">مرتبه علمي</td>
    <td width="20" align="center" bgcolor="#CCCCCC">4</td>
  </tr>
  <tr>
    <td width="154" align="right"><input name="department" type="text" id="department" size="50" /></td>
    <td width="148" align="right">گروه آموزشي</td>
    <td width="20" align="center">5</td>
  </tr>
   <tr>
     <td width="154" align="right" bgcolor="#CCCCCC"><textarea name="educationalRecords" cols="45" rows="3" id="educationalRecords"></textarea></td>
     <td width="148" align="right" bgcolor="#CCCCCC">سوابق تحصيلي</td>
     <td width="20" align="center" bgcolor="#CCCCCC">6</td>
   </tr>
   <tr>
    <td width="154" align="right"><input name="website" type="text" id="website" size="50" /></td>
    <td width="148" align="right">وب سایت</td>
    <td width="20" align="center">7</td>
  </tr>
   <tr>
     <td width="154" align="right" bgcolor="#CCCCCC"><input name="email" type="text" id="email" size="50" /></td>
     <td width="148" align="right" bgcolor="#CCCCCC">ایمیل</td>
     <td width="20" align="center" bgcolor="#CCCCCC">8</td>
   </tr>
   <tr>
    <td width="154" align="right"><input name="pass" type="password" id="normalDiscount" size="50" /></td>
    <td width="148" align="right">کلمه عبور</td>
    <td width="20" align="center">9</td>
  </tr>
   <tr>
     <td width="154" align="right" bgcolor="#CCCCCC"><input type="file" name="file" /></td>
     <td width="148" align="right" bgcolor="#CCCCCC">عکس</td>
     <td width="20" align="center" bgcolor="#CCCCCC">10</td>
   </tr>
   
   
  <tr>
    <td colspan="3" align="center"><input type="submit" class="bt1" value="ثبت نام" /></td>
  </tr>
  
</table>
</fieldset>


</div>
</form>

</body>
</html>
