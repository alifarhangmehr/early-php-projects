<?php
session_start();
if(!isset($_SESSION['validUser'])) exit;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="javascript" type="text/javascript" src="../js/users/users.js"></script>
<script language="javascript" type="text/javascript" src="../modules/ckeditor/ckeditor.js"></script>
<script language="javascript" type="text/javascript" src="../modules/ckeditor/_samples/sample.js"></script>
<link rel="stylesheet" type="text/css" href="../themes/default/css/users.css">
<link href="../modules/ckeditor/_samples/sample.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table border="0" cellpadding="5" cellspacing="0" class="table2">
<tr>    
	<th style="color:#CC0">عنوان</th>
	<th style="color:#CC0">متن</th>
    <th style="color:#CC0">جواب مدیر</th>
	<th style="color:#CC0">تاریخ شمسی</th>
	<th style="color:#CC0">تاریخ میلادی</th>
    <th style="color:#CC0">ساعت</th>
	<th style="color:#CC0">آیا توسط مدیر بررسی شده ؟</th>
</tr>
	

<?php
$user=$_SESSION['validUser'];
include('../class/connect.php');
$con=new connect();
$con-> dbConnect();
$query = "SELECT * from message WHERE user = '$user' ";
//$query = "SELECT * from message";
$result=$con->queryRun($query);
$inPageId=0;
while($row = mysql_fetch_array($result))
  {
	if(($inPageId%2)!=0){
		$bgColor='bgcolor="#666666"';
	}else{
		$bgColor='';
	}
	if($row['unRead']==0){
		$adminCheckImg='adminCheckMsg0.png';
		$adminCheckTitle='پیغام شما مورد بررسی مدیر قرار گرفته و مدیر به آن پاسخ داده';
		$disable='';
		$value='مشاهده';
	}else if($row['unRead']==1){
		$adminCheckImg='adminCheckMsg1.png';
		$adminCheckTitle='پیغام شما مورد بررسی مدیر قرار گرفته - پیغام شما پاسخ ندارد ';
		$disable='disabled="disabled"';
		$value='پاسخ ندارد';
	}else if($row['unRead']==2){
		$adminCheckImg='adminCheckMsg2.png';
		$adminCheckTitle='پیغام شما مورد بررسی مدیر قرار گرفته ولی مدیر تا کنون به آن پاسخ نداده است';
		$disable='disabled="disabled"';
		$value='تا کنون بدون پاسخ';
	}else if($row['unRead']==3){
		$adminCheckImg='adminCheckMsg3.png';
		$adminCheckTitle='پیغام شما بررسی نشده است';
		$disable='disabled="disabled"';
		$value='تا کنون بدون پاسخ';
	}
	
	$inPageId++;
	echo '<tr '.$bgColor.'>' ;
	echo '<td align=center id=titleTd'.$row['id'].'>'.$row['msgTitle'].'</td>';
	echo '<td align=center id=msgTextTd'.$row['id'].'><input type="button" class="greenBut" value="نمایش" onclick="showMsgTextDiv('.$row['id'].')" /></td>';
	echo '<div style="display:none" id="hideMsgTextDiv'.$row['id'].'"/>'.$row['msgText'].'</div>';
	echo '<div style="display:none" id="hideAdminAwnserDiv'.$row['id'].'"/>'.$row['adminAwnser'].'</div>';
	echo '<td align=center id=adminAwnserTd'.$row['id'].'><input type="button" class="redBut" value="'.$value.'" '.$disable.' onclick="showAdminAwnserDiv('.$row['id'].')" /></td>';
	echo '<td align=center id=dateENTd'.$row['id'].'>'.$row['dateFA'].'</td>';
	echo '<td align=center id=dateFATd'.$row['id'].'>'.$row['dateEN'].'</td>';
	echo '<td align=center id=timeTd'.$row['id'].'>'.$row['time'].'</td>';
	echo '<td align=center id=checkByAdminTd'.$row['id'].'><img src="../themes/default/images/users/'.$adminCheckImg.'" title="'.$adminCheckTitle.'" /></td>';

	
	
	
}

	

	?>
    </table>
	<div id="outerMsgTextDiv">
    <div id="msgTextDiv">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr><td align="center">
    <div id="msgTextPanelDiv"><img src="../themes/default/images/close.png" width="22" height="22" onclick="hideMsgTextDiv()" /></div>
    </td></tr>
    <tr><td id="msgTextTd">
    
    </td></tr>
    </table>
    </div>
    </div>

    <div id="outerAdminAwnserDiv">
    <div id="adminAwnserDiv">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr><td align="center">
    <div id="adminAwnserPanelDiv"><img src="../themes/default/images/close.png" width="22" height="22" onclick="hideAdminAwnserDiv()" /></div>
    </td></tr>
    <tr><td id="adminAwnserTd">
    
    </td></tr>
    </table>
    </div>
    </div>








   </body>
   </html> 
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    