<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="../themes/default/css/index.css"/>
<style>
a:link {color:#FFF}      /* unvisited link */
a:visited {color:#FFF}  /* visited link */
a:hover {color:orange;} /* mouse over link */
a:active {color:#FFF}  /* selected link */ 
</style>
</head>

<body>
<table width="700" border="0" align="center" cellpadding="2" cellspacing="2" dir="rtl" style="border:thin solid #06F; background:#333; color:#FFF">
<tr>
  <th height="20" bgcolor="#0099FF"><strong>اطلاعات</strong></th>
  <th height="20" bgcolor="#0099FF"><strong>مدیریت مددجویان</strong></th>
  <th height="20" bgcolor="#0099FF"><strong>مدیریت کارمندان</strong></th>
  </tr>



<tr><td colspan="3">&nbsp;</td>
  </tr>
<tr>

  <td width="234" rowspan="6" align="center">
    <table width="226" height="255px" border="0" cellpadding="2" cellspacing="8">
      <tr>
        <td align="center" bgcolor="#222222">نام کاربری</td>
        <td align="center" bgcolor="#444444">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" bgcolor="#222222">نام</td>
        <td align="center" bgcolor="#444444">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" bgcolor="#222222">فامیل</td>
        <td align="center" bgcolor="#444444">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" bgcolor="#222222">ایمیل</td>
        <td align="center" bgcolor="#444444">&nbsp;</td>
      </tr>
      <tr>
        <td height="30" colspan="2" align="center" bgcolor="#222222"><a style="color:#CCC">تاریخ و ساعت امروز</a></td>
      </tr>
      <tr>
        <td align="center" bgcolor="#222222"> شمسی</td>
        <td align="center" bgcolor="#444444">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" bgcolor="#222222"> میلادی</td>
        <td align="center" bgcolor="#444444">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" bgcolor="#222222">ساعت</td>
        <td align="center" bgcolor="#444444">به زودی</td>
      </tr>
    </table></td>
  <td height="40"><form method="post" action="searchNews.php" >
                	<img src="../themes/default/images/search.png" align="middle" width="32" height="32" />
		<input type="text" name="name" class="field" size="15" />
                    <input type="submit" class="greenBut" id="newsSearchSubmitBut2" value="جستجو" />
                 </form></td>
<td height="40"><form method="post" action="searchNews.php" >
                	<img src="../themes/default/images/search.png" align="middle" width="32" height="32" />
		<input type="text" name="name" class="field" size="15" />
                    <input type="submit" class="greenBut" id="newsSearchSubmitBut2" value="جستجو" />
                 </form></td>
  </tr>
<tr>
  <td height="40"><a href="addPatient.php" ><img src="../themes/default/images/addPatient.png" width="32" height="32" align="middle" />&nbsp;&nbsp; افزودن مددجو</a></td>
  <td height="40"><a href="addEmployee.php" ><img src="../themes/default/images/addPatient.png" width="32" height="32" align="middle" />&nbsp;&nbsp; افزودن کارمند</a></td>
  </tr>
<tr>
  <td height="40"><a href="showPatient.php"><img src="../themes/default/images/list.png" width="32" height="32" align="middle" />&nbsp;&nbsp; نمایش مددجو</a></td>
  <td height="40"><a href="showEmployee.php" ><img src="../themes/default/images/list.png" width="32" height="32" align="middle" />&nbsp;&nbsp;نمایش کارمند</a></td>
  </tr>
<tr>
  <td width="226" height="40">&nbsp;</td>
  <td width="220" height="40">&nbsp;</td>
  </tr>
<tr>
  <td height="40">&nbsp;</td>
  <td height="40">&nbsp;</td>
  </tr>
<tr>
  <td height="40">
  <table width="226" border="0" cellspacing="2" cellpadding="3">
    <tr>
      <td bgcolor="#444444"> کل مددجویان</td>
      <td width="100" align="center" bgcolor="#222222">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#444444">&nbsp;</td>
      <td width="100" align="center" bgcolor="#222222">&nbsp;</td>
    </tr>
  </table>
  </td>
  <td height="40"><table width="226" border="0" cellspacing="2" cellpadding="3">
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
  <th height="20" colspan="3" bgcolor="#0099FF"><strong>پرونده های پزشکی</strong></th>
  </tr>
<tr>
  <td colspan="3">&nbsp;</td>
  </tr>
<tr>
  <td height="40"><a href="showMedicalHistory.php"><img src="../themes/default/images/medicalHistoryIcon.png" width="32" height="32" align="middle" />&nbsp;&nbsp;شرح حال</a></td>
  <td height="40" colspan="2"><form method="post" action="searchStudent.php" >
    <img src="../themes/default/images/search.png" align="middle" width="32" height="32" />
    
    <input type="text" name="searchValue" id="searchValue" class="field" size="20" />
    <input type="submit" value="جستجو" id="userSearchSubmitBut" />
  </form></td>
  </tr>
<tr>
  <td height="40" bgcolor="#444444"><a href="showMedicationOrders.php"><img src="../themes/default/images/medicationOrdersIcon.png" width="32" height="32" align="middle" />&nbsp;&nbsp;دستورات دارویی</a></td>
  <td height="40" bgcolor="#444444"><a href="showSeizuresChart.php" ><img src="../themes/default/images/seizuresChartIcon.png" width="32" height="32" align="middle" />&nbsp;&nbsp;چارت تشنج</a></td>
  <td bgcolor="#444444"><a href="showMedicine.php" ><img src="../themes/default/images/drugIcon3.png" width="32" height="32" align="middle" />&nbsp;&nbsp;لیست داروها</a></td>
</tr>
<tr>
  <td height="40" bgcolor="#333333"><a href="showMeasureOfTreatment.php"><img src="../themes/default/images/drugIcon1.png" width="32" height="32" align="middle" />&nbsp;&nbsp;اقدامات درمانی</a></td>
  <td height="40" bgcolor="#333333"><a href="#" ><img src="../themes/default/images/drugIcon0.png" width="32" height="32" align="middle" />&nbsp;&nbsp;داروهای مصرفی</a></td>
  <td bgcolor="#333333"><a href="showPatientCurrentStatus.php" ><img src="../themes/default/images/eyeIcon.png" width="32" height="32" align="middle" />&nbsp;&nbsp;وضعیت فعلی مددجو</a></td>
</tr>
<tr>
  <td height="40" bgcolor="#444444"><a href="showSpecialistExamination.php"><img src="../themes/default/images/specialistExaminationIcon.png" width="32" height="32" align="middle" />&nbsp;&nbsp;ویریت متخصص</a></td>
  <td height="40" bgcolor="#444444">&nbsp;</td>
  <td rowspan="3"><table width="226" border="0" align="center" cellpadding="3" cellspacing="2">
    <tr>
      <td width="105" bgcolor="#444444">با جواب</td>
      <td width="100" align="center" bgcolor="#222222">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#444444">بی جواب</td>
      <td width="100" align="center" bgcolor="#222222">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#444444">بدون نیاز به جواب</td>
      <td width="100" align="center" bgcolor="#222222">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#444444">خوانده</td>
      <td width="100" align="center" bgcolor="#222222">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#444444">نخوانده</td>
      <td width="100" align="center" bgcolor="#222222">&nbsp;</td>
    </tr>
  </table></td>
</tr>
<tr>
  <td height="40" bgcolor="#333333"><a href="showGPExamination.php"><img src="../themes/default/images/showMedicalRecordsIcon.png" width="32" height="32" align="middle" />&nbsp;&nbsp;ویریت پزشک عمومی</a></td>
  <td height="40" bgcolor="#333333">&nbsp;</td>
  </tr>
<tr>
  <td height="40" bgcolor="#444444"><a href="showVitalSignChart.php"><img src="../themes/default/images/citalSignChartIcon.png" width="32" height="32" align="middle" />&nbsp;&nbsp;چارت علائم حیاتی</a></td>
  <td height="40" bgcolor="#444444">&nbsp;</td>
  </tr>






</table>
</body>
</html>
