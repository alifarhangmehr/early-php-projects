<?php
session_start();
if($_SESSION['allowEnterAdminArea']!=true){
	echo '
	<html><body>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="themes/default/css/index.css">
	<p align="center">ّبرای دسترسی به این قسمت باید از لینک زیر افدام نمایید</p>
	<p align="center">ّ<a href="adminLogin.php">ورود مدیر</a></p>
</body>
</html>
';
	exit;	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="themes/default/css/index.css"/>



<title>افزودن کالا</title>
<!-- TinyMCE -->
<script type="text/javascript" src="moduels/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		formats : {
			alignleft : {selector : 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes : 'left'},
			aligncenter : {selector : 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes : 'center'},
			alignright : {selector : 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes : 'right'},
			alignfull : {selector : 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes : 'full'},
			bold : {inline : 'span', 'classes' : 'bold'},
			italic : {inline : 'span', 'classes' : 'italic'},
			underline : {inline : 'span', 'classes' : 'underline', exact : true},
			strikethrough : {inline : 'del'}
		},

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
<!-- /TinyMCE -->
</head>

<body>

<table width="500" border="1" align="center" >
  <tr>
    <td colspan="7">
    <form method="post" action="addGoodP.php" enctype="multipart/form-data">
<table align="center" width="100%" border="0">
<colgroup></colgroup>
<colgroup></colgroup>
<colgroup style="background:#CCC"></colgroup>	 	 	 	 	 	 	 	 
  <tr>
    <td width="343" align="right"><input type="text" name="goodName" id="goodName" /></td>
    <td width="101" align="right">نام محصول</td>
    <td width="32" align="center">1</td>
  </tr>
  <tr>
    <td width="343" align="right"><input type="text" name="purchaseLink" id="purchaseLink" /></td>
    <td width="101" align="right">لینک خرید پستی</td>
    <td width="32" align="center">2</td>
  </tr>
  <tr>
    <td width="343" align="right"><input type="text" name="price" id="price" /></td>
    <td width="101" align="right">قیمت</td>
    <td width="32" align="center">3</td>
  </tr><tr>
    <td width="343" align="right">
    <select name="group" id="group">
    	<option value="1">گوشی 2 سیم کارت</option>
        <option value="3">گوشی 4 سیم کارت</option>
        <option value="2">گوشی طرح اصلی</option>
        <option value="4">بلوتوث هندسفری</option>
    </select>
    </td>
    <td width="101" align="right">گروه</td>
    <td width="32" align="center">4</td>
  </tr>
  <tr>
    <td width="343" align="right">
    <select name="brand" id="brand">
    	<option value="1">nokia</option>
        <option value="2">LG</option>
        <option value="3">huawei</option>
        <option value="4">apple</option>
        <option value="5">sony ericsson</option>
        <option value="6">HTC</option>
        <option value="7">samsung</option>
 		<option value="8">GLX</option>
    </select>
    </td>
    <td width="101" align="right">ّبرند</td>
    <td width="32" align="center">4</td>
  </tr>
  <tr>
    <td width="343" align="right"><input type="file" name="file" /></td>
    <td width="101" align="right">عکس</td>
    <td width="32" align="center">5</td>
  </tr><tr>
    <td width="343" align="right">&nbsp;</td>
    <td width="101" align="right">مشخصات</td>
    <td width="32" align="center">6</td>
  </tr>
  <tr>
    <td colspan="3" align="right"><textarea name="comments" id="comments"></textarea></td>
    </tr>

  <tr>
    <td colspan="3" align="center"><input type="submit" value="افزودن" /></td>
  </tr>
  
</table>
</form>
    </td>
  </tr>
  

</table>
</body>
</html>