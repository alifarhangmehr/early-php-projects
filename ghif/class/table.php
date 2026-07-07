<?php
class table{
	function showTable($fieldName1,$fieldName2,$fieldName3,$pageInfo,$tableConfig){
		include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
		$query=$pageInfo['query'];
		$pageNo=$pageInfo['pageNo'];
		$limit=$pageInfo['limit'];
		$tableName=$pageInfo['tableName'];
		$preName=$pageInfo['preName'];
		$fieldId=$pageInfo['fieldId'];
		$pageName=$pageInfo['pageName'];
		if(!isset($pageNo)) $pageNo=1;
		$connector=new connection();
		if(!$connector->dbConnect()) echo 'Error No. 7';
		$result=$connector->queryRun($query);
		if(!$result) echo 'Error No. 8';
		
		
		
		echo '<div id="outerDeleteDiv"><div id="deleteDiv" align="center"><br /><br />'.$table_show_delete_div_are_you_sure.'<br /><br /><form method="post" action="delete.php"><input type="submit" value="'.$table_show_delete_div_yes.'" class="deleteDivBut" /><input type="hidden" id="hiddenDeleteId" name="hiddenDeleteId" /><input type="hidden" name="hiddenFieldId" value="'.$fieldId.'" /><input type="hidden" name="hiddenTableName" value="'.$tableName.'" />&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="'.$table_show_delete_div_no.'" onclick="hideDeleteDiv()" class="deleteDivBut" /></form><br /><br /></div></div>';
		
		
		
		echo '<table border="0" cellpadding="2" cellspacing="1" width="100%" dir="'.$language_direction.'" class="showTable">';
		echo '<tr class="showTableHeader">';
		echo '<th class="tdwidth">'.$table_table_number.'</th>';
    	for($i=0;$i<count($fieldName1);$i++){
			echo '<th>'.$fieldName1[$i][1].'</th>';	
			
		}
		for($i=0;$i<count($fieldName2);$i++){
			echo '<th>'.$fieldName2[$i][1].'</th>';	
			
		}
		for($i=0;$i<count($fieldName3);$i++){
			echo '<th>'.$fieldName3[$i][1].'</th>';	
			
		}
		if($pageName=='showFactor'){
			echo '<th>'.$table_cancell_factor.'</th>';
			echo '<th>'.$table_edit_table.'</th>';
			echo '</tr>';
		}//exclusive static
		
		if($tableConfig['delete']==true) echo '<th>'.$table_delete_table.'</th>';
		if($tableConfig['edit']==true) echo '<th>'.$table_edit_table.'</th>';
		echo '</tr>';
		
		$counter=0;
		while($row=mysql_fetch_array($result)){
			$counter++;
			if($pageName=='showFactor' && $row['canceled']==1) $trBgColor=' style="background:#ffae11 !important"'; else $trBgColor='';
			echo '<tr class="showTableTr"'.$trBgColor.'>';
			echo '<td>'.((($pageNo-1)*$limit)+$counter).'</td>';
			for($i=0;$i<count($fieldName1);$i++){
				echo '<td>'.$row[$fieldName1[$i][0]].'</td>';
			
			}//static
			
			for($i=0;$i<count($fieldName2);$i++){
				echo '<td>'.$row[$fieldName2[$i][0]].'</td>';	
			}//dynamic
			
			
			
			
			if($pageName=='showGood'){
			if(strlen(strval($row['barcode']))==7){
			echo '<td class="tdwidthBarcode" align="center"><form method="post" action="printBarcode.php">
					<input type="hidden" name="goodId" id="goodId" value="'.$row['goodId'].'" />
					<input type="hidden" name="sendPage" id="sendPage" value="showGood" />
					<table border="0" cellpadding="0" cellspacing="0">
					<tr><td>
					<input type="text" name="count" size="1" />
					</td>
					<td><input type="image" src="../themes/'.$_SESSION['theme'].'/images/barcodeIcon1.png" align="middle" width="50px" height="40px" style="border:hidden" />
					</td></tr></table>
					</form></td>';
			}else{
				echo '<td></td>';
			}
			echo '<td align="center" class="tdwidth"><a href="showInventoryDetails.php?goodId='.$row['goodId'].'"><img src="../themes/'.$_SESSION['theme'].'/images/boxIcon1.png" style="border:hidden"></a></td>';
		
		}//optional
		if($pageName=='showOa'){
			if($row[$fieldName3[$i][0]]=='real')
				echo '<td>'.$table_oa_real.'</td>';
			else if($row[$fieldName3[$i][0]]=='legal')
				echo '<td>'.$table_oa_legal.'</td>';
			else
				echo '<td>'.$row[$fieldName3[$i][0]].'</td>';
			echo '<td class="tdwidthBarcode" align="center"><form method="post" action="accountTurnover.php">
					<input type="hidden" name="oaId" id="oaId" value="'.$row['oaId'].'" />
					<input type="hidden" name="sendPage" id="sendPage" value="showOa" />
					<table border="0" cellpadding="0" cellspacing="0">
					<tr><td><input type="image" src="../themes/'.$_SESSION['theme'].'/images/paperIcon.png" align="middle" width="50px" height="40px" style="border:hidden" />
					</td></tr></table>
					</form></td>';	
			}//optional
		
		if($pageName=='showFactor'){
			if($row[$fieldName3[0][0]]=='1')
				echo '<td>'.$showFactor_factor_type_sale.'</td>';
			else if($row[$fieldName3[0][0]]=='2')
				echo '<td>'.$showFactor_factor_type_purchase.'</td>';
			
		}//optional
		if($pageName=='showAccount'){
			$accountId=$row['accountId'];
			$query2="SELECT * FROM checks WHERE accountId='$accountId'";
			$result2=$this->ifValueExist($query2);
		
			if($result2)
				echo '<td><a href="showCheck.php?accountId='.$row['accountId'].'"><img src="../themes/'.$_SESSION['theme'].'/images/checkIcon1.png" alt="" width="40px" height="40px" /></a></td>';
			else
				echo '<td><a href="addCheck.php?accountId='.$row['accountId'].'"><img src="../themes/'.$_SESSION['theme'].'/images/plusIcon1.png" alt="" width="40px" height="40px" /></a></td>';
			
		}//optional
		
		
		
		
		if($pageName=='showStore'){
			if($row[$fieldName3[0][0]]=='yes')
				echo '<td><a href="'.$_SERVER['PHP_SELF'].'" ><img src="../themes/'.$_SESSION['theme'].'/images/yesIcon.png" alt="" height="30px" width="30px" /></a></td>';
			else if($row[$fieldName3[0][0]]=='')
				echo '<td><a href="'.$_SERVER['PHP_SELF'].'?default='.$row['storeId'].'" ><img src="../themes/'.$_SESSION['theme'].'/images/addIcon3.png" alt="" height="30px" width="30px" /></a></td>';
			
		}//optional
		
		if($pageName=='showFactorExtra'){
			if($row[$fieldName3[0][0]]=='percentage')
				echo '<td>'.$showFactorExtra_percentage.'</td>';
			else if($row[$fieldName3[0][0]]=='static')
				echo '<td>'.$showFactorExtra_static.'</td>';
			if($row[$fieldName3[1][0]]=='yes')
				echo '<td>'.$showFactorExtra_default_yes.'</td>';
			else if($row[$fieldName3[1][0]]=='no')
				echo '<td>'.$showFactorExtra_default_no.'</td>';
		}//optional
		if($pageName=='showOutgo'){
			if($row[$fieldName3[0][0]]=='cash')
				echo '<td>'.$showOutgo_type_cash.'</td>';
			else if($row[$fieldName3[0][0]]=='card')
				echo '<td>'.$showOutgo_type_card.'</td>';
			
		}//optional
		if($pageName=='showBackup'){
			$date=$row['date'];
			echo '<td><a href="../backup/'.$date[0].$date[1].$date[2].$date[3].'-'.$date[4].$date[5].'-'.$date[6].$date[7].'_'.$date[8].$date[9].'-'.$date[10].$date[11].'-'.$date[12].$date[13].'.zip"><img src="../themes/'.$_SESSION['theme'].'/images/saveIcon.png" alt="" width="40px" height="40px" /></a></td>';
			
		}//optional
		if($pageName=='addFactor'){
			
			echo '<td><img src="../themes/'.$_SESSION['theme'].'/images/removeIcon1.png" onclick="deletePurchase(\'deletePurchaseA.php?factorId='.$row['factorId'].'&purchaseId='.$row['purchaseId'].'\')" style="cursor:pointer" /></td>';
		}//optional
		if($pageName=='editFactor'){
			
			echo '<td><img src="../themes/'.$_SESSION['theme'].'/images/removeIcon1.png" onclick="deletePurchase(\'deleteEditPurchaseA.php?factorId='.$row['factorId'].'&purchaseId='.$row['purchaseId'].'\')" style="cursor:pointer" /></td>';
		}//optional
		if($pageName=='showCustomer'){
				echo '<td><img src="'.$row['photoSource'].'" alt="" width="40px" height="40px" /></td>';
			
		}//optional
		if($pageName=='showFactor'){
			if($row['clear']==1){
				echo '<td align="center" class="tdwidth">Cleared</td>';
				echo '<td align="center" class="tdwidth">Cleared</td>';
			}else{
				if($row['canceled']==1){
					echo '<td align="center" class="tdwidth"><img src="../themes/'.$_SESSION['theme'].'/images/yesIcon1.png" onclick="showUnCancelFactorDiv(\''.$row[$fieldId].'\')" style="border:hidden; cursor:pointer" title="'.$table_uncancel_factor_title.'" /></td>';
					echo '<td align="center" class="tdwidth">Canceled</td>';
					}else{
					echo '<td align="center" class="tdwidth"><img src="../themes/'.$_SESSION['theme'].'/images/removeIcon1.png" onclick="showCancelFactorDiv(\''.$row[$fieldId].'\')" style="border:hidden; cursor:pointer" title="'.$table_cancel_factor_title.'" /></td>';
					echo '<td align="center" class="tdwidth"><form method="post" action="edit'.$pageInfo['preName'].'.php"><input type="hidden" name="'.$fieldId.'" id="'.$fieldId.'" value="'.$row[$fieldId].'" /><input type="image" src="../themes/'.$_SESSION['theme'].'/images/editIcon1.png" style="border:hidden" /></form></td>';
					}
				}
		echo '</tr>';
			}//exclusive static
		
		if($tableConfig['delete']==true)
				echo '<td align="center" class="tdwidth"><img src="../themes/'.$_SESSION['theme'].'/images/removeIcon1.png" onclick="showDeleteDiv(\''.$row[$fieldId].'\')" style="border:hidden; cursor:pointer" /></td>';
			if($tableConfig['edit']==true)
				echo '<td align="center" class="tdwidth" valign="bottom"><form method="post" action="edit'.$pageInfo['preName'].'.php"><input type="hidden" name="'.$fieldId.'" id="'.$fieldId.'" value="'.$row[$fieldId].'" /><input type="image" src="../themes/'.$_SESSION['theme'].'/images/editIcon1.png" style="border:hidden" /></td></form>';
			}
echo '</tr>';
	}

