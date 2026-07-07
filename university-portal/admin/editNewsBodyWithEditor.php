<?php
session_start();
if(!isset($_SESSION['validAdmin'])) exit;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../themes/default/css/admin.css">
<script type="text/javascript">
    _editor_url  = "../modules/xinha/"  // (preferably absolute) URL (including trailing slash) where Xinha is installed
    _editor_lang = "en";      // And the language we need to use in the editor.
    _editor_skin = "silva";   // If you want use a skin, add the name (of the folder) here
  </script>
  <script type="text/javascript" src="../modules/xinha/XinhaCore.js"></script>
<script type="text/javascript" src="../java/xinha/admin/editNews.js"></script>
<title>Untitled Document</title>
</head>

<body>
<form method="post" action="editNewsP.php">
<table border="0" cellpadding="0" cellspacing="0" align="center">

    <input type="hidden" name="operation" value="3" />
        <tr><td>

    <textarea name="editor2" id="editor2" cols="80" rows="20" >
<?php
$newsBody=$_POST['hideNewsBody'];
echo $newsBody;
?>
    </textarea>
        </td></tr>

<?php
$newsId=$_POST['newsId'];

echo '<input type="hidden" name="newsId" value="'.$newsId.'" />';
echo '<input type="hidden" name="operation" value="3" />';


?>
<tr><td align="center">
<br />
<input type="submit" value="ارسال" class="greenBut"/>
</td></tr>
</table>
</form>
</body>
</html>