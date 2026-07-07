<?php
session_start();
if(!isset($_SESSION['validUser'])) exit;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>


</head>

<body>
<p>
<?php
require('../class/connect.php');
require('../includes/shamsiDate.php');
$time=date("g").':'.date("i").':'.date("s");
$fullDate=date("YmdHis");
$dateEN=date("Y").'/'.date("m").'/'.date("d");
$dateFA=pdate("Y").'/'.pdate("m").'/'.pdate("d");

$user=$_POST['hideUser'];

$name=$_SESSION['validName'];
//echo 'name : '.$name;
$family=$_SESSION['validFamily'];
$msgTitle=$_POST['msgTitle'];
$msgText=$_POST['msgText'];
$unRead=3;
$con=new connect();
$con-> dbConnect();
$query = "INSERT INTO message (user,name,family,time,fullDate,dateEN,dateFA,msgTitle,msgText,unRead) VALUES ('$user','$name','$family','$time','$fullDate','$dateEN','$dateFA','$msgTitle','$msgText','$unRead')";

$result=$con->queryRun($query);
if($result){
	echo '<p align="center" style="color:#3C3; font-family:Tahoma, Geneva, sans-serif; font-size:16px">پیغام شما با موفقیت ارسال شد</p>';
	echo '<p align="center"><img src="../themes/default/images/successfullySentIcon.png" /></p><p align="center" style="color:#69F; font-family:Tahoma, Geneva, sans-serif"><a href="msgInbox.php">بازگشت</a></p>';
	
}
?>
</body>
</html>
