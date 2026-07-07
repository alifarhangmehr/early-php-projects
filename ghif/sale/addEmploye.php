<?php
session_start();
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->createPageHeader('addEmploye','B');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
$pageHeader->includeFile('modules/tinymce/jscripts/tiny_mce/tiny_mce.js');
$pageHeader->includeFile('js/txtAreaEditor.js');
include('../class/file.php');
$savePhoto=new myfile();
$table=new table();
$pageHeader->suggestion('data');
if(isset($_POST['name'])){
	
$connector=new connection();
if(!$connector->dbConnect()) echo 'Error 7';
$query="SELECT MAX(employeId) FROM employes";
$result=$connector->queryRun($query);
if(!$result) echo 'Error No.8';
$row=mysql_fetch_array($result);

$employeId=$row['MAX(employeId)']+1;	
$photo['name']=$_FILES["photoSource"]["name"];
$photo['type']=$_FILES["photoSource"]["type"];
$photo['size']=$_FILES["photoSource"]["size"];
$photo['error']=$_FILES["photoSource"]["error"];
$photo['tmp_name']=$_FILES["photoSource"]["tmp_name"];
$location='../images/employes/';
$savePhoto->uploadPhoto($photo,$location,$employeId);

$columns[0]='name';	
$columns[1]='family';
$columns[2]='user';
$columns[3]='pass';
$columns[4]='tel';
$columns[5]='mobile';
$columns[6]='address';
$columns[7]='birthday';
$columns[8]='grade';
$columns[9]='salary';
$columns[10]='photoSource';
$columns[11]='photoThumb';
$columns[12]='comments';
$values[0]=$_POST['name'];
$values[1]=$_POST['family'];
$values[2]=$_POST['user'];
$values[3]=md5($_POST['pass']);
$values[4]=$_POST['tel'];
$values[5]=$_POST['mobile'];
$values[6]=$_POST['address'];
$values[7]=$_POST['birthday'];
$values[8]=$_POST['grade'];
$values[9]=$_POST['salary'];
$values[10]='../images/employes/source'.$employeId.'.jpg'; //PHOTO!!!
$values[11]='../images/employes/thumb'.$employeId.'.jpg';
$values[12]=$_POST['comments'];
$tableName='employes';
$idColumnName='employeId';
$table->insertIntoTable($columns,$values,$tableName,$idColumnName);
echo '<p align="center" class="addMsg">'.$addEmploye_successfully_added_message.'</p>';
echo '<script language="javascript" type="text/javascript"> redirectPage("showEmploye.php"); </script>';
}
?>
<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" id="employeForm" enctype="multipart/form-data">
<table border="0" cellspacing="3" cellpadding="0" align="center" dir="<?php echo $language_direction; ?>"  class="addTable" width="550px">
  <tr class="addTableHeader">
    <th colspan="2" align="center"><?php echo $addEmploye_title ?></th>
  </tr>
<?php


$fieldName1[0][0]='name';	
$fieldName1[1][0]='family';
$fieldName1[2][0]='user';
$fieldName1[3][0]='pass';
$fieldName1[4][0]='tel';
$fieldName1[5][0]='mobile';
$fieldName1[6][0]='address';
$fieldName1[7][0]='birthday';
$fieldName1[8][0]='grade';
$fieldName1[9][0]='salary';
$fieldName1[0][1]=$addEmploye_name;
$fieldName1[1][1]=$addEmploye_family;
$fieldName1[2][1]=$addEmploye_user;
$fieldName1[3][1]=$addEmploye_pass;
$fieldName1[4][1]=$addEmploye_tel;
$fieldName1[5][1]=$addEmploye_mobile;
$fieldName1[6][1]=$addEmploye_address;
$fieldName1[7][1]=$addEmploye_birthday;
$fieldName1[8][1]=$addEmploye_grade;
$fieldName1[9][1]=$addEmploye_salary;

$table->showAddTable($fieldName1);	
      
    echo '
	<tr>
		<td>'.$addEmploye_photo_source.'</td>
		<td><input type="file" name="photoSource" /></td>
	</tr>
	<tr>
   		<td colspan="2">'.$addEmploye_comments.'</td>
	</tr>
	<tr>
    	<td colspan="2">
			<textarea name="comments" id="comments"></textarea>
		</td>
	</tr>
	<tr class="addTableTd">
    	<td colspan="2" align="center"><input type="submit" value="'.$addEmploye_submit.'" class="addTableBut" />
		</td>
	</tr></table>
	</form>';
?>

</body>
</html>
