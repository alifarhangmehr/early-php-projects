<?php
session_start();
if(!isset($_SESSION['validAdmin'])) exit;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../themes/default/css/index.css"/>
<script language="javascript" type="text/javascript" src="../java/index.js"></script>
<title>لیست وضعیت فعلی مددجو</title>
</head>
<body>
<?php
include("header.php");
$patientId=$_GET['patientId'];
//$patientId=6;  //flag
require('../class/connection.php');
$connector=new connection();
if(!$connector->dbConnect()) echo 'error 1';
$query="SELECT * FROM PatientCurrentStatus WHERE patientId='$patientId'";
$result=$connector->queryRun($query);
$num_rows = mysql_num_rows($result);
$numberOfPatientCurrentStatus=$num_rows;	
$connector2=new connection();
if(!$connector2->dbConnect()) echo 'error 1';
$query2 = "SELECT * FROM patient WHERE patientId='$patientId'";
$result2=$connector->queryRun($query2);
$row2 = mysql_fetch_array($result2);
?>
<table width="250" border="0" cellspacing="0" cellpadding="0" dir="rtl" align="center" bgcolor="#EEEEEE">
  <tr height="10px"><td></td></tr>
  <tr>
    <td align="center"><?php echo'<a href="'.$row2['photoSource'].'"><img src="'.$row2 ['photo1'].'" /></a>'; ?></td>
  </tr>
  <tr>
    <td align="center"><br /><form method="post" action="addPatientCurrentStatus.php">
<input type="hidden" name="patientId" id="patientId" value="<?php echo $patientId; ?>" />
<input type="hidden" name="condition" id="condition" value="1" />
<input type="image" src="../themes/default/images/addIcon.png" align="middle" style="border:none" /> اضافه نمودن</td>
</form>
  </tr>
  <tr>
    <td align="center"><span style="background:#336699; color:#FFFFFF">تعداد وضعیت ها : </span><?php echo '<span style="background:#006600; color:#FFFFFF; font-weight:bold">'.$numberOfPatientCurrentStatus.'</span>'; ?></td>
  </tr>
  <tr><td><form method="post" action="searchPatientCurrentStatus.php">
<table align="center" border="0" cellpadding="0" cellspacing="0">
<tr><td align="center">
<br />
<input type="text" name="search" /><input type="submit" value="جستجو" />
<input type="hidden" name="patientId" value="<?php echo $patientId; ?>" />
<br />
<span style="color:#690">جستجو بر اساس تاریخ ، اتاق ، بخش و تخت</span>
<br /><br />
</td></tr>
</table>
</form>
</td></tr>
</table>
<table border="0" cellpadding="2" cellspacing="1" width="100%" dir="rtl" align="center">
<tr align="center" height="40px" bgcolor="#0066FF" style="color:#DDDDDD; font-size:11px"> 

    <th>حضور غیاب</th>
    <th>بخش</th>
    <th>اتاق</th>
    <th>تاریخ شمسی</th>
    <th>تاریخ میلادی</th>
    <th>تخت</th>
    <th>توضحات</th>
    <th>ویرایش</th>
    <th>حذف</th>
 
    
</tr>
<?php
$connector=new connection();
if(!$connector->dbConnect()) echo 'error 1';
$query = "SELECT * FROM PatientCurrentStatus WHERE patientId='$patientId' ORDER BY PatientCurrentStatusId ASC";
$result=$connector->queryRun($query);
$counter=0;
while($row = mysql_fetch_array($result))
  { 
  		 	 	 	 	 	
	if($counter%2==0) $bgCondition='#DDDDDD'; else $bgCondition='#EEEEEE';
	$counter++;
	if($row['presentOrAbsent']==1) $presentOrAbsent='<img src="../themes/default/images/presentIcon.png" width="32px" height="32px" />'; else if($row['presentOrAbsent']==0) $presentOrAbsent='<img src="../themes/default/images/absentIcon.png" width="32px" height="32px" />';
	echo '<tr bgcolor="'.$bgCondition.'">' ;
	echo '<td align=center>'.$presentOrAbsent.'</td>';
	echo '<td align=center>'.$row['ward'].'</td>';
	echo '<td align=center>'.$row['room'].'</td>';
	echo '<td align=center>'.$row['dateFA'].'</td>';
	echo '<td align=center>'.$row['dateEN'].'</td>';
	echo '<td align=center>'.$row['bed'].'</td>';
	echo '<td align=center>'.$row['comments'].'</td>';
	echo '<td align=center><form method="post" action="editPatientCurrentStatus.php"><input type="hidden" name="patientCurrentStatusId" id="patientCurrentStatusId" value="'.$row['patientCurrentStatusId'].'" /><input type="image" src="../themes/default/images/editIcon.png" style="border:hidden" /></td></form>';
	echo '<td align=center><input type="hidden" name="patientCurrentStatusId" id="patientCurrentStatusId" value="'.$row['patientCurrentStatusId '].'" /><input type="image" src="../themes/default/images/removeIcon.png" onclick="showDeleteDiv(\''.$row['patientCurrentStatusId '].'\')" style="border:hidden" /></td>';
	echo '</tr>';
  }
	
?>
</table>

<?php
include("header.php");
?>

<div id="outerDeleteDiv">
<div id="deleteDiv" align="center">
<br /><br />
آیا مطمئن هستید ؟

<br /><br />
<form method="post" action="deletePatientCurrentStatus.php">
<input type="submit" value="بله" style="color:#F00" />
<input type="hidden" id="hiddenDeleteId" name="hiddenDeleteId" />
 &nbsp;&nbsp;&nbsp;&nbsp; 
<input type="button" value="انصراف" onclick="hideDeleteDiv()" />
</form>
<br /><br />
</div>
</div>
</body>
</html>
