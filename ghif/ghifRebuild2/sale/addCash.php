<?php
session_start();
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->createPageHeader('addCash','m');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
$pageHeader->includeFile('modules/chart/js/highcharts.js');
$pageHeader->includeFile('modules/chart/js/modules/exporting.js');
$pageHeader->includeFile('modules/tinymce/jscripts/tiny_mce/tiny_mce.js');
$pageHeader->includeFile('js/txtAreaEditor.js');
$table=new table();

if(!isset($_POST['cashListId'])){
	echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'" name="addCash" id="addCash">
    <table border="0" align="center" cellpadding="5" cellspacing="5">
    	<tr><td align="center">'.$addCash_please_select_cash.'</td></tr>
        <tr><td align="center">
        <select name="cashListId">';		
		$connector=new connection();
		$query="SELECT * FROM cashlist";
		$result=$connector->queryRun($query);
        while($row=mysql_fetch_array($result))
            echo '<option value="'.$row['cashListId'].'">'.$row['cashName'].'</option>';
		echo '</select>      
			</td></tr>
			<tr><td align="center"><input type="submit" value="'.$addCash_select_cash_submit_value.'" /></td></tr>
			</table>';
	exit;
}
$cashListId=$_POST['cashListId'];
$tableName='cash';
$idColumnName='dateTo';
$dateFrom=$table->maxTableId($tableName,$idColumnName);
$dateFromSplit=str_split($dateFrom);
date_default_timezone_set('Asia/Tehran');
$dateTo=pdate(YmdHis);
$dateToSplit=str_split($dateTo);	
	
$connector=new connection();
$query="SELECT SUM(cash),SUM(card) FROM factor WHERE date>='$dateFrom' AND date<='$dateTo' AND cashListId='$cashListId' AND clear != 1 AND canceled != 1";
$result=$connector->queryRun($query);
$row=mysql_fetch_array($result);
$tCashPrice=$row['SUM(cash)'];
$tCardPrice=$row['SUM(card)'];



$query="SELECT SUM(price) FROM outgo WHERE date>='$dateFrom' AND date<='$dateTo' AND type='cash' AND cashListId='$cashListId' AND clear != 1";
$result=$connector->queryRun($query);
$row=mysql_fetch_array($result);
$outgoCashPrice=$row['SUM(price)'];

$query="SELECT SUM(price) FROM outgo WHERE date>='$dateFrom' AND date<='$dateTo' AND type='card' AND cashListId='$cashListId' AND clear != 1";
$result=$connector->queryRun($query);
$row=mysql_fetch_array($result);
$outgoCardPrice=$row['SUM(price)'];

$cashPrice2=$tCashPrice-$outgoCashPrice;
$tempCashId=$cashId-1;
$query="SELECT * FROM cash WHERE cashId='$tempCashId'";
$result=$connector->queryRun($query);
$row=mysql_fetch_array($result);
$currentCardPrice=$row['cardPrice'];
	

$cardPrice2=$currentCardPrice+$tCardPrice-$outgoCardPrice; // mojudi ghabli card ro migire



?>

<form method="post" action="addCashP.php">
<table align="center" width="500" border="0" dir="<?php echo $language_dir; ?>">
  <tr>
  	<td width="125" bgcolor="#CCCCCC"><?php echo $addCash_date_from; ?></td>
    <td bgcolor="#CCCCCC">
    <?php
	
	echo $dateFromSplit[0].$dateFromSplit[1].$dateFromSplit[2].$dateFromSplit[3].'/'.$dateFromSplit[4].$dateFromSplit[5].'/'.$dateFromSplit[6].$dateFromSplit[7].' <span style="color:#09F">'.$dateFromSplit[8].$dateFromSplit[9].':'.$dateFromSplit[10].$dateFromSplit[11].':'.$dateFromSplit[12].$dateFromSplit[13].'</span>';
	?>
    <input name="dateFrom" type="hidden" id="dateFrom" size="50" value="<?php echo $dateFrom; ?>" /></td>
  </tr>
   <tr>
   <td width="125" bgcolor="#CCCCCC"><?php echo $addCash_date_to; ?></td>
    <td bgcolor="#CCCCCC">
    <?php
	
	echo $dateToSplit[0].$dateToSplit[1].$dateToSplit[2].$dateToSplit[3].'/'.$dateToSplit[4].$dateToSplit[5].'/'.$dateToSplit[6].$dateToSplit[7].' <span style="color:#09F">'.$dateToSplit[8].$dateToSplit[9].':'.$dateToSplit[10].$dateToSplit[11].':'.$dateToSplit[12].$dateToSplit[13].'</span>';
	?>
    <input name="ِdateTo" type="hidden" id="dateTo" size="50" value="<?php echo $dateTo; ?>" /></td>
  </tr>
     <tr>
    <td width="125" bgcolor="#CCCCCC"><?php echo $addCash_amount_of_cash_sold; ?></td>
    <td bgcolor="#CCCCCC">
    <?php 
	echo $tCashPrice.' '.$currency_name;
	echo '<input type="hidden" name="tCashPrice" value="'.$tCashPrice.'" />';
	?>
  </tr>
   <tr>
    <td width="125" bgcolor="#CCCCCC"><?php echo $addCash_amount_of_card_sold; ?></td>
    <td bgcolor="#CCCCCC">
    <?php
	echo $tCardPrice.' '.$currency_name;
	echo '<input type="hidden" name="tCardPrice" value="'.$tCardPrice.'" />';
	?>
  </tr>
    <tr>
    <td width="125" bgcolor="#CCCCCC"><?php echo $addCash_cash_outgo; ?></td>
    <td bgcolor="#CCCCCC">
    <?php
	echo $outgoCashPrice.' '.$currency_name;
	echo '<input type="hidden" name="outgoCashPrice" value="'.$outgoCashPrice.'" />';
	?>
    
  </tr>
  
  
  
  <tr>
    <td width="125" bgcolor="#CCCCCC"><?php echo $addCash_card_outgo; ?></td>
    <td bgcolor="#CCCCCC">
    <?php
	echo $outgoCardPrice.' '.$currency_name;
	echo '<input type="hidden" name="outgoCardPrice" value="'.$outgoCardPrice.'" />';
	
	?>
    
    <input name="cashPrice" type="hidden" id="cashPrice" size="50" value="<?php echo ($cashPrice2+$tOrderDeposit2); ?>" />
    <input name="cardPrice" type="hidden" id="cardPrice" size="50" value="<?php echo $cardPrice2; ?>" />
    </td>
  </tr>
  
  
   <tr>
    <td width="125" bgcolor="#CCCCCC"><?php echo $addCash_cash_stock; ?></td>
    <td bgcolor="#CCCCCC">
    <?php
	echo $cashPrice2.' '.$currency_name;
	
	?>
    </td>
  </tr>
  
  
     <tr>
    <td width="125" bgcolor="#CCCCCC"><?php echo $addCash_card_stock; ?></td>
    <td bgcolor="#CCCCCC">
    <?php
	
	echo $cardPrice2.' '.$currency_name;
	
	?>
    </td>
  </tr>
  
  <tr>
    <td>
    
		<?php
		$connector=new connection();
		$query="SELECT * FROM cashlist WHERE cashListId='$cashListId'";
		$result=$connector->queryRun($query);
        $row = mysql_fetch_array($result);
        echo '<span style="color:royalblue; font-weight:bold">'.$row['cashName'].'</span>';
         ?>
    
    
    </td>
    <td width="125" ><?php $addCash_clearing_cash; ?></td>
  </tr>
    <td width="125" ><?php echo $addCash_cash_reciver; ?></td>
    <td>
    <select name="reciverEmployeId">
		<?php   
		$connector=new connection();
		$query="SELECT * FROM employes";
		$result=$connector->queryRun($query);
        while($row=mysql_fetch_array($result))
            echo '<option value="'.$row['employeId'].'">'.$row['name'].' '.$row['family'].'</option>';
        ?>
    </select>
    </td>
  </tr>
  <tr>
    <td width="125" bgcolor="#CCCCCC"><?php echo $addCash_password_of_cash_reciver; ?></td>
    <td bgcolor="#CCCCCC"><input type="password" name="pass" /></td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC" colspan="2"><?php echo $addCash_comments; ?></td>
  </tr>
   <tr>
    <td bgcolor="#CCCCCC" colspan="2"><textarea name="comments"></textarea></td>
  </tr>

   <tr>
    <td colspan="2" align="center">
    
    
    
  <?php
 // echo $cardPrice.'<br />';
 // echo $cashPrice.'<br />';
 // echo $outgoCardPrice.'<br />';
 // echo $outgoCashPrice.'<br />';
	$transactions=$tCardPrice+$tCashPrice+$outgoCardPrice+$outgoCashPrice;
	
	
	
	
	
	
  
  ?>  
    
    
    		<script type="text/javascript">
		
			var chart;
			$(document).ready(function() {
				chart = new Highcharts.Chart({
					chart: {
						renderTo: 'container',
						plotBackgroundColor: null,
						plotBorderWidth: null,
						plotShadow: false
					},
					title: {
						text: '<?php echo $addCash_cash_information; ?>'
					},
					tooltip: {
						formatter: function() {
							return '<b>'+ this.point.name +'</b>: '+ this.y +' %';
						}
					},
					plotOptions: {
						pie: {
							allowPointSelect: true,
							cursor: 'pointer',
							dataLabels: {
								enabled: false
							},
							showInLegend: true
						}
					},

				    series: [{
						type: 'pie',
						name: 'Browser share',
						data: [
							['<?php echo $addCash_amount_of_card_sold; ?>',   <?php echo round($tCardPrice/$transactions*100,2); ?>],
							['<?php echo $addCash_amount_of_cash_sold; ?>',    <?php echo round($tCashPrice/$transactions*100,2); ?>],
							['<?php echo $addCash_cash_outgo; ?>',   <?php echo round($outgoCashPrice/$transactions*100,2); ?>],
							['<?php echo $addCash_card_outgo; ?>',  <?php echo round($outgoCardPrice/$transactions*100,2); ?>]
						]
					}]
				});
			});
				
		</script>

    <div id="container" style="width:700px; height:400px; direction:ltr; margin:0 auto"></div>

    </td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" value="<?php echo $addCash_clearing_submit_value; ?>" /></td>
  </tr>
  
</table>
</fieldset>


</div>
</form>     
