<?php
//session_start();
//error_reporting(0);
//include('../settings/config.php');


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../themes/default/css/index.css"/>
<title>ثبت قیف</title>
</head>

<body>


<?php
//error_reporting(0); //flag

require('../class/connect.php');

$serial=$_POST['serial1'].$_POST['serial2'].$_POST['serial3'].$_POST['serial4'];
$connector=new connect();
$query="SELECT userId FROM `serial` WHERE serialNo='$serial'";
$result=$connector->queryRun($query);
$row = mysql_fetch_array($result);
if (mysql_num_rows($result)<=0){
	echo '<p align="center">سریال وارد شده نا معتبر می باشد</p>';
	exit;
}else{

if($row['userId']!='0'){
	echo '<p align="center">سریال وارد شده قبلا ثبت شده است</p>';
	exit;
}
}

$connector=new connect();

$query="SELECT MAX(ghifUserId) FROM `ghifUsers`";
$result=$connector->queryRun($query);
$row = mysql_fetch_array($result);
$ghifUserId=$row['MAX(ghifUserId)']+1;

$companyName=$_POST['companyName'];
$whatToDo=$_POST['whatToDo'];
//$logoImage=$_POST['logoImage'];
$address1=$_POST['address1'];
$address2=$_POST['address2'];
$tel1=$_POST['tel1'];
$tel2=$_POST['tel2'];
$mob1=$_POST['mob1'];
$mob2=$_POST['mob2'];
$sms1=$_POST['sms1'];
$sms2=$_POST['sms2'];
$fax1=$_POST['fax1'];
$fax2=$_POST['fax2'];
$site1=$_POST['site1'];
$site2=$_POST['site2'];
$email1=$_POST['email1'];
$email2=$_POST['email2'];


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
	if (file_exists("ghifUserImages/" . $_FILES["file"]["name"]))
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
	  
	  $temp[0]=$ghifUserId;
	  
	  //$name=$temp[0];
	  $extension= $temp[1];
	  
	  
	  
	  $temp=implode('.',$temp);
	//  echo "renamed : ".$temp.'<br>';
	  // end of rename file
	  $sorceFile=$_FILES["file"]["tmp_name"];
      move_uploaded_file($_FILES["file"]["tmp_name"],"ghifUserImages/" . $temp);
	  $file1='ghifUserImages/' . $temp;
	  $file2='ghifUserImages/source' . $temp;
	  copy($file1,$file2);
	  $photoThumb="ghifUserImages/thumb".$temp;
	  $photoSource="ghifUserImages/source".$temp;
	//  echo "تصویر ذخیره شد در : " . "c:/../upload/" . $temp;
	  
	  
	  
	   
	   //---- make thumbnail -----  php.ini=extension:extension=php_gd.dll

	   
	  $oSourceImage="ghifUserImages/".$temp;
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
	unlink ("ghifUserImages/".$temp);
	ob_end_clean(); // Dump the stdout so it does not screw other output.
 
	  
	   //----end of make thumbnail ----- 
	   
	   
	   //  save thumb in hdd error : move_uploaded_file($sBinaryThumbnail,"../upload/" . $name."thumb".$extension);
	   
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';   
	   
	   // ----------  SHOW THUMBNAIL -------
	   
	   // act as a jpg file to browser 
	  //header('Content-type: image/jpeg'); 
	   //  save thumbnail
	   imagejpeg($oDestinationImage,'ghifUserImages/'.thumb.$temp,80); 
	  //echo imagejpeg($oDestinationImage,'',100);
	   
	   
	   $thumbimage='ghifUserImages/'.thumb.$temp;
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



$uuid=$_POST['uuid'];
$user=$_POST['user'];
$pass=$_POST['pass'];
//$activationCode=md5();
$hashUuid=$uuid.'ChelioSs';
$activationCode=hash('sha512', $hashUuid);


$logoImage='ghifUserImages/';
$connector=new connect();
$query="INSERT INTO `ghifUsers` (`ghifUserId`, `user`, `pass`, `companyName`, `whatToDo`, `logoImage`, `address1`, `address2`, `tel1`, `tel2`, `mob1`, `mob2`, `sms1`, `sms2`, `fax1`, `fax2`, `site1`, `site2`, `email1`, `email2`, `uuid`) VALUES ('$ghifUserId', '$user', '$pass', '$companyName', '$whatToDo', '$logoImage', '$address1', '$address2', '$tel1', '$tel2', '$mob1', '$mob2', '$sms1', '$sms2', '$fax1', '$fax2', '$site1', '$site2', '$email1', '$email2', '$uuid');";

$result=$connector->queryRun($query);



$connector1=new connect();
$query1="UPDATE `serial` SET `userId` = '$ghifUserId' WHERE `serial`.`serialNo` = '$serial'";

$result1=$connector1->queryRun($query1);

//echo $query;
if($result && $result1) echo '
<table width="400" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr>
    <td align="center">ثبت قیف با موفقیت انجام گردید</td>
  </tr>
  <tr>
    <td align="center" style="color:green" dir="rtl">
		کد فعالسازی : '.$activationCode.'
	</td>
  </tr>

</table>
';
else echo '

<table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="246">اشکال در ذخیره اطلاعات</td>
    <td width="48"><img src="themes/default/images/notOkIcon.png" width="48" height="48" /></td>
  </tr>
</table>
';




?>


</body>
</html>
