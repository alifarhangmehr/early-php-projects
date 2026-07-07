<?php
session_start();
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->createPageHeader('addGood','b');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
$pageHeader->suggestion('data2');
$fieldName1[0][0]=$columns[0]='goodName';
$fieldName1[1][0]=$columns[1]='sellPrice';
$fieldName1[2][0]=$columns[2]='purchasePrice';
$fieldName2[0][0]=$columns[3]='barcode';
$fieldName1[0][1]=$addGood_good_name;
$fieldName1[1][1]=$addGood_good_sell_price;
$fieldName1[2][1]=$addGood_good_purchase_price;
$fieldName2[0][1]=$addGood_good_barcode;
$table=new table();
if(isset($_POST['goodName'])){
$resultFlag=0;
$values[0]=$_POST[$fieldName1[0][0]];
$values[1]=$_POST[$fieldName1[1][0]];
$values[2]=$_POST[$fieldName1[2][0]];
if($_POST[$fieldName2[0][0]]!='')
	$values[3]=$_POST[$fieldName2[0][0]];
else{
	$connector=new connection();
	$query="SELECT MAX(barcode) FROM goods WHERE LENGTH(barcode)=7";
	$result=$connector->queryRun($query);
	if($result) $resultFlag++;
	$row=mysql_fetch_array($result);
	$values[3]=$row['MAX(barcode)']+1;
}//create barcode
$tableName='goods';
$idColumnName='goodId';
$goodId=$table->insertIntoTable($columns,$values,$tableName,$idColumnName);
$connector=new connection();
$query="SELECT * FROM goodfields ORDER BY `goodfields`.`goodFieldId` ASC";
$result=$connector->queryRun($query);
if($result) $resultFlag++;
while($row0=mysql_fetch_array($result)){
		$id=$row0['goodFieldId'];
		$field='field'.$id;
		$fieldId='fieldId'.$id;
		$fieldName='fieldName'.$id;
		if($_POST[$fieldId]!=''){
			$fieldIdTemp=$_POST[$fieldId];
			$updateField[0][0]=$fieldId;
			$updateField[0][1]=$fieldIdTemp;
			$tableName='goods';
			$condition='`goods`.`goodId` ='.$goodId;
			$table->updateTable($updateField,$tableName,$condition);
		}else if($_POST[$field]!='') {
			$fieldNameTemp=$_POST[$field];
			$query="SELECT * FROM `$field` WHERE $fieldName='$fieldNameTemp'";
			if($table->ifValueExist($query)){
				$tempRow=$table->ifValueExist($query);
				$fieldNameTemp=$_POST[$field];
				$fieldIdTemp=$tempRow[$fieldId];
				$updateField2[0][0]=$fieldId;
				$updateField2[0][1]=$fieldIdTemp;
				$tableName2='goods';
				$condition='goodId'.'='.$goodId;
				$table->updateTable($updateField2,$tableName2,$condition);
				}else{
					$columns2[0]=$fieldName;
					$values2[0]=$fieldNameTemp;
					$tableName=$field;
					$idColumnName=$fieldId;
					$maxFieldId=$table->insertIntoTable($columns2,$values2,$tableName,$idColumnName);
					$updateField[0][0]=$fieldId;
					$updateField[0][1]=$maxFieldId;
					$tableName='goods';
					$condition='`goods`.`goodId` ='.$goodId;
					$table->updateTable($updateField,$tableName,$condition);
			}
		}
	} echo '<p align="center" class="addMsg">'.$addGood_successfully_added_message.'</p>';
}


?>
<br /><br />
<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
<table border="0" cellspacing="3" cellpadding="0" align="center" dir="<?php echo $language_direction; ?>"  class="addTable">
  <tr class="addTableHeader">
    <th colspan="2" align="center"><?php echo $addGood_table_title; ?></th>
  </tr>

<?php
$table->showAddTable($fieldName1);
$i=1;
$connector=new connection();
if(!$connector->dbConnect()) echo 'Error No. 7';
$query="SELECT * FROM goodfields ORDER BY `goodfields`.`goodFieldId` ASC";
$result=$connector->queryRun($query);
if(!$result) echo 'Error No. 8';
while($row = mysql_fetch_array($result)){
	$goodFieldId=$row['goodFieldId'];
	echo '<tr class="addTableTd">
		 <td width="148" align="right">'.$row['goodFieldName'].'</td>
		 <td width="154" align="right">
		 <div class="ausu-suggest">
		  <input type="text" size="30" value="" name="field'.$goodFieldId.'" id="field'.$goodFieldId.'" autocomplete="off" />
		  <br />
		  <input type="text" style="display:none" size="30" value="" name="fieldId'.$goodFieldId.'" id="fieldId'.$goodFieldId.'" autocomplete="off" />
	   </div>
		 </td>
	   </tr>';
}
$table->showAddTable($fieldName2);
?>
  <tr class="addTableTd">
    <td colspan="2" align="center"><input type="submit" value="<?php echo $addGood_submit_value; ?>" class="addTableBut" /></td>
  </tr>
</table>
</form>
</body>