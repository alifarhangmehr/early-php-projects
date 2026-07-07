<?php
session_start();
include('../class/pageHeader.php');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('class/connection.php');
$pageHeader->includeFile('class/setting.php');
$pageHeader->includeFile('class/table.php');
if($_SESSION['adminId']!='1'){
	echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>'.$acLevelCpanel_title.'</title></head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../themes/'.$_SESSION['theme'].'/css/index.css">
	<body>
	<br /><br /><br /><br />
<table width="500" border="0" align="center" cellpadding="0" cellspacing="0" style="font-size:12px">
  <tr>
    <td align="right">
    '.$acLevelCpanel_accessDenied_message.'
	<a href="'.$_SERVER['HTTP_REFERER'].'">'.$acLevelCpanel_return.'</a>
    </td>
    <td align="center"><img src="../themes/'.$_SESSION['theme'].'/images/stopIcon.png" width="64" height="64" /></td>
  </tr>
</table>
</body>
</html>';
exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../themes/default/css/index.css"/>

<title></title>
</head>

<body>


<?php
$table=new table();
$newAcLevel=$_POST['acLevelSign'];
$employeId=$_POST['employeId'];

$con=$_POST['con'];
$connector=new connection();
$query="SELECT sAcLevel FROM employes WHERE `employes`.`employeId` ='$employeId';";
$result=$connector->queryRun($query);
$row=mysql_fetch_array($result);
$acLevel=$row['sAcLevel'];
$acLevelLen=strlen($acLevel);
$acLevelSplit=str_split($acLevel);
if($con=='add'){

$acLevel.=$newAcLevel;
$updateField[0][0]='sAcLevel';	
$updateField[0][1]=$acLevel;
$tableName='employes';
$condition='employeId='.$employeId;
$table->updateTable($updateField,$tableName,$condition);	

}else if($con=='delete'){

$newAcLevelTemp='';
for($i=0;$i<$acLevelLen;$i++){
	if($acLevelSplit[$i]!=$newAcLevel){
		$newAcLevelTemp.=$acLevelSplit[$i];
	}
}
	
$updateField[0][0]='sAcLevel';	
$updateField[0][1]=$newAcLevelTemp;
$tableName='employes';
$condition='employeId='.$employeId;
$table->updateTable($updateField,$tableName,$condition);	
	
}
?>
<form method="post" action="acLevelCPanel.php" name="changeAcLevelForm" id="changeAcLevelForm">
<input type="hidden" name="employeId" id="employeId" value="<?php echo $employeId; ?>" />
<input type="submit" style="display:none" />
</form>
</div>

<script language="javascript" type="text/javascript">
	document.getElementById('changeAcLevelForm').submit();
</script>
</body>
</html>
