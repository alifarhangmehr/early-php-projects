<?php
session_start();
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->createPageHeader('addFactorExtra','}');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
$table=new table();
$pageHeader->suggestion('data');

if(isset($_POST['factorExtraName'])){
$columns[0]='factorExtraName';
$columns[1]='priceType';	
$columns[2]='price';
$columns[3]='default';
$values[0]=$_POST['factorExtraName'];
$values[1]=$_POST['priceType'];
$values[2]=$_POST['price'];
$values[3]=$_POST['default'];
$tableName='factorextra';
$idColumnName='factorExtraId';
$table->insertIntoTable($columns,$values,$tableName,$idColumnName);
}
?>
<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" id="factorExtraForm">
<table border="0" cellspacing="3" cellpadding="0" align="center" dir="<?php echo $language_direction; ?>"  class="addTable" width="550px">
  <tr class="addTableHeader">
    <th colspan="2" align="center"><?php echo $addFactorExtra_title ?></th>
  </tr>
<?php


$fieldName1[0][0]='factorExtraName';
$fieldName1[1][0]='price';
$fieldName1[0][1]=$addFactorExtra_field_name;
$fieldName1[1][1]=$addFactorExtra_price;

$table->showAddTable($fieldName1);	
      
    echo '
    <tr>
   		<td>'.$addFactorExtra_pticeType.'</td>
    	<td><select name="priceType" id="factorExtraId">
				<option value="percentage">'.$addFactorExtra_pticeType_prcentage.'</option>
			  	<option value="static">'.$addFactorExtra_pticeType_static.'</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>'.$addFactorExtra_default.'</td>
		<td><select name="default" id="paperType">
				<option value="yes">'.$addFactorExtra_default_yes.'</option>
				<option value="no">'.$addFactorExtra_default_no.'</option>
			</select>
		</td>
	</tr>
	<tr class="addTableTd">
    	<td colspan="2" align="center"><input type="submit" value="'.$addFactorExtra_submit.'" class="addTableBut" />
		</td>
	</tr></table>
	</form>';
?>

</body>
</html>
