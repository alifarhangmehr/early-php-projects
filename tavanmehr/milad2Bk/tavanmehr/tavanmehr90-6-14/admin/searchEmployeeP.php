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
<title>لیست کارمندان</title>
</head>

<body>

<?php
include("header.php");
?>


<div align="center"><a href="#" onclick="window.print()"><img src="../themes/default/images/print.png" width="30" height="30" /><br />چاپ</a></div>
<form method="post" action="searchEmployeeP.php">
<table align="center" border="0" cellpadding="0" cellspacing="0">
<tr><td align="center">
<input type="text" name="search" /><input type="submit" value="جستجو" />
<br /><br /><br />
</td></tr>
</table>
</form>

<table border="0" cellpadding="2" cellspacing="1" width="100%" dir="rtl" align="center">
<tr align="center" height="40px" bgcolor="#0066FF" style="color:#DDDDDD; font-size:11px"> 
<!--
	<th>عکس</th>
    <th>آیدی مددجو</th>
    <th>نام</th>
    <th>فامیل</th>
    <th>نام پدر</th>
    <th>تاریخ تولد</th>
    <th>کد ملی</th>
    <th>کد معلولیت</th>
    <th>نوع معلولیت</th>
    <th>تاریخ شروع معلولیت</th>
    <th>شماره پرونده</th>
    <th>آدرس منزل 1</th>
    <th>آدرس منزل 2</th>
    <th>تلفن 1</th>
    <th>تلفن 2</th>
    <th>موبایل 1</th>
    <th>موبایل 2</th>
    <th>ویرایش</th>
    <th>حذف</th>
    <th>اطلاعات بیشتر</th>
-->
	<th>تصویر</th>
    <th>آیدی کارمند</th>
    <th>نام</th>
    <th>فامیل</th>
    <th>نام پدر</th>
    <th>تاریخ تولد</th>
    <th>تلفن</th>
    <th>موبایل</th>
    <th>ویرایش</th>
    <th>حذف</th>
    <th>اطلاعات بیشتر</th>
</tr>
<?php
// foodGroupId ~~> for sending a key to form action for update
require('../class/connection.php');
require('../class/shamsiDate.php');
$connector=new connection();
if(!$connector->dbConnect()) echo 'error 1';
$search=$_POST['search'];
$query = "(SELECT * FROM employee WHERE name LIKE '%$search%'OR family LIKE '%$search%' OR job LIKE '%$search%')";

$result=$connector->queryRun($query);
$counter=0;
while($row = mysql_fetch_array($result))
  {
	if($counter%2==0) $bgCondition='#DDDDDD'; else $bgCondition='#EEEEEE';
	$counter++;
	echo '<tr bgcolor="'.$bgCondition.'">' ;
	echo '<td align=center><a href="'.$row['photoSource'].'"><img src="'.$row['photo1'].'" /></a></td>';
	echo '<td align=center>'.$row['employeeId'].'</td>';
	echo '<td align=center>'.$row['name'].'</td>';
	echo '<td align=center>'.$row['family'].'</td>';
	echo '<td align=center>'.$row['father'].'</td>';
	echo '<td align=center>'.$row['birthday'].'</td>';

	echo '<td align=center>'.$row['tel'].'</td>';
	//echo '<td align=center>'.$row['tel2'].'</td>';
	echo '<td align=center>'.$row['mobile'].'</td>';
	///echo '<td align=center>'.$row['mobile2'].'</td>';
	echo '<td align=center><form method="post" action="editEmployee.php"><input type="hidden" name="employeeId" id="employeeId" value="'.$row['employeeId'].'" /><input type="hidden" name="employeeId" id="employeeId" value="'.$row['employeeId'].'" /><input type="image" src="../themes/default/images/editPatientIcon.png" on style="border:hidden" /></td></form>';
	echo '<td align=center><input type="hidden" name="employeeId" id="employeeId" value="'.$row['employeeId'].'" /><input type="image" src="../themes/default/images/removePatientIcon.png" onclick="showDeleteEmployeeDiv(\''.$row['employeeId'].'\')" style="border:hidden" /></td>';
	echo '<td align=center><a style="color:yellow; font-size:25px" href=showEemployeeDetails.php?employeeId='.$row['employeeId'].'><img src="../themes/default/images/viewDetails.png"   /></td></tr>';
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
<form method="post" action="deleteEemployeeP.php">
<input type="submit" value="بله" style="color:#F00" />
<input type="hidden" id="hiddenDeletEemployeeId" name="hiddenDeletEemployeeId" />
 &nbsp;&nbsp;&nbsp;&nbsp; 
<input type="button" value="انصراف" onclick="hideDeleteEmployeeDiv()" />
</form>
<br /><br />
</div>
</div>
</body>
</html>
