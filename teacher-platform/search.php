<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="themes/default/css/index.css"/>
<title>جستجوی اساتید</title>
<script language="javascript" type="text/javascript">
function changeColor(id){
	document.getElementById(id).style.background='#AAA';
	document.getElementById(id).style.color='#000';
	//document.getElementById(id).style.fontSize='14px';
	
}
function changeColorBack(id){
	document.getElementById(id).style.background='#333';
	document.getElementById(id).style.color='#FFF';
	//document.getElementById(id).style.fontSize='12px';
}
</script>
</head>

<body>
<?php
include('header.php');
require('class/connection.php');
$connector=new connection();
if($_GET['id']!=''){
	$id=$_GET['id'];
	$query= "SELECT * FROM teachers WHERE teacherId='$id'";
}else{
	$search=$_GET['search'];
	$query= "SELECT * FROM teachers WHERE concat_ws(' ',name,family) LIKE '%$search%'";	
}

$result=$connector->queryRun($query);
$i=0;
while($row= mysql_fetch_array($result)){
$i++;
echo '
<a href="" class="searchTeacher">
<table width="100%" border="0" dir="rtl" style="background:#333; color:#FFF" id="'.$i.'" onmouseover="changeColor('.$i.')" onmouseout="changeColorBack('.$i.')">
  <tr>
    <td rowspan="4" width="100px"><a href="images/teachers/source'.$row['teacherId'].'.jpg" style="border:hidden"><img src="images/teachers/thumb'.$row['teacherId'].'.jpg" border="0"/></a></td>
	<td>نام و نام خانوادگي : '.$row['name'].' '.$row['family'].' مرتبه علمي گروه آموزشي : '.$row['academic'].'</td>
    
  </tr>
  <tr>
    <td> آدرس پست الکترونیک : '.$row['email'].'</td>
  </tr>
  <tr>
    <td>وب سایت : '.$row['website'].'</td>
  </tr>
  <tr>
    <td>سوابق تحصيلي : <br />'.$row['educationalRecords'].'</td>
  </tr>
</table>
</a>
<br />';
}
?>
</body>
</html>