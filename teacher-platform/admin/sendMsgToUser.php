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

$condition=$_POST['condition'];

$adminAwnser=$_POST['replyText'];
$aFullDate=date("YmdHis");
$aDateEN=date("Y").'/'.date("m").'/'.date("d");
$aDateFA=jdate("Y").'/'.jdate("m").'/'.jdate("d");
$aTime=date("g").':'.date("i").':'.date("s");

$con=new connect();
$con-> dbConnect();


	if($condition=='reply'){
	$replyId=$_POST['replyId'];
	$query = "UPDATE message SET adminAwnser = '$adminAwnser' , aFullDate = '$aFullDate' , aDateEN = '$aDateEN' , aDateFA = '$aDateFA' , aTime='$aTime' , unRead='0' WHERE id = '$replyId' ";
	$alertMsg='پیغام شما با موفقیت ارسال شد';
	}else if($condition=='noAwnserNeed'){
	$replyId2=$_POST['replyId2'];
	$query = "UPDATE message SET unRead = '1' WHERE id = '$replyId2' ";
	$alertMsg='پیغام به عنوان بدون پاسخ نشانه گذاری شد';
	}else if($condition=='markAsRoad'){
	$replyId3=$_POST['replyId3'];
	$query = "UPDATE message SET unRead = '2' WHERE id = '$replyId3' ";
	$alertMsg='پیغام به عنوان خوانده شده نشانه گذاری شد';
	}
	$result=$con->queryRun($query);
if($result){
	echo '<p align="center" style="color:#3C3; font-family:Tahoma, Geneva, sans-serif; font-size:16px">'.$alertMsg.'</p>';
	echo '<p align="center"><img src="../themes/default/images/successfullySentIcon.png" /></p><p align="center" style="color:#69F; font-family:Tahoma, Geneva, sans-serif"><a href="msgInbox.php">بازگشت</a></p>';
	
}


?>




<script type="text/javascript" language="javascript">
/*
window.location = "msgInbox.php"
*/
</script>
</body>
</html>