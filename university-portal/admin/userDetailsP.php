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


$con=new connect();
$con-> dbConnect();


	$name=$_POST['name'];
	$family=$_POST['family'];
	$age=$_POST['age'];
	$email=$_POST['email'];
	$webPage=$_POST['webPage'];
	$note=$_POST['note'];
	$sentNumber=$_POST['sentNumber'];
	$id=$_POST['hideUsersDetailsId'];
	echo $id ;
	//echo $editId;
	$query = "UPDATE users SET name = '$name',family = '$family',age = '$age',email = '$email',webPage = '$webPage',note = '$note',sentNumber = '$sentNumber' WHERE email = '$id' ";


	$result=$con->queryRun($query);


























?>
<script type="text/javascript" language="javascript">
window.location = "showUserDetails.php?email=<?php echo $email ?>"

</script>











</body>
</html>