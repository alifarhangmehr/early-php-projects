<?php
session_start();
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->createPageHeader('showCashList','}');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
$connector=new connection();
if(!$connector->dbConnect()) echo 'Error No. 7';
$query1="SELECT * FROM cash 
LEFT JOIN cashlist ON cash.cashListId = cashlist.cashListId 
LEFT JOIN employes ON cash.reciverEmployeId = employes.employeId";


if(isset($_GET['search'])){ 
$_SESSION['search']=$_GET['search'];
$search=$_SESSION['search'];
$query1="SELECT * FROM cash 
LEFT JOIN cashlist ON cash.cashListId = cashlist.cashListId 
LEFT JOIN employes ON cash.reciverEmployeId = employes.employeId
WHERE name LIKE '%$search%' OR family LIKE '%$search%' OR cashPrice LIKE '%$search%'";
}
$table=new table();
$limit=30;
$pageInfo=$table->paging($query1,'showCash',$limit);
$pageInfo['pageName']='showCash';
$pageInfo['preName']='Cash';
$pageInfo['tableName']='cash';
$pageInfo['fieldId']='cashId';
$pageName='showCash';
$query1=$pageInfo['query'];
$result1=$connector->queryRun($query1);
if(!$result1) echo 'Error No. 8';

$table->searchTable($search,$query1,$showCash_cash_count,$showCash_search_input_placeholder,$pageInfo);

echo '<table border="0" cellpadding="2" cellspacing="1" width="100%" dir="'.$language_direction.'" style="text-align:center" class="showTable">
<tr class="showTableHeader"> 
	<th class="tdwidth">'.$showCash_count.'</th>
    <th class="tdwidth">'.$showCash_cash_name.'</th>
    <th class="tdwidth">'.$showCash_reciver_name.'</th>
    <th class="tdwidth">'.$showCash_cashier_name.'</th>
    <th class="tdwidth">'.$showCash_date_from.'</th>
    <th class="tdwidth">'.$showCash_date_to.'</th>
    <th class="tdwidth">'.$showCash_price.'</th>
    <th class="tdwidth">'.$showCash_comments.'</th>
    <th class="tdwidth">'.$showCash_print.'</th>
</tr>';
$i=1;
while($row1=mysql_fetch_array($result1)){ 

$employeId=$row1['cashierEmployeId'];
$query2="SELECT name, family FROM employes WHERE employeId='$employeId'";
$result2=$connector->queryRun($query2);
if(!$result2) echo 'Error No.8';
$row2=mysql_fetch_array($result2);
	echo '
	<tr class="showTableTr">
		<td>'.$i.'</td>
		<td>'.$row1['cashName'].'</td>
		<td>'.$row1['name'].' '.$row1['family'].'</td>
		<td>'.$row2['name'].' '.$row2['family'].'</td>
		<td>'.$row1['dateFrom'].'</td>
		<td>'.$row1['dateTo'].'</td>
		<td>'.$row1['cashPrice'].'</td>
		<td width="100px">'.$row1['cash_comments'].'</td>
		<td aling="center"><a href="printCash.php?cashId='.$row1['cashId'].'"><img src="../themes/'.$_SESSION['theme'].'/images/print.png" alt="" height="30px" width="30px" /></a></td>
	</tr>
	';
	$i++;
	}
	echo '</table>';

?>