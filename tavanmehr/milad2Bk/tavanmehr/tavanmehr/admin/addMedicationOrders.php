<?php
session_start();
if(!isset($_SESSION['validAdmin'])) exit;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../themes/default/css/index.css"/>
<title>افزودن دستورات دارویی</title>
</head>
<body>


<?php
include("header.php");
?>


<?php
	require('../class/connection.php');
	$connector=new connection();
	if(!$connector->dbConnect()) echo 'error 1';
	$query="SELECT MAX(medicationOrdersId) FROM medicationorders";
	$result=$connector->queryRun($query);
	$row = mysql_fetch_array($result);
	//echo $row['MAX(foodCode)'];
	$medicationOrdersId=$row['MAX(medicationOrdersId)']+1;
	//echo '<br />medicationOrdersId:'.$medicationOrdersId.'<br />';
	
?>



<form method="post" action="addMedicationOrdersP.php" enctype="multipart/form-data">
<div align="center">
<?php
if($_POST['patientId']!='') echo '<input type="hidden" name="patientId" id="patientId" value="'.$_POST['patientId'].'" />';
if($_POST['patientId']!='') echo '<input type="hidden" name="condition" id="condition" value="'.$_POST['condition'].'" />';	
?>
<fieldset style="width:750px">
<legend align="center" style="color:#666">دستورات دارویی</legend>
<br /><br /><br />
<br />
<table align="center" width="550px" border="0">
<colgroup></colgroup>
<colgroup></colgroup>
<colgroup style="background:#CCC"></colgroup>
  <tr style="display:none">
    <td width="154" align="right"><input type="text" name="medicationOrdersId" id="medicationOrdersId" value="<?php echo $medicationOrdersId; ?>" /></td>
    <td width="148" align="right">medicationOrdersId</td>
    <td width="20" align="center">0</td>
  </tr>
  <tr>
   <td width="154" align="right"><input type="text" name="medicalCommandDateEN" id="medicalCommandDateEN" /></td>
    <td width="148" align="right">تاریخ میلادی دستورات پزشکی</td>
    <td width="20" align="center">1</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="medicalCommandDateFA" id="medicalCommandDateFA" /></td>
    <td width="148" align="right">تاریخ شمسی دستورات پزشکی</td>
    <td width="20" align="center">2</td>
  </tr>
  <tr>
    <td width="154" align="right"><textarea name="medicalCommand" cols="40" rows="6" id="medicalCommand" ></textarea></td>
    <td width="148" align="right">دستورات پزشکی</td>
    <td width="20" align="center">3</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="therapeeuticMeasuresDateEN" id="therapeeuticMeasuresDateEN" /></td>
    <td width="148" align="right">تاریخ میلادی اقدامات درمانی مخصوص</td>
    <td width="20" align="center">4</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="therapeeuticMeasuresDateFA" id="therapeeuticMeasuresDateFA" /></td>
    <td width="148" align="right">تاریخ شمسی اقدامات درمانی مخصوص</td>
    <td width="20" align="center">5</td>
  </tr>
  <tr>
    <td width="154" align="right"><textarea name="therapeeuticMeasures" cols="40" rows="6" id="therapeeuticMeasures"></textarea></td>
    <td width="148" align="right">اقدامات درمانی مخصوص</td>
    <td width="20" align="center">6</td>
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
