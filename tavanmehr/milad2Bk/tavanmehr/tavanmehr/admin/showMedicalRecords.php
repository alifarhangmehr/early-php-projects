<?php
session_start();
if(!isset($_SESSION['validAdmin'])) exit;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../themes/default/css/index.css"/>
<title>پرونده پزشکی مددجو</title>
</head>

<body>

<?php
include("header.php");
?>
<!-- flag print icon deleted from here -->
<br />
<?php
include('../class/connection.php');
$patientId=$_GET['patientId'];

echo '

<table width="750" border="0" cellspacing="3" cellpadding="5" align="center" style="border:thin dotted #060">
  <tr>
    <td align="right"><a href="patientMedicalHistory.php?patientId='.$patientId.'">شرح حال پزشکی</a></td>
    <td align="right" width="64px"><a href="patientMedicalHistory.php?patientId='.$patientId.'"><img  src="../themes/default/images/medicalHistoryIcon.png" width="64px" height="64px" border="0" /></a></td>
  <td align="right"><a href="patientMeasureOfTreatment.php?patientId='.$patientId.'">اقدامات درمانی توسط پزشک</a></td>
    <td align="right" width="64px"><a href="patientMeasureOfTreatment.php?patientId='.$patientId.'"><img  src="../themes/default/images/measureOfTreatmentIcon.png" width="64px" height="64px" border="0" /></a></td>
  <td align="right"><a href="patientMedicationOrders.php?patientId='.$patientId.'">دستورات دارویی</a></td>
    <td align="right" width="64px"><a href="patientMedicationOrders.php?patientId='.$patientId.'"><img  src="../themes/default/images/medicationOrdersIcon.png" width="64px" height="64px" border="0" /></a></td>
  </tr>
  <tr>
  <td align="right"><a href="patientSpecialistExamination.php?patientId='.$patientId.'">ویزیت متخصص</a></td>
    <td align="right" width="64px"><a href="patientSpecialistExamination.php?patientId='.$patientId.'"><img  src="../themes/default/images/specialistExaminationIcon.png" width="64px" height="64px" border="0" /></a></td>
  <td align="right"><a href="patientGPExamination.php?patientId='.$patientId.'">ویزیت پزشک عمومی</a></td>
    <td align="right" width="64px"><a href="patientGPExamination.php?patientId='.$patientId.'"><img  src="../themes/default/images/GPExaminationIcon.png" width="64px" height="64px" border="0" /></a></td>
  <td align="right"><a href="patientVitalSignChart.php?patientId='.$patientId.'">چارت علایم حیاتی</a></td>
    <td align="right" width="64px"><a href="patientVitalSignChart.php?patientId='.$patientId.'"><img  src="../themes/default/images/vitalSignChartIcon.png" width="64px" height="64px" border="0" /></a></td>
  </tr>
  <tr>
  <td></td>
	<td></td>
	<td></td>
	<td></td>
  <td align="right"><a href="patientSeizuresChart.php?patientId='.$patientId.'">چارت تشنج</a></td>
    <td align="right" width="64px"><a href="patientSeizuresChart.php?patientId='.$patientId.'"><img  src="../themes/default/images/seizuresChartIcon.png" width="64px" height="64px" border="0" /></a></td>
	
  </tr>
</table>

';
include("header.php");
?>

</body>
</html>
