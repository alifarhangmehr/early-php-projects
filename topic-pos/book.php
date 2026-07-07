<?php
error_reporting(0);
require('class/farsiNumber.php');
$c2f=new Convertnumber2farsi();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="themes/default/css/index.css"/>
<title>فروشگاه تاپیک</title>



</head>
<body>



<?php
	require('class/connection.php');
	
	include('header.php');
	$barcode=$_GET['good'];
	
	$connector0=new connection();
	$query0="SELECT * FROM goods WHERE barcode='$barcode'";
	$result0=$connector0->queryRun($query0);
	$row0 = mysql_fetch_array($result0);
	
	
	
	
	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	
?>

<br />
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
</form><div align="center">
<fieldset style="width:500px">
<legend align="center" style="color:#666">محصول</legend>
<br /><br />
<table width="500" border="0" align="center" cellpadding="2" cellspacing="2" style="font-size:14px">

  <tr>
    <td width="154" align="right" dir="rtl"><?php echo $row0['goodName']; ?></td>
    <td width="148" align="right">نام محصول</td>
  </tr>
   <tr>
    <td width="154" align="right" bgcolor="#CCCCCC" dir="rtl"><?php echo $row0['sellPrice']; ?> ريال</td>
    <td width="148" align="right" bgcolor="#CCCCCC">قیمت فروش</td>
  </tr>
  <tr>
    <td width="154" align="right" dir="rtl"><?php if($row0['userDiscount']!='') echo $row0['userDiscount'].' درصد'; ?> </td>
    <td width="148" align="right">تخفیف اعضا</td>
  </tr>
  <tr>
    <td width="154" align="right" bgcolor="#CCCCCC" dir="rtl"><?php if($row0['normalDiscount']!='') echo $row0['normalDiscount'].' درصد'; ?> </td>
    <td width="148" align="right" bgcolor="#CCCCCC">تخفیف عادی</td>
  </tr>

   <?php
   $i=1;
	$connector=new connection();
	$query  = "SELECT * FROM goodfields ORDER BY `goodfields`.`goodFieldId` ASC";
	$result=$connector->queryRun($query);
	while($row = mysql_fetch_array($result)){
		if($i%2==0) $bgColor='bgcolor="#CCCCCC"'; else $bgColor='';
			$field='field'.$i;
			$fieldId='fieldId'.$i;
			$fieldName='fieldName'.$i;
			$goodFieldId=$row0[$fieldId];
			$connector1=new connection();
			$query1="SELECT * FROM `$field` WHERE `$fieldId`='$goodFieldId'";
			$result1=$connector1->queryRun($query1);
			$row1 = mysql_fetch_array($result1);
			$goodFieldName2=$row1[$fieldName];
			$goodFieldId2=$row1[$fieldId];
		
		echo '
		   <tr>
			 <td width="154" align="right" '.$bgColor.'>
			 '.$goodFieldName2.'
			 </td>
			 <td width="148" align="right" '.$bgColor.'>'.$row['goodFieldName'].'</td>
		   </tr> 
   ';
   $i++;
	
	}
   ?>

  
</table>
</fieldset>


</div>
<br /><br />
<div align="center" style="width:100%">طراحی شده توسط <a href="mailto:ali.farhangmehr@gmail.com" style="color:#FF6600"> علی فرهنگ مهر</a><br />قدرت گرفته از <a href="http://ghif.org">نرم افزار فروش وحسابداری <span style="color:#FF6600">قیف</span></a><br /><br /><br /></div>

</body>
</html>
