<?php
session_start();
include('../class/connection.php');
include('../class/table.php');
include('../class/file.php');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../themes/install.css"/>
<title><?php echo $step2p_title; ?></title>
</head>
<body>

<?php
$_SESSION['lat']=$_POST['lat'];
$_SESSION['long']=$_POST['long'];
$_SESSION['country']=$_POST['country'];
$_SESSION['state']=$_POST['state'];
$table=new table();
$_SESSION['fieldCount']=$_POST['fieldCount'];

$savePhoto=new myfile();
$header='Header';
$photo['name']=$_FILES["logoImage"]["name"];
$photo['type']=$_FILES["logoImage"]["type"];
$photo['size']=$_FILES["logoImage"]["size"];
$photo['error']=$_FILES["logoImage"]["error"];
$photo['tmp_name']=$_FILES["logoImage"]["tmp_name"];
$location='../images/';
$savePhoto->uploadPhoto($photo,$location,$header);

$connector=new connection();
$columns[0]='settingId';
$columns[1]='companyName';
$columns[2]='whatToDo';
$columns[3]='address1';
$columns[4]='address2';
$columns[5]='tel1';
$columns[6]='tel2';
$columns[7]='mob1';
$columns[8]='mob2';
$columns[9]='sms1';
$columns[10]='sms2';
$columns[11]='fax1';
$columns[12]='fax2';
$columns[13]='site1';
$columns[14]='site2';
$columns[15]='email1';
$columns[16]='email2';
$columns[17]='theme';
$columns[18]='language';
$values[0]=1;
$values[1]=$_POST['companyName'];
$values[2]=$_POST['whatToDo'];
$values[3]=$_POST['address1'];
$values[4]=$_POST['address2'];
$values[5]=$_POST['tel1'];
$values[6]=$_POST['tel2'];
$values[7]=$_POST['mob1'];
$values[8]=$_POST['mob2'];
$values[9]=$_POST['sms1'];
$values[10]=$_POST['sms2'];
$values[11]=$_POST['fax1'];
$values[12]=$_POST['fax2'];
$values[13]=$_POST['site1'];
$values[14]=$_POST['site2'];
$values[15]=$_POST['email1'];
$values[16]=$_POST['email2'];
$values[17]='default';
$values[18]=$_SESSION['language'];
$tableName='settings';
$idColumnName=false;
$result=$table->insertIntoTable($columns,$values,$tableName,$idColumnName);

if(1==1){ //flag
echo '<table width="400" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr>
    <td align="center">'.$step2p_data_saved_successfully.'</td>
  </tr>
  <tr>
    <td align="center" style="color:green" dir="rtl">
		'.$step2p_data_is_correct.'
		<br />
		'.$step2p_redirecting_message.'
		<br /><br />
		<img src="../themes/default/images/arrows64.gif" />
       <script language="javascript" type="text/javascript">
	   setTimeout("document.location.replace(\'step2a.php\')",5000);
	   </script>
	</td>
  </tr>

</table>';
}else{ echo '<table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="246">'.$step2p_saving_error.'</td>
    <td width="48"><img src="../themes/default/images/notOkIcon.png" width="48" height="48" /></td>
  </tr>
</table>';
}
?>

</body>
</html>
