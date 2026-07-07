<?php
session_start();
if(!isset($_SESSION['validAdmin'])) exit;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../themes/default/css/index.css"/>
<title>افزودن مددجو</title>
</head>
<body>


<?php
include("header.php");
?>


<?php
	require('../class/connection.php');
	$connector=new connection();
	if(!$connector->dbConnect()) echo 'error 1';
	$query="SELECT MAX(patientId) FROM patient";
	$result=$connector->queryRun($query);
	$row = mysql_fetch_array($result);
	//echo $row['MAX(foodCode)'];
	$patientId=$row['MAX(patientId)']+1;
	//echo '<br />patientId:'.$patientId.'<br />';
	
?>



<form method="post" action="addPatientP.php" enctype="multipart/form-data">
<div align="center">
<fieldset style="width:750px">
<legend align="center" style="color:#666">مشخصات مددجو</legend>
<br /><br /><br />
<br />
<table align="center" width="550px" border="0">
<colgroup></colgroup>
<colgroup></colgroup>
<colgroup style="background:#CCC"></colgroup>
  <tr style="display:none">
    <td width="154" align="right"><input type="text" name="patientId" id="patientId" value="<?php echo $patientId;  ?>" readonly="readonly" /></td>
    <td width="148" align="right">آیدی مددجو</td>
    <td width="20" align="center">0</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="patientCode" id="patientCode" /></td>
    <td width="148" align="right">کد مددجو</td>
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
    <td width="154" align="right"><input type="text" name="birthplace" id="birthplace" /></td>
    <td width="148" align="right">محل تولد </td>
    <td width="20" align="center">6</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="melliCode" id="melliCode" /></td>
    <td width="148" align="right">کد ملی</td>
    <td width="20" align="center">7</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="shenasNo" id="shenasNo" /></td>
    <td width="148" align="right">شماره شناسنامه</td>
    <td width="20" align="center">8</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="shenasSerial" id="shenasSerial" /></td>
    <td width="148" align="right">سریال شناسنامه</td>
    <td width="20" align="center">9</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="shenasSodur" id="shenasSodur" /></td>
    <td width="148" align="right">محل صدور شناسنامه</td>
    <td width="20" align="center">10</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="disabilityCode" id="disabilityCode" /></td>
    <td width="148" align="right">کد معلولیت</td>
    <td width="20" align="center">11</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="disabilityType" id="disabilityType" /></td>
    <td width="148" align="right">نوع معلولیت</td>
    <td width="20" align="center">12</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="disabilityStartDate" id="disabilityStartDate" /></td>
    <td width="148" align="right">تاریخ شروع معلولیت</td>
    <td width="20" align="center">13</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="caseNumber" id="caseNumber" /></td>
    <td width="148" align="right">شماره پرونده</td>
    <td width="20" align="center">14</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="homeAdress1" id="homeAdress1" /></td>
    <td width="148" align="right">آدرس منزل 1</td>
    <td width="20" align="center">15</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="homeAdress2" id="homeAdress2" /></td>
    <td width="148" align="right">آدرس منزل 2</td>
    <td width="20" align="center">16</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="postalCode" id="postalCode" /></td>
    <td width="148" align="right">کد پستی</td>
    <td width="20" align="center">17</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="tel1" id="tel1" /></td>
    <td width="148" align="right">تلفن 1</td>
    <td width="20" align="center">18</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="tel2" id="tel2" /></td>
    <td width="148" align="right">تلفن 2</td>
    <td width="20" align="center">19</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="mobile1" id="mobile1" /></td>
    <td width="148" align="right">موبایل 1</td>
    <td width="20" align="center">20</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="mobile2" id="mobile2" /></td>
    <td width="148" align="right">موبایل 2</td>
    <td width="20" align="center">21</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="file" name="file" id="file" style="direction:ltr" /></td>
    <td width="148" align="right">عکس 1</td>
    <td width="20" align="center">22</td>
  </tr>
  </table>
  </fieldset>
  <br />
  <br />
  <br />
  <fieldset style="width:750px">
  <legend align="center" style="color:#666">خلاصه وضعیت</legend>
  <br /><br /><br />
  <table align="center" width="550px" border="0">
  <colgroup></colgroup>
  <colgroup></colgroup>
  <colgroup style="background:#CCC"></colgroup>
  <tr>
    <td width="250" align="right"><textarea name="behavioralStatus" cols="40" rows="6" id="behavioralStatus"></textarea></td>
    <td width="186" align="right">وضعیت رفتاری - روانی عاطفی</td>
    <td width="22" align="center">23</td>
  </tr>
  <tr>
    <td width="250" align="right"><textarea name="educationalStatus" cols="40" rows="6" id="educationalStatus"></textarea></td>
    <td width="186" align="right">وضعیت آموزشی</td>
    <td width="22" align="center">24</td>
  </tr>
  <tr>
    <td width="250" align="right"><textarea name="actionsTaken" cols="40" rows="6" id="actionsTaken"></textarea></td>
    <td width="186" align="right">اقدامات صورت گرفته و سیر پیشرفت</td>
    <td width="22" align="center">25</td>
  </tr>
  <tr>
    <td width="250" align="right"><textarea name="economicSituation" cols="40" rows="6" id="economicSituation"></textarea></td>
    <td width="186" align="right">وضعیت اقتصادی اجتماعی</td>
    <td width="22" align="center">26</td>
  </tr>
  <tr>
    <td width="250" align="right"><textarea name="statusOfHomeVisits" cols="40" rows="6" id="statusOfHomeVisits"></textarea></td>
    <td width="186" align="right">خلاصه بازدید از منزل</td>
    <td width="22" align="center">27</td>
  </tr>

</table>
</fieldset>
<br />
<br />
<br />
<fieldset style="width:750px">
  <legend align="center" style="color:#666">توضیحات</legend>
  <br /><br /><br />
  <table align="center" width="600px" border="0">
  <colgroup></colgroup>
  <colgroup></colgroup>
  <colgroup style="background:#CCC"></colgroup>
  <tr>
    <td width="250" align="right"><textarea name="comments1" cols="40" rows="6" id="comments1"></textarea></td>
    <td width="186" align="right">توضیحات 1</td>
    <td width="22" align="center">28</td>
  </tr>
  <tr>
    <td width="250" align="right"><textarea name="comments2" cols="40" rows="6" id="comments2"></textarea></td>
    <td width="186" align="right">توضیحات 2</td>
    <td width="22" align="center">29</td>
  </tr>
  <tr>
    <td width="250" align="right"><textarea name="comments3" cols="40" rows="6" id="comments3"></textarea></td>
    <td width="186" align="right">توضیحات 3</td>
    <td width="22" align="center">30</td>
  </tr>
  <tr>
    <td colspan="3" align="center"><input type="submit" value="اضافه کن" /></td>
  </tr>
  
</table>
</fieldset>


</div>
</form>

<?php
include("header.php");
?>

</body>
</html>
