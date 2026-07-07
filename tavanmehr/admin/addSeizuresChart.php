<?php
session_start();
if(!isset($_SESSION['validAdmin'])) exit;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../themes/default/css/index.css"/>
<title>افزودن چارت تشنج</title>
</head>
<body>


<?php
include("header.php");
?>


<?php
	require('../class/connection.php');
	$connector=new connection();
	if(!$connector->dbConnect()) echo 'error 1';
	$query="SELECT MAX(seizuresChartId) FROM seizureschart";
	$result=$connector->queryRun($query);
	$row = mysql_fetch_array($result);
	//echo $row['MAX(foodCode)'];
	$seizuresChartId=$row['MAX(seizuresChartId)']+1;
	//echo '<br />seizuresChartId:'.$seizuresChartId.'<br />';
	
?>



<form method="post" action="addSeizuresChartP.php" enctype="multipart/form-data">
<div align="center">
<?php
if($_POST['patientId']!='') echo '<input type="hidden" name="patientId" id="patientId" value="'.$_POST['patientId'].'" />';
if($_POST['patientId']!='') echo '<input type="hidden" name="condition" id="condition" value="'.$_POST['condition'].'" />';	
?>
<fieldset style="width:750px">
<legend align="center" style="color:#666">چارت تشنج</legend>
<br /><br /><br />
<br />
<table align="center" width="550px" border="0">
<colgroup></colgroup>
<colgroup></colgroup>
<colgroup style="background:#CCC"></colgroup>
  <tr style="display:none">
    <td width="154" align="right"><input type="text" name="seizuresChartId" id="seizuresChartId" value="<?php echo $seizuresChartId; ?>"/></td>
    <td width="148" align="right">seizuresChartId</td>
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
    <td width="154" align="right"><input type="text" name="seizureDuration" id="seizureDuration" /></td>
    <td width="148" align="right">مدت تشنج</td>
    <td width="20" align="center">4</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text" name="vitalSigns" id="vitalSigns" /></td>
    <td width="148" align="right">علایم حیاتی</td>
    <td width="20" align="center">5</td>
  </tr>
    <tr>
    <td width="250" align="right"><textarea name="comments" cols="40" rows="6" id="comments"></textarea></td>
    <td width="186" align="right">سایر توضیحات</td>
    <td width="22" align="center">6</td>
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
