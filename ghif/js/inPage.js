// JavaScript Document

function showDeleteDiv(id){
	document.getElementById('hiddenDeleteId').value=id;
	document.getElementById('deleteDiv').style.display="block";
}
function hideDeleteDiv(){
	document.getElementById('deleteDiv').style.display="none";
}
function showCancelFactorDiv(id){
	document.getElementById('hiddenCancelId').value=id;
	document.getElementById('cancelDiv').style.display="block";
}
function hideCancelFactorDiv(){
	document.getElementById('cancelDiv').style.display="none";
}
function showUnCancelFactorDiv(id){
	document.getElementById('hiddenUnCancelId').value=id;
	document.getElementById('unCancelDiv').style.display="block";
}
function hideUnCancelFactorDiv(){
	document.getElementById('unCancelDiv').style.display="none";
}