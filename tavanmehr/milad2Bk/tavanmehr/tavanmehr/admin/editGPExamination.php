<?php
session_start();
if(!isset($_SESSION['validAdmin'])) exit;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../themes/default/css/index.css"/>
<title>ویرایش ویزیت پزشک عمومی</title>
</head>
<body>


<?php
include("header.php");
?>

<?php
	require('../class/connection.php');
	$GPExaminationId=$_POST['GPExaminationId'];
	$connector=new connection();
	if(!$connector->dbConnect()) echo 'error 1';
	$query="SELECT * FROM gpexamination WHERE GPExaminationId='$GPExaminationId'";
	$result=$connector->queryRun($query);
	$row = mysql_fetch_array($result);
?>



<form method="post" action="editGPExaminationP.php" enctype="multipart/form-data">
<div align="center">
<?php
if($_POST['GPExaminationId']!='') echo '<input type="hidden" name="GPExaminationId" id="GPExaminationId" value="'.$_POST['GPExaminationId'].'" />';
if($_POST['GPExaminationId']!='') echo '<input type="hidden" name="condition" id="condition" value="2" />';	
?>
<fieldset style="width:750px">
<legend align="center" style="color:#666">ویزیت پزشک عمومی</legend>
<br /><br /><br />
<br />
<table align="center" width="550px" border="0">
<colgroup></colgroup>
<colgroup></colgroup>
<colgroup style="background:#CCC"></colgroup>
  <tr style="display:none">
    <td width="154" align="right"><input type="text" name="GPExaminationId" id="GPExaminationId" value="<?php echo $GPExaminationId ?>"/></td>
    <td width="148" align="right">GPExaminationId</td>
    <td width="20" align="center">0</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text"  value="<?php echo $row['dateEN']; ?>" name="dateEN" id="dateEN"/></td>
    <td width="148" align="right">تاریخ میلادی</td>
    <td width="20" align="center">1</td>
  </tr>
  <tr>
    <td width="154" align="right"><input type="text"  value="<?php echo $row['dateFA']; ?>" name="dateFA" id="dateFA" /></td>
    <td width="148" align="right">تاریخ شمسی</td>
    <td width="20" align="center">2</td>
  </tr>
   <tr>
    <td width="250" align="right"><textarea name="examinationContext" cols="40" rows="6" id="examinationContext"><?php echo $row['examinationContext']; ?></textarea></td>
    <td width="186" align="right">شرح ویزیت</td>
    <td width="22" align="center">3</td>
  </tr>
  <tr style="display:none">
    <td width="154" align="right"><input type="text"  value="<?php echo $row['signatureId']; ?>" name="signatureId" id="signatureId" /></td>
    <td width="148" align="right">امضأ</td>
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
