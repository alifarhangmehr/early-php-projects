<?php
ob_start();
session_start();
echo'
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="themes/default/css/index.css">
<script language="javascript" type="text/javascript" src="java/index.js"></script>
<title>پروتال خبری گروه آرمای</title>
</head>

<body>
<table width="960px" border="0" cellspacing="0" cellpadding="0" align="center" style="background:url(image/bg3.jpg) no-repeat">
  <tr>
    <td colspan="4" height="80px"><p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>

    </td>
  </tr>
  <tr>
    <td colspan="4" height="300px"><p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p></td>
  </tr>
  <tr>
  	<td colspan="4"><p align="center"><a href="adminLogin.php">ورود مدیر</a> | <a href="register.php">ثبت نام</a> | <a href="contact.php"> تماس با ما</a> | <a href="about.php">درباره ما</a></p>
    <p>&nbsp;</p></td>
  </tr>

  <tr>
    <td width="65">&nbsp;</td>
    <td colspan="2" align="center">&nbsp;</td>
    <td width="65">&nbsp;</td>
  </tr>
  <tr>
    <td width="65">&nbsp;</td>
    <td width="683" colspan="2">
';
   
    include('class/connect.php');
    $user=$_POST['user'];
    $pass=$_POST['pass'];
    
    $connector=new connect();
    /*$t=$connector->login($user,$pass);
    echo $t;*/
    if($connector->adminLogin($user,$pass)){
		
		
		
		
		
		
		
		
		$con=new connect();
$con-> dbConnect();
$query = "(SELECT * FROM admin WHERE user='$user')";
$result=$con->queryRun($query);
//if(!$query) echo 'query';
$num = mysql_num_rows($result);
while($row = mysql_fetch_array($result)){

	$_SESSION['validAdmin']=$user;
	
	$_SESSION['validAdminName']=$row['name'];
	
	$_SESSION['validAdminFamily']=$row['family'];
	
	$_SESSION['validAdminEmail']=$row['email'];
	
	$_SESSION['validAdminAccessLevel']=$row['website'];
	
/*
	$_SESSION['validUser']='user';
	$_SESSION['validName']='name';
	$_SESSION['validEmail']='email';
	$_SESSION['validSite']='site';
*/
		
		
		
		
		
		
		
		
		
		
		
        //$_SESSION['validAdmin']=$user;
}
        echo 'نام کاربری و رمز عبور مورد تایید میباشد';
        header( 'Location: admin/index.php' ) ;
    }else{
        echo '<p align="center" style="color:#F00; font-size:18px;"><img src="themes/default/images/wrongAdmin.png" align="middle" /> نام کاربری یا  رمز عبور مورد اشتباه است</p>';
        
    }
    ob_flush();
    ?>

    <p>&nbsp;</p>
    <td width="65">&nbsp;</td>
  </tr>
   <tr>
    <td width="65">&nbsp;</td>
    <td colspan="2" align="center">
    
    <p>&nbsp;</p></td>
    <td width="65">&nbsp;</td>
  </tr>
    
    
  <tr>
    <td width="65">&nbsp;</td>
    <td>&nbsp;</td>
    <td width="147">&nbsp;</td>
    <td width="65">&nbsp;</td>
  </tr>
  <tr style="background:url(image/bg1-bot.jpg) no-repeat">
    <td colspan="4"><p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>

      
    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td width="65">&nbsp;</td>
    <td colspan="2" id="copyrightTd"></td>
    <td width="65">&nbsp;</td>
  </tr>
</table>
<div id="outerNewBody"><div id="newsBody">
	<table width="600" border="0">
      <tr>
        <th colspan="3" id="fullNewsTitleTd" style="color:#FC0"><br /></th>
      </tr>
      <tr>
        <td id="fullNewsImage" style="vertical-align:top"></td>
        <td width="560" id="fullNewsTd" style="padding:10px;"></td>
        <td width="20">&nbsp;</td>
      </tr>
      <tr>
        <td></td>
        <td id="whoAndWhenTd" style="font-size:12px"></td>
        <td><p align="center"><img src="themes/default/images/close.png" onClick="hideNewsBody()" width="48" height="48" alt="بستن صفحه" /><a style="font-size:14px; color:#F30">بستن</a></p></td>
      </tr>
    </table>
    </div></div>

