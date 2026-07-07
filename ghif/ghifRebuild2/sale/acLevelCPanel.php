<?php
session_start();
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->createPageHeader('acLevelCpanel','}');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');

//error_reporting(0);

if(!$_SESSION['allowEnterAdminArea']){
	exit;
}
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

$employeId=$_POST['employeId'];
$connector=new connection();
if(!$connector) echo 'Error No. 7';
$query="SELECT * FROM employes WHERE `employes`.`employeId` ='$employeId';";
$result=$connector->queryRun($query);
if(!$result) echo 'Error No. 8';
$row=mysql_fetch_array($result);

echo '<div align="center">
<table border="0" cellpadding="2" cellspacing="1" dir="'.$language_direction.'" class="showTable">
  <tr class="showTableHeader">
	<td rowspan="3"><a href="../images/employes/source'.$employeId.'.jpg"><img src="../images/employes/thumb'.$employeId.'.jpg"  style="border:hidden" /></a></td>
	<td>'.$acLevelCpanel_name.'</td>
	<td>'.$row['name'].'</td> 
  </tr>
  <tr class="showTableHeader">
     <td>'.$acLevelCpanel_family.'</td>
	 <td>'.$row['family'].'</td>
  </tr>
  <tr class="showTableHeader">
    <td>'.$acLevelCpanel_grade.'</td>
	<td>'.$row['grade'].'</td>
  </tr>   
</table>

<table dir="'.$language_direction.'" cellpadding="5px" cellspacing="5px">';

$acLevel=new sAcLevel();
$showAccessLevelSign=false;
$tableColumns='5';
$acLevelName[0]=$showGood_title;
$acLevelSign[0]='a';
$acLevelName[1]=$addGood_title;
$acLevelSign[1]='b';
$acLevelName[2]=$editGood_title;
$acLevelSign[2]='c';
$acLevelName[3]=$printBarcode_title;
$acLevelSign[3]='d';

$acLevelName[4]=$addFactor_title;
$acLevelSign[4]='e';

$acLevelName[5]=$addFactorP_title;
$acLevelSign[5]='f';

$acLevelName[6]=$addFactorPA4_title;
$acLevelSign[6]='g';


$acLevelName[7]=$addPFactor_title;
$acLevelSign[7]='h';

$acLevelName[8]=$showFactor_title;
$acLevelSign[8]='i';

$acLevelName[9]=$editFactor_title;
$acLevelSign[9]='j';

$acLevelName[10]=$cancelFactor_title;
$acLevelSign[10]='k';

$acLevelName[11]=$unCancelFactor_title;
$acLevelSign[11]='l';

$acLevelName[12]=$addCash_title;
$acLevelSign[12]='m';

$acLevelName[13]=$addCashP_title;
$acLevelSign[13]='n';

$acLevelName[14]=$ghifSettings_title;
$acLevelSign[14]='o';

$acLevelName[15]=$showBackup_title;
$acLevelSign[15]='p';

$acLevelName[16]=$addBackup_title;
$acLevelSign[16]='q';

$acLevelName[17]=$showFactorExtra_title;
$acLevelSign[17]='r';

$acLevelName[18]=$addFactorExtra_title;
$acLevelSign[18]='s';

$acLevelName[19]=$editFactorExtra_title;
$acLevelSign[19]='t';

$acLevelName[20]=$showStore_title;
$acLevelSign[20]='u';

$acLevelName[21]=$addStore_title;
$acLevelSign[21]='v';

$acLevelName[22]=$editStore_title;
$acLevelSign[22]='w';

$acLevelName[23]=$showCashList_title;
$acLevelSign[23]='x';

$acLevelName[24]=$addCashList_title;
$acLevelSign[24]='y';

$acLevelName[25]=$editCashList_title;
$acLevelSign[25]='z';

$acLevelName[26]=$showEmploye_title;
$acLevelSign[26]='A';

$acLevelName[27]=$addEmploye_title;
$acLevelSign[27]='B';

$acLevelName[28]=$editEmploye_title;
$acLevelSign[28]='C';

$acLevelName[29]=$update_title;
$acLevelSign[29]='D';

$acLevelName[30]=$showAccountTurnover_title;
$acLevelSign[30]='E';

$acLevelName[31]=$addAccount_title;
$acLevelSign[31]='F';

$acLevelName[32]=$editAccount_title;
$acLevelSign[32]='G';

$acLevelName[33]=$addCheck_title;
$acLevelSign[33]='H';

$acLevelName[34]=$editCheck_title;
$acLevelSign[34]='I';

$acLevelName[35]=$showCustomer_title;
$acLevelSign[35]='J';

$acLevelName[36]=$addCustomer_title;
$acLevelSign[36]='K';

$acLevelName[37]=$editCustomer_title;
$acLevelSign[37]='L';

$acLevelName[38]=$showOa_title;
$acLevelSign[38]='M';

$acLevelName[39]=$addOa_title;
$acLevelSign[39]='N';

$acLevelName[40]=$editOa_title;
$acLevelSign[40]='O';

$acLevelName[41]=$manageReports_title;
$acLevelSign[41]='P';

$acLevelName[42]=$reportSaleInYear_title;
$acLevelSign[42]='Q';

$acLevelName[43]=$reportSaleInWeek_title;
$acLevelSign[43]='R';

$acLevelName[44]=$showInventoryDetails_title;
$acLevelSign[44]='S';

$acLevelName[45]=$showInventoryDetails2_title;
$acLevelSign[45]='T';

$acLevelName[46]=$changeInventory_title;
$acLevelSign[46]='U';

$acLevelName[47]=$displacementStore_title;
$acLevelSign[47]='V';





$acLevelName[48]=$index_title;
$acLevelSign[48]='$';

$acLevelName[49]=$delete_title;
$acLevelSign[49]='!';

for($i=0;$i<count($acLevelName);$i++){
	if(($i%$tableColumns)==0) echo '<tr>';
	$acLevel->acLevelCpanel($acLevelName[$i],$acLevelSign[$i],$employeId,$showAccessLevelSign);
	if(($i%$tableColumns)==4) echo '</tr>';
}
			
?>	

</table>
</div>
</body>
</html>