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
    require('../class/connect.php');
	require('../includes/shamsiDate.php');
	//$newSerial=date("YmdHis");
	$fullDate=date("YmdHis");
	//$dateEN=date("YmdHis");
	$dateEN=date("Y").'/'.date("m").'/'.date("d");
	//$dateFA=pdate("YmdHis");
	$dateFA=pdate("Y").'/'.pdate("m").'/'.pdate("d");
	$registerTime=date("g").':'.date("i").':'.date("s");
	$name=$_POST['name'];
    $pass=$_POST['pass'];
    $email=$_POST['email'];
	$accessLevel=0;
	$title="عضو جدید";
    $con=new connect();
	$con-> dbConnect();
	if($con){

		
	}else{
		echo '<p align="center" style="color:#F90; font-size:18px">متاسفانه مشکلی در سیستم بانک های اطلاعاتی به وجود آمده لطفا بعدا امتحان کنید</p>';
	}
	
	$query = "INSERT INTO users (name,pass,email,accessLevel,title,fullDate,dateEN,dateFA,registerTime) VALUES ('$name','$pass','$email','$accessLevel','$title','$fullDate','$dateEN','$dateFA','$registerTime')";

	$result=$con->queryRun($query);
	if($result){
		echo '<p align="center" style="color:#6C6; font-size:18px" dir="rtl">کاربر <a style="color:#F90">'.$name.'</a> با موفقیت ثبت شد</p>';
	}else{
		echo '<p align="center" style="color:#F90; font-size:18px">ایمیل تکراری است</p>';
	}
		
    
    
    
    
    
    
    
    
    
    
?>
</body>
</html>