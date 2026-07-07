<?php
error_reporting(0);
require('class/farsiNumber.php');
$c2f=new Convertnumber2farsi();


?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="themes/default/css/index.css"/>

<title>فروشگاه تاپیک</title>
</head>

<body>
<br /><br /><br /><br /><br /><br />
<form method="get" action="book.php">
<table width="380px" border="0" align="center" cellpadding="5" cellspacing="5">
  <tr>
    <td align="center"><img src="themes/default/images/factorHeader.png" width="227" height="140" /></td>
  </tr>
  <tr>
    <td align="center">
    <link rel="stylesheet" type="text/css" href="modules/ausu-autosuggest/css/style.css"/>

<script type="text/javascript" src="modules/ausu-autosuggest/js/jquery.min.js"></script>
<script type="text/javascript" src="modules/ausu-autosuggest/js/jquery.ausu-autosuggest.js"></script>
<script>

$(document).ready(function() {
    $.fn.autosugguest({  
           className: 'ausu-suggest',
          methodType: 'POST',
            minChars: 2,
              rtnIDs: true,
            dataFile: 'modules/ausu-autosuggest/data.php'
    });
});

</script>
           <div class="ausu-suggest">
              <input type="text" size="40" value="" name="goodName" id="goodName" autocomplete="off" style="width:380px; height:30px; color:#0099FF; font-size:16px" />
              <br />
              <input type="text" size="30" value="" name="good" id="good" autocomplete="off" style="display:none" />
           </div>
           
    </td>
  </tr>
  <tr>
  <td align="center">
  	<input type="submit" value="جستجو" style="border:medium solid #FF6600; background:#F90; margin:10px; padding:5px; font-family:Tahoma, Geneva, sans-serif; color:#FFFFFF" />
  </td>
  </tr>
   <tr>
  <td align="center" dir="rtl">
  	کرج چهارراه طالقانی بین هلال احمر و دارایی
   <table border="0" dir="ltr"><tr><td> <?php echo $c2f-> Convertnumber2farsi('026'); ?> </td><td> <?php echo $c2f-> Convertnumber2farsi('34209490'); ?></td><td> <?php echo $c2f-> Convertnumber2farsi('-3'); ?></td></tr></table>
  </td>
  </tr>
</table>
</form>
<div align="center" style="position:absolute; bottom:0px; left:0px; width:100%">طراحی شده توسط <a href="mailto:ali.farhangmehr@gmail.com" style="color:#FF6600"> علی فرهنگ مهر</a><br />قدرت گرفته از <a href="http://ghif.org">نرم افزار فروش وحسابداری <span style="color:#FF6600">قیف</span></a><br /><br /><br /></div>
</body>
</html>