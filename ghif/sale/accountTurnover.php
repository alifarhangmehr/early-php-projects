<?php
session_start();
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->createPageHeader('showAccountTurnover','}');
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

		}else if($row1['type']=='debt') {
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
        <td align="right"><?php echo $accountTurnover_name_and_family; ?></td>
        <td align="right"><?php echo $row['name'].' '.$row['family']; ?></td>
      </tr>
      <tr>
        <td align="right"><?php echo $accountTurnover_company; ?></td>
        <td align="right"><?php echo $row['company']; ?></td>
      </tr>
      <tr>
       <td align="right"><?php echo $accountTurnover_type; ?></td>
       <td align="right"><?php echo $type; ?></td>
      </tr>
      <tr>
        <td align="right"><?php echo $accountTurnover_address; ?></td>
        <td align="right"><?php echo $row['address']; ?></td>
      </tr>
      <tr>
        <td align="right"><?php echo $accountTurnover_tel; ?></td>
        <td align="right"><?php echo $row['tel']; ?></td>
      </tr>
      <tr>
        <td align="right"><?php echo $accountTurnover_mobile; ?></td>
        <td align="right"><?php echo $row['mobile']; ?></td>
      </tr>
      <tr>
        <td align="right"><?php echo $accountTurnover_comments; ?></td>
        <td align="right"><?php echo $row['comments']; ?></td>
      </tr>
    </table></td>
    <td width="50%">
    <table width="100%" border="1" align="right" dir="<?php echo $language_direction; ?>">
          <tr>
        <td align="right"><?php echo $accountTurnover_creditor_or_debtor_status; ?></td>
        <td align="right" style="font-weight:bold"><?php if($dBalance>$cBalance) echo '<span style="color:#F90">'.$accountTurnover_debtor.'</span>'; else if($dBalance<$cBalance) echo '<span style="color:#390">'.$accountTurnover_creditor.'</span>'; else if($dBalance==$cBalance) echo '<span style="color:#69F">'.$accountTurnover_balance.'</span>'; ?></td>
        
      </tr>
      <tr>
        <td align="right"><?php echo $accountTurnover_total_debt_until_now; ?></td>
        <td align="right" dir="rtl"><?php echo $tCreditor.'  '.$currency_name; ?></td>
      </tr>
      <tr>
        <td align="right"><?php echo $accountTurnover_total_credit_until_now; ?></td>
        <td align="right" dir="rtl"><?php echo $tDebt.'  '.$currency_name; ?></td>
      </tr>
        <tr>
        <td align="right"><?php echo $accountTurnover_comments; ?></td>
        <td align="right" dir="rtl" style="color:#F90; font-weight:bold"><?php echo $dBalance.'  '.$currency_name; ?></td>
      </tr>
      <tr>
        <td align="right"><?php echo $accountTurnover_liability; ?></td>
        <td align="right" dir="rtl" style="color:#390; font-weight:bold"><?php echo $cBalance.'  '.$currency_name; ?></td>
      </tr>
      <tr>
        <td align="right"><?php echo $accountTurnover_present_balance; ?></td>
        <td align="right" dir="rtl" style="color:#69F; font-weight:bold"><?php echo (abs($dBalance-$cBalance)).'  '.$currency_name; ?></td>
        
      </tr>

    
      <tr class="showTableTr">
        <td colspan="2" align="right">
        <form method="post" action="<?php echo $PHP_SELF; ?>">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" dir="<?php echo $language_direction; ?>">
        <tr>
            <td align="right"><form method="post" action="<?php echo $PHP_SELF; ?>">
        <?php echo $accountTurnover_search_date_from; ?> <input type="text" id="dateFrom" name="dateFrom" placeholder="YYYY/MM/DD" />
        <?php echo $accountTurnover_search_date_to; ?> <input type="text" id="dateTo" name="dateTo" placeholder="YYYY/MM/DD" />
        <input type="submit" value="<?php echo $accountTurnover_submit_value; ?>" />
        <input type="hidden" value="accountTurnover" name="sentPage" />
        <input type="submit" value="<?php echo $accountTurnover_showall_submit_value; ?>" />
        </form></td>
          </tr>
          <tr>
          <td colspan="12" align="right">
          <?php
		  //************************************
			//strlen($str);
			$sYear=$_POST['sYear'];
			
			if(strlen($_POST['sMonth'])==2) $sMonth=$_POST['sMonth']; else if(strlen($_POST['sMonth'])==1) $sMonth='0'.$_POST['sMonth']; else $sMonth='01';
			
			if(strlen($_POST['sDay'])==2) $sDay=$_POST['sDay']; else if(strlen($_POST['sDay'])==1) $sDay='0'.$_POST['sDay']; else $sDay='01';
			
			if(strlen($_POST['sHour'])==2) $sHour=$_POST['sHour']; else if(strlen($_POST['sHour'])==1) $sHour='0'.$_POST['sHour']; else $sHour='00';
			
			if(strlen($_POST['sMin'])==2) $sMin=$_POST['sMin']; else if(strlen($_POST['sMin'])==1) $sMin='0'.$_POST['sMin']; else $sMin='00';
			
			if(strlen($_POST['sSec'])==2) $sSec=$_POST['sSec']; else if(strlen($_POST['sSec'])==1) $sSec='0'.$_POST['sSec']; else $sSec='00';
			
			$sTime=$sHour.$sMin.$sSec;
			$sDateFA=$sYear.$sMonth.$sDay;
			//echo $sTime;
			
			$fYear=$_POST['fYear'];
			
			if(strlen($_POST['fMonth'])==2) $fMonth=$_POST['fMonth']; else if(strlen($_POST['fMonth'])==1) $fMonth='0'.$_POST['fMonth']; else $fMonth='01';
			
			if(strlen($_POST['fDay'])==2) $fDay=$_POST['fDay']; else if(strlen($_POST['fDay'])==1) $fDay='0'.$_POST['fDay']; else $fDay='01';
			
			if(strlen($_POST['fHour'])==2) $fHour=$_POST['fHour']; else if(strlen($_POST['fHour'])==1) $fHour='0'.$_POST['fHour']; else $fHour='00';
			
			if(strlen($_POST['fMin'])==2) $fMin=$_POST['fMin']; else if(strlen($_POST['fMin'])==1) $fMin='0'.$_POST['fMin']; else $fMin='00';
			
			if(strlen($_POST['fSec'])==2) $fSec=$_POST['fSec']; else if(strlen($_POST['fSec'])==1) $fSec='0'.$_POST['fSec']; else $fSec='00';
			
			
			
			
			
			
			
			
			$fTime=$fHour.$fMin.$fSec;
			//echo $fTime;
			$fDateFA=$fYear.$fMonth.$fDay;
			
			//************************************
			
			//$sFullDateFA=$sDateFA.$sTime;
			//$fFullDateFA=$fDateFA.$fTime;
			$sFullDateFA=(string)$sDateFA.(string)$sTime;
			echo '<div style="display:none">';
			if($sFullDateFA=='0101000000') $sFullDateFA='0';
			echo $accountTurnover_begin_time_of_search.' : '.$sFullDateFA;
			echo '<br />';
			
			
			
			$fFullDateFA=(string)$fDateFA.(string)$fTime;
			if($fFullDateFA=='0101000000') $fFullDateFA='999999999999999';
			echo $accountTurnover_end_time_of_search.' : '.$fFullDateFA;
			echo '<br />';
			echo '<div>';
		  ?>
          </td>
          </tr>
          <tr>
            <td colspan="12" align="center">
            
            </td>
            </tr>
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
	$connector=new connection();
	$query = "SELECT * FROM `accounts` WHERE  oaId='$oaId' AND date>='$sFullDateFA' AND date<='$fFullDateFA'";
	$result=$connector->queryRun($query);
	$counter=0;
	while($row = mysql_fetch_array($result)){
		if($row['type']=='debt') {
			
		
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
		
		echo '<tr class="showTableTr">' ;
		
		
		
		echo '<td>'.$row['price'].'</td>';
		echo '<td>'.$row['payment'].'</td>';
		echo '<td>'.($row['price']-$row['payment']).'</td>';

		echo '<td>'.$date[0].$date[1].$date[2].$date[3].'/'.$date[4].$date[5].'/'.$date[6].$date[7].' <span style="color:#09F">'.$date[8].$date[9].':'.$date[10].$date[11].':'.$date[12].$date[13].'</span></td>';
		echo '<td align="center" onclick="alert(\''.$row['comments'].'\')" style="cursor:pointer; color:green">'.$accountTurnover_show_comments.'</td>';
		
		echo '<td align="center"><a href="changeFactor.php?factorNo='.$row4['factorNo'].'">'.$row4['factorNo'].'</a></td>';
	echo '<td>'.$row2['name'].' '.$row2['family'].'</td>';
		
		echo '<td align="center"><form method="post" action="showCheck.php"><input type="image" src="../themes/default/images/checkIcon.png" style="border:hidden" /><input type="hidden" name="accountId" value="'.$row['accountId'].'" /><input type="hidden" name="oaId" value="'.$row['oaId'].'" /></form></td>';
		echo '</tr>';
		}

	}
	
	
	?>
    </table>
    </td>
    <td align="right" width="50%" style="max-width:50%" valign="top">
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
	$query = "SELECT * FROM `accounts` WHERE  oaId='$oaId' AND date>='$sFullDateFA' AND date<='$fFullDateFA'";
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
		echo '<td align="center" onclick="alert(\''.$row['comments'].'\')" style="cursor:pointer; color:green">'.$accountTurnover_show_comments.'</td>';
		
		echo '<td align="center"><a href="changeFactor.php?factorNo='.$row4['factorNo'].'">'.$row4['factorNo'].'</a></td>';
		echo '<td>'.$row2['name'].' '.$row2['family'].'</td>';
		
		echo '<td align="center"><form method="post" action="showCheck.php"><input type="image" src="../themes/default/images/checkIcon.png" style="border:hidden" /><input type="hidden" name="accountId" value="'.$row['accountId'].'" /><input type="hidden" name="oaId" value="'.$row['oaId'].'" /></form></td>';
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
