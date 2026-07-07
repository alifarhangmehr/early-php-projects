<?php
class connection{
	//var $link;
	function getdbSettings() {
		$configFullPath="settings/config.php";
		for($i=1;$i<=10;$i++){
			if(file_exists($configFullPath)){
				$configAccess=$configFullPath;
				$fileLevel=$i-1;
				break;
			}
			$configFullPath="../".$configFullPath;
		}
		include($configAccess);
		$dbSettings['hostName']=$hostName;
		$dbSettings['dbName']=$dbName;
		$dbSettings['dbUser']=$dbUser;
		$dbSettings['dbPass']=$dbPass;
		
		return $dbSettings;
	}
	
	function dbConnect() {
		$dbSettings=$this->getdbSettings();
		$hostName=$dbSettings['hostName'];
		$dbName=$dbSettings['dbName'];
		$dbUser=$dbSettings['dbUser'];
		$dbPass=$dbSettings['dbPass'];
		$dbConnectResult=mysql_connect($hostName, $dbUser, $dbPass); 
		$this->link=$dbConnectResult;
        if (!($dbConnectResult)) { return false; }
		
        if (mysql_select_db($dbName,$dbConnectResult)){ 
		   return $dbConnectResult;}
		else{
			 $this->closeConnection();
		     return false;}
	}
	
	function queryRun($query){
		if (!($this->dbConnect())) return false;
		$connection=$this->link;
		mysql_query("SET CHARACTER SET utf8"); 
		$result=mysql_query($query,$connection);
        if($result){
			return $result;}
	    else{
			$this->closeConnection();
			return false;}
	}
		
	function closeConnection(){
		$con=$this->link;
		mysql_close($con);
	}
}
?>