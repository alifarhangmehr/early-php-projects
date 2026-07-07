<?php
session_start();
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
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
		
		for($i=23;$i<40;$i++)
			$finalActivationCode2.=$activationCode[$i];	
		
		if($_GET['encCode']==$finalActivationCode || $_GET['encCode']==$finalActivationCode2){

			$filename='../settings/config.php';
			$string0="<?php";
			$string1="\$hostName='".$_SESSION['hsotname']."';";
			$string2="\$dbName='".$_SESSION['dbName']."';";
			$string3="\$dbUser='".$_SESSION['dbUser']."';";
			$string4="\$dbPass='".$_SESSION['dbPass']."';";
			$string5="\$encCode='".$_GET['encCode']."';";
			$string6="?>";
			
			$txt=$string0."\n".$string1."\n".$string2."\n".$string3."\n".$string4."\n".$string5."\n".$string6;
			
			$fp=fopen($filename, 'w');
			fwrite($fp,$txt);
			fclose($fp);
			
			echo '<p style="color:#0D0">'.$checkEncCode_correct_code.'</p>';
			echo '<p style="color:#0D0">'.$checkEncCode_installation_finished_successfully.'</p>';
			echo '<p><a href="../login.php">'.$checkEncCode_ghif_login.'</a></p>';
		}
		else echo '<p style="color:#D00">'.$checkEncCode_incorrect_code.'</p>';
		
		
	?>
