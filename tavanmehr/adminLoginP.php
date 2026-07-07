<?php
session_start();
require_once("class/connection.php");
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
echo '<link rel="stylesheet" type="text/css" href="themes/default/css/index.css"/>';
$username = $_POST['user'];
$password = $_POST['pass'];
//echo '<br /><br /><p dir="rtl">نام کاربری:'.$username;
//echo '<br />رمز عبور:'.$password.'<br /></p>';
$connector=new connection();
if(!$connector->dbConnect()) echo 'error 1';
//$username=$connector->check_input($username);
//$password=$connector->check_input($password);


$query="select * from admin where user='$username' and pass='$password'";
$result=$connector->queryRun($query);

  if (!$result)  echo 'error 2';
  //echo mysql_num_rows($result);
  if (mysql_num_rows($result)>0){
	   $_SESSION['validAdmin']=$username;
	   $_SESSION['allowEnterAdminArea']=true;
	    echo "<p align='center'><font color='green'> اطلاعات ورودی صحیح می باشند</font></p>";
	  	echo '<div align="center" dir="rtl"><font color=green><br />پس از 2 ثانیه به صفحه اول نرم افزار منتقل می شوید ...</font></div>';
	   ?>
       <script language="javascript" type="text/javascript">
	   setTimeout("document.location.replace('admin/adminIndex.php')",2000);
       //alert('1');
       //document.location.replace('admin/adminMainPage.php');
	   </script>
       <?php
	   exit;
  }
  else{
	  $_SESSION['allowEnterAdminArea']=false;
	  ?>
	  <script language="javascript" type="text/javascript">
	  //alert('wrong');
	  </script>
	  <?php
	  echo "<p align='center'><font color='#FF9900'>نام کاربری یا رمز عبور اشتباه است</font></p>";
	  echo  '<div align="center" dir="rtl"><font color=green><br />پس از 2 ثانیه به صفحه اول نرم افزار منتقل می شوید ...</font></div>';
	?>
	 <script language="javascript" type="text/javascript">
	   setTimeout("document.location.replace('index.php')",2000);
       //alert('1');
       //document.location.replace('admin/adminMainPage.php');
	   </script>
	<?php
      exit;
	  }
?>


















//alert('<?php echo $username."::".$password.'::'.$T.'پایان'; ?>');
