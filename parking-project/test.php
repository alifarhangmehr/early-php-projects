<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
require_once("connection.php");
$connector=new connection();
$query="select * from parkposition";
$result=$connector->queryRun($query);
if($result) echo 'alert("ok")';

while($row=mysql_fetch_array($result)){
	echo $lat=$row['lat'];
	echo $lng=$row['lng'];

}
?>
</body>
</html>