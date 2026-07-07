// JavaScript Document
function showDeleteGoodDiv(id){
	//alert(id);
	document.getElementById('hiddenDeleteGoodId').value=id;
	document.getElementById('deleteDiv').style.display="block";
	
}
function hideDeleteGoodDiv(){
	//alert('23');
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