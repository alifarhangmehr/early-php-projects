<?php
session_start();
//include('access.php');
$access=new access();
$ghifVersion=$_SESSION['ghifVersion']=$access->checkUuid();
if(!$ghifVersion) exit;
//echo '<br /><br /><br />';
//echo 'ghif Version :';
//echo $ghifVersion;
class sAcLevel{
	function checkAccess($acLevelSign,$employeId) {
		$connector=new connection();
		$query="SELECT sAcLevel FROM employes WHERE `employes`.`employeId` ='$employeId';";
		$result=$connector->queryRun($query);
		$row=mysql_fetch_array($result);
		
		$acLevel=$row['sAcLevel'];
		$acLevelLen=strlen($acLevel);
		$acLevelSplit=str_split($acLevel);
		$already=0;
		
		for($i=0;$i<$acLevelLen;$i++){
			//echo $i;
			if($acLevelSplit[$i]==$acLevelSign){
				$already=1;
				//echo 'breaking for';
				break;
			}
		}
		if($already==0) return false;
		else return true;
		
	}
	function acLevelCpanel($acLevelName,$acLevelSign,$employeId,$showAccessLevelSign){
		
		echo '<td align="right" style="border: thin solid #000">'.$acLevelName.'</td>';
		if($showAccessLevelSign) echo '<td align="right" style="border: thin solid #000">'.$acLevelSign.'</td>';
		echo '<form method="post" action="changeSAcLevel.php">';
		echo '<input type="hidden" name="acLevelSign" value="'.$acLevelSign.'" />';
		echo '<input type="hidden" name="employeId" value="'.$employeId.'" /><td style="border: thin solid #000">';
		$ifAlready=$this->checkAccess($acLevelSign,$employeId);
		if($ifAlready) echo '<input type="image" src="../themes/'.$_SESSION['theme'].'/images/okIcon2.png" /><input type="hidden" name="con" value="delete" />';
		else echo '<input type="image" src="../themes/'.$_SESSION['theme'].'/images/noIcon2.png" /><input type="hidden" name="con" value="add" />';
		echo '</form></td>';
	}
	
}
?>
	