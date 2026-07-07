<?php
session_start();
if(!isset($_SESSION['validAdmin'])) exit;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../themes/default/css/admin.css">
</head>
<body>
<form method="post" action="userDetailsP.php">
<table border="0" cellpadding="0" cellspacing="0" align="center">
<?php
include('../class/connect.php');
$id=$_GET['id'];
$con=new connect();
$con-> dbConnect();
if($con){
	
}else{
	echo 'error0';
}
//echo 'id : '.$id;
$query = "SELECT * from igwstudents where id='$id'";
$result=$con->queryRun($query);
if($result){
	
}else{
	echo 'error1';
}
$num=mysql_num_rows($result);
    for($i=0;$i<$num;$i++){
        $row = mysql_fetch_array($result);
       
	   
	   
	   
	   
	   if($row['image']=='') $image='<img src="../themes/default/images/admin/noStundetImage.png" width="32" height="32" />';
	else $image='<img src="'.$row['image'].'" width="45" height="60" />';
	   
	 echo '
	   
	   
	   
<table width="600" border="0" align="center" cellpadding="2" cellspacing="2" dir="ltr" style="color:#FFF; font-family:Tahoma, Geneva, sans-serif">
  <tr>
    <td width="133" bgcolor="#0099FF">id</td>
    <td width="401" bgcolor="#009966">'.$row['id'].'</td>
    <td width="44">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#0099FF">studentNumber</td>
    <td bgcolor="#009966">'.$row['studentNumber'].'</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#0099FF">user</td>
    <td bgcolor="#009966">'.$row['user'].'</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#0099FF">pass</td>
    <td bgcolor="#009966">'.$row['pass'].'</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#0099FF">groupName</td>
    <td bgcolor="#009966">'.$row['groupName'].'</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#0099FF">name</td>
    <td bgcolor="#009966">'.$row['name'].'</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#0099FF">family</td>
    <td bgcolor="#009966">'.$row['family'].'</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#0099FF">نام</td>
    <td bgcolor="#009966">'.$row['pName'].'</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#0099FF">نام خانوادگی</td>
    <td bgcolor="#009966">'.$row['pFamily'].'</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#0099FF">certificateName</td>
    <td bgcolor="#009966">'.$row['certificateName'].'</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#0099FF">father</td>
    <td bgcolor="#009966">'.$row['father'].'</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#0099FF">country</td>
    <td bgcolor="#009966">'.$row['country'].'</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#0099FF">state</td>
    <td bgcolor="#009966">'.$row['state'].'</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#0099FF">city</td>
    <td bgcolor="#009966">'.$row['city'].'</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#0099FF">email</td>
    <td bgcolor="#009966">'.$row['email'].'</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#0099FF">website</td>
    <td bgcolor="#009966">'.$row['website'].'</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#0099FF">nationalCode</td>
    <td bgcolor="#009966">'.$row['nationalCode'].'</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#0099FF">gender</td>
    <td bgcolor="#009966">'.$row['gender'].'</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#0099FF">single</td>
    <td bgcolor="#009966">'.$row['single'].'</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#0099FF">birthday</td>
    <td bgcolor="#009966">'.$row['birthday'].'</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#0099FF">birthPlace</td>
    <td bgcolor="#009966">'.$row['birthPlace'].'</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#0099FF">education</td>
    <td bgcolor="#009966"><textarea cols="40" rows="5">'.$row['education'].'</textarea></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#0099FF">interest</td>
    <td bgcolor="#009966"><textarea cols="40" rows="5">'.$row['interest'].'</textarea></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#0099FF">brief</td>
    <td bgcolor="#009966"><textarea cols="40" rows="5">'.$row['brief'].'</textarea></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#0099FF">registerDate</td>
    <td bgcolor="#009966">'.$row['registerDate'].'</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#0099FF">graduateDate</td>
    <td bgcolor="#009966">'.$row['graduateDate'].'</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#0099FF">mobile1</td>
    <td bgcolor="#009966">'.$row['mobile1'].'</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#0099FF">mobile2</td>
    <td bgcolor="#009966">'.$row['mobile2'].'</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#0099FF">telephone</td>
    <td bgcolor="#009966">'.$row['telephone'].'</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#0099FF">homeAddress</td>
    <td bgcolor="#009966">'.$row['homeAddress'].'</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#0099FF">workAddress</td>
    <td bgcolor="#009966">'.$row['workAddress'].'</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#0099FF">image</td>
    <td bgcolor="#009966">'.$image.'</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#0099FF">image path</td>
    <td bgcolor="#009966">'.$row['image'].'</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#0099FF">homePage</td>
    <td bgcolor="#009966">'.$row['homePage'].'</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#0099FF">accessLevel</td>
    <td bgcolor="#009966">'.$row['accessLevel'].'</td>
    <td>&nbsp;</td>
  </tr>
</table>

	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	 ';  
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   


	}

    ?> 

</table>
</form>
</body>
</html>
