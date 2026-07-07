<?php
session_start();
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->createPageHeader('showFactor','}');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
$table=new table();
$fieldName1[0][0]='cashName';
$fieldName1[1][0]='date';
$fieldName1[2][0]='factorNo';
$fieldName1[3][0]='factorType';
$fieldName1[4][0]='discount';
$fieldName1[5][0]='cash';
$fieldName1[6][0]='card';
$fieldName1[7][0]='card+cash';
$fieldName1[0][1]=$showFactor_factor_cashList;
$fieldName1[1][1]=$showFactor_factor_date;
$fieldName1[2][1]=$showFactor_factor_number;
$fieldName1[3][1]=$showFactor_factor_type;
$fieldName1[4][1]=$showFactor_factor_discount;
$fieldName1[5][1]=$showFactor_factor_cash;
$fieldName1[6][1]=$showFactor_factor_card;
$fieldName1[7][1]=$showFactor_factor_totall_price;

$connector=new connection();
if(!$connector->dbConnect()) echo 'Error No. 7';


if(isset($_GET['search']))$_SESSION['search']=$_GET['search'];
$search=$_SESSION['search'];
if($_SESSION['search']=='')
	$query='SELECT * , card+cash FROM factor 
	LEFT JOIN cashlist ON factor.cashListId = cashlist.cashListId 
	ORDER BY `factorId` DESC';
else
	$query="SELECT * , card+cash FROM factor
	LEFT JOIN cashlist ON factor.cashListId = cashlist.cashListId 
	WHERE factorNo LIKE '%$search%' OR barcode LIKE '%$search%' OR cash LIKE '%$search%' OR card LIKE '%$search%' OR card+cash LIKE '%$search%' ORDER BY `factorId` DESC";
$limit=30;
$pageInfo=$table->paging($query,'showFactor',$limit);
$pageInfo['pageName']='showFactor';
$pageInfo['preName']='Factor';
$pageInfo['tableName']='factor';
$pageInfo['fieldId']='factorId';
$tableConfig['edit']=false;
$tableConfig['delete']=false;
$table->searchTable($search,$query,$showFactor_factor_count,$showFactor_search_input_placeholder,$pageInfo);
$table->showTable($fieldName1,$fieldName2,$fieldName3,$pageInfo,$tableConfig);
?>
<div id="outerCancelDiv"><div id="cancelDiv" align="center"><br /><br /><?php echo $table_show_delete_div_are_you_sure; ?><br /><br /><form method="post" action="cancelFactor.php"><input type="submit" value=<?php echo $table_show_delete_div_yes; ?> class="cancelFactorDivBut" /><input type="hidden" id="hiddenCancelId" name="hiddenCancelId" />&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value=<?php echo $table_show_delete_div_no; ?> onclick="hideCancelFactorDiv()" class="cancelFactorDivBut" /></form><br /><br /></div></div>

<div id="outerUnCancelDiv"><div id="unCancelDiv" align="center"><br /><br /><?php echo $table_show_delete_div_are_you_sure; ?><br /><br /><form method="post" action="unCancelFactor.php"><input type="submit" value=<?php echo $table_show_delete_div_yes; ?> class="unCancelFactorDivBut" /><input type="hidden" id="hiddenUnCancelId" name="hiddenUnCancelId" />&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value=<?php echo $table_show_delete_div_no; ?> onclick="hideUnCancelFactorDiv()" class="unCancelFactorDivBut" /></form><br /><br /></div></div>


