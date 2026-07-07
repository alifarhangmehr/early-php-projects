<?php
session_start();
if(!isset($_SESSION['validAdmin'])) exit;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../themes/default/css/index.css"/>
<title>فرم افزودن مددجو</title>
</head>
<body>
<?php
include("header.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	require('../class/connection.php');
	$connector=new connection();
	if(!$connector->dbConnect()) echo 'error 1';
	$query="SELECT MAX(employeeId) FROM employee";
	$result=$connector->queryRun($query);
	$row = mysql_fetch_array($result);
	//echo $row['MAX(foodCode)'];
	$employeeId=$row['MAX(employeeId)']+1;
	//echo '<br />patientId:'.$patientId.'<br />';
	
?>




<form method="post" action="addEmployeeP.php" enctype="multipart/form-data">
<div align="center">
<fieldset style="width:750px">
<legend align="center" style="color:#666">مشخصات پرسنل</legend>
<br /><br /><br />
<br />
<table align="center" width="550px" border="0">
<colgroup></colgroup>
<colgroup></colgroup>
<colgroup style="background:#CCC"></colgroup>
  <tr>
    <td width="154" align="right"><input type="text" name="employeeId" id="employeeId" value="<?php echo $employeeId;  ?>" readonly="readonly" /></td>
    <td width="148" align="right">آیدی پرسنل</td>
    <td width="20" align="center">1</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="name" id="name" /></td>
    <td width="148" align="right">نام</td>
    <td width="20" align="center">2</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="family" id="family" /></td>
    <td width="148" align="right">فامیل</td>
    <td width="20" align="center">3</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="father" id="father" /></td>
    <td width="148" align="right">نام پدر</td>
    <td width="20" align="center">4</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="birthday" id="birthday" /></td>
    <td width="148" align="right">تاریخ تولد </td>
    <td width="20" align="center">5</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="sex" id="sex" /></td>
    <td width="148" align="right">جنسیت</td>
    <td width="20" align="center">6</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="marital" id="marital" /></td>
    <td width="148" align="right">وضعیت تاهل</td>
    <td width="20" align="center">7</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="education" id="education" /></td>
    <td width="148" align="right">تحصیلات</td>
    <td width="20" align="center">8</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="course" id="course" /></td>
    <td width="148" align="right">رشته</td>
    <td width="20" align="center">9</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="melliCode" id="melliCode" /></td>
    <td width="148" align="right">کد ملی</td>
    <td width="20" align="center">10</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="shenasNo" id="shenasNo" /></td>
    <td width="148" align="right">شماره شناسنامه</td>
    <td width="20" align="center">11</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="shenasSerial" id="shenasSerial" /></td>
    <td width="148" align="right">سری شناسنامه</td>
    <td width="20" align="center">12</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="shenasSodur" id="shenasSodur" /></td>
    <td width="148" align="right">محل صدور شناسنامه</td>
    <td width="20" align="center">13</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="postalCode" id="postalCode" /></td>
    <td width="148" align="right">کد پستی</td>
    <td width="20" align="center">14</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="birthplace" id="birthplace" /></td>
    <td width="148" align="right">محل تولد</td>
    <td width="20" align="center">15</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="emloymentDate" id="emloymentDate" /></td>
    <td width="148" align="right">تاریخ استخدام</td>
    <td width="20" align="center">16</td>
  </tr>
  <tr>
    <td width="154" align="right"><textarea name="address" id="address"></textarea></td>
    <td width="148" align="right">آدرس</td>
    <td width="20" align="center">17</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="tel" id="tel" /></td>
    <td width="148" align="right">تلفن</td>
    <td width="20" align="center">18</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="mobile" id="mobile" /></td>
    <td width="148" align="right">موبایل</td>
    <td width="20" align="center">19</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="bank" id="bank" /></td>
    <td width="148" align="right">نام بانک</td>
    <td width="20" align="center">20</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="bankBranch" id="bankBranch" /></td>
    <td width="148" align="right">شعبه بانک</td>
    <td width="20" align="center">21</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="bankAccount" id="bankAccount" /></td>
    <td width="148" align="right">شماره حساب</td>
    <td width="20" align="center">22</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="email" id="email" /></td>
    <td width="148" align="right">ایمیل</td>
    <td width="20" align="center">23</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="job" id="job" /></td>
    <td width="148" align="right">شغل</td>
    <td width="20" align="center">24</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="military" id="military" /></td>
    <td width="148" align="right">وضعیت سربازی</td>
    <td width="20" align="center">25</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="file" name="file" id="file" style="direction:ltr" /></td>
    <td width="148" align="right">عکس</td>
    <td width="20" align="center">26</td>
  </tr>
  <tr height="70px">
    <td colspan="3" align="center"><input type="submit" value="اضافه کن" /></td>
  </tr>
</table>
</fieldset>







</body>
</html>
