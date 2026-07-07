<?php
session_start();
$_SESSION['cashListId']=1; //flag
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->createPageHeader('editOutgo','!');
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
$pageHeader->includeFile('modules/tinymce/jscripts/tiny_mce/tiny_mce.js');
$pageHeader->includeFile('js/txtAreaEditor.js');

date_default_timezone_set('asia/tehran');
$pdateTo=pdate(YmdHis);

$table=new table();
$pageHeader->suggestion('data');

$connector=new connection();
if(!$connector->dbConnect()) echo 'Error No. 7';

if(isset($_POST['employeId2'])){
$employeId2=$_POST['employeId2'];
$query1="SELECT pass FROM employes WHERE employeId='$employeId2'";
$result1=$connector->queryRun($query1);
if(!$result1) echo 'Error No. 8';
$row1=mysql_fetch_array($result1);
if(md5($_POST['employePass'])==$row1['pass']){
		
$updateField[0][0]='cashListId';	
$updateField[1][0]='employeId';
$updateField[2][0]='date';
$updateField[3][0]='factorSerial';
$updateField[4][0]='type';
$updateField[5][0]='price';
$updateField[6][0]='comments';
$updateField[0][1]=$_POST['cashListId'];
$updateField[1][1]=$employeId2;
$updateField[2][1]=$pdateTo;
$updateField[3][1]=$_POST['factorNumber'];
$updateField[4][1]=$_POST['type'];
$updateField[5][1]=$_POST['price'];
$updateField[6][1]=$_POST['comments'];
$tableName='outgo';
$condition='outgoId='.$_POST['outgoId'];
$table->updateTable($updateField,$tableName,$condition);
echo '<p align="center" class="addMsg">'.$editOutgo_successfully_edited_message.'</p>';
echo '<script language="javascript" type="text/javascript"> redirectPage("showOutgo.php"); </script>';
}else echo '<p align="center" style="color:#D00">'.$editOutgo_wrong_pass.'</p>';
}
?>










<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" id="outgoForm">
<input type="hidden" name="outgoId" value="<?php echo $_POST['outgoId']; ?>" />
<table border="0" cellspacing="3" cellpadding="0" align="center" dir="<?php echo $language_direction; ?>"  class="addTable" width="550px">
  <tr class="addTableHeader">
    <th colspan="2" align="center"><?php echo $editOutgo_title ?></th>
  </tr>
<?php
$cashListId=$_SESSION['cashListId'];
$employeId=$_SESSION['adminId'];
$fieldName1[0][0]='factorNumber';
$fieldName1[1][0]='price';
$fieldName1[0][1]=$editOutgo_factor_number;
$fieldName1[1][1]=$editOutgo_price;

$outgoId=$_POST['outgoId'];
$query="SELECT * FROM outgo WHERE outgoId='$outgoId'";
$connector=new connection();
if(!$connector->dbConnect()) echo 'Error No. 7';
$result=$connector->queryRun($query);
$row=mysql_fetch_array($result);

if($row['type']=='card'){
	$typeDefault1='selected="selected"';
	$typeDefault2='';
}else{$typeDefault1='';
	$typeDefault2='selected="selected"';}

$fieldValue[0]=$row['factorSerial'];
$fieldValue[1]=$row['price'];

$table->showEditTable($fieldName1,$fieldValue);

$employeId=$_SESSION['adminId'];
$query2="SELECT * FROM employes";
$result2=$connector->queryRun($query2);
if(!$result2) echo 'Error No. 8';

    echo '
	<tr>
   		<td>'.$editOutgo_employe_name.'</td>
    	<td>
			<select name="employeId2" id="employeId2" style="width: 120px">';
				while($row2=mysql_fetch_array($result2)){
					$employeIdTmp=$row2['employeId'];
					if($employeIdTmp==$employeId)
						$selected='selected="selected"';
					else $selected='';
					echo '<option value="'.$employeIdTmp.'" '.$selected.'>'.$row2['name'].' '.$row2['family'].'</option>';
				}
			echo '
			</select>
			<input type="hidden" name="cashListId" id="cashListId" value="'.$cashListId.'" />
		</td>
	</tr>
	<tr>
		<td>'.$editOutgo_employe_pass.'</td>
		<td><input type="password" name="employePass" id="employePass" /></td>
	</tr>
    <tr>
   		<td>'.$editOutgo_type.'</td>
    	<td><select name="type" id="type" style="width:70px">
				<option value="card"'.$typeDefault1.'>'.$editOutgo_type_card.'</option>
			  	<option value="cash"'.$typeDefault2.'>'.$editOutgo_type_cash.'</option>
			</select>
		</td>
	</tr>
	<tr>
   		<td colspan="2">'.$editOutgo_comments.'</td>
    </tr>
	<tr>
		<td colspan="2">
			<textarea name="comments" id="comments">'.$row['comments'].'</textarea>
		</td>
	</tr>
	<tr class="addTableTd">
    	<td colspan="2" align="center"><input type="submit" value="'.$editOutgo_submit.'" class="addTableBut" />
		</td>
	</tr></table>
	</form>';
?>

</body>
</html>
