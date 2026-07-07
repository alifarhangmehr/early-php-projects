<?php
class connectionChat{
	var $link;
	//require('../settings/config.php');

	
	function getdbSettings() {
		//require_once('config/config.php');   substitute with below lines
		$configFullPath="settings/config.php";
		for($i=1;$i<=10;$i++){
			if(file_exists($configFullPath)){
				$configAccess=$configFullPath;
				$fileLevel=$i-1; // for languagge access without for
				break;
			}
			$configFullPath="../".$configFullPath;
		}
		include($configAccess);
		
		/*$dbSettings['hostName']="localhost";
		$dbSettings['dbName']="idealgc_idealcmsmain";
		$dbSettings['dbUser']="idealgc_idealCM";
		$dbSettings['dbPass']="main";
		*/
		
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
		//echo 'hostName:'.$hostName.' | '.'dbName:'.$dbName.' | '.'dbUser:'.$dbUser.' | '.'dbPass:'.$dbPass; 
		$dbConnectResult=mysql_connect($hostName, $dbUser, $dbPass); 
		//if(!is_resource($dbConnectResult))  return false;
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
		$con3=$this->link;
		//$query = $this->check_input($query);
		mysql_query("SET CHARACTER SET utf8"); 
		$result3=mysql_query($query,$con3);
        if($result3){
			return $result3;}
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