<?php
session_start();
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->createPageHeader('editOa','}');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
echo '<script type="text/javascript"  src="../modules/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript"  src="../js/txtAreaEditor.js"></script>';
$table=new table();
$pageHeader->suggestion('data');

if(isset($_POST['oaId2'])){
$updateField[0][0]='type';	
$updateField[1][0]='name';
$updateField[2][0]='family';
$updateField[3][0]='company';
$updateField[4][0]='address';
$updateField[5][0]='tel';
$updateField[6][0]='mobile';
$updateField[7][0]='comments';
$updateField[0][1]=$_POST['type'];
$updateField[1][1]=$_POST['name'];
$updateField[2][1]=$_POST['family'];
$updateField[3][1]=$_POST['company'];
$updateField[4][1]=$_POST['address'];
$updateField[5][1]=$_POST['tel'];
$updateField[6][1]=$_POST['mobile'];
$updateField[7][1]=$_POST['comments'];
$tableName='oa';
$condition='oaId='.$_POST['oaId2'];
$table->updateTable($updateField,$tableName,$condition);
echo '<p align="center" class="addMsg">'.$editOa_successfully_edited_message.'</p>';
echo '<script language="javascript" type="text/javascript"> redirectPage("showOa.php"); </script>';
}
?>







<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" id="oaForm">
<input type="hidden" name="oaId2" value="<?php echo $_POST['oaId']; ?>" />
<table border="0" cellspacing="3" cellpadding="0" align="center" dir="<?php echo $language_direction; ?>"  class="addTable" width="550px">
  <tr class="addTableHeader">
    <th colspan="2" align="center"><?php echo $editOa_title ?></th>
  </tr>
<?php
$fieldName1[0][0]='name';
$fieldName1[1][0]='family';
$fieldName1[2][0]='company';
$fieldName1[3][0]='address';
$fieldName1[4][0]='tel';
$fieldName1[5][0]='mobile';
$fieldName1[0][1]=$editOa_name;
$fieldName1[1][1]=$editOa_family;
$fieldName1[2][1]=$editOa_company;
$fieldName1[3][1]=$editOa_address;
$fieldName1[4][1]=$editOa_tel;
$fieldName1[5][1]=$editOa_mobile;
$oaId=$_POST['oaId'];
$query="SELECT * FROM oa WHERE oaId='$oaId'";
$connector=new connection();
if(!$connector->dbConnect()) echo 'Error No. 7';
$result=$connector->queryRun($query);
$row=mysql_fetch_array($result);
$fieldValue[0]=$row['name'];
$fieldValue[1]=$row['family'];
$fieldValue[2]=$row['company'];
$fieldValue[3]=$row['address'];
$fieldValue[4]=$row['tel'];
$fieldValue[5]=$row['mobile'];
$table->showEditTable($fieldName1,$fieldValue);
	
if($row['type']=='real'){
	$typeDefault1='selected="selected"';
	$typeDefault2='';
}else{$typeDefault1='';
	$typeDefault2='selected="selected"';}      
    echo '
    <tr>
   		<td>'.$editOa_type.'</td>
    	<td><select name="type" id="type" style="width:70px">
				<option value="real" '.$typeDefault1.'>'.$editOa_type_real.'</option>
			  	<option value="legal" '.$typeDefault2.'>'.$editOa_type_legal.'</option>
			</select>
		</td>
	</tr>
	<tr>
		<td colspan="2">'.$editOa_comments.'</td>
	</tr>
	<tr>
		<td colspan="2">
			<textarea name="comments" id="comments">'.$row['comments'].'</textarea>
		</td>
	</tr>
	<tr class="addTableTd">
    	<td colspan="2" align="center"><input type="submit" value="'.$editOa_submit.'" class="addTableBut" />
		</td>
	</tr></table>
	</form>';
?>

</body>
</html>
