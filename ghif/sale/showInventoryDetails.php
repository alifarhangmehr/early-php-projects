<?php
session_start();
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->createPageHeader('showInventoryDetails','}');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
$table=new table();
$fieldName1[0][0]='storeName';
$fieldName1[1][0]='stock';
$fieldName1[2][0]='date';
$fieldName1[3][0]='comments';
$fieldName1[0][1]=$showInventoryDetails_storeName;
$fieldName1[1][1]=$showInventoryDetails_stock;
$fieldName1[2][1]=$showInventoryDetails_date;
$fieldName1[3][1]=$showInventoryDetails_comments;

echo '<table border="0" cellpadding="2" cellspacing="1" width="500px" dir="rtl" align="center" style="border:thin solid #F90" >
<tr class="showTableHeader" align="center" font-size:11px"> 
<th>'.$showInventoryDetails_storeName.'</th>
<th>'.$showInventoryDetails_stock.'</th>
<th>'.$showInventoryDetails_date.'</th>
<th>'.$showInventoryDetails_comments.'</th>
</tr>';

$stock=0;
if($_GET['goodId']!='') {
	$goodId=$_GET['goodId'];
	$query="SELECT storeId,SUM(stock),stock FROM inventory WHERE goodId='$goodId' GROUP BY storeId";
}	
	$connector=new connection();
	$result=$connector->queryRun($query);	 	 	 	
	while($row=mysql_fetch_array($result)){
	$counter++;
	$storeId=$row['storeId'];
	$connector2=new connection();
	$query2="SELECT * FROM stores WHERE storeId='$storeId'";
	$result2=$connector2->queryRun($query2);
	$row2=mysql_fetch_array($result2);
	$stock+=$row['SUM(stock)']; // total stock
	
	$connector3=new connection();
	if($_GET['goodId']!='') {
	$goodId=$_GET['goodId'];
	$query3="SELECT date FROM inventory WHERE goodId='$goodId' AND storeId='$storeId' ORDER BY `inventory`.`date`  DESC LIMIT 0,1";}
	$result3=$connector3->queryRun($query3);
	$row3=mysql_fetch_array($result3);
	
	
	
	echo '<tr class="showTableTr">' ;
	echo '<td align="center">'.$row2['storeName'].'</td>';
	echo '<td align="center">'.$row['SUM(stock)'].'</td>';
	
	
	
	
	$date=str_split($row3['date']);
	echo '<td align=center>'.$date=$date[0].$date[1].$date[2].$date[3].'/'.$date[4].$date[5].'/'.$date[6].$date[7].' <span style="color:#09F">'.$date[8].$date[9].':'.$date[10].$date[11].':'.$date[12].$date[13].'</span></td>';
	echo '<td align=center>
	<form action="showInventoryDetails2.php" method="post">
	<input type="hidden" name="goodId" value="'.$goodId.'" />
	<input type="hidden" name="storeId" value="'.$storeId.'" />
	<input type="image" src="../themes/'.$_SESSION['theme'].'/images/detailIcon.png" border="0" style="border:none" />
	</form>
	</td></tr>';}
echo '</table>
<table width="500px" border="0" align="center" cellpadding="0" cellspacing="0" style="border:thin solid #F90">
  <tr class="showTableHeader">
    <td colspan="2">'.$showInventoryDetails_sum.'</td>
  </tr>
  <tr class="showTableTr">
    <td>'.$showInventoryDetails_good.'</td>
	<td>';
	$connector=new connection();
	
	
		if($_GET['goodId']!='') {
		$goodId=$_GET['goodId'];
		$query="SELECT * FROM goods WHERE goodId='$goodId'";}
	$result=$connector->queryRun($query);	 	 	 	
	$row = mysql_fetch_array($result);
	echo $row['goodName'];
 echo   '</td>
    
  </tr>
  <tr class="showTableTr">
    <td>'.$showInventoryDetails_totalStock.'</td>
    <td>'.$stock.'</td>
  </tr>
  
</table>
<table align="center" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td align="right"><a href="changeInventory.php?goodId='.$goodId.'"><img src="../themes/'.$_SESSION['theme'].'/images/boxIcon2.png" width="48" height="48" style="border:hidden" />'.' '.$showInventoryDetails_change.'</a>
		</td>
	</tr>
	<tr>
		<td align="right"><a href="displacementStore.php?goodId='.$goodId.'"><img src="../themes/'.$_SESSION['theme'].'/images/boxIcon4.png" width="48" height="48" style="border:hidden" />'.' '.$showInventoryDetails_displacement.'</a>
		</td>
	</tr>
</table>';
?>