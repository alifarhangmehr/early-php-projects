<?php
session_start();
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->createPageHeader('reportSale','R');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
$connector=new connection();
if(!$connector->dbConnect()) echo 'Error No. 7';
$table=new table();
$pageHeader->suggestion('data');
if(!isset($_POST['barcode'])){
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<table border="0" cellspacing="3" cellpadding="0" align="center" dir="<?php echo $language_direction; ?>" >
  <tr class="addTableHeader">
    <th colspan="2" align="center"><?php echo $reportSaleInWeek_good_choose; ?></th>
  </tr>
  <tr class="addTableTd">
     <td width="148" align="right"><?php echo $reportSaleInWeek_good_name; ?><br /><?php echo $reportSaleInWeek_good_barcode; ?></td>
     <td width="154" align="right">
     <div class="ausu-suggest">
      <input name="goodName" type="text" class="factorGoodName" id="goodName" autocomplete="off" value="" size="30">
      <br />
      <input type="text" size="30" value="" name="barcode" id="barcode" autocomplete="off" />
      <br />
      <input type="submit" value="<?php echo $reportSaleInWeek_anylize; ?>" />
    </div>
     </td>
    </tr>
  </table>
</form>
<?php
}else{
	$barcode=$_POST['barcode'];
	$query="SELECT goodId,goodName FROM goods WHERE barcode='$barcode'";
	$result=$connector->queryRun($query);
	$good=mysql_fetch_array($result);
	$goodId=$good['goodId'];
	date_default_timezone_set('Asia/Tehran');
	$day=pdate('w');
	$weekStart=pdate('Ymd', strtotime('-'.$day.' days'));
	$weekEnd=pdate('Ymd', strtotime('+'.(6-$day).' days'));
	
	$weekStart2=pdate('Y/m/d', strtotime('-'.$day.' days'));
	$weekEnd2=pdate('Y/m/d', strtotime('+'.(6-$day).' days'));


for($i=0;$i<7;$i++){
	$dateFrom=(pdate('Ymd', strtotime('+'.($i-$day).' days'))).'000000';
	$dateTo=(pdate('Ymd', strtotime('+'.($i-$day).' days'))).'999999';
	$query="SELECT SUM(cash)+SUM(card),SUM(count) FROM factor F, purchase P WHERE f.factorId=p.factorId and goodId='$goodId'  AND date>'$dateFrom' AND date<'$dateTo'";
	$result=$connector->queryRun($query);
	if(!$result) echo 'Error No.8';
	${'sale'.$i}=mysql_fetch_array($result);
	if(${'sale'.$i}['SUM(cash)+SUM(card)']=='') ${'sale'.$i}['SUM(cash)+SUM(card)']=0;
	if(${'sale'.$i}['SUM(count)']=='') ${'sale'.$i}['SUM(count)']=0;
	
}


$pageHeader->includeFile('js/jquery-1.3.2.min.js');
	
?>
		<script type="text/javascript" src="../modules/chart/js/highcharts.js"></script>
		<script type="text/javascript">
			var chart;
			$(document).ready(function() {
				chart = new Highcharts.Chart({
					chart: {
						renderTo: 'container',
						zoomType: 'xy'
					},
					title: {
						text: '<?php echo $reportSaleInWeek_sell_good.$good['goodName'].$reportSaleInWeek_in_week; ?>'
					},
					subtitle: {
						text: '<?php echo $reportSaleInWeek_sell_good.' '.$good['goodName'].$reportSaleInWeek_from.' '.$weekStart2.' '.$reportSaleInWeek_to.' '.$weekEnd2; ?>'
					},
					xAxis: [{
						categories: ['<?php echo $reportSaleInWeek_first_day; ?>', '<?php echo $reportSaleInWeek_second_day; ?>', '<?php echo $reportSaleInWeek_third_day; ?>', '<?php echo $reportSaleInWeek_fourth_day; ?>', '<?php echo $reportSaleInWeek_fifth_day; ?>', '<?php echo $reportSaleInWeek_sixth_day; ?>', '<?php echo $reportSaleInWeek_seventh_day; ?>']
					}],
					yAxis: [{ // Primary yAxis
						labels: {
							formatter: function() {
								return this.value +'<?php echo ' '.$currency_name; ?>';
							},
							style: {
								color: '#89A54E'
							}
						},
						title: {
							text: '<?php echo $reportSaleInWeek_sell; ?>',
							style: {
								color: '#89A54E'
							}
						}
					}, { // Secondary yAxis
						title: {
							text: '<?php echo $reportSaleInWeek_count; ?>',
							style: {
								color: '#4572A7'
							}
						},
						labels: {
							formatter: function() {
								return this.value;
							},
							style: {
								color: '#4572A7'
							}
						},
						opposite: true
					}],
					tooltip: {
						formatter: function() {
							return ''+
								this.x +': '+ this.y +
								(this.series.name == '<?php echo $reportSaleInWeek_count; ?>' ? ' ' : '<?php echo ' '.$currency_name; ?>');
						}
					},
					legend: {
						layout: 'vertical',
						align: 'left',
						x: 120,
						verticalAlign: 'top',
						y: 100,
						floating: true,
						backgroundColor: '#FFFFFF'
					},
					series: [{
						name: '<?php echo $reportSaleInWeek_count; ?>',
						color: '#4572A7',
						type: 'column',
						yAxis: 1,
						data: [<?php for($i=0;$i<7;$i++) if($i!=6) echo ${'sale'.$i}['SUM(count)'].', '; else echo ${'sale'.$i}['SUM(count)']; ?>]		
					
					}, {
						name: '<?php echo $reportSaleInWeek_sell; ?>',
						color: '#89A54E',
						type: 'spline',
						data: [<?php for($i=0;$i<7;$i++) if($i!=6) echo ${'sale'.$i}['SUM(cash)+SUM(card)'].', '; else echo ${'sale'.$i}['SUM(cash)+SUM(card)']; ?>]
					}]
				});
				
				
			});
				
		</script>
		
	</head>
	<body>
		
		<!-- 3. Add the container -->
		<div id="container" style="width:800px; height:400px; margin:0 auto; direction:ltr"></div>
	<?php } ?>	
				
	</body>
</html>
