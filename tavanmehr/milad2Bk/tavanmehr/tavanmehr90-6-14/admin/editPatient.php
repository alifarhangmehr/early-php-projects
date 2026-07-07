<?php
session_start();
if(!isset($_SESSION['validAdmin'])) exit;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../themes/default/css/index.css"/>

<title>ویرایش مشخصات مددجو</title>
</head>

<body>

<?php
include("header.php");
?>

<?php
require('../class/connection.php');
require('../class/shamsiDate.php');
$patientId=$_POST['patientId'];
$connector=new connection();
if(!$connector->dbConnect()) echo 'error 1';
$query = "SELECT * FROM patient WHERE patientId='$patientId'";
$result=$connector->queryRun($query);
$num=mysql_num_rows($result);
    for($i=0;$i<$num;$i++){
        $row = mysql_fetch_array($result);
		$photo=$row['photo1'];
		$photoSource=$row['photoSource'];
	    if($row['photo1']==''){
			 $photo1='<img src="../themes/default/images/patientPhoto.png" width="32" height="32" />';
		}
		else{
			 $photo1='<img src="'.$row['photo1'].'" width="60" />';
		}
	 echo '
	   
	 
	 
	 
	 
	 
	 
<br /><br />	 
<form method="post" action="editPatientP.php" enctype="multipart/form-data"> 
<input type="hidden" name="patientId" value="'.$patientId.'" />
<div align="center">	 
<fieldset style="width:750px">
<legend align="center" style="color:#666">مشخصات مددجو</legend>
<br /><br /><br />
	 
	 
<table align="center" width="600px" border="0">
	<tr>
    
    <td width="154" align="right"><input type="file" name="file" id="file" /><input type="hidden" name="photoSource" value="'.$photoSource.'" /><input type="hidden" name="photoSource" value="'.$photo.'" /></td>
    <td width="148" align="right">'.$photo1.'</td>
    
  </tr>
  <tr style="display:none">
    
    <td width="154" align="right"><input type="text" name="patientId" value="'.$row['patientId'].'" /></td>
    <td width="148" align="right">آیدی مددجو</td>
    
  </tr>
  <tr>
    
    <td width="154" align="right"><input type="text" name="patientCode" value="'.$row['patientCode'].'" /></td>
    <td width="148" align="right">کد مددجو</td>
    
  </tr>
   <tr>
    
    <td width="154" align="right"><input type="text" name="name" value="'.$row['name'].'" /></td>
    <td width="148" align="right">نام</td>
    
  </tr>
  <tr>
    
    <td width="154" align="right"><input type="text" name="family" value="'.$row['family'].'" /></td>
    <td width="148" align="right">فامیل</td>
    
  </tr>
  <tr>
    
    <td width="154" align="right"><input type="text" name="father" value="'.$row['father'].'" /></td>
    <td width="148" align="right">نام پدر</td>
    
  </tr>
  <tr>
    
    <td width="154" align="right"><input type="text" name="birthday" value="'.$row['birthday'].'" /></td>
    <td width="148" align="right">تاریخ تولد </td>
    
  </tr>
  <tr>
    
    <td width="154" align="right"><input type="text" name="birthplace" value="'.$row['birthplace'].'" /></td>
    <td width="148" align="right">محل تولد </td>
    
  </tr>
  <tr>
    
    <td width="154" align="right"><input type="text" name="melliCode" value="'.$row['melliCode'].'" /></td>
    <td width="148" align="right">کد ملی</td>
    
  </tr>
  <tr>
      
    <td width="154" align="right"><input type="text" name="shenasNo" value="'.$row['shenasNo'].'" /></td>
    <td width="148" align="right">شماره شناسنامه</td>
    
  </tr>
  <tr>
    
    <td width="154" align="right"><input type="text" name="shenasSerial" value="'.$row['shenasSerial'].'" /></td>
    <td width="148" align="right">سریال شناسنامه</td>
    
  </tr>
  <tr>
    
    <td width="154" align="right"><input type="text" name="shenasSodur" value="'.$row['shenasSodur'].'" /></td>
    <td width="148" align="right">محل صدور شناسنامه</td>
    
  </tr>
  <tr>
    
    <td width="154" align="right"><input type="text" name="disabilityCode" value="'.$row['disabilityCode'].'" /></td>
    <td width="148" align="right">کد مددجو</td>
    
  </tr>
  <tr>
    
    <td width="154" align="right"><input type="text" name="disabilityType" value="'.$row['disabilityType'].'" /></td>
    <td width="148" align="right">نوع معلولیت</td>
    
  </tr>
  <tr>
    
    <td width="154" align="right"><input type="text" name="disabilityStartDate" value="'.$row['disabilityStartDate'].'" /></td>
    <td width="148" align="right">تاریخ شروع معلولیت</td>
    
  </tr>
  <tr>
    
    <td width="154" align="right"><input type="text" name="caseNumber" value="'.$row['caseNumber'].'" /></td>
    <td width="148" align="right">شماره پرونده</td>
    
  </tr>
  <tr>
    
    <td width="154" align="right"><input type="text" name="homeAdress1" value="'.$row['homeAdress1'].'" /></td>
    <td width="148" align="right">آدرس منزل 1</td>
    
  </tr>
  <tr>
    
    <td width="154" align="right"><input type="text" name="homeAdress2" value="'.$row['homeAdress2'].'" /></td>
    <td width="148" align="right">آدرس منزل 2</td>
    
  </tr>
  <tr>
    
    <td width="154" align="right"><input type="text" name="postalCode" value="'.$row['postalCode'].'" /></td>
    <td width="148" align="right">کد پستی</td>
    
  </tr>
  <tr>
    
    <td width="154" align="right"><input type="text" name="tel1" value="'.$row['tel1'].'" /></td>
    <td width="148" align="right">تلفن 1</td>
    
  </tr>
  <tr>
    
    <td width="154" align="right"><input type="text" name="tel2" value="'.$row['tel2'].'" /></td>
    <td width="148" align="right">تلفن 2</td>
    
  </tr>
  <tr>
    
    <td width="154" align="right"><input type="text" name="mobile1" value="'.$row['mobile1'].'" /></td>
    <td width="148" align="right">موبایل 1</td>
    
  </tr>
  <tr>
    
    <td width="154" align="right"><input type="text" name="mobile2" value="'.$row['mobile2'].'" /></td>
    <td width="148" align="right">موبایل 2</td>
    
  </tr>

  </table>
  </fieldset>
  <br />
  <br />
  <br />
  <br />
  <fieldset style="width:750px">
  <legend align="center" style="color:#666">خلاصه وضعیت</legend>
  <br /><br /><br />
  <table align="center" width="600px" border="0">
  <tr>
    
  
    <td width="250" align="right"><textarea  cols="40" rows="6" name="behavioralStatus">'.$row['behavioralStatus'].'</textarea></td>
    <td width="186" align="right">وضعیت رفتاری - روانی عاطفی</td>
   
  </tr>
  <tr>
    
    <td width="250" align="right"><textarea  cols="40" rows="6" name="educationalStatus">'.$row['educationalStatus'].'</textarea></td>
    <td width="186" align="right">وضعیت آموزشی</td>
   
  </tr>
  <tr>
    
    <td width="250" align="right"><textarea  cols="40" rows="6" name="actionsTaken">'.$row['actionsTaken'].'</textarea></td>
    <td width="186" align="right">اقدامات صورت گرفته و سیر پیشرفت</td>
   
  </tr>
  <tr>
    
    <td width="250" align="right"><textarea  cols="40" rows="6" name="economicSituation">'.$row['economicSituation'].'</textarea></td>
    <td width="186" align="right">وضعیت اقتصادی اجتماعی</td>
   
  </tr>
  <tr>
    
    <td width="250" align="right"><textarea  cols="40" rows="6" name="statusOfHomeVisits">'.$row['statusOfHomeVisits'].'</textarea></td>
    <td width="186" align="right">خلاصه بازدید از منزل</td>
   
  </tr>

</table>
</fieldset>
<br /><br />
<br /><br />
<fieldset style="width:750px">
  <legend align="center" style="color:#666">توضیحات</legend>
  <br /><br /><br />
  <table align="center" width="600px" border="0">
  <tr>
    
    <td width="250" align="right"><textarea  cols="40" rows="6" name="comments1">'.$row['comments1'].'</textarea></td>
    <td width="186" align="right">توضیحات 1</td>
   
  </tr>
  <tr>
    
    <td width="250" align="right"><textarea  cols="40" rows="6" name="comments2">'.$row['comments2'].'</textarea></td>
    <td width="186" align="right">توضیحات 2</td>
   
  </tr>
  <tr>
    
    <td width="250" align="right"><textarea  cols="40" rows="6" name="comments3">'.$row['comments3'].'</textarea></td>
    <td width="186" align="right">توضیحات 3</td>
   
  </tr>
  <tr>
    
    <td colspan="2" width="250" align="right"><input type="submit" value="اعمال تغییرات" /></td>
   
  </tr>
  
</table>
</fieldset>
</div>	 
	 
</form> 
	 
	 
	 
	 
	 
	 
	 
	
	   
	   
	 ';  
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   


	}

?>

<?php
include("header.php");
?>


</body>
</html>