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
<title>لیست دستورات دارویی</title>
</head>

<body>

<?php
include("header.php");
?>
<!-- flag print icon deleted from here -->
<form method="post" action="patientMedicationOrders.php">
<table align="center" border="0" cellpadding="0" cellspacing="0">
<tr><td align="center">
<br />
<input type="text" name="search" /><input type="submit" value="جستجو" />
<br /><br /><br />
</td></tr>
</table>
</form>



<?php
	require('../class/connection.php');
	$connector=new connection();
	if(!$connector->dbConnect()) echo 'error 1';
	$query="SELECT * FROM medicationorders";
	$result=$connector->queryRun($query);
	$num_rows = mysql_num_rows($result);
	$numberOfMedicationOrders=$num_rows;
	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<p align="right" style="color:royalblue">تعداد دستورات دارویی : '.$numberOfMedicationOrders.'</p>';
	
?>





<table border="0" cellpadding="2" cellspacing="1" width="100%" dir="rtl" align="center">
<tr align="center" height="40px" bgcolor="#0066FF" style="color:#DDDDDD; font-size:11px"> 

	<th>عکس</th>
    <th>تاریخ شمسی</th>
    <th>تاریخ میلادی</th>
    <th>دستورات پزشک</th>
    <th>تاریخ شمسی</th>
    <th>تاریخ میلادی</th>
    <th>افدامات درمانی مخصوص</th>
    <th>ویرایش</th>
    <th>حذف</th>
    
    
</tr>
<?php

require('../class/shamsiDate.php');
$connector=new connection();
if(!$connector->dbConnect()) echo 'error 1';
$query = "SELECT * FROM medicationorders ORDER BY medicationOrdersId ASC";
$result=$connector->queryRun($query);
$counter=0;
while($row = mysql_fetch_array($result))
  { 
  	$connector2=new connection();
	if(!$connector2->dbConnect()) echo 'error 1';
	$query2 = "SELECT * FROM patient WHERE patientId='".$row['patientId']."'";
	$result2=$connector->queryRun($query2);
	$row2 = mysql_fetch_array($result2);	 	 	 	 	 	
	if($counter%2==0) $bgCondition='#DDDDDD'; else $bgCondition='#EEEEEE';
	$counter++;
	echo '<tr bgcolor="'.$bgCondition.'">' ;
	echo '<td align=center><a href="'.$row2['photoSource'].'"><img src="'.$row2 ['photo1'].'" /></a></td>';
	echo '<td align=center>'.$row['medicalCommandDateFA'].'</td>';
	echo '<td align=center>'.$row['medicalCommandDateEN'].'</td>';
	echo '<td align=center>'.$row['medicalCommand'].'</td>';
	echo '<td align=center>'.$row['therapeeuticMeasuresDateEN'].'</td>';
	echo '<td align=center>'.$row['therapeeuticMeasuresDateFA'].'</td>';
	echo '<td align=center>'.$row['therapeeuticMeasures'].'</td>';
	echo '<td align=center><form method="post" action="editMedicationOrders.php"><input type="hidden" name="medicationOrdersId" id="medicationOrdersId" value="'.$row['medicationOrdersId'].'" /><input type="image" src="../themes/default/images/editIcon.png" style="border:hidden" /></td></form>';
	echo '<td align=center><input type="hidden" name="medicationOrdersId" id="medicationOrdersId" value="'.$row['medicationOrdersId'].'" /><input type="image" src="../themes/default/images/removeIcon.png" onclick="showDeleteDiv(\''.$row['medicationOrdersId'].'\')" style="border:hidden" /></td>';
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
<form method="post" action="deleteMedicationOrders.php">
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
