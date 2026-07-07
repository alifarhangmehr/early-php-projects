<?php
session_start();
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->createPageHeader('addCashList','}');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
echo '<script type="text/javascript"  src="../modules/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript"  src="../js/txtAreaEditor.js"></script>';

$table=new table();
$pageHeader->suggestion('data');

if(isset($_POST['cashName'])){
$columns[0]='cashName';
$values[0]=$_POST['cashName'];
$tableName='cashlist';
$idColumnName='cashListId';
$table->insertIntoTable($columns,$values,$tableName,$idColumnName);
echo '<p align="center" class="addMsg">'.$addCashList_successfully_added_message.'</p>';
echo '<script language="javascript" type="text/javascript"> redirectPage("showCashList.php"); </script>';
}
?>
<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" id="cashListForm">
<table border="0" cellspacing="3" cellpadding="0" align="center" dir="<?php echo $language_direction; ?>"  class="addTable" width="550px">
  <tr class="addTableHeader">
    <th colspan="2" align="center"><?php echo $addCashList_title ?></th>
  </tr>
<?php


$fieldName1[0][0]='cashName';
$fieldName1[0][1]=$addCashList_name;

$table->showAddTable($fieldName1);	
      
    echo '
	<tr class="addTableTd">
    	<td colspan="2" align="center"><input type="submit" value="'.$addCashList_submit.'" class="addTableBut" />
		</td>
	</tr></table>
	</form>';
?>

</body>
</html>
