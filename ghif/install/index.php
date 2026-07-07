<?php
session_start();
include('../class/connection.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>انتخاب زبان - Select Language</title>
<link rel="stylesheet" type="text/css" href="../themes/install.css" />
<link rel="shortcut icon" href="../themes/favicon.ico" type="image/x-icon">
<link rel="icon" href="../themes/favicon.ico" type="image/x-icon">
</head>
<?php
echo '<div align="center">
<br /><fieldset style="width:250px"><br />
<legend align="center" style="font-size:14">Select Language - انتخاب زبان</legend>	
	<table cellspacing="10">
    	<tr>
        	<td><a href="'.$_SERVER['PHP_SELF'].'?language=fa" style="text-decoration:none"><img src="../language/fa/fa.gif" alt="" width="80" height="50" /></a></td>
            <td><a href="'.$_SERVER['PHP_SELF'].'?language=en" style="text-decoration:none"><img src="../language/en/en.gif" alt="" width="80" height="50" /></a></td>
        </tr>
		<tr>
			<td align="center">فارسی</td>
			<td align="center">English</td>
		</tr>
    </table></fieldset></div>';

	
if(isset($_GET['language'])){
	$_SESSION['language']=$_GET['language'];
	echo '<script type="text/javascript" language="javascript">
	window.location = "step0.php"
	</script>';
}

?>