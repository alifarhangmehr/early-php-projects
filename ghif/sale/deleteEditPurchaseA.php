<?php
session_start();
include('../class/pageHeader.php');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('class/connection.php');
$pageHeader->includeFile('class/setting.php');
$pageHeader->includeFile('class/table.php');
$pageHeader->includeFile('class/pdate.php');
$factorId=$_GET['factorId'];
$purchaseId=$id=$_GET['purchaseId'];
date_default_timezone_set('Asia/Tehran');
$date=pdate(YmdHis);
$table=new table();
$connector=new connection();
if(!$connector->dbConnect()) echo 'error 1';
$query="SELECT SUM(stock),goodId,storeId,sellPrice FROM `inventory` WHERE `factorId`='$factorId' AND goodId=(SELECT goodId FROM purchase WHERE purchaseId='$purchaseId')";
$result=$connector->queryRun($query);
$row=mysql_fetch_array($result);
	
	$columns[0]='goodId';
	$columns[1]='employeId';
	$columns[2]='factorId';
	$columns[3]='storeId';
	$columns[4]='stock';
	$columns[5]='purchasePrice';
	$columns[6]='date';
	$columns[7]='comments';
	
	$values[0]=$row['goodId'];
	$values[1]=$_SESSION['adminId'];
	$values[2]=$factorId;
	$values[3]=$row['storeId'];
	$values[4]=(-$row['SUM(stock)']);
	$values[5]=$row['sellPrice'];
	$values[6]=$date;
	$values[7]=$deleteEditFactorA_remove_inventory_comment;
	$tableName='inventory';
	$idColumnName='inventoryId';
	$table->insertIntoTable($columns,$values,$tableName,$idColumnName);


$tableName='purchase';
$fieldId='purchaseId';

$connector=new connection();
if(!$connector->dbConnect()) echo 'Error No. 7';
$query="DELETE FROM $tableName WHERE $fieldId='$id'";
$result=$connector->queryRun($query);
if(!$result) echo 'Error No. 8';

$fieldName1[0][0]='goodName';
$fieldName1[1][0]='storeName';
$fieldName1[2][0]='count';
$fieldName1[3][0]='price';
$fieldName1[4][0]='discount';
$fieldName1[5][0]='payable';


$fieldName1[0][1]=$addFactor_good_name;
$fieldName1[1][1]=$addFactor_good_storage;
$fieldName1[2][1]=$addFactor_good_count;
$fieldName1[3][1]=$addFactor_good_price;
$fieldName1[4][1]=$addFactor_good_discount;
$fieldName1[5][1]=$addFactor_good_payable;
	
	
		
if(!$connector->dbConnect()) echo 'Error No. 7';

$query="SELECT * FROM purchase
	LEFT JOIN goods ON purchase.goodId = goods.goodId
	LEFT JOIN stores ON stores.storeId = purchase.storeId
	WHERE factorId='$factorId'";
$result=$connector->queryRun($query);
if(!$result) echo 'Error No. 8';

$pageInfo['pageName']='editFactor';
$pageInfo['preName']='Purchase';
$pageInfo['tableName']='purchase';
$pageInfo['fieldId']='purchaseId';
$pageInfo['query']=$query;
$tableConfig['edit']=false;
$tableConfig['delete']=false;


$fieldName3[0][1]=$addFactorA_delete_purchase;

$table->showTable($fieldName1,$fieldName2,$fieldName3,$pageInfo,$tableConfig);
echo '<input type="hidden" name="factorId" id="factorId" value="'.$factorId.'" />';

?>
<p align="center"><input type="button" value="<?php echo $addFactorA_print_factor ?>" class="printFactorBut" onclick="submitFactorForm()" /></p>