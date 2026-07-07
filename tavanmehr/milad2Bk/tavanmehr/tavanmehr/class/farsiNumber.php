<?php

class Convertnumber2farsi{
	function Convertnumber2farsi($myString) 
	{
		$num0="&#1776;";
		$num1="&#1777;";
		$num2="&#1778;";
		$num3="&#1779;";
		$num4="&#1780;";
		$num5="&#1781;";
		$num6="&#1782;";
		$num7="&#1783;";
		$num8="&#1784;";
		$num9="&#1785;";
		
		$stringtemp="";
		$len=strlen($myString);
		for($sub=0;$sub<$len;$sub++)
		{
		 if(substr($myString,$sub,1)=="0")$stringtemp.=$num0;
		 elseif(substr($myString,$sub,1)=="1")$stringtemp.=$num1;
		 elseif(substr($myString,$sub,1)=="2")$stringtemp.=$num2;
		 elseif(substr($myString,$sub,1)=="3")$stringtemp.=$num3;
		 elseif(substr($myString,$sub,1)=="4")$stringtemp.=$num4;
		 elseif(substr($myString,$sub,1)=="5")$stringtemp.=$num5;
		 elseif(substr($myString,$sub,1)=="6")$stringtemp.=$num6;
		 elseif(substr($myString,$sub,1)=="7")$stringtemp.=$num7;
		 elseif(substr($myString,$sub,1)=="8")$stringtemp.=$num8;
		 elseif(substr($myString,$sub,1)=="9")$stringtemp.=$num9;
		 else $stringtemp.=substr($myString,$sub,1);
	
		}
	return   $stringtemp;
	
	}///end conver to number in persian
}
?>
