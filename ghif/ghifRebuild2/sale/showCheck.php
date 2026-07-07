<?php
session_start();
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->createPageHeader('showCheck','S');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
$accountId=$_GET['accountId'];
echo '<form method="post" action="addCheck.php">
<table align="center" dir="rtl"><tr>
<input type="hidden" name="accountId" value="'.$accountId.'" />
<td>'.$showCheck_add_check_comment.'</td>
<td> : <input type="text" name="checkCount" size="3" />&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="'.$showCheck_add_check_submit_value.'" /></td>
</tr></table>
</form><br /><br />';
?>
<?php
include('../modules/num-to-words/NumToWord_Fa.php');


if($_SESSION['language']=='fa')
	$numToWord=new numToWord_Fa();
else 
	$numToWord=new numToWord();
$table=new table();
$factorNo=$table->maxTableId('factor','factorNo');
$factorId=$_POST['factorId'];
$oaId=$_POST['oaId'];
$c2f=new Convertnumber2farsi();
$connector=new connection();
$query="SELECT * FROM checks WHERE accountId='$accountId' ORDER BY checkId DESC";
$result=$connector->queryRun($query);
while($row=mysql_fetch_array($result))
  {
	$exportDate=str_split($row['exportDate']);
	$deadlineDate=str_split($row['deadlineDate']);
	$exportDate=$exportDate[0].$exportDate[1].$exportDate[2].$exportDate[3].'/'.$exportDate[4].$exportDate[5].'/'.$exportDate[6].$exportDate[7];
	$deadlineDate=$deadlineDate[0].$deadlineDate[1].$deadlineDate[2].$deadlineDate[3].'/'.$deadlineDate[4].$deadlineDate[5].'/'.$deadlineDate[6].$deadlineDate[7];
	echo '
		<table border="0" cellspacing="4" cellpadding="3" dir="rtl" class="bankCheck" align="center">
		  <tr class="bankCheckHeader">
			<td colspan="3" align="center">'.$showCheck_bank_name.' '.$row['bankName'].' '.$showCheck_bank_branch.' '.$row['bankBranch'].'</td>
		  </tr>
		  <tr>
			<td width="350">'.$showCheck_export_date.' '.$c2f->Convertnumber2farsi($exportDate).'</td>
			<td width="350">'.$showCheck_deadline_date.' '.$c2f->Convertnumber2farsi($deadlineDate).'</td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td>'.$showCheck_check_serial.' :  '.$c2f->Convertnumber2farsi($row['checkSerial']).'</td>
			<td>'.$showCheck_check_mood.' '.$row['checkMood'].'</td>
			<td colspan="2">&nbsp;</td>
		  </tr>
		  <tr>
			<td colspan="2">'.$showCheck_price_in_word_format.' '.$numToWord->numberToWords($row['price']).' '.$currency_name.'</td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td align="left"><div class="bankCheckPriceDiv">'.$c2f->Convertnumber2farsi($numToWord->number_format($row['price'])).' '.$currency_name.'</div></td>
			<td>&nbsp;</td>
		  </tr>
		  <tr>
			<td>'.$showCheck_account_owener.' : '.$row['checkAccountOwner'].'</td>
			<td>'.$showCheck_account_number.' : '.$c2f->Convertnumber2farsi($row['accountNumber']).'</td>
			<td>&nbsp;</td>
		  </tr>
		</table>
		<table border="0" align="center" cellpadding="5" cellspacing="4"><tr>
		<td>
		<form method="post" action="editCheck.php">
		<input type="hidden" name="checkId" value="'.$row['checkId'].'" />
		<input type="submit" value="'.$showFactor_change_check_submit_value.'" />
		</form>
		</td>
		<td>
		<form method="post" action="delete.php">
		<input type="hidden" name="hiddenDeleteId" value="'.$row['checkId'].'" />
		<input type="hidden" name="hiddenTableName" value="checks" />
		<input type="hidden" name="hiddenFieldId" value="checkId" />
		<input type="submit" value="'.$showFactor_delete_check_submit_value.'" />
		</form>
		</td>
		</tr>
		<tr>
		<td colspan="2" align="center">'.$showCheck_check_status.' : ';
		if($row['checkStatus']=='suspended') echo $showCheck_status_suspended;
		else if($row['checkStatus']=='passed') echo $showCheck_status_passed;
		else if($row['checkStatus']=='returned') echo $showCheck_status_returned;
		echo'</td>
		</tr>
		</table>';
		
  }