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
	<th style="color:#3CF">نام</th>
	<th style="color:#3CF">فامیل</th>
	<th style="color:#3CF">ایمیل</th>
	<th style="color:#3CF">سطح دسترسی</th>
	<th style="color:#3CF">لقب</th>
    <th style="color:#3CF">تاریخ ثبت نام</th>
    <th style="color:#3CF">اطلاعات کامل</th>
</tr>
	
	
	
	
	

	
	

<?php


include('../class/connect.php');
$con=new connect();
$con-> dbConnect();
$query = "SELECT * from users";
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
	echo '<tr '.$bgColor.'>' ;
	echo '<td align=center id=nameTd'.$row['email'].'>'.$row['name'].'</td>';
	echo '<td align=center id=familyTd'.$row['email'].'>'.$row['family'].'</td>';
	echo '<td align=center id=emailTd'.$row['email'].'>'.$row['email'].'</td>';
	echo '<td align=center id=accessLevelTd'.$row['email'].'>'.$row['accessLevel'].'</td>';
	echo '<td align=center id=titleTd'.$row['email'].'>'.$row['title'].'</td>';
	echo '<td align=center id=dateFATd'.$row['email'].'>'.$row['dateFA'].'</td>';
	echo '<td align=center id=moreUserInfoTd'.$row['email'].'><a style="color:#3CF" href=showUserDetails.php?email='.$row['email'].'>+</td></tr>';
	
	
	
	
  }
	
	
	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

	?>
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
    <form method="post" action="editNewsP.php">
    <input type="hidden" name="operation" value="1" />
    <input type="hidden" name="editId" id="editId" />
    <table align="center" width="300px" border="0" dir="rtl">
    <tr>
      <td id="photoName" width="185" align="right">&nbsp;</td>
      <td width="100%" align="right"><label>
      <span style="text-align: right">گروه خبری</span></label></td>
      <td width="103" align="right" style="text-align: right"><input type="text" name="newsGroup" id="newsGroup" /></td>
    </tr>
    <tr>
      <td align="right" id="serie">&nbsp;</td>
      <td align="right"><span style="text-align: right">
 نام نویسنده</span></td>
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
    <form method="post" action="editNewsP.php">
    <input type="hidden" name="operation" value="2" />
    <input type="hidden" name="briefId" id="briefId" />
      <textarea cols="80" id="editor1" name="editor1" rows="10"></textarea>
      <script type="text/javascript">
		//<![CDATA[
			// Replace the <textarea id="editor1"> with an CKEditor instance.
			var editor = CKEDITOR.replace( 'editor1' );
		//]]>
		</script>
        <p align="center"><input type="submit" id="editBriefBut" value="تغییر" /></p>
    </form>
<img src="../themes/default/images/close.png" onclick="closeBriefDiv()"  />
    </div></div>
    <div id="outerNewsBodyDiv">
    <div id="newsBodyDiv">
    <form method="post" action="editNewsP.php">
    <input type="hidden" name="operation" value="3" />
    <input type="hidden" name="newsBodyId" id="newsBodyId" />
	<textarea cols="80" id="editor2" name="editor2" rows="10"></textarea>
	  <script type="text/javascript">
		//<![CDATA[
			// Replace the <textarea id="editor1"> with an CKEditor instance.
			var editor = CKEDITOR.replace( 'editor2' );
		//]]>
		</script>
         <p align="center"><input type="submit" id="editNewsBodyBut" value="تغییر" /></p>
<img src="../themes/default/images/close.png" onclick="closeNewsBodyDiv()"  />
	</form>
    </div></div>
    
    
<script language="javascript" type="text/javascript" src="../java/admin/admin.js"></script>

    
    
    
   </body>
    </html> 
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    