<?php
session_start();
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
include('../class/connection.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $step1_title; ?></title>
<link rel="stylesheet" type="text/css" href="../themes/install.css" />
</head>
<body dir="<?php echo $language_direction ?>">
<br />      
<form method="post" action="step1p.php">
<div align="center">
<fieldset style="width:550px">
<legend align="center" style="font-size:14" style="color:#630"><?php echo $step1_title; ?></legend>
<br />
<table align="center" width="455" border="0" cellpadding="8" dir="<?php echo $language_direction; ?>">
    <tr class="installTableTr"> 	 	 	 	 	 	 	 	 	 	 	 	 
        <td width="148" align="right" ><b><?php echo $step1_dbSelect_type.'</b><br />'.$step1_dbSelect_hint.'</td>'; ?>
        <td width="154" align="right"><input name="hostName" type="text" id="hostName" value="localhost" size="30" /></td>
    </tr>
    <tr class="installTableTr"> 	 	 	 	 	 	 	 	 	 	 	 	 
        <td width="148" align="right"><?php echo $step1_db_name; ?></td>
        <td width="154" align="right"><input name="dbName" type="text" id="dbName" value="" size="30" /></td>
    </tr>
    <tr class="installTableTr"> 	 	 	 	 	 	 	 	 	 	 	 	 
    	<td width="148" align="right"><?php echo $step1_db_user_name; ?></td>
        <td width="154" align="right"><input name="dbUser" type="text" id="dbUser" value="" size="30" /></td>
    </tr>
    <tr class="installTableTr"> 	 	 	 	 	 	 	 	 	 	 	 	 
    	<td width="148" align="right"><?php echo $step1_db_pass; ?></td>
    	<td width="154" align="right"><input name="dbPass" type="password" id="dbPass" value="" size="30" /></td>
    </tr>
    <tr class="installTableTr">
    	<td colspan="2" align="center"><input type="submit" class="installSubmit" value="<?php echo $step1_submit; ?>" /></td>
    </tr>  
</table></fieldset></form>


</body>
</html>