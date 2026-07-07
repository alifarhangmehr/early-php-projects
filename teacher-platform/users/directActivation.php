<?php
//session_start();
error_reporting(0);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="themes/default/css/index.css"/>
<title>ثبت قیف</title>
</head>
<body>
<br />
<?php 
$uuid=$_GET['uuid'];
?>
<form method="post" action="activationP.php" enctype="multipart/form-data">
<input type="hidden" name="uuid" value="<?php echo $uuid; ?>" />
<div align="center">
<fieldset style="width:700px">
<legend align="center" style="color:#666">ثبت قیف</legend>
<br /><br />
<table align="center" width="455" border="0" dir="ltr">
<colgroup></colgroup>
<colgroup></colgroup>
<colgroup style="background:#CCC"></colgroup> 
   <tr>
     <td width="154" align="right" bgcolor="#EAEAEA">
     <input name="user" type="text" id="user" size="30" /></td>
     <td width="148" align="right" bgcolor="#EAEAEA">نام کاربری</td>
     </tr>
     <tr>
     <td width="154" align="right" bgcolor="#EAEAEA">
     <input name="pass" type="password" id="pass" size="30" /></td>
     <td width="148" align="right" bgcolor="#EAEAEA">نام کلمه عبور</td>
     </tr>
     <tr>
     <td width="154" align="right" bgcolor="#EAEAEA">
     <input name="companyName" type="text" id="companyName" size="30" /></td>
     <td width="148" align="right" bgcolor="#EAEAEA">نام شرکت</td>
     </tr>
     <tr>
     <td width="154" align="right" bgcolor="#EAEAEA"><textarea name="whatToDo" cols="30" id="whatToDo"></textarea></td>
     <td width="148" align="right" bgcolor="#EAEAEA">خدمات</td>
     </tr>
   <tr>
     <td width="154" align="right" bgcolor="#EAEAEA"><textarea name="address1" cols="30" id="address1"></textarea></td>
     <td width="148" align="right" bgcolor="#EAEAEA">آدرس 1</td>
     </tr>
  <tr>
    <td width="154" align="right" bgcolor="#EAEAEA"><textarea name="address2" cols="30" id="address2"></textarea></td>
    <td width="148" align="right" bgcolor="#EAEAEA">آدرس 2</td>
    </tr>
  <tr>
    <td width="154" align="right" bgcolor="#EAEAEA">
    <input name="tel1" type="text" id="tel1" size="30" /></td>
    <td width="148" align="right" bgcolor="#EAEAEA">تلفن 1</td>
    </tr>
  <tr>
    <td width="154" align="right" bgcolor="#EAEAEA">
    <input name="tel2" type="text" id="tel2" size="30" /></td>
    <td width="148" align="right" bgcolor="#EAEAEA">تلفن 2</td>
    </tr>
  <tr>
    <td width="154" align="right" bgcolor="#EAEAEA">
    <input name="mob1" type="text" id="mob1" size="30" /></td>
    <td width="148" align="right" bgcolor="#EAEAEA">موبایل 1</td>
    </tr>
  <tr>
    <td width="154" align="right" bgcolor="#EAEAEA">
    <input name="mob2" type="text" id="mob2" size="30" /></td>
    <td width="148" align="right" bgcolor="#EAEAEA">موبایل 2</td>
    </tr>
  <tr>
    <td width="154" align="right" bgcolor="#EAEAEA">
    <input name="sms1" type="text" id="sms1" size="30" /></td>
    <td width="148" align="right" bgcolor="#EAEAEA">اس ام اس 1</td>
    </tr>
  <tr>
    <td width="154" align="right" bgcolor="#EAEAEA">
    <input name="sms2" type="text" id="sms2" size="30" /></td>
    <td width="148" align="right" bgcolor="#EAEAEA">اس ام اس 2</td>
    </tr>
  <tr>
    <td width="154" align="right" bgcolor="#EAEAEA">
    <input name="fax1" type="text" id="fax1" size="30" /></td>
    <td width="148" align="right" bgcolor="#EAEAEA">فکس 1</td>
    </tr>
  <tr>
    <td width="154" align="right" bgcolor="#EAEAEA">
    <input name="fax2" type="text" id="fax2" size="30" /></td>
    <td width="148" align="right" bgcolor="#EAEAEA">فکس 2</td>
    </tr>
  
  <tr> 	 	 	 	 	 	 	 	 	 	 	 	 
    <td width="154" align="right" bgcolor="#EAEAEA">
    <input name="site1" type="text" id="site1" size="30" /></td>
    <td width="148" align="right" bgcolor="#EAEAEA">سایت 1</td>
    </tr>
  <tr>
  <tr> 	 	 	 	 	 	 	 	 	 	 	 	 
    <td width="154" align="right" bgcolor="#EAEAEA">
    <input name="site2" type="text" id="site2" size="30" /></td>
    <td width="148" align="right" bgcolor="#EAEAEA">سایت 2</td>
    </tr>
  <tr>
  <tr> 	 	 	 	 	 	 	 	 	 	 	 	 
    <td width="154" align="right" bgcolor="#EAEAEA">
    <input name="email1" type="text" id="email1" size="30" /></td>
    <td width="148" align="right" bgcolor="#EAEAEA">ایمیل 1</td>
    </tr>
  <tr>
    <td width="154" align="right" bgcolor="#EAEAEA">
    <input type="text" name="email2" id="email2" size="30" /></td>
    <td width="148" align="right" bgcolor="#EAEAEA">ایمیل 2</td>
    </tr>
 
    <tr>
      <td width="154" align="right" bgcolor="#EAEAEA"><input type="file" name="file" /></td>
      <td width="148" align="right" bgcolor="#EAEAEA">لوگو - ابعاد  150*290</td>
      </tr>
       <tr>
      <td width="154" align="right" bgcolor="#EAEAEA">
      <input type="text" name="serial1" size="4" maxlength="4" />-
      <input name="serial2" type="text" size="4" maxlength="4" />-
      <input type="text" name="serial3" size="4" maxlength="4" />-
      <input type="text" name="serial4" size="4" maxlength="4" />
      </td>
      <td width="148" align="right" bgcolor="#EAEAEA">سریال قیف</td>
      </tr>
 
</table>
</fieldset>
<p align="center"><input type="submit" class="button small blue" value="ثبت" /></p>



</form>

</body>
</html>
