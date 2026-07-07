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
<title>لیست داروها</title>
</head>

<body>

<?php
include("header.php");
require('../class/connection.php');
$connector=new connection();
if(!$connector->dbConnect()) echo 'error 1';
$query="SELECT * FROM medicine";
$result=$connector->queryRun($query);
$num_rows = mysql_num_rows($result);
$numberOfMedicine=$num_rows;
	
?>
<table width="250" border="0" cellspacing="0" cellpadding="0" dir="rtl" align="center" bgcolor="#EEEEEE">
  <tr height="10px"><td></td></tr>
  <tr>
    <td align="center"><br /><form method="post" action="addMedicine.php">
<input type="hidden" name="medicineId" id="medicineId" value="<?php echo $patientId; ?>" />
<input type="image" src="../themes/default/images/addIcon.png" align="middle" style="border:none" /> اضافه نمودن</td>
</form>
  </tr>
  <tr>
    <td align="center"><span style="background:#336699; color:#FFFFFF">تعداد داروها : </span><?php echo '<span style="background:#006600; color:#FFFFFF; font-weight:bold">'.$numberOfMedicine.'</span>'; ?></td>
  </tr>
  <tr><td><form method="post" action="searchMedicine.php">
<table align="center" border="0" cellpadding="0" cellspacing="0">
<tr><td align="center">
<br />
<input type="text" name="search" /><input type="submit" value="جستجو" />
<input type="hidden" name="patientId" value="<?php echo $patientId; ?>" />
<br />
<span style="color:#690">جستجو بر اساس نام ، دز و نوع</span>
<br /><br />
</td></tr>
</table>
</form>
</td></tr>
</table>


<table border="0" cellpadding="2" cellspacing="1" width="100%" dir="rtl" align="center">
<tr align="center" height="40px" bgcolor="#0066FF" style="color:#DDDDDD; font-size:11px"> 

    <th>نام دارو</th>
    <th>نام دارو - انگلیسی</th>
    <th>دز دارو</th>
    <th>نوع دارو</th>
    <th>ویرایش</th>
    <th>حذف</th>
    
</tr>
<?php
$search=$_POST['search'];
require('../class/shamsiDate.php');
$connector=new connection();
if(!$connector->dbConnect()) echo 'error 1';
$query = "(SELECT * FROM medicine WHERE medicineNameEN LIKE '%$search%' OR medicineNameFA LIKE '%$search%' OR drugDose LIKE '%$search%' OR medicineType LIKE '%$search%')";
$result=$connector->queryRun($query);
$counter=0;
while($row = mysql_fetch_array($result))
  { 
	if($counter%2==0) $bgCondition='#DDDDDD'; else $bgCondition='#EEEEEE';
	$counter++;
	echo '<tr bgcolor="'.$bgCondition.'">' ;
	echo '<td align=center>'.$row['medicineNameFA'].'</td>';
	echo '<td align=center>'.$row['medicineNameEN'].'</td>';
	echo '<td align=center>'.$row['drugDose'].'</td>';
	echo '<td align=center>'.$row['medicineType'].'</td>';
	echo '<td align=center><form method="post" action="editMedicine.php"><input type="hidden" name="medicineId" id="medicineId" value="'.$row['medicineId'].'" /><input type="image" src="../themes/default/images/editIcon.png" style="border:hidden" /></td></form>';
	echo '<td align=center><input type="hidden" name="medicineId" id="medicineId" value="'.$row['medicineId'].'" /><input type="image" src="../themes/default/images/removeIcon.png" onclick="showDeleteDiv(\''.$row['medicineId'].'\')" style="border:hidden" /></td>';
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
<form method="post" action="deleteMedicine.php">
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
