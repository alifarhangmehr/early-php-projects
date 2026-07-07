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
	<th style="color:#6C0">عکس</th>   
	<th style="color:#6C0">نام</th>
	<th style="color:#6C0">فامیل</th>
	<th style="color:#6C0">ایمیل</th>
	<th style="color:#6C0">شماره دانشجویی</th>
	<th style="color:#6C0">موبایل 1</th>
    <th style="color:#6C0">اطلاعات کامل</th>
</tr>
	
	
	
	
	

<?php
include('../class/connect.php');
	echo'<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
	echo'<link rel="stylesheet" type="text/css" href="../themes/default/css/admin.css">';
	$con=new connect();
	$con-> dbConnect();
	$name=$_POST['name'];
	//$name='%'.$_POST['name'].'%';
	//echo $name ;
	//echo 'name : '.$name;
	
	$searchOP=$_POST['searchOP'];
	$searchValue=$_POST['searchValue'];
	//echo $searchValue;
	
if($searchOP=='studentNumber') $query = "(SELECT * FROM  igwstudents WHERE studentNumber = '$searchValue')";

else if($searchOP=='user') $query = "(SELECT * FROM  igwstudents WHERE user = '$searchValue')";

else if($searchOP=='groupName') $query = "(SELECT * FROM  igwstudents WHERE groupName = '$searchValue')";

else if($searchOP=='name') $query = "(SELECT * FROM  igwstudents WHERE name = '$searchValue' or pName = '$searchValue')";

else if($searchOP=='family') $query = "(SELECT * FROM  igwstudents WHERE family = '$searchValue' or pFamily = '$searchValue')";

else if($searchOP=='father') $query = "(SELECT * FROM  igwstudents WHERE father = '$searchValue')";

else if($searchOP=='email') $query = "(SELECT * FROM  igwstudents WHERE email = '$searchValue')";

else if($searchOP=='nationalCode') $query = "(SELECT * FROM  igwstudents WHERE nationalCode = '$searchValue')";

else if($searchOP=='birthday') $query = "(SELECT * FROM  igwstudents WHERE birthday = '$searchValue')";

else if($searchOP=='telephone') $query = "(SELECT * FROM  igwstudents WHERE telephone = '$searchValue' OR mobile1 = '$searchValue' OR mobile2 = '$searchValue')";

else if($searchOP=='accessLevel') $query = "(SELECT * FROM  igwstudents WHERE accessLevel = '$searchOP')";

else if($searchOP=='all')

	$query = "(SELECT * 	FROM  igwstudents WHERE  
	studentNumber = '$searchValue'
	OR     user = '$searchValue'
	OR     groupName = '$searchValue'
	OR     name LIKE '%$searchValue%' 
	OR     family LIKE '%$searchValue%'
	OR     pName LIKE '%$searchValue%' 
	OR     pFamily LIKE '%$searchValue%' 
	OR     father = '$searchValue' 
	OR     email = '$searchValue'
	OR     nationalCode = '$searchValue'
	OR     birthday = '$searchValue'
	OR     telephone = '$searchValue'
	OR     mobile1 = '$searchValue'
	OR     mobile2 = '$searchValue'
	OR     accessLevel = '$searchValue'
	)" ;
	
	
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
	if($row['image']=='') $image='<img src="../themes/default/images/admin/noStundetImage.png" width="32" height="32" />';
	else $image='<img src="'.$row['image'].'" width="45" height="60" />';
	$inPageId++;
	echo '<tr '.$bgColor.'>' ;
	echo '<td align=center id=imageTd'.$row['id'].'>'.$image.'</td>';
	echo '<td align=center id=nameTd'.$row['id'].'>'.$row['pName'].'</td>';
	echo '<td align=center id=familyTd'.$row['id'].'>'.$row['pFamily'].'</td>';
	echo '<td align=center id=emailTd'.$row['id'].'>'.$row['email'].'</td>';
	echo '<td align=center id=studentNumberTd'.$row['id'].'>'.$row['studentNumber'].'</td>';
	echo '<td align=center id=mobile1Td'.$row['id'].'>'.$row['mobile1'].'</td>';
	echo '<td align=center id=moreStudentInfoTd'.$row['id'].'><a style="color:#3CF" href=showStudentDetails.php?id='.$row['id'].'>+</td></tr>';
	
	
	
}
	
	

	
	
	
	?>
	</tr>
    </table>
     </body>
    </html> 