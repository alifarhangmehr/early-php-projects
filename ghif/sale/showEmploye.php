<?php
session_start();
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->createPageHeader('showEmploye','}');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
$table=new table();
$fieldName1[0][0]='user';
$fieldName1[1][0]='name';
$fieldName1[2][0]='family';
$fieldName1[3][0]='birthday';
$fieldName1[4][0]='grade';
$fieldName1[5][0]='tel';
$fieldName1[6][0]='mobile';
$fieldName1[7][0]='address';
$fieldName1[8][0]='salary';
$fieldName1[9][0]='comments';
$fieldName1[10][0]='sAcLevel';
$fieldName1[0][1]=$showEmploye_id;
$fieldName1[1][1]=$showEmploye_name;
$fieldName1[2][1]=$showEmploye_family;
$fieldName1[3][1]=$showEmploye_birthday;
$fieldName1[4][1]=$showEmploye_grade;
$fieldName1[5][1]=$showEmploye_tel;
$fieldName1[6][1]=$showEmploye_mobile;
$fieldName1[7][1]=$showEmploye_address;
$fieldName1[8][1]=$showEmploye_salary;
$fieldName1[9][1]=$showEmploye_comments;
$fieldName1[10][1]=$showEmploye_acLevel;


if(isset($_GET['search']))$_SESSION['search']=$_GET['search'];
$search=$_SESSION['search'];
if($_SESSION['search']=='')
	$query='SELECT * FROM employes';
else
	$query="SELECT * FROM employes
	WHERE name LIKE '%$search%' OR family LIKE '%$search%'";

$limit=30;
$pageInfo=$table->paging($query,'showEmploye',$limit);
$pageInfo['pageName']='showEmploye';
$pageInfo['preName']='Employe';
$pageInfo['tableName']='employe';
$pageInfo['fieldId']='employeId';
$tableConfig['edit']=false;
$tableConfig['delete']=false;
$table->searchTable($search,$query,$showEmploye_employe_count,$showEmploye_search_input_placeholder,$pageInfo);
$table->showTable($fieldName1,$fieldName2,$fieldName3,$pageInfo,$tableConfig);

?>