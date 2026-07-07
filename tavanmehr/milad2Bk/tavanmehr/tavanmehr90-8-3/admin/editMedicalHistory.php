<?php
session_start();
if(!isset($_SESSION['validAdmin'])) exit;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../themes/default/css/index.css"/>
<title>ویرایش شرح حال پزشکی</title>
</head>
<body>


<?php
include("header.php");
?>


<?php
	require('../class/connection.php');
	$medicalHistoryId=$_POST['medicalHistoryId'];
	$connector=new connection();
	if(!$connector->dbConnect()) echo 'error 1';
	$query="SELECT * FROM medicalhistory WHERE medicalHistoryId='$medicalHistoryId'";
	$result=$connector->queryRun($query);
	$row = mysql_fetch_array($result);
?>



<form method="post" action="editMedicalHistoryP.php" enctype="multipart/form-data">
<div align="center">
<?php
if($_POST['medicalHistoryId']!='') echo '<input type="hidden" name="medicalHistoryId" id="medicalHistoryId" value="'.$_POST['medicalHistoryId'].'" />';
if($_POST['medicalHistoryId']!='') echo '<input type="hidden" name="condition" id="condition" value="2" />';	
?>
<fieldset style="width:750px">
<legend align="center" style="color:#666">مشخصات مددجو</legend>
<br /><br /><br />
<br />
<table align="center" width="550px" border="0">
<colgroup></colgroup>
<colgroup></colgroup>
<colgroup style="background:#CCC"></colgroup>
  <tr style="display:none">
    <td width="154" align="right"><input type="text" name="medicalHistoryId" id="medicalHistoryId" value="<?php echo $medicalHistoryId;  ?>" readonly="readonly" /></td>
    <td width="148" align="right">آیدی مددجو</td>
    <td width="20" align="center">0</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text"  value="<?php echo $row['attendingPhysician']; ?>" name="attendingPhysician" id="attendingPhysician" /></td>
    <td width="148" align="right">پزشک معالج</td>
    <td width="20" align="center">1</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text"  value="<?php echo $row['admissionDateEN']; ?>" name="admissionDateEN" id="admissionDateEN" /></td>
    <td width="148" align="right">تاریخ پذیرش میلادی</td>
    <td width="20" align="center">2</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text"  value="<?php echo $row['admissionDateFA']; ?>" name="admissionDateFA" id="admissionDateFA" /></td>
    <td width="148" align="right">تاریخ شمسی پذیرش </td>
    <td width="20" align="center">3</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text"  value="<?php echo $row['presentingSymptoms']; ?>" name="presentingSymptoms" id="presentingSymptoms" /></td>
    <td width="148" align="right">نشان های فعلی بیمار</td>
    <td width="20" align="center">4</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text"  value="<?php echo $row['historyOfPresentIllness']; ?>" name="historyOfPresentIllness" id="historyOfPresentIllness" /></td>
    <td width="148" align="right">تاریخچه بیماری فعلی</td>
    <td width="20" align="center">5</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text"  value="<?php echo $row['pastDiseaseHistory']; ?>" name="pastDiseaseHistory" id="pastDiseaseHistory" /></td>
    <td width="148" align="right">تاریخچه بیماری های قبلی</td>
    <td width="20" align="center">6</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text"  value="<?php echo $row['currentDrugthrapyAndOtherAddiction']; ?>" name="currentDrugthrapyAndOtherAddiction" id="currentDrugthrapyAndOtherAddiction" /></td>
    <td width="148" align="right">داروهای در حال مصرف و سایر اعتیادات</td>
    <td width="20" align="center">7</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text"  value="<?php echo $row['allergyTo']; ?>" name="allergyTo" id="allergyTo" /></td>
    <td width="148" align="right">حساس به</td>
    <td width="20" align="center">8</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text"  value="<?php echo $row['familyHistory']; ?>" name="familyHistory" id="familyHistory" /></td>
    <td width="148" align="right">سوابق فامیلی</td>
    <td width="20" align="center">9</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text"  value="<?php echo $row['skin']; ?>" name="skin" id="skin" /></td>
    <td width="148" align="right">پوست</td>
    <td width="20" align="center">10</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text"  value="<?php echo $row['skull']; ?>" name="skull" id="skull" /></td>
    <td width="148" align="right">جمجمه</td>
    <td width="20" align="center">11</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text"  value="<?php echo $row['ear']; ?>" name="ear" id="ear" /></td>
    <td width="148" align="right">گوش</td>
    <td width="20" align="center">12</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text"  value="<?php echo $row['eye']; ?>" name="eye" id="eye" /></td>
    <td width="148" align="right">چشم</td>
    <td width="20" align="center">13</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text"  value="<?php echo $row['nose']; ?>" name="nose" id="nose" /></td>
    <td width="148" align="right">بینی</td>
    <td width="20" align="center">14</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text"  value="<?php echo $row['mouth']; ?>" name="mouth" id="mouth" /></td>
    <td width="148" align="right">دهان</td>
    <td width="20" align="center">15</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text"  value="<?php echo $row['throat']; ?>" name="throat" id="throat" /></td>
    <td width="148" align="right">گلو</td>
    <td width="20" align="center">16</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text"  value="<?php echo $row['lymphaticGlands']; ?>" name="lymphaticGlands" id="lymphaticGlands" /></td>
    <td width="148" align="right">غدد لنفاوی</td>
    <td width="20" align="center">17</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text"  value="<?php echo $row['chest']; ?>" name="chest" id="chest" /></td>
    <td width="148" align="right">قفسه سینه</td>
    <td width="20" align="center">18</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text"  value="<?php echo $row['breast']; ?>" name="breast" id="breast" /></td>
    <td width="148" align="right">پستان</td>
    <td width="20" align="center">19</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text"  value="<?php echo $row['heart']; ?>" name="heart" id="heart" /></td>
    <td width="148" align="right">قلب</td>
    <td width="20" align="center">20</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text"  value="<?php echo $row['lung']; ?>" name="lung" id="lung" /></td>
    <td width="148" align="right">ریه</td>
    <td width="20" align="center">21</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text"  value="<?php echo $row['vessels']; ?>" name="vessels" id="vessels"  /></td>
    <td width="148" align="right">عروق</td>
    <td width="20" align="center">22</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text"  value="<?php echo $row['abdomen']; ?>" name="abdomen" id="abdomen"  /></td>
    <td width="148" align="right">َشکم</td>
    <td width="20" align="center">23</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text"  value="<?php echo $row['genitalOrganMale']; ?>" name="genitalOrganMale" id="genitalOrganMale"  /></td>
    <td width="148" align="right">اندام تناسلی مرد</td>
    <td width="20" align="center">24</td>
  </tr>
    <tr>
    <td width="154" align="right"><input type="text"  value="<?php echo $row['genitalOrganFemale']; ?>" name="genitalOrganFemale" id="genitalOrganFemale"  /></td>
    <td width="148" align="right">اندام تناسلی زن</td>
    <td width="20" align="center">25</td>
  </tr>
    <tr>
    <td width="154" align="right"><input type="text"  value="<?php echo $row['rectum']; ?>" name="rectum" id="rectum"  /></td>
    <td width="148" align="right">مقعد</td>
    <td width="20" align="center">26</td>
  </tr>
    <tr>
    <td width="154" align="right"><input type="text"  value="<?php echo $row['nervousSystem']; ?>" name="nervousSystem" id="nervousSystem"  /></td>
    <td width="148" align="right">سیستم عصبی</td>
    <td width="20" align="center">27</td>
  </tr>
    <tr>
    <td width="154" align="right"><input type="text"  value="<?php echo $row['extremities']; ?>" name="extremities" id="extremities"  /></td>
    <td width="148" align="right">اندامهای فوقانی تحتانی</td>
    <td width="20" align="center">28</td>
  </tr>
    <tr>
    <td width="154" align="right"><input type="text"  value="<?php echo $row['boneJointsMuscles']; ?>" name="boneJointsMuscles" id="boneJointsMuscles"  /></td>
    <td width="148" align="right">استخوان-مفاصل-عضلات</td>
    <td width="20" align="center">29</td>
  </tr>
<tr>
    <td width="250" align="right"><textarea name="summary" cols="40" rows="6" id="summary"><?php echo $row['summary']; ?></textarea></td>
    <td width="186" align="right">خلاصه</td>
    <td width="22" align="center">30</td>
  </tr>
 <tr>
    <td width="250" align="right"><textarea name="preDX" cols="40" rows="6" id="preDX"><?php echo $row['preDX']; ?></textarea></td>
    <td width="186" align="right">تشخیص اولیه</td>
    <td width="22" align="center">31</td>
  </tr>
    <tr style="display:none">
    <td width="154" align="right"><input type="text"  value="<?php echo $row['signatureId']; ?>" name="signatureId" id="signatureId"  /></td>
    <td width="148" align="right">امضای پزشک معاینه کننده</td>
    <td width="20" align="center">32</td>
  </tr>
  <tr>
    <td colspan="3" align="center"><input type="submit" value="تغییر بده" /></td>
  </tr>
  </table>

  <br />
  <br />
  <br />
</table>
</fieldset>


</div>
</form>

<?php
include("header.php");
?>

</body>
</html>
