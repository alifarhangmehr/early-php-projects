<?php
session_start();
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->createPageHeader('showAccount','}');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
$table=new table();

$fieldName1[0][0]='price';
$fieldName1[1][0]='payment';
$fieldName1[2][0]='date';
$fieldName1[3][0]='comments';
$fieldName1[0][1]=$showAccount_price;
$fieldName1[1][1]=$showAccount_payment;
$fieldName1[2][1]=$showAccount_date;
$fieldName1[3][1]=$showAccount_comments;

$fieldName2[0][0]='oa';
$fieldName2[1][0]='employe';
$fieldName2[2][0]='factorNo';

$fieldName2[0][1]=$showAccount_oa;
$fieldName2[1][1]=$showAccount_employe;
$fieldName2[2][1]=$showAccount_factor_number;



$query="SELECT A.price, A.payment, A.date, A.comments, CONCAT(O.name,' ', O.family)  AS oa, CONCAT(E.name,' ', E.family)  AS employe, accountId, F.factorNo FROM accounts A
	LEFT JOIN factor F ON F.factorId = A.factorId
	LEFT JOIN oa O ON O.oaId = A.oaId
	LEFT JOIN employes E ON E.employeId = A.employeId";
	


	

$fieldName3[0][1]=$showAccount_check;
/*	
if(isset($_GET['search']))$_SESSION['search']=$_GET['search'];
$search=$_SESSION['search'];
if($_SESSION['search']=='')
	$query='SELECT * FROM customers';
else
	$query="SELECT * FROM customers
	WHERE name LIKE '%$search%' OR family LIKE '%$search%'";
	*/

$pageName='showAccount';
$limit=30;
$fieldId='accountId';
$pageInfo=$table->paging($query,'showAccount',$limit);
$pageInfo['pageName']='showAccount';
$pageInfo['preName']='Account';
$pageInfo['tableName']='accounts';
$pageInfo['fieldId']='accountId';
$pageInfo['addItem']=true;
$tableConfig['edit']=true;
$tableConfig['delete']=true;
$table->searchTable($search,$query,$showFactor_factor_count,$showFactor_search_input_placeholder,$pageInfo);
$table->showTable($fieldName1,$fieldName2,$fieldName3,$pageInfo,$tableConfig);


?>