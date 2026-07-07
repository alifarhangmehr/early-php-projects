<?php
session_start();
if(!isset($_SESSION['validAdmin'])) exit;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../themes/default/css/index.css"/>

<title>Untitled Document</title>
</head>

<body>

<?php
require('../class/connection.php');
require('../class/shamsiDate.php');

$patientId=$_POST['patientId'];
$patientCode=$_POST['patientCode'];
$name=$_POST['name'];
$family=$_POST['family'];
$father=$_POST['father'];
$birthday=$_POST['birthday'];
$birthplace=$_POST['birthplace'];
$melliCode=$_POST['melliCode'];
$shenasNo=$_POST['shenasNo'];
$shenasSerial=$_POST['shenasSerial'];
$shenasSodur=$_POST['shenasSodur'];
$disabilityCode=$_POST['disabilityCode'];
$disabilityType=$_POST['disabilityType'];
$disabilityStartDate=$_POST['disabilityStartDate'];
$caseNumber=$_POST['caseNumber'];
$homeAdress1=$_POST['homeAdress1'];
$homeAdress2=$_POST['homeAdress2'];
$postalCode=$_POST['postalCode'];
$tel1=$_POST['tel1'];
$tel2=$_POST['tel2'];
$mobile1=$_POST['mobile1'];
$mobile2=$_POST['mobile2'];
$behavioralStatus=$_POST['behavioralStatus'];
$educationalStatus=$_POST['educationalStatus'];
$actionsTaken=$_POST['actionsTaken'];
$economicSituation=$_POST['economicSituation'];
$statusOfHomeVisits=$_POST['statusOfHomeVisits'];
$comments1=$_POST['comments1'];
$comments2=$_POST['comments2'];
$comments3=$_POST['comments3']; 
$image =$_FILES["file"]["name"];
IF($image){
	
	
	
	
		
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
  //  echo "Upload: " . $_FILES["file"]["name"] . "<br />";
   // echo "Type: " . $_FILES["file"]["type"] . "<br />";
   // echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
   // echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";    
	if (file_exists("../upload/" . $_FILES["file"]["name"]))
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
	  
	  $temp[0]=$patientId;
	  
	  //$name=$temp[0];
	  $extension= $temp[1];
	  
	  
	  
	  $temp=implode('.',$temp);
	//  echo "renamed : ".$temp.'<br>';
	  // end of rename file
	  $sorceFile=$_FILES["file"]["tmp_name"];
      move_uploaded_file($_FILES["file"]["tmp_name"],"../upload/" . $temp);
	  $file1='../upload/' . $temp;
	  $file2='../upload/source' . $temp;
	  copy($file1,$file2);
	  $photo1="../upload/thumb".$temp;
	  $photoSource="../upload/source".$temp;
	//  echo "تصویر ذخیره شد در : " . "c:/../upload/" . $temp;
	  
	  
	  
	   
	   //---- make thumbnail -----  php.ini=extension:extension=php_gd.dll

	   
	  $oSourceImage="../upload/".$temp;
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
	unlink ("../upload/".$temp);
	ob_end_clean(); // Dump the stdout so it does not screw other output.
 
	  
	   //----end of make thumbnail ----- 
	   
	   
	   //  save thumb in hdd error : move_uploaded_file($sBinaryThumbnail,"../upload/" . $name."thumb".$extension);
	   
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';   
	   
	   // ----------  SHOW THUMBNAIL -------
	   
	   // act as a jpg file to browser 
	  //header('Content-type: image/jpeg'); 
	   //  save thumbnail
	   imagejpeg($oDestinationImage,'../upload/'.thumb.$temp,80); 
	  //echo imagejpeg($oDestinationImage,'',100);
	   
	   
	   $thumbimage='../upload/'.thumb.$temp;
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
	



  
  
  
  
  
  
  
$connector=new connection();
if(!$connector->dbConnect()) echo 'error 1';
if($image==''){
$query="UPDATE patient SET patientCode='$patientCode', name='$name', family='$family', father='$father', birthday='$birthday', birthplace='$birthplace', melliCode='$melliCode', shenasNo='$shenasNo', shenasSerial='$shenasSerial', shenasSodur='$shenasSodur', disabilityCode='$disabilityCode', disabilityType='$disabilityType', disabilityStartDate='$disabilityStartDate', caseNumber='$caseNumber', homeAdress1='$homeAdress1', homeAdress2='$homeAdress2', postalCode='$postalCode', tel1='$tel1', tel2='$tel2', mobile1='$mobile1', mobile2='$mobile2', behavioralStatus='$behavioralStatus', educationalStatus='$educationalStatus', actionsTaken='$actionsTaken', economicSituation='$economicSituation', statusOfHomeVisits='$statusOfHomeVisits', comments1='$comments1', comments2='$comments2', comments3='$comments3' WHERE patientId='$patientId'";
}else{
$query="UPDATE patient SET patientCode='$patientCode', name='$name', family='$family', father='$father', birthday='$birthday', birthplace='$birthplace', melliCode='$melliCode', shenasNo='$shenasNo', shenasSerial='$shenasSerial', shenasSodur='$shenasSodur', disabilityCode='$disabilityCode', disabilityType='$disabilityType', disabilityStartDate='$disabilityStartDate', caseNumber='$caseNumber', homeAdress1='$homeAdress1', homeAdress2='$homeAdress2', postalCode='$postalCode', tel1='$tel1', tel2='$tel2', mobile1='$mobile1', mobile2='$mobile2', photo1='$photo1', photoSource='$photoSource', behavioralStatus='$behavioralStatus', educationalStatus='$educationalStatus', actionsTaken='$actionsTaken', economicSituation='$economicSituation', statusOfHomeVisits='$statusOfHomeVisits', comments1='$comments1', comments2='$comments2', comments3='$comments3' WHERE patientId='$patientId'";
}




$result=$connector->queryRun($query);

	
	
	
	

	 
	 
	 
 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	

?>
<script type="text/javascript" language="javascript">
<!--
window.location = "showPatient.php"
//-->
</script>
</body>
</html>