<?php
//include('access.php');
$access=new access();
$access=$access->checkUuid();
if(!$access) exit;
class sAcLevel{
	function checkAccess($acLevelSign,$employeId) {
		$employeId=$_SESSION['adminId'];
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
		
		echo '<td align="right" bgcolor="#EEEEEE">'.$acLevelName.'</td>';
		if($showAccessLevelSign) echo '<td align="right" bgcolor="#EEEEEE">'.$acLevelSign.'</td>';
		echo '<form method="post" action="changeSAcLevel.php">';
		echo '<input type="hidden" name="acLevelSign" value="'.$acLevelSign.'" />';
		echo '<input type="hidden" name="employeId" value="'.$employeId.'" /><td>';
		$ifAlready=$this->checkAccess($acLevelSign,$employeId);
		if($ifAlready) echo '<input type="image" src="../themes/'.$_SESSION['theme'].'/images/yesIcon1.png" /><input type="hidden" name="con" value="delete" />';
		else echo '<input type="image" src="../themes/'.$_SESSION['theme'].'/images/checkIcon1.png" /><input type="hidden" name="con" value="add" />';
		echo '</td>';
	}
	
}
?>
	