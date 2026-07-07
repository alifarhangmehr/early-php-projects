<?php
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
		$activationCode=str_split($activationCode);
		for($i=13;$i<26;$i++)
			$finalActivationCode.=$activationCode[$i];
		echo 'Free License : ';
		echo $finalActivationCode;
		
		for($i=23;$i<40;$i++)
			$finalActivationCode2.=$activationCode[$i];	
		echo '<br />Premium License : ';	
		echo $finalActivationCode2;
		
	?>
