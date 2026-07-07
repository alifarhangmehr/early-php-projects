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



$image1 =$_FILES["image1"]["name"];
$image2 =$_FILES["image2"]["name"];
$image3 =$_FILES["image3"]["name"];
$image4 =$_FILES["image4"]["name"];



if($image1){
if (($_FILES["image1"]["type"] == "image/jpeg")
|| ($_FILES["image1"]["type"] == "image/pjpeg")
|| ($_FILES["image1"]["type"] == "image/jpg")
&& ($_FILES["image1"]["size"] < 1000000) )
  { 
  
  if ($_FILES["image1"]["error"] > 0)
    {
    }
  else
    {
  
	if (file_exists("banner/1/" . $_FILES["image1"]["name"]))
      {
		  }
    else
      {
	  $temp=explode('.',$_FILES["image1"]["name"]);
	  $temp[0]='1';
	  $extension= $temp[1];
	  $temp=implode('.',$temp);
	  $sorceFile=$_FILES["image1"]["tmp_name"];
      move_uploaded_file($_FILES["image1"]["tmp_name"],"banner/1/" . $temp);
	  $file1='banner/1/' . $temp;
	  $file2='banner/1/source' . $temp;
	  copy($file1,$file2);
	  $image1="banner/1/source".$temp;
	  $connector=new connection();
	  $query="UPDATE `parsianads`.`banner` SET `image1` = '$image1' WHERE `banner`.`bannerId` =1;";
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


if($image2){
if (($_FILES["image2"]["type"] == "image/jpeg")
|| ($_FILES["image2"]["type"] == "image/pjpeg")
|| ($_FILES["image2"]["type"] == "image/jpg")
&& ($_FILES["image2"]["size"] < 1000000) )
  { 
  
  if ($_FILES["image2"]["error"] > 0)
    {
    }
  else
    {
  
	if (file_exists("banner/1/" . $_FILES["image2"]["name"]))
      {
		  }
    else
      {
	  $temp=explode('.',$_FILES["image2"]["name"]);
	  $temp[0]='2';
	  $extension= $temp[1];
	  $temp=implode('.',$temp);
	  $sorceFile=$_FILES["image2"]["tmp_name"];
      move_uploaded_file($_FILES["image2"]["tmp_name"],"banner/1/" . $temp);
	  $file1='banner/1/' . $temp;
	  $file2='banner/1/source' . $temp;
	  copy($file1,$file2);
	  $image2="banner/1/source".$temp;
	  $connector=new connection();
	  $query="UPDATE `parsianads`.`banner` SET `image2` = '$image2' WHERE `banner`.`bannerId` =1;";
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


if($image3){
if (($_FILES["image3"]["type"] == "image/jpeg")
|| ($_FILES["image3"]["type"] == "image/pjpeg")
|| ($_FILES["image3"]["type"] == "image/jpg")
&& ($_FILES["image3"]["size"] < 1000000) )
  { 
  
  if ($_FILES["image3"]["error"] > 0)
    {
    }
  else
    {
  
	if (file_exists("banner/1/" . $_FILES["image3"]["name"]))
      {
		  }
    else
      {
	  $temp=explode('.',$_FILES["image3"]["name"]);
	  $temp[0]='3';
	  $extension= $temp[1];
	  $temp=implode('.',$temp);
	  $sorceFile=$_FILES["image3"]["tmp_name"];
      move_uploaded_file($_FILES["image3"]["tmp_name"],"banner/1/" . $temp);
	  $file1='banner/1/' . $temp;
	  $file2='banner/1/source' . $temp;
	  copy($file1,$file2);
	  $image3="banner/1/source".$temp;
	  $connector=new connection();
	  $query="UPDATE `parsianads`.`banner` SET `image3` = '$image3' WHERE `banner`.`bannerId` =1;";
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


if($image4){
if (($_FILES["image4"]["type"] == "image/jpeg")
|| ($_FILES["image4"]["type"] == "image/pjpeg")
|| ($_FILES["image4"]["type"] == "image/jpg")
&& ($_FILES["image4"]["size"] < 1000000) )
  { 
  
  if ($_FILES["image4"]["error"] > 0)
    {
    }
  else
    {
  
	if (file_exists("banner/1/" . $_FILES["image4"]["name"]))
      {
		  }
    else
      {
	  $temp=explode('.',$_FILES["image4"]["name"]);
	  $temp[0]='4';
	  $extension= $temp[1];
	  $temp=implode('.',$temp);
	  $sorceFile=$_FILES["image4"]["tmp_name"];
      move_uploaded_file($_FILES["image4"]["tmp_name"],"banner/1/" . $temp);
	  $file1='banner/1/' . $temp;
	  $file2='banner/1/source' . $temp;
	  copy($file1,$file2);
	  $image4="banner/1/source".$temp;
	  $connector=new connection();
	  $query="UPDATE `parsianads`.`banner` SET `image4` = '$image4' WHERE `banner`.`bannerId` =1;";
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