<?php
class acLevel{

	function checkIfAlready($newAcLevel,$employeId) {
		
		$connector=new acLevelCon();
		$query="SELECT acLevel FROM employes WHERE `employes`.`employeId` ='$employeId';";
		$result=$connector->queryRun($query);
		$row = mysql_fetch_array($result);
		
		$acLevel=$row['acLevel'];
		$acLevelLen=strlen($acLevel);
		$acLevelSplit=str_split($acLevel);
		$already=0;
		
		for($i=0;$i<$acLevelLen;$i++){
			//echo $i;
			if($acLevelSplit[$i]==$newAcLevel){
				$already=1;
				//echo 'breaking for';
				break;
			}
		}
		if($already==0) return false;
		else return true;
		
	}
	function checkAcces($acLevelName) {
		
		$employeId=$_SESSION['adminId'];
		$connector=new acLevelCon();
		$query="SELECT acLevel FROM employes WHERE `employes`.`employeId` ='$employeId';";
		$result=$connector->queryRun($query);
		$row = mysql_fetch_array($result);
		
		$acLevel=$row['acLevel'];
		$acLevelLen=strlen($acLevel);
		$acLevelSplit=str_split($acLevel);
		$already=0;
		
		for($i=0;$i<$acLevelLen;$i++){
			//echo $i;
			if($acLevelSplit[$i]==$acLevelName){
				$already=1;
				//echo 'breaking for';
				break;
			}
		}
		if($already==0) return false;
		else return true;
		
	}
	
}
?>