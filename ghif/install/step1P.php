<?php
session_start();
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
include('../class/connection.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $step1_title; ?></title>
<link rel="stylesheet" type="text/css" href="../themes/install.css" />
<link rel="shortcut icon" href="../themes/favicon.ico" type="image/x-icon">
<link rel="icon" href="../themes/favicon.ico" type="image/x-icon">
</head>
<body dir="<?php echo $language_direction ?>">

<?php
$_SESSION['hsotname']=$hostName=$_POST['hostName'];
$_SESSION['dbName']=$dbName=$_POST['dbName'];
$_SESSION['dbUser']=$dbUser=$_POST['dbUser'];
$_SESSION['dbPass']=$dbPass=$_POST['dbPass'];
$filename='../settings/config.php';
$string0="<?php";
$string1="\$hostName='".$hostName."';";
$string2="\$dbName='".$dbName."';";
$string3="\$dbUser='".$dbUser."';";
$string4="\$dbPass='".$dbPass."';";
$string5="?>";

$txt=$string0."\n".$string1."\n".$string2."\n".$string3."\n".$string4."\n".$string5;

$fp=fopen($filename, 'w');
fwrite($fp,$txt);
fclose($fp);

if($fp) echo '<table border="0" align="center">
  <tr>
    <td align="right"  width="246" dir="rtl">'.$step1_file_saved_successfully.'</td>
	<td width="24"><img src="../themes/default/images/okIcon1.png" width="24" height="24" /></td>
  </tr>
 </table>';

else echo '<table border="0" align="center">
  <tr>
    <td width="246" dir="rtl" align="right">'.$step1_file_save_error.'</td>
    <td width="24"><img src="../themes/default/images/notOkIcon.png" width="24" height="24" /></td>
  </tr>
</table>';

$my_file = 'sql/struct.sql';
$handle = fopen($my_file, 'r');
$query = fread($handle,filesize($my_file));
$explodedQuery=explode(";",$query);
$limit=count($explodedQuery);
$resultFlag=1;
for($i=0;$i<$limit-1;$i++){
	$executedQuery=$explodedQuery[$i];
	$connector=new connection();
	$result=$connector->queryRun($executedQuery);
	if(!$result) $resultFlag=0;	
}
if($resultFlag!=0){
	echo '<table border="0" align="center">
  <tr>
    <td align="center" width="246"  align="right">'.$step1_db_structure_done.'</td>
    <td width="24"><img src="../themes/default/images/okIcon1.png" width="24" height="24" /></td>
  </tr>
 </table>';	
}else echo '<table border="0" align="center">
  <tr>
    <td width="246" align="right">'.$step1_db_structure_error.'</td>
    <td width="24"><img src="../themes/default/images/notOkIcon.png" width="24" height="24" /></td>
  </tr>
</table>';

if($result!=0 && $fp){
	echo '<table border="0" align="center">
  <tr>
    <td align="center"><span style="color:green; font-weight:bold">'.$step1_finished_successfully.'</span></td>
  </tr>
  <tr>
    <td align="center" style="color:green" dir="rtl">
		'.$step1_redirecting_message.'
		<br /><br />
       <script language="javascript" type="text/javascript">
	   setTimeout("document.location.replace(\'step2.php\')",5000);
	   </script>
	</td>
  </tr>
</table>';	
}
else echo '<table border="0" align="center">
  <tr>
    <td width="246" align="right">'.$step1_error.'</td>
    <td width="24"><img src="../themes/default/images/notOkIcon.png" width="24" height="24" /></td>
  </tr>
</table>';
?>
</body>
</html>
