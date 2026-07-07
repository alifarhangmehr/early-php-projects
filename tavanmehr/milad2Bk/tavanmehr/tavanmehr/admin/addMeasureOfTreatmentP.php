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
//echo $measureOfTreatmentId;
$patientId=$_POST['patientId'];
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
//echo 'test'.$operationsSpecialTreatments;
$query="INSERT INTO `tavanmehr`.`measureoftreatment` (`measureOfTreatmentId`, `patientId`, `dateEN`, `dateFA`, `diet`, `TPR`, `weight`, `BP`, `diagnosis`, `operationsSpecialTreatments`, `admDateEN`, `admDateFA`) VALUES ('$measureOfTreatmentId', '$patientId', '$dateEN', '$dateFA', '$diet', '$TPR', '$weight', '$BP', '$diagnosis', '$operationsSpecialTreatments', '$admDateEN', '$admDateFA')";
$result=$connector->queryRun($query);

if(!$result) echo 'error 3';
?>

<script type="text/javascript" language="javascript">
<!--
con = <?php echo $_POST['condition']; ?> ;
if(con!='') window.location = "patientMeasureOfTreatment.php?patientId=<?php echo $patientId; ?>"
else
window.location = "showMeasureOfTreatment.php"
//-->
</script>
</body>
</html>
