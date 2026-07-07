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


$operation=$_POST['operation'];
$con=new connect();
$con-> dbConnect();
//if(!$con) echo 'cant connect to DB';

	if($operation==1){
	$editId=$_POST['editId'];
	$newsGroup=$_POST['newsGroup'];
	$author=$_POST['author'];
	$accessLevel=$_POST['accessLevel'];
	$newsTitle=$_POST['newsTitle'];
	//echo $editId;
	echo 'id :'.$editId;
	$query = "UPDATE news SET newsGroup = '$newsGroup',author = '$author',accessLevel = '$accessLevel',newsTitle = '$newsTitle' WHERE id = '$editId' ";
	}else if($operation==2){
		$briefId=$_POST['briefId'];
		$brief=$_POST['editor1'];
		$query = "UPDATE news SET brief = '$brief' WHERE id = '$briefId' ";
	}else if($operation==3){
		$newsId=$_POST['newsId'];
		$newsBody=$_POST['editor2'];
		$query = "UPDATE news SET newsBody = '$newsBody' WHERE id = '$newsId' ";
	}
	
	$result=$con->queryRun($query);
  //header('Location:http://www.yahoo.com/');
	/*
	if($operetion=="1"){
		echo 'kar kard';
	$newsGroup=$_POST['newsGroup'];
	$author=$_POST['author'];
	$accessLevel=$_POST['accessLevel'];
	$newsTitle=$_POST['newsTitle'];
	$query = "UPDATE news SET newsGroup = '$newsGroup',author = '$author',accessLevel = '$accessLevel',newsTitle = '$newsTitle' WHERE id = '$id' ";
	}else if($operetion=="2"){
	$brief=$_POST['editor1'];
	$query = "UPDATE news SET brief = '$brief' WHERE id = '$id' ";	
	}
	*/


?>
<script type="text/javascript" language="javascript">
<!--window.location = "editNews.php"

//-->
</script>




</body>
</html>