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
$dateEN=$_POST['dateEN'];
$dateFA=$_POST['dateFA'];
$examinationContext=$_POST['examinationContext'];
$signatureId=$_POST['signatureId'];


$query="UPDATE `tavanmehr`.`specialistexamination` SET `dateEN` = '$dateEN',
`dateFA` = '$dateFA',
`examinationContext` = '$examinationContext',
`signatureId` = '$signatureId' WHERE `specialistexamination`.`specialistExaminationId` =$specialistExaminationId";
$result=$connector->queryRun($query);

$connector2=new connection();
if(!$connector2->dbConnect()) echo 'error 1';
$query2="SELECT * FROM specialistexamination WHERE specialistExaminationId='$specialistExaminationId'";
$result2=$connector->queryRun($query2);
$row2 = mysql_fetch_array($result2);
?>

<script type="text/javascript" language="javascript">
<!--
con = <?php echo $_POST['condition']; ?> ;
if(con!='') window.location = "patientSpecialistExamination.php?patientId=<?php echo $row2['patientId']; ?>"
else
window.location = "showSpecialistExamination.php"
//-->
</script>
</body>
</html>
