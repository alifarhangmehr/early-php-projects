<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>نمایش لینک ها</title>
<link rel="stylesheet" type="text/css" href="themes/default/css/index.css"/>
<script language="javascript" type="text/javascript" src="js/admin.js"></script>
</head>

<body>
<br />
<p align="center"><a href="addLink.php"><img src="themes/default/images/addIcon.png" align="middle" />لینک جدید</a></p>
<table border="0" cellpadding="2" cellspacing="1" width="100%" dir="rtl" align="center" >
<tr align="center" height="40px" bgcolor="#0066FF" style="color:#DDDDDD; font-size:11px"> 
    <th>نام لینک</th>
    <th>هدف لینک</th>
    <th>حذف</th>
    <th>ویرایش</th>
</tr>

<?php
require('class/connection.php');
$connector=new connection();
$query="SELECT * FROM links";
$result=$connector->queryRun($query);	 	 	 	
$counter=0;
while($row = mysql_fetch_array($result))
  {
	if($counter%2==0) $bgCondition='#DDDDDD'; else $bgCondition='#EEEEEE';
	$counter++;
	echo '<tr bgcolor="'.$bgCondition.'">' ;
	
	echo '<td>'.$row['linkName'].'</td>';
	echo '<td>'.$row['linkTarget'].'</td>';
	echo '<td align=center>
	<img src="themes/default/images/removeIcon0.png" onclick="showDeleteDiv(\''.$row['linkId'].'\')" style="border:hidden; cursor:pointer" /></td>';
	echo'<td align="center"><form method="post" action="editLink.php"><input type="hidden" name="linkId" id="linkId" value="'.$row['linkId'].'" /><input type="image" src="themes/default/images/magnifierIcon.png"style="border:hidden" /></td></form></td>';
	

 	 

	echo '</tr>';
  }
?>
<div id="outerDeleteDiv">
<div id="deleteDiv" align="center">
<br /><br />
آیا مطمئن هستید ؟

<br /><br />
<form method="post" action="deleteLink.php">
<input type="submit" value="بله" style="color:#F00" />
<input type="hidden" id="hiddenDeleteId" name="hiddenDeleteId" />
 &nbsp;&nbsp;&nbsp;&nbsp; 
<input type="button" value="انصراف" onclick="hideDeleteDiv()" />
</form>
<br /><br />
</div>
</div>
<span style="color:#FF7171"></span>
</table>
</body>
</html>