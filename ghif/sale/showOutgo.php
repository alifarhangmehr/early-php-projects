<?php
session_start();
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->createPageHeader('showOutgo','}');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
$table=new table();
$fieldName1[0][0]='date';
$fieldName1[1][0]='cashName';
$fieldName1[2][0]='eName';
$fieldName1[3][0]='price';
$fieldName1[4][0]='comments';
$fieldName1[0][1]=$showOutgo_date;
$fieldName1[1][1]=$showOutgo_cashList;
$fieldName1[2][1]=$showOutgo_employe_name;
$fieldName1[3][1]=$showOutgo_price;
$fieldName1[4][1]=$showOutgo_comments;

$fieldName3[0][0]='type';
$fieldName3[0][1]=$showOutgo_type;

if(isset($_GET['search']))$_SESSION['search']=$_GET['search'];
$search=$_SESSION['search'];
if($_SESSION['search']=='')
	$query="SELECT O.outgoId, O.date, C.cashName, CONCAT(E.name,' ',E.family) AS eName, O.price, O.comments, O.type FROM outgo O
	LEFT JOIN employes E ON O.employeId = E.employeId
	LEFT JOIN cashlist C ON O.cashListId = C.cashListId";
else
	$query="SELECT O.outgoId, O.date, C.cashName, CONCAT(E.name,' ',E.family) AS eName, O.price, O.comments, O.type FROM outgo O
	LEFT JOIN employes E ON O.employeId = E.employeId
	LEFT JOIN cashlist C ON O.cashListId = C.cashListId
	WHERE date LIKE '%$search%' OR price LIKE '%$search%'";
$limit=30;
$pageInfo=$table->paging($query,'showOutgo',$limit);
$pageInfo['pageName']='showOutgo';
$pageInfo['preName']='Outgo';
$pageInfo['tableName']='outgo';
$pageInfo['fieldId']='outgoId';
$tableConfig['edit']=true;
$tableConfig['delete']=true;
$table->searchTable($search,$query,$showFactor_factor_count,$showOutgo_search_input_placeholder,$pageInfo);
$table->showTable($fieldName1,$fieldName2,$fieldName3,$pageInfo,$tableConfig);
?>