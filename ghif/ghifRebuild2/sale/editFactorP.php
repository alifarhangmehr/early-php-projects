<?php
session_start();
error_reporting(0);
include('../class/pageHeader.php');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('class/connection.php');
$pageHeader->includeFile('class/setting.php');
$pageHeader->includeFile('class/table.php');
$pageHeader->includeFile('class/farsiNumber.php');
$pageHeader->includeFile('class/pdate.php');
$pageHeader->includeFile('class/access.php');
$login=new login();
$acLevelSign='f';
$login->check($acLevelSign);

echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>'.$editFactorP_title.'</title>
<style type="text/css">
html{
	font-family:Tahoma, Geneva, sans-serif;
	font-size:12px;	
}
</style>
</head>
<body>';
include('../modules/num-to-words/NumToWord_Fa.php');
if($_SESSION['language']=='fa')
	$numToWord=new numToWord_Fa();
else 
	$numToWord=new numToWord();
$table=new table();
$connector=new connection();
$factorId=$_POST['factorId'];
$query="SELECT factorNo FROM factor WHERE factorId='$factorId'";
$result=$connector->queryRun($query);
$row=mysql_fetch_array($result);
$factorNo=$row['factorNo'];

$oaId=$_POST['oaId'];
$c2f=new Convertnumber2farsi();

date_default_timezone_set('Asia/Tehran');
$date=pdate(YmdHis);



$factorTypeId=1; //sale
$cashListId=1; //$cashListId=$_SESSION['cashListId']; //flag
$barcode=$_SESSION['barcode']=$barcode=date(YmdHis).rand(100000,999999);


echo '
<table width="300" border="1" dir="'.$language_direction.'">
  <tr>
    <td colspan="6" align="center"><img src="../images/sourceheader.jpg" width="290px" height="150px" /></td>
  </tr>
  <tr>
  	<td align="center">'.$addFactorP_number.'</td>
	<td align="center">'.$addFactorP_good.'</td>
	<td align="center">'.$addFactorP_price.'</td>
	<td align="center">'.$addFactorP_discount.'</td>
	<td align="center">'.$addFactorP_count.'</td>
	<td align="center">'.$addFactorP_total_price.'</td>    
  </tr>';
  
$query="SELECT * FROM purchase WHERE factorId='$factorId'";
$result=$connector->queryRun($query);

if($_POST['count']!='') $count=$_POST['count'];
else $count=1;
$counter=0;
$query1="SELECT * FROM settings WHERE settingId='1'";
$result1=$connector->queryRun($query1);
$row5=mysql_fetch_array($result1);
  while($row=mysql_fetch_array($result)){
	  $goodId=$row['goodId'];
	  $counter++;
 	   $query2="SELECT * FROM goods WHERE goodId='$goodId'";
 	   $result2=$connector->queryRun($query2);
	   $row2=mysql_fetch_array($result2);
	   $totalPrice=$row['price']*$row['count'];
	   $discount=($row['price']*$row['discount']/100);
	   $totalDiscount+=($discount*$row['count']);
		echo '<tr>';
		echo '<td align="right">'.$c2f-> Convertnumber2farsi($counter).'</td>';
		echo '<td align="right" style="font-family:tahoma" dir="rtl">'.$row2['goodName'].'</td>';
		echo '<td align="right">'.$c2f-> Convertnumber2farsi($numToWord->number_format($row['price'])).'</td>';
		if($row['discount']!='') $tempDiscount=$row['discount']; else $tempDiscount=0;
		echo '<td align="center">% '.$c2f-> Convertnumber2farsi($numToWord->number_format($tempDiscount)).'</td>';
		echo '<td align="center">'.$c2f-> Convertnumber2farsi($row['count']).'</td>';
		echo '<td align="right">'.$c2f-> Convertnumber2farsi($numToWord->number_format($row['price']*$row['count'])).'</td>';	
		echo '</tr>';
		$cost+=$totalPrice;
  }
  $date=str_split($date);
	$costLen=strlen($cost);
	$cost2=str_split($cost);
	$tempCost=$cost2[$costLen-2].$cost2[$costLen-1];
	if($tempCost<=25){$cost-=$tempCost;}//320~>300
  	else if($tempCost<=50 && $tempCost>25){$cost-=$tempCost-50;} //330~>350
	else if($tempCost<=75 && $tempCost>50){$tempCost=50-$tempCost; $cost+=$tempCost;} //360~> 350
	else if($tempCost>75){$tempCost=100-$tempCost; $cost+=$tempCost;} //390~>400
  echo'<tr><td colspan="2">'.$addFactorP_total_price.'</td><td colspan="4" align="right"><span style="font-size:12px;font-weight:bold">'.$c2f-> Convertnumber2farsi($numToWord->number_format($cost)).$currency_name.'</span></tr>';
		$query0="SELECT * FROM `factorextra`";
		$result0=$connector->queryRun($query0);
 		while($row0=mysql_fetch_array($result0)){ 
			if(isset($_POST['checkbox'.$row0['factorExtraId']])){
				if($_POST['factorExtraField'.$row0['factorExtraId']]!=''){ //agar por bud
					$fieldExtraCost=$_POST['factorExtraField'.$row0['factorExtraId']];
					if($row0['priceType']=='percentage'){
						$factorExtraCost=(($fieldExtraCost/100)*$cost);
					}else if($row0['priceType']=='static'){
						$factorExtraCost=$fieldExtraCost;
					}
					 $extraCost+=$factorExtraCost;
				}else{ // tik zade bud va por nabud
					if($row0['priceType']=='percentage'){
						$factorExtraCost=(($row0['price']/100)*$cost);}
					else if($row0['priceType']=='static'){
						$factorExtraCost=$row0['price'];}
					$extraCost+=$factorExtraCost;
				}
				$factorExtraId=$row0['factorExtraId'];
				$query1="SELECT * FROM `factorextracost` WHERE factorId='$factorId' AND factorExtraId='$factorExtraId'";
				$result1=$connector->queryRun($query1);
				$row1=mysql_fetch_array($result1);
				echo'<tr><td colspan="2">'.$row0['factorExtraName'].'</td><td colspan="4" align="right"><span style="font-size:12px; font-weight:bold">'.$c2f-> Convertnumber2farsi($numToWord->number_format($row1['factorExtraCost'])).$currency_name.'</span></tr>';
		}
	}
	echo '<tr><td colspan="2">'.$addFactorP_total_discount.'</td><td colspan="4" align="right"><span style="font-size:12px; font-weight:bold">'.$c2f-> Convertnumber2farsi($numToWord->number_format($totalDiscount)).$currency_name.'</span>
	</tr><tr>
	<td colspan="2">'.$addFactorP_payable.'</td><td colspan="4" align="right"><span style="font-size:14px; font-weight:bold">'.$c2f-> Convertnumber2farsi($numToWord->number_format($cost-$totalDiscount+$extraCost)).$currency_name.'</span>
	</td>
  </tr>
  <tr>
	<td colspan="6"><span style="font-size:12px; font-weight:bold">'.$numToWord->numberToWords($cost-$totalDiscount+$extraCost).' '.$currency_name.'</span>
	</td>
  </tr>
  <tr><td colspan="6" align="center"><span style="font-size:10px; line-height:10px;">'.$addFactorP_factor_barcode.' | '.$addFactorP_factor_number.' : '.$factorNo.'</span><br /><img src="../modules/barcodegen/barcodeGenerator.php" width="250px" height="50px" style="margin:10px" /></td></tr><tr>
    <td colspan="6" align="center">
	<table border="0" cellpadding="2" cellspacing="2">
	<tr>
	<td>
	'.$c2f-> Convertnumber2farsi($date[0].$date[1].$date[2].$date[3].'/'.$date[4].$date[5].'/'.$date[6].$date[7].'&nbsp;&nbsp; | <span style="font-size:14px; font-weight:bold">'.$row5['tel1'].'</span> | &nbsp;&nbsp;<span>'.$date[8].$date[9].':'.$date[10].$date[11].':'.$date[12].$date[13]).'</span>
	</td>
	</tr>
	<tr>
	<td align="center">'.$row5['address1'].'
    </td>
	</tr>
  <tr>
	<td align="center">'.$addFactorP_thanks_for_shopping.'</td>
  </tr>
    <tr>
	<td align="center">
        '.$addFactorP_ghif_introduction.'
		<br />';
        $connector=new connection();
		if(!$connector->dbConnect()) echo 'Error No. 7';
		$query1="SELECT version FROM settings WHERE settingId=1";
		$result1=$connector->queryRun($query1);
		if(!$result1) echo 'Error No. 8';
		$row1=mysql_fetch_array($result1);
		echo $row1['version'];
  echo '</tr>
  </table>
  </tr>
</table>';

	
	

?>
<div style="display:none">
<form method="post" action="factorPayment.php" name="factorPayment" id="factorPayment">
<input type="hidden" name="factorId" id="factorId" value="<?php echo $factorId; ?>" />
<input type="hidden" name="payable" id="payable" value="<?php echo ($cost-$totalDiscount+$extraCost); ?>" />
<input type="submit" />
</form>
</div>
<script language="javascript" type="text/javascript">
 window.print();
 setTimeout("document.getElementById('factorPayment').submit();",2000);
</script>
</body>
</html>