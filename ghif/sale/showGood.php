<?php
session_start();
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->createPageHeader('showGood','}');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
$table=new table();
$fieldName1[0][0]='goodName';
$fieldName1[1][0]='sellPrice';
$fieldName1[2][0]='barcode';
$fieldName1[0][1]=$showGood_good_name;
$fieldName1[1][1]=$showGood_good_price;
$fieldName1[2][1]=$showGood_good_barcode;
$connector=new connection();
if(!$connector->dbConnect()) echo 'Error No. 7';
$query='select goodFieldName from goodFields ORDER BY goodFieldId ASC limit 0,3';
$result=$connector->queryRun($query);
if(!$result) echo 'Error No. 8';
$i=0;
while($row=mysql_fetch_array($result)){
	$fieldName2[$i][0]='fieldName'.($i+1);
	$fieldName2[$i][1]=$row['goodFieldName'];
	$i++;
}
$fieldName3[0][1]=$showGood_print_barcode;
$fieldName3[1][1]=$showGood_warehouse;
if(isset($_GET['search']))$_SESSION['search']=$_GET['search'];
$search=$_SESSION['search'];
if($_SESSION['search']=='')
	$query='SELECT * FROM goods
	LEFT JOIN field1 ON goods.fieldId1 = field1.fieldId1
	LEFT JOIN field2 ON goods.fieldId2 = field2.fieldId2
	LEFT JOIN field3 ON goods.fieldId3 = field3.fieldId3';
else
	$query="SELECT * FROM goods
	LEFT JOIN field1 ON goods.fieldId1 = field1.fieldId1
	LEFT JOIN field2 ON goods.fieldId2 = field2.fieldId2
	LEFT JOIN field3 ON goods.fieldId3 = field3.fieldId3
	WHERE goodName LIKE '%$search%' OR barcode LIKE '%$search%'";

$limit=30;
$pageInfo=$table->paging($query,'showGood',$limit);
$pageInfo['pageName']='showGood';
$pageInfo['preName']='Good';
$pageInfo['tableName']='goods';
$pageInfo['fieldId']='goodId';
$tableConfig['edit']=true;
$tableConfig['delete']=true;
$table->searchTable($search,$query,$showFactor_factor_count,$showFactor_search_input_placeholder,$pageInfo);
$table->showTable($fieldName1,$fieldName2,$fieldName3,$pageInfo,$tableConfig);
?>