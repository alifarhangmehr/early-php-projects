<?php
session_start();
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->createPageHeader('editAccount','G');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
$pageHeader->includeFile('modules/tinymce/jscripts/tiny_mce/tiny_mce.js');
$pageHeader->includeFile('js/txtAreaEditor.js');
date_default_timezone_set('asia/tehran');
$pdate=pdate(YmdHis);
$connector=new connection();
if(!$connector->dbConnect())
 echo 'Error No. 7';
$table=new table();
$pageHeader->suggestion('data');

if(isset($_POST['oaName'])){
	
$factorNo=$_POST['factorNo'];	

$query0="SELECT factorId FROM factor WHERE factorNo='$factorNo'";
$result0=$connector->queryRun($query0);
if(!$result0)
	echo 'Error No.8';
$row0=mysql_fetch_array($result0);

$columns[0]='oaId';	
$columns[1]='factorId';
$columns[2]='price';
$columns[3]='payment';
$columns[4]='date';
$columns[5]='type';
$columns[6]='comments';
$values[0]=$_POST['oaId'];
$values[1]=$row0['factorId'];
$values[2]=$_POST['price'];
$values[3]=$_POST['payment'];
$values[4]=$pdate;
$values[5]=$_POST['type'];
$values[6]=$_POST['comments'];
$tableName='accounts';
$condition='accountId';
$table->updateTable($updateField,$tableName,$condition);
echo '<p align="center" class="addMsg">'.$editAccount_successfully_added_message.'</p>';
echo '<script language="javascript" type="text/javascript"> redirectPage("showAccount.php"); </script>';
}
?>







<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" id="accountForm" enctype="multipart/form-data">
<table border="0" cellspacing="3" cellpadding="0" align="center" dir="<?php echo $language_direction; ?>"  class="addTable" width="550px">
  <tr class="addTableHeader">
    <th colspan="2" align="center"><?php echo $editAccount_title ?></th>
  </tr>



<?php
$accountId=$_POST['accountId'];

$query="SELECT A.price, A.payment, A.type, A.comments, factorNo, CONCAT(O.name,' ',O.family) AS oaName FROM accounts A 
LEFT JOIN factor F ON A.factorId=F.factorId 
LEFT JOIN oa O ON A.oaId=O.oaId WHERE A.accountId='$accountId'";
$result=$connector->queryRun($query);
if(!$result)
	echo 'Error No.8';
$row=mysql_fetch_array($result);

if($row['type']=='debtor'){
	$defaultType1='selected="selected"';
	$defaultType2='';
}else{
	$defaultType1='';
	$defaultType2='selected="selected"';
}

echo '<tr class="addTableTd">
 <td width="148" align="right">'.$editAccount_oa_name.'</td>
 <td width="154" align="right">
 <div class="ausu-suggest">
  <input type="text" size="30" value="'.$row['oaName'].'" name="oaName" id="oaName" autocomplete="off" />
  <br />
  <input type="text" size="30" value="'.$row['oaId'].'" name="oaId" id="oaId" autocomplete="off" style="display:none" />
</div>
 </td>
</tr>';


$fieldName1[0][0]='price';	
$fieldName1[1][0]='payment';
$fieldName1[2][0]='factorNo';
$fieldName1[0][1]=$editAccount_price;
$fieldName1[1][1]=$editAccount_payment;
$fieldName1[2][1]=$editAccount_factorNo;

$fieldValue[0]=$row[$fieldName1[0][0]];
$fieldValue[1]=$row[$fieldName1[1][0]];
$fieldValue[2]=$row[$fieldName1[2][0]];

$table->showEditTable($fieldName1,$fieldValue);	
    
    echo '
    <tr>
   		<td>'.$editAccount_type.'</td>
    	<td><select name="type" id="type" style="width:90px">
				<option value="debtor" '.$defaultType1.'>'.$editAccount_type_debtor.'</option>
			  	<option value="creditor" '.$defaultType2.'>'.$editAccount_type_creditor.'</option>
			</select>
		</td>
	</tr>
	<tr>
   		<td colspan="2">'.$editAccount_comments.'</td>
	</tr>
	<tr>
    	<td colspan="2">
			<textarea name="comments" id="comments">'.$row['comments'].'</textarea>
		</td>
	</tr>
	<tr class="addTableTd">
    	<td colspan="2" align="center"><input type="submit" value="'.$editAccount_submit.'" class="addTableBut" />
		</td>
	</tr></table>
	</form>';
?>

</body>
</html>
