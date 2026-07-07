<?php
class playWithDate{
	
	
	
	function getDate($dateFA,$dateEN,$language) {


		$dateExplodeFA = explode("/", $dateFA);
		//echo $dateExplodeFA[0]; // year
		//echo $dateExplodeFA[1]; // month
		//echo $dateExplodeFA[2]; // day
		if($dateExplodeFA[1]=='01') $dateExplodeFA[1]='فروردین';
		else if($dateExplodeFA[1]=='02') $dateExplodeFA[1]='اردیبهشت';
		else if($dateExplodeFA[1]=='03') $dateExplodeFA[1]='خرداد';
		else if($dateExplodeFA[1]=='04') $dateExplodeFA[1]='تیر';
		else if($dateExplodeFA[1]=='05') $dateExplodeFA[1]='مرداد';
		else if($dateExplodeFA[1]=='06') $dateExplodeFA[1]='شهریور';
		else if($dateExplodeFA[1]=='07') $dateExplodeFA[1]='مهر';
		else if($dateExplodeFA[1]=='08') $dateExplodeFA[1]='آبان';
		else if($dateExplodeFA[1]=='09') $dateExplodeFA[1]='آذر';
		else if($dateExplodeFA[1]=='10') $dateExplodeFA[1]='دی';
		else if($dateExplodeFA[1]=='11') $dateExplodeFA[1]='بهمن';
		else if($dateExplodeFA[1]=='12') $dateExplodeFA[1]='اسفند';
		
		
		
		
		$dateExplodeEN = explode("/", $dateEN);
		//echo $dateExplodeEN[0]; // year
		//echo $dateExplodeEN[1]; // month
		//echo $dateExplodeEN[2]; // day
		if($dateExplodeFA[1]=='01') $dateExplodeFA[1]='January';
		else if($dateExplodeFA[1]=='02') $dateExplodeFA[1]='February';
		else if($dateExplodeFA[1]=='03') $dateExplodeFA[1]='March';
		else if($dateExplodeFA[1]=='04') $dateExplodeFA[1]='April';
		else if($dateExplodeFA[1]=='05') $dateExplodeFA[1]='May';
		else if($dateExplodeFA[1]=='06') $dateExplodeFA[1]='June';
		else if($dateExplodeFA[1]=='07') $dateExplodeFA[1]='July';
		else if($dateExplodeFA[1]=='08') $dateExplodeFA[1]='August';
		else if($dateExplodeFA[1]=='09') $dateExplodeFA[1]='September';
		else if($dateExplodeFA[1]=='10') $dateExplodeFA[1]='October';
		else if($dateExplodeFA[1]=='11') $dateExplodeFA[1]='November';
		else if($dateExplodeFA[1]=='12') $dateExplodeFA[1]='December';


		if($language=='fa') return $dateExplodeFA ;
		else if($language=='en') return $dateExplodeEN ;






		
		
	}
	
	
	//flag bayad time ba GMT set beshe
	function howLongAgo($dateFA,$dateEN,$time,$language){
		
		
		//($j_y, $j_m, $j_d)
		// flag - ba make date bayad dorostesh konam
		
		
		$dateExplodeFA = explode("/", $dateFA);	
		$timeExplodeFA = explode(":", $time);
		
		
		// present time details
		
		
		$year=$j_y=pdate("Y");
		$month=$J_m=pdate("m");
		$day=$j_d=pdate("d");
		//jalali_to_gregorian($j_y, $j_m, $j_d);
		echo 'date : '.$gy.$gm.$gd ;
		list( $gyear, $gmonth, $gday ) = jalali_to_gregorian('1370', $jmonth, $jday); 
		/*
		$hour=pdate("g"); 
		$min=pdate("i");
		$sec=pdate("s");
		
		
		
		$HLAYaer=$year-$dateExplodeFA[0];
		$HLAMonth=$month-$dateExplodeFA[1];
		$HLADay=$day-$dateExplodeFA[2];
		
		$HLAHour=$hour-$timeExplodeFA[0];
		$HLAMin=$min-$timeExplodeFA[1];
		$HLASec=$sec-$timeExplodeFA[2];
		
		if($HLAYaer>=1) return $HLAYaer.' سال و '.$HLAMonth.' قبل' ;
		
		if($HLAYaer<1 && $HLAMonth>1) return $HLAMonth.' ماه و '.$HLADay.' روز قبل' ;
		
		if($HLAYaer<1 && $HLAMonth<1) return $HLADay.' روز قبل' ;
		
		if($HLAYaer<1 && $HLAMonth<1 && $HLADay<1) return $HLAHour.' ساعت و '.$HLAMin.' دقیقه قبل' ;
		
		if($HLAYaer<1 && $HLAMonth<1 && $HLADay<1 && $HLAHour<1) return $HLAMin.' دقیقه و '.$sec.' ثانیه قبل' ;
		*/
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
?>