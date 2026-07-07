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

<title>مدیریت بنرها</title>
</head>

<body>
<?php
require("class/connection.php");



$image9 =$_FILES["image9"]["name"];
$image10 =$_FILES["image10"]["name"];



if($image9){
if (($_FILES["image9"]["type"] == "image/jpeg")
|| ($_FILES["image9"]["type"] == "image/pjpeg")
|| ($_FILES["image9"]["type"] == "image/jpg")
&& ($_FILES["image9"]["size"] < 1000000) )
  { 
  
  if ($_FILES["image9"]["error"] > 0)
    {
    }
  else
    {
  
	if (file_exists("banner/1/" . $_FILES["image9"]["name"]))
      {
		  }
    else
      {
	  $temp=explode('.',$_FILES["image9"]["name"]);
	  $temp[0]='9';
	  $extension= $temp[1];
	  $temp=implode('.',$temp);
	  $sorceFile=$_FILES["image9"]["tmp_name"];
      move_uploaded_file($_FILES["image9"]["tmp_name"],"banner/1/" . $temp);
	  $file1='banner/1/' . $temp;
	  $file2='banner/1/source' . $temp;
	  copy($file1,$file2);
	  $image9="banner/1/source".$temp;
	  $connector=new connection();
	  $query="UPDATE `parsianads`.`banner` SET `image9` = '$image9' WHERE `banner`.`bannerId` =1;";
	  $result=$connector->queryRun($query);

      }
    }  
  }
else
  {
  echo '<p align=center dir=rtl style="font-family:tahoma">فرمت قابل قبول (jpg ) - حداکثر حجم 100KB</p>';
  exit();
  }  
  
}


if($image10){
if (($_FILES["image10"]["type"] == "image/jpeg")
|| ($_FILES["image10"]["type"] == "image/pjpeg")
|| ($_FILES["image10"]["type"] == "image/jpg")
&& ($_FILES["image10"]["size"] < 1000000) )
  { 
  
  if ($_FILES["image10"]["error"] > 0)
    {
    }
  else
    {
  
	if (file_exists("banner/1/" . $_FILES["image10"]["name"]))
      {
		  }
    else
      {
	  $temp=explode('.',$_FILES["image10"]["name"]);
	  $temp[0]='10';
	  $extension= $temp[1];
	  $temp=implode('.',$temp);
	  $sorceFile=$_FILES["image10"]["tmp_name"];
      move_uploaded_file($_FILES["image10"]["tmp_name"],"banner/1/" . $temp);
	  $file1='banner/1/' . $temp;
	  $file2='banner/1/source' . $temp;
	  copy($file1,$file2);
	  $image10="banner/1/source".$temp;
	  $connector=new connection();
	  $query="UPDATE `parsianads`.`banner` SET `image10` = '$image10' WHERE `banner`.`bannerId` =1;";
	  $result=$connector->queryRun($query);

      }
    }  
  }
else
  {
  echo '<p align=center dir=rtl style="font-family:tahoma">فرمت قابل قبول (jpg ) - حداکثر حجم 100KB</p>';
  exit();
  }  
  
}




?>
<p align="center"><a href="adminIndex0.php">بازگشت به صفحه مدیریت</a></p>
</body>
</html>