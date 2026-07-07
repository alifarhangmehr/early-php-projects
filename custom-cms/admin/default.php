<?php
session_start();
if(!isset($_SESSION['validAdmin'])) exit;
$admin=$_SESSION['validAdmin'];
require('../includes/shamsiDate.php');
include('../class/connect.php');




$con=new connect();
$con-> dbConnect();
$query = "(SELECT * FROM message)";
$query2 = "(SELECT * FROM comments)";
$result=$con->queryRun($query);
$result2=$con->queryRun($query2);
//if(!$query) echo 'query';
$num = mysql_num_rows($result);
//*************************************
$unreadMsg=0;
$noAwnserNeedMsg=0;
$alreadyAwnserMsg=0;
$needAwnser=0;
$alreadyReadMsg=0;
//*************************************
$totalNewsComment=0;
$didntAgreeNewsComment=0;
//*************************************
while($row = mysql_fetch_array($result)){
	
if($row['unRead']==0) { $alreadyReadMsg++; $alreadyAwnserMsg++; }

else if($row['unRead']==1) { $alreadyReadMsg++; $noAwnserNeedMsg++; }

else if($row['unRead']==2) { $alreadyReadMsg++; $needAwnser++; }

else if($row['unRead']==3) { $unreadMsg++; $needAwnser++; }
}
while($row2 = mysql_fetch_array($result2)){
$totalNewsComment++;
//echo ' test : '.$didntAgreeNewsComment;
if($row2['cConfirm']=='no') $didntAgreeNewsComment++;


}













?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>مدیریت</title>
<link rel="stylesheet" type="text/css" href="../themes/default/css/admin.css">
</head>
<body>

<table width="700" border="0" align="center" cellpadding="2" cellspacing="2" id="adminPanelTable">
<tr>
  <th height="20" bgcolor="#0099FF"><strong>اطلاعات</strong></th>
  <th height="20" bgcolor="#0099FF"><strong>مدیریت اخبار بورد دانشجویان</strong></th>
  <th height="20" bgcolor="#0099FF"><strong>مدیریت اخبار سایت</strong></th>
  </tr>



<tr><td colspan="3">&nbsp;</td>
  </tr>
<tr>

  <td width="234" rowspan="6" align="center">
    <table width="226" height="255px" border="0" cellpadding="2" cellspacing="8">
      <tr>
        <td align="center" bgcolor="#222222">نام کاربری</td>
        <td align="center" bgcolor="#444444"><?php echo $_SESSION['validAdmin']; ?></td>
      </tr>
      <tr>
        <td align="center" bgcolor="#222222">نام</td>
        <td align="center" bgcolor="#444444"><?php echo $_SESSION['validAdminName']; ?></td>
      </tr>
      <tr>
        <td align="center" bgcolor="#222222">فامیل</td>
        <td align="center" bgcolor="#444444"><?php echo $_SESSION['validAdminFamily']; ?></td>
      </tr>
      <tr>
        <td align="center" bgcolor="#222222">ایمیل</td>
        <td align="center" bgcolor="#444444"><?php echo $_SESSION['validAdminEmail']; ?></td>
      </tr>
      <tr>
        <td height="30" colspan="2" align="center" bgcolor="#222222"><a style="color:#CCC">تاریخ و ساعت امروز</a></td>
      </tr>
      <tr>
        <td align="center" bgcolor="#222222"> شمسی</td>
        <td align="center" bgcolor="#444444"><a style="color:#6C3"><?php echo pdate("Y").'/'.pdate("m").'/'.pdate("d"); ?></a></td>
      </tr>
      <tr>
        <td align="center" bgcolor="#222222"> میلادی</td>
        <td align="center" bgcolor="#444444"><a style="color:#6C3"><?php echo date("Y").'/'.date("m").'/'.date("d"); ?></a></td>
      </tr>
      <tr>
        <td align="center" bgcolor="#222222">ساعت</td>
        <td align="center" bgcolor="#444444">به زودی</td>
      </tr>
    </table></td>
  <td height="40"><form method="post" action="searchNews.php" target="adminIframe">
                	<img src="../themes/default/images/admin/searchNewsIcon3.png" align="middle" width="32" height="32" />
					<input type="text" name="name" class="field" size="15" />
                    <input type="submit" class="greenBut" id="newsSearchSubmitBut2" value="جستجو" />
                 </form></td>
