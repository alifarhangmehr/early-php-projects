<?php
session_start();
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../themes/default/css/index.css"/>
<title><?php $logout_title; ?></title>
</head>
<body>
<br /><br /><br /><br /><br />
</body>
</html>
<?php
$_SESSION['allowEnterAdminArea']=false;
// store  to test if they *were* logged in
unset($HTTP_SESSION_VARS);
$result_dest = session_destroy();
  if ($result_dest)
  {
    echo  '<div align="center" dir="rtl"><font color=green>'.$logout_title.' </font></div>';
	echo  '<div align="center" dir="rtl"><font color=green><br />'.$logout_sign_out_successfully_message.'</font></div><p align="center">';
	?>
	   <script language="javascript" type="text/javascript">
	   setTimeout("document.location.replace('../index.php')",2000);
	   </script>
	<?php
  }
  else
  {
   // they were logged in and could not be logged out
     echo  '<div align="center" dir="rtl"><font color=orange>'.$logout_sign_out_unsuccessfull_message.'</font></div>';
  }

?>