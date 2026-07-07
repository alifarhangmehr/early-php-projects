<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>changing theme</title>
</head>

<body>
<?php
$theme=$_GET['theme'];
$_SESSION['theme']=$theme;
?>
<script language="javascript" type="text/javascript">
window.location="<?php echo $_SERVER["HTTP_REFERER"]; ?>";
</script>
</body>
</html>