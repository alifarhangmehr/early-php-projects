<?php
session_start();
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->createPageHeader('editEmploye','C');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
$pageHeader->includeFile('modules/tinymce/jscripts/tiny_mce/tiny_mce.js');
$pageHeader->includeFile('js/txtAreaEditor.js');
include('../class/file.php');
$savePhoto=new myfile();

$table=new table();
$pageHeader->suggestion('data');
if(isset($_POST['name'])){
	
$employeId=$_POST['employeId'];	
$photo['name']=$_FILES["photoSource"]["name"];
$photo['type']=$_FILES["photoSource"]["type"];
$photo['size']=$_FILES["photoSource"]["size"];
$photo['error']=$_FILES["photoSource"]["error"];
$photo['tmp_name']=$_FILES["photoSource"]["tmp_name"];
$location='../images/employes/';
$savePhoto->uploadPhoto($photo,$location,$employeId);

$updateField[0][0]='name';	
$updateField[1][0]='family';
$updateField[2][0]='user';
$updateField[3][0]='pass';
$updateField[4][0]='tel';
$updateField[5][0]='mobile';
$updateField[6][0]='address';
$updateField[7][0]='birthday';
$updateField[8][0]='grade';
$updateField[9][0]='salary';
$updateField[10][0]='photoSource';
$updateField[11][0]='photoThumb';
$updateField[12][0]='comments';
$updateField[0][1]=$_POST['name'];
$updateField[1][1]=$_POST['family'];
$updateField[2][1]=$_POST['user'];
$updateField[3][1]=$_POST['pass'];
$updateField[4][1]=$_POST['tel'];
$updateField[5][1]=$_POST['mobile'];
$updateField[6][1]=$_POST['address'];
$updateField[7][1]=$_POST['birthday'];
$updateField[8][1]=$_POST['grade'];
$updateField[9][1]=$_POST['salary'];
$updateField[10][1]='../images/employes/source'.$employeId.'.jpg';//PHOTO!!!
$updateField[11][1]='../images/employes/thumb'.$employeId.'.jpg';
$updateField[12][1]=$_POST['comments'];

$tableName='employes';
$condition='employeId='.$employeId;

$table->updateTable($updateField,$tableName,$condition);

echo '<p align="center" class="addMsg">'.$editEmploye_successfully_edited_message.'</p>';
echo '<script language="javascript" type="text/javascript"> redirectPage("showEmploye.php"); </script>';
}
?>
<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" id="employeForm" enctype="multipart/form-data">
<input type="hidden" name="employeId" value="<?php echo $_POST['employeId']; ?>" />
<table border="0" cellspacing="3" cellpadding="0" align="center" dir="<?php echo $language_direction; ?>"  class="addTable" width="550px">
  <tr class="addTableHeader">
    <th colspan="2" align="center"><?php echo $editEmploye_title ?></th>
  </tr>
<?php
$employeId=$_POST['employeId'];

$fieldName1[0][0]='name';	
$fieldName1[1][0]='family';
$fieldName1[2][0]='user';
$fieldName1[3][0]='tel';
$fieldName1[4][0]='mobile';
$fieldName1[5][0]='address';
$fieldName1[6][0]='birthday';
$fieldName1[7][0]='grade';
$fieldName1[8][0]='salary';
$fieldName1[0][1]=$editEmploye_name;
$fieldName1[1][1]=$editEmploye_family;
$fieldName1[2][1]=$editEmploye_user;
$fieldName1[3][1]=$editEmploye_tel;
$fieldName1[4][1]=$editEmploye_mobile;
$fieldName1[5][1]=$editEmploye_address;
$fieldName1[6][1]=$editEmploye_birthday;
$fieldName1[7][1]=$editEmploye_grade;
$fieldName1[8][1]=$editEmploye_salary;

$connector=new connection();
if(!$connector->dbConnect()) echo 'Error No. 7';
$query="SELECT * FROM employes WHERE employeId='$employeId'";
$result=$connector->queryRun($query);
if(!$result) echo 'Error No. 8';
$row=mysql_fetch_array($result);

$fieldValue[0]=$row[$fieldName1[0][0]];
$fieldValue[1]=$row[$fieldName1[1][0]];
$fieldValue[2]=$row[$fieldName1[2][0]];
$fieldValue[3]=$row[$fieldName1[3][0]];
$fieldValue[4]=$row[$fieldName1[4][0]];
$fieldValue[5]=$row[$fieldName1[5][0]];
$fieldValue[6]=$row[$fieldName1[6][0]];
$fieldValue[7]=$row[$fieldName1[7][0]];
$fieldValue[8]=$row[$fieldName1[8][0]];
$fieldValue[9]=$row[$fieldName1[9][0]];

$table->showEditTable($fieldName1,$fieldValue);		
      
    echo '
	<tr>
		<td>'.$editEmploye_photo_source.'</td>
		<td><input type="file" name="photoSource" /></td>
	</tr>
	<tr>
   		<td colspan="2">'.$editEmploye_comments.'</td>
	</tr>
	<tr>
    	<td colspan="2">
			<textarea name="comments" id="comments">'.$row['comments'].'</textarea>
		</td>
	</tr>
	<tr class="addTableTd">
    	<td colspan="2" align="center"><input type="submit" value="'.$editEmploye_submit.'" class="addTableBut" />
		</td>
	</tr></table>
	</form>';
?>

</body>
</html>
