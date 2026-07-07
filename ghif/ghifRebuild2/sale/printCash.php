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
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->includeFile('modules/chart/js/highcharts.js');
$pageHeader->includeFile('modules/tinymce/jscripts/tiny_mce/tiny_mce.js');
$pageHeader->includeFile('class/access.php');
$login=new login();
$acLevelSign='n';
$login->check($acLevelSign);

echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>'.$addCashP_title.'</title>
<style type="text/css">
table{
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
$cashId=$_GET['cashId'];


$query="SELECT * FROM cash WHERE cashId='$cashId'";
$result=$connector->queryRun($query);
$row=mysql_fetch_array($result);

$reciverEmployeId=$row['reciverEmployeId'];
$cashierEmployeId=$row['cashierEmployeId'];
$dateFrom=$row['dateFrom'];
$dateTo=$row['dateTo'];
$tCashPrice=$row['cashPrice'];
$tCardPrice=$row['cardPrice'];
$comments=$row['comments'];

$c2f=new Convertnumber2farsi();


	$query="SELECT * FROM employes WHERE employeId='$reciverEmployeId'";
	$result=$connector->queryRun($query);
	$row=mysql_fetch_array($result);
	$reciverEmployeName=$row['name'].' '.$row['family'];

	$query="SELECT * FROM employes WHERE employeId='$cashierEmployeId'";
	$result=$connector->queryRun($query);
	$row = mysql_fetch_array($result);
	$cashierEmployeName=$row['name'].' '.$row['family'];

	$dateFromSplit=str_split($dateFrom);
	$dateToSplit=str_split($dateTo);
	echo '
	<table border="1" dir="'.$language_direction.'">
	  <tr>
		<td colspan="6" align="center"><img src="../images/sourceheader.jpg" width="290px" height="150px" /></td>
	  </tr>
		<tr><td>'.$addCashP_cash_sale.'</td><td>'.$c2f->Convertnumber2farsi($numToWord->number_format($tCashPrice)).''.$currency_name.'</td></tr>
		<tr><td>'.$addCashP_card_sale.'</td><td>'.$c2f->Convertnumber2farsi($numToWord->number_format($tCardPrice)).''.$currency_name.'</td></tr>
		<tr><td>'.$addCashP_from_date.'</td><td>'.$c2f->Convertnumber2farsi($dateFromSplit[0].$dateFromSplit[1].$dateFromSplit[2].$dateFromSplit[3].'/'.$dateFromSplit[4].$dateFromSplit[5].'/'.$dateFromSplit[6].$dateFromSplit[7].' <span style="color:#09F">'.$dateFromSplit[8].$dateFromSplit[9].':'.$dateFromSplit[10].$dateFromSplit[11].':'.$dateFromSplit[12].$dateFromSplit[13]).'</span></td></tr>
		<tr><td>'.$addCashP_until_date.'</td><td>'.$c2f->Convertnumber2farsi($dateToSplit[0].$dateToSplit[1].$dateToSplit[2].$dateToSplit[3].'/'.$dateToSplit[4].$dateToSplit[5].'/'.$dateToSplit[6].$dateToSplit[7].' <span style="color:#09F">'.$dateToSplit[8].$dateToSplit[9].':'.$dateToSplit[10].$dateToSplit[11].':'.$dateToSplit[12].$dateToSplit[13]).'</span></td></tr>
		<tr><td>'.$addCashP_delivered_to.'</td><td>'.$reciverEmployeName.'</td></tr>
		<tr><td>'.$addCashP_cashier.'</td><td>'.$cashierEmployeName.'</td></tr>
		<tr><td colspan="2">'.$addCashP_comments.' : '.$comments.'</td></tr>
		
		<tr><td colspan="2">';
	?>
    		<script type="text/javascript">
		
			var chart;
			$(document).ready(function() {
				chart = new Highcharts.Chart({
					chart: {
						renderTo: 'container',
						defaultSeriesType: 'column'
					},
					title: {
						text: '<?php echo $addCashP_total_info;?>'
					},
					xAxis: {
						categories: ['<?php echo $addCashP_cash; ?>', '<?php echo $addCashP_card; ?>']
					},
					yAxis: {
						
						title: {
							text: '<?php echo $addCashP_price_to.' '.$currency_name; ?>'
						}
					},
					tooltip: {
						formatter: function() {
							return ''+
								 this.series.name +': '+ this.y +'';
						}
					},
					credits: {
						enabled: false
					},
					series: [{
						name: '<?php echo $addCashP_sale; ?>',
						data: [<?php echo $tCashPrice; ?>,<?php echo $tCardPrice; ?>]
					}, ]
				});
				
				
			});
				
		</script>
        		<div id="container" style="width:300px; height:300px; margin:0 auto; direction:ltr"></div>

        </td></tr>
        <tr><td colspan="2" align="center">
        <?php echo $ghif_introduction; ?>
        <br />
        <?php $connector=new connection();
		if(!$connector->dbConnect()) echo 'Error No. 7';
		$query1="SELECT version FROM settings WHERE settingId=1";
		$result1=$connector->queryRun($query1);
		if(!$result1) echo 'Error No. 8';
		$row1=mysql_fetch_array($result1);
		echo $row1['version']; ?>
        </td></tr>
</table>
<script language="javascript" type="text/javascript">
	window.print();
	setTimeout("window.location='<?php echo $_SERVER['HTTP_REFERER']; ?>'",5000);
</script>
</body>
</html>
