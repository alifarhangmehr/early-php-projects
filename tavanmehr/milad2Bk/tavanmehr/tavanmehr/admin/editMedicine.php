<?php
session_start();
if(!isset($_SESSION['validAdmin'])) exit;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../themes/default/css/index.css"/>
<title>ویرایش داروها</title>
</head>
<body>


<?php
include("header.php");
?>


<?php
	require('../class/connection.php');
	$medicineId=$_POST['medicineId'];
	$connector=new connection();
	if(!$connector->dbConnect()) echo 'error 1';
	$query="SELECT * FROM medicine WHERE medicineId='$medicineId'";
	$result=$connector->queryRun($query);
	$row = mysql_fetch_array($result);
?>



<form method="post" action="editMedicineP.php" enctype="multipart/form-data">
<div align="center">
<?php
if($_POST['medicineId']!='') echo '<input type="hidden" name="medicineId" id="medicineId" value="'.$_POST['medicineId'].'" />';
if($_POST['medicineId']!='') echo '<input type="hidden" name="condition" id="condition" value="2" />';	
?>
<fieldset style="width:750px">
<legend align="center" style="color:#666">داروها</legend>
<br /><br /><br />
<br />
<table align="center" width="550px" border="0">
<colgroup></colgroup>
<colgroup></colgroup>
<colgroup style="background:#CCC"></colgroup>
  <tr style="display:none">
    <td width="154" align="right"><input type="text" name="medicineId" id="medicineId" value="<?php echo $medicineId; ?>"/></td>
    <td width="148" align="right">medicineId</td>
    <td width="20" align="center">1</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text"  value="<?php echo $row['medicineNameEN']; ?>" name="medicineNameEN" id="medicineNameEN"/></td>
    <td width="148" align="right">نام دارو انگلیسی</td>
    <td width="20" align="center">1</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text"  value="<?php echo $row['medicineNameFA']; ?>" name="medicineNameFA" id="medicineNameFA" /></td>
    <td width="148" align="right">نام دارو فارسی</td>
    <td width="20" align="center">2</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text"  value="<?php echo $row['drugDose']; ?>" name="drugDose" id="drugDose" /></td>
    <td width="148" align="right">دز دارو</td>
    <td width="20" align="center">3</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text"  value="<?php echo $row['medicineType']; ?>" name="medicineType" id="medicineType" /></td>
    <td width="148" align="right">نوع دارو</td>
    <td width="20" align="center">4</td>
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
