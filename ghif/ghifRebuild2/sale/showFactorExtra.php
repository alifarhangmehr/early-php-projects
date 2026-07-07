<?php
session_start();
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->createPageHeader('showFactorExtra','r');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
$table=new table();
$fieldName1[0][0]='factorExtraName';
$fieldName1[1][0]='price';
$fieldName1[0][1]=$showFactorExtra_name;
$fieldName1[1][1]=$showFactorExtra_price;

$fieldName3[0][0]='priceType';
$fieldName3[1][0]='default';
$fieldName3[0][1]=$showFactorExtra_price_type;
$fieldName3[1][1]=$showFactorExtra_default;


if(isset($_GET['search']))$_SESSION['search']=$_GET['search'];
$search=$_SESSION['search'];
if($_SESSION['search']=='')
	$query='SELECT * FROM factorextra ORDER BY factorExtraId DESC';
else
	$query="SELECT * FROM factorextra
	WHERE factorExtraName LIKE '%$search%' OR priceType LIKE '%$search%' OR price LIKE '%$search%' ORDER BY factorExtraId DESC";
$limit=30;
$pageInfo=$table->paging($query,'showFactorExtra',$limit);
$pageInfo['pageName']='showFactorExtra';
$pageInfo['preName']='FactorExtra';
$pageInfo['tableName']='factorExtra';
$pageInfo['fieldId']='factorExtraId';
$pageInfo['addItem']=true;
$tableConfig['edit']=true;
$tableConfig['delete']=true;
$table->searchTable($search,$query,$showFactor_factor_count,$showFactor_search_input_placeholder,$pageInfo);
$table->showTable($fieldName1,$fieldName2,$fieldName3,$pageInfo,$tableConfig);

?>