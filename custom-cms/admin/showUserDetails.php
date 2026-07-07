<?php
session_start();
if(!isset($_SESSION['validAdmin'])) exit;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../themes/default/css/admin.css">
</head>
<body>
<form method="post" action="userDetailsP.php">
<table border="0" cellpadding="0" cellspacing="0" align="center">
<?php
include('../class/connect.php');

$con=new connect();
$con-> dbConnect();
if($con){
	
}else{
	echo 'error0';
}
$email=$_GET['email'];
echo 'email : '.$email;
$query = "SELECT * from users where email='$email'";
$result=$con->queryRun($query);
if($result){
	
}else{
	echo 'error1';
}
$num=mysql_num_rows($result);
    for($i=0;$i<$num;$i++){
        $row = mysql_fetch_array($result);
        echo '<tr><td>نام</td>';
		echo '<td><input type="text" name="name" id="name" value="'.$row['name'].'" /></td></tr>';
		echo '<tr><td>فامیل</td>';
		echo '<td><input type="text" name="family" id="family" value="'.$row['family'].'" /></td></tr>';
		echo '<tr><td>سن</td>';
		echo '<td><input type="text" name="age" id="age" value="'.$row['age'].'" /></td></tr>';
		echo '<tr><td>ایمیل</td>';
		echo '<td><input type="text" name="email" id="email" value="'.$row['email'].'" /></td></tr>';
		echo '<tr><td>سایت</td>';
		echo '<td><input type="text" name="webPage" id="webPage" value="'.$row['webPage'].'" /></td></tr>';
		echo '<tr><td>توضیحات</td>';
		echo '<td><textarea name="note" id="note">'.$row['note'].'</textarea></td></tr>';
		echo '<tr><td>تعداد ارسال ها&nbsp;</td>';
		echo '<td><input type="text" name="sentNumber" id="sentNumber" value="'.$row['sentNumber'].'" /></td></tr>';
		echo '<input type="hidden" name="hideUsersDetailsId" id="hideUsersDetailsId" value="'.$row['email'].'"></div>';


	}

    ?> 
    <tr><td colspan="2" align="center"><br /><input type="submit" value="تغییر" id="changeUsersDetaisBut" /></td></tr>
</table>
</form>
</body>
</html>