	function insertIntoTable($columns,$values,$tableName,$idColumnName){
		if($idColumnName!=false){
		$id=$this->maxTableId($tableName,$idColumnName);
			$query='INSERT INTO '.$tableName.'(`';
			for($i=(-1);$i<count($columns);$i++){
				if($i==(-1)) $query.=$idColumnName.'`,`';
				else if(($i+1)<count($columns)) $query.=$columns[$i].'`,`';
				else $query.=$columns[$i].'`) VALUES (';
			}
			for($i=(-1);$i<count($values);$i++){
				if($i==(-1) ) $query.=$id.',';
				else if(($i+1)<count($values)) $query.='"'.$values[$i].'",';
				else $query.='"'.$values[$i].'")';
				
			}
		}else{
			$query='INSERT INTO '.$tableName.'(`';
			for($i=1;$i<=count($columns);$i++){
				if($i<count($columns)) $query.=$columns[$i-1].'`,`';
				else $query.=$columns[$i-1].'`) VALUES (';
			}
			for($i=1;$i<=count($values);$i++){
				if($i<count($values)) $query.='"'.$values[$i-1].'",';
				else $query.='"'.$values[$i-1].'")';
			}
		}
		$connector=new connection();
		if(!$connector->dbConnect()) echo 'Error No. 7';
		$result=$connector->queryRun($query);
		if(!$result){ echo 'Error No. 546'; return false;}
		else return($id); 
		

	}
	
