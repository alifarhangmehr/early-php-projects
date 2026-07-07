<?php
session_start();
if(!isset($_SESSION['validAdmin'])) exit;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../themes/default/css/index.css"/>
<title>ویرایش اقدامات درمانی توسط پزشک</title>
</head>
<body>


<?php
include("header.php");
?>


<?php
	require('../class/connection.php');
	$measureOfTreatmentId=$_POST['measureOfTreatmentId'];
	$connector=new connection();
	if(!$connector->dbConnect()) echo 'error 1';
	$query="SELECT * FROM measureoftreatment WHERE measureOfTreatmentId='$measureOfTreatmentId'";
	$result=$connector->queryRun($query);
	$row = mysql_fetch_array($result);
?>



<form method="post" action="editMeasureOfTreatmentP.php" enctype="multipart/form-data">
<div align="center">
<?php
if($_POST['measureOfTreatmentId']!='') echo '<input type="hidden" name="measureOfTreatmentId" id="measureOfTreatmentId" value="'.$_POST['measureOfTreatmentId'].'" />';
if($_POST['measureOfTreatmentId']!='') echo '<input type="hidden" name="condition" id="condition" value="2" />';	
?>
<fieldset style="width:750px">
<legend align="center" style="color:#666">اقدامات درمانی</legend>
<br /><br /><br />
<br />
<table align="center" width="550px" border="0">
<colgroup></colgroup>
<colgroup></colgroup>
<colgroup style="background:#CCC"></colgroup>
  <tr style="display:none">
    <td width="154" align="right"><input type="text" name="measureOfTreatmentId" id="measureOfTreatmentId" value="<?php echo $measureOfTreatmentId; ?>" /></td>
    <td width="148" align="right">measuresOfTreatmentId</td>
    <td width="20" align="center">0</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text"  value="<?php echo $row['dateEN']; ?>" name="dateEN" id="dateEN" /></td>
    <td width="148" align="right">تاریخ میلادی</td>
    <td width="20" align="center">1</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text"  value="<?php echo $row['dateFA']; ?>" name="dateFA" id="dateFA" /></td>
    <td width="148" align="right">تاریخ شمسی</td>
    <td width="20" align="center">2</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text"  value="<?php echo $row['diet']; ?>" name="diet" id="diet" /></td>
    <td width="148" align="right">رژیم غذایی</td>
    <td width="20" align="center">3</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text"  value="<?php echo $row['TPR']; ?>" name="TPR" id="TPR" /></td>
    <td width="148" align="right">دمای بدن</td>
    <td width="20" align="center">4</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text"  value="<?php echo $row['weight']; ?>" name="weight" id="weight" /></td>
    <td width="148" align="right">وزن</td>
    <td width="20" align="center">5</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text"  value="<?php echo $row['BP']; ?>" name="BP" id="BP" /></td>
    <td width="148" align="right">فشار خون</td>
    <td width="20" align="center">6</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text"  value="<?php echo $row['diagnosis']; ?>" name="diagnosis" id="diagnosis" /></td>
    <td width="148" align="right">تشخیص</td>
    <td width="20" align="center">7</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text"  value="<?php echo $row['operationsSpecialTreatments']; ?>" name="operationsSpecialTreatments" id="operationsSpecialTreatments" /></td>
    <td width="148" align="right">اقدامات درمانی مخصوص</td>
    <td width="20" align="center">8</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text"  value="<?php echo $row['admDateEN']; ?>" name="admDateEN" id="admDateEN" /></td>
    <td width="148" align="right">تاریخ پذیرش میلادی</td>
    <td width="20" align="center">9</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text"  value="<?php echo $row['admDateFA']; ?>" name="admDateFA" id="admDateFA" /></td>
    <td width="148" align="right">تاریخ شمسی پذیرش </td>
    <td width="20" align="center">10</td>
  </tr>
  <tr>
    <td colspan="3" align="center"><input type="submit" value="تغییر بده" /></td>
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
