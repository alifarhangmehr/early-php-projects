<?php
ob_start();
session_start();
//echo'dar hale login shodan ...';
   
    include('class/connect.php');
    $user=$_POST['user'];
    $pass=$_POST['pass'];
    
    $connector=new connect();
    if($connector->login($user,$pass)){
		

	
$con=new connect();
$con-> dbConnect();
$query = "(SELECT * FROM igwstudents WHERE user='$user')";
$result=$con->queryRun($query);
//if(!$query) echo 'query';
$num = mysql_num_rows($result);
while($row = mysql_fetch_array($result)){

	$_SESSION['validUser']=$row['user'];
	
	$_SESSION['validName']=$row['pName'];
	
	$_SESSION['validFamily']=$row['pFamily'];
	
	$_SESSION['validEmail']=$row['email'];
	
	$_SESSION['validSite']=$row['website'];
	
	$_SESSION['validStudentNumber']=$row['studentNumber'];
/*
	$_SESSION['validUser']='user';
	$_SESSION['validName']='name';
	$_SESSION['validEmail']='email';
	$_SESSION['validSite']='site';
*/
}
        echo 'نام کاربری و رمز عبور مورد تایید میباشد';
        header( 'Location: users/index.php' ) ;
		/*
		echo '
		<script type="text/javascript" language="javascript">
		window.location = "index.php"
		</script>
		';
		*/
    }else{
		//echo 'user : '.$user;
		//echo ' pass : '.$pass;
        echo '<p align="center" style="color:#F00; font-size:18px;"><img src="themes/default/images/wrongAdmin.png" align="middle" /> نام کاربری یا  رمز عبور مورد اشتباه است</p>';
        
    }
ob_flush();
?>
