<?php
session_start();
if(!isset($_SESSION['validAdmin'])) exit;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="javascript" type="text/javascript" src="../modules/ckeditor/ckeditor.js"></script>
<script language="javascript" type="text/javascript" src="../modules/ckeditor/_samples/sample.js"></script>
<link rel="stylesheet" type="text/css" href="../themes/default/css/admin.css">
<link href="../modules/ckeditor/_samples/sample.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table border="0" cellpadding="5" cellspacing="0" id="showUserTable">
<tr>    
	<th style="color:#CC0000">تایید</th>
    <th style="color:#CC0000">نویسنده</th>
	<th style="color:#CC0000">متن</th>
	<th style="color:#CC0000">سایت</th>
	<th style="color:#CC0000">ایمیل</th>
    <th style="color:#CC0000">ایمیل واقعی</th>
	<th style="color:#CC0000">وضعیت تایید</th>
    <th style="color:#CC0000">تاریخ شمسی</th>
    <th style="color:#CC0000">تاریخ میلادی</th>
	<th style="color:#CC0000">ساعت</th>
    <th style="color:#CC0000">تاریخ میلادی تایید</th>
    <th style="color:#CC0000">تاریخ شمسی تایید</th>
    <th style="color:#CC0000">ساعت تایید</th>
    <th style="color:#CC0000">حذف</th>
</tr>

<?php


include('../class/connect.php');
$con=new connect();
$con-> dbConnect();
$query = "SELECT * from comments";
$result=$con->queryRun($query);
$inPageId=0;
while($row = mysql_fetch_array($result))
  {
	if(($inPageId%2)!=0){
		$bgColor='bgcolor="#666666"';
	}else{
		$bgColor='';
	}
	if($row['cConfirm']=="yes"){
		$confirmImg='<img src="../themes/default/images/admin/yesIcon.png" />';
		$confirmBut='<input type="submit" id="confrimNoBut" value="عدم تایید" />';
		$operation='op1';
		
	}else{
		$confirmImg='<img src="../themes/default/images/admin/noIcon.png" />';
		$confirmBut='<input type="submit" id="confrimYesBut" value="تایید" />';
		$operation='op2';
	}
	
	
	$inPageId++;
	echo '<tr '.$bgColor.'>' ;
	echo '<td align=center id=userTd'.$row['cId'].'><form method="post" action="userCommentsP.php"><input type="hidden" name="hideOP" value="'.$operation.'" /><input type="hidden" name="hideCId" value="'.$row['cId'].'"  />'.$confirmBut.'</form></td>';
	
	
	
	
	echo '<td align=center id=userTd'.$row['cId'].'>'.$row['cUser'].'</td>';
	echo '<td align=center id=bodyTd'.$row['cId'].'><input type="button" value="نمایش" id="showCBodyBut" onclick="showCBodyDiv('.$row['cId'].')" /></td>';
	echo '<td align=center id=webPageTd'.$row['cId'].'>'.$row['cWebPage'].'</td>';
	echo '<td align=center id=emailTd'.$row['cId'].'>'.$row['cEmail'].'</td>';
	echo '<td align=center id=reallEmailTd'.$row['cId'].'>'.$row['cReallEmail'].'</td>';
	
	
	
	echo '<td align=center id=confirmTd'.$row['cId'].'>'.$confirmImg.'</td>';
	
	
	
	echo '<td align=center id=dateFATd'.$row['cId'].'>'.$row['dateFA'].'</td>';
	echo '<td align=center id=dateENTd'.$row['cId'].'>'.$row['dateEN'].'</td>';
	echo '<td align=center id=time'.$row['cId'].'>'.$row['cTime'].'</td>';
	echo '<td align=center id=confirmDateENTd'.$row['cId'].'>'.$row['confirmDateEN'].'</td>';
	echo '<td align=center id=confirmDateFATd'.$row['cId'].'>'.$row['confirmDateFA'].'</td>';
	echo '<td align=center id=confirmTimeTd'.$row['cId'].'>'.$row['confirmTime'].'</td>';
	echo '<td align=center id=deleteCommentTd'.$row['cId'].'><img src="../themes/default/images/admin/deleteCommentsIcon2.png" onclick="showDeleteCommentsDiv('.$row['cId'].')" /></td>';
	echo '<div id="hideCBody'.$row['cId'].'" style="display:none">'.$row['cBody'].'</div>';
	
	echo '</tr>';
	
	
	
	
	
  }
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

	?>
    </table>

<div id="outerCBodyDiv">   
    <div id="cBodyDiv">
    <div id="cPanelDiv"><img src="../themes/default/images/closeComments.png" width="22" height="22" onclick="hideCBodyDiv()" /></div>
    <table>
    <tr>
   	<td id="hideCBodyTd"></td>
    </tr>
    </table>   
	</div>
</div>    




<div id="outerDeleteNewsDiv">   
    <div id="deleteNewsDiv">
    <form method="post" action="userCommentsP.php">
    <input type="hidden" name="hideCId" id="deleteCommentId" />
    <input type="hidden" name="hideOP" id="deleteOP" />
    <table align="center" width="300px" border="0" dir="rtl">
    <tr>
      <td >آیا مطمئن هستید ؟</td>
    </tr>
    <tr>
      <td width="100%"><input type="submit" name="yesDeleteCommentBut" id="yesDeleteCommentBut" value="بله" />&nbsp;&nbsp;&nbsp;<input type="button" name="noDeleteCommentBut" id="noDeleteCommentBut" value="خیر" onclick="hideDeleteCommentDiv()" /></td>
  	</tr>
    </table>
    </form>
</div>
</div>  













<script language="javascript" type="text/javascript" src="../java/admin/admin.js"></script>

    
    
    
   </body>
    </html> 
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    