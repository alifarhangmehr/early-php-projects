<?php
session_start();
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->createPageHeader('addCustomer','}');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
echo '<script type="text/javascript"  src="../modules/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript"  src="../js/txtAreaEditor.js"></script>';

$table=new table();
$pageHeader->suggestion('data');
if(isset($_POST['name'])){

$columns[0]='name';	
$columns[1]='family';
$columns[2]='membershipNo';
$columns[3]='sex';
$columns[4]='address';
$columns[5]='email';
$columns[6]='mobile1';
$columns[7]='mobile2';
$columns[8]='tel1';
$columns[9]='tel2';
$columns[10]='photoSource';
$columns[11]='birthday';
$columns[12]='membershipDate';
$columns[13]='membershipDuration';
$columns[14]='comments';
$values[0]=$_POST['name'];
$values[1]=$_POST['family'];
$values[2]=$_POST['membershipNo'];
$values[3]=$_POST['sex'];
$values[4]=$_POST['address'];
$values[5]=$_POST['email'];
$values[6]=$_POST['mobile1'];
$values[7]=$_POST['mobile2'];
$values[8]=$_POST['tel1'];
$values[9]=$_POST['tel2'];
$values[10]=''; //PHOTO!!!
$values[11]=$_POST['birthday'];
$values[12]=$_POST['membershipDate'];
$values[13]=$_POST['membershipDuration'];
$values[14]=$_POST['comments'];
$tableName='customers';
$idColumnName='customerId';
$table->insertIntoTable($columns,$values,$tableName,$idColumnName);
echo '<p align="center" class="addMsg">'.$addCustomer_successfully_added_message.'</p>';
echo '<script language="javascript" type="text/javascript"> redirectPage("showCustomer.php"); </script>';
}
?>
<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" id="customerForm" enctype="multipart/form-data">
<table border="0" cellspacing="3" cellpadding="0" align="center" dir="<?php echo $language_direction; ?>"  class="addTable" width="550px">
  <tr class="addTableHeader">
    <th colspan="2" align="center"><?php echo $addCustomer_title ?></th>
  </tr>
<?php


$fieldName1[0][0]='name';	
$fieldName1[1][0]='family';
$fieldName1[2][0]='membershipNo';
$fieldName1[3][0]='address';
$fieldName1[4][0]='email';
$fieldName1[5][0]='mobile1';
$fieldName1[6][0]='mobile2';
$fieldName1[7][0]='tel1';
$fieldName1[8][0]='tel2';
$fieldName1[9][0]='birthday';
$fieldName1[10][0]='membershipDate';
$fieldName1[11][0]='membershipDuration';
$fieldName1[0][1]=$addCustomer_name;
$fieldName1[1][1]=$addCustomer_family;
$fieldName1[2][1]=$addCustomer_membershipNo;
$fieldName1[3][1]=$addCustomer_address;
$fieldName1[4][1]=$addCustomer_email;
$fieldName1[5][1]=$addCustomer_mobile1;
$fieldName1[6][1]=$addCustomer_mobile2;
$fieldName1[7][1]=$addCustomer_tel1;
$fieldName1[8][1]=$addCustomer_tel2;
$fieldName1[9][1]=$addCustomer_birthday;
$fieldName1[10][1]=$addCustomer_membershipDate;
$fieldName1[11][1]=$addCustomer_membershipDuration;

$table->showAddTable($fieldName1);	
      
    echo '
	<tr>
		<td>'.$addCustomer_photoSource.'</td>
		<td><input type="file" name="photoSource" /></td>
	</tr>
    <tr>
   		<td>'.$addCustomer_sex.'</td>
    	<td><select name="sex" id="type" style="width:70px">
				<option value="male">'.$addCustomer_type_male.'</option>
			  	<option value="female">'.$addCustomer_type_female.'</option>
			</select>
		</td>
	</tr>
	<tr>
   		<td colspan="2">'.$addCustomer_comments.'</td>
	</tr>
	<tr>
    	<td colspan="2">
			<textarea name="comments" id="comments"></textarea>
		</td>
	</tr>
	<tr class="addTableTd">
    	<td colspan="2" align="center"><input type="submit" value="'.$addCustomer_submit.'" class="addTableBut" />
		</td>
	</tr></table>
	</form>';
?>

</body>
</html>
