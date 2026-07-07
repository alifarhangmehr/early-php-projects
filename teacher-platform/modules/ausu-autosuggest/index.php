<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AUSU DEMO | jQuery-Ajax Auto Suggest Plugin</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.ausu-autosuggest.js"s></script>
<script>

$(document).ready(function() {
    $.fn.autosugguest({  
           className: 'ausu-suggest',
          methodType: 'POST',
            minChars: 2,
              rtnIDs: true,
            dataFile: 'data.php'
    });
});
</script>
</head>
<body>
   <form action="index.php" method="get">
           <div class="ausu-suggest">
              <input type="text" size="25" value="" name="goodName" id="goodName" autocomplete="off" />
              <input type="text" size="4" value="" name="good" id="good" autocomplete="off" disabled="disabled" />
           </div>
           
       </form>

</body>
</html>