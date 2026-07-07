<?php
session_start();
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->createPageHeader('editCustomer','}');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');

$pageHeader->includeFile('modules/tinymce/jscripts/tiny_mce/tiny_mce.js');
$pageHeader->includeFile('js/txtAreaEditor.js');

$table=new table();
$pageHeader->suggestion('data');

if(isset($_POST['customerId2'])){
		
$updateField[0][0]='name';	
$updateField[1][0]='family';
$updateField[2][0]='membershipNo';
$updateField[3][0]='sex';
$updateField[4][0]='address';
$updateField[5][0]='email';
$updateField[6][0]='mobile1';
$updateField[7][0]='mobile2';
$updateField[8][0]='tel1';
$updateField[9][0]='tel2';
$updateField[10][0]='photoSource';
$updateField[11][0]='birthday';
$updateField[12][0]='membershipDate';
$updateField[13][0]='membershipDuration';
$updateField[14][0]='comments';
$updateField[0][1]=$_POST['name'];
$updateField[1][1]=$_POST['family'];
$updateField[2][1]=$_POST['membershipNo'];
$updateField[3][1]=$_POST['sex'];
$updateField[4][1]=$_POST['address'];
$updateField[5][1]=$_POST['email'];
$updateField[6][1]=$_POST['mobile1'];
$updateField[7][1]=$_POST['mobile2'];
$updateField[8][1]=$_POST['tel1'];
$updateField[9][1]=$_POST['tel2'];
$updateField[10][1]='';//PHOTO!!!
$updateField[11][1]=$_POST['birthday'];
$updateField[12][1]=$_POST['membershipDate'];
$updateField[13][1]=$_POST['membershipDuration'];
$updateField[14][1]=$_POST['comments'];
$tableName='customers';
$condition='customerId='.$_POST['customerId2'];
$table->updateTable($updateField,$tableName,$condition);
echo '<p align="center" class="addMsg">'.$editCustomer_successfully_added_message.'</p>';
echo '<script language="javascript" type="text/javascript"> redirectPage("showCustomer.php"); </script>';
}
?>










<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" id="customerForm" enctype="multipart/form-data">
<input type="hidden" name="customerId2" value="<?php echo $_POST['customerId']; ?>" />
<table border="0" cellspacing="3" cellpadding="0" align="center" dir="<?php echo $language_direction; ?>"  class="addTable" width="550px">
  <tr class="addTableHeader">
    <th colspan="2" align="center"><?php echo $addCustomer_title ?></th>
  </tr>
<?php
$customerId=$_POST['customerId'];
$connector=new connection();
$query="SELECT * FROM `customers` WHERE `customerId`='$customerId'";
$result=$connector->queryRun($query);
$row=mysql_fetch_array($result);

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
$fieldName1[0][1]=$editCustomer_name;
$fieldName1[1][1]=$editCustomer_family;
$fieldName1[2][1]=$editCustomer_membershipNo;
$fieldName1[3][1]=$editCustomer_address;
$fieldName1[4][1]=$editCustomer_email;
$fieldName1[5][1]=$editCustomer_mobile1;
$fieldName1[6][1]=$editCustomer_mobile2;
$fieldName1[7][1]=$editCustomer_tel1;
$fieldName1[8][1]=$editCustomer_tel2;
$fieldName1[9][1]=$editCustomr_photoThumb;
$fieldName1[10][1]=$editCustomer_birthday;
$fieldName1[11][1]=$editCustomer_membershipDate;
$fieldName1[12][1]=$editCustomer_membershipDuration;

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
$fieldValue[10]=$row[$fieldName1[10][0]];
$fieldValue[11]=$row[$fieldName1[11][0]];
$fieldValue[12]=$row[$fieldName1[12][0]];
$fieldValue[13]=$row[$fieldName1[13][0]];

if($row['sex']=='male'){
	$sexDefault1='selected="selected"';
	$sexDefault2='';
}else{$sexDefault1='';
	$sexDefault2='selected="selected"';}
$table->showEditTable($fieldName1,$fieldValue);	
      
    echo '
	<tr>
		<td>'.$editCustomer_photoSource.'</td>
		<td><img src="'.$row['photoSource'].'" alt="" width="120px" height="120px" />
		<input type="file" name="photoSource" id="photoSource" /></td>
	</tr>
    <tr>
   		<td>'.$editCustomer_sex.'</td>
    	<td><select name="sex" id="type" style="width:70px">
				<option value="male" '.$sexDefault1.'>'.$editCustomer_type_male.'</option>
			  	<option value="female" '.$sexDefault2.'>'.$editCustomer_type_female.'</option>
			</select>
		</td>
	</tr>
	<tr>
   		<td colspan="2">'.$editCustomer_comments.'</td>
    	
	</tr>
	<tr>
		<td colspan="2">	
			<textarea name="comments" id="comments">'.$row['comments'].'</textarea>
		</td>
	</tr>
	<tr class="addTableTd">
    	<td colspan="2" align="center"><input type="submit" value="'.$editCustomer_submit.'" class="addTableBut" />
		</td>
	</tr></table>
	</form>';
?>

</body>
</html>