	function maxTableId($tableName,$idColumnName){
		$connector=new connection();
		if(!$connector->dbConnect()) echo 'Error No. 7';
		$query='SELECT MAX('.$idColumnName.') FROM '.$tableName;
		$result=$connector->queryRun($query);
		if(!$result) echo 'Error No. 8';
		$row=mysql_fetch_array($result);
		$id=$row['MAX('.$idColumnName.')']+1;
		return $id;

	
		
	}
	function tableCount($query){
		$connector=new connection();
		$result=$connector->queryRun($query);
		$count=mysql_num_rows($result);
		return $count;
	}
	
	function paging($query,$pageName,$limit){
		$count=$this->tableCount($query);
		if($_GET['limits']!='') {if($_GET['limits']==1) $limits=0; if($_GET['limits']!=1) $limits=($_GET['limits']-1)*$limit;} else $limits=0;

		
		$query.=' LIMIT '.$limits.','.$limit;
		$pageNo=round($count/$limit, 0);
		if($count>$pageNo*$limit) $pageNo=round($count/$limit, 0)+1;
		$pageInfo['query']=$query;
		$pageInfo['pageNo']=$_GET['limits'];
		$pageInfo['limit']=$limit;
		
		
		echo '<link rel="stylesheet" href="../modules/beneverard-jqPagination/css/jqpagination.css" />
				<script src="../modules/beneverard-jqPagination/js/jquery-1.7.2.min.js"></script>
				<script src="../modules/beneverard-jqPagination/js/jquery.jqpagination.js"></script>
				<script src="../modules/beneverard-jqPagination/js/scripts.js"></script>
				<script src="../modules/beneverard-jqPagination/demo/js/demo.js"></script>
				<div class="gigantic pagination" style="direction:ltr">
				<a href="#" class="first" data-action="first">&laquo;</a>
				<a href="#" class="previous" data-action="previous">&lsaquo;</a>
				<input type="text" readonly="readonly" data-current-page="'.$_GET['limits'].'" data-max-page="'.$pageNo.'" />
				<a href="#" class="next" data-action="next">&rsaquo;</a>
				<a href="#" class="last" data-action="last">&raquo;</a>
				</div>
				<script language="javascript" type="text/javascript">
				$(".pagination").jqPagination({
					paged: function(page) {
						window.location = "'.$pageName.'.php?limits="+page;
					}
				});
				</script>';
		
		return $pageInfo;
	}
	function searchTable($search,$query,$show_count,$show_placeholder,$pageInfo){
		include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
		$pageName=$pageInfo['pageName'];
		if($search!='') {
			$searchValue=$search;
			$placeholder='';
		}else{
			$searchValue='';
			$placeholder=' placeholder="'.$show_placeholder.'"';
		}
		$count=$this->tableCount($query);
		echo '<table border="0" cellpadding="5" cellspacing="2" dir="'.$language_direction.'" class="searchBox">
		<form method="get" action="'.$pageName.'.php">
		  <tr>
			<td><input type="image" src="../themes/'.$_SESSION['theme'].'/images/searchIcon1.png" /></td>
			<td><input type="search" name="search" class="searchInput" value="'.$searchValue.'"'.$placeholder.' /></td> 
		</form>
		<br /><span style="color:#669900"></span></td>
		<td><span class="showAllspan">'.$show_count.' :</span>
		'.$count.'</td>';
		if($pageInfo['addItem']){
		echo '
			<td><a href="add'.$pageInfo['preName'].'.php"><img src="../themes/'.$_SESSION['theme'].'/images/addIcon1.png" /></a></td>
			<td><a href="add'.$pageInfo['preName'].'.php">'.$table_add_item.'</a></td>';
		}
		echo '</tr></table>';
	}
	function showAddTable($fieldName){
		for($i=0;$i<count($fieldName);$i++){
			echo '<tr class="addTableTd"><td>'.$fieldName[$i][1].'</td>';
			echo '<td><input type="text" name="'.$fieldName[$i][0].'" id="'.$fieldName[$i][0].'" /></td></tr>';	
			
		}
	}
	function updateTable($updateField,$tableName,$condition){
		$query='UPDATE  '.$tableName.' SET ';
		for($i=0;$i<count($updateField);$i++){
			if($i<(count($updateField)-1)) $query.=' `'.$updateField[$i][0].'` = "'.$updateField[$i][1].'" , ';
			else $query.=' `'.$updateField[$i][0].'` = "'.$updateField[$i][1].'"';
		}
		$query.=' WHERE '.$condition;
		$connector=new connection();
		if(!$connector->dbConnect()) echo 'Error No. 7';
		$result=$connector->queryRun($query);
		if(!$result){
			echo 'Error No. 8';
			return false;		
		}else return true;
	}
	function ifValueExist($query){
			$connector=new connection();
			if(!$connector->dbConnect()) echo 'Error No. 7';
			$result=$connector->queryRun($query);
			if(!$result) echo 'Error No. 8';
			$row=mysql_fetch_array($result);
			if(mysql_num_rows($result)>0) return $row;
			else return false;
	}
	function showEditTable($fieldName,$fieldValue){
		for($i=0;$i<count($fieldName);$i++){
			echo '<tr class="editTableTd"><td>'.$fieldName[$i][1].'</td>';
    		echo '<td><input name="'.$fieldName[$i][0].'" type="text" id="'.$fieldName[$i][0].'" value="'.$fieldValue[$i].'" size="50" /></td></tr>';
 
			
		}
		echo '';
	}
}
?>