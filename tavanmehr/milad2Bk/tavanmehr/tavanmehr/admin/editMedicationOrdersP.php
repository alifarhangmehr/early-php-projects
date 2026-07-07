<?php
session_start();
if(!isset($_SESSION['validAdmin'])) exit;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>


<?php
require('../class/connection.php');
require('../class/shamsiDate.php');

$connector=new connection();
if(!$connector->dbConnect()) echo 'error 1';


$medicationOrdersId=$_POST['medicationOrdersId'];
$medicalCommandDateEN=$_POST['medicalCommandDateEN'];
$medicalCommandDateFA=$_POST['medicalCommandDateFA'];
$medicalCommand=$_POST['medicalCommand'];
$therapeeuticMeasuresDateEN=$_POST['therapeeuticMeasuresDateEN'];
$therapeeuticMeasuresDateFA=$_POST['therapeeuticMeasuresDateFA'];
$therapeeuticMeasures=$_POST['therapeeuticMeasures'];

$query="UPDATE `tavanmehr`.`medicationorders` SET `medicalCommandDateEN` = '$medicalCommandDateEN',
`medicalCommandDateFA` = '$medicalCommandDateFA',
`medicalCommand` = '$medicalCommand',
`therapeeuticMeasuresDateEN` = '$therapeeuticMeasuresDateEN',
`therapeeuticMeasuresDateFA` = '$therapeeuticMeasuresDateFA',
`therapeeuticMeasures` = '$therapeeuticMeasures' WHERE `medicationorders`.`medicationOrdersId` ='$medicationOrdersId'";
$result=$connector->queryRun($query);

$connector2=new connection();
if(!$connector2->dbConnect()) echo 'error 1';
$query2="SELECT * FROM medicationorders WHERE medicationOrdersId='$medicationOrdersId'";
$result2=$connector->queryRun($query2);
$row2 = mysql_fetch_array($result2);
?>

<script type="text/javascript" language="javascript">
<!--
con = <?php echo $_POST['condition']; ?> ;
if(con!='') window.location = "patientMedicationOrders.php?patientId=<?php echo $row2['patientId']; ?>"
else
window.location = "showMedicationOrders.php"
//-->
</script>
</body>
</html>
