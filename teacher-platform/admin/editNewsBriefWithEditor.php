<?php
session_start();
if(!isset($_SESSION['validAdmin'])) exit;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="../themes/default/css/admin.css">
<script type="text/javascript">
    _editor_url  = "../modules/xinha/"  // (preferably absolute) URL (including trailing slash) where Xinha is installed
    _editor_lang = "en";      // And the language we need to use in the editor.
    _editor_skin = "silva";   // If you want use a skin, add the name (of the folder) here
  </script>
  <script type="text/javascript" src="../modules/xinha/XinhaCore.js"></script>
<script type="text/javascript" src="../js/xinha/admin/editNews.js"></script>




</head>

<body>
<br /><br />
<form method="post" action="editNewsP.php">
<table border="0" cellpadding="0" cellspacing="0" align="center">
    <input type="hidden" name="operation" value="2" />
    <tr><td>
    <textarea name="editor1" id="editor1" cols="80" rows="20" >
<?php
$newsBrief=$_POST['hideNewsBrief'];
echo $newsBrief;
?>

    </textarea>
    </td></tr>
<?php
$briefId=$_POST['briefId'];





echo '<input type="hidden" name="briefId" value="'.$briefId.'" />';
echo '<input type="hidden" name="operation" value="2" />';
















?>
<tr><td align="center">
<br />
<input type="submit" value="ارسال" class="greenBut"/>
</td></tr>
</table>
</form>

</body>
</html>


























