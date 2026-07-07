<?php
include('../language/'.$_SESSION['language'].'/'.$_SESSION['language'].'.php');
?>
<script language="javascript" type="text/javascript">
document.getElementById ('barcode').focus();
document.getElementById ('barcode').select();
function extraField(id){
	if(document.getElementById('checkbox'+id).checked)
		document.getElementById('factorExtraField'+id).disabled="";
	else
		document.getElementById('factorExtraField'+id).disabled="disabled";
}
function submitFactorForm(){
	document.getElementById('factorForm').submit();
}
function executeFunctionWithEnter(key,condition){
	if(key.keyCode == 13)
		addPurchaseInPage(condition);
}
function addPurchaseInPage(condition){
	barcode=document.getElementById('barcode').value;
	if(document.getElementsByName('factorId').length)
		factorId=document.getElementById('factorId').value;
	else
		factorId='';
	test=document.getElementById('storeId');
	storeId=test.options[test.selectedIndex].value;
	count=document.getElementById('count').value;
	price=document.getElementById('price').value;
	discount=document.getElementById('discount').value;
	if(condition=='add') url='addFactorA.php?barcode='+barcode+'&storeId='+storeId+'&count='+count+'&price='+price+'&discount='+discount+'&factorId='+factorId;
	
	else if(condition=='edit') url='editFactorA.php?barcode='+barcode+'&storeId='+storeId+'&count='+count+'&price='+price+'&discount='+discount+'&factorId='+factorId; 
	
	
	if(document.getElementById ('goodName').value=='' && document.getElementById ('barcode').value==''){
		document.getElementById ('goodName').style.border="2px solid red";
		document.getElementById ('goodName').placeholder="<?php echo $addFactor_fill_good_name; ?>";
		document.getElementById ('barcode').style.border="2px solid red";
		document.getElementById ('barcode').placeholder="<?php echo $addFactor_fill_barcode; ?>";
	}else{
		document.getElementById ('goodName').style.border="";
		document.getElementById ('goodName').placeholder="";
		document.getElementById ('barcode').style.border="";
		document.getElementById ('barcode').placeholder="";
		addPurchase(url);
	}
	document.getElementById ('goodName').value='';
	document.getElementById ('barcode').value='';
	document.getElementById ('count').value='';
	document.getElementById ('price').value='';
	document.getElementById ('discount').value='';
	document.getElementById ('barcode').focus();
	document.getElementById ('barcode').select();
}
function changeFactorAction(){
	if(document.getElementById('paperType').value='a4')
		document.getElementById('factorForm').action='addFactorA4P.php';
	else
		document.getElementById('factorForm').action='addFactorP.php';
}
function changeEditFactorAction(){
	if(document.getElementById('paperType').value='a4')
		document.getElementById('factorForm').action='editFactorA4P.php';
	else
		document.getElementById('factorForm').action='editFactorP.php';
}
</script>