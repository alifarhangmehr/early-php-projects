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


$specialistExaminationId=$_POST['specialistExaminationId'];
$patientId=$_POST['patientId'];
$dateEN=$_POST['dateEN'];
$dateFA=$_POST['dateFA'];
$examinationContext=$_POST['examinationContext'];
$signatureId=$_POST['signatureId'];

$query="INSERT INTO `tavanmehr`.`specialistexamination` (`specialistExaminationId`, `patientId`, `dateEN`, `dateFA`, `examinationContext`, `signatureId`) VALUES ('$specialistExaminationId', '$patientId', '$dateEN', '$dateFA', '$examinationContext', '$signatureId')";
$result=$connector->queryRun($query);


?>

<script type="text/javascript" language="javascript">
<!--
con = <?php echo $_POST['condition']; ?> ;
if(con!='') window.location = "patientSpecialistExamination.php?patientId=<?php echo $patientId; ?>"
else
window.location = "showSpecialistExamination.php"
//-->
</script>
</body>
</html>
