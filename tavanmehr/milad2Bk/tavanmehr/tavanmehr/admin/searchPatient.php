<?php
session_start();
if(!isset($_SESSION['validAdmin'])) exit;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../themes/default/css/index.css"/>
<title>جستجوی مددجو</title>
</head>
<body>


<br /><br /><br /><br /><br />
<form method="post" action="searchPatientP.php">
<table align="center" border="0" cellpadding="0" cellspacing="0">
<tr><td align="center">
<br />
<input type="text" name="search" /><input type="submit" value="جستجو" />
<br /><br /><br />
</td></tr>
</table>
</form>

<br /><br /><br /><br /><br /><br /><br />


<?php
include("header.php");
?>

</body>
</html>
