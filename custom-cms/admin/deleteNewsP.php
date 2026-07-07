<?php
session_start();
if(!isset($_SESSION['validAdmin'])) exit;
require('../class/connect.php');
require('../includes/shamsiDate.php');
$id =$_POST['deleteId'];
$con=new connect();
$con-> dbConnect();
$query = "DELETE FROM news WHERE id='$id'";
$result=$con->queryRun($query);
?>
<script type="text/javascript" language="javascript">
<!--
window.location = "deleteNews.php"
//-->
</script>

