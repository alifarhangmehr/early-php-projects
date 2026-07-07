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
<script language="javascript" type="text/javascript" src="../js/admin/admin.js"></script>
<link rel="stylesheet" type="text/css" href="../themes/default/css/admin.css">
<link href="../modules/ckeditor/_samples/sample.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table border="0" cellpadding="5" cellspacing="0" id="showNewsTable">
<tr>    
	<th style="color:#CC0000">عکس</th>
	<th style="color:#CC0000">عنوان</th>
	<th style="color:#CC0000">تاریخ میلادی</th>
	<th style="color:#CC0000">تاریخ شمسی</th>
	<th style="color:#CC0000">گروه خبری</th>
	<th style="color:#CC0000">نویسنده</th>
    <th style="color:#CC0000">سطح دسترسی</th>
    <th style="color:#CC0000">ساعت</th>
    <th style="color:#CC0000">حذف</th>

</tr>
	
	
	
	
	

<?php
include('../class/connect.php');
	echo'<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
	echo'<link rel="stylesheet" type="text/css" href="../themes/default/css/admin.css">';
	$con=new connect();
	$con-> dbConnect();
	$query = "SELECT * from news";
	$result=$con->queryRun($query);
$inPageId=0;
while($row = mysql_fetch_array($result))
  {
	if(($inPageId%2)!=0){
		$bgColor='bgcolor="#666666"';
	}else{
		$bgColor='';
	}
	$inPageId++;
	echo '<tr '.$bgColor.'ondblclick="showModifiedDetailsDiv('.$row['id'].')" >' ;
	echo '<td align=center id=imageTd'.$row['id'].'><img src="../'.$row['image'].'" /></td>';;
	echo '<td align=center id=newsTitleTd'.$row['id'].'>'.$row['newsTitle'].'</td>';
	echo '<td align=center id=dateENTd'.$row['id'].'>'.$row['dateEN'].'</td>';
	echo '<td align=center id=dateFATd'.$row['id'].'>'.$row['dateFA'].'</td>';
	echo '<td align=center id=newsGroupTd'.$row['id'].'>'.$row['newsGroup'].'</td>';
	echo '<td align=center id=authorTd'.$row['id'].'>'.$row['author'].'</td>';
	echo '<td align=center id=accessLevelTd'.$row['id'].'>'.$row['accessLevel'].'</td>';
	echo '<td align=center id=newsTimeTd'.$row['id'].'>'.$row['newsTime'].'</td>';
	echo '<td align=center id=deleteTd'.$row['id'].'><input type="button" id="deleteNewsBut" value="پاک کن !" onClick="showDeleteNewsDiv('.$row['id'].')" /></td>';
	
	echo '<div style="display:none" id=lastDateModified'.$row['id'].'>'.$row['lastDateModified'].'</td>';
	echo '<div style="display:none" id=lastDateENModified'.$row['id'].'>'.$row['lastDateENModified'].'</td>';
	echo '<div style="display:none" id=lastDateFAModified'.$row['id'].'>'.$row['lastDateFAModified'].'</td>';
	echo '<div style="display:none" id=lastTimeModified'.$row['id'].'>'.$row['lastTimeModified'].'</td>';
	echo '<div style="display:none" id=lastOneModified'.$row['id'].'>'.$row['lastOneModified'].'</td>';

	
	
	echo '<div style="display:none" id=newsBodyHideDiv'.$row['id'].'>'.$row['newsBody'].'</div>';
	echo '<div style="display:none" id=briefHideDiv'.$row['id'].'>'.$row['brief'].'</div>';
	
}
	
	

	
	
	
	?>
	</tr>
    </table>
    <div id="outerLastModifiedDetailsDiv"> 
   	<div id="lastModifiedDetailsDiv">
      <table width="300px" border="0">
        <tr>
          <th colspan="2"><p>اطلاعات زیر مربوط به آخرین تغییرات خبر می باشد</p></th>
        </tr>
        <tr>
          <td style="color:#6C6">نوسنده</td>
          <td style="color:#6C6" id="lastOneModifiedTd"></td>
        </tr>
        <tr>
          <td style="color:#FC0">تاریخ</td>
          <td style="color:#FC0" id="lastDateModifiedTd"></td>
        </tr>
        <tr>
          <td style="color:#6C6">تاریخ شمسی</td>
          <td style="color:#6C6" id="lastDateFAModifiedTd"></td>
        </tr>
        <tr>
          <td style="color:#FC0">تاریخ میلادی</td>
          <td style="color:#FC0" id="lastDateENModifiedTd"></td>
        </tr>
        <tr>
          <td style="color:#6C6">ساعت</td>
          <td style="color:#6C6" id="lastTimeModifiedTd"></td>
        </tr>
        <tr>
      <td colspan="2"><img src="../themes/default/images/close.png" onclick="hideModifiedDetailsDiv()"  /></td>
      </tr>
      </table>
   	</div>
    </div>
<div id="outerDeleteNewsDiv">   
    <div id="deleteNewsDiv">
    <form method="post" action="deleteNewsP.php">
    <input type="hidden" name="deleteId" id="deleteId" />
    <table align="center" width="300px" border="0" dir="rtl">
    <tr>
      <td id="photoName" >آیا مطمئن هستید ؟</td>
    </tr>
    <tr>
      <td width="100%"><input type="submit" name="yesDeleteNewsBut" id="yesDeleteNewsBut" value="بله" />&nbsp;&nbsp;&nbsp;<input type="button" name="noDeleteNewsBut" id="noDeleteNewsBut" value="خیر" onclick="hideDeleteNewsDiv()" /></td>
  	</tr>
    </table>
    </form>
</div>
</div>    
</body>
</html> 
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    