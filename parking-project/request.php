<!DOCTYPE html>
<html>
<head>
</head>

<body>

<?php
$id=$_GET['parkId'];
require_once("connection.php");

$connector=new connection();
$query="select * from parkposition where parkPositonId='$id'";
$result=$connector->queryRun($query);
$row=mysql_fetch_array($result);
$status=$row['status'];
if($status=='1'){ // avalable
	$newStatus=0;
	$connector=new connection();
	$query="UPDATE `parkposition` SET `status` = '$newStatus' WHERE `parkPositonId` ='$id'";
	$result=$connector->queryRun($query);
	
	echo '
		<script language="javascript" type="text/javascript">
		window.location="parkPositions.php";
		</script>
	';
	
	}else echo 'parking is not avalable';
?>
</body>
</html>
