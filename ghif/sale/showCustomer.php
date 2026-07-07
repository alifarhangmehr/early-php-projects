<?php
session_start();
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->createPageHeader('showCustomer','}');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
$table=new table();
$fieldName1[0][0]='eName';
$fieldName1[1][0]='mobile1';
$fieldName1[2][0]='tel1';
$fieldName1[3][0]='email';
$fieldName1[4][0]='membershipDate';
$fieldName1[5][0]='membershipDuration';
$fieldName1[6][0]='birthday';
$fieldName1[7][0]='address';
$fieldName1[8][0]='comments';
$fieldName1[0][1]=$showCustomer_customer_name;
$fieldName1[1][1]=$showCustomer_customer_mobile;
$fieldName1[2][1]=$showCustomer_customer_tel;
$fieldName1[3][1]=$showCustomer_customer_email;
$fieldName1[4][1]=$showCustomer_customer_membershipDate;
$fieldName1[5][1]=$showCustomer_customer_membershipDuration;
$fieldName1[6][1]=$showCustomer_customer_birthday;
$fieldName1[7][1]=$showCustomer_customer_address;
$fieldName1[8][1]=$showCustomer_customer_comments;

$fieldName3[0][0]='photoSource';
$fieldName3[0][1]=$showCustomer_customer_photo;

if(isset($_GET['search']))$_SESSION['search']=$_GET['search'];
$search=$_SESSION['search'];
if($_SESSION['search']=='')
	$query="SELECT *, CONCAT(C.name,' ',C.family) AS eName FROM customers C";
else
	$query="SELECT *, CONCAT(C.name,' ',C.family) AS eName FROM customers C
	WHERE name LIKE '%$search%' OR family LIKE '%$search%'";
$pageName='showCustomer';
$limit=30;
$pageInfo=$table->paging($query,'showCustomer',$limit);
$pageInfo['pageName']='showCustomer';
$pageInfo['preName']='Customer';
$pageInfo['tableName']='customers';
$pageInfo['fieldId']='customerId';
$tableConfig['edit']=true;
$tableConfig['delete']=true;
$table->searchTable($search,$query,$showFactor_factor_count,$showFactor_search_input_placeholder,$pageInfo);
$table->showTable($fieldName1,$fieldName2,$fieldName3,$pageInfo,$tableConfig);


?>