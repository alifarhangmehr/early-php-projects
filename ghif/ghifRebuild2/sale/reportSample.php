<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>نمونه گزارش ها</title>
<link rel="shortcut icon" href="../themes/favicon.ico" type="image/x-icon">
<link rel="icon" href="../themes/favicon.ico" type="image/x-icon">
</head>
<body>
<?php include('../general/premiumVersion.php'); ?>
		<script type="text/javascript" src="../js/jquery-1.3.2.min.js"></script>
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
						text: 'فروش کالا خودکار بیک در هفته'
					},
					subtitle: {
						text: 'فروش کالای خودکار بیک از <?php echo $weekStart2; ?> تا <?php echo $weekEnd2; ?>'
					},
					xAxis: [{
						categories: ['شنبه', 'یک شنبه', 'دو شنبه', 'سه شنبه', 'چهارشنبه', 'پنج شنبه', 'جمعه']
					}],
					yAxis: [{ // Primary yAxis
						labels: {
							formatter: function() {
								return this.value +' ريال';
							},
							style: {
								color: '#89A54E'
							}
						},
						title: {
							text: 'فروش',
							style: {
								color: '#89A54E'
							}
						}
					}, { // Secondary yAxis
						title: {
							text: 'تعداد',
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
								(this.series.name == 'تعداد' ? ' ' : ' ريال');
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
						name: 'تعداد',
						color: '#4572A7',
						type: 'column',
						yAxis: 1,
						data: [3, 3, 4, 1, 5, 11, 9]		
					
					}, {
						name: 'فروش',
						color: '#89A54E',
						type: 'spline',
						data: [70250, 81800, 88000, 27000, 127500, 282800, 243000]
					}]
				});
				
				
			});
		
			var chart;
			$(document).ready(function() {
				chart = new Highcharts.Chart({
					chart: {
						renderTo: 'container2',
						defaultSeriesType: 'column'
					},
					title: {
						text: 'فروش در هفته به تفکیک نقدی و کارت'
					},
					xAxis: {
						categories: ['شنبه', 'یک شنبه', 'دو شنبه', 'سه شنبه', 'چهارشنبه', 'پنج شنبه', 'جمعه']
					},
					yAxis: {
						min: 0,
						title: {
							text: 'فروش در هفته'
						}
					},
					legend: {
						align: 'right',
						x: -100,
						verticalAlign: 'top',
						y: 20,
						floating: true,
						backgroundColor: '#FFFFFF',
						borderColor: '#CCC',
						borderWidth: 1,
						shadow: false
					},
					tooltip: {
						formatter: function() {
							return '<b>'+ this.x +'</b><br/>'+
								 this.series.name +': '+ this.y +'<br/>'+
								 'Total: '+ this.point.stackTotal;
						}
					},
					plotOptions: {
						column: {
							stacking: 'normal'
						}
					},
				    series: [{
						name: 'نقد',
						data: [1500000, 250000, 1280000, 3590000, 3200000, 1780000, 980000]
					}, {
						name: 'کارت',
						data: [1000000, 1700000, 450000, 1630000, 2510000, 3200000, 650000]
					}]
				});
				
				
			});
			var chart;
			$(document).ready(function() {
				chart = new Highcharts.Chart({
					chart: {
						renderTo: 'container3',
						margin: [50, 0, 0, 0],
						plotBackgroundColor: 'none',
						plotBorderWidth: 0,
						plotShadow: false				
					},
					title: {
						text: 'پرفروش ترین محصولات ماه بهمن و اسفند'
					},
					subtitle: {
						text: 'پرفروش ترین محصولات بهمن و اسفند ماه 1393'
					},
					tooltip: {
						formatter: function() {
							return '<b>'+ this.series.name +'</b><br/>'+ 
								this.point.name +': '+ this.y +' %';
						}
					},
				    series: [{
						type: 'pie',
						name: 'بهمن',
						size: '45%',
						innerSize: '20%',
						data: [
							{ name: 'top notch 3B', y: 45.0, color: '#4572A7' },
							{ name: 'top notch 2A', y: 26.8, color: '#AA4643' },
							{ name: 'top notch 2B', y: 12.8, color: '#89A54E' },
							{ name: 'english interactive books', y: 8.5, color: '#80699B' },
							{ name: 'خاطرات علی امینی', y: 6.2, color: '#3D96AE' },
							{ name: 'مجموعه اشعار محمد علی بهمنی', y: 0.2, color: '#DB843D' }
						],
						dataLabels: {
							enabled: false
						}
					}, {
						type: 'pie',
						name: '2010',
						innerSize: '45%',
						data: [
							{ name: 'top notch 3B', y: 30.0, color: '#4572A7' },
							{ name: 'top notch 2A', y: 34.8, color: '#AA4643' },
							{ name: 'top notch 2B', y: 17.8, color: '#89A54E' },
							{ name: 'english interactive books', y: 6.5, color: '#80699B' },
							{ name: 'خاطرات علی امینی', y: 8.2, color: '#3D96AE' },
							{ name: 'مجموعه اشعار محمد علی بهمنی', y: 2.2, color: '#DB843D' }
						],
						dataLabels: {
							enabled: true,
							color: '#000000',
							connectorColor: '#000000'
						}
					}]
				});
				
				
			});
			var chart;
			$(document).ready(function() {
				chart = new Highcharts.Chart({
					chart: {
						renderTo: 'container4',
						defaultSeriesType: 'spline',
						marginRight: 10,
						events: {
							load: function() {
				
								// set up the updating of the chart each second
								var series = this.series[0];
								setInterval(function() {
									var x = (new Date()).getTime(), // current time
										y = Math.random()*100000;
									series.addPoint([x, y], true, true);
								}, 1000);
							}
						}
					},
					title: {
						text: 'نمایش اطلاعات فروش به صورت زنده'
					},
					subtitle: {
						text: 'مخصوص فروشگاه های بزرگ و پرفروش'
					},
					xAxis: {
						type: 'datetime',
						tickPixelInterval: 150
					},
					yAxis: {
						title: {
							text: 'فروش'
						},
						plotLines: [{
							value: 0,
							width: 1,
							color: '#808080'
						}]
					},
					tooltip: {
						formatter: function() {
				                return '<b>'+ this.series.name +'</b><br/>'+
								Highcharts.dateFormat('%Y-%m-%d %H:%M:%S', this.x) +'<br/>'+ 
								Highcharts.numberFormat(this.y, 2);
						}
					},
					legend: {
						enabled: false
					},
					exporting: {
						enabled: false
					},
					series: [{
						name: 'فروش',
						data: (function() {
							// generate an array of random data
							var data = [],
								time = (new Date()).getTime(),
								i;
							for (i = -19; i <= 0; i++) {
								data.push({
									x: time + i * 1000,
									y: Math.random()*100000
								});
							}
							return data;
						})()
					}]
				});
				
				
			});
			var chart;
			$(document).ready(function() {
				chart = new Highcharts.Chart({
					chart: {
						renderTo: 'container5',
						defaultSeriesType: 'bar'
					},
					title: {
						text: 'فروش در هفته به تفکیک صندوق ها'
					},
					xAxis: {
						categories: ['شنبه', 'یک شنبه', 'دو شنبه', 'سه شنبه', 'چهارشنبه', 'پنج شنبه', 'جمعه']
					},
					yAxis: {
						min: 0,
						title: {
							text: 'فروش'
						}
					},
					legend: {
						backgroundColor: '#FFFFFF',
						reversed: true
					},
					tooltip: {
						formatter: function() {
							return ''+
								 this.series.name +': '+ this.y +'';
						}
					},
					plotOptions: {
						series: {
							stacking: 'normal'
						}
					},
				        series: [{
						name: 'صندوق اصلی',
						data: [1500000, 250000, 1280000, 3590000, 3200000, 1780000, 980000]
					}, {
						name: 'صندوق طبفه دوم',
						data: [2300000, 460000, 280000, 2590000, 1200000, 780000, 1060000]
					}, {
						name: 'صندوق راهرو',
						data: [3500000, 1250000, 2080000, 4090000, 4000000, 1280000, 560000]
					}]
				});
				
				
			});
			var chart;
			$(document).ready(function() {
				chart = new Highcharts.Chart({
					chart: {
						renderTo: 'container6',
						defaultSeriesType: 'column'
					},
					title: {
						text: 'فروش - خرید - هزینه در سال 1393'
					},
					xAxis: {
						categories: ['فروردین', 'اردیبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور', 'مهر', 'آبان', 'آذر', 'دی', 'بهمن', 'اسفند']
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
						name: 'فروش',
						data: [13560000, 14590000, 9850000, 21260000, 20060000, 18900000, 7890000, 8690000, 9030000, 9500000, 17000000, 35500000]
					}, {
						name: 'خرید',
						data: [7560000, 7590000, 5050000, 11260000, 10600000, 9900000, 4890000, 4690000, 5030000, 4500000, 8000000, 15500000]
					}, {
						name: 'هزینه',
						data: [-5600000, -900000, -8500000, -2600000, -6000000, -8900000, -8900000, -900000, -300000,-5000000, -7000000, -5000000]
					}]
				});
				
				
			});
		</script>
		
		
		<!-- 3. Add the container -->
		<div id="container" style="width:800px; height:400px; margin:0 auto; direction:ltr"></div>
        <div id="container2" style="width:800px; height:400px; margin:0 auto; direction:ltr"></div>
        <div id="container3" style="width:800px; height:400px; margin:0 auto; direction:ltr"></div>
        <div id="container4" style="width:800px; height:400px; margin:0 auto; direction:ltr"></div>
        <div id="container5" style="width:800px; height:400px; margin:0 auto; direction:ltr"></div>
        <div id="container6" style="width:800px; height:400px; margin:0 auto; direction:ltr"></div>
				
	</body>
</html>
