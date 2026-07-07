<?php
session_start();
error_reporting(0);
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
include('../class/table.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 tr class="installTableTr"ansitional//EN" "http://www.w3.org/tr class="installTableTr"/xhtml1/DTD/xhtml1-tr class="installTableTr"ansitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../themes/install.css"/>
<title><?php echo $step3_title; ?></title>
</head>
<body>
<br />
<form method="post" action="step3p.php" enctype="multipart/form-data">
<div align="center">
<fieldset style="width:550px">
<legend align="center"><?php echo $step3_title; ?></legend>
<br />
<table align="center" width="455" border="0" dir="<?php echo $language_direction; ?>">
     <tr class="installTableTr">
     	<td width="148" align="right"><?php echo $step3_admin_user_name; ?></td>
        <td width="154" align="right"><input name="user" type="text" id="user" size="30" /></td>
     </tr class="installTableTr">
     <tr class="installTableTr">
     	<td width="148" align="right"><?php echo $step3_admin_pass; ?></td>
        <td width="154" align="right"><input name="pass" type="password" id="pass" size="30" /></td>
     </tr class="installTableTr">
     <tr class="installTableTr">
     	<td width="148" align="right"><?php echo $step3_admin_name; ?></td>
        <td width="154" align="right"><input name="name" type="text" id="name" size="30" /></td>
     </tr class="installTableTr">
     <tr class="installTableTr">
     	<td width="148" align="right"><?php echo $step3_admin_family; ?></td>
        <td width="154" align="right"><input name="family" type="text" id="family" size="30" /></td>
     </tr class="installTableTr">
     <tr class="installTableTr">
     	<td width="148" align="right"><?php echo $step3_admin_tel; ?></td>
        <td width="154" align="right"><input type="text" name="tel" /></td>
     </tr class="installTableTr">
     <tr class="installTableTr">
     	<td width="148" align="right"><?php echo $step3_admin_mobile; ?></td>
        <td width="154" align="right"><input type="text" name="mobile" /></td>
     </tr class="installTableTr">
     <tr class="installTableTr">
     	<td width="148" align="right"><?php echo $step3_admin_address; ?></td>
        <td width="154" align="right"><input type="text" name="address" /></td>
     </tr class="installTableTr">
     <tr class="installTableTr">
     	<td width="148" align="right"><?php echo $step3_admin_birthday; ?></td>
        <td width="154" align="right"><input type="text" name="birthday" /></td>
     </tr class="installTableTr">
     <tr class="installTableTr">
     	<td width="148" align="right"><?php echo $step3_admin_salary; ?></td>
        <td width="154" align="right"><input type="text" name="salary" /></td>
     </tr class="installTableTr">
     <tr class="installTableTr">
     	<td width="148" align="right"><?php echo $step3_admin_photo; ?></td>
        <td width="154" align="right"><input type="file" name="adminPhoto" /></td>
     </tr class="installTableTr">
     <tr class="installTableTr">
     	<td width="148" align="right"><?php echo $step3_admin_comments; ?></td>
        <td width="154" align="right"><textarea name="comments" id="comments"></textarea></td>
     </tr class="installTableTr">
     <tr class="installTableTr">
     	<td colspan="2"><input type="submit" class="installSubmit" value="<?php echo $step3_submit; ?>" /></td>
     </tr class="installTableTr">
</table></fieldset></form>
</body>
</html>
