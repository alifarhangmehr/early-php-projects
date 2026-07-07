<?php
session_start();
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->createPageHeader('editCheck','}');

$pageHeader->includeFile('modules/persianDatepicker-master/css/persianDatePicker-default.css');
$pageHeader->includeFile('modules/persianDatepicker-master/js/prism/css-javascript.js');
$pageHeader->includeFile('modules/persianDatepicker-master/js/persianDatePicker.js');

include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
$table=new table();
$connector=new connection();
date_default_timezone_set('Asia/Tehran');

$date=pdate(YmdHis);
$checkId=$_POST['checkId'];
if(isset($_POST['checkId2'])){
	$checkId=$_POST['checkId2'];
	$updateField[0][0]='checkSerial';
	$updateField[1][0]='checkMood';
	$updateField[2][0]='exportDate';
	$updateField[3][0]='deadlineDate';
	$updateField[4][0]='price';
	$updateField[5][0]='bankName';
	$updateField[6][0]='bankBranch';
	$updateField[7][0]='accountNumber';
	$updateField[8][0]='checkAccountOwner';
	$updateField[9][0]='checkStatus';
	
	$eD=str_split($_POST['exportDate'.$i]);
	$exportDate=$eD[0].$eD[1].$eD[2].$eD[3].$eD[5].$eD[6].$eD[8].$eD[9];
	
	$dD=str_split($_POST['deadlineDate'.$i]);
	$deadlineDate=$dD[0].$dD[1].$dD[2].$dD[3].$dD[5].$dD[6].$dD[8].$dD[9];
	
	$updateField[0][1]=$_POST['checkSerial'];
	$updateField[1][1]=$_POST['checkMood'];
	$updateField[2][1]=$exportDate;
	$updateField[3][1]=$deadlineDate;
	$updateField[4][1]=$_POST['price'];
	$updateField[5][1]=$_POST['bankName'];
	$updateField[6][1]=$_POST['bankBranch'];
	$updateField[7][1]=$_POST['accountNumber'];
	$updateField[8][1]=$_POST['checkAccountOwner'];
	$updateField[9][1]=$_POST['checkStatus'];
	
	$tableName='checks';
	$condition='checkId='.$checkId;
	$result=$table->updateTable($updateField,$tableName,$condition);
	if($result) echo '<p align="center" class="checkSuccessfullyEdited">'.$editCheck_check_successfully_edited_message.'</p><script language="javascript" type="text/javascript">redirectPage("showAccount.php") </script>';
		
	
	
}else{




	$fieldName[0][0]='checkSerial';
	$fieldName[1][0]='checkMood';
	$fieldName[2][0]='price';
	$fieldName[3][0]='bankName';
	$fieldName[4][0]='bankBranch';
	$fieldName[5][0]='accountNumber';
	$fieldName[6][0]='checkAccountOwner';
	
	$fieldName[0][1]=$addCheck_check_serial;
	$fieldName[1][1]=$addCheck_check_mood;
	$fieldName[2][1]=$addCheck_check_price;
	$fieldName[3][1]=$addCheck_check_bank_name;
	$fieldName[4][1]=$addCheck_check_bank_branch;
	$fieldName[5][1]=$addCheck_check_account_number;
	$fieldName[6][1]=$addCheck_check_account_owener;
	
	$query="SELECT * FROM checks WHERE checkId='$checkId'";
	if(!$connector->dbConnect()) echo 'Error No. 7';
	$result=$connector->queryRun($query);
	if(!$result) echo 'Error No. 8';
	$row=mysql_fetch_array($result);
	
	$fieldValue[0]=$row['checkSerial'];
	$fieldValue[1]=$row['checkMood'];
	$fieldValue[2]=$row['price'];
	$fieldValue[3]=$row['bankName'];
	$fieldValue[4]=$row['bankBranch'];
	$fieldValue[5]=$row['accountNumber'];
	$fieldValue[6]=$row['checkAccountOwner'];
	

	
	$eD=str_split($row['exportDate'.$i]);
	$exportDate=$eD[0].$eD[1].$eD[2].$eD[3].'/'.$eD[4].$eD[5].'/'.$eD[6].$eD[7];
	
	$dD=str_split($row['deadlineDate'.$i]);
	$deadlineDate=$dD[0].$dD[1].$dD[2].$dD[3].'/'.$dD[4].$dD[5].'/'.$dD[6].$dD[7];
?>
<br /><br />

<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
<input type="hidden" name="checkId2" value="<?php echo $_POST['checkId'] ?>" />

<table border="0" cellspacing="3" cellpadding="0" align="center" dir="<?php echo $language_direction; ?>"  class="addTable">
  <tr class="addTableHeader">
    <th colspan="2" align="center"><?php echo $editCheck_table_title.' '.$i; ?></th>
  </tr>

<?php

$table->showEditTable($fieldName,$fieldValue);
echo '<tr class="addTableTd"><td>'.$addCheck_check_export_date.'</td><td>
		<input type="text" id="exportDate" name="exportDate" value="'.$exportDate.'" placeholder="YYYY/MM/DD" /></td></tr>';
echo '<tr class="addTableTd"><td>'.$addCheck_check_deadline_date.'</td><td>
		<input type="text" id="deadlineDate" name="deadlineDate" value="'.$deadlineDate.'" placeholder="YYYY/MM/DD" /></td></tr>';

if($row['checkStatus']=='suspended') $sSelect=' selected="selected"';
if($row['checkStatus']=='passed') $pSelect=' selected="selected"';
if($row['checkStatus']=='returned') $rSelect=' selected="selected"';
echo '<tr class="addTableTd"><td>'.$addCheck_check_status.'</td><td>
		<select name="checkStatus'.$i.'">
			<option value="suspended"'.$sSelect.'>'.$addCheck_status_suspended.'</option>
			<option value="passed"'.$pSelect.'>'.$addCheck_status_passed.'</option>
			<option value="returned"'.$rSelect.'>'.$addCheck_status_returned.'</option>
		</select>
</td></tr>';	
echo '</table>';




echo '<input type="hidden" value="'.$accountId.'" name="accountId2" />';
echo '<input type="hidden" value="'.$checkCount.'" id="checkCount" name="checkCount" />';
echo '<p align="center"><input type="submit" value="'.$addCheck_submit_value.'" class="addTableBut" /></p>
</form>';
}
$pageHeader->includeFile('js/bankCheck.php');
?>
<script language="javascript" type="text/javascript">

/*
$(function() {
	$("#exportDate").persianDatepicker({selectedBefore:true});
	$("#deadlineDate").persianDatepicker({selectedBefore:true});  
});
*/


</script>
</body>