<?php
session_start();
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->createPageHeader('editGood','c');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
$pageHeader->suggestion();
$goodId=$_POST['goodId'];
$connector=new connection();
$query="SELECT * FROM goods WHERE goodId='$goodId'";
$result=$connector->queryRun($query);
$row0=mysql_fetch_array($result);

$fieldName1[0][0]=$updateField[0][0]='goodName';
$fieldName1[1][0]=$updateField[1][0]='sellPrice';
$fieldName1[2][0]=$updateField[2][0]='purchasePrice';

$fieldValue1[0]=$row0[$fieldName1[0][0]];
$fieldValue1[1]=$row0[$fieldName1[1][0]];
$fieldValue1[2]=$row0[$fieldName1[2][0]];


$fieldName2[0][0]=$updateField[3][0]='barcode';
$fieldValue2[0]=$row0[$fieldName2[0][0]];

$fieldName1[0][1]=$editGood_good_name;
$fieldName1[1][1]=$editGood_good_sell_price;
$fieldName1[2][1]=$editGood_good_purchase_price;

$fieldName2[0][1]=$editGood_good_barcode;

$table=new table();



if(isset($_POST['goodId2'])){
$resultFlag=0;
$updateField[0][1]=$_POST[$fieldName1[0][0]];
$updateField[1][1]=$_POST[$fieldName1[1][0]];
$updateField[2][1]=$_POST[$fieldName1[2][0]];


if($_POST[$fieldName2[0][0]]!='')
	$updateField[3][1]=$_POST[$fieldName2[0][0]];
	
else{
	$connector=new connection();
	$query="SELECT MAX(barcode) FROM goods WHERE LENGTH(barcode)=7";
	$result=$connector->queryRun($query);
	if($result) $resultFlag++;
	$row=mysql_fetch_array($result);
	$updateField[3][1]=$row['MAX(barcode)']+1;
}//create barcode
$tableName='goods';
$condition='goodId = '.$_POST['goodId2'];
//$goodId=$table->insertIntoTable($columns,$values,$tableName,$idColumnName);
$goodId=$table->updateTable($updateField,$tableName,$condition);
$connector=new connection();
$query="SELECT * FROM goodfields ORDER BY `goodfields`.`goodFieldId` ASC";
$result=$connector->queryRun($query);
if($result) $resultFlag++;
while($row3=mysql_fetch_array($result)){
		$id=$row3['goodFieldId'];
		$field='field'.$id;
		$fieldId='fieldId'.$id;
		$fieldName='fieldName'.$id;
		if($_POST[$fieldId]!=''){//id por ast
			$fieldIdTemp=$_POST[$fieldId];
			$updateField1[0][0]=$fieldId;
			if($_POST[$field]=='') $updateField1[0][1]=0;
			else $updateField1[0][1]=$fieldIdTemp;
			$fieldNameTemp=$_POST[$field];
			$query="SELECT * FROM `$field` WHERE $fieldName='$fieldNameTemp'";
			if($table->ifValueExist($query)){//meghdar dar db vojud dashte bashad
				$tempRow=$table->ifValueExist($query);
				$updateField2[0][1]=$tempRow[$fieldId];
				$updateField2[0][0]=$fieldId;
				$tableName='goods';
				$condition='`goods`.`goodId` ='.$_POST['goodId2'];
				$table->updateTable($updateField2,$tableName,$condition);
			}else{
				$columns2[0]=$fieldName;
				$values2[0]=$fieldNameTemp;
				$tableName=$field;
				$idColumnName=$fieldId;
				$maxFieldId=$table->insertIntoTable($columns2,$values2,$tableName,$idColumnName);
				$updateField[0][0]=$fieldId;
				$updateField[0][1]=$maxFieldId;
				$tableName='goods';
				$condition='`goods`.`goodId` ='.$_POST['goodId2'];
				$table->updateTable($updateField,$tableName,$condition);	
				
				
			}
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
				$condition='goodId'.'='.$_POST['goodId2'];
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
				$condition='`goods`.`goodId` ='.$_POST['goodId2'];
				$table->updateTable($updateField,$tableName,$condition);
		}
		}
	} echo '<p align="center" class="addMsg">'.$editGood_successfully_editeed_message.'</p>';
	echo '<script language="javascript" type="text/javascript"> redirectPage("showGood.php"); </script>
	';
	exit;
}




















 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	 	
?>
<br /><br />
<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
<input type="hidden" name="goodId2" value="<?php echo $_POST['goodId'] ?>" />
<table border="0" cellspacing="3" cellpadding="0" align="center" dir="<?php echo $language_direction; ?>"  class="editTable">
  <tr class="editTableHeader">
    <th colspan="2" align="center"><?php echo $editGood_table_title; ?></th>
  </tr>
<?php
$table->showEditTable($fieldName1,$fieldValue1);
$i=1;
$connector=new connection();
$query="SELECT * FROM goodfields ORDER BY `goodfields`.`goodFieldId` ASC";
$result=$connector->queryRun($query);
while($row=mysql_fetch_array($result)){
	$field='field'.$i;
	$fieldId='fieldId'.$i;
	$fieldName='fieldName'.$i;
	$goodFieldId=$row0[$fieldId];
	$query1="SELECT * FROM `$field` WHERE `$fieldId`='$goodFieldId'";
	$result1=$connector->queryRun($query1);
	$row1=mysql_fetch_array($result1);
	$goodFieldName2=$row1[$fieldName];
	$goodFieldId2=$row1[$fieldId];
	echo '
	   <tr class="editTableTd">
		<td>'.$row['goodFieldName'].'</td>
		 <td>
		 <div class="ausu-suggest">
		  <input type="text" size="30" value="'.$goodFieldName2.'" name="'.$field.'" id="'.$field.'" autocomplete="off" />
		  <br />
		  <input type="text" style="display:none" size="30" value="'.$goodFieldId2.'" name="'.$fieldId.'" id="'.$fieldId.'" autocomplete="off" />
	   </div>
		 </td>
	   </tr> 
   ';
   $i++;
	}
$table->showEditTable($fieldName2,$fieldValue2);
?>
  <tr>
    <td colspan="3" align="center"><input type="submit" class="editTableBut" value="<?php echo $editGood_submit_value ?>" /></td>
  </tr>
  
</table>
</form>
</div>
</body>
</html>
