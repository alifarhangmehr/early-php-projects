<?php
session_start();
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->createPageHeader('editStore','}');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');

$table=new table();
$pageHeader->suggestion('data');

if(isset($_POST['storeId2'])){
$updateField[0][0]='storeName';	
$updateField[0][1]=$_POST['storeName'];
$tableName='stores';
$condition='storeId='.$_POST['storeId2'];
$table->updateTable($updateField,$tableName,$condition);
echo '<p align="center" class="addMsg">'.$editOa_successfully_edited_message.'</p>';
echo '<script language="javascript" type="text/javascript"> redirectPage("showStore.php"); </script>';
}
?>







<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" id="storeForm">
<input type="hidden" name="storeId2" value="<?php echo $_POST['storeId']; ?>" />
<table border="0" cellspacing="3" cellpadding="0" align="center" dir="<?php echo $language_direction; ?>"  class="addTable" width="550px">
  <tr class="addTableHeader">
    <th colspan="2" align="center"><?php echo $editOa_title ?></th>
  </tr>
<?php
$fieldName1[0][0]='storeName';
$fieldName1[0][1]=$editStore_old_name;
$storeId=$_POST['storeId'];
$query="SELECT storeName FROM stores WHERE storeId='$storeId'";
$connector=new connection();
if(!$connector->dbConnect()) echo 'Error No. 7';
$result=$connector->queryRun($query);
$row=mysql_fetch_array($result);
$fieldValue[0]=$row['storeName'];
$table->showEditTable($fieldName1,$fieldValue);
   
    echo '
	<tr>
		<td>'.$editStore_new_name.'</td>
		<td>
			<input type="text" name="storeName" id="storeName" size="50" />
		</td>
	</tr>
	<tr class="addTableTd">
    	<td colspan="2" align="center"><input type="submit" value="'.$editStore_submit.'" class="addTableBut" />
		</td>
	</tr></table>
	</form>';
?>

</body>
</html>
