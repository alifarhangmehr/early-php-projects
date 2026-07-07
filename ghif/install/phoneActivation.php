<?php
session_start();
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
include('../class/connection.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $phoneActivation_title; ?></title>
<link rel="stylesheet" type="text/css" href="../themes/install.css" />
</head>
<body dir="<?php echo $language_direction ?>">
<p align="center">
<?php
echo $phoneActivation_message;
echo '<br /><br />';
$uuid=$_GET['uuid'];
echo $uuid;
?>
</p>
</body>
</html>
