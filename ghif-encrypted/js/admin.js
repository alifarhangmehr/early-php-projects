// JavaScript Document

function showDeleteDiv(id){
	//alert(id);
	document.getElementById('hiddenDeleteId').value=id;
	document.getElementById('deleteDiv').style.display="block";
	
}
function hideDeleteDiv(){
	document.getElementById('deleteDiv').style.display="none";
}