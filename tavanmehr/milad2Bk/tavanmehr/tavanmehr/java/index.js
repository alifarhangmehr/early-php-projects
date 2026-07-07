// JavaScript Document
function showDeletePatientDiv(id){
	//alert(id);
	document.getElementById('hiddenDeletePatientId').value=id;
	document.getElementById('deleteDiv').style.display="block";
	
}
function hideDeletePatientDiv(){
	//alert('23');
	document.getElementById('deleteDiv').style.display="none";
}

function showDeleteEmployeeDiv(id){
	//alert(id);
	document.getElementById('hiddenDeletEemployeeId').value=id;
	document.getElementById('deleteDiv').style.display="block";
	
}
function hideDeleteEmployeeDiv(){
	document.getElementById('deleteDiv').style.display="none";
}






function showDeleteDiv(id){
	//alert(id);
	document.getElementById('hiddenDeleteId').value=id;
	document.getElementById('deleteDiv').style.display="block";
	
}
function hideDeleteDiv(){
	document.getElementById('deleteDiv').style.display="none";
}