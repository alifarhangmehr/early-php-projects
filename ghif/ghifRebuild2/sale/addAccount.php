<?php
session_start();
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->createPageHeader('addAccount','F');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
$pageHeader->includeFile('modules/tinymce/jscripts/tiny_mce/tiny_mce.js');
$pageHeader->includeFile('js/txtAreaEditor.js');

date_default_timezone_set('asia/tehran');
$pdate=pdate(YmdHis);

$table=new table();
$pageHeader->suggestion('data');
if(isset($_POST['oaName'])){
$factorNo=$_POST['factorNo'];	
$connector=new connection();
if(!$connector->dbConnect())
 echo 'Error No. 7';
$query="SELECT factorId FROM factor WHERE factorNo='$factorNo'";
$result=$connector->queryRun($query);
if(!$result)
	echo 'Error No.8';
$row=mysql_fetch_array($result);

$columns[0]='oaId';	
$columns[1]='factorId';
$columns[2]='price';
$columns[3]='payment';
$columns[4]='date';
$columns[5]='type';
$columns[6]='comments';
$values[0]=$_POST['oaId'];
$values[1]=$row['factorId'];
$values[2]=$_POST['price'];
$values[3]=$_POST['payment'];
$values[4]=$pdate;
$values[5]=$_POST['type'];
$values[6]=$_POST['comments'];
$tableName='accounts';
$idColumnName='accountId';
$table->insertIntoTable($columns,$values,$tableName,$idColumnName);
echo '<p align="center" class="addMsg">'.$addAccount_successfully_added_message.'</p>';
echo '<script language="javascript" type="text/javascript"> redirectPage("showAccount.php"); </script>';
}
?>







<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" id="accountForm" enctype="multipart/form-data">
<table border="0" cellspacing="3" cellpadding="0" align="center" dir="<?php echo $language_direction; ?>"  class="addTable" width="550px">
  <tr class="addTableHeader">
    <th colspan="2" align="center"><?php echo $addAccount_title ?></th>
  </tr>

<tr class="addTableTd">
 <td width="148" align="right"><?php echo $addAccount_oa_name; ?></td>
 <td width="154" align="right">
 <div class="ausu-suggest">
  <input type="text" size="30" value="" name="oaName" id="oaName" autocomplete="off" />
  <br />
  <input type="text" size="30" value="" name="oaId" id="oaId" autocomplete="off" style="display:none" />
</div>
 </td>
</tr>

<?php
$fieldName1[0][0]='price';	
$fieldName1[1][0]='payment';
$fieldName1[2][0]='factorNo';
$fieldName1[0][1]=$addAccount_price;
$fieldName1[1][1]=$addAccount_payment;
$fieldName1[2][1]=$addAccount_factorNo;

$table->showAddTable($fieldName1);	
      
    echo '
    <tr>
   		<td>'.$addAccount_type.'</td>
    	<td><select name="type" id="type" style="width:90px">
				<option value="debtor">'.$addAccount_type_debtor.'</option>
			  	<option value="creditor">'.$addAccount_type_creditor.'</option>
			</select>
		</td>
	</tr>
	<tr>
   		<td colspan="2">'.$addAccount_comments.'</td>
	</tr>
	<tr>
    	<td colspan="2">
			<textarea name="comments" id="comments"></textarea>
		</td>
	</tr>
	<tr class="addTableTd">
    	<td colspan="2" align="center"><input type="submit" value="'.$addAccount_submit.'" class="addTableBut" />
		</td>
	</tr></table>
	</form>';
?>

</body>
</html>
