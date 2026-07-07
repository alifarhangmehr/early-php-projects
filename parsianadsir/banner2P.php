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



$image5 =$_FILES["image5"]["name"];
$image6 =$_FILES["image6"]["name"];
$image7 =$_FILES["image7"]["name"];
$image8 =$_FILES["image8"]["name"];



if($image5){
if (($_FILES["image5"]["type"] == "image/jpeg")
|| ($_FILES["image5"]["type"] == "image/pjpeg")
|| ($_FILES["image5"]["type"] == "image/jpg")
&& ($_FILES["image5"]["size"] < 1000000) )
  { 
  
  if ($_FILES["image5"]["error"] > 0)
    {
    }
  else
    {
  
	if (file_exists("banner/1/" . $_FILES["image5"]["name"]))
      {
		  }
    else
      {
	  $temp=explode('.',$_FILES["image5"]["name"]);
	  $temp[0]='5';
	  $extension= $temp[1];
	  $temp=implode('.',$temp);
	  $sorceFile=$_FILES["image5"]["tmp_name"];
      move_uploaded_file($_FILES["image5"]["tmp_name"],"banner/1/" . $temp);
	  $file1='banner/1/' . $temp;
	  $file2='banner/1/source' . $temp;
	  copy($file1,$file2);
	  $image5="banner/1/source".$temp;
	  $connector=new connection();
	  $query="UPDATE `parsianads`.`banner` SET `image5` = '$image5' WHERE `banner`.`bannerId` =1;";
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


if($image6){
if (($_FILES["image6"]["type"] == "image/jpeg")
|| ($_FILES["image6"]["type"] == "image/pjpeg")
|| ($_FILES["image6"]["type"] == "image/jpg")
&& ($_FILES["image6"]["size"] < 1000000) )
  { 
  
  if ($_FILES["image6"]["error"] > 0)
    {
    }
  else
    {
  
	if (file_exists("banner/1/" . $_FILES["image6"]["name"]))
      {
		  }
    else
      {
	  $temp=explode('.',$_FILES["image6"]["name"]);
	  $temp[0]='6';
	  $extension= $temp[1];
	  $temp=implode('.',$temp);
	  $sorceFile=$_FILES["image6"]["tmp_name"];
      move_uploaded_file($_FILES["image6"]["tmp_name"],"banner/1/" . $temp);
	  $file1='banner/1/' . $temp;
	  $file2='banner/1/source' . $temp;
	  copy($file1,$file2);
	  $image6="banner/1/source".$temp;
	  $connector=new connection();
	  $query="UPDATE `parsianads`.`banner` SET `image6` = '$image6' WHERE `banner`.`bannerId` =1;";
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


if($image7){
if (($_FILES["image7"]["type"] == "image/jpeg")
|| ($_FILES["image7"]["type"] == "image/pjpeg")
|| ($_FILES["image7"]["type"] == "image/jpg")
&& ($_FILES["image7"]["size"] < 1000000) )
  { 
  
  if ($_FILES["image7"]["error"] > 0)
    {
    }
  else
    {
  
	if (file_exists("banner/1/" . $_FILES["image7"]["name"]))
      {
		  }
    else
      {
	  $temp=explode('.',$_FILES["image7"]["name"]);
	  $temp[0]='7';
	  $extension= $temp[1];
	  $temp=implode('.',$temp);
	  $sorceFile=$_FILES["image7"]["tmp_name"];
      move_uploaded_file($_FILES["image7"]["tmp_name"],"banner/1/" . $temp);
	  $file1='banner/1/' . $temp;
	  $file2='banner/1/source' . $temp;
	  copy($file1,$file2);
	  $image7="banner/1/source".$temp;
	  $connector=new connection();
	  $query="UPDATE `parsianads`.`banner` SET `image7` = '$image7' WHERE `banner`.`bannerId` =1;";
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


if($image8){
if (($_FILES["image8"]["type"] == "image/jpeg")
|| ($_FILES["image8"]["type"] == "image/pjpeg")
|| ($_FILES["image8"]["type"] == "image/jpg")
&& ($_FILES["image8"]["size"] < 1000000) )
  { 
  
  if ($_FILES["image8"]["error"] > 0)
    {
    }
  else
    {
  
	if (file_exists("banner/1/" . $_FILES["image8"]["name"]))
      {
		  }
    else
      {
	  $temp=explode('.',$_FILES["image8"]["name"]);
	  $temp[0]='8';
	  $extension= $temp[1];
	  $temp=implode('.',$temp);
	  $sorceFile=$_FILES["image8"]["tmp_name"];
      move_uploaded_file($_FILES["image8"]["tmp_name"],"banner/1/" . $temp);
	  $file1='banner/1/' . $temp;
	  $file2='banner/1/source' . $temp;
	  copy($file1,$file2);
	  $image8="banner/1/source".$temp;
	  $connector=new connection();
	  $query="UPDATE `parsianads`.`banner` SET `image8` = '$image8' WHERE `banner`.`bannerId` =1;";
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