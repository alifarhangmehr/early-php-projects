<?php
session_start();
$_SESSION['cashListId']=1; //flag
include('../class/pageHeader.php');
$pageHeader=new pageHeader();
$pageHeader->includeFile('js/jquery-1.3.2.min.js');
$pageHeader->createPageHeader('addOutgo','q');
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
$query1="SELECT * FROM employes WHERE employeId='$employeId2'";
$result1=$connector->queryRun($query1);
if(!$result1) echo 'Error No. 8';
$row1=mysql_fetch_array($result1);
if(md5($_POST['employePass'])==$row1['pass']){
		
$columns[0]='cashListId';	
$columns[1]='employeId';
$columns[2]='date';
$columns[3]='factorSerial';
$columns[4]='type';
$columns[5]='price';
$columns[6]='comments';
$values[0]=$_POST['cashListId'];
$values[1]=$employeId2;
$values[2]=$pdateTo;
$values[3]=$_POST['factorNumber'];
$values[4]=$_POST['type'];
$values[5]=$_POST['price'];
$values[6]=$_POST['comments'];
$tableName='outgo';
$idColumnName='outgoId';
$table->insertIntoTable($columns,$values,$tableName,$idColumnName);
echo '<p align="center" class="addMsg">'.$addOutgo_successfully_added_message.'</p>';
echo '<script language="javascript" type="text/javascript"> redirectPage("showOutgo.php"); </script>';
}else echo '<p align="center" style="color:#D00">'.$addOutgo_wrong_pass.'</p>';
}
?>

















<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" id="outgoForm">
<table border="0" cellspacing="3" cellpadding="0" align="center" dir="<?php echo $language_direction; ?>"  class="addTable" width="550px">
  <tr class="addTableHeader">
    <th colspan="2" align="center"><?php echo $addOutgo_title ?></th>
  </tr>
<?php
echo $cashListId=$_SESSION['cashListId'];
$fieldName1[0][0]='factorNumber';
$fieldName1[1][0]='price';
$fieldName1[0][1]=$addOutgo_factorNumber;
$fieldName1[1][1]=$addOutgo_price;

$table->showAddTable($fieldName1);	

$employeId=$_SESSION['adminId'];
$query2="SELECT * FROM employes";
$result2=$connector->queryRun($query2);
if(!$result2) echo 'Error No. 8';

    echo '
	<tr>
   		<td>'.$addOutgo_employe_name.'</td>
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
		<td>'.$addOutgo_employe_pass.'</td>
		<td><input type="password" name="employePass" id="employePass" /></td>
	</tr>
    <tr>
   		<td>'.$addOutgo_type.'</td>
    	<td><select name="type" id="type" style="width:70px">
				<option value="card">'.$addOutgo_type_card.'</option>
			  	<option value="cash">'.$addOutgo_type_cash.'</option>
			</select>
		</td>
	</tr>
	<tr>
   		<td colspan="2">'.$addOutgo_comments.'</td>
    </tr>
	<tr>
		<td colspan="2">
			<textarea name="comments" id="comments"></textarea>
		</td>
	</tr>
	<tr class="addTableTd">
    	<td colspan="2" align="center"><input type="submit" value="'.$addOutgo_submit.'" class="addTableBut" />
		</td>
	</tr></table>
	</form>';
?>

</body>
</html>
