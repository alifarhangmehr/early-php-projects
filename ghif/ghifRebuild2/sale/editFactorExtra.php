<?php
session_start();
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->createPageHeader('editFactorExtra','t');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
$table=new table();
$pageHeader->suggestion('data');

if(isset($_POST['factorExtraId2'])){
$updateField[0][0]='factorExtraName';
$updateField[1][0]='priceType';	
$updateField[2][0]='price';
$updateField[3][0]='default';
$updateField[0][1]=$_POST['factorExtraName'];
$updateField[1][1]=$_POST['priceType'];
$updateField[2][1]=$_POST['price'];
$updateField[3][1]=$_POST['default'];
$tableName='factorextra';
$condition='factorExtraId='.$_POST['factorExtraId2'];
$table->updateTable($updateField,$tableName,$condition);

echo '<p align="center" class="addMsg">'.$editFactorExtra_successfully_edited_message.'</p>';
	echo '<script language="javascript" type="text/javascript"> redirectPage("showFactorExtra.php"); </script>';
}
?>










<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" id="factorExtraForm">
<input type="hidden" name="factorExtraId2" value="<?php echo $_POST['factorExtraId']; ?>" />

<table border="0" cellspacing="3" cellpadding="0" align="center" dir="<?php echo $language_direction; ?>"  class="addTable" width="550px">
  <tr class="addTableHeader">
    <th colspan="2" align="center"><?php echo $addFactorExtra_title; ?></th>
  </tr>
<?php
$fieldName1[0][0]='factorExtraName';
$fieldName1[1][0]='price';
$fieldName1[0][1]=$editFactorExtra_field_name;
$fieldName1[1][1]=$editFactorExtra_price;
$factorExtraId=$_POST['factorExtraId'];
$connector=new connection();
$query="SELECT * FROM factorextra WHERE factorExtraId='$factorExtraId'";
$result=$connector->queryRun($query);
$row=mysql_fetch_array($result);
$fieldValue[0]=$row[$fieldName1[0][0]];
$fieldValue[1]=$row[$fieldName1[1][0]];
$fieldValue[2]=$row[$fieldName1[2][0]];
$fieldValue[3]=$row[$fieldName1[3][0]];
if($fieldValue[1]==$editFactorExtra_pticeType_prcentage){
	$priceTypeDefault1='selected="selected"';
	$priceTypeDefault2='';
}else{$priceTypeDefault1='';
	$priceTypeDefault2='selected="selected"';}
if($fieldValue[3]==$editFactorExtra_default_yes){
	$default1='selected="selected"';
	$default2='';
}else{$default1='';
	 $default2='"selected=selected"';}
$table->showEditTable($fieldName1,$fieldValue);	
      
    echo '
    <tr>
   		<td>'.$editFactorExtra_pticeType.'</td>
    	<td><select name="priceType" id="factorExtraId">
				<option value="percentage" '.$priceTypeDefault1.'>'.$editFactorExtra_pticeType_prcentage.'</option>
			  	<option value="static" '.$priceTypeDefault2.'>'.$editFactorExtra_pticeType_static.'</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>'.$editFactorExtra_default.'</td>
		<td><select name="default" id="paperType">
				<option value="yes" '.$selected2.'>'.$editFactorExtra_default_yes.'</option>
				<option value="no" '.$selected2.'>'.$editFactorExtra_default_no.'</option>
			</select>
		</td>
	</tr>
	<tr class="addTableTd">
    	<td colspan="2" align="center"><input type="submit" value="'.$editFactorExtra_submit.'" class="addTableBut" />
		</td>
	</tr></table>
	</form>';
?>

</body>
</html>
