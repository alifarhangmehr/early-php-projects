<?php
session_start();
include('class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->includeFile('themes/login.css');
$pageHeader->createPageHeader('login','');
include('language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
$user=$_POST['user'];
$pass=md5($_POST['pass']);
$connector=new connection();
	if(!$connector->dbConnect()) echo 'Error No. 5';
$query="select * from employes where user='$user' and pass='$pass'";
$result=$connector->queryRun($query);
if (!$result)  echo 'Error No. 6';
if (mysql_num_rows($result)>0){
	$row=mysql_fetch_array($result);
	$_SESSION['adminId']=$row['employeId'];
	$_SESSION['adminName']=$row['name'];
	$_SESSION['adminFamily']=$row['family'];
	$_SESSION['adminGrade']=$row['grade'];
	$_SESSION['acLevel']=$row['acLevel'];
	$_SESSION['username']=$row['user'];
	$_SESSION['cashListId']=$_POST['cashListId'];
	$_SESSION['allowEnterAdminArea']=true;
	echo '<p align="center"><font color="green">'.$login_correct_message.'</font></p>';
	echo '<div dir="'.$language_direction.'" align="center"><font color="green"><br />'.$login_redirect_message.'</font></div><p align="center"><img src="themes/'.$_SESSION['theme'].'/images/dots64.gif" />';
   echo '
   <script language="javascript" type="text/javascript">
   setTimeout("document.location.replace(\'sale\')",2000);
   </script>';

   exit;	
}
  else{
	  $_SESSION['allowEnterAdminArea']=false;
	  echo '<p align="center"><font color="#FF9900">'.$login_incorrect_message.'</font></p>';
	  echo '<div dir="'.$language_direction.'" align="center"><font color="green"><br />'.$login_redirect_message.'</font></div><p align="center"><img src="themes/'.$_SESSION['theme'].'/images/dots64.gif" />
	  <script language="javascript" type="text/javascript">
	   setTimeout("document.location.replace(\'index.php\')",2000);
	   </script>
';
      exit;
	  }
?>