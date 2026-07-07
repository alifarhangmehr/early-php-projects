<?php
session_start();
//error_reporting(0);
$language=$_SESSION['language'];
include('../language/'.$language.'/'.$language.'.php');
include('../settings/config.php');
	
/*require('../class/acLevelCon.php');
require('../class/acLevel.php');
if($_SESSION['allowEnterAdminArea']){
$sAcLevel=new sAcLevel();
$checkSAcLevel=$sAcLevel->checkAccess('b');

if(!$checkSAcLevel) {
	include('accessDenied.php');
	exit;
}else if(!$_SESSION['allowEnterAdminArea']){
	include('mustLogin.php');
	exit;
}
}
include('slider.php');*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $accountTurnover_title; ?></title>
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" type="text/css" href="../themes/default/css/index.css"/>
<script language="javascript" type="text/javascript" src="../js/admin.js"></script>
</head>

<body>
<?php

include('header.php');
require('../class/connection.php');
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
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="50%" valign="top">
    <table width="100%" border="1" align="right">
      <tr>
        <td align="right"><?php echo $row['name'].' '.$row['family']; ?></td>
        <td align="right"><?php echo $accountTurnover_name_and_family; ?></td>
      </tr>
      <tr>
        <td align="right"><?php echo $row['company']; ?></td>
        <td align="right"><?php echo $accountTurnover_company; ?></td>
      </tr>
      <tr>
        <td align="right"><?php echo $type; ?></td>
        <td align="right"><?php echo $accountTurnover_type; ?></td>
      </tr>
      <tr>
        <td align="right"><?php echo $row['address']; ?></td>
        <td align="right"><?php echo $accountTurnover_address; ?></td>
      </tr>
      <tr>
        <td align="right"><?php echo $row['tel']; ?></td>
        <td align="right"><?php echo $accountTurnover_tel; ?></td>
      </tr>
      <tr>
        <td align="right"><?php echo $row['mobile']; ?></td>
        <td align="right"><?php echo $accountTurnover_mobile; ?></td>
      </tr>
      <tr>
        <td align="right"><?php echo $row['comments']; ?></td>
        <td align="right"><?php echo $accountTurnover_comments; ?></td>
      </tr>
    </table></td>
    <td width="50%">
    <table width="100%" border="1" align="right">
          <tr>
        <td align="right" style="font-weight:bold"><?php if($dBalance>$cBalance) echo '<span style="color:#F90">'.$accountTurnover_debtor.'</span>'; else if($dBalance<$cBalance) echo '<span style="color:#390">'.$accountTurnover_creditor.'</span>'; else if($dBalance==$cBalance) echo '<span style="color:#69F">'.$accountTurnover_balance.'</span>'; ?></td>
        <td align="right"><?php echo $accountTurnover_creditor_or_debtor_status; ?></td>
      </tr>
      <tr>
        <td align="right" dir="rtl"><?php echo $tCreditor.'  '.$currency_name; ?></td>
        <td align="right"><?php echo $accountTurnover_total_debt_until_now; ?></td>
      </tr>
      <tr>
        <td align="right" dir="rtl"><?php echo $tDebt.'  '.$currency_name; ?></td>
        <td align="right"><?php echo $accountTurnover_total_credit_until_now; ?></td>
      </tr>
        <tr>
        <td align="right" dir="rtl" style="color:#F90; font-weight:bold"><?php echo $dBalance.'  '.$currency_name; ?></td>
        <td align="right"><?php echo $accountTurnover_comments; ?></td>
      </tr>
      <tr>
        <td align="right" dir="rtl" style="color:#390; font-weight:bold"><?php echo $cBalance.'  '.$currency_name; ?></td>
        <td align="right"><?php echo $accountTurnover_liability; ?></td>
      </tr>
      <tr>
        <td align="right" dir="rtl" style="color:#69F; font-weight:bold"><?php echo (abs($dBalance-$cBalance)).'  '.$currency_name; ?></td>
        <td align="right"><?php echo $accountTurnover_present_balance; ?></td>
      </tr>

    
      <tr>
        <td colspan="2" align="right">
        <form method="post" action="<?php echo $PHP_SELF; ?>">
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td align="right" bgcolor="#999999"><input name="sSec" type="text" value="<?php echo $_POST['sSec']; ?>"  id="sSec" size="3" maxlength="2" tabindex="6" /></td>
            <td align="right" bgcolor="#999999"><?php echo $accountTurnover_second; ?></td>
            <td align="right" bgcolor="#999999"><input name="sMin" type="text" value="<?php echo $_POST['sMin']; ?>" id="sMin" size="3" maxlength="2" tabindex="5" /></td>
            <td align="right" bgcolor="#999999"><?php echo $accountTurnover_minute; ?></td>
            <td align="right" bgcolor="#999999"><input name="sHour" type="text" value="<?php echo $_POST['sHour']; ?>" id="sHour" size="3" maxlength="2" tabindex="4" /></td>
            <td align="right" bgcolor="#999999"><?php echo $accountTurnover_hour; ?></td>
            <td align="right" bgcolor="#999999"><input name="sDay" type="text" value="<?php echo $_POST['sDay']; ?>" id="sDay" size="3" maxlength="2" tabindex="3" /></td>
            <td align="right" bgcolor="#999999"><?php echo $accountTurnover_day; ?></td>
            <td align="right" bgcolor="#999999"><input name="sMonth" type="text" value="<?php echo $_POST['sMonth']; ?>" id="sMonth" size="3" maxlength="2" tabindex="2" /></td>
            <td align="right" bgcolor="#999999"><?php echo $accountTurnover_month; ?></td>
            <td align="right" bgcolor="#999999"><input name="sYear" type="text" value="<?php echo $_POST['sYear']; ?>" id="sYear" size="6" maxlength="4" tabindex="1" /></td>
            <td align="right" bgcolor="#999999"><?php echo $accountTurnover_search_date_from.' '.$accountTurnover_year; ?></td>
          </tr>
          <tr>
            <td align="right" bgcolor="#CCCCCC"><input name="fSec" type="text" value="<?php echo $_POST['fSec']; ?>" id="fSec" size="3" maxlength="2" tabindex="12" /></td>
            <td align="right" bgcolor="#CCCCCC"><?php echo $accountTurnover_second; ?></td>
            <td align="right" bgcolor="#CCCCCC"><input name="fMin" type="text" value="<?php echo $_POST['fMin']; ?>" id="fMin" size="3" maxlength="2" tabindex="11" /></td>
            <td align="right" bgcolor="#CCCCCC"><?php echo $accountTurnover_minute; ?></td>
            <td align="right" bgcolor="#CCCCCC"><input name="fHour" type="text" value="<?php echo $_POST['fHour']; ?>" id="fHour" size="3" maxlength="2" tabindex="10" /></td>
            <td align="right" bgcolor="#CCCCCC"><?php echo $accountTurnover_hour; ?></td>
            <td align="right" bgcolor="#CCCCCC"><input name="fDay" type="text" value="<?php echo $_POST['fDay']; ?>" id="fDay" size="3" maxlength="2" tabindex="9" /></td>
            <td align="right" bgcolor="#CCCCCC"><?php echo $accountTurnover_day; ?></td>
            <td align="right" bgcolor="#CCCCCC"><input name="fMonth" type="text" value="<?php echo $_POST['fMonth']; ?>" id="fMonth" size="3" maxlength="2" tabindex="8" /></td>
            <td align="right" bgcolor="#CCCCCC"><?php echo $accountTurnover_month; ?></td>
            <td align="right" bgcolor="#CCCCCC"><input name="fYear" type="text" value="<?php echo $_POST['fYear']; ?>" id="fYear" size="6" maxlength="4" tabindex="7" /></td>
            <td align="right" bgcolor="#CCCCCC"><?php echo $accountTurnover_search_date_to.' '.$accountTurnover_year; ?></td>
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
			echo 'تاریخ و زمان شروع جستجو : '.$sFullDateFA;
			echo '<br />';
			
			
			
			$fFullDateFA=(string)$fDateFA.(string)$fTime;
			if($fFullDateFA=='0101000000') $fFullDateFA='999999999999999';
			echo 'تاریخ و زمان پایان جستجو : '.$fFullDateFA;
			echo '<br />';
			echo '<div>';
		  ?>
          </td>
          </tr>
          <tr>
            <td colspan="12" align="center" bgcolor="#CCCCCC">
            <input type="submit" class="button small blue" value="<?php echo $accountTurnover_submit_value; ?>" /></form>
            </form>
            <form method="post" action="deleteSession.php">
            <input type="hidden" value="accountTurnover" name="sentPage" />
            <input type="submit" class="button small blue" value="<?php echo $accountTurnover_showall_submit_value; ?>" />
            </form>
            </td>
            </tr>
          </table>
        
          </td>
        </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td align="center" style="max-width:50%; color:#F90; background:#EEE; font-weight:bold; font-size:14px"><?php echo $accountTurnover_liability; ?></td>
    <td align="center" style="max-width:50%; color:#690; background:#EEE; font-weight:bold; font-size:14px"><?php echo $accountTurnover_credit; ?></td>
  </tr>
  <tr>
    <td align="right" width="50%" style="max-width:50%" valign="top">
    <table border="0" cellpadding="2" cellspacing="1" width="100%" dir="rtl" style="margin:0px; padding:0px">
    <tr align="center" height="40px" bgcolor="#0066FF" style="color:#DDDDDD; font-size:11px"> 
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
			
		if($counter%2==0) $bgCondition='#DDDDDD'; else $bgCondition='#EEEEEE';
		$counter++;
		echo '<tr bgcolor="'.$bgCondition.'">' ;
		
		
		
		echo '<td>'.$row['price'].'</td>';
		echo '<td>'.$row['payment'].'</td>';
		echo '<td>'.($row['price']-$row['payment']).'</td>';

		echo '<td>'.$date[0].$date[1].$date[2].$date[3].'/'.$date[4].$date[5].'/'.$date[6].$date[7].' <span style="color:#09F">'.$date[8].$date[9].':'.$date[10].$date[11].':'.$date[12].$date[13].'</span></td>';
		echo '<td align="center" onclick="alert(\''.$row['comments'].'\')" style="cursor:pointer; color:green">'.$accountTurnover_show_comments.'</td>';
		
		echo '<td align="center"><a href="changeFactor.php?factorNo='.$row4['factorNo'].'">'.$row4['factorNo'].'</a></td>';
	echo '<td>'.$row2['name'].' '.$row2['family'].'</td>';
		
		echo '<td align="center"><form method="post" action="showCheck.php"><input type="image" src="../themes/'.$_SESSION['theme'].'/images/checkIcon.png" style="border:hidden" /><input type="hidden" name="accountId" value="'.$row['accountId'].'" /><input type="hidden" name="oaId" value="'.$row['oaId'].'" /></form></td>';
		echo '</tr>';
		}

	}
	
	
	?>
    </table>
    </td>
    <td align="right" width="50%" style="max-width:50%" valign="top">
    <table border="0" cellpadding="2" cellspacing="1" width="100%" dir="rtl" style="margin:0px; padding:0px">
    <tr align="center" height="40px" bgcolor="#0066FF" style="color:#DDDDDD; font-size:11px"> 
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
			
		if($counter%2==0) $bgCondition='#DDDDDD'; else $bgCondition='#EEEEEE';
		$counter++;
		echo '<tr bgcolor="'.$bgCondition.'">' ;
		
		
		
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
</body>
</html>
