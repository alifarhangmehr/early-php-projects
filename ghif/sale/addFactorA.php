<?php
session_start();
include('../class/pageHeader.php');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('class/connection.php');
$pageHeader->includeFile('class/setting.php');
$pageHeader->includeFile('class/table.php');

$table=new table();

if(isset($_GET['barcode'])){
$barcode=$_GET['barcode'];
$connector=new connection();
if(!$connector->dbConnect()) echo 'error 1';
$query="SELECT goodId FROM `goods` WHERE `barcode`='$barcode'";
$result=$connector->queryRun($query);
$row=mysql_fetch_array($result);
if(mysql_num_rows($result)>1) {echo 'Error No. 3432423'; exit;}
else $goodId=$row['goodId'];

if($_GET['factorId']!='')
		$values[6]=$factorId=$_GET['factorId'];
	else
		$values[6]=$factorId=$table->maxTableId('purchase','factorId');
if($_GET['count']!='') $count=$_GET['count']; else $count=1;

$connector=new connection();
if(!$connector->dbConnect()) echo 'error 1';
$query="SELECT * FROM `goods` WHERE `goodId`='$goodId'";
$result=$connector->queryRun($query);
$row=mysql_fetch_array($result);

if($_GET['discount']!='') $discountCon=$_GET['discount'];
else $discountCon=$_GET['discount'];

$query0="SELECT * FROM `purchase` WHERE `factorId` = '$factorId' AND `goodId` = '$goodId'";
$result0=$connector->queryRun($query0);
$row0=mysql_fetch_array($result0);
if(mysql_num_rows($result0)>0){
	 $newCount=$count+$row0['count'];
	 $newPurchaseId=$row0['purchaseId'];
	 $discountPersent=$row0['discount'];
	 $price=$row0['price'];
	 $disc=$discountPersent*$price/100;
	 $payable=($price-$disc)*$newCount;

	 
	 $updateField[0][0]='count';
  	 $updateField[0][1]=$newCount;
	 $tableName='purchase';
	 $condition='`purchase`.`purchaseId` ='.$newPurchaseId;
	 $table->updateTable($updateField,$tableName,$condition);
	 
}else{ 
	if($_GET['price']==''){
		$price=$row['sellPrice']-($discount/100*$row['sellPrice']); $discountPersent=$discountCon;
	}else{
	$price=$_GET['price'];
	//
	$price=$_GET['price']-($discount/100*$_GET['price']); $discountPersent=$discountCon;
	}

	
	$query="SELECT *
	FROM `purchase`
	WHERE `factorId` = '$factorId' AND `goodId` = '$goodId'";
	$result=$connector->queryRun($query);
	$row=mysql_fetch_array($result);
	$payable=($price-($discountPersent*$price/100))*$count;
	
	
	$columns[0]='goodId';
	$columns[1]='storeId';
	$columns[2]='count';
	$columns[3]='price';
	$columns[4]='payable';
	$columns[5]='discount';
	$columns[6]='factorId';

	
	
	$values[0]=$goodId;
	$values[1]=$_GET['storeId'];
	$values[2]=$count;
	$values[3]=$price;
	$values[4]=$payable;
	$values[5]=$discountPersent;
	
	
	$tableName='purchase';
	$idColumnName='purchaseId';
	$table->insertIntoTable($columns,$values,$tableName,$idColumnName);
	//$storeId=$_GET['storeId'];
}	
	

	


}
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
		

$query="SELECT * FROM purchase
	LEFT JOIN goods ON purchase.goodId = goods.goodId
	LEFT JOIN stores ON stores.storeId = purchase.storeId
	WHERE factorId='$factorId'";

$pageInfo['pageName']='addFactor';
$pageInfo['preName']='Purchase';
$pageInfo['tableName']='purchase';
$pageInfo['fieldId']='purchaseId';
$pageInfo['query']=$query;
$tableConfig['edit']=false;
$tableConfig['delete']=false;


$fieldName3[0][1]=$addFactorA_delete_purchase;

$table->showTable($fieldName1,$fieldName2,$fieldName3,$pageInfo,$tableConfig);
if(isset($_GET['factorId'])) echo '<input type="hidden" name="factorId" id="factorId" value="'.$factorId.'" />';

?>
<p align="center"><input type="button" value="<?php echo $addFactorA_print_factor ?>" class="printFactorBut" onclick="submitFactorForm()" class="printFactorBut" /></p>