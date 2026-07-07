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

$measureOfTreatmentId=$_POST['measureOfTreatmentId'];
$dateEN=$_POST['dateEN'];
$dateFA=$_POST['dateFA'];
$diet=$_POST['diet'];
$TPR=$_POST['TPR'];
$weight=$_POST['weight'];
$BP=$_POST['BP'];
$diagnosis=$_POST['diagnosis'];
$operationsSpecialTreatments=$_POST['operationsSpecialTreatments'];
$admDateEN=$_POST['admDateEN'];
$admDateFA=$_POST['admDateFA'];


$query="UPDATE `tavanmehr`.`measureoftreatment` SET `dateEN` = '$dateEN',
`dateFA` = '$dateFA',
`diet` = '$diet',
`TPR` = '$TPR',
`weight` = '$weight',
`BP` = '$BP',
`diagnosis` = '$diagnosis',
`operationsSpecialTreatments` = '$operationsSpecialTreatments',
`admDateEN` = '$admDateEN',
`admDateFA` = '$admDateFA' WHERE `measureoftreatment`.`measureOfTreatmentId` ='$measureOfTreatmentId'";
$result=$connector->queryRun($query);

$connector2=new connection();
if(!$connector2->dbConnect()) echo 'error 1';
$query2="SELECT * FROM measureoftreatment WHERE measureOfTreatmentId='$measureOfTreatmentId'";
$result2=$connector->queryRun($query2);
$row2 = mysql_fetch_array($result2);
?>

<script type="text/javascript" language="javascript">
<!--
con = <?php echo $_POST['condition']; ?> ;
if(con!='') window.location = "patientMeasureOfTreatment.php?patientId=<?php echo $row2['patientId']; ?>"
else
window.location = "showMeasureOfTreatment.php"
//-->
</script>
</body>
</html>
