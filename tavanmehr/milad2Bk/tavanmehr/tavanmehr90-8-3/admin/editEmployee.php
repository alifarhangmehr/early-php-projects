<?php
session_start();
if(!isset($_SESSION['validAdmin'])) exit;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../themes/default/css/index.css"/>

<title>ویرایش مشخصات کارمند</title>
</head>

<body>

<?php
include("header.php");
?>

<?php
require('../class/connection.php');
require('../class/shamsiDate.php');
$employeeId=$_POST['employeeId'];
$connector=new connection();
if(!$connector->dbConnect()) echo 'error 1';
$query = "SELECT * FROM employee WHERE employeeId='$employeeId'";
$result=$connector->queryRun($query);
$num=mysql_num_rows($result);
    for($i=0;$i<$num;$i++){
        $row = mysql_fetch_array($result);
		$photo=$row['photo1'];
		$photoSource=$row['photoSource'];
	    if($row['photo1']==''){
			 $photo1='<img src="../themes/default/images/patientPhoto.png" width="32" height="32" />';
		}
		else{
			 $photo1='<img src="'.$row['photo1'].'" width="60" />';
		}
	 echo '
	   
	 
	 
	 
	 
	 
	 
<br /><br />	 
<form method="post" action="editEmployeeP.php" enctype="multipart/form-data"> 
<input type="hidden" name="patientId" value="'.$patientId.'" />
<div align="center">	 
<fieldset style="width:750px">
<legend align="center" style="color:#666">مشخصات مددجو</legend>
<br /><br /><br />
	 
	 
<table align="center" width="600px" border="0">

	<tr>
    
    <td width="154" align="right"><input type="file" name="file" id="file" /><input type="hidden" name="photoSource" value="'.$photoSource.'" /><input type="hidden" name="photoSource" value="'.$photo.'" /></td>
    <td width="148" align="right">'.$photo1.'</td>
    
  </tr>

  </tr>
  <tr>
    
    <td width="154"  align="right"><input type="text" name="employeeId" value="'.$row['employeeId'].'" /></td>
    <td width="148" align="right">آیدی کارمند</td>
    
  </tr>
  <tr>
    
    <td width="154"  align="right"><input type="text" name="name" value="'.$row['name'].'" /></td>
    <td width="148" align="right">نام</td>
    
  </tr>
  <tr>
    
    <td width="154"  align="right"><input type="text" name="family" value="'.$row['family'].'" /></td>
    <td width="148" align="right">فامیل</td>
    
  </tr>
  <tr>
    <td width="154"  align="right"><input type="text" name="father" value="'.$row['father'].'" /></td>
    <td width="148" align="right">نام پدر</td>
    
  </tr>
  <tr>
    
    <td width="154"  align="right"><input type="text" name="birthday" value="'.$row['birthday'].'" /></td>
    <td width="148" align="right">تاریخ تولد </td>
    
  </tr>
  <tr>
    
    <td width="154"  align="right"><input type="text" name="marital" value="'.$row['marital'].'" /></td>
    <td width="148" align="right">وضعیت تاهل</td>
    
  </tr>
  <tr>
    
    <td width="154"  align="right"><input type="text" name="education" value="'.$row['education'].'" /></td>
    <td width="148" align="right">تحصیلات</td>
    
  </tr>
  <tr>
    
    <td width="154"  align="right"><input type="text" name="course" value="'.$row['course'].'" /></td>
    <td width="148" align="right">رشته</td>
    
  </tr>
  <tr>
    
    <td width="154"  align="right"><input type="text" name="melliCode" value="'.$row['melliCode'].'" /></td>
    <td width="148" align="right">کد ملی</td>
    
  </tr>
  <tr>
   	 	 	 	 	 	 	 	 
    <td width="154"  align="right"><input type="text" name="shenasNo" value="'.$row['shenasNo'].'" /></td>
    <td width="148" align="right">شماره شناسنامه</td>
    
  </tr>
  <tr>
    
    <td width="154"  align="right"><input type="text" name="shenasSerial" value="'.$row['shenasSerial'].'" /></td>
    <td width="148" align="right">سریال شناسنامه</td>
    
  </tr>
  <tr>
    
    <td width="154"  align="right"><input type="text" name="shenasSodur" value="'.$row['shenasSodur'].'" /></td>
    <td width="148" align="right">محل صدور شناسنامه</td>
    
  </tr>
  <tr>
    
    <td width="154"  align="right"><input type="text" name="postalCode" value="'.$row['postalCode'].'" /></td>
    <td width="148" align="right">کد پستی</td>
    
  </tr>
  <tr>
    
    <td width="154"  align="right"><input type="text" name="birthplace" value="'.$row['birthplace'].'" /></td>
    <td width="148" align="right">محل تولد</td>
    
  </tr>
  <tr>
    
    <td width="154"  align="right"><input type="text" name="emloymentDate" value="'.$row['emloymentDate'].'" /></td>
    <td width="148" align="right">تاریخ استخدام</td>
    
  </tr>
  <tr>
    
    <td width="154"  align="right"><input type="text" name="address" value="'.$row['address'].'" /></td>
    <td width="148" align="right">آدرس</td>
    
  </tr>
  <tr>
    
    <td width="154"  align="right"><input type="text" name="tel" value="'.$row['tel'].'" /></td>
    <td width="148" align="right">تلفن</td>
    
  </tr>
  <tr>
  <tr>
    
    <td width="154"  align="right"><input type="text" name="email" value="'.$row['email'].'" /></td>
    <td width="148" align="right">ایمیل</td>
    
  </tr>
  <tr>
  <tr>
    
    <td width="154"  align="right"><input type="text" name="job" value="'.$row['job'].'" /></td>
    <td width="148" align="right">شفل</td>
    
  </tr>
  <tr>
  <tr>
    
    <td width="154"  align="right"><input type="text" name="military" value="'.$row['military'].'" /></td>
    <td width="148" align="right">وضعیت سربازی</td>
    
  </tr>
  <tr>

    <td width="154"  align="right"><input type="text" name="mobile" value="'.$row['mobile'].'" /></td>
    <td width="148" align="right">موبایل</td>
    
  </tr>
  <tr>
    
    <td width="154"  align="right"><input type="text" name="bank" value="'.$row['bank'].'" /></td>
    <td width="148" align="right">نام بانک</td>
    
  </tr>
  <tr>
    
    <td width="154"  align="right"><input type="text" name="bankBranch" value="'.$row['bankBranch'].'" /></td>
    <td width="148" align="right">شعبه بانک</td>
    
  </tr>
  <tr>
    
    <td width="154"  align="right"><input type="text" name="bankAccount" value="'.$row['bankAccount'].'" /></td>
    <td width="148" align="right">شماره حساب</td>
    
  </tr>
  <tr>
    
    <td colspan="2" width="250" align="right"><input type="submit" value="اعمال تغییرات" /></td>
    
  </tr>
 	 	 
  </table>
  </fieldset>
</div>	 
	 
</form> 
	 
	 
	 
	 
	 
	 
	 
	
	   
	   
	 ';  
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   


	}

?>

<?php
include("header.php");
?>


</body>
</html>