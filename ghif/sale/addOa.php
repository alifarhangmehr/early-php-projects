<?php
session_start();
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->createPageHeader('addOa','}');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
echo '<script type="text/javascript"  src="../modules/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript"  src="../js/txtAreaEditor.js"></script>';

$table=new table();
$pageHeader->suggestion('data');

if(isset($_POST['name'])){
$columns[0]='type';	
$columns[1]='name';
$columns[2]='family';
$columns[3]='company';
$columns[4]='address';
$columns[5]='tel';
$columns[6]='mobile';
$columns[7]='comments';
$values[0]=$_POST['type'];
$values[1]=$_POST['name'];
$values[2]=$_POST['family'];
$values[3]=$_POST['company'];
$values[4]=$_POST['address'];
$values[5]=$_POST['tel'];
$values[6]=$_POST['mobile'];
$values[7]=$_POST['comments'];
$tableName='oa';
$idColumnName='oaId';
$table->insertIntoTable($columns,$values,$tableName,$idColumnName);
echo '<p align="center" class="addMsg">'.$addOa_successfully_added_message.'</p>';
echo '<script language="javascript" type="text/javascript"> redirectPage("showOa.php"); </script>';
}
?>
<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" id="oaForm">
<table border="0" cellspacing="3" cellpadding="0" align="center" dir="<?php echo $language_direction; ?>"  class="addTable" width="550px">
  <tr class="addTableHeader">
    <th colspan="2" align="center"><?php echo $addOa_title ?></th>
  </tr>
<?php


$fieldName1[0][0]='name';
$fieldName1[1][0]='family';
$fieldName1[2][0]='company';
$fieldName1[3][0]='address';
$fieldName1[4][0]='tel';
$fieldName1[5][0]='mobile';
$fieldName1[0][1]=$addOa_name;
$fieldName1[1][1]=$addOa_family;
$fieldName1[2][1]=$addOa_company;
$fieldName1[3][1]=$addOa_address;
$fieldName1[4][1]=$addOa_tel;
$fieldName1[5][1]=$addOa_mobile;

$table->showAddTable($fieldName1);	
      
    echo '
    <tr>
   		<td>'.$addOa_type.'</td>
    	<td><select name="type" id="type" style="width:70px">
				<option value="real">'.$addOa_type_real.'</option>
			  	<option value="legal">'.$addOa_type_legal.'</option>
			</select>
		</td>
	</tr>
	<tr>
   		<td colspan="2">'.$addOa_comments.'</td>
	</tr>
	<tr>
    	<td colspan="2">
			<textarea name="comments" id="comments"></textarea>
		</td>
	</tr>
	<tr class="addTableTd">
    	<td colspan="2" align="center"><input type="submit" value="'.$addOa_submit.'" class="addTableBut" />
		</td>
	</tr></table>
	</form>';
?>

</body>
</html>
