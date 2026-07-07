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
include('../class/connect.php');
include('../includes/shamsiDate.php');

/*
if($_POST['hideOP']!=""){
$operation=$_POST['hideOP'];
}else{
$operation=$_POST['operation'];
}



if($_POST['hideCId']!=""){
$cId=$_POST['hideCId'];
}else{
$cId=$_POST['deleteCommentId'];
}
*/
$operation=$_POST['hideOP'];

$cId=$_POST['hideCId'];




$confirmDateEN=date("Y").'/'.date("m").'/'.date("d");

$confirmDateFA=jdate("Y").'/'.jdate("m").'/'.jdate("d");


$confirmTime=date("g").':'.date("i").':'.date("s");

$con=new connect();
$con-> dbConnect();


	if($operation=="op1"){

	$query = "UPDATE comments SET cConfirm = 'no' , confirmDateEN = '$confirmDateEN' , confirmDateFA = '$confirmDateFA' , confirmTime='$confirmTime'  WHERE cId = '$cId' ";
	}else if($operation=="op2"){

	$query = "UPDATE comments SET cConfirm = 'yes' , confirmDateEN = '$confirmDateEN' , confirmDateFA = '$confirmDateFA' , confirmTime='$confirmTime'  WHERE cId = '$cId'";
	}else if($operation=="op3"){
	$query = "DELETE FROM comments WHERE cId='$cId'";

	}
	$result=$con->queryRun($query);



?>




<script type="text/javascript" language="javascript">

window.location = "userComments.php"

</script>




</body>
</html>