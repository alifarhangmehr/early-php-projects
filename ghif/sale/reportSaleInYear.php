<?php
session_start();
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->createPageHeader('reportSale','Q');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
$connector=new connection();
if(!$connector->dbConnect()) echo 'Error No. 7';
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<table align="center">
<tr>
	<td><input type="text" name="year" placeholder="<?php echo $reportSaleInYear_example; ?>" value="<?php echo $_POST['year']; ?>"></td>
	<td><input type="submit" value="<?php echo $reportSaleInYear_analyze; ?>" /></td>
</tr></table>
</form>
<?php
if(isset($_POST['year'])){
$setDate=$_POST['year'];
for($i=0;$i<12;$i++){
	if($i<10) $month='0'.$i; else $month=$i;
	$dateFrom=$setDate.$month.'00'.'000000';
	$dateTo=$setDate.$month.'99'.'999999';
	$query="SELECT SUM(cash)+SUM(card) FROM factor WHERE date>'$dateFrom' AND date<'$dateTo'";
	$result=$connector->queryRun($query);
	if(!$result) echo 'Error No.8';
	${'sale'.$i}=mysql_fetch_array($result);
	if(${'sale'.$i}['SUM(cash)+SUM(card)']=='') ${'sale'.$i}['SUM(cash)+SUM(card)']=0;
}
for($i=0;$i<12;$i++){
	if($i<10) $month='0'.$i; else $month=$i;
	$dateFrom=$setDate.$month.'00'.'000000';
	$dateTo=$setDate.$month.'99'.'999999';
	$query="SELECT SUM(price) FROM outgo WHERE date>'$dateFrom' AND date<'$dateTo'";
	$result=$connector->queryRun($query);
	if(!$result) echo 'Error No.8';
	${'outgo'.$i}=mysql_fetch_array($result);
	if(${'outgo'.$i}['SUM(price)']=='') ${'outgo'.$i}['SUM(price)']=0;
}
?>

		<script type="text/javascript" src="../js/jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="../modules/chart/js/highcharts.js"></script>
		<script type="text/javascript">
		
			var chart;
			$(document).ready(function() {
				chart = new Highcharts.Chart({
					chart: {
						renderTo: 'container',
						defaultSeriesType: 'spline'
					},
					title: {
						text: '<?php echo $reportSaleInYear_total_sale_in_year.' '.$_POST['year']; ?>'
					},
					subtitle: {
						text: '<?php echo $reportSaleInYear_total_sale_and_payment_in_year.' '.$_POST['year']; ?>'
					},
					xAxis: {
						categories: ['<?php echo $reportSaleInYear_first_month; ?>', '<?php echo $reportSaleInYear_second_month; ?>', '<?php echo $reportSaleInYear_third_month; ?>', '<?php echo $reportSaleInYear_fourth_month; ?>', '<?php echo $reportSaleInYear_fifth_month; ?>', '<?php echo $reportSaleInYear_sixth_month; ?>', '<?php echo $reportSaleInYear_seventh_month; ?>', '<?php echo $reportSaleInYear_eighth_month; ?>', '<?php echo $reportSaleInYear_ninth_month; ?>', '<?php echo $reportSaleInYear_tenth_month; ?>', '<?php echo $reportSaleInYear_eleventh_month; ?>', '<?php echo $reportSaleInYear_twelfth_month; ?>'] 
					},
					yAxis: {
						title: {
							text: '<?php echo $reportSaleInYear_price; ?>'
						},
						labels: {
							formatter: function() {
								return this.value 
							}
						}
					},
					tooltip: {
						crosshairs: true,
						shared: true
					},
					plotOptions: {
						spline: {
							marker: {
								radius: 4,
								lineColor: '#666666',
								lineWidth: 1
							}
						}
					},
					series: [{
						name: '<?php echo $reportSaleInYear_sale; ?>',
						marker: {
							symbol: 'square'
						},
						data: [<?php for($i=0;$i<12;$i++) if($i!=11) echo ${'sale'.$i}['SUM(cash)+SUM(card)'].', '; else echo ${'sale'.$i}['SUM(cash)+SUM(card)']; ?>]
						
					}, {
						name: '<?php echo $reportSaleInYear_payment; ?>',
						marker: {
							symbol: 'diamond'
						},
						data: [<?php for($i=0;$i<12;$i++) if($i!=11) echo ${'outgo'.$i}['SUM(price)'].', '; else echo ${'outgo'.$i}['SUM(price)']; ?>]
					}]
				});
				
				
			});
				
		</script>
		<div id="container" style="width:800px; height:400px; margin:0 auto; direction:ltr"></div>
<?php } ?>				
</body>
</html>
