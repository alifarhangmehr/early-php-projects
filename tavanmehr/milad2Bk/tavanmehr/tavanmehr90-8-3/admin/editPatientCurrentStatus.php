<?php
session_start();
if(!isset($_SESSION['validAdmin'])) exit;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../themes/default/css/index.css"/>
<title>ویرایش وضعیت فعلی مددجو</title>
</head>
<body>
<?php
include("header.php");
?>

<?php
	require('../class/connection.php');
	$patientCurrentStatusId=$_POST['patientCurrentStatusId'];
	$connector=new connection();
	if(!$connector->dbConnect()) echo 'error 1';
	$query="SELECT * FROM patientcurrentstatus WHERE patientCurrentStatusId='$patientCurrentStatusId'";
	$result=$connector->queryRun($query);
	$row = mysql_fetch_array($result);
	//echo 'patientCurrentStatusId : '.$patientCurrentStatusId;
?>



<form method="post" action="editPatientCurrentStatusP.php" enctype="multipart/form-data">
<div align="center">
<?php
if($_POST['patientCurrentStatusId']!='') echo '<input type="hidden" name="patientCurrentStatusId" id="patientCurrentStatusId" value="'.$_POST['patientCurrentStatusId'].'" />';
if($_POST['patientCurrentStatusId']!='') echo '<input type="hidden" name="condition" id="condition" value="2" />';;
?>
<fieldset style="width:750px">
<legend align="center" style="color:#666">وضعیت بیمار</legend>
<br /><br /><br />
<br />
<table align="center" width="550px" border="0">
<colgroup></colgroup>
<colgroup></colgroup>
<colgroup style="background:#CCC"></colgroup>
  <tr style="display:none">
    <td width="154" align="right"><input type="text" name="patientCurrentStatusId" id="patientCurrentStatusId" value="<?php echo $patientCurrentStatusId; ?>"/></td>
    <td width="148" align="right">patientCurrentStatusId</td>
    <td width="20" align="center">0</td>
  </tr>
  <tr>
    <td width="154" align="right">
    <table>
    <tr>
    <td>حاضر</td><td><input type="radio" name="presentOrAbsent" value="1" <?php if($row['presentOrAbsent']=='1') echo 'checked="checked"'; ?> /></td>
    </tr><tr>
    <td>غایب</td><td><input type="radio" name="presentOrAbsent" value="0" <?php if($row['presentOrAbsent']=='0') echo 'checked="checked"'; ?> /></td>
    </tr>
    </table>
    </td>
    <td width="148" align="right">حضور غیاب</td>
    <td width="20" align="center">1</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text"  value="<?php echo $row['ward']; ?>" name="ward" id="ward" /></td>
    <td width="148" align="right">بخش</td>
    <td width="20" align="center">2</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text"  value="<?php echo $row['room']; ?>" name="room" id="room" /></td>
    <td width="148" align="right">اتاق</td>
    <td width="20" align="center">3</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text"  value="<?php echo $row['bed']; ?>" name="bed" id="bed" /></td>
    <td width="148" align="right">تخت</td>
    <td width="20" align="center">4</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text"  value="<?php echo $row['dateFA']; ?>" name="dateFA" id="dateFA" /></td>
    <td width="148" align="right">تاریخ شمسی</td>
    <td width="20" align="center">5</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text"  value="<?php echo $row['dateEN']; ?>" name="dateEN" id="dateEN" /></td>
    <td width="148" align="right">تاریخ میلادی</td>
    <td width="20" align="center">6</td>
  </tr>
  <tr>
    <td width="250" align="right"><textarea name="comments" cols="40" rows="6" id="comments"><?php echo $row['comments']; ?></textarea></td>
    <td width="186" align="right">توضیحات</td>
    <td width="22" align="center">7</td>
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