<td height="40"><form method="post" action="searchNews.php" target="adminIframe">
                	<img src="../themes/default/images/admin/searchNewsIcon3.png" align="middle" width="32" height="32" />
					<input type="text" name="name" class="field" size="15" />
                    <input type="submit" class="greenBut" id="newsSearchSubmitBut2" value="جستجو" />
                 </form></td>
  </tr>
<tr>
  <td height="40"><a href="stdBoardNewsInsert.php" target="adminIframe"><img src="../themes/default/images/admin/addStdBoardNewsIcon.png" width="32" height="32" align="middle" />&nbsp;&nbsp; ارسال خبر به بورد دانشجویان</a></td>
  <td height="40"><a href="newsInsert.php" target="adminIframe"><img src="../themes/default/images/admin/addNewsIcon3.png" width="32" height="32" align="middle" />&nbsp;&nbsp; خبر جدید </a></td>
  </tr>
<tr>
  <td height="40"><a target="adminIframe"><img src="../themes/default/images/admin/editStdBoardNewsIcon.png" width="32" height="32" align="middle" />&nbsp;&nbsp; ویرایش اخبار بورد دانشجویان</a></td>
  <td height="40"><a href="editNews.php" target="adminIframe"><img src="../themes/default/images/admin/editNewsIcon3.png" width="32" height="32" align="middle" />&nbsp;&nbsp; ویراش اخبار </a></td>
  </tr>
<tr>
  <td width="226" height="40"><a target="adminIframe"><img src="../themes/default/images/admin/deleteStdBoardNews.png" width="32" height="32" align="middle" />&nbsp;&nbsp; حذف خبر از بورد دانشجویان</a></td>
  <td width="220" height="40"><a href="deleteNews.php" target="adminIframe"><img src="../themes/default/images/admin/removeNewsIcon3.png" width="32" height="32" align="middle" />&nbsp;&nbsp; حذف خبر </a></td>
  </tr>
<tr>
  <td height="40"><a target="adminIframe"><img src="../themes/default/images/admin/stdCommentsIcon.png" width="32" height="32" align="middle" />&nbsp;&nbsp; نظرات دانشجویان</a></td>
  <td height="40"><a href="userComments.php" target="adminIframe"><img src="../themes/default/images/admin/commentsIcon.png" width="32" height="32" align="middle" />&nbsp;&nbsp; مدیریت نظرات </a></td>
  </tr>
<tr>
  <td height="40">
  <table width="226" border="0" cellspacing="2" cellpadding="3">
    <tr>
      <td bgcolor="#444444"> کل نظرات</td>
      <td width="100" align="center" bgcolor="#222222">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#444444">نظرات تایید نشده</td>
      <td width="100" align="center" bgcolor="#222222">&nbsp;</td>
    </tr>
  </table>
  </td>
  <td height="40"><table width="226" border="0" cellspacing="2" cellpadding="3">
    <tr>
      <td bgcolor="#444444"> کل نظرات</td>
      <td width="100" align="center" bgcolor="#222222"><?php echo $totalNewsComment; ?></td>
    </tr>
    <tr>
      <td bgcolor="#444444">نظرات تایید نشده</td>
      <td width="100" align="center" bgcolor="#222222"><a style="color:#F30"><?php echo $didntAgreeNewsComment; ?></a></td>
    </tr>
  </table></td>
  </tr>
<tr>
  <th height="20" bgcolor="#0099FF"><strong>مدیریت کلاس ها</strong></th>
  <th height="20" colspan="2" bgcolor="#0099FF"> دانشجویان</th>
  </tr>
<tr>
  <td colspan="3">&nbsp;</td>
  </tr>
<tr>
  <td height="40"><a target="adminIframe"><img src="../themes/default/images/admin/classScheduleIcon.png" width="32" height="32" align="middle" />&nbsp;&nbsp; تاریخ برگزاری کلاس ها</a></td>
  <td height="40" colspan="2"><form method="post" action="searchStudent.php" target="adminIframe">
    <img src="../themes/default/images/admin/searchUserIcon3.png" align="middle" width="32" height="32" />
    
    <input type="text" name="searchValue" id="searchValue" class="field" size="20" />
    
    <select name="searchOP" id="searchOP">
    
      <option value="studentNumber">studentNumber</option>
      
      <option value="user">user</option>
      
      <option value="groupName">groupName</option>
      
      <option value="name">name ,pName</option>
      
      <option value="family">family ,pFamily</option>      
      
      <option value="father">father</option>
      
      <option value="country">country, state, city</option>
      
      <option value="email">email</option>
      
      <option value="website">website</option>
      
      <option value="nationalCode">nationalCode</option>
      
      <option value="birthday">birthday</option>
      
      <option value="telephone">telephone, mobile</option>
      
      <option value="accessLevel">accessLevel</option>
      
      <option value="all" style="background:#39F; color:#FFF">i dont know</option>
      
        </select>
    <input type="submit" value="جستجو" id="userSearchSubmitBut" />
  </form></td>
  </tr>
<tr>
  <td height="40"><a target="adminIframe"><img src="../themes/default/images/admin/userPhoneListIcon.png" width="32" height="32" align="middle" />&nbsp;&nbsp; لیست شماره تماس کاربران</a></td>
  <td height="40"><a href="showStundet.php" target="adminIframe"><img src="../themes/default/images/admin/showStudentIcon.png" width="32" height="32" align="middle" />&nbsp;&nbsp; نمایش دانشجویان</a></td>
  <td><a href="newsInsert.php" target="adminIframe"><img src="../themes/default/images/admin/sendMsgToUserIcon.png" width="32" height="32" align="middle" />&nbsp;&nbsp; ارسال پیغام به کاربر </a></td>
</tr>
<tr>
  <td height="40"><a target="adminIframe"><img src="../themes/default/images/admin/presentAndAbsentListIcon.png" width="32" height="32" align="middle" />&nbsp;&nbsp; لیست حضور و غیاب</a></td>
  <td height="40"><a href="addStudentForm.php" target="adminIframe"><img src="../themes/default/images/admin/addUserIcon3.png" width="32" height="32" align="middle" />&nbsp;&nbsp;دانشجوی جدید</a></td>
  <td><a href="msgInbox.php" target="adminIframe"><img src="../themes/default/images/admin/msgInboxIcon.png" width="32" height="32" align="middle" />&nbsp;&nbsp;صندوق پیام ها</a></td>
</tr>
<tr>
  <td height="40">&nbsp;</td>
  <td height="40"><a target="adminIframe"><img src="../themes/default/images/admin/editUserIcon3.png" width="32" height="32" align="middle" />&nbsp;&nbsp; ویرایش دانشجو</a></td>
  <td rowspan="3"><table width="226" border="0" align="center" cellpadding="3" cellspacing="2">
    <tr>
      <td width="105" bgcolor="#444444">با جواب</td>
      <td width="100" align="center" bgcolor="#222222"><?php echo $alreadyAwnserMsg; ?></td>
    </tr>
    <tr>
      <td bgcolor="#444444">بی جواب</td>
      <td width="100" align="center" bgcolor="#222222"><a style="color:#F30"><?php echo $needAwnser; ?></a></td>
    </tr>
    <tr>
      <td bgcolor="#444444">بدون نیاز به جواب</td>
      <td width="100" align="center" bgcolor="#222222"><?php echo $noAwnserNeedMsg; ?></td>
    </tr>
    <tr>
      <td bgcolor="#444444">خوانده</td>
      <td width="100" align="center" bgcolor="#222222"><?php echo $alreadyReadMsg; ?></td>
    </tr>
    <tr>
      <td bgcolor="#444444">نخوانده</td>
      <td width="100" align="center" bgcolor="#222222"><a style="color:#F30"><?php echo $unreadMsg; ?></a></td>
    </tr>
  </table></td>
</tr>
<tr>
  <td height="40">&nbsp;</td>
  <td height="40">&nbsp;</td>
  </tr>
<tr>
  <td height="40">&nbsp;</td>
  <td height="40">&nbsp;</td>
  </tr>






</table>
</body>
</html>