<?php
session_start();
if(!isset($_SESSION['validAdmin'])) exit;
$admin=$_SESSION['validAdmin'];
require('../includes/shamsiDate.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>مدیریت</title>
<link rel="stylesheet" type="text/css" href="../themes/default/css/admin.css">
<script language="javascript" type="text/javascript" src="../java/admin/admin.js"></script>


<!-- Sliding_login_panel_jquery_start -->
    
  	<link rel="stylesheet" href="../modules/Sliding_login_panel_jquery/css/slide.css" type="text/css" media="screen" />
  	<link rel="stylesheet" href="../modules/Sliding_login_panel_jquery/css/style.css" type="text/css" media="screen" />
	 <!-- jQuery - the core -->
	<script src="../modules/Sliding_login_panel_jquery/js/jquery-1.3.2.min.js" type="text/javascript"></script>
	<!-- Sliding effect -->
	<script src="../modules/Sliding_login_panel_jquery/js/slide.js" type="text/javascript"></script>
<!-- Sliding_login_panel_jquery_end -->


</head>
<body>

<div id="toppanel">
	<div id="panel">
		<div class="content clearfix">
			<div class="left">
				<h1>مدیریت اخبار</h1>
  				<p class="grey">در این قسمت مدیر قابلیت مدیریت اخبار ارسال شده را دارد</p>
                <form method="post" action="searchNews.php" target="adminIframe">
                	<img src="../themes/default/images/admin/searchNewsIcon3.png" align="middle" width="32" height="32" />
					<input type="text" name="name" class="field" size="15" />
                    <input type="submit" value="جستجو" id="newsSearchSubmitBut" />
                 </form>
                <a href="newsInsert.php" target="adminIframe"><img src="../themes/default/images/admin/addNewsIcon3.png" width="32" height="32" align="middle" />&nbsp;&nbsp; خبر جدید </a>
                <br />
                <br />
                <a href="editNews.php" target="adminIframe"><img src="../themes/default/images/admin/editNewsIcon3.png" width="32" height="32" align="middle" />&nbsp;&nbsp; ویراش اخبار </a>			
                <br />
                <br />
                <a href="deleteNews.php" target="adminIframe"><img src="../themes/default/images/admin/removeNewsIcon3.png" width="32" height="32" align="middle" />&nbsp;&nbsp; حذف خبر </a>			

			</div>
			<div class="left">
					<h1>مدیریت کاربران</h1>
					<p class="grey">در این قسمت مدیر قابلیت ویرایش کاربران را دارد</p>
                <form method="post" action="searchUser.php" target="adminIframe">
                	<img src="../themes/default/images/admin/searchUserIcon3.png" align="middle" width="32" height="32" />
					<input type="text" name="name" class="field" size="15" />
                    <input type="submit" value="جستجو" id="userSearchSubmitBut" />
                    </form>

                	  <a href="showUsers.php" target="adminIframe"><img src="../themes/default/images/admin/editUserIcon3.png" width="32" height="32" align="middle" />&nbsp;&nbsp; ویرایش کاربران </a>
                      
                    <br />
                    <br />
                    <a href="newUser.php" target="adminIframe"><img src="../themes/default/images/admin/addUserIcon3.png" width="32" height="32" align="middle" />&nbsp;&nbsp; کاربر جدید </a>

                    <br />
                    <br />
                    <a href="userComments.php" target="adminIframe"><img src="../themes/default/images/admin/commentsIcon.png" width="32" height="32" align="middle" />&nbsp;&nbsp; مدیریت نظرات </a>
                    
                    
			</div>
			<div class="left right">
				<h1>ابزارها</h1>
                <p class="grey">در این قسمت ابزارهای مدیریت گلچین شده اند</p>
                <a href="default.php" target="adminIframe"><img src="../themes/default/images/homeIcon.png" width="32" height="32" align="middle" />&nbsp;&nbsp; صفحه اول</a>
                <br />
                <br />
                <a href="newsInsert.php" target="adminIframe"><img src="../themes/default/images/admin/editStdBoardNewsIcon.png" width="32" height="32" align="middle" />&nbsp;&nbsp; ویرایش اخبار بورد دانشجویان</a>
                <br />
                <br />
            	<a href="newsInsert.php" target="adminIframe"><img src="../themes/default/images/admin/stdCommentsIcon.png" width="32" height="32" align="middle" />&nbsp;&nbsp; نظرات دانشجویان</a>
                <br />
                <br />
                <a href="newsInsert.php" target="adminIframe"><img src="../themes/default/images/admin/deleteStdBoardNews.png" width="32" height="32" align="middle" />&nbsp;&nbsp; حذف خبر از بورد دانشجویان</a>
                <br />
                <br />
                 
			</div>
		</div>
</div> <!-- /login -->	

	<!-- The tab on top -->	
	<div class="tab">
		<ul class="login">
			<li class="left">&nbsp;</li>
			<li>ابزار مدیریت</li>
			<li class="sep">|</li>
			<li id="toggle">
				<a id="open" class="open" href="#">نمایش</a>
				<a id="close" style="display: none;" class="close" href="#">مخفی کردن</a>			
			</li>
			<li class="right">&nbsp;</li>
		</ul> 
	</div> <!-- / top -->
	
</div> <!--panel -->

    <div id="container">
		<div id="content" style="padding-top:100px;">
	  </div>
		<!-- / content -->		
	</div><!-- / container -->
    <iframe id="adminIframe" name="adminIframe" src="default.php" width="100%" height="700px" style="background:#000; border:none" frameBorder="0"></iframe>
    </a></a>
</body>
</html>