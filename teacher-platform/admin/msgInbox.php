<?php
session_start();
if(!isset($_SESSION['validAdmin'])) exit;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="javascript" type="text/javascript" src="../js/admin/admin.js"></script>
<script language="javascript" type="text/javascript" src="../modules/ckeditor/ckeditor.js"></script>
<script language="javascript" type="text/javascript" src="../modules/ckeditor/_samples/sample.js"></script>
<link rel="stylesheet" type="text/css" href="../themes/default/css/admin.css">
<link href="../modules/ckeditor/_samples/sample.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table border="0" cellpadding="5" cellspacing="0" class="table2">
<tr>
	<th style="color:#CC0">نویسنده</th>
    <th style="color:#CC0">نام کاربری</th>    
	<th style="color:#CC0">عنوان</th>
	<th style="color:#CC0">متن</th>
	<th style="color:#CC0">تاریخ شمسی</th>
	<th style="color:#CC0">تاریخ میلادی</th>
    <th style="color:#CC0">ساعت</th>
	<th style="color:#CC0">خوانده شذه ؟</th>
    <th style="color:#CC0">جواب داده شده ؟</th>
</tr>

<?php
include('../class/connect.php');
$con=new connect();
$con-> dbConnect();
$query = "SELECT * from message";
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
		$unReadImg='yesIcon.png';
		$awnserStatusImg='yesIcon.png';
		$onclick='onclick="showAdminAwnserDiv('.$row['id'].')"';
	}else if($row['unRead']==1){
		$unReadImg='yesIcon.png';
		$awnserStatusImg='noAwnserNeedIcon.png';
		$onclick='';
	}else if($row['unRead']==2){
		$unReadImg='yesIcon.png';
		$awnserStatusImg='noIcon.png';
		$onclick='';
	}else if($row['unRead']==3){
		$unReadImg='noIcon.png';
		$awnserStatusImg='noIcon.png';
		$onclick='';
	}
	$inPageId++;
	echo '<tr '.$bgColor.' ondblclick="showAdminAwnserTimeDiv('.$row['id'].')">' ;
	echo '<td align=center id=titleTd'.$row['id'].'>'.$row['name'].'&nbsp;'.$row['family'].'</td>';
	echo '<td align=center id=titleTd'.$row['id'].'>'.$row['user'].'</td>';
	echo '<td align=center id=titleTd'.$row['id'].'>'.$row['msgTitle'].'</td>';
	echo '<td align=center id=msgTextTd'.$row['id'].'><input type="button" class="greenBut" value="نمایش" onclick="showMsgTextDiv('.$row['id'].')" /></td>';
	echo '<div style="display:none" id="hideMsgTextDiv'.$row['id'].'"/>'.$row['msgText'].'</div>';
	echo '<td align=center id=dateENTd'.$row['id'].'>'.$row['dateFA'].'</td>';
	echo '<td align=center id=dateFATd'.$row['id'].'>'.$row['dateEN'].'</td>';
	echo '<td align=center id=timeTd'.$row['id'].'>'.$row['time'].'</td>';
	echo '<td align=center id=unReadTd'.$row['id'].'><img src="../themes/default/images/admin/'.$unReadImg.'" /></td>';
	echo '<td align=center id=awnserTd'.$row['id'].'><img src="../themes/default/images/admin/'.$awnserStatusImg.'" '.$onclick.' /></td>';
	echo '<div style="display:none" id="hideAdminAwnserDiv'.$row['id'].'"/>'.$row['adminAwnser'].'</div>';
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	echo '<div style="display:none" id="hideAdminAwnserFullDateDiv'.$row['id'].'"/>'.$row['aFullDate'].'</div>';
	echo '<div style="display:none" id="hideAdminAwnserDateENDiv'.$row['id'].'"/>'.$row['aDateEN'].'</div>';
	echo '<div style="display:none" id="hideAdminAwnserDateFADiv'.$row['id'].'"/>'.$row['aDateFA'].'</div>';
	echo '<div style="display:none" id="hideAdminAwnserTimeDiv'.$row['id'].'"/>'.$row['aTime'].'</div>';
	
	
	
  }
	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

	?>
    </table>
	<div id="outerMsgTextDiv">
    <div id="msgTextDiv">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr><td align="center">
    <div id="msgTextPanelDiv">
    <table border="0" cellpadding="0" cellspacing="0" height="100%">
    <tr>
    <td><img src="../themes/default/images/close.png" width="22" height="22" onclick="hideMsgTextDiv()" title="بستن صفحه" />&nbsp;&nbsp;&nbsp;</td>
    <td><img src="../themes/default/images/admin/msgReplyIcon.png" width="24" height="24" onclick="msgReply()" title="پاسخ به این پیغام" />&nbsp;&nbsp;&nbsp;</td>
    <td>
    <form method="post" action="sendMsgToUser.php">
    <input type="hidden" name="condition" value="noAwnserNeed" />
    <input type="hidden" name="replyId2" id="replyId2" />
    <input type="image" src="../themes/default/images/admin/noReplyNeed.png" width="24" height="24"  title="این پیغام پاسخی ندارد" />&nbsp;&nbsp;&nbsp;
    </form>
    </td>
    <td>
    <form method="post" action="sendMsgToUser.php">
    <input type="hidden" name="condition" value="markAsRoad" />
    <input type="hidden" name="replyId3" id="replyId3" />
    <input type="image" src="../themes/default/images/admin/markAsReadIcon.png" width="24" height="24" title="نشانه گذاری به عنوان خوانده شده" />
    </form>
    </td>
    </tr>
    </table>
    </div>
    </td></tr>
    <tr><td id="msgTextTd">
    
    </td></tr>
    </table>
    </div>
    </div>









	<div id="outerMsgReplyDiv">
    <div id="msgReplyDiv">
    <form method="post" action="sendMsgToUser.php">
    <input type="hidden" name="condition" id="condition" value="reply" />
    <input type="hidden" name="replyId" id="replyId" />
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr><td align="center">
    <img src="../themes/default/images/close.png" width="22" height="22" onclick="hideReplyDiv()" title="بستن صفحه" />
    <br />
    <textarea name="replyText" cols="50" rows="8" id="replyText"></textarea>
    </td></tr>
    <tr><td align="center">
    <br />
    <input type="submit" class="greenBut" value="ارسال پاسخ" />
    </td></tr>
    </table>
    </form>
    </div>
    </div>




	<div id="outerAdminAwnserDiv">
    <div id="adminAwnserDiv">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr><td align="center">
    <div id="adminAwnserPanelDiv"><img src="../themes/default/images/close.png" width="22" height="22" onclick="hideAdminAwnserDiv()" title="بستن صفحه" /></div>
    </td></tr>
    <tr><td id="adminAwnserTd">
    </td></tr>
    </table>
    </div>
    </div>



	<div id="outerAdminAwnserTimeDiv"> 
   	<div id="adminAwnserTimeDiv">
      <table width="300px" border="0">
        <tr>
          <th colspan="2"><p>اطلاعات زیر مربوط به پاسخ به سوال توسط مدیر میباشد</p></th>
        </tr>
        <tr>
          <td style="color:#FC0">تاریخ</td>
          <td style="color:#FC0" id="awnserDateTd"></td>
        </tr>
        <tr>
          <td style="color:#6C6">تاریخ شمسی</td>
          <td style="color:#6C6" id="awnserDateFATd"></td>
        </tr>
        <tr>
          <td style="color:#FC0">تاریخ میلادی</td>
          <td style="color:#FC0" id="awnserDateENTd"></td>
        </tr>
        <tr>
          <td style="color:#6C6">ساعت</td>
          <td style="color:#6C6" id="awnserTimeTd"></td>
        </tr>
        <tr>
      <td colspan="2"><img src="../themes/default/images/close.png" onclick="hideAdminAwnserTimeDiv()"  /></td>
      </tr>
      </table>
   	</div>
    </div>

















   </body>
   </html>