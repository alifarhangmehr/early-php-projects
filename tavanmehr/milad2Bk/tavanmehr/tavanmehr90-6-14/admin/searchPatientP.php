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
<title>لیست مددجویان</title>
</head>

<body>

<?php
include("header.php");
?>


<div align="center"><a href="#" onclick="window.print()"><img src="../themes/default/images/print.png" width="30" height="30" /><br />چاپ</a></div>
<form method="post" action="searchPatientP.php">
<table align="center" border="0" cellpadding="0" cellspacing="0">
<tr><td align="center">
<input type="text" name="search" /><input type="submit" value="جستجو" />
<br /><br /><br />
</td></tr>
</table>
</form>



<table border="0" cellpadding="2" cellspacing="1" width="100%" dir="rtl" align="center">
<tr align="center" height="40px" bgcolor="#0066FF" style="color:#DDDDDD; font-size:11px"> 

	<th>تصویر</th>
    <th>کد مددجو</th>
    <th>نام</th>
    <th>فامیل</th>
    <th>نام پدر</th>
    <th>تاریخ تولد</th>
    <th>نوع معلولیت</th>
    <th>تاریخ شروع معلولیت</th>
    <th>شماره پرونده</th>
    <th>تلفن 1</th>
    <th>موبایل 1</th>
    <th>ویرایش</th>
    <th>حذف</th>
    <th>اطلاعات بیشتر</th>
</tr>

<?php
require('../class/connection.php');
require('../class/shamsiDate.php');
$connector=new connection();
$search=$_POST['search'];
if(!$connector->dbConnect()) echo 'error 1';
//$query = "SELECT * FROM patient WHERE patientCode='$patientCode' OR patientCode='$patientCode' OR patientCode='$patientCode' OR patientCode='$patientCode' OR patientCode='$patientCode' OR ";



$query = "(SELECT * FROM patient WHERE patientCode LIKE '%$search%' OR name LIKE '%$search%' OR family LIKE '%$search%' OR caseNumber LIKE '%$search%')";

$result=$connector->queryRun($query);
$counter=0;
while($row = mysql_fetch_array($result))
  {
	if($counter%2==0) $bgCondition='#DDDDDD'; else $bgCondition='#EEEEEE';
	$counter++;
	echo '<tr bgcolor="'.$bgCondition.'">' ;
	echo '<td align=center><a href="'.$row['photoSource'].'"><img src="'.$row['photo1'].'" /></a></td>';
	echo '<td align=center>'.$row['patientCode'].'</td>';
	echo '<td align=center>'.$row['name'].'</td>';
	echo '<td align=center>'.$row['family'].'</td>';
	echo '<td align=center>'.$row['father'].'</td>';
	echo '<td align=center>'.$row['birthday'].'</td>';
	echo '<td align=center>'.$row['disabilityType'].'</td>';
	echo '<td align=center>'.$row['disabilityStartDate'].'</td>';
	echo '<td align=center>'.$row['caseNumber'].'</td>';
	echo '<td align=center>'.$row['tel1'].'</td>';
	echo '<td align=center>'.$row['mobile1'].'</td>';
	echo '<td align=center><form method="post" action="editPatient.php"><input type="hidden" name="patientId" id="patientId" value="'.$row['patientId'].'" /><input type="hidden" name="patientId" id="patientId" value="'.$row['patientId'].'" /><input type="image" src="../themes/default/images/editPatientIcon.png" on style="border:hidden" /></td></form>';
	echo '<td align=center><input type="hidden" name="patientId" id="patientId" value="'.$row['patientId'].'" /><input type="image" src="../themes/default/images/removePatientIcon.png" onclick="showDeletePatientDiv(\''.$row['patientId'].'\')" style="border:hidden" /></td>';
	echo '<td align=center><a style="color:yellow; font-size:25px" href=showPatientDetails.php?patientId='.$row['patientId'].'><img src="../themes/default/images/viewDetails.png" /></td></tr>';
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
<form method="post" action="deletePatientP.php">
<input type="submit" value="بله" style="color:#F00" />
<input type="hidden" id="hiddenDeletePatientId" name="hiddenDeletePatientId" />
 &nbsp;&nbsp;&nbsp;&nbsp; 
<input type="button" value="انصراف" onclick="hideDeleteDiv()" />
</form>
<br /><br />
</div>
</div>
</body>
</html>
