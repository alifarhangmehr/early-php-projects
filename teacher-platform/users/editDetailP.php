<?php
session_start();
if(!isset($_SESSION['validUser'])) exit;
$user=$_SESSION['validUser'];
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
//header ('Content-Type: text/plain; charset=utf-8');
//if(!($_SESSION['allowRegister'])){exit;}
require_once("../class/connect.php");
require('../includes/shamsiDate.php');
$connector=new connect();
if(!$connector->dbConnect()) echo 'error 1';



$id= $_POST['id'];
$name= $_POST['name'];
$family= $_POST['family'];
$pName= $_POST['pName'];
$pFamily= $_POST['pFamily'];
$father= $_POST['father'];
$country= $_POST['country'];
$state= $_POST['state'];
$city= $_POST['city'];
$email= $_POST['email'];
$website= $_POST['website'];
$nationalCode= $_POST['nationalCode'];
$gender= $_POST['gender'];
$single= $_POST['single'];
$birthday= $_POST['birthday'];
$birthPlace= $_POST['birthPlace'];
$education= $_POST['education'];
$interest= $_POST['interest'];
$brief= $_POST['brief'];
$mobile1= $_POST['mobile1'];
$mobile2= $_POST['mobile2'];
$telephone= $_POST['telephone'];
$homeAddress= $_POST['homeAddress'];
$workAddress= $_POST['workAddress'];
$homePage= $_POST['homePage'];
$image =$_FILES["file"]["name"];

if($image){
	
	
	
	
		
//-------------------------------------------------------------- Start save image ------------------------------------------ 
//$image =$_POST['image'];

	  //$usernameforsql=$HTTP_SESSION_VARS['validUser'];
//echo "<html version=\"1.0\" encoding=\"utf-8\"?".">"; 
echo $_FILES["file"]["type"];
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
  //  echo "userImage: " . $_FILES["file"]["name"] . "<br />";
   // echo "Type: " . $_FILES["file"]["type"] . "<br />";
   // echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
   // echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";    
	if (file_exists("../userImage/" . $_FILES["file"]["name"]))
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
	  
	  $temp[0]=$id;
	  
	  //$name=$temp[0];
	  $extension= $temp[1];
	  
	  
	  
	  $temp=implode('.',$temp);
	//  echo "renamed : ".$temp.'<br>';
	  // end of rename file
	  $sorceFile=$_FILES["file"]["tmp_name"];
      move_uploaded_file($_FILES["file"]["tmp_name"],"../userImage/" . $temp);
	  $file1='../userImage/' . $temp;
	  $file2='../userImage/source' . $temp;
	  copy($file1,$file2);
	  $photo1="../userImage/thumb".$temp;
	  $photoSource="../userImage/source".$temp;
	//  echo "تصویر ذخیره شد در : " . "c:/../userImage/" . $temp;
	  
	  
	  
	   
	   //---- make thumbnail -----  php.ini=extension:extension=php_gd.dll

	   
	  $oSourceImage="../userImage/".$temp;
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
	unlink ("../userImage/".$temp);
	ob_end_clean(); // Dump the stdout so it does not screw other output.
 
	  
	   //----end of make thumbnail ----- 
	   
	   
	   //  save thumb in hdd error : move_userImageed_file($sBinaryThumbnail,"../userImage/" . $name."thumb".$extension);
	   
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';   
	   
	   // ----------  SHOW THUMBNAIL -------
	   
	   // act as a jpg file to browser 
	  //header('Content-type: image/jpeg'); 
	   //  save thumbnail
	   imagejpeg($oDestinationImage,'../userImage/'.thumb.$temp,80); 
	  //echo imagejpeg($oDestinationImage,'',100);
	   
	   
	   $thumbimage='../userImage/'.thumb.$temp;
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
//echo 'file input value: '.$image.'<br />';

/*IF($image){
	echo '<br />image  selected<br />';
}else{
	echo '<br />image dose not selected<br />';
	echo '<br />'.$photo1.'<br />';
	echo '<br />'.$photoSource.'<br />';
	
	
}
exit;
*/


//---- extra input
if($image){
$query="UPDATE users SET name='$name', family='$family', pName='$pName', pFamily='$pFamily', father='$father', country='$country', state='$state', city='$city', email='$email', website='$website', nationalCode='$nationalCode', gender='$gender', single='$single', gender='$gender', birthday='$birthday', birthPlace='$birthPlace', education='$education', interest='$interest', brief='$brief', mobile1='$mobile1', mobile2='$mobile2', telephone='$telephone', homeAddress='$homeAddress', workAddress='$workAddress', photo1='$photo1', photoSource='$photoSource', homePage='$homePage' WHERE user = '$user' "; 
}else{
$query="UPDATE users SET name='$name', family='$family', pName='$pName', pFamily='$pFamily', father='$father', country='$country', state='$state', city='$city', email='$email', website='$website', nationalCode='$nationalCode', gender='$gender', single='$single', gender='$gender', birthday='$birthday', birthPlace='$birthPlace', education='$education', interest='$interest', brief='$brief', mobile1='$mobile1', mobile2='$mobile2', telephone='$telephone', homeAddress='$homeAddress', workAddress='$workAddress', homePage='$homePage' WHERE user = '$user' "; 
}



$result=$connector->queryRun($query);;
if($result){
	echo '<br><br><br><br><br><div align=center><a style="font-family:Tahoma, Geneva, sans-serif; color:green" dir="rtl">'.$pName.' تغییرات با موفقیت ذخیره شد</font><br><br><br><br><a href="board.php" style="font-family:Tahoma, Geneva, sans-serif">بازگشت به صفحه اصلی</a></div>';
}else{
	echo '<br><br><br><br><br><div align=center style="font-family:Tahoma, Geneva, sans-serif">اشکال در ثبت اطلاعات</div>';
}


//ob_flush();
?>



</body>
</html>