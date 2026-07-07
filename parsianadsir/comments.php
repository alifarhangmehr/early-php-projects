<?php
session_start();
if($_SESSION['allowEnterAdminArea']!=true){
	echo '
	<html><body>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="themes/default/css/index.css">
	<p align="center">ّبرای دسترسی به این قسمت باید از لینک زیر افدام نمایید</p>
	<p align="center">ّ<a href="adminLogin.php">ورود مدیر</a></p>
</body>
</html>
';
	exit;	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="themes/default/css/index.css"/>

<title>Untitled Document</title>
</head>

<body>
<table border="1" cellpadding="2" cellspacing="1" dir="rtl" align="center" >
<?php
$goodId=$_GET['goodId'];
require('class/connection.php');
require('class/shamsiDate.php');
$connector=new connection();
$query="SELECT * FROM goods WHERE goodId='$goodId'";
$result=$connector->queryRun($query);
$counter=1;	 	 	 	
echo '<tr>' ;
while($row = mysql_fetch_array($result))
  {
	if($row['brand']=='1') $brandImage='<img src="themes/default/images/nokia.gif" />';
	if($row['brand']=='2') $brandImage='<img src="themes/default/images/lg.gif" />';
	if($row['brand']=='3') $brandImage='<img src="themes/default/images/huawei.gif" />';
	if($row['brand']=='4') $brandImage='<img src="themes/default/images/apple.gif" />';
	if($row['brand']=='5') $brandImage='<img src="themes/default/images/sony-ericsson.gif" />';
	if($row['brand']=='6') $brandImage='<img src="themes/default/images/htc.gif" />';
	if($row['brand']=='7') $brandImage='<img src="themes/default/images/samsung.gif" />';
	if($row['brand']=='8') $brandImage='<img src="themes/default/images/glx.gif" />';
	echo '<td>
	<table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td colspan="2" align="center" style="background:#CCC; font-size:14px; font-weight:bold">'.$row['goodName'].'</td>
  </tr>
  <tr>
    <td width="400px" style="max-width:400px" colspan="2"><img src="'.$row['photoSource'].'" width="400px" style="max-width:400px"/></td>
  </tr>
  <tr>
  	<td>قیمت</td>
    <td>'.$row['price'].' تومان</td>
  </tr>
  <tr>
    <td>برند</td>
	<td>'.$brandImage.'</td>
  </tr>
  <tr>
    <td colspan="2">'.$row['comments'].'</td>
  </tr>
    <td colspan="2" align="center"><a href="'.$row['purchaseLink'].'">خرید پستی</a></td>
</table>
	</td>';
	if($counter%2==0) echo '</tr><tr>';
	$counter++;
  }
  
?>
</tr>
</table>
</body>
</html>