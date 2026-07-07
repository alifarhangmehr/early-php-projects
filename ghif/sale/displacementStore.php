<?php
session_start();
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->createPageHeader('displacementStore','}');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
$pageHeader->includeFile('modules/tinymce/jscripts/tiny_mce/tiny_mce.js');
$pageHeader->includeFile('js/txtAreaEditor.js');
$pageHeader->suggestion('data');
date_default_timezone_set('asia/tehran');
$pdate=pdate(YmdHis);

$table=new table();
$connector=new connection();
if(!$connector->dbConnect()) echo 'Error No. 7';

if(isset($_POST['barcode'])){
$barcode=$_POST['barcode'];
$query0="SELECT goodId FROM goods WHERE barcode='$barcode'";
$result0=$connector->queryRun($query0);
if(!$result0) echo 'Error No. 8';
$row0=mysql_fetch_array($result0);
$goodId=$row0['goodId'];
$columns[0]='goodId';	
$columns[1]='employeId';
$columns[2]='storeId';
$columns[3]='stock';
$columns[4]='date';
$columns[5]='comments';
$values1[0]=$goodId;
$values1[1]=$_POST['employeId'];
$values1[2]=$_POST['storeFrom'];
$values1[3]=(-$_POST['stock']);
$values1[4]=$pdate;
$values1[5]=$_POST['comments'];
$values2[0]=$goodId;
$values2[1]=$_POST['employeId'];
$values2[2]=$_POST['storeTo'];
$values2[3]=$_POST['stock'];
$values2[4]=$pdate;
$values2[5]=$_POST['comments'];
$tableName='inventory';
$idColumnName='inventoryId';
$table->insertIntoTable($columns,$values1,$tableName,$idColumnName);
$table->insertIntoTable($columns,$values2,$tableName,$idColumnName);
echo '<p align="center" class="addMsg">'.$displacementStore_successfully_changed_message.'</p>';
echo '<script language="javascript" type="text/javascript"> redirectPage("showGood.php"); </script>';
}

?>






<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" id="displacementStoreForm">
<table border="0" cellspacing="3" cellpadding="0" align="center" dir="<?php echo $language_direction; ?>"  class="addTable" width="550px">
  <tr class="addTableHeader">
    <th colspan="2" align="center"><?php echo $displacementStore_title ?></th>
  </tr>
<?php

if(isset($_GET['goodId'])){
$goodId=$_GET['goodId'];
$query1="SELECT goodName, barcode FROM goods WHERE goodId='$goodId'";
$result1=$connector->queryRun($query1);
if(!$result1) echo 'Error No. 8';
$row1=mysql_fetch_array($result1);
}
$query2="SELECT * FROM stores";
$result2=$connector->queryRun($query2);
if(!$result2) echo 'Error No. 8';

$query3="SELECT * FROM stores";
$result3=$connector->queryRun($query3);
if(!$result3) echo 'Error No. 8';
      
    echo '
	<tr>
		<td width="50px">'.$displacementStore_name.'<br />'.$displacementStore_barcode.'</td>
		<td width="154" align="right">
			 <div class="ausu-suggest">
			  <input type="text" name="goodName" class="factorGoodName" id="goodName" autocomplete="off" value="'.$row1['goodName'].'" size="30">
			  <br />
			  <input type="text" name="barcode" id="barcode" autocomplete="off" value="'.$row1['barcode'].'" size="30" />
			</div>
     	</td>
	</tr>
	<tr>
   		<td>'.$displacementStore_store_from.'</td>
    	<td><select name="storeFrom" id="storeId" style="width:85px">';
		while ($row2=mysql_fetch_array($result2)){
			$storeId=$row2['storeId'];
			$storeName=$row2['storeName'];
			echo '<option value="'.$storeId.'">'.$storeName.'</option>';
		}
	echo '</select>
		</td>
	</tr>
	<tr>
		<td>'.$displacementStore_stock.'</td>
		<td>
			<input type="txt" name="stock" id="inventoryCount" size="9" />
		</td>
	</tr>
    <tr>
   		<td>'.$displacementStore_store_to.'</td>
    	<td><select name="storeTo" id="storeId" style="width:85px">';
		while ($row3=mysql_fetch_array($result3)){
			$storeId=$row3['storeId'];
			$storeName=$row3['storeName'];
			echo '<option value="'.$storeId.'">'.$storeName.'</option>';
		}
	echo '</select>
		</td>
	</tr>
	<tr>
		<td colspan="2">'.$displacementStore_comments.'</td>
	</tr>
	<tr>
		<td colspan="2">
			<textarea name="comments" id="comments"></textarea>
		</td>
	</tr>
	<tr class="addTableTd">
    	<td colspan="2" align="center">
			<input type="hidden" name="employeId" value="'.$_SESSION['adminId'].'" />
			<input type="submit" value="'.$displacementStore_submit.'" class="addTableBut" />
		</td>
	</tr></table>
	</form>';
?>

</body>
</html>
