<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>مدیریت نرم افزار اتوماسیون</title>
<link rel="stylesheet" type="text/css" href="../themes/default/css/index.css"/>
<style>
a:link {color:#33F;}      /* unvisited link */
a:visited {color:#33F;}  /* visited link */
a:hover {color:orange;} /* mouse over link */
a:active {color:#33F}  /* selected link */ 
</style>
</head>

<body style="background:url(../themes/default/images/bg1.jpg)">
<div align="center"><img src="../themes/default/images/PeopleFirst_Gold2.jpg" width="434" height="186" /></div>

<table width="700" border="0" align="center" cellpadding="2" cellspacing="2" dir="rtl" style="border:thin solid #999; background:#333; color:#FFF">
<tr>
  <th height="20" bgcolor="#0099FF"><strong>مدیریت داروها</strong></th>
  <th height="20" bgcolor="#0099FF"><strong>مدیریت مددجویان</strong></th>
  <th height="20" bgcolor="#0099FF"><strong>مدیریت کارمندان</strong></th>
  </tr>

<tr>

  <td width="234" align="center" bgcolor="#CCCCCC"><form method="post" action="searchMedicine.php" >
                	<img src="../themes/default/images/search.png" align="middle" width="32" height="32" />
		<input type="text" name="search" class="field" size="15" />
                    <input type="submit" class="greenBut" id="newsSearchSubmitBut2" value="جستجو" />
                 </form>
    </td>
  <td height="40" bgcolor="#CCCCCC"><form method="post" action="searchPatientP.php" >
                	<img src="../themes/default/images/search.png" align="middle" width="32" height="32" />
		<input type="text" name="search" class="field" size="15" />
                    <input type="submit" class="greenBut" id="newsSearchSubmitBut2" value="جستجو" />
                 </form></td>
<td height="40" bgcolor="#CCCCCC"><form method="post" action="searchEmployeeP.php" >
                	<img src="../themes/default/images/search.png" align="middle" width="32" height="32" />
		<input type="text" name="search" class="field" size="15" />
                    <input type="submit" class="greenBut" id="newsSearchSubmitBut2" value="جستجو" />
                 </form></td>
  </tr>
<tr>
<td bgcolor="#FFFFFF"><a href="showMedicine.php" ><img src="../themes/default/images/drugIcon3.png" width="32" height="32" align="middle" />&nbsp;&nbsp;لیست داروها | <a href="addMedicine.php" style="color:#669900">اضافه</a></td>
  <td height="40" bgcolor="#FFFFFF"><a href="addPatient.php" ><img src="../themes/default/images/addPatient.png" width="32" height="32" align="middle" />&nbsp;&nbsp; افزودن مددجو</a></td>
  <td height="40" bgcolor="#FFFFFF"><a href="addEmployee.php" ><img src="../themes/default/images/addPatient.png" width="32" height="32" align="middle" />&nbsp;&nbsp; افزودن کارمند</a></td>
  </tr>
<tr><td bgcolor="#CCCCCC"></td>
  <td height="40" bgcolor="#CCCCCC"><a href="showPatient.php"><img src="../themes/default/images/list.png" width="32" height="32" align="middle" />&nbsp;&nbsp; نمایش مددجو</td>
  <td height="40" bgcolor="#CCCCCC"><a href="showEmployee.php" ><img src="../themes/default/images/list.png" width="32" height="32" align="middle" />&nbsp;&nbsp;نمایش کارمند</td>
  </tr>
<tr style="display:none"><td bgcolor="#FFFFFF"></td>
  <td width="226" height="40" bgcolor="#FFFFFF">&nbsp;</td>
  <td width="220" height="40" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
<tr style="display:none"><td></td>
  <td height="40">&nbsp;</td>
  <td height="40">&nbsp;</td>
  </tr>
<tr style="display:none"><td bgcolor="#444444"></td>
<td height="40" bgcolor="#444444">
  <table width="226" border="0" cellspacing="2" cellpadding="3" style="display:none">
    <tr>
      <td bgcolor="#444444"> کل مددجویان</td>
      <td width="100" align="center" bgcolor="#222222">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#444444">&nbsp;</td>
      <td width="100" align="center" bgcolor="#222222">&nbsp;</td>
    </tr>
  </table>
  </td><td bgcolor="#444444"></td>
  <td height="40"><table width="226" border="0" cellspacing="2" cellpadding="3" style="display:none">
    <tr>
      <td bgcolor="#444444"> کل کارمندان</td>
      <td width="100" align="center" bgcolor="#222222">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#444444">&nbsp;</td>
      <td width="100" align="center" bgcolor="#222222">&nbsp;</td>
    </tr>
  </table></td>
  </tr>
<tr>
  <th height="20" colspan="3" bgcolor="#0099FF"><strong>سیستم جامع Backup گیری</strong></th>
  </tr>
<tr  style="display:none" >
  <td height="21" colspan="3" bgcolor="#CCCCCC">&nbsp;</td>
  </tr>
<tr bgcolor="#FFFFFF">
  <td height="40" colspan="3" align="center"><a href="backup.php"><img src="../themes/default/images/backupIcon.png" width="32" height="32" align="middle" />&nbsp;&nbsp;<a href="addMedicalHistory.php" style="color:#669900">Backup</a></td>
  </tr>
<tr  style="display:none" >
  <td height="40" bgcolor="#444444"><a href="showMedicationOrders.php"><img src="../themes/default/images/medicationOrdersIcon.png" width="32" height="32" align="middle" />&nbsp;&nbsp;دستورات دارویی | <a href="addMedicationOrders.php" style="color:#669900">اضافه</a></td>
  <td height="40" bgcolor="#444444"><a href="showSeizuresChart.php" ><img src="../themes/default/images/seizuresChartIcon.png" width="32" height="32" align="middle" />&nbsp;&nbsp;چارت تشنج | <a href="addSeizuresChart.php" style="color:#669900">اضافه</a></td>
  <td bgcolor="#444444"><a href="showMedicine.php" ><img src="../themes/default/images/drugIcon3.png" width="32" height="32" align="middle" />&nbsp;&nbsp;لیست داروها | <a href="addMedicine.php" style="color:#669900">اضافه</a></td>
</tr>
<tr  style="display:none" >
  <td height="40" bgcolor="#333333"><a href="showMeasureOfTreatment.php"><img src="../themes/default/images/drugIcon1.png" width="32" height="32" align="middle" />&nbsp;&nbsp;اقدامات درمانی | <a href="addMeasuresOfTreatment.php" style="color:#669900">اضافه</a></td>
  <td height="40" bgcolor="#333333"><a href="#" ><img src="../themes/default/images/drugIcon0.png" width="32" height="32" align="middle" />&nbsp;&nbsp;داروهای مصرفی | <a href="sdf.php" style="color:#669900">اضافه</a></td>
  <td bgcolor="#333333"><a href="showPatientCurrentStatus.php" ><img src="../themes/default/images/eyeIcon.png" width="32" height="32" align="middle" />&nbsp;&nbsp;وضعیت فعلی مددجو | <a href="addPatientCurrentStatus.php" style="color:#669900">اضافه</a></td>
</tr>
<tr  style="display:none" >
  <td height="40" bgcolor="#444444"><a href="showSpecialistExamination.php"><img src="../themes/default/images/specialistExaminationIcon.png" width="32" height="32" align="middle" />&nbsp;&nbsp;ویریت متخصص | <a href="addSpecialistExamination.php" style="color:#669900">اضافه</a></td>
  <td height="40" bgcolor="#444444">&nbsp;</td>
  <td rowspan="3"></td>
</tr>
<tr  style="display:none" >
  <td height="40" bgcolor="#333333"><a href="showGPExamination.php"><img src="../themes/default/images/showMedicalRecordsIcon.png" width="32" height="32" align="middle" />&nbsp;&nbsp;ویریت پزشک عمومی | <a href="addGPExamination.php" style="color:#669900">اضافه</a></td>
  <td height="40" bgcolor="#333333">&nbsp;</td>
  </tr>
<tr  style="display:none" >
  <td height="40" bgcolor="#444444"><a href="showVitalSignChart.php"><img src="../themes/default/images/vitalSignChartIcon.png" width="32" height="32" align="middle" />&nbsp;&nbsp;چارت علائم حیاتی | <a href="addVitalSignChart.php" style="color:#669900">اضافه</a></td>
  <td height="40" bgcolor="#444444">&nbsp;</td>
  </tr>






</table>
</body>
</html>
