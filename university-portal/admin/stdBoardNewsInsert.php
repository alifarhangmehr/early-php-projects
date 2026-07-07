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
<script language="javascript" type="text/jscript"></script>
<script language="javascript" type="text/javascript" src="../modules/ckeditor/ckeditor.js"></script>
<script language="javascript" type="text/javascript" src="../modules/ckeditor/_samples/sample.js"></script>
<link href="../modules/ckeditor/_samples/sample.css" rel="stylesheet" type="text/css" />
</head>

<body style="font-family:tahoma">
<br /><br />
<form action="stdBoardNewsInsertP.php" method="post" name="form1" onsubmit="return validateForm()" enctype="multipart/form-data">
  <table align="center" id="newsInsertTable" width="100%" border="0">
    <tr>
      <td id="photoName" width="1" align="right"><label><span style="text-align: right">گروه خبری</span></label></td>
      <td width="387" align="right"><input type="text" name="newsGroup" id="newsGroup" /></td>
      <td width="128" align="right" style="text-align: right">&nbsp;</td>
    </tr>
    <tr>
      <td align="right" id="serie"><span style="text-align: right">نام نویسنده</span></td>
      <td align="right"><input type="text" name="author" id="author" /></td>
      <td align="right" style="text-align: right">&nbsp;</td>
    </tr>
    <tr>
      <td><span style="text-align: right">سطح دسترسی</span></td>
      <td style="text-align: right"><input type="text" name="accessLevel" id="accessLevel" />
      </td>
      <td align="right" style="text-align: right">&nbsp;</td>
    </tr>
    <tr>
      <td><span style="text-align: right">عنوان خبر</span></td>
      <td style="text-align: right"><input type="text" name="newsTitle" id="newsTitle" /></td>
      <td style="text-align: right">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" align="center">
          <label for="editor1"></label>
          <a style="color:#09F; font-size:16px">خلاصه خبر</a>
          <textarea cols="100" id="brief" name="brief" rows="10"></textarea>
          <script type="text/javascript">
			//<![CDATA[

				CKEDITOR.replace( 'brief',
					{
						fullPage : true
					});

			//]]>
			</script>
      </td>
    </tr>
    <tr>
      <td colspan="3" align="center">
        <label for="editor2"></label><br />
        <a style="color:#09F; font-size:16px">متن کامل</a>
        <textarea cols="100" id="newsBody" name="newsBody" rows="10"></textarea>
      <script type="text/javascript">
		//<![CDATA[
			// Replace the <textarea id="editor1"> with an CKEditor instance.
			var editor = CKEDITOR.replace( 'newsBody' );
		//]]>
	  </script>      </td>
    </tr>
    <tr>
      <td><span style="text-align: right">تصویر</span></td>
      <td><input type="file" name="file" id="file" /> </td>
      <td align="right" style="text-align: right">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2" align="center"><input type="submit" id="insertNewsBut" value="ارسال" width="100px" /></td>
    </tr>
  </table>
</form>


</body>
</html>
