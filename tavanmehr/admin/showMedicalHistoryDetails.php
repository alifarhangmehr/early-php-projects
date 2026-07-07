<?php
session_start();
if(!isset($_SESSION['validAdmin'])) exit;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../themes/default/css/index.css"/>
<title> جزئیات شرح حال پزشکی</title>
</head>

<body>

<?php
include("header.php");
?>
<!-- flag print icon deleted from here -->
<br />
<?php
include('../class/connection.php');
$medicalHistoryId=$_GET['medicalHistoryId'];
$connector=new connection();
if(!$connector->dbConnect()) echo 'error 1';
$query = "SELECT * FROM medicalhistory WHERE medicalHistoryId='$medicalHistoryId'";
$result=$connector->queryRun($query);
$row = mysql_fetch_array($result);

$connector2=new connection();
if(!$connector->dbConnect()) echo 'error 1';
$query2 = "SELECT patientId FROM medicalhistory WHERE medicalHistoryId='$medicalHistoryId'";
$result2=$connector->queryRun($query2);
$row2 = mysql_fetch_array($result2);
$patientId=$row2['patientId'];



$connector3=new connection();
if(!$connector->dbConnect()) echo 'error 1';
$query3 = "SELECT * FROM patient WHERE patientId='$patientId'";
$result3=$connector->queryRun($query3);
$row3 = mysql_fetch_array($result3);

if($row3['photo1']=='') $photo1='<img src="../themes/default/images/patientPhoto.png" width="32" height="32" />';
else $photo1='<a href="'.$row3['photoSource'].'":><img src="'.$row3['photo1'].'"  /></a>';

echo '
	   
	 
	 
	 
	 
	 
	 
	 
	 
	 
<div align="center">	 
<fieldset style="width:750px">
<legend align="center" style="color:#666">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; مشخصات مددجو&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
	 
	 
<table align="center" width="550px" border="0">
<colgroup></colgroup>
<colgroup></colgroup>
<colgroup style="background:#CCC"></colgroup>
<tr>
    <td width="154" align="right">'.$photo1.'</td>
    <td width="148" align="right">تصویر</td>
    <td width="20" align="center">1</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="attendingPhysician" id="attendingPhysician" value="'.$row['attendingPhysician'].'" value="'.$row['attendingPhysician'].'" /></td>
    <td width="148" align="right">پزشک معالج</td>
    <td width="20" align="center">2</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="admissionDateEN" id="admissionDateEN" value="'.$row['admissionDateEN'].'" /></td>
    <td width="148" align="right">تاریخ پذیرش میلادی</td>
    <td width="20" align="center">3</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="admissionDateFA" id="admissionDateFA" value="'.$row['admissionDateFA'].'" /></td>
    <td width="148" align="right">تاریخ شمسی پذیرش </td>
    <td width="20" align="center">4</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="presentingSymptoms" id="presentingSymptoms" value="'.$row['presentingSymptoms'].'" /></td>
    <td width="148" align="right">نشان های فعلی بیمار</td>
    <td width="20" align="center">5</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="historyOfPresentIllness" id="historyOfPresentIllness" value="'.$row['historyOfPresentIllness'].'" /></td>
    <td width="148" align="right">تاریخچه بیماری فعلی</td>
    <td width="20" align="center">6</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="pastDiseaseHistory" id="pastDiseaseHistory" value="'.$row['pastDiseaseHistory'].'" /></td>
    <td width="148" align="right">تاریخچه بیماری های قبلی</td>
    <td width="20" align="center">7</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="currentDrugthrapyAndOtherAddiction" id="currentDrugthrapyAndOtherAddiction" value="'.$row['currentDrugthrapyAndOtherAddiction'].'" /></td>
    <td width="148" align="right">داروهای در حال مصرف و سایر اعتیادات</td>
    <td width="20" align="center">8</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="allergyTo" id="allergyTo" value="'.$row['allergyTo'].'" /></td>
    <td width="148" align="right">حساس به</td>
    <td width="20" align="center">9</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="familyHistory" id="familyHistory" value="'.$row['familyHistory'].'" /></td>
    <td width="148" align="right">سوابق فامیلی</td>
    <td width="20" align="center">10</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="skin" id="skin" value="'.$row['skin'].'" /></td>
    <td width="148" align="right">پوست</td>
    <td width="20" align="center">11</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="skull" id="skull" value="'.$row['skull'].'" /></td>
    <td width="148" align="right">جمجمه</td>
    <td width="20" align="center">12</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="ear" id="ear" value="'.$row['ear'].'" /></td>
    <td width="148" align="right">گوش</td>
    <td width="20" align="center">13</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="eye" id="eye" value="'.$row['eye'].'" /></td>
    <td width="148" align="right">چشم</td>
    <td width="20" align="center">14</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="nose" id="nose" value="'.$row['nose'].'" /></td>
    <td width="148" align="right">بینی</td>
    <td width="20" align="center">15</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="mouth" id="mouth" value="'.$row['mouth'].'" /></td>
    <td width="148" align="right">دهان</td>
    <td width="20" align="center">16</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="throat" id="throat" value="'.$row['throat'].'" /></td>
    <td width="148" align="right">گلو</td>
    <td width="20" align="center">17</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="lymphaticGlands" id="lymphaticGlands" value="'.$row['lymphaticGlands'].'" /></td>
    <td width="148" align="right">غدد لنفاوی</td>
    <td width="20" align="center">18</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="chest" id="chest" value="'.$row['chest'].'" /></td>
    <td width="148" align="right">قفسه سینه</td>
    <td width="20" align="center">19</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="breast" id="breast" value="'.$row['breast'].'" /></td>
    <td width="148" align="right">پستان</td>
    <td width="20" align="center">20</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="heart" id="heart" value="'.$row['heart'].'" /></td>
    <td width="148" align="right">قلب</td>
    <td width="20" align="center">21</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="lung" id="lung" value="'.$row['lung'].'" /></td>
    <td width="148" align="right">ریه</td>
    <td width="20" align="center">22</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="vessels" id="vessels"  value="'.$row['vessels'].'" /></td>
    <td width="148" align="right">عروق</td>
    <td width="20" align="center">23</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="abdomen" id="abdomen"  value="'.$row['abdomen'].'" /></td>
    <td width="148" align="right">َشکم</td>
    <td width="20" align="center">23</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="genitalOrganMale" id="genitalOrganMale"  value="'.$row['genitalOrganMale'].'" /></td>
    <td width="148" align="right">اندام تناسلی مرد</td>
    <td width="20" align="center">24</td>
  </tr>
    <tr>
    <td width="154" align="right"><input type="text" name="genitalOrganFemale" id="genitalOrganFemale"  value="'.$row['genitalOrganFemale'].'" /></td>
    <td width="148" align="right">اندام تناسلی زن</td>
    <td width="20" align="center">25</td>
  </tr>
    <tr>
    <td width="154" align="right"><input type="text" name="rectum" id="rectum"  value="'.$row['rectum'].'" /></td>
    <td width="148" align="right">مقعد</td>
    <td width="20" align="center">26</td>
  </tr>
    <tr>
    <td width="154" align="right"><input type="text" name="nervousSystem" id="nervousSystem"  value="'.$row['nervousSystem'].'" /></td>
    <td width="148" align="right">سیستم عصبی</td>
    <td width="20" align="center">27</td>
  </tr>
    <tr>
    <td width="154" align="right"><input type="text" name="extremities" id="extremities"  value="'.$row['extremities'].'" /></td>
    <td width="148" align="right">اندامهای فوقانی تحتانی</td>
    <td width="20" align="center">28</td>
  </tr>
    <tr>
    <td width="154" align="right"><input type="text" name="boneJointsMuscles" id="boneJointsMuscles"  value="'.$row['boneJointsMuscles'].'" /></td>
    <td width="148" align="right">استخوان-مفاصل-عضلات</td>
    <td width="20" align="center">29</td>
  </tr>
<tr>
    <td width="250" align="right"><textarea name="summary" cols="40" rows="6" id="summary">'.$row['summary'].'</textarea></td>
    <td width="186" align="right">خلاصه</td>
    <td width="22" align="center">29</td>
  </tr>
 <tr>
    <td width="250" align="right"><textarea name="preDX" cols="40" rows="6" id="preDX">'.$row['preDX'].'</textarea></td>
    <td width="186" align="right">تشخیص اولیه</td>
    <td width="22" align="center">29</td>
  </tr>
    <tr style="display:none">
    <td width="154" align="right"><input type="text" name="signatureId" id="signatureId"  value="'.$row['signatureId'].'" /></td>
    <td width="148" align="right">امضای پزشک معاینه کننده</td>
    <td width="20" align="center">32</td>
  </tr>
  
</table>
</fieldset>
</div>	 
	 
	   
	   
	 ';  



    ?> 

</table>
<?php
include("header.php");
?>

</body>
</html>
