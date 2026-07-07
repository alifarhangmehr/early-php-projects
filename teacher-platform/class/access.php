<?php
class access{
	function checkUuid(){
		include('../settings/config.php');
		ob_start(); 
		
		system("wmic csproduct get uuid"); 
		$cominfo=ob_get_contents(); 
		ob_clean();
		/*//echo $cominfo;
		//echo '<br />';
		$uuid=substr($cominfo,41,71); //+35
		*/
		$cominfo=str_split($cominfo);
		for($i=0;$i<100;$i++){
			if($cominfo[$i]=='0' || $cominfo[$i]==1 || $cominfo[$i]==2 || $cominfo[$i]==3 || $cominfo[$i]==4 || $cominfo[$i]==5 || $cominfo[$i]==6 || $cominfo[$i]==7 || $cominfo[$i]==8 || $cominfo[$i]==9 || $cominfo[$i]=='-' || $cominfo[$i]=='A' || $cominfo[$i]=='B' || $cominfo[$i]=='C' || $cominfo[$i]=='E' || $cominfo[$i]=='E' || $cominfo[$i]=='F' || $cominfo[$i]=='G' || $cominfo[$i]=='H' || $cominfo[$i]=='J' || $cominfo[$i]=='K' || $cominfo[$i]=='L' || $cominfo[$i]=='M' || $cominfo[$i]=='N' || $cominfo[$i]=='O' || $cominfo[$i]=='P' || $cominfo[$i]=='Q' || $cominfo[$i]=='R' || $cominfo[$i]=='S' || $cominfo[$i]=='T' || $cominfo[$i]=='X' || $cominfo[$i]=='Y' || $cominfo[$i]=='Z') $uuid.=$cominfo[$i];	
		}

		$hashUuid=$uuid.'ChelioSs';
		$activationCode=hash('sha512', $hashUuid);
		if($encCode==$activationCode)
			return true;
		else {
			echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
					<html xmlns="http://www.w3.org/1999/xhtml">
					<head>
					<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
					<link rel="stylesheet" type="text/css" href="../themes/default/css/index.css"/>
					<title>نصب قیف - مرحله دوم</title>
					</head>
					<body><p align="center"><img src="../themes/default/images/skullIcon.png" /></p>';
			echo '<p align="center">کپی غیر مجاز قیف</p></body></html>';
			
			
			
			
			
			
			
			exit;
			//return false;
			//return true;
		}
		
	}
	
}
?>