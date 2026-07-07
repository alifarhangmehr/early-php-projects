<?php
session_start();
if(!isset($_SESSION['validAdmin'])) exit;
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
//header ('Content-Type: text/plain; charset=utf-8');
//if(!($_SESSION['allowRegister'])){exit;}
require_once("../class/connect.php");
require('../includes/shamsiDate.php');
$connector=new connect();
if(!$connector->dbConnect()) echo 'error 1';
$id=date('YmdHis');
$studentNumber=$_POST['studentNumber'];
$user= $_POST['user'];
$pass= $_POST['pass'];
$groupName= $_POST['groupName'];
$name= $_POST['name'];
$family= $_POST['family'];
$pName= $_POST['pName'];
$pFamily= $_POST['pFamily'];
$certificateName= $_POST['certificateName'];
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
$registerDate= $_POST['registerDate'];
$graduateDate= $_POST['graduateDate'];
$mobile1= $_POST['mobile1'];
$mobile2= $_POST['mobile2'];
$telephone= $_POST['telephone'];
$homeAddress= $_POST['homeAddress'];
$workAddress= $_POST['workAddress'];
//$image= $_POST['image'];
$homePage= $_POST['homePage'];
$accessLevel= $_POST['accessLevel'];
$fullDate=date("YmdHis");
$dateEN=date("Y").'/'.date("m").'/'.date("d");
$dateFA=jdate("Y").'/'.jdate("m").'/'.jdate("d");
$time=date("g").':'.date("i").':'.date("s");























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
	if (file_exists("../../userImage/" . $_FILES["file"]["name"]))
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
	  
	  $temp[0]=$studentNumber;
	  
	  //$name=$temp[0];
	  $extension= $temp[1];
	  
	  
	  
	  $temp=implode('.',$temp);
	//  echo "renamed : ".$temp.'<br>';
	  // end of rename file
      move_uploaded_file($_FILES["file"]["tmp_name"],"../userImage/" . $temp);
	  $image="../userImage/thumb".$temp;
	//  echo "تصویر ذخیره شد در : " . "c:/../upload/" . $temp;
	  
	  
	  
	   
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
	   
	   
	   //  save thumb in hdd error : move_uploaded_file($sBinaryThumbnail,"../upload/" . $name."thumb".$extension);
	   
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
































//---- extra input




$query="select * from igwstudents where user='$user' or studentNumber='$studentNumber'";
$result=$connector->queryRun($query);
$num = mysql_num_rows($result);
if($num>=1){
	echo '<br><br><br><br><br><div align=center><font color=red>نام کاربری یاشماره دانشجویی قبللاً ثبت شده  است</font><br><br><br><a href="addStudentForm.php">بازگشت به صفحه قبل</a></div>';
	exit;	
}
//end check not registered before

//add user
$query="INSERT INTO igwstudents (id, studentNumber, user, pass, groupName, name, family, pName, pFamily, certificateName, father, country, state, city, email, website, nationalCode, gender, single, birthday, birthPlace, education, interest, brief, registerDate, graduateDate, mobile1, mobile2, telephone, homeAddress, workAddress, image, homePage, accessLevel) VALUES ('$id','$studentNumber', '$user', '$pass','$groupName','$name','$family','$pName','$pFamily','$certificateName','$father','$country','$state','$city','$email','$website','$nationalCode','$gender','$single','$birthday','$birthPlace','$education','$interest','$brief','$registerDate','$graduateDate','$mobile1','$mobile2','$telephone','$homeAddress','$workAddress','$image','$homePage','$accessLevel')";
$result=$connector->queryRun($query);
if($result){
	echo '<br><br><br><br><br><div align=center><font color=green>رکورد دانشجوی جدید با موفقیت ایجادشد</font><br><br><br><br><a href="addStudentForm.php">بازگشت به صفحه قبل</a><br><br><a href="showStudents.php">مشاهده لیست دانشجویان</a></div>';
}else{
	echo '<br><br><br><br><br><div align=center>اشکال در ثبت اطلاعات</div>';
}


ob_flush();
?>





</body>
</html>