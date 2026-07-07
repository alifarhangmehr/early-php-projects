<?php
session_start();
class setting{
	function theme() {
		if(!isset($_SESSION['theme'])){ 
			$connector=new connection();
			if(!$connector->dbConnect()) echo 'Error No. 1';
			$query="select theme from settings";
			$result=$connector->queryRun($query);
			if(!$result) echo 'Error No. 2';
			$row=mysql_fetch_array($result);
			$_SESSION['theme']=$row['theme'];
		}
	}
	
	function language() {
		if(!isset($_SESSION['language'])){ 
			$connector=new connection();
			if(!$connector->dbConnect()) echo 'Error No. 3';
			$query="select language from settings";
			$result=$connector->queryRun($query);
			if(!$result) echo 'Error No. 4';
			$row=mysql_fetch_array($result);
			$_SESSION['language']=$row['language'];
		}
	}
}
?>