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


$vitalSignChartId=$_POST['vitalSignChartId'];
echo $vitalSignChartId;
$time=$_POST['time'];
$dateEN=$_POST['dateEN'];
$dateFA=$_POST['dateFA'];
$temperature=$_POST['temperature'];
$pulse=$_POST['pulse'];
$respiratory=$_POST['respiratory'];
$bp=$_POST['bp'];
$considerations=$_POST['considerations'];



$query="UPDATE `tavanmehr`.`vitalsignchart` SET
`time` = '$time',
`dateEN` = '$dateEN',
`dateFA` = '$dateFA',
`temperature` = '$temperature',
`pulse` = '$pulse',
`respiratory` = '$respiratory',
`bp` = '$$bp',
`considerations` = '$considerations' WHERE `vitalsignchart`.`vitalSignChartId` ='$vitalSignChartId'";
$result=$connector->queryRun($query);

$connector2=new connection();
if(!$connector2->dbConnect()) echo 'error 1';
$query2="SELECT * FROM vitalsignchart WHERE vitalSignChartId='$vitalSignChartId'";
$result2=$connector->queryRun($query2);
$row2 = mysql_fetch_array($result2);
?>

<script type="text/javascript" language="javascript">
<!--
con = <?php echo $_POST['condition']; ?> ;
if(con!='') window.location = "patientVitalSignChart.php?patientId=<?php echo $row2['patientId']; ?>"
else
window.location = "showVitalSignChart.php"
//-->
</script>
</body>
</html>
