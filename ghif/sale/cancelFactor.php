<?php
session_start();
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->createPageHeader('cancelFactor','}');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
$table=new table();
$factorId=$_POST['hiddenCancelId'];

$connector=new connection();
$query="SELECT * FROM purchase WHERE factorId='$factorId'";
$result1=$connector->queryRun($query);
while($row=mysql_fetch_array($result1)){

	$columns[0]='goodId';
	$columns[1]='storeId';
	$columns[2]='employeId';
	$columns[3]='factorId';
	$columns[4]='date';
	$columns[5]='stock';
	$columns[6]='purchasePrice';
	$columns[7]='comments';
	
	date_default_timezone_set('Asia/Tehran');
	$date=pdate(YmdHis);

	$values[0]=$row['goodId'];
	$values[1]=$row['storeId'];
	$values[2]=$_SESSION['adminId'];
	$values[3]=$factorId;
	$values[4]=$date;
	$values[5]=$row['count'];
	$values[6]=$row['payable'];
	$values[7]=$cancelFactor_auto_add_comment;

	$tableName='inventory';
	$idColumnName='inventoryId';
	$table->insertIntoTable($columns,$values,$tableName,$idColumnName);
		
}



$updateField[0][0]='canceled';
$updateField[0][1]='1';
$tableName='factor';
$condition='factorId='.$factorId;
$result2=$table->updateTable($updateField,$tableName,$condition);






if($result1 && $result2){
	echo '<script language="javascript" type="text/javascript">
			window.location="'.$_SERVER['HTTP_REFERER'].'";
		  </script>
	';
}else{
	echo '<p align="center">'.$cancelFactor_error_message.'</p>';
	echo '<p align="center"><a href="'.$_SERVER['HTTP_REFERER'].'">'.$cancelFactor_back_link_message.'</a></p>';
}








