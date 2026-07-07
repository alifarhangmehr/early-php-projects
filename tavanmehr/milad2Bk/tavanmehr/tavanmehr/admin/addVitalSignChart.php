<?php
session_start();
if(!isset($_SESSION['validAdmin'])) exit;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../themes/default/css/index.css"/>
<title>افزودن چارت علایم حیاتی</title>
</head>
<body>


<?php
include("header.php");
?>


<?php
	require('../class/connection.php');
	$connector=new connection();
	if(!$connector->dbConnect()) echo 'error 1';
	$query="SELECT MAX(vitalSignChartId) FROM vitalsignchart";
	$result=$connector->queryRun($query);
	$row = mysql_fetch_array($result);
	//echo $row['MAX(foodCode)'];
	$vitalSignChartId=$row['MAX(vitalSignChartId)']+1;
	//echo '<br />vitalSignChartId:'.$vitalSignChartId.'<br />';
	
?>



<form method="post" action="addVitalSignChartP.php" enctype="multipart/form-data">
<div align="center">
<?php
if($_POST['patientId']!='') echo '<input type="hidden" name="patientId" id="patientId" value="'.$_POST['patientId'].'" />';
if($_POST['patientId']!='') echo '<input type="hidden" name="condition" id="condition" value="'.$_POST['condition'].'" />';	
?>
<fieldset style="width:750px">
<legend align="center" style="color:#666">چارت علایم حیاتی</legend>
<br /><br /><br />
<br />
<table align="center" width="550px" border="0">
<colgroup></colgroup>
<colgroup></colgroup>
<colgroup style="background:#CCC"></colgroup>
  <tr style="display:none">
    <td width="154" align="right"><input type="text" name="vitalSignChartId" id="vitalSignChartId" value="<?php echo $vitalSignChartId; ?>"/></td>
    <td width="148" align="right">vitalSignChartId</td>
    <td width="20" align="center">0</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="time" id="time"/></td>
    <td width="148" align="right">زمان</td>
    <td width="20" align="center">1</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="dateEN" id="dateEN"/></td>
    <td width="148" align="right">تاریخ میلادی</td>
    <td width="20" align="center">2</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="dateFA" id="dateFA" /></td>
    <td width="148" align="right">تاریخ شمسی</td>
    <td width="20" align="center">3</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="temperature" id="temperature" /></td>
    <td width="148" align="right">دمای بدن</td>
    <td width="20" align="center">4</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="pulse" id="pulse" /></td>
    <td width="148" align="right">تعداد نبض</td>
    <td width="20" align="center">5</td>
  </tr>
    <tr>
    <td width="154" align="right"><input type="text" name="respiratory" id="respiratory" /></td>
    <td width="148" align="right">تعداد نفس</td>
    <td width="20" align="center">6</td>
  </tr>
    <tr>
    <td width="154" align="right"><input type="text" name="bp" id="bp" /></td>
    <td width="148" align="right">فشار خون</td>
    <td width="20" align="center">7</td>
  </tr>
    <tr>
    <td width="250" align="right"><textarea name="considerations" cols="40" rows="6" id="considerations"></textarea></td>
    <td width="186" align="right">ملاحظات</td>
    <td width="22" align="center">8</td>
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
