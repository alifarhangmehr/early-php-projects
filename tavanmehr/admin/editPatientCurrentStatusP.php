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


$patientCurrentStatusId=$_POST['patientCurrentStatusId'];
$presentOrAbsent=$_POST['presentOrAbsent'];
$ward=$_POST['ward'];
$room=$_POST['room'];
$bed=$_POST['bed'];
$dateFA=$_POST['dateFA'];
$dateEN=$_POST['dateEN'];
$comments=$_POST['comments'];


$query="UPDATE `tavanmehr`.`patientcurrentstatus` SET `presentOrAbsent` = '$presentOrAbsent',
`ward` = '$ward',
`room` = '$room',
`bed` = '$bed',
`dateEN` = '$dateEN',
`dateFA` = '$dateFA',
`comments` = '$comments' WHERE `patientcurrentstatus`.`patientCurrentStatusId` ='$patientCurrentStatusId'";
$result=$connector->queryRun($query);

$connector2=new connection();
if(!$connector2->dbConnect()) echo 'error 1';
$query2="SELECT * FROM patientcurrentstatus WHERE patientCurrentStatusId='$patientCurrentStatusId'";
$result2=$connector->queryRun($query2);
$row2 = mysql_fetch_array($result2);
?>

<script type="text/javascript" language="javascript">
<!--
con = <?php echo $_POST['condition']; ?> ;
if(con!='') window.location = "patientCurrentStatus.php?patientId=<?php echo $row2['patientId']; ?>"
else
window.location = "showPatientCurrentStatus.php"
//-->
</script>
</body>
</html>
