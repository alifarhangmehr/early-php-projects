<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body dir="rtl">
<?php 
require('class/connection.php');
$connector=new connection();
$query="SELECT * FROM brands";
$result=$connector->queryRun($query);	 	 	 	
while($row = mysql_fetch_array($result))
	{
		$brandId=$row['brandId'];
		$connector1=new connection();
		$query1="SELECT * FROM groups WHERE brandId='$brandId'";
		$result1=$connector1->queryRun($query1);
		echo '<br />'.$row['brandName'];
		while($row1 = mysql_fetch_array($result1))
			echo '~>'.$row1['groupName'];
	}
?>
</body>
</html>