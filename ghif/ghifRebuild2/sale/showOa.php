<?php
session_start();
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->createPageHeader('showOa','M');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
$table=new table();
$fieldName1[0][0]='oName';
$fieldName1[1][0]='company';
$fieldName1[2][0]='address';
$fieldName1[3][0]='tel';
$fieldName1[4][0]='mobile';
$fieldName1[5][0]='comments';
$fieldName1[0][1]=$showOa_name;
$fieldName1[1][1]=$showOa_company;
$fieldName1[2][1]=$showOa_address;
$fieldName1[3][1]=$showOa_tel;
$fieldName1[4][1]=$showOa_mobile;
$fieldName1[5][1]=$showOa_comments;

$fieldName3[0][0]='type';
$fieldName3[1][0]='accountTurnOver';

$fieldName3[0][1]=$showOa_type;
$fieldName3[1][1]=$showOa_accountTurnover;

if(isset($_GET['search']))$_SESSION['search']=$_GET['search'];
$search=$_SESSION['search'];
if($_SESSION['search']=='')
	$query="SELECT *,CONCAT(oa.name,' ',oa.family) AS oName FROM oa ORDER BY oaId DESC";
else
	$query="SELECT * FROM oa
	WHERE name LIKE '%$search%' OR family LIKE '%$search%' OR company LIKE '%$search%' OR address LIKE '%$search%' OR tel LIKE '%$search%' OR mobile LIKE '%$search%' ORDER BY oaId DESC";

$limit=30;
$pageInfo=$table->paging($query,'showOa',$limit);
$pageInfo['pageName']='showOa';
$pageInfo['preName']='Oa';
$pageInfo['tableName']='oa';
$pageInfo['fieldId']='oaId';
$pageInfo['addItem']=true;
$tableConfig['edit']=true;
$tableConfig['delete']=true;
$table->searchTable($search,$query,$showOa_oa_count,$showOa_search_input_placeholder,$pageInfo);
$table->showTable($fieldName1,$fieldName2,$fieldName3,$pageInfo,$tableConfig);

?>