<?php
class pageHeader{
	function searchForFile($filePath) {
			for($i=1;$i<=10;$i++){
				if(file_exists($filePath)){
					$includePath=$filePath;
					$fileLevel=$i-1;
					break;
				}
				$filePath="../".$filePath;
			}
			return($includePath);
	}
	
	function includeFile($filePath){
		$fileType=pathinfo($filePath);
		if($fileType['extension']=='php')
			include($this->searchForFile($filePath));
			
		else if($fileType['extension']=='js')
			echo '<script language="javascript" type="text/javascript" src="'.$this->searchForFile($filePath).'"></script>';
			
		else if($fileType['extension']=='css')
			echo '<link rel="stylesheet" type="text/css" href="'.$this->searchForFile($filePath).'" />';
			
		else if($fileType['extension']=='png')
			return($this->searchForFile($filePath));
	}
	
	function createPageHeader($pageName,$acLevelSign){
		$iconPath=$this->searchForFile('themes/favicon.ico');
		$this->includeFile('class/connection.php');
		$this->includeFile('class/setting.php');
		$this->includeFile('class/table.php');
		$setting=new setting();
		$language=$setting->language();
		$language=$this->searchForFile('language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
		include($language);
		$pageTitle=${$pageName.'_title'};
		$theme=$setting->theme();
		echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="shortcut icon" href="'.$iconPath.'" type="image/x-icon">
		<link rel="icon" href="'.$iconPath.'" type="image/x-icon">
		';
		if($pageName!='index' && $pageName!='login' && $pageName!='mustLogin'){
			$this->includeFile('class/access.php'); ///
			$login=new login();
			$login->check($acLevelSign);
			$this->includeFile('themes/'.$_SESSION['theme'].'/css/index.css');
			$this->includeFile('modules/Sliding_login_panel_jquery/css/slide.css');
			$this->includeFile('modules/Sliding_login_panel_jquery/css/style.css');
			$this->includeFile('modules/Sliding_login_panel_jquery/js/slide.js');
			$this->includeFile('class/farsiNumber.php');
			$this->includeFile('class/pdate.php');
			$this->includeFile('modules/Sliding_login_panel_jquery/js/jquery-1.3.2.min.js');
			echo '<script src="modules/Sliding_login_panel_jquery/js/jquery-1.3.2.min.js" type="text/javascript"></script>';
			$this->includeFile('modules/Sliding_login_panel_jquery/slide.php');
		}
		
		$this->includeFile('js/inPage.js');
		$this->includeFile('js/spin.js');
		$this->includeFile('js/ajax.js');
		echo '<title>'.$pageTitle.'</title>';
		echo '</head><body dir="'.$language_direction.'"><br /><br /><br />';
		
	}
	function suggestion($data){
		echo '<link rel="stylesheet" type="text/css" href="../modules/ausu-autosuggest/css/style.css"/>
		<script type="text/javascript" src="../modules/ausu-autosuggest/js/jquery.min.js"></script>
		<script type="text/javascript" src="../modules/ausu-autosuggest/js/jquery.ausu-autosuggest.js"></script>
		<script>
		
		$(document).ready(function() {
			$.fn.autosugguest({  
				   className: "ausu-suggest",
				  methodType: "POST",
					minChars: 2,
					  rtnIDs: true,
					dataFile: "../modules/ausu-autosuggest/'.$data.'.php"
			});
		});
		
		</script>';
	}

}
?>