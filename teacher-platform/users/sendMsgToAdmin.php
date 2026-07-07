<?php
session_start();
if(!isset($_SESSION['validUser'])) exit;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../themes/default/css/users.css">

<title>Untitled Document</title>
</head>

<body>
<form method="post" action="sendMsgToAdminP.php">
<input type="hidden" name="hideUser" id="hideUser" value="<?php echo $_SESSION['validUser']; ?>" />
<table border="0" cellpadding="0" cellspacing="" width="500px" align="center">
<tr>
	<td><p align="center">عنوان ( لطفا عنوان مناسب برای پیغام خود انتخاب کنید ) :
</p>
	  <p align="center">
  <input type="text" name="msgTitle" id="msgTitle" />
      </p></td>
    </tr>
<tr>
	<td><textarea name="msgText" cols="75'" rows="8" id="msgText" ></textarea></td>
    </tr>
<tr>
	<td align="center"><input type="submit" value="ارسال" class="greenBut" /></td>
</tr>
</table>
</form>
</body>
</html>