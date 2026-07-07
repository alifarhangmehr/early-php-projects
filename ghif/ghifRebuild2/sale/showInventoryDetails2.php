<?php
session_start();
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->createPageHeader('showInventoryDetails2','T');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
$table=new table();
$storeId=$_POST['storeId'];
$goodId=$_POST['goodId'];
$fieldName1[0][0]='employeName';
$fieldName1[1][0]='stock';
$fieldName1[2][0]='factorNo';
$fieldName1[3][0]='date';
$fieldName1[4][0]='sellPrice';
$fieldName1[5][0]='purchasePrice';
$fieldName1[6][0]='comments';
$fieldName1[0][1]=$showInventoryDetails2_employe_name;
$fieldName1[1][1]=$showInventoryDetails2_stock;
$fieldName1[2][1]=$showInventoryDetails2_factor_number;
$fieldName1[3][1]=$showInventoryDetails2_inventory_date;
$fieldName1[4][1]=$showInventoryDetails2_sell_price;
$fieldName1[5][1]=$showInventoryDetails2_purchase_price;
$fieldName1[6][1]=$showInventoryDetails2_comments;

if(isset($_GET['search']))$_SESSION['search']=$_GET['search'];
$search=$_SESSION['search'];
if($_SESSION['search']=='')
	$query="SELECT CONCAT(E.name,' ',E.family) AS employeName, I.inventoryId, I.stock, I.date, I.sellPrice, I.purchasePrice, I.comments, F.factorNo FROM inventory I 
	LEFT JOIN employes E ON I.employeId = E.employeId 
	LEFT JOIN factor F ON I.factorId = F.factorId 
	WHERE I.goodId='$goodId' AND I.storeId='$storeId' ORDER BY I.date DESC";
else
	$query="SELECT CONCAT(E.name,' ',E.family) AS employeName, I.inventoryId, I.stock, I.date, I.sellPrice, I.purchasePrice, I.comments, F.factorNo FROM inventory I 
	LEFT JOIN employes E ON I.employeId = E.employeId 
	LEFT JOIN factor F ON I.factorId = F.factorId
	WHERE name LIKE '%$search%' OR family LIKE '%$search%' ORDER BY I.date DESC";
if($_POST['goodId']!=''){
	$goodId=$_POST['goodId'];
$query="SELECT CONCAT(E.name,' ',E.family) AS employeName, I.inventoryId, I.stock, I.date, I.sellPrice, I.purchasePrice, I.comments, F.factorNo FROM inventory I 
	LEFT JOIN employes E ON I.employeId = E.employeId 
	LEFT JOIN factor F ON I.factorId = F.factorId WHERE I.goodId='$goodId' AND I.storeId='$storeId' ORDER BY I.date DESC";	
}
$pageName='showInventoryDetails2';
$limit=30;
$pageInfo=$table->paging($query,'showInventoryDetails2',$limit);
$pageInfo['pageName']='showInventoryDetails2';
$pageInfo['preName']='InventoryDetails2';
$pageInfo['tableName']='inventory';
$pageInfo['fieldId']='inventoryId';
$tableConfig['edit']=false;
$tableConfig['delete']=false;
$table->searchTable($search,$query,$showInventoryDetails2_count,$showInventoryDetails2_search_input_placeholder,$pageInfo);
$table->showTable($fieldName1,$fieldName2,$fieldName3,$pageInfo,$tableConfig);


?>