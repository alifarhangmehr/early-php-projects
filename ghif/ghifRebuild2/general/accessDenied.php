<?php
session_start();
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title><?php echo $accessDenied_title; ?></title></head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../themes/default/css/index.css">
	<body>
	<br /><br />
<table width="500" border="0" align="center" cellpadding="0" cellspacing="0" style="font-size:12px">
  <tr>
    <td align="right">
    <?php echo $accessDenied_message; ?>
	<a href="<?php echo $_SERVER["HTTP_REFERER"] ?>"><?php echo $accessDenied_goBack_message; ?></a>
    </td>
    <td align="center"><img src="../themes/default/images/stopIcon.png" width="64" height="64" /></td>
  </tr>
</table>
</body>
</html>