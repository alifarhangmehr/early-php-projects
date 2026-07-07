<?php
session_start();
error_reporting(0);
include('../class/connection.php');
include('../settings/config.php');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');

echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../themes/default/css/index.css"/>
<link rel="shortcut icon" href="../themes/favicon.ico" type="image/x-icon">
<link rel="icon" href="../themes/favicon.ico" type="image/x-icon">
<title>'.$step2ap_title.'</title>
</head>
<body>';

$fieldCount=$_SESSION['fieldCount'];
$totalResult=1;
for($i=1;$i<=$fieldCount;$i++){	
	$field='field'.$i;
	$fieldId='fieldId'.$i;
	$fieldName='fieldName'.$i;
	$perFieldId='fieldId'.($i-1);
	$connector=new connection();
	$query="CREATE TABLE `$dbName`.`$field` (
	`$fieldId` INT( 20 ) NOT NULL ,
	`$fieldName` VARCHAR( 200 ) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL ,
	PRIMARY KEY ( `$fieldId` )
	) ENGINE = MYISAM CHARACTER SET utf8 COLLATE utf8_persian_ci;";
	
	$result=$connector->queryRun($query);
	$connector2=new connection();
	if($i==1)	
		$query2="ALTER TABLE `goods` 
		ADD `$fieldId` INT( 20 ) NOT NULL AFTER `goodId`";
	else 
		$query2="ALTER TABLE `goods` 
		ADD `$fieldId` INT( 20 ) NOT NULL AFTER `$perFieldId`";
		
	$result2=$connector2->queryRun($query2);
	$goodFieldName=$_POST['field'.$i];
	$connector3=new connection();
	$query3="INSERT INTO `$dbName`.`goodfields` (`goodFieldId`, `goodFieldName`) VALUES ('$i', '$goodFieldName');";
	$result3=$connector3->queryRun($query3);
	
	if($result &&$result2 && $result3){	
	echo '<table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
	  <tr>
		<td width="246" align="center">'.$step2ap_field_data.$i.$step2ap_saved_successfully.'</td>
		<td width="48"><img src="../themes/default/images/okIcon1.png" width="24" height="24" /></td>
	  </tr>
	</table>';
	} else { echo '<table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
	  <tr>
		<td width="246" align="center">'.$step2ap_field_data_saving_error.$i.'</td>
		<td width="48"><img src="../themes/default/images/notOkIcon.png" width="24" height="24" /></td>
	  </tr>
	</table>';
	$totalResult=0;
	}
}
echo '<br /><br />';
if($totalResult==1){
	echo '<table width="400" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr>
    <td align="center">'.$step2ap_data_saved_successfully.'</td>
  </tr>
  <tr>
    <td align="center" style="color:green" dir="rtl">
		'.$step2ap_entered_data_correct.'
		<br />
		'.$step2ap_redirecting_message.'
		<br /><br />
       <script language="javascript" type="text/javascript">
	  	 setTimeout("document.location.replace(\'step3.php\')",5000);
	   </script>
	</td>
  </tr>
</table>';
}else echo '<table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="246">'.$step2ap_data_saving_error.'</td>
    <td width="48"><img src="../themes/default/images/notOkIcon.png" width="48" height="48" /></td>
  </tr>
</table>';
?>
</body>
</html>
