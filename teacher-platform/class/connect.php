<?php
class connect{
	var $link;
	//require('../settings/config.php');

	
	function getdbSettings() {
		/*require_once('config/config.php');   substitute with below lines
		$configFullPath="settings/config.php";
		for($i=1;$i<=10;$i++){
			if(file_exists($configFullPath)){
				$configAccess=$configFullPath;
				$fileLevel=$i-1; // for languagge access without for
				break;
			}
			$configFullPath="../".$configFullPath;
		}
		include($configAccess);*/
		
		$dbSettings['hostName']="localhost";
		$dbSettings['dbName']="ghifSite";
		$dbSettings['dbUser']="ghifSite";
		$dbSettings['dbPass']="111111";
		$hostName='localhost';
		
		/*
		$dbSettings['hostName']="localhost";
		$dbSettings['dbName']="lichir_qiauIgw";
		$dbSettings['dbUser']="lichir_qiauIgw";
		$dbSettings['dbPass']="a3b2c1p";
		*/
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
	
	// the check_input() functionprevents sql-injections
	/*function check_input($value){
        // Stripslashes
        if (get_magic_quotes_gpc()){  $value = stripslashes($value);}
        // Quote if not a number
        if (!is_numeric($value)){  $value = "'" . mysql_real_escape_string($value) . "'";}
        return $value;
    }*/
	
	
	
	
	
	
	
	
	function  check_input($string)
    {
  		if(get_magic_quotes_gpc())  // prevents duplicate backslashes
        {
    		$string = stripslashes($string);
  		}
        if (phpversion() >= '4.3.0')
        {
    		$string = mysql_real_escape_string($string);
  		}else{
        	$string = mysql_escape_string($string);
        }
    	return $string;
	}

	
	
	
	
	
	
	
	
	
	function login($user,$pass) {
		//if (!($this->dbConnect())) return false;
		//$user = $this->check_input($user);
		//$pass = $this->check_input($pass);
		if (!($this->dbConnect())) return false;
		//echo 'user : '.$user.' | pass : '.$pass;
		mysql_query("SET CHARACTER SET utf8");
		$result4 = mysql_query("select * from users where user='$user' and pass='$pass'"); 
        if (!$result4){
			$this->closeConnection();
			return false;}
			
        if (mysql_num_rows($result4)>0){
			//$this->closeConnection();
			return true;
		}
		else{
			//$this->closeConnection();
			return false;}	
	}
	
	function adminLogin($user,$pass) {
		//if (!($this->dbConnect())) return false;
		//$user = $this->check_input($user);
		//$pass = $this->check_input($pass);
		//echo $user.$pass;
		if (!($this->dbConnect())) return false;
		//echo ' user : '.$user.' | pass : '.$pass;
		mysql_query("SET CHARACTER SET utf8");
		$result4 = mysql_query("select * from admin where user='$user' and pass='$pass'"); 
        if (!$result4){
			$this->closeConnection();
			return false;}
			
        if (mysql_num_rows($result4)>0){
			//$this->closeConnection();
			return true;
		}
		else{
			//$this->closeConnection();
			return false;}	
	}
	
	
	
	function notRegisteredBefor($user,$email){
		$con1=$this->link;
        $query1="select * from users where user='$user' or email='$email'";
        mysql_query("SET CHARACTER SET utf8"); 
		$result1 = mysql_query($query1,$con1); 

        if (!$result1){
			$this->closeConnection();
			//echo 'errro4<br>'.'user:'.$user.'<br>email:'.$email.'<br><';
			return false;}
		
        if (mysql_num_rows($result1)>0){
			$this->closeConnection();
			return false;}
			else{
			return true;}
	}
	
	
	function registerNew($user,$name,$family,$pass,$email,$phone,$mobile,$bankName,$bankSerial,$brief){
		
		
		$configFullPath="languages/persian/shamsiDate.php";
		for($i=1;$i<=10;$i++){
			if(file_exists($configFullPath)){
				$configAccess=$configFullPath;
				$fileLevel=$i-1; // for languagge access without for
				break;
			}
			$configFullPath="../".$configFullPath;
		}
		include($configAccess);
		
		
		
		$active="no";
		$rDateEN=date("Ymd");
		$eDateEN=date("Ymd")+10000;
		$rDateFA=jdate("Ymd");
		$eDateFA=jdate("Ymd")+10000;
		$acLevel="1";
		$group="public";
		$adminBrief="";
		//echo $active." | ".$user." | ".$name." | ".$family." | ".$pass." | ".$email." | ".$rDateEN." | ".$eDateEN." | ".$rDateFA." | ".$eDateFA." | ".$phone." | ".$mobile." | ".$bankName." | ".$bankSerial." | ".$acLevel." | ".$group." | ".$brief." | ".$adminBrief." | "; 
		
		
			//$query2="insert into users values 						                     ($active,$user,$name,$family,$pass,$email,$rDateEN,$eDateEN,$rDateFA,$eDateFA,$phone,$mobile,$bankName,$bankSerial,$acLevel,$group,$brief,$adminBrief)";
		
		
		 $query2="insert into users values 						                     ('$active','$user','$name','$family','$pass','$email','$rDateEN','$eDateEN','$rDateFA','$eDateFA','$phone','$mobile','$bankName','$bankSerial','$acLevel','$group','$brief','$adminBrief')";
		
		
		
		//$query2 = "INSERT INTO users (active,user,name,family,pass,email,rDateEN,eDateEN,rDateFA,eDateFA,phone,mobile,bankName,bankSerial,acLevel,group,brief) VALUES ('$active','$user','$name','$family','$pass','$email','$rDateEN','$eDateEN','$rDateFA','$eDateFA','$phone','$mobile','$bankName','$bankSerial','$acLevel','$group','$brief')";
		$con2=$this->link;
		mysql_query("SET CHARACTER SET utf8");
		$result2 = mysql_query($query2,$con2);              
         if ($result2){
	       return true;
		   }else{ 
		   echo 'error 1';
		   $this->closeConnection();
	       return false;
		   }		
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
	
	
	function automaticRegister($user,$name,$family,$pass,$email,$phone,$mobile,$bankName,$bankSerial,$brief){
        if (!($this->dbConnect())) return false;
		$user = $this->check_input($user);
		$name = $this->check_input($name);
		$family = $this->check_input($family);
		$pass = $this->check_input($pass);
		$email = $this->check_input($email);
		$phone = $this->check_input($phone);
		$mobile = $this->check_input($mobile);
		$bankName = $this->check_input($bankName);
		$bankSerial = $this->check_input($bankSerial);
		$brief = $this->check_input($brief);
		//echo "flag1";	
		if(!($this->notRegisteredBefor($user,$email))) return false;
		//echo "flag2";	
		if($this->registerNew($user,$name,$family,$pass,$email,$phone,$mobile,$bankName,$bankSerial,$brief)){
			    $this->closeConnection();
			    return true;}
			else{
				//echo 'error6';
				$this->closeConnection();
				return false;}

	}
	
	
	function closeConnection(){
		$con=$this->link;
		mysql_close($con);
	}
	
	
	
	
	
}
?>