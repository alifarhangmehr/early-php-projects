<?php
session_start();
if(!isset($_SESSION['validUser'])) exit;
$user=$_SESSION['validUser'];
require_once("../class/connect.php");
require('../includes/shamsiDate.php');
$connector=new connect();
if(!$connector->dbConnect()) echo 'error 1';
$query="SELECT * FROM users WHERE user='$user'"; 
$result=$connector->queryRun($query);
$num=mysql_num_rows($result);
    for($i=0;$i<$num;$i++){
        $row = mysql_fetch_array($result);
		$id= $row['id'];
		$name= $row['name'];
		$family= $row['family'];
		$pName= $row['pName'];
		$pFamily= $row['pFamily'];
		$father= $row['father'];
		$country= $row['country'];
		$state= $row['state'];
		$city= $row['city'];
		$email= $row['email'];
		$website= $row['website'];
		$nationalCode= $row['nationalCode'];
		$gender= $row['gender'];
		$single= $row['single'];
		$birthday= $row['birthday'];
		$birthPlace= $row['birthPlace'];
		$education= $row['education'];
		$interest= $row['interest'];
		$brief= $row['brief'];
		$mobile1= $row['mobile1'];
		$mobile2= $row['mobile2'];
		$telephone= $row['telephone'];
		$homeAddress= $row['homeAddress'];
		$workAddress= $row['workAddress'];
		$homePage= $row['homePage'];

	}


	//echo $family;











?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../themes/default/css/users.css">
<title>Student register form</title>
</head>

<body style="background:#000; color:#FFF">
<form name="editDetailForm" method="post" action="editDetailP.php" enctype="multipart/form-data">
<table align="center" width="600" border="0" dir="ltr">
  <tr style="display:none">
    <td>id</td>
    <td><input type="text" name="id" id="id" value="<?php echo $id; ?>" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>name</td>
    <td><input type="text" name="name" id="name" value="<?php echo $name; ?>" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>family</td>
    <td><input type="text" name="family" id="family" value="<?php echo $family; ?>" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>نام</td>
    <td><input type="text" name="pName" id="pName" value="<?php echo $pName; ?>" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>نام خانوادگی</td>
    <td><input type="text" name="pFamily" id="pFamily" value="<?php echo $pFamily; ?>" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>father</td>
    <td><input type="text" name="father" id="father" value="<?php echo $father; ?>" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>country</td>
    <td><input type="text" name="country" id="country" value="<?php echo $country; ?>" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>state</td>
    <td><input type="text" name="state" id="state" value="<?php echo $state; ?>" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>city</td>
    <td><input type="text" name="city" id="city" value="<?php echo $city; ?>" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>email</td>
    <td><input type="text" name="email" id="email" value="<?php echo $email; ?>" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>website</td>
    <td><input type="text" name="website" id="website" value="<?php echo $website; ?>" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>nationalCode</td>
    <td><input type="text" name="nationalCode" id="nationalCode" value="<?php echo $nationalCode; ?>" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>gender</td>
    <td><input type="text" name="gender" id="gender" value="<?php echo $gender; ?>" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>single</td>
    <td><input type="text" name="single" id="single" value="<?php echo $single; ?>" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>birthday</td>
    <td><input type="text" name="birthday" id="birthday" value="<?php echo $birthday; ?>" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>birthPlace</td>
    <td><input type="text" name="birthPlace" id="birthPlace" value="<?php echo $birthPlace; ?>" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>education</td>
    <td><textarea name="education" cols="40" rows="3" id="education"><?php echo $education; ?></textarea></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>interest</td>
    <td><textarea name="interest" cols="40" rows="3" id="interest"><?php echo $interest; ?></textarea></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>brief</td>
    <td><textarea name="brief" cols="40" rows="3" id="brief"><?php echo $brief; ?></textarea></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>mobile1</td>
    <td><input type="text" name="mobile1" id="mobile1" value="<?php echo $mobile1; ?>" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>mobile2</td>
    <td><input type="text" name="mobile2" id="mobile2" value="<?php echo $mobile2; ?>" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>telephone</td>
    <td><input type="text" name="telephone" id="telephone" value="<?php echo $telephone; ?>" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>homeAddress</td>
    <td><input type="text" name="homeAddress"  id="homeAddress" size="60" value="<?php echo $homeAddress; ?>" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>workAddress</td>
    <td><input type="text" name="workAddress" id="workAddress" size="60" value="<?php echo $workAddress; ?>" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>image</td>
    <td><input type="file" name="file" id="file" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>homePage</td>
    <td><input type="text" name="homePage" id="homePage" value="<?php echo $homePage; ?>" /></td>
    <td>&nbsp;</td>
  </tr>
</table>
<br />
<div align="center">
<input type="submit" value="تغییر" class="greenBut" />
</div>
</form>
<br /><br />
</body>
</html>