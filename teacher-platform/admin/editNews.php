<?php
session_start();
if(!isset($_SESSION['validAdmin'])) exit;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />











<script type="text/javascript">
    _editor_url  = "../modules/xinha/"  // (preferably absolute) URL (including trailing slash) where Xinha is installed
    _editor_lang = "en";      // And the language we need to use in the editor.
    _editor_skin = "silva";   // If you want use a skin, add the name (of the folder) here
  </script>
  <script type="text/javascript" src="../modules/xinha/XinhaCore.js"></script>
<script type="text/javascript" src="../js/xinha/admin/editNews.js"></script>

















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
    <th style="color:#CC0000">متن خبر</th>
    <th style="color:#CC0000">خلاصه خبر</th>
    <th style="color:#CC0000">ساعت</th>
    <th style="color:#CC0000">تغییر</th>

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
	
	
	echo '<td align=center id=imageTd'.$row['id'].'><a href="../'.$row['photoSource'].'" ><img src="../'.$row['photo1'].'" border="1" /></a></td>';;
	echo '<td align=center id=newsTitleTd'.$row['id'].'>'.$row['newsTitle'].'</td>';
	echo '<td align=center id=dateENTd'.$row['id'].'>'.$row['dateEN'].'</td>';
	echo '<td align=center id=dateFATd'.$row['id'].'>'.$row['dateFA'].'</td>';
	echo '<td align=center id=newsGroupTd'.$row['id'].'>'.$row['newsGroup'].'</td>';
	echo '<td align=center id=authorTd'.$row['id'].'>'.$row['author'].'</td>';
	echo '<td align=center id=accessLevelTd'.$row['id'].'>'.$row['accessLevel'].'</td>';
	
	
	
	
	
	
	echo '<td align=center id=newsBodyTd'.$row['id'].'><input type="button" id="showNewsBodyBut" value="نمایش" onClick="showNewsBodyDiv('.$row['id'].')" /></td>';
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	echo '<td align=center id=briefTd'.$row['id'].'><input type="button" id="showBriefBut" value="نمایش" onClick="showBriefDiv('.$row['id'].')" /></td></td>';
	
	
	
	
	
	
	
	
	
	
	
	
	
	echo '<td align=center id=newsTimeTd'.$row['id'].'>'.$row['newsTime'].'</td>';
	echo '<td align=center id=editTd'.$row['id'].'><input type="button" id="showEditBut" value="ویرایش" onClick="showEditDiv('.$row['id'].')" /></td>';
	
	echo '<div style="display:none" id=lastDateModified'.$row['id'].'>'.$row['lastDateModified'].'</td>';
	echo '<div style="display:none" id=lastDateENModified'.$row['id'].'>'.$row['lastDateENModified'].'</td>';
	echo '<div style="display:none" id=lastDateFAModified'.$row['id'].'>'.$row['lastDateFAModified'].'</td>';
	echo '<div style="display:none" id=lastTimeModified'.$row['id'].'>'.$row['lastTimeModified'].'</td>';
	echo '<div style="display:none" id=lastOneModified'.$row['id'].'>'.$row['lastOneModified'].'</td>';

	
	
	echo '<div style="display:none" id=newsBodyHideDiv'.$row['id'].'>'.$row['newsBody'].'</div>';
	echo '<div style="display:none" id=briefHideDiv'.$row['id'].'>'.$row['brief'].'</div>';
	echo '<div style="display:none" id=newsIdDiv'.$row['id'].'>'.$row['newsId'].'</div>';
	
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
<div id="outerEditDiv">   
    <div id="editDiv">
    <form method="post" action="editNewsP.php" enctype="multipart/form-data">
    <input type="hidden" name="operation" value="1" />
    <input type="hidden" name="editId" id="editId" />
    <table align="center" width="300px" border="0" dir="rtl">
    <tr style="display:none">
      <td>&nbsp;</td>
      <td style="text-align: right">آیدی</td>
      <td style="text-align: right"><input type="text" name="newsId" id="newsId" /></td>
    </tr>
    <tr>
      <td id="photoName" width="185" align="right">&nbsp;</td>
      <td width="100%" align="right">گروه خبری</td>
      <td width="103" align="right" style="text-align: right"><input type="text" name="newsGroup" id="newsGroup" /></td>
    </tr>
    <tr>
      <td align="right" id="serie">&nbsp;</td>
      <td align="right">نام نویسنده</td>
      <td align="right" style="text-align: right"><input type="text" name="author" id="author" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td style="text-align: right">سطح دسترسی</td>
      <td align="right" style="text-align: right"><input type="text" name="accessLevel" id="accessLevel" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td style="text-align: right">عنوان خبر</td>
      <td style="text-align: right"><input type="text" name="newsTitle" id="newsTitle" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td style="text-align: right">عکس</td>
      <td style="text-align: right"><input type="file" name="file" id="file" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2" align="center"><input type="submit" id="editNewsBut" value="تائيد" /></td>
      </tr>
       <tr>
      <td colspan="3"><img src="../themes/default/images/close.png" onclick="hideEditDiv()"  /></td>
      </tr>
  </table>
    </form>
</div>
    </div>    
    <div id="outerBriefDiv">
    <div id="briefDiv">
    
    
    <form method="post" action="editNewsBriefWithEditor.php">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
    <td width="100%">
    <input type="image" src="../themes/default/images/admin/editNewsIcon4.png" title="تغییر به وسیله ویرایشگر" />
    
    </td>
    </tr>
    <tr><td id="newsBriefBodyTd" align="right" style="padding:10px"></td></tr>
    <tr><td>
    <textarea name="hideNewsBrief" id="hideNewsBrief" style="display:none"></textarea>
    <input type="hidden" name="briefId" id="briefId" />
    <input type="hidden" name="operation" value="2" />
    </td></tr>
    </table>
    </form>
    
    
    
    <!--
    
    <form method="post" action="editNewsP.php">
    <input type="hidden" name="operation" value="2" />
    <input type="hidden" name="briefId" id="briefId" />
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr><td width="100%" align="center">
    <input type="button" onclick="temp1()" value="test" />
    <textarea name="editor1" id="editor1" cols="70" >
      sadasd
    </textarea>
     </form>
    -->
    

   
	<img src="../themes/default/images/close.png" onclick="hideBriefDiv()"  />
    </div></div>
    
    
    
    
    
    
    
    

    
    
    
    
    
    <div id="outerNewsBodyDiv">
    <div id="newsBodyDiv">
    <form method="post" action="editNewsBodyWithEditor.php">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
    <td width="100%">
    <input type="image" src="../themes/default/images/admin/editNewsIcon4.png" title="تغییر به وسیله ویرایشگر" />
    
    </td>
    </tr>
    <tr><td id="fullNewsBodyTd" align="right" style="padding:10px"></td></tr>
    <tr><td>
    <textarea name="hideNewsBody" id="hideNewsBody" style="display:none"></textarea>
    <input type="hidden" name="newsId" id="newsId" />
    </td></tr>
    </table>
    </form>
	<img src="../themes/default/images/close.png" onclick="closeNewsBodyDiv()"  />
    </div></div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
<script language="javascript" type="text/javascript" src="../js/admin/admin.js"></script>

    
    
    
   </body>
    </html> 
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    