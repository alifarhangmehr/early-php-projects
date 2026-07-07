<?php
session_start();
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->createPageHeader('showCashList','x');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
$table=new table();
$fieldName1[0][0]='cashName';
$fieldName1[0][1]=$showCashList_name;

if(isset($_GET['search']))$_SESSION['search']=$_GET['search'];
$search=$_SESSION['search'];
if($_SESSION['search']=='')
	$query='SELECT * FROM cashlist ORDER BY cashListId DESC';
else
	$query="SELECT * FROM cashlist
	WHERE cashName LIKE '%$search%' ORDER BY cashListId DESC";
$limit=30;
$pageInfo=$table->paging($query,'showCashList',$limit);
$pageInfo['pageName']='showCashList';
$pageInfo['preName']='CashList';
$pageInfo['tableName']='cashlist';
$pageInfo['fieldId']='cashListId';
$pageInfo['addItem']=true;
$tableConfig['edit']=true;
$tableConfig['delete']=true;
$table->searchTable($search,$query,$showCashList_cashList_count,$showCashList_search_input_placeholder,$pageInfo);
$table->showTable($fieldName1,$fieldName2,$fieldName3,$pageInfo,$tableConfig);
?>