<?php
session_start();
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->createPageHeader('addFactor','}');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
$table=new table();
$pageHeader->suggestion('data');
?>
<form method="post" action="addFactorP.php" id="factorForm">
<table border="0" cellspacing="3" cellpadding="0" align="center" dir="<?php echo $language_direction; ?>"  class="factorTable"   onkeypress="executeFunctionWithEnter(event,'add')">
  <tr class="addTableHeader">
    <th colspan="2" align="center"><?php echo $addFactor_table_title; ?></th>
  </tr>
  <tr class="addTableTd">
     <td width="148" align="right"><?php echo $addFactor_good_name; ?><br /><?php echo $addFactor_good_barcode; ?></td>
     <td width="154" align="right">
     <div class="ausu-suggest">
      <input name="goodName" type="text" class="factorGoodName" id="goodName" autocomplete="off" value="" size="30">
      <br />
      <input type="text" size="30" value="" name="barcode" id="barcode" autocomplete="off" />
    </div>
     </td>
    </tr>
<?php


$fieldName1[0][0]='count';
$fieldName1[1][0]='price';
$fieldName1[2][0]='discount';


$fieldName1[0][1]=$addFactor_good_count;
$fieldName1[1][1]=$addFactor_good_price;
$fieldName1[2][1]=$addFactor_good_discount;
$table->showAddTable($fieldName1);	
?>
<tr class="addTableTd">
 <td width="148" align="right"><?php echo $addFactor_oa_name; ?></td>
 <td width="154" align="right">
 <div class="ausu-suggest">
  <input type="text" size="30" value="" name="oaName" id="oaName" autocomplete="off" />
  <br />
  <input type="text" size="30" value="" name="oaId" id="oaId" autocomplete="off" style="display:none" />
</div>
 </td>
</tr>
<?php
		$connector=new connection();
		if(!$connector->dbConnect()) echo 'Error No. 7';
		$query="SELECT * FROM factorextra";
		$result=$connector->queryRun($query);
		if(!$result) echo 'Error No. 8';
		while($row=mysql_fetch_array($result)){
		  if($row['default']=='yes'){
			  $defaultCheck='checked="checked"';
			  $defaultDisable=''; 
		  }else{
			  $defaultCheck='';
			  $defaultDisable='disabled="disabled"'; 
		  }
		  if($row['priceType']=='static'){
			  $priceType=$addFactor_price_type_static;
		  }else if($row['priceType']=='percentage'){
			  $priceType=$addFactor_price_type_percentage;
		  }
		  echo '<tr class="addTableTd"><td dir="'.$language_dir.'">'.$row['factorExtraName'].'<input type="checkbox" id="checkbox'.$row['factorExtraId'].'" name="checkbox'.$row['factorExtraId'].'" '.$defaultCheck.' onchange="extraField('.$row['factorExtraId'].')" /><span style="font-size:10px">'.$priceType.'</span></td><td><input type="text" name="factorExtraField'.$row['factorExtraId'].'" id="factorExtraField'.$row['factorExtraId'].'" '.$defaultDisable.' /></td></tr>';	
		  
		}
        
        
        
        
    echo '
    <tr class="addTableTd">
    <td>'.$addFactor_good_storage.'</td>
    <td>';
		$connector=new connection();
		if(!$connector->dbConnect()) echo 'Error No. 7';
		$query="SELECT * FROM stores";
		$result=$connector->queryRun($query);
		if(!$result) echo 'Error No. 8';
		echo '<select name="storeId" id="storeId">';
		while($row=mysql_fetch_array($result)){
		  if($row['defaultStore']=='yes') $defaultStore='selected="selected"'; else $defaultStore='';
		  echo '<option value="'.$row['storeId'].'" '.$defaultStore.'>'.$row['storeName'].'</option>';
		}
	echo '</select></td></tr>';
	echo '<tr class="addTableTd">
		<td>'.$addFactor_good_print_paper_type.'</td>
		<td><select name="paperType" id="paperType" onchange="changeFactorAction()">
			<option value="a4">'.$addFactor_good_a4.'</option>
			<option value="roll" selected="selected">'.$addFactor_good_roll.'</option>
		</select>
		</td>
	</tr><tr class="addTableTd">
    <td colspan="2" align="center"><input type="button" value="'.$addFactor_submit_value.'" class="addTableBut" onclick="addPurchaseInPage(\'add\')" /></form></td></tr><tr><td colspan="2"><div id="myDiv">';

echo '</div></td></table>';
include('../js/factorJs.php'); //js file
?>
</body>
</html>
