<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="themes/default/css/index.css"/>
<title>Untitled Document</title>
</head>

<body>
<?php
include('class/connection.php');
$patientId=$_GET['patientId'];
$connector=new connection();
if(!$connector->dbConnect()) echo 'error 1';
$query = "SELECT * FROM patient WHERE patientId='$patientId'";
$result=$connector->queryRun($query);

$num=mysql_num_rows($result);
    for($i=0;$i<$num;$i++){
        $row = mysql_fetch_array($result);
	    if($row['photo1']=='') $photo1='<img src="../themes/default/images/patientPhoto.png" width="32" height="32" />';
		else $photo1='<img src="../'.$row['photo1'].'"  />';
	
	 echo '
	   
	 
	 
	 
	 
	 
	 
	 
	 
	 
<div align="center">	 
<fieldset style="width:750px">
<legend align="center" style="color:#666">مشخصات مددجو</legend>
	 
	 
<table align="center" width="600px" border="0">
	<tr>
    
    <td width="154" align="right">'.$photo1.'</td>
    <td width="148" align="right">تصویر</td>
    
  </tr>
  <tr>
    
    <td width="154" align="right">'.$row['patientId'].'</td>
    <td width="148" align="right">آیدی مددجو</td>
    
  </tr>
  <tr>
    
    <td width="154" align="right">'.$row['name'].'</td>
    <td width="148" align="right">نام</td>
    
  </tr>
  <tr>
    
    <td width="154" align="right">'.$row['family'].'</td>
    <td width="148" align="right">فامیل</td>
    
  </tr>
  <tr>
    
    <td width="154" align="right">'.$row['father'].'</td>
    <td width="148" align="right">نام پدر</td>
    
  </tr>
  <tr>
    
    <td width="154" align="right">'.$row['birthday'].'</td>
    <td width="148" align="right">تاریخ تولد </td>
    
  </tr>
  <tr>
    
    <td width="154" align="right">'.$row['melliCode'].'</td>
    <td width="148" align="right">کد ملی</td>
    
  </tr>
  <tr>
    
    <td width="154" align="right">'.$row['disabilityCode'].'</td>
    <td width="148" align="right">کد معلولیت</td>
    
  </tr>
  <tr>
    
    <td width="154" align="right">'.$row['disabilityType'].'</td>
    <td width="148" align="right">نوع معلولیت</td>
    
  </tr>
  <tr>
    
    <td width="154" align="right">'.$row['disabilityStartDate'].'</td>
    <td width="148" align="right">تاریخ شروع معلولیت</td>
    
  </tr>
  <tr>
    
    <td width="154" align="right">'.$row['caseNumber'].'</td>
    <td width="148" align="right">شماره پرونده</td>
    
  </tr>
  <tr>
    
    <td width="154" align="right">'.$row['homeAdress1'].'</td>
    <td width="148" align="right">آدرس منزل 1</td>
    
  </tr>
  <tr>
    
    <td width="154" align="right">'.$row['homeAdress2'].'</td>
    <td width="148" align="right">آدرس منزل 2</td>
    
  </tr>
  <tr>
    
    <td width="154" align="right">'.$row['tel1'].'</td>
    <td width="148" align="right">تلفن 1</td>
    
  </tr>
  <tr>
    
    <td width="154" align="right">'.$row['tel2'].'</td>
    <td width="148" align="right">تلفن 2</td>
    
  </tr>
  <tr>
    
    <td width="154" align="right">'.$row['mobile1'].'</td>
    <td width="148" align="right">موبایل 1</td>
    
  </tr>
  <tr>
    
    <td width="154" align="right">'.$row['mobile2'].'</td>
    <td width="148" align="right">موبایل 2</td>
    
  </tr>

  </table>
  </fieldset>
  <br />
  <br />
  <fieldset style="width:750px">
  <legend align="center" style="color:#666">خلاصه وضعیت</legend>
  <table align="center" width="600px" border="0">
  <tr>
    
    <td width="250" align="right">'.$row['behavioralStatus'].'</td>
    <td width="186" align="right">وضعیت رفتاری - روانی عاطفی</td>
   
  </tr>
  <tr>
    
    <td width="250" align="right">'.$row['educationalStatus'].'</td>
    <td width="186" align="right">وضعیت آموزشی</td>
   
  </tr>
  <tr>
    
    <td width="250" align="right">'.$row['actionsTaken'].'</td>
    <td width="186" align="right">اقدامات صورت گرفته و سیر پیشرفت</td>
   
  </tr>
  <tr>
    
    <td width="250" align="right">'.$row['economicSituation'].'</td>
    <td width="186" align="right">وضعیت اقتصادی اجتماعی</td>
   
  </tr>
  <tr>
    
    <td width="250" align="right">'.$row['statusOfHomeVisits'].'</td>
    <td width="186" align="right">خلاصه بازدید از منزل</td>
   
  </tr>

</table>
</fieldset>

<fieldset style="width:750px">
  <legend align="center" style="color:#666">توضیحات</legend>
  <table align="center" width="600px" border="0">
  <tr>
    
    <td width="250" align="right">'.$row['comments1'].'</td>
    <td width="186" align="right">توضیحات 1</td>
   
  </tr>
  <tr>
    
    <td width="250" align="right">'.$row['comments2'].'</td>
    <td width="186" align="right">توضیحات 2</td>
   
  </tr>
  <tr>
    
    <td width="250" align="right">'.$row['comments3'].'</td>
    <td width="186" align="right">توضیحات 3</td>
   
  </tr>
  
</table>
</fieldset>
</div>	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	
	   
	   
	 ';  
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   


	}

    ?> 

</table>

</body>
</html>
