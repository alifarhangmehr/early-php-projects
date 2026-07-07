<?php
session_start();
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->createPageHeader('addCheck','}');

$pageHeader->includeFile('modules/persianDatepicker-master/css/persianDatePicker-default.css');
$pageHeader->includeFile('modules/persianDatepicker-master/js/prism/css-javascript.js');
$pageHeader->includeFile('modules/persianDatepicker-master/js/persianDatePicker.js');

include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');

date_default_timezone_set('Asia/Tehran');
$date=pdate(YmdHis);
if(isset($_GET['accountId']))
	$accountId=$_GET['accountId'];
else
	$accountId=$_POST['accountId'];
$checkCount=$_POST['checkCount'];
$table=new table();
if(isset($_POST['accountId2'])){
	$flag=true;
	$columns[0]='accountId';
	$columns[1]='checkSerial';
	$columns[2]='checkMood';
	$columns[3]='exportDate';
	$columns[4]='deadlineDate';
	$columns[5]='price';
	$columns[6]='bankName';
	$columns[7]='bankBranch';
	$columns[8]='accountNumber';
	$columns[9]='checkAccountOwner';
	$columns[10]='checkStatus';
	$values[0]=$_POST['accountId2'];
	for($i=1;$i<=$checkCount;$i++){
	if($checkCount=='') $checkCount=1;
		
		$eD=str_split($_POST['exportDate'.$i]);
		$exportDate=$eD[0].$eD[1].$eD[2].$eD[3].$eD[5].$eD[6].$eD[8].$eD[9];
		
		$dD=str_split($_POST['deadlineDate'.$i]);
		$deadlineDate=$dD[0].$dD[1].$dD[2].$dD[3].$dD[5].$dD[6].$dD[8].$dD[9];
		
		
		$values[1]=$_POST['checkSerial'.$i];
		$values[2]=$_POST['checkMood'.$i];
		$values[3]=$exportDate;
		$values[4]=$deadlineDate;
		$values[5]=$_POST['price'.$i];
		$values[6]=$_POST['bankName'.$i];
		$values[7]=$_POST['bankBranch'.$i];
		$values[8]=$_POST['accountNumber'.$i];
		$values[9]=$_POST['checkAccountOwner'.$i];
		$values[10]=$_POST['checkStatus'.$i];
		$tableName='checks';
		$idColumnName='checkId';
		$result=$table->insertIntoTable($columns,$values,$tableName,$idColumnName);
		
		if($result) echo '<p align="center" class="checkSuccessfullyAdded">'.$addCheck_check_successfully_added_message1.$i.$addCheck_check_successfully_added_message2.'</p><script language="javascript" type="text/javascript">redirectPage("showAccount.php") </script>'; else $flag=false;
	}
	if($flag) echo '<p align="center" class="checkSuccessfullyAdded">'.$addCheck_check_successfully_added_message3.'</p>';
}else{
if($checkCount=='') $checkCount=1;
for($i=1;$i<=$checkCount;$i++){



	$fieldName1[0][0]='checkSerial'.$i;
	$fieldName1[1][0]='checkMood'.$i;
	$fieldName1[2][0]='price'.$i;
	$fieldName1[3][0]='bankName'.$i;
	$fieldName1[4][0]='bankBranch'.$i;
	$fieldName1[5][0]='accountNumber'.$i;
	$fieldName1[6][0]='checkAccountOwner'.$i;
	
	$fieldName1[0][1]=$addCheck_check_serial;
	$fieldName1[1][1]=$addCheck_check_mood;
	$fieldName1[2][1]=$addCheck_check_price;
	$fieldName1[3][1]=$addCheck_check_bank_name;
	$fieldName1[4][1]=$addCheck_check_bank_branch;
	$fieldName1[5][1]=$addCheck_check_account_number;
	$fieldName1[6][1]=$addCheck_check_account_owener;

	if($i>1) echo '<p align="center"><input type="button" value="'.$addCheck_copy_from_first_check_button_value.'" onClick="copyFromFirstCheck('.$i.')" /></p>';

?>
<br /><br />

<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
<table border="0" cellspacing="3" cellpadding="0" align="center" dir="<?php echo $language_direction; ?>"  class="addTable">
  <tr class="addTableHeader">
    <th colspan="2" align="center"><?php echo $addCheck_table_title.' '.$i; ?></th>
  </tr>

<?php
$table->showAddTable($fieldName1);
echo '<tr class="addTableTd"><td>'.$addCheck_check_export_date.'</td><td>
		<input type="text" id="exportDate'.$i.'" name="exportDate'.$i.'" placeholder="YYYY/MM/DD" /></td></tr>';
echo '<tr class="addTableTd"><td>'.$addCheck_check_deadline_date.'</td><td>
		<input type="text" id="deadlineDate'.$i.'" name="deadlineDate'.$i.'" placeholder="YYYY/MM/DD" /></td></tr>';

echo '<tr class="addTableTd"><td>'.$addCheck_check_status.'</td><td>
		<select name="checkStatus'.$i.'">
			<option value="suspended" selected="selected">'.$addCheck_status_suspended.'</option>
			<option value="passed">'.$addCheck_status_passed.'</option>
			<option value="returned">'.$addCheck_status_returned.'</option>
		</select>
</td></tr>';	
echo '</table>';
}




echo '<input type="hidden" value="'.$accountId.'" name="accountId2" />';
echo '<input type="hidden" value="'.$checkCount.'" id="checkCount" name="checkCount" />';
echo '<p align="center"><input type="submit" value="'.$addCheck_submit_value.'" class="addTableBut" /></p>
</form>';
}
$pageHeader->includeFile('js/bankCheck.php');
?>
<script language="javascript" type="text/javascript">
function copyFromFirstCheck(id){
	document.getElementById('checkAccountOwner'+id).value=document.getElementById('checkAccountOwner1').value;
	document.getElementById('bankName'+id).value=document.getElementById('bankName1').value;
	document.getElementById('bankBranch'+id).value=document.getElementById('bankBranch1').value;
	document.getElementById('accountNumber'+id).value=document.getElementById('accountNumber1').value;
	document.getElementById('checkSerial'+id).value=document.getElementById('checkSerial1').value;
	document.getElementById('checkMood'+id).value=document.getElementById('checkMood1').value;
	document.getElementById('exportDate'+id).value=document.getElementById('exportDate1').value;
	document.getElementById('deadlineDate'+id).value=document.getElementById('deadlineDate1').value;
	document.getElementById('price'+id).value=document.getElementById('price1').value;	 	 	 	 	 	 	 	 	 	 	
}
$(function() {
	<?php
	for($i=1;$i<=$checkCount;$i++){
		echo '$("#exportDate'.$i.'").persianDatepicker({selectedBefore:true});';
		echo '$("#deadlineDate'.$i.'").persianDatepicker({selectedBefore:true});';
	}
	?>    
});
</script>
</body>