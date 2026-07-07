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
$patientId=$_POST['patientId'];
$presentOrAbsent=$_POST['presentOrAbsent'];
$ward=$_POST['ward'];
$room=$_POST['room'];
$bed=$_POST['bed'];
$dateFA=$_POST['dateFA'];
$dateEN=$_POST['dateEN'];
$comments=$_POST['comments'];

$query="INSERT INTO `tavanmehr`.`patientcurrentstatus` (`patientCurrentStatusId`, `patientId`, `presentOrAbsent`, `ward`, `room`, `bed`, `dateEN`, `dateFA`, `comments`) VALUES ('$patientCurrentStatusId', '$patientId', '$presentOrAbsent', '$ward', '$room', '$bed', '$dateEN', '$dateFA', '$comments')";
$result=$connector->queryRun($query);


?>

<script type="text/javascript" language="javascript">
<!--

window.location = "patientCurrentStatus.php?patientId=<?php echo $patientId; ?>"

//-->
</script>
</body>
</html>
