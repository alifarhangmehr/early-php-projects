<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>نمایش کالاها</title>
<link rel="stylesheet" type="text/css" href="themes/default/css/index.css"/>
<script language="javascript" type="text/javascript" src="js/admin.js"></script>
</head>

<body>
<br />
<form method="post" action="showGood.php">
<table border="0" cellpadding="2" cellspacing="1" dir="rtl" align="center" width="200px" style="border:thin solid #090">
<tr><td align="center">
<img src="../themes/default/images/search.png" />
<br />
<input type="text" name="search" />
<br /><span style="color:#669900">بر اساس نام محصول</span>
</td></tr>
<tr><td align="center"><input type="submit" value="جستجو" /></td></tr>
<tr>
  <td align="center"><a href="addGood.php"><img src="themes/default/images/addIcon.png" align="middle" />محصول جدید</a></td></tr>
<tr><td align="center" style="background:#CCC"><span style="color:#FF9900">تعداد کل :</span>
<?php 
require('class/connection.php');
require('class/shamsiDate.php');
$connector0=new connection();
if($_POST['search']!='') {$search=$_POST['search']; $query0="SELECT * FROM goods WHERE goodName LIKE '%$search%'";}
else $query0="SELECT * FROM goods";
$result0=$connector0->queryRun($query0);
echo $goodsCount=mysql_num_rows($result0);
?></td></tr>

</table>
<br />
</form>
<table border="0" cellpadding="2" cellspacing="1" width="100%" dir="rtl" align="center" >
<tr align="center" height="40px" bgcolor="#0066FF" style="color:#DDDDDD; font-size:11px"> 
    <th>تصویر</th>
    <th>نام محصول</th>
    <th>برند</th>
    <th>گروه</th>
    <th>قیمت</th>
    <th>لینک خرید پستی</th>
    <th>تاریخ افزودن</th>
    <th>حذف</th>
    <th>ویرایش</th>
</tr>

<?php

$connector=new connection();
if($_POST['search']!='') {$search=$_POST['search']; $query="SELECT * FROM goods WHERE goodName LIKE '%$search%'";}
else $query="SELECT * FROM goods";
$result=$connector->queryRun($query);	 	 	 	
$counter=0;
while($row = mysql_fetch_array($result))
  {
	if($counter%2==0) $bgCondition='#DDDDDD'; else $bgCondition='#EEEEEE';
	$counter++;
	echo '<tr bgcolor="'.$bgCondition.'">' ;
	
	echo '<td><a href="'.$row['photoSource'].'"><img src="'.$row['photoThumb'].'" /></a></td>';
	echo '<td>'.$row['goodName'].'</td>';
	
	if($row['brand']=='1') $brandImage='<img src="themes/default/images/nokia.gif" />';
	if($row['brand']=='2') $brandImage='<img src="themes/default/images/lg.gif" />';
	if($row['brand']=='3') $brandImage='<img src="themes/default/images/huawei.gif" />';
	if($row['brand']=='4') $brandImage='<img src="themes/default/images/apple.gif" />';
	if($row['brand']=='5') $brandImage='<img src="themes/default/images/sony-ericsson.gif" />';
	if($row['brand']=='6') $brandImage='<img src="themes/default/images/htc.gif" />';
	if($row['brand']=='7') $brandImage='<img src="themes/default/images/samsung.gif" />';
	if($row['brand']=='8') $brandImage='<img src="themes/default/images/glx.gif" />';
	
	
	echo '<td align="center">'.$brandImage.'</td>';
	
	if($row['group']=='1') {$groupName='گوشی 2 سیم کارت'; $bgCondition2='#B7FFD3';}
	if($row['group']=='2') {$groupName='گوشی 4 سیم کارت'; $bgCondition2='#85FA9F';}
	if($row['group']=='3') {$groupName='گوشی طرح اصلی'; $bgCondition2='#EA9A6A';}
	if($row['group']=='4') {$groupName='بلوتوث هندسفری'; $bgCondition2='FF7171';}
	
	
	echo '<td>'.$groupName.'</td>';
	echo '<td>'.$row['price'].'</td>';
	echo '<td>'.$row['purchaseLink'].'</td>';
	$date=str_split($row['date']);
	echo '<td align=center >'.$date=$date[0].$date[1].$date[2].$date[3].'/'.$date[4].$date[5].'/'.$date[6].$date[7].' <span style="color:royalblue; font-weight:bold">'.$date[8].$date[9].':'.$date[10].$date[11].':'.$date[12].$date[13].'</span></td>';
	
	

	echo '<td align=center>
	<img src="themes/default/images/removeIcon0.png" onclick="showDeleteDiv(\''.$row['goodId'].'\')" style="border:hidden; cursor:pointer" /></td>';
	echo'<td align="center"><form method="post" action="editGood.php"><input type="hidden" name="goodId" id="goodId" value="'.$row['goodId'].'" /><input type="image" src="themes/default/images/magnifierIcon.png"style="border:hidden" /></td></form></td>';
	

 	 

	echo '</tr>';
  }
?>
<div id="outerDeleteDiv">
<div id="deleteDiv" align="center">
<br /><br />
آیا مطمئن هستید ؟

<br /><br />
<form method="post" action="deleteGood.php">
<input type="submit" value="بله" style="color:#F00" />
<input type="hidden" id="hiddenDeleteId" name="hiddenDeleteId" />
 &nbsp;&nbsp;&nbsp;&nbsp; 
<input type="button" value="انصراف" onclick="hideDeleteDiv()" />
</form>
<br /><br />
</div>
</div>
</table>
</body>
</html>