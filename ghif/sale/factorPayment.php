<?php
session_start();
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->createPageHeader('factorPayment','}');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');

if(isset($_POST['factorId2'])){
	$factorId=$_POST['factorId2'];
	$cash=$_POST['cash'];
	$card=$_POST['card'];
		
	$updateField[0][0]='cash';
	$updateField[0][1]=$cash;
	
	$updateField[1][0]='card';
	$updateField[1][1]=$card;
	$table=new table;
	$tableName='factor';
	$condition='`factor`.`factorId` ='.$factorId;
	$table->updateTable($updateField,$tableName,$condition);
	echo '<script language="javascript" type="text/javascript">window.location="addFactor.php";</script>';
}

?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="factorForm" onkeyup="balanceCheck()">
<input type="hidden" name="factorId2" value="<?php echo $_POST['factorId']; ?>" />
<table width="550px" border="1" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td colspan="2" align="center"><?php echo $factorPayment_table_header.'<br />'.$factorPayment_total_cost.' : '.$_POST['payable']; ?></td>
  </tr>
  <tr>
    <td align="center"><img src="" onclick="allCash()" title="<?php echo $factorPayment_all_cash_title; ?>" style="cursor:pointer" />cash img</td>
    <td align="center"><img src="" onclick="allCard()" title="<?php echo $factorPayment_all_card_title; ?>" style="cursor:pointer" />card img</td>
  </tr>
  <tr>
    <td align="center"><input type="text" name="cash" id="cash" /></td>
    <td align="center"><input type="text" name="card" id="card" /></td>
  </tr>
  <tr>
  	<td colspan="2" align="center"><input type="submit" value="<?php echo $factorPayment_not_balance_submit_value; ?>" id="submitBut" disabled="disabled" style="border:medium solid red" /></td>
  </tr>
</table>
<script language="javascript" type="text/javascript">
function balanceCheck(){
	totalCash=0;
	totalCard=0;
	if(document.getElementById('cash').value!='')
		cash=parseFloat(document.getElementById('cash').value);
	else cash=0;
	totalCash+=cash;
	if(document.getElementById('card').value!='')
		card=parseFloat(document.getElementById('card').value);
	else card=0;	
	totalCard+=card;
	if((totalCash+totalCard)!=<?php echo $_POST['payable']; ?>){
		document.getElementById('submitBut').value="<?php echo $factorPayment_not_balance_submit_value; ?>";
		document.getElementById('submitBut').disabled="disabled";
		document.getElementById('submitBut').style.border="medium solid red";
	}else{
		document.getElementById('submitBut').value="<?php echo $factorPayment_balance_submit_value; ?>";
		document.getElementById('submitBut').removeAttribute('disabled');
		document.getElementById('submitBut').style.border="medium solid royalblue";
	}
}
function allCash(){
	document.getElementById('cash').value='<?php echo $_POST['payable']; ?>';
	document.getElementById('card').value='';
	document.getElementById('factorForm').submit();
}
function allCard(){
	document.getElementById('card').value='<?php echo $_POST['payable']; ?>';
	document.getElementById('cash').value='';
	document.getElementById('factorForm').submit();
}
</script>
</body>
</html>
