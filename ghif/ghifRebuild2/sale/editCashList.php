<?php
session_start();
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->createPageHeader('editCashList','z');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
echo '<script type="text/javascript"  src="../modules/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript"  src="../js/txtAreaEditor.js"></script>';
$table=new table();
$pageHeader->suggestion('data');

if(isset($_POST['cashListId2'])){
$updateField[0][0]='cashName';
$updateField[0][1]=$_POST['cashName'];
$tableName='cashlist';
$condition='cashListId='.$_POST['cashListId2'];
$table->updateTable($updateField,$tableName,$condition);
echo '<p align="center" class="addMsg">'.$editCashList_successfully_edited_message.'</p>';
echo '<script language="javascript" type="text/javascript"> redirectPage("showCashList.php"); </script>';
}
?>







<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" id="cashListForm">
<input type="hidden" name="cashListId2" value="<?php echo $_POST['cashListId']; ?>" />
<table border="0" cellspacing="3" cellpadding="0" align="center" dir="<?php echo $language_direction; ?>"  class="addTable" width="550px">
  <tr class="addTableHeader">
    <th colspan="2" align="center"><?php echo $editCashList_title ?></th>
  </tr>
<?php

$fieldName1[0][0]='cashName';
$fieldName1[0][1]=$editCashList_name;
$cashListId=$_POST['cashListId'];
$query="SELECT * FROM cashlist WHERE cashListId='$cashListId'";
$connector=new connection();
$result=$connector->queryRun($query);
$row=mysql_fetch_array($result);
$fieldValue[0]=$row['cashName'];
$table->showEditTable($fieldName1,$fieldValue);	
      
    echo '
	<tr class="addTableTd">
    	<td colspan="2" align="center"><input type="submit" value="'.$editCashList_submit.'" class="addTableBut" />
		</td>
	</tr></table>
	</form>';
?>

</body>
</html>
