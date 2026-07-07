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
$id =$_POST['hiddenDeleteId'];
$con=new connection();
$con-> dbConnect();
$query = "DELETE FROM medicine WHERE medicineId='$id'";
$result=$con->queryRun($query);
?>
<script type="text/javascript" language="javascript">
<!--
window.location = "showMedicine.php"
//-->
</script>
</body>
</html>