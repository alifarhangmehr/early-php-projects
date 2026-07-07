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



$employeeId=$_POST['employeeId'];
$name=$_POST['name'];
$family=$_POST['family'];
$father=$_POST['father'];
$birthday=$_POST['birthday'];
$sex=$_POST['sex'];
$marital=$_POST['marital'];
$education=$_POST['education'];
$course=$_POST['course'];
$melliCode=$_POST['melliCode'];
$shenasNo=$_POST['shenasNo'];
$shenasSerial=$_POST['shenasSerial'];
$shenasSodur=$_POST['shenasSodur'];
$postalCode=$_POST['postalCode'];
$birthplace=$_POST['birthplace'];
$emloymentDate=$_POST['emloymentDate'];
$address=$_POST['address'];
$tel=$_POST['tel'];
$mobile=$_POST['mobile'];
$bank=$_POST['bank'];
$bankBranch=$_POST['bankBranch'];
$bankAccount=$_POST['bankAccount'];
$email=$_POST['email'];
$job=$_POST['job'];
$military=$_POST['military'];
$image =$_FILES["file"]["name"];


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
	if (file_exists("../uploadEmp/" . $_FILES["file"]["name"]))
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
	  
	  $temp[0]=$employeeId;
	  
	  //$name=$temp[0];
	  $extension= $temp[1];
	  
	  
	  
	  $temp=implode('.',$temp);
	//  echo "renamed : ".$temp.'<br>';
	  // end of rename file
	  $sorceFile=$_FILES["file"]["tmp_name"];
      move_uploaded_file($_FILES["file"]["tmp_name"],"../uploadEmp/" . $temp);
	  $file1='../uploadEmp/' . $temp;
	  $file2='../uploadEmp/source' . $temp;
	  copy($file1,$file2);
	  $photo1="../uploadEmp/thumb".$temp;
	  $photoSource="../uploadEmp/source".$temp;
	//  echo "تصویر ذخیره شد در : " . "c:/../uploadEmp/" . $temp;
	  
	  
	  
	   
	   //---- make thumbnail -----  php.ini=extension:extension=php_gd.dll

	   
	  $oSourceImage="../uploadEmp/".$temp;
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
	unlink ("../uploadEmp/".$temp);
	ob_end_clean(); // Dump the stdout so it does not screw other output.
 
	  
	   //----end of make thumbnail ----- 
	   
	   
	   //  save thumb in hdd error : move_uploaded_file($sBinaryThumbnail,"../upload/" . $name."thumb".$extension);
	   
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';   
	   
	   // ----------  SHOW THUMBNAIL -------
	   
	   // act as a jpg file to browser 
	  //header('Content-type: image/jpeg'); 
	   //  save thumbnail
	   imagejpeg($oDestinationImage,'../uploadEmp/'.thumb.$temp,80); 
	  //echo imagejpeg($oDestinationImage,'',100);
	   
	   
	   $thumbimage='../uploadEmp/'.thumb.$temp;
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
if($image==''){
$query="UPDATE employee SET name='$name', family='$family', father='$father', birthday='$birthday', sex='$sex', marital='$marital', education='$education', course='$course', melliCode='$melliCode', shenasNo='$shenasNo', shenasSerial='$shenasSerial', shenasSodur='$shenasSodur', postalCode='$postalCode', birthplace='$birthplace', emloymentDate='$emloymentDate', address='$address', tel='$tel', mobile='$mobile', bank='$bank', bankBranch='$bankBranch', bankAccount='$bankAccount', email='$email', job='$job', military='$military' WHERE employeeId='$employeeId'";	
}else{
$query="UPDATE employee SET name='$name', family='$family', father='$father', birthday='$birthday', sex='$sex', marital='$marital', education='$education', course='$course', melliCode='$melliCode', shenasNo='$shenasNo', shenasSerial='$shenasSerial', shenasSodur='$shenasSodur', postalCode='$postalCode', birthplace='$birthplace', emloymentDate='$emloymentDate', address='$address', tel='$tel', mobile='$mobile', bank='$bank', bankBranch='$bankBranch', bankAccount='$bankAccount', email='$email', job='$job', military='$military', photo1='$photo1', photoSource='$photoSource' WHERE employeeId='$employeeId'";
}
$result=$connector->queryRun($query);	 
	 
	 
 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	

?>
<script type="text/javascript" language="javascript">
<!--
window.location = "showEmployee.php"
//-->
</script>
</body>
</html>