function copyFromFirstCheck(id){
	document.getElementById('checkAccountOwner'+id).value=document.getElementById('checkAccountOwner1').value;
	document.getElementById('bankName'+id).value=document.getElementById('bankName1').value;
	document.getElementById('bankBranch'+id).value=document.getElementById('bankBranch1').value;
	document.getElementById('accountNumber'+id).value=document.getElementById('accountNumber1').value;
	document.getElementById('checkSerial'+id).value=document.getElementById('checkSerial1').value;
	document.getElementById('checkMood'+id).value=document.getElementById('checkMood1').value;
	document.getElementById('exportDate'+id).value=document.getElementById('exportDate1').value;
	document.getElementById('deadlineDate'+id).value=document.getElementById('deadlineDate1').value;
	document.getElementById('price'+id).value=document.getElementById('price1').value;	 	 	 	 	 	 	 	 	 	 	
}