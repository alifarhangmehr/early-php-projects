<?php
session_start();
if(!isset($_SESSION['validName'])) exit;
$userName=$_SESSION['validName'];
require('../includes/shamsiDate.php');
require('../class/connect.php');
echo'
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="themes/default/css/index.css">
<script language="javascript" type="text/javascript" src="java/index.js"></script>
<title>پروتال خبری گروه آرمای</title>
</head>

<body>';





$newsId=$_POST['newsId'];
//echo 'news id : '.$newsId ;
//$newSerial=date("YmdHis");
$fullDate=date("YmdHis");
$dateEN=date("Y").'/'.date("m").'/'.date("d");
$dateFA=jdate("Y").'/'.jdate("m").'/'.jdate("d");
$cTime=date("g").':'.date("i").':'.date("s");
//$cName =$_POST['cName'];
//if($_POST['cUser']!='')$cUser=$_POST['cUser']; else $cUser='Guest';
$cName=$_SESSION['validName'];
$cUser=$userName;
$cEmail=$_POST['cEmail'];
$cReallEmail=$_POST['cReallEmail'];
$cWebPage=$_POST['cSite'];
$cBody=$_POST['cBody'];
$cName=$_POST['cName'];
$cConfirm="yes";


//echo '123';

$con=new connect();
$con-> dbConnect();
$query = "INSERT INTO stdboardcomments (newsId,cUser,cBody,cWebPage,cEmail,cReallEmail,cConfirm,cId,fullDate,dateEN,dateFA,cTime) VALUES ('$newsId','$cUser','$cBody','$cWebPage','$cEmail','$cReallEmail','$cConfirm','$cId','$fullDate','$dateEN','$dateFA','$cTime')";


//$query="INSERT INTO photo VALUES ('$id', '$group','$serie','$photoName', '$newFile', '$place','$date','$camera','$lens','$focus','$iso','$other') ";
$result=$con->queryRun($query);
if($result){
	echo '
	<table border="0" cellpadding="0" cellspacing="0" align="center">
<tr><td align="center">
<br /><br /><a style="color:#393; font-family:Tahoma, Geneva, sans-serif; font-size:18px">نظر شما ثبت شد و پس از تایید مدیر نمایش داده میشود</a><br /><br /><br /><a style="color:#69C; font-family:Tahoma, Geneva, sans-serif; font-size:14px">شما به صورت خودکار به صفحه اول منتقل میشوید</a>
</td></tr>
</table>';
}else{
	echo '<table border="0" cellpadding="0" cellspacing="0" align="center">
<tr><td align="center">
<br /><br /><a style="color:#F30; font-family:Tahoma, Geneva, sans-serif; font-size:18px">متاسفانه مشکلی در ثبت نظر شما پیش آمده . لطفا بعدا امتحان کنید</a><br /><br /><br /><a style="color:#69C; font-family:Tahoma, Geneva, sans-serif; font-size:14px">شما به صورت خودکار به صفحه اول منتقل میشوید</a>
</td></tr>
</table>';
}
?>
<script type="text/javascript" language="javascript">
<!--
window.location = "index.php"
//-->
</script>
</body>
</html>
