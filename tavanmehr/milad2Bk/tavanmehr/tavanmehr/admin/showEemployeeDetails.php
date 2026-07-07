<?php
session_start();
if(!isset($_SESSION['validAdmin'])) exit;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../themes/default/css/index.css"/>
<title>مشخصات کارمند</title>
</head>

<body>

<?php
include("header.php");
?>
<!-- flag print icon deleted from here -->
<br />
<?php
include('../class/connection.php');
$employeeId=$_GET['employeeId'];
//echo $employeeId;
$connector=new connection();
if(!$connector->dbConnect()) echo 'error 1';
$query = "SELECT * FROM employee WHERE employeeId='$employeeId'";
$result=$connector->queryRun($query);

$num=mysql_num_rows($result);
    for($i=0;$i<$num;$i++){
        $row = mysql_fetch_array($result);
	    if($row['photo1']=='') $photo1='<img src="../themes/default/images/patientPhoto.png" width="32" height="32" />';
		else $photo1='<a href="'.$row['photoSource'].'":><img src="'.$row['photo1'].'"  /></a>';
	
	 echo ' 
<div align="center">	 
<fieldset style="width:750px">
<legend align="center" style="color:#666">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; مشخصات کارمند&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</legend>
	 
 
	 
<table align="center" width="600px" border="0">
	<tr>
    
    <td width="154" align="right">'.$photo1.'</td>
    <td width="148" align="right">تصویر</td>
    
  </tr>
  <tr>
    
    <td width="154" align="right">'.$row['employeeId'].'</td>
    <td width="148" align="right">آیدی کارمند</td>
    
  </tr>
  <tr>
    
    <td width="154" align="right">'.$row['name'].'</td>
    <td width="148" align="right">نام</td>
    
  </tr>
  <tr>
    
    <td width="154" align="right">'.$row['family'].'</td>
    <td width="148" align="right">فامیل</td>
    
  </tr>
  <tr>
    <td width="154" align="right">'.$row['father'].'</td>
    <td width="148" align="right">نام پدر</td>
    
  </tr>
  <tr>
    
    <td width="154" align="right">'.$row['birthday'].'</td>
    <td width="148" align="right">تاریخ تولد </td>
    
  </tr>
  <tr>
    
    <td width="154" align="right">'.$row['marital'].'</td>
    <td width="148" align="right">وضعیت تاهل</td>
    
  </tr>
  <tr>
    
    <td width="154" align="right">'.$row['education'].'</td>
    <td width="148" align="right">تحصیلات</td>
    
  </tr>
  <tr>
    
    <td width="154" align="right">'.$row['course'].'</td>
    <td width="148" align="right">رشته</td>
    
  </tr>
  <tr>
    
    <td width="154" align="right">'.$row['melliCode'].'</td>
    <td width="148" align="right">کد ملی</td>
    
  </tr>
  <tr>
   	 	 	 	 	 	 	 	 
    <td width="154" align="right">'.$row['shenasNo'].'</td>
    <td width="148" align="right">شماره شناسنامه</td>
    
  </tr>
  <tr>
    
    <td width="154" align="right">'.$row['shenasSerial'].'</td>
    <td width="148" align="right">سریال شناسنامه</td>
    
  </tr>
  <tr>
    
    <td width="154" align="right">'.$row['shenasSodur'].'</td>
    <td width="148" align="right">محل صدور شناسنامه</td>
    
  </tr>
  <tr>
    
    <td width="154" align="right">'.$row['postalCode'].'</td>
    <td width="148" align="right">کد پستی</td>
    
  </tr>
  <tr>
    
    <td width="154" align="right">'.$row['birthplace'].'</td>
    <td width="148" align="right">محل تولد</td>
    
  </tr>
  <tr>
    
    <td width="154" align="right">'.$row['emloymentDate'].'</td>
    <td width="148" align="right">تاریخ استخدام</td>
    
  </tr>
  <tr>
    
    <td width="154" align="right">'.$row['address'].'</td>
    <td width="148" align="right">آدرس</td>
    
  </tr>
  <tr>
    
    <td width="154" align="right">'.$row['tel'].'</td>
    <td width="148" align="right">تلفن</td>
    
  </tr>
  <tr>
  <tr>
    
    <td width="154" align="right">'.$row['email'].'</td>
    <td width="148" align="right">ایمیل</td>
    
  </tr>
  <tr>
  <tr>
    
    <td width="154" align="right">'.$row['job'].'</td>
    <td width="148" align="right">شفل</td>
    
  </tr>
  <tr>
  <tr>
    
    <td width="154" align="right">'.$row['military'].'</td>
    <td width="148" align="right">وضعیت سربازی</td>
    
  </tr>
  <tr>
    
    <td width="154" align="right">'.$row['healthCardDeadline'].'</td>
    <td width="148" align="right">تاریخ اعتبار کارت بهداشت پرسنل</td>
    
  </tr>
  <tr>

    <td width="154" align="right">'.$row['mobile'].'</td>
    <td width="148" align="right">موبایل</td>
    
  </tr>
  <tr>
    
    <td width="154" align="right">'.$row['bank'].'</td>
    <td width="148" align="right">نام بانک</td>
    
  </tr>
  <tr>
    
    <td width="154" align="right">'.$row['bankBranch'].'</td>
    <td width="148" align="right">شعبه بانک</td>
    
  </tr>
  <tr>
    
    <td width="154" align="right">'.$row['bankAccount'].'</td>
    <td width="148" align="right">شماره حساب</td>
    
  </tr>
 	 	 
  </table>
  </fieldset>
</div>	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	
	   
	   
	 ';  
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   


	}

    ?> 

</table>
<?php
include("header.php");
?>

</body>
</html>
