<?php
session_start();
if(!isset($_SESSION['validAdmin'])) exit;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>


</head>

<body>
<p>
<?php
require('../class/connect.php');
require('../includes/shamsiDate.php');





 
$id="";
$serial=date("Y").date("m").date("d").date("H").date("i").date("s");
$newSerial=date("YmdHis");
$newsId=date("Y").date("m").date("d").date("H").date("i").date("s");
$fullDate=date("YmdHis");
$lastDateModified=$fullDate;
//$dateEN=date("YmdHis");
$dateEN=date("Y").'/'.date("m").'/'.date("d");
$lastDateENModified=$dateEN;
//$dateFA=jdate("YmdHis");

$dateFA=jdate("Y").'/'.jdate("m").'/'.jdate("d");
$lastDateFAModified=$dateFA;

$newsTime=date("g").':'.date("i").':'.date("s");
$lastTimeModified=$newsTime;
$author =$_POST['author'];
$lastOneModified=$author;
$accessLevel =$_POST['accessLevel'];
$newsGroup=$_POST['newsGroup'];
$newsTitle=$_POST['newsTitle'];
$brief=$_POST['brief'];
$newsBody =$_POST['newsBody'];
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
	if (file_exists("../../stdBoardUpload/" . $_FILES["file"]["name"]))
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
	  
	  $temp[0]=$newSerial;
	  
	  $name=$temp[0];
	  $extension= $temp[1];
	  
	  
	  
	  $temp=implode('.',$temp);
	//  echo "renamed : ".$temp.'<br>';
	  // end of rename file
      move_uploaded_file($_FILES["file"]["tmp_name"],"../stdBoardUpload/" . $temp);
	  $image="../stdBoardUpload/thumb".$temp;
	//  echo "تصویر ذخیره شد در : " . "c:/../upload/" . $temp;
	  
	  
	  
	   
	   //---- make thumbnail -----  php.ini=extension:extension=php_gd.dll

	   
	  $oSourceImage="../stdBoardUpload/".$temp;
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
	unlink ("../stdBoardUpload/".$temp);

	
	
	
	
	
	
	
	
	
	
	
	
	ob_end_clean(); // Dump the stdout so it does not screw other output.
 
	  
	   //----end of make thumbnail ----- 
	   
	   
	   //  save thumb in hdd error : move_uploaded_file($sBinaryThumbnail,"../upload/" . $name."thumb".$extension);
	   
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';   
	   
	   // ----------  SHOW THUMBNAIL -------
	   
	   // act as a jpg file to browser 
	  //header('Content-type: image/jpeg'); 
	   //  save thumbnail
	   imagejpeg($oDestinationImage,'../stdBoardUpload/'.thumb.$temp,80); 
	  //echo imagejpeg($oDestinationImage,'',100);
	   
	   
	   $thumbimage='../stdBoardUpload/'.thumb.$temp;
	 echo '<br><br><br><br><br><div align="center"><img src="../stdBoardUpload/'.$thumbimage.'"  /></div><br>';
  
	   // ----------END OF  SHOW THUMBNAIL -------

	  
      }
    }  
  }
else
  {
  echo '<p align=center dir=rtl style="font-family:tahoma">فرمت قابل قبول (jpg ) - حداکثر حجم 100KB</p>';
  exit();
  }  
  
 
  
  
  
  
  




$con=new connect();
$con-> dbConnect();
if($con){
	echo 'yes';
	
}else{
	echo 'no';
}


$query = "INSERT INTO stdboard (id,newsId,fullDate,dateEN,dateFA,newsTime,newsGroup,author,accessLevel,newsTitle,brief,newsBody,lastDateModified,lastDateENModified,lastDateFAModified,lastTimeModified,lastOneModified,image) VALUES ('$id','$newsId','$fullDate','$dateEN','$dateFA','$newsTime','$newsGroup','$author','$accessLevel','$newsTitle','$brief','$newsBody','$lastDateModified','$lastDateENModified','$lastDateFAModified','$lastTimeModified','$lastOneModified','$image')";


//$query="INSERT INTO photo VALUES ('$id', '$group','$serie','$photoName', '$newFile', '$place','$date','$camera','$lens','$focus','$iso','$other') ";
$result=$con->queryRun($query);
if($result){
	echo 'added';
}else{
	echo 'not added';
}
echo $image ;
?>
</body>
</html>
