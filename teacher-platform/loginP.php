<?php
require_once("class/connection.php");
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
echo '<link rel="stylesheet" type="text/css" href="themes/default/css/index.css"/>';
echo '<title>'.$adminLoginP_title.'</title>';
$user = $_POST['user'];
$pass = md5($_POST['pass']);
$connector=new connection();
$query="select * from teachers where user='$user' and pass='$pass'";
$result=$connector->queryRun($query);
  if (mysql_num_rows($result)>0){
	   $row = mysql_fetch_array($result);
	   $_SESSION['teacherId']=$row['teacherId'];
	   $_SESSION['name']=$row['name'];
	   $_SESSION['family']=$row['family'];
	   $_SESSION['email']=$row['email'];	   
	   $_SESSION['allowEnterAdminArea']=true;
	    echo '<p align="center"><font color="green">اطلاعات وارد شده صحیح می باشد</font></p>';
	  	echo '<div align="center" dir="rtl"><font color="green"><br />تا 2 ثاتیه دیگر منتقل می شوید ...</font></div><p align="center"><img src="themes/default/images/dots64.gif" />';
	   echo '
       <script language="javascript" type="text/javascript">
	   setTimeout("document.location.replace(\'admin/index.php\')",2000);
	   </script>';

	   exit;	
}

  else{
	  $_SESSION['allowEnterAdminArea']=false;
	  echo '<p align="center"><font color="#FF9900">اطلاعات وارد شده نادست می باشد</font></p>';
	  	echo '<div align="center" dir="rtl"><font color="green"><br />تا 2 ثاتیه دیگر منتقل می شوید ...</font></div><p align="center"><img src="themes/default/images/dots64.gif" />
	  <script language="javascript" type="text/javascript">
	   setTimeout("document.location.replace(\'login.php\')",2000);
	   </script>
';
      exit;
	  }

//}
?>