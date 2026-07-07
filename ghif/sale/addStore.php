<?php
session_start();
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->createPageHeader('addStore','}');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');

$table=new table();
$pageHeader->suggestion('data');

if(isset($_POST['storeName'])){
$columns[0]='storeName';	
$values[0]=$_POST['storeName'];
$tableName='stores';
$idColumnName='storeId';
$table->insertIntoTable($columns,$values,$tableName,$idColumnName);
echo '<p align="center" class="addMsg">'.$editOa_successfully_edited_message.'</p>';
echo '<script language="javascript" type="text/javascript"> redirectPage("showStore.php"); </script>';
}
?>







<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" id="storeForm">
    <table border="0" cellspacing="3" cellpadding="0" align="center" dir="<?php echo $language_direction; ?>"  class="addTable" width="550px">
        <tr class="addTableHeader">
            <th colspan="2" align="center"><?php echo $addStore_title ?></th>
        </tr>
        <tr>
            <td><?php echo $addStore_name; ?></td>
            <td><input type="text" name="storeName" id="storeName" size="50" /></td>
        </tr>
        <tr class="addTableTd">
            <td colspan="2" align="center"><input type="submit" value="<?php echo $addStore_submit; ?>" class="addTableBut" /></td>
        </tr>
    </table>
</form>

</body>
</html>
