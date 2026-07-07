<?php
session_start();
if(!isset($_SESSION['validAdmin'])) exit;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../themes/default/css/admin.css">

<title>Untitled Document</title>


</head>

<body>

<?php
require('../class/connect.php');
require('../includes/shamsiDate.php');

$name=$_POST['name'];
$con=new connect();
$con-> dbConnect();
$query = "(SELECT * FROM users WHERE name='$name')";
$result=$con->queryRun($query);
$num = mysql_num_rows($result);
if($num>0){
	echo '
	<table border="0" cellpadding="5" cellspacing="0" id="searchUserTable">
<tr>    
	<th style="color:#CC0000">نام</th>
	<th style="color:#CC0000">فامیل</th>
	<th style="color:#CC0000">ایمیل</th>
	<th style="color:#CC0000">سطح دسترسی</th>
	<th style="color:#CC0000">لقب</th>
    <th style="color:#CC0000">تاریخ ثبت نام</th>
    <th style="color:#CC0000">اطلاعات کامل</th>
</tr>
	';
while($row = mysql_fetch_array($result))
  {
	if(($inPageId%2)!=0){
		$bgColor='bgcolor="#666666"';
	}else{
		$bgColor='';
	}
	$inPageId++;
	echo '<tr '.$bgColor.'>' ;
	echo '<td align=center id=nameTd'.$row['email'].'>'.$row['name'].'</td>';
	echo '<td align=center id=familyTd'.$row['email'].'>'.$row['family'].'</td>';
	echo '<td align=center id=emailTd'.$row['email'].'>'.$row['email'].'</td>';
	echo '<td align=center id=accessLevelTd'.$row['email'].'>'.$row['accessLevel'].'</td>';
	echo '<td align=center id=titleTd'.$row['email'].'>'.$row['title'].'</td>';
	echo '<td align=center id=dateFATd'.$row['email'].'>'.$row['dateFA'].'</td>';
	echo '<td align=center id=moreUserInfoTd'.$row['email'].'><a href=showUsersDetails.php?email='.$row['email'].'>+</td></tr>';
	
	
	
	
  }
echo '</table>';
}else{
	echo '<a style="color:#F60; font-size:14px;">هیچ مورد مشابه ای پیدا نشد</a>';	
	
}





?>
	




















</body>
</html>
