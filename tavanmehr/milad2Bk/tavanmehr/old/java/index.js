// JavaScript Document
function showDeletePatientDiv(id){
	//alert(id);
	document.getElementById('hiddenDeletePatientId').value=id;
	document.getElementById('deleteDiv').style.display="block";
	
}
function hideDeleteDiv(){
	document.getElementById('deleteDiv').style.display="none";
}