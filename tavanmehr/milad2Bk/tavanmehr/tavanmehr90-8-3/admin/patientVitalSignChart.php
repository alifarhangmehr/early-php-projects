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
<title>چارت علائم حیاتی</title>
</head>
<body>
<?php
include("header.php");
$patientId=$_GET['patientId'];
//$patientId=6;  //flag
require('../class/connection.php');
$connector=new connection();
if(!$connector->dbConnect()) echo 'error 1';
$query="SELECT * FROM VitalSignChart WHERE patientId='$patientId'";
$result=$connector->queryRun($query);
$num_rows = mysql_num_rows($result);
$numberOfVitalSignChart=$num_rows;	
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
    <td align="center"><br /><form method="post" action="addVitalSignChart.php">
<input type="hidden" name="patientId" id="patientId" value="<?php echo $patientId; ?>" />
<input type="hidden" name="condition" id="condition" value="1" />
<input type="image" src="../themes/default/images/addIcon.png" align="middle" style="border:none" /> اضافه نمودن</td>
</form>
  </tr>
  <tr>
    <td align="center"><span style="background:#336699; color:#FFFFFF">تعداد علائم حیاتی : </span><?php echo '<span style="background:#006600; color:#FFFFFF; font-weight:bold">'.$numberOfVitalSignChart.'</span>'; ?></td>
  </tr>
  <tr><td><form method="post" action="searchVitalSignChart.php">
<table align="center" border="0" cellpadding="0" cellspacing="0">
<tr><td align="center">
<br />
<input type="text" name="search" /><input type="submit" value="جستجو" />
<input type="hidden" name="patientId" value="<?php echo $patientId; ?>" />
<br />
<span style="color:#690">جستجو بر اساس تاریخ و ساعت</span>
<br /><br />
</td></tr>
</table>
</form>
</td></tr>
</table>

<table border="0" cellpadding="2" cellspacing="1" width="100%" dir="rtl" align="center">
<tr align="center" height="40px" bgcolor="#0066FF" style="color:#DDDDDD; font-size:11px"> 
    <th>زمان</th>
    <th>تاریخ شمسی</th>
    <th>تاریخ میلادی</th>
    <th>درجه حرارت</th>
    <th>تعداد نبض</th>
    <th>تعداد نفس</th>
    <th>فشارخون</th>
    <th>ملاحضات</th>
    <th>ویرایش</th>
    <th>حذف</th>
      
</tr>
<?php
$connector=new connection();
if(!$connector->dbConnect()) echo 'error 1';
$query = "SELECT * FROM VitalSignChart WHERE patientId='$patientId' ORDER BY VitalSignChartId ASC";
$result=$connector->queryRun($query);
$counter=0;
while($row = mysql_fetch_array($result))
  { 
  		 	 	 	 	 	
	if($counter%2==0) $bgCondition='#DDDDDD'; else $bgCondition='#EEEEEE';
	$counter++;
	echo '<tr bgcolor="'.$bgCondition.'">' ;
	echo '<td align=center>'.$row['time'].'</td>';
	echo '<td align=center>'.$row['dateFA'].'</td>';
	echo '<td align=center>'.$row['dateEN'].'</td>';
	echo '<td align=center>'.$row['temperature'].'</td>';
	echo '<td align=center>'.$row['pulse'].'</td>';
	echo '<td align=center>'.$row['respiratory'].'</td>';
	echo '<td align=center>'.$row['bp'].'</td>';
	echo '<td align=center>'.$row['considerations'].'</td>';
	echo '<td align=center><form method="post" action="editVitalSignChart.php"><input type="hidden" name="vitalSignChartId" id="vitalSignChartId" value="'.$row['vitalSignChartId'].'" /><input type="image" src="../themes/default/images/editIcon.png" style="border:hidden" /></td></form>';
	echo '<td align=center><input type="hidden" name="vitalSignChartId" id="vitalSignChartId" value="'.$row['vitalSignChartId'].'" /><input type="image" src="../themes/default/images/removeIcon.png" onclick="showDeleteDiv(\''.$row['vitalSignChartId'].'\')" style="border:hidden" /></td>';
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
<form method="post" action="deleteVitalSignChart.php">
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
