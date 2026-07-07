<?php
session_start();
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->createPageHeader('showAccountTurnover','E');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
$pageHeader->includeFile('modules/persianDatepicker-master/css/persianDatePicker-default.css');
$pageHeader->includeFile('modules/persianDatepicker-master/js/prism/css-javascript.js');
$pageHeader->includeFile('modules/persianDatepicker-master/js/persianDatePicker.js');
$table=new table();

if($_POST['oaId']!='') $oaId=$_POST['oaId']; else $oaId=$_GET['oaId'];

$connector=new connection();
$query = "SELECT * FROM `oa` WHERE  oaId='$oaId'";
$result=$connector->queryRun($query);
$row = mysql_fetch_array($result);
if($row['type']=='real') $type=$accountTurnover_acccount_type_real; else if($row['type']=='legal') $type=$accountTurnover_acccount_type_legal;

$connector=new connection();
	$query = "SELECT * FROM `accounts` WHERE  oaId='$oaId'";
	$result=$connector->queryRun($query);
	$tCreditor=0;
	$tDebt=0;
	$cBalance=0;
	$dBalance=0;
	while($row1 = mysql_fetch_array($result)){
		if($row1['type']=='creditor') {
		$tCreditor+=$row1['price'];
		$cBalance+=($row1['price']-$row1['payment']);

		}else if($row1['type']=='debtor') {
		$tDebt+=$row1['price'];
		$dBalance+=($row1['price']-$row1['payment']);
	}
}
?>
<table border="0" cellpadding="2" cellspacing="1" width="100%" dir="<?php echo $language_direction; ?>" class="showTable">
  <tr>
    <td width="50%" valign="top">
    <table width="100%" border="1" align="right">
      <tr>
        <td align="<?php echo $language_align; ?>"><?php echo $accountTurnover_name_and_family; ?></td>
        <td align="<?php echo $language_align; ?>"><?php echo $row['name'].' '.$row['family']; ?>&nbsp;</td>
      </tr>
      <tr>
        <td align="<?php echo $language_align; ?>"><?php echo $accountTurnover_company; ?></td>
        <td align="<?php echo $language_align; ?>"><?php echo $row['company']; ?>&nbsp;</td>
      </tr>
      <tr>
       <td align="<?php echo $language_align; ?>"><?php echo $accountTurnover_type; ?></td>
       <td align="<?php echo $language_align; ?>"><?php echo $type; ?>&nbsp;</td>
      </tr>
      <tr>
        <td align="<?php echo $language_align; ?>"><?php echo $accountTurnover_address; ?></td>
        <td align="<?php echo $language_align; ?>"><?php echo $row['address']; ?>&nbsp;</td>
      </tr>
      <tr>
        <td align="<?php echo $language_align; ?>"><?php echo $accountTurnover_tel; ?></td>
        <td align="<?php echo $language_align; ?>"><?php echo $row['tel']; ?>&nbsp;</td>
      </tr>
      <tr>
        <td align="<?php echo $language_align; ?>"><?php echo $accountTurnover_mobile; ?></td>
        <td align="<?php echo $language_align; ?>"><?php echo $row['mobile']; ?>&nbsp;</td>
      </tr>
      <tr>
        <td align="<?php echo $language_align; ?>"><?php echo $accountTurnover_comments; ?></td>
        <td align="<?php echo $language_align; ?>"><?php echo $row['comments']; ?>&nbsp;</td>
      </tr>
    </table></td>
    <td width="50%">
    <table width="100%" border="1" align="right" dir="<?php echo $language_direction; ?>">
          <tr>
        <td align="<?php echo $language_align; ?>"><?php echo $accountTurnover_creditor_or_debtor_status; ?></td>
        <td align="<?php echo $language_align; ?>" style="font-weight:bold"><?php if($dBalance>$cBalance) echo '<span style="color:#F90">'.$accountTurnover_debtor.'</span>'; else if($dBalance<$cBalance) echo '<span style="color:#390">'.$accountTurnover_creditor.'</span>'; else if($dBalance==$cBalance) echo '<span style="color:#69F">'.$accountTurnover_balance.'</span>'; ?></td>
      </tr>
      <tr>
        <td align="<?php echo $language_align; ?>"><?php echo $accountTurnover_total_credit_until_now; ?></td>
        <td align="<?php echo $language_align; ?>" dir="rtl"><?php echo $tCreditor.'  '.$currency_name; ?></td>
      </tr>
      <tr>
        <td align="<?php echo $language_align; ?>"><?php echo $accountTurnover_total_debt_until_now; ?></td>
        <td align="<?php echo $language_align; ?>" dir="rtl"><?php echo $tDebt.'  '.$currency_name; ?></td>
      </tr>
        <tr>
        <td align="<?php echo $language_align; ?>"><?php echo $accountTurnover_liability; ?></td>
        <td align="<?php echo $language_align; ?>" dir="rtl" style="color:#F90; font-weight:bold"><?php echo $dBalance.'  '.$currency_name; ?></td>
      </tr>
      <tr>
        <td align="<?php echo $language_align; ?>"><?php echo $accountTurnover_creditory; ?></td>
        <td align="<?php echo $language_align; ?>" dir="rtl" style="color:#390; font-weight:bold"><?php echo $cBalance.'  '.$currency_name; ?></td>
      </tr>
      <tr>
        <td align="<?php echo $language_align; ?>"><?php echo $accountTurnover_present_balance; ?></td>
        <td align="<?php echo $language_align; ?>" dir="rtl" style="color:#69F; font-weight:bold"><?php echo ($cBalance-$dBalance).'  '.$currency_name; ?></td>
        
      </tr>
      <tr>
        <td colspan="2" align="<?php echo $language_align; ?>">
        <form method="post" action="<?php echo $PHP_SELF; ?>">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" dir="<?php echo $language_direction; ?>">
        <tr>
            <td align="<?php echo $language_align; ?>">
            	<form method="post" action="<?php echo $PHP_SELF; ?>">
					<?php echo $accountTurnover_search_date_from; ?> <input type="text" id="dateFrom" name="dateFrom" />
                    <?php echo $accountTurnover_search_date_to; ?> <input type="text" id="dateTo" name="dateTo"  />
                    <input type="hidden" value="<?php echo $oaId; ?>" name="oaId" />
                    <!--<input type="hidden" value="search" name="search" />-->
                    <input type="submit" value="<?php echo $accountTurnover_submit_value; ?>" />
                </form>
            </td>
        	<td align="<?php echo $language_align; ?>">
                <form method="post" action="<?php echo $PHP_SELF; ?>">
                    <input type="hidden" value="accountTurnover" name="sentPage" />
                    <input type="hidden" value="showAll" name="showAll" />
                    <p><input type="submit" value="<?php echo $accountTurnover_showall_submit_value; ?>" /></p>
                </form>
            </td>
          </tr>
		  <?php if(isset($_POST['dateFrom'])){
         	echo '<tr align="center">
          	<td colspan="2"><p>'.$accountTurnover_submit_value.' '.$accountTurnover_search_date_from.' '.$_POST['dateFrom'].' '.$accountTurnover_search_date_to.' '.$_POST['dateTo'].'</p></td>
          </tr>';} ?>
          </table>
          </td>
        </tr>
    </table>
    </td>
  </tr>
  <tr class="showTableHeader">
    <td align="center" style="max-width:50%; font-weight:bold; font-size:14px"><?php echo $accountTurnover_liability; ?></td>
    <td align="center" style="max-width:50%; font-weight:bold; font-size:14px"><?php echo $accountTurnover_creditory; ?></td>
  </tr>
  <tr>
    <td align="right" width="50%" style="max-width:50%" valign="top">
    <table border="0" cellpadding="2" cellspacing="1" width="100%" dir="<?php echo $language_direction; ?>" style="margin:0px; padding:0px">
    <tr align="center" height="40px" class="showTableHeader" style="font-size:11px"> 
        <th><?php echo $accountTurnover_price; ?></th>
        <th><?php echo $accountTurnover_payment; ?></th>
        <th><?php echo $accountTurnover_the_remaining_amount; ?></th>
        <th><?php echo $accountTurnover_date; ?></th>
        <th><?php echo $accountTurnover_comments; ?></th>
        <th><?php echo $accountTurnover_factor_number; ?></th>
        <th><?php echo $accountTurnover_employe; ?></th>
        <th><?php echo $accountTurnover_check; ?></th>
    </tr>
    <?php
	$dF=str_split($_POST['dateFrom']);
	$dateFrom=$dF[0].$dF[1].$dF[2].$dF[3].$dF[5].$dF[6].$dF[8].$dF[9];
	$dateFrom.='000000';
	$dT=str_split($_POST['dateTo']);
	$dateTo=$dT[0].$dT[1].$dT[2].$dT[3].$dT[5].$dT[6].$dT[8].$dT[9];
	$dateTo.='000000';
	$connector=new connection();
	$query = "SELECT * FROM `accounts` WHERE oaId='$oaId'";
	if(isset($_POST['dateFrom']))
		$query = "SELECT * FROM `accounts` WHERE oaId='$oaId' AND date>='$dateFrom' AND date<='$dateTo'";
	$result=$connector->queryRun($query);
	$counter=0;
	while($row = mysql_fetch_array($result)){
		if($row['type']=='debtor') {
		$employeId=$row['employeId'];
		$connector3=new connection();
		$query3="SELECT * FROM employes WHERE employeId='$employeId'";
		$result3=$connector3->queryRun($query3);
		$row3 = mysql_fetch_array($result3);
		
		$factorId=$row['factorId'];
		$connector4=new connection();
		$query4="SELECT * FROM factor WHERE factorId='$factorId'";
		$result4=$connector4->queryRun($query4);
		$row4 = mysql_fetch_array($result4);
		
		$date=str_split($row['date']);
		
		echo '<tr class="showTableTr" style="font-size:11px">' ;
		echo '<td>'.$row['price'].'</td>';
		echo '<td>'.$row['payment'].'</td>';
		echo '<td>'.($row['price']-$row['payment']).'</td>';
		echo '<td>'.$date[0].$date[1].$date[2].$date[3].'/'.$date[4].$date[5].'/'.$date[6].$date[7].' <span style="color:#09F">'.$date[8].$date[9].':'.$date[10].$date[11].':'.$date[12].$date[13].'</span></td>';
		echo '<td align="center" onclick="alert(\''.$row['comments'].'\')" style="cursor:pointer; color:green">'.$accountTurnover_show_comments.'</td>';
		echo '<td align="center"><a href="changeFactor.php?factorNo='.$row4['factorNo'].'">'.$row4['factorNo'].'</a></td>';
	echo '<td>'.$row2['name'].' '.$row2['family'].'</td>';
		echo '<td align="center"><form method="post" action="showCheck.php"><input type="image" src="../themes/'.$_SESSION['theme'].'/images/checkIcon1.png" style="border:hidden" /><input type="hidden" name="accountId" value="'.$row['accountId'].'" /><input type="hidden" name="oaId" value="'.$row['oaId'].'" /></form></td>';
		echo '</tr>';
		}
	}
?>
    </table>
    </td>
    <td align="<?php echo $language_align; ?>" width="50%" style="max-width:50%" valign="top">
    <table border="0" cellpadding="2" cellspacing="1" width="100%" dir="<?php echo $language_direction; ?>" class="showTable" style="margin:0px; padding:0px">
    <tr align="center" height="40px" class="showTableHeader" >
        <th><?php echo $accountTurnover_price; ?></th>
        <th><?php echo $accountTurnover_payment; ?></th>
        <th><?php echo $accountTurnover_the_remaining_amount; ?></th>
        <th><?php echo $accountTurnover_date; ?></th>
        <th><?php echo $accountTurnover_comments; ?></th>
        <th><?php echo $accountTurnover_factor_number; ?></th>
        <th><?php echo $accountTurnover_employe; ?></th>
        <th><?php echo $accountTurnover_check; ?></th>
    </tr>
    <?php
	$connector=new connection();
	$query = "SELECT * FROM `accounts` WHERE  oaId='$oaId'";
	if(isset($_POST['dateFrom']))
		$query = "SELECT * FROM `accounts` WHERE oaId='$oaId' AND date>='$dateFrom' AND date<='$dateTo'";
	$result=$connector->queryRun($query);
	$counter=0;
	while($row = mysql_fetch_array($result)){
		if($row['type']=='creditor') {

		$employeId=$row['employeId'];
		$connector3=new connection();
		$query3="SELECT * FROM employes WHERE employeId='$employeId'";
		$result3=$connector3->queryRun($query3);
		$row3 = mysql_fetch_array($result3);
				
		$factorId=$row['factorId'];
		$connector4=new connection();
		$query4="SELECT * FROM factor WHERE factorId='$factorId'";
		$result4=$connector4->queryRun($query4);
		$row4 = mysql_fetch_array($result4);
		
		$date=str_split($row['date']);
		
		echo '<tr  class="showTableTr">' ;
		echo '<td>'.$row['price'].'</td>';
		echo '<td>'.$row['payment'].'</td>';
		echo '<td>'.($row['price']-$row['payment']).'</td>';
		echo '<td>'.$date[0].$date[1].$date[2].$date[3].'/'.$date[4].$date[5].'/'.$date[6].$date[7].' <span style="color:#09F">'.$date[8].$date[9].':'.$date[10].$date[11].':'.$date[12].$date[13].'</span></td>';
		echo '<td align="'.$language_align.'" onclick="alert(\''.$row['comments'].'\')" style="cursor:pointer; color:green">'.$accountTurnover_show_comments.'</td>';
		echo '<td align="'.$language_align.'"><a href="changeFactor.php?factorNo='.$row4['factorNo'].'">'.$row4['factorNo'].'</a></td>';
		echo '<td>'.$row2['name'].' '.$row2['family'].'</td>';
		echo '<td align="'.$language_align.'"><form method="post" action="showCheck.php"><input type="image" src="../themes/'.$_SESSION['theme'].'/images/checkIcon1.png" style="border:hidden" /><input type="hidden" name="accountId" value="'.$row['accountId'].'" /><input type="hidden" name="oaId" value="'.$row['oaId'].'" /></form></td>';
		echo '</tr>';
		}
	}
?>
</table>
    </td>
  </tr>
</table>
<script language="javascript" type="text/javascript">
$(function() {
	$("#dateFrom").persianDatepicker({selectedBefore:true});
	$("#dateTo").persianDatepicker({selectedBefore:true});
});
</script>
</body>
</html>
