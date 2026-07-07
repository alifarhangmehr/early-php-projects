function showMsgTextDiv(id){
	document.getElementById('msgTextDiv').style.display="block";
	//alert(id);
	msgTextInsertHTML(id);
}

function hideMsgTextDiv(){
	document.getElementById('msgTextDiv').style.display="none";	
}


function msgTextInsertHTML(id){
	//document.getElementById('newsGroup').value="test";
	//alert('d');

	document.getElementById('msgTextTd').innerHTML='<br /><br />'+document.getElementById('hideMsgTextDiv'+id).innerHTML;

}


function showAdminAwnserDiv(id){
	document.getElementById('adminAwnserDiv').style.display="block";
	document.getElementById('adminAwnserTd').innerHTML='<br /><br />'+document.getElementById('hideAdminAwnserDiv'+id).innerHTML;	
}



function hideAdminAwnserDiv(){
	document.getElementById('adminAwnserDiv').style.display="none";	
	
}






