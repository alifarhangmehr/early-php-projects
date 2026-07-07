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
<link rel="stylesheet" type="text/css" href="../themes/default/css/index.css"/>
<link rel="stylesheet" type="text/css" href="themes/default/css/index.css"/>

<title>ویرایش کالا</title>
</head>

<body>


<?php
require('class/connection.php');
require('class/shamsiDate.php');

$goodId=$_POST['goodId'];
$group=$_POST['group'];
$goodName=$_POST['goodName'];
$brand=$_POST['brand'];
$purchaseLink=$_POST['purchaseLink'];
$price=$_POST['price'];
$comments=$_POST['comments'];
$photo =$_FILES["file"]["name"];


if($photo){
//-------------------------------------------------------------- Start save image ------------------------------------------ 
//$image =$_POST['image'];

	  //$usernameforsql=$HTTP_SESSION_VARS['validUser'];
//echo "<html version=\"1.0\" encoding=\"utf-8\"?".">"; 
//echo $_FILES["file"]["type"];
//echo '<br>';
 if (($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
&& ($_FILES["file"]["size"] < 1000000) )
  { 
  
  if ($_FILES["file"]["error"] > 0)
    {
   // echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
  //  echo "Upload: " . $_FILES["file"]["name"] . "<br />";
   // echo "Type: " . $_FILES["file"]["type"] . "<br />";
   // echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
   // echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";    
	if (file_exists("goodsImage/" . $_FILES["file"]["name"]))
      {
		  //echo "<br />1111111111".$_FILES['file']['name']."<br />";
   //   echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
	  //rename file
//	  echo "originalname".$_FILES["file"]["name"].'<br>';
	  $temp=explode('.',$_FILES["file"]["name"]);
	  
	  // ****************************************** replace with session name *******
	  
	  $temp[0]=$goodId;
	  
	  //$name=$temp[0];
	  $extension= $temp[1];
	  
	  
	  
	  $temp=implode('.',$temp);
	//  echo "renamed : ".$temp.'<br>';
	  // end of rename file
	  $sorceFile=$_FILES["file"]["tmp_name"];
      move_uploaded_file($_FILES["file"]["tmp_name"],"goodsImage/" . $temp);
	  $file1='goodsImage/' . $temp;
	  $file2='goodsImage/source' . $temp;
	  copy($file1,$file2);
	  $photoThumb="goodsImage/thumb".$temp;
	  $photoSource="goodsImage/source".$temp;
	//  echo "تصویر ذخیره شد در : " . "c:/../upload/" . $temp;
	  
	  
	  
	   
	   //---- make thumbnail -----  php.ini=extension:extension=php_gd.dll

	   
	  $oSourceImage="goodsImage/".$temp;
	 $oSourceImage=imagecreatefromjpeg($oSourceImage);
	  
	  
	$nWidth = imagesx($oSourceImage); // get original source image width
	$nHeight = imagesy($oSourceImage); // and height
    $nesbat=$nHeight/$nWidth;
	//if ($nesbat>=2 || $nesbat<=.5)  $nesbat=$nHeight/$nWidth;
	// create small thumbnail
	//$nDestinationWidth = 100;
	//$nDestinationHeight = 100*$nHeight/$nWidth;
	if($nWidth>=$nHeight){
	$nDestinationWidth=110;
	$nDestinationHeight=$nDestinationWidth*$nesbat;}
	else{
	$nDestinationWidth=80;
	$nDestinationHeight=$nDestinationWidth*$nesbat;}
	
	
$oDestinationImage = imagecreatetruecolor($nDestinationWidth, $nDestinationHeight);
//	$oDestinationImage = imagecreate($nDestinationWidth, $nDestinationHeight);

$oResult = imagecopyresampled(
	$oDestinationImage, $oSourceImage,
	0, 0, 0, 0,
	$nDestinationWidth, $nDestinationHeight,
	$nWidth, $nHeight); // resize the image

/*	imagecopyresized(
		$oDestinationImage, $oSourceImage,
		0, 0, 0, 0,
		$nDestinationWidth, $nDestinationHeight,
		$nWidth, $nHeight); // resize the image*/

	ob_start(); // Start capturing stdout.
	imagejpeg($oDestinationImage); // As though output to browser.
	$sBinaryThumbnail = ob_get_contents(); // the raw jpeg image data.
	
	


	
	
	
	
	//newst 
	unlink ("goodsImage/".$temp);
	ob_end_clean(); // Dump the stdout so it does not screw other output.
 
	  
	   //----end of make thumbnail ----- 
	   
	   
	   //  save thumb in hdd error : move_uploaded_file($sBinaryThumbnail,"../upload/" . $name."thumb".$extension);
	   
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';   
	   
	   // ----------  SHOW THUMBNAIL -------
	   
	   // act as a jpg file to browser 
	  //header('Content-type: image/jpeg'); 
	   //  save thumbnail
	   imagejpeg($oDestinationImage,'goodsImage/'.thumb.$temp,80); 
	  //echo imagejpeg($oDestinationImage,'',100);
	   
	   
	   $thumbimage='goodsImage/'.thumb.$temp;
	 echo '<br><br><br><br><br><div align="center"><img src="'.$thumbimage.'"  /></div><br>';
  
	   // ----------END OF  SHOW THUMBNAIL -------

	  
      }
    }  
  }
else
  {
  echo '<p align=center dir=rtl style="font-family:tahoma">فرمت قابل قبول (jpg ) - حداکثر حجم 100KB</p>';
  exit();
  }  
  
 //-------------------------------------------------------------- End save image ------------------------------------------ 
  
}
$connector=new connection();


if($photo!='')
$query="UPDATE `parsianads`.`goods` SET `goodId` = '$goodId',
`group` = '$group',
`goodName` = '$goodName',
`brand` = '$brand',
`purchaseLink` = '$purchaseLink',
`price` = '$price',
`comments` = '$comments',
`photoSource` = '$photoSource',
`photoThumb` = '$photoThumb' WHERE `goods`.`goodId` ='$goodId';";

else

$query="UPDATE `parsianads`.`goods` SET `goodId` = '$goodId',
`group` = '$group',
`goodName` = '$goodName',
`brand` = '$brand',
`purchaseLink` = '$purchaseLink',
`price` = '$price',
`comments` = '$comments'
 WHERE `goods`.`goodId` ='$goodId';";


$result=$connector->queryRun($query);


if($result) echo '
<table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="246">اطلاعات با موفقیت ذخیره شد</td>
    <td width="48"><img src="themes/default/images/okIcon.png" width="48" height="48" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><a href="showGood.php">بازگشت</a></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><a href="index.php">صفحه اصلی</a></td>
  </tr>
</table>
';
else echo '

<table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="246">اشکال در ذخیره اطلاعات</td>
    <td width="48"><img src="themes/default/images/notOkIcon.png" width="48" height="48" /></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><a href="showGood.php">بازگشت</a></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><a href="index.php">صفحه اصلی</a></td>
  </tr>
</table>
';



?>


</body>
</html>
