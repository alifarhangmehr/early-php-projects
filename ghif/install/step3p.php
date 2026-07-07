<?php
session_start();
error_reporting(0);
include('../settings/config.php');
include('../class/file.php');
include('../class/connection.php');
include('../class/table.php');
include('../class/pageHeader.php');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../themes/install.css"/>
<link rel="shortcut icon" href="../themes/favicon.ico" type="image/x-icon">
<link rel="icon" href="../themes/favicon.ico" type="image/x-icon">
<title><?php echo $step3p_title; ?></title>
</head>

<body>
<?php
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/ajax.js');

$table=new table();
$employeId=1;
$columns[0]='employeId';
$columns[1]='name';
$columns[2]='family';
$columns[3]='user';
$columns[4]='pass';
$columns[5]='tel';
$columns[6]='mobile';
$columns[7]='address';
$columns[8]='birthday';
$columns[9]='sAcLevel';
$columns[10]='grade';
$columns[11]='salary';
$columns[12]='comments';
$values[0]=$employeId;
$values[1]=$_POST['name'];
$values[2]=$_POST['family'];
$values[3]=$_POST['user'];
$values[4]=md5($_POST['pass']);
$values[5]=$_POST['tel'];
$values[6]=$_POST['mobile'];
$values[7]=$_POST['address'];
$values[8]=$_POST['birthday'];
$values[9]='ab$cdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQR!VSTU';
$values[10]='مدیر';
$values[11]=$_POST['salary'];
$values[12]=$_POST['comments'];

$savePhoto=new myfile();
$photo['name']=$_FILES["adminPhoto"]["name"];
$photo['type']=$_FILES["adminPhoto"]["type"];
$photo['size']=$_FILES["adminPhoto"]["size"];
$photo['error']=$_FILES["adminPhoto"]["error"];
$photo['tmp_name']=$_FILES["adminPhoto"]["tmp_name"];
$location='../images/employes/';
$savePhoto->uploadPhoto($photo,$location,$employeId);
$tableName='employes';
$idColumnName=false;
$result=$table->insertIntoTable($columns,$values,$tableName,$idColumnName);

echo $result;
if(1==1) {//flag
$connector=new connection();
if(!$connector->dbConnect())	echo 'Error No.7';	
/*--------------------------uuid------------------------------------*/

ob_start(); 

system("wmic csproduct get uuid"); 
$cominfo=ob_get_contents(); 
ob_clean();
/*//echo $cominfo;
//echo '<br />';
$uuid=substr($cominfo,41,71); //+35
*/
$cominfo=str_split($cominfo);
for($i=0;$i<100;$i++){
	if($cominfo[$i]=='0' || $cominfo[$i]==1 || $cominfo[$i]==2 || $cominfo[$i]==3 || $cominfo[$i]==4 || $cominfo[$i]==5 

|| $cominfo[$i]==6 || $cominfo[$i]==7 || $cominfo[$i]==8 || $cominfo[$i]==9 || $cominfo[$i]=='-' || $cominfo[$i]=='A' || 

$cominfo[$i]=='B' || $cominfo[$i]=='C' || $cominfo[$i]=='E' || $cominfo[$i]=='E' || $cominfo[$i]=='F' || $cominfo[$i]=='G' 

|| $cominfo[$i]=='H' || $cominfo[$i]=='J' || $cominfo[$i]=='K' || $cominfo[$i]=='L' || $cominfo[$i]=='M' || $cominfo[$i]

=='N' || $cominfo[$i]=='O' || $cominfo[$i]=='P' || $cominfo[$i]=='Q' || $cominfo[$i]=='R' || $cominfo[$i]=='S' || $cominfo

[$i]=='T' || $cominfo[$i]=='X' || $cominfo[$i]=='Y' || $cominfo[$i]=='Z') 

$uuid.=$cominfo[$i];	
}

/*--------------------------uuid------------------------------------*/

$query0="SELECT * FROM employes WHERE employeId='1'";
$result0=$connector->queryRun($query0);
if(!$result0) echo 'Error No.8';
$row0=mysql_fetch_array($result0);

$query1="SELECT * FROM settings WHERE settingId='1'";
$result1=$connector->queryRun($query1);
if(!$result1) echo 'Error No.8';
$row1=mysql_fetch_array($result1);

$name=$row0['name'];
$family=$row0['family'];
$company=$row1['companyName'];
$services=$row1['whatToDo'];
$address1=$row1['address1'];
$address2=$row1['address2'];
$tel1=$row1['tel1'];
$tel2=$row1['tel2'];
$mobile1=$row1['mob1'];
$mobile2=$row1['mob2'];
$sms1=$row1['sms1'];
$sms2=$row1['sms2'];
$fax1=$row1['fax1'];
$fax2=$row1['fax2'];
$site1=$row1['site1'];
$site2=$row1['site2'];
$email1=$row1['email1'];
$email2=$row1['email2'];
$language=$row1['language'];
$country=$_SESSION['country'];
$state=$_SESSION['state'];
$lat=$_SESSION['lat'];
$long=$_SESSION['long'];

echo '<div align="center">
	<p style="color:#0D0">'.$step3p_data_saved_successfully.'</p><br />
	<p>'.$step3p_activation_required.'<br />'.$step3p_activation_methods.'</p><br />
	<a href="http://ghif.org/register.php?name='.$name.'&family='.$family.'&company='.$company.'&services='.$services.'&address1='.$address1.'&address2='.$address2.'&tel1='.$tel1.'&tel2='.$tel2.'&mobile1='.$mobile1.'&mobile2='.$mobile2.'&sms1='.$sms1.'&sms2='.$sms2.'&fax1='.$fax1.'&fax2='.$fax2.'&site1='.$site1.'&site2='.$site2.'&email1='.$email1.'&email2='.$email2.'&language='.$language.'&uuid='.$uuid.'&country='.$country.'&state='.$state.'&lat='.$lat.'&long='.$long.'">'.$step3p_internet_activation.'</a><br />
	<a href="phoneActivation.php?uuid='.$uuid.'">'.$step3p_phone_activation.'</a><br />
	';//<a href="smsActivation.php">'.$step3p_sms_activation.'</a>
	echo '<p align="center"><input type="text" name="encCode" id="encCode" style="text-align:center;" placeholder="insert actiovaiton code" onkeyup="checkEncCode(\'checkEncCode.php\')" onkeydown="checkEncCode(\'checkEncCode.php\')" /><br /><div id="myDiv"></div></p>
	</div>';
}else{ echo '<table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
	  <tr>
		<td width="246" align="center">'.$step3p_install_error.'</td>
		<td width="48"><img src="../themes/default/images/notOkIcon.png" width="48" height="48" /></td>
	  </tr>
	</table>';
}
		
echo '<p dir="'.$language_direction.'" align="center">'.$step3p_attention.'</p>';

?>
</body>
</html>
