<?php
session_start();
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->createPageHeader('showStore','u');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
$table=new table();

if(isset($_GET['default'])){
	$default=$_GET['default'];
	$connector=new connection();
	if(!$connector->dbConnect()) echo 'Error No. 7';
	$query0="UPDATE `stores` SET `defaultStore` = '' WHERE `stores`.`defaultStore` ='yes'";
	$result0=$connector->queryRun($query0);
	if(!$result0) echo 'Error No.8';
	$connector=new connection();
	if(!$connector->dbConnect()) echo 'Error No. 7';
	$query0="UPDATE `stores` SET `defaultStore` = 'yes' WHERE `stores`.`storeId` ='$default'";
	$result0=$connector->queryRun($query0);
	if(!$result0) echo 'Error No.8';
}



$fieldName1[0][0]='storeName';
$fieldName1[0][1]=$showStore_name;

$fieldName3[0][0]='defaultStore';
$fieldName3[0][1]=$showStore_default;

if(isset($_GET['search']))$_SESSION['search']=$_GET['search'];
$search=$_SESSION['search'];
if($_SESSION['search']=='')
	$query='SELECT * FROM stores ORDER BY storeId DESC';
else
	$query="SELECT * FROM stores
	WHERE storeName LIKE '%$search%' ORDER BY storeId DESC";

$limit=30;
$pageInfo=$table->paging($query,'showStore',$limit);
$pageInfo['pageName']='showStore';
$pageInfo['preName']='Store';
$pageInfo['tableName']='store';
$pageInfo['fieldId']='storeId';
$pageInfo['addItem']=true;
$tableConfig['edit']=true;
$tableConfig['delete']=false;
$table->searchTable($search,$query,$showStore_count,$showStore_search_input_placeholder,$pageInfo);
$table->showTable($fieldName1,$fieldName2,$fieldName3,$pageInfo,$tableConfig);

?>