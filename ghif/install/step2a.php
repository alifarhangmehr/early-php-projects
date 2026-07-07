<?php
session_start();
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
include('../class/connection.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../themes/install.css"/>
<link rel="shortcut icon" href="../themes/favicon.ico" type="image/x-icon">
<link rel="icon" href="../themes/favicon.ico" type="image/x-icon">
<title><?php echo $step2a_title; ?></title>
</head>
<body>
<br />
<p align="center"><?php echo $step2a_header_attention; ?></p>
<form method="post" action="step2ap.php">
<div align="center">
<fieldset style="width:700px">
<legend align="center"><?php echo $step2a_title; ?></legend>
<br />
<table align="center" width="455" border="0" dir="<?php echo $language_direction; ?>">

<?php
for($i=1;$i<=$_SESSION['fieldCount'];$i++){
	echo'<tr class="installTableTr">
     <td width="148" align="right">'.$step2a_filed.$i.'</td>
	 <td width="154" align="right"> <input name="field'.$i.'" type="text" size="30" /></td>
     </tr>
	 ';
}
?> 
<tr class="installTableTr">
	 <td colspan="2"><input type="submit" class="installSubmit" value="<?php echo $step2a_submit; ?>" /></td>
</tr>
</table></fieldset></form>

</body>
</html>
