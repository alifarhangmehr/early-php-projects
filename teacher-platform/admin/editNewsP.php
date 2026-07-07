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
<?php
include('../class/connect.php');


$operation=$_POST['operation'];
$image =$_FILES["file"]["name"];
$newsId=$_POST['newsId'];
$editId=$_POST['editId'];
$newsGroup=$_POST['newsGroup'];
$author=$_POST['author'];
$accessLevel=$_POST['accessLevel'];
$newsTitle=$_POST['newsTitle'];
//echo $operation;
//echo $image;
$con=new connect();
$con-> dbConnect();
//if(!$con) echo 'cant connect to DB';

	if($operation==1 && $image==''){
	//echo $editId;
	//echo 'id :'.$editId;
	$query = "UPDATE news SET newsGroup = '$newsGroup',author = '$author',accessLevel = '$accessLevel',newsTitle = '$newsTitle' WHERE id = '$editId' ";
	}else if($operation==1 && $image!=''){
	
	
	echo 'test';
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
	  
	  $temp[0]=$newsId;
	  
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
	  $photo1="upload/thumb".$temp;
	  $photoSource="upload/source".$temp;
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
  //exit();
  }  
  
 //-------------------------------------------------------------- End save image ------------------------------------------ 
  

	
	
}

	
	$query = "UPDATE news SET newsGroup = '$newsGroup',author = '$author',accessLevel = '$accessLevel',newsTitle = '$newsTitle',photo1 = '$photo1',photoSource = '$photoSource' WHERE id = '$editId' ";
	
	 	
	
	
	
	
	
	
	}else if($operation==2){
		$briefId=$_POST['briefId'];
		$brief=$_POST['editor1'];
		$query = "UPDATE news SET brief = '$brief' WHERE id = '$briefId' ";
	}else if($operation==3){
		$newsId=$_POST['newsId'];
		$newsBody=$_POST['editor2'];
		$query = "UPDATE news SET newsBody = '$newsBody' WHERE id = '$newsId' ";
	}
	
	$result=$con->queryRun($query);
	if(!$result) echo 'error';
	echo $query;
  //header('Location:http://www.yahoo.com/');
	/*
	if($operetion=="1"){
		echo 'kar kard';
	$newsGroup=$_POST['newsGroup'];
	$author=$_POST['author'];
	$accessLevel=$_POST['accessLevel'];
	$newsTitle=$_POST['newsTitle'];
	$query = "UPDATE news SET newsGroup = '$newsGroup',author = '$author',accessLevel = '$accessLevel',newsTitle = '$newsTitle' WHERE id = '$id' ";
	}else if($operetion=="2"){
	$brief=$_POST['editor1'];
	$query = "UPDATE news SET brief = '$brief' WHERE id = '$id' ";	
	}
	*/


?>
<script type="text/javascript" language="javascript">
<!--
window.location = "editNews.php"
//alert(<?php echo $newsId; ?>);
//-->
</script>




</body>
</html>