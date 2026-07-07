<?php
session_start();
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
//$pageHeader->createPageHeader('showBackup','}');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');

//error_reporting(0);

if(!$_SESSION['allowEnterAdminArea']){
	exit;
}
if($_SESSION['adminId']!='1'){
	echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>عدم دسترسی</title></head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../themes/default/css/index.css">
	<body>
	<br /><br /><br /><br />
<table width="500" border="0" align="center" cellpadding="0" cellspacing="0" style="font-size:12px">
  <tr>
    <td align="right">
    همکار گرامی تنها مدیر کل قیف دارای دستری مجاز به این قسمت می باشد
	<a href="'.$_SERVER['HTTP_REFERER'].'">بازگشت</a>
    </td>
    <td align="center"><img src="../themes/default/images/stopIcon.png" width="64" height="64" /></td>
  </tr>
</table>
</body>
</html>
';
exit;
}
	

$pageHeader->includeFile('class/connection.php');
//$pageHeader->includeFile('class/setting.php');
//$pageHeader->includeFile('class/table.php');
//$pageHeader->includeFile('class/farsiNumber.php');
//$pageHeader->includeFile('class/pdate.php');
$pageHeader->includeFile('class/access.php'); ///
$pageHeader->includeFile('class/acLevel.php');



echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
html{
	font-family:Tahoma, Geneva, sans-serif;
	font-size:12px;	
}
</style>
<title>'.$addFactorA4P_title.'</title>
</head>
<body>';

$employeId=$_GET['employeId'];
$employeId=2; //flag
$connector=new connection();
$query="SELECT * FROM employes WHERE `employes`.`employeId` ='$employeId';";
$result=$connector->queryRun($query);
$row=mysql_fetch_array($result);
?>
<table border="0" cellspacing="0" cellpadding="0" align="center" width="300px" style="color:#FFCC33; border:thin solid #FFF; padding:5px">
  <tr>
  
    <td align="right" bgcolor="#000000"><?php echo $row['name']; ?></td>
    <td align="right" bgcolor="#000000">نام</td>
    <td align="right" rowspan="3" bgcolor="#333333" width="2px" style="padding:5px"><a href="<?php echo $row['photoSource']; ?> "><img src="<?php echo $row['photoThumb']; ?>"  style="border:hidden" /></a></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#333333"><?php echo $row['family']; ?></td>
    <td align="right" bgcolor="#333333">نام خانوادگی</td>
  </tr>
  <tr>
    <td align="right" bgcolor="#000000"><?php echo $row['grade']; ?></td>
    <td align="right" bgcolor="#000000">سمت</td>
  </tr>   
</table>



<table border="1" dir="<?php echo $language_direction; ?>">
<?php
$acLevel=new sAcLevel();
$showAccessLevelSign=true;
$tableColumns='5';
$acLevelName[1]=$saleIndex_title;
$acLevelSign[1]='g';
$acLevelName[2]=$showGood_title;
$acLevelSign[2]='c';
$acLevelName[3]=$showFactor_title;
$acLevelSign[3]='d';

$acLevelName[4]='روند فروش سالانه '; //language
$acLevelSign[4]='e';

$acLevelName[5]='رند فروش سنه محصول'; //language
$acLevelSign[5]='f';

$acLevelName[6]='روند فر سانه محصول'; //language
$acLevelSign[6]='h';

$acLevelName[7]='روند فروش سانه محصول'; //language
$acLevelSign[7]='j';

$acLevelName[8]='روند فروش سانه محصول'; //language
$acLevelSign[8]='l';

$acLevelName[9]='رد روشلانه محصول'; //language
$acLevelSign[9]='p';

for($i=1;$i<=count($acLevelName);$i++){
	if(($i%$tableColumns)==1 ) echo '<tr>';
	$acLevel->acLevelCpanel($acLevelName[$i],$acLevelSign[$i],$employeId,$showAccessLevelSign);
	if(($i%$tableColumns)==0 ) echo '</tr>';
}
			
?>	


</table>











</body>
</html>