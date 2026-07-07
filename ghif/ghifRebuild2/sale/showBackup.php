<?php
session_start();
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->createPageHeader('showBackup','p');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
$table=new table();
$fieldName1[0][0]='eName';
$fieldName1[1][0]='date';
$fieldName1[2][0]='comments';
$fieldName1[0][1]=$showBackup_employe_name;
$fieldName1[1][1]=$showBackup_date;
$fieldName1[2][1]=$showBackup_comments;

$fieldName3[0][1]=$showBackup_download;


if(isset($_GET['search']))$_SESSION['search']=$_GET['search'];
$search=$_SESSION['search'];
if($_SESSION['search']=='')
	$query="SELECT B.backupId, CONCAT(E.name,' ',E.family) AS eName, B.date, B.comments FROM backup B
	LEFT JOIN employes E on B.employeId = E.employeId ORDER BY B.backupId DESC";
else
	$query="SELECT B.backupId, CONCAT(E.name,' ',E.family) AS eName, B.date, B.comments FROM backup B
	LEFT JOIN employes E on B.employeId = E.employeId
	WHERE B.date LIKE '%$search%' OR E.name LIKE '%$search%' OR E.family LIKE '%$search%' ORDER BY B.backupId DESC";
$pageName='showBackup';
$limit=30;
$pageInfo=$table->paging($query,'showBackup',$limit);
$pageInfo['pageName']='showBackup';
$pageInfo['preName']='Backup';
$pageInfo['tableName']='backup';
$pageInfo['fieldId']='backupId';
$pageInfo['addItem']=true;
$tableConfig['edit']=false;
$tableConfig['delete']=false;
$table->searchTable($search,$query,$showBackup_backup_count,$showBackup_search_input_placeholder,$pageInfo);
$table->showTable($fieldName1,$fieldName2,$fieldName3,$pageInfo,$tableConfig);
?>