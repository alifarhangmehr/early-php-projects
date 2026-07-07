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
$patientId=$_POST['patientId'];
$time=$_POST['time'];
$dateEN=$_POST['dateEN'];
$dateFA=$_POST['dateFA'];
$temperature=$_POST['temperature'];
$pulse=$_POST['pulse'];
$respiratory=$_POST['respiratory'];
$bp=$_POST['bp'];
$considerations=$_POST['considerations'];



$query="INSERT INTO `tavanmehr`.`vitalsignchart` (`vitalSignChartId`, `patientId`, `time`, `dateEN`, `dateFA`, `temperature`, `pulse`, `respiratory`, `bp`, `considerations`) VALUES ('$vitalSignChartId', '$patientId', '$time', '$dateEN', '$dateFA', '$temperature', '$pulse', '$respiratory', '$bp', '$considerations')";
$result=$connector->queryRun($query);


?>

<script type="text/javascript" language="javascript">
<!--
con = <?php echo $_POST['condition']; ?> ;
if(con!='') window.location = "patientVitalSignChart.php?patientId=<?php echo $patientId; ?>"
else
window.location = "showVitalSignChart.php"
//-->
</script>
</body>
</html>
