<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="themes/default/css/index.css"/>

<title>جزوه</title>
</head>

<body>
<br /><br /><br />

<table width="375px" border="0" align="center" cellpadding="5" cellspacing="5">
  <tr>
    <td align="center"><img src="themes/default/images/header.jpg" width="345" height="275" /></td>
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

</script><form method="get" action="search.php">
           <div class="ausu-suggest">
           	
              <input type="text" size="40" value="" name="search" id="search" autocomplete="off" style="width:380px; height:30px; color:#0099FF; font-size:16px" />
              
              <input type="text" size="30" value="" name="id" id="id" autocomplete="off" style="display:none" />
              <input type="submit" value="جستجو" style="border:medium solid #FF6600; background:#F90; margin:10px; padding:5px; font-family:Tahoma, Geneva, sans-serif; color:#FFFFFF" />
              
              <br />
             
           </div>
           </form>
    </td>
  </tr>
  <tr>
  <td align="center">
  	<a href="register.php">ثبت نام</a> | 
  	<a href="login.php">ورود اساتید</a> | 
	<a href="">اساتید</a> | 
	<a href="">اساتید</a>
  </td>
  </tr>
   <tr>
  <td align="center" dir="rtl">
  	جسنجوی نام اساتید
  </td>
  </tr>
</table>
</form>
<div align="center" style="position:absolute; bottom:0px; left:0px; width:100%">طراحی شده توسط <a href="mailto:ali.farhangmehr@gmail.com" style="color:#FF6600"> علی فرهنگ مهر</a><br /><br /></div>
</body>
</html>