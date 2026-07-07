
//**************** editNews.php *********************
function hideBriefDiv(){
	//document.getElementById('briefDiv').style.display="none";
	document.getElementById('briefDiv').style.visibility="hidden";	
}

function showBriefDiv(id){
	//document.getElementById('briefDiv').style.display="block";
	//briefInsertHTML(id);
	document.getElementById('briefDiv').style.visibility="visible";
	
	
	document.getElementById('newsBriefBodyTd').innerHTML=document.getElementById('briefHideDiv'+id).innerHTML;
	
	
	
	
	//alert(document.getElementById('briefHideDiv'+id).innerHTML);																			//document.getElementById('hideNewsBrief').value=document.getElementById('briefHideDiv'+id).innerHTML;
	document.getElementById('hideNewsBrief').innerHTML=document.getElementById('briefHideDiv'+id).innerHTML;
	
	document.getElementById('briefId').value=id;
			
	
	
	
	
	
	//document.getElementById('briefId').value=id;
	
	
	//alert('34');
}




function showNewsBodyDiv(id){
	document.getElementById('newsBodyDiv').style.display="block";
	//newsBodyInsertHTML(id);

	document.getElementById('fullNewsBodyTd').innerHTML=document.getElementById('newsBodyHideDiv'+id).innerHTML;
	
	
	
	
	//alert(document.getElementById('briefHideDiv'+id).innerHTML);																			//document.getElementById('hideNewsBrief').value=document.getElementById('briefHideDiv'+id).innerHTML;
	document.getElementById('hideNewsBody').innerHTML=document.getElementById('newsBodyHideDiv'+id).innerHTML;
	//alert(document.getElementById('newsBodyHideDiv'+id).innerHTML);
	
	document.getElementById('newsId').value=id;
}




function closeNewsBodyDiv(){
	document.getElementById('newsBodyDiv').style.display="none";
}

function showEditDiv(id){
	document.getElementById('editDiv').style.display="block";
	//document.getElementById('editDiv').style.visibility="visable";
	autoEditDivFill(id);
}
function hideEditDiv(){
	document.getElementById('editDiv').style.display="none";
	//document.getElementById('editDiv').style.visibility="hidden";
}
function autoEditDivFill(id){
	//document.getElementById('newsGroup').value="test";
	//alert(id);
	document.getElementById('newsId').value=document.getElementById('newsIdDiv'+id).innerHTML;
	document.getElementById('newsGroup').value=document.getElementById('newsGroupTd'+id).innerHTML;
	document.getElementById('author').value=document.getElementById('authorTd'+id).innerHTML;
	document.getElementById('accessLevel').value=document.getElementById('accessLevelTd'+id).innerHTML;
	document.getElementById('newsTitle').value=document.getElementById('newsTitleTd'+id).innerHTML;
	//alert(id);
	
	//document.getElementById('newsBodyId').value=id;
	//alert(id);
	document.getElementById('briefId').value=id;
	
	document.getElementById('editId').value=id;
	
	
}

function showModifiedDetailsDiv(id){
	//alert(id);
	
	document.getElementById('lastModifiedDetailsDiv').style.display="block";
	document.getElementById('lastOneModifiedTd').innerHTML=document.getElementById('lastOneModified'+id).innerHTML;
	document.getElementById('lastDateModifiedTd').innerHTML=document.getElementById('lastDateModified'+id).innerHTML;
	document.getElementById('lastDateFAModifiedTd').innerHTML=document.getElementById('lastDateFAModified'+id).innerHTML;
	document.getElementById('lastDateENModifiedTd').innerHTML=document.getElementById('lastDateENModified'+id).innerHTML;
	document.getElementById('lastTimeModifiedTd').innerHTML=document.getElementById('lastTimeModified'+id).innerHTML;







}
function hideModifiedDetailsDiv(){
	document.getElementById('lastModifiedDetailsDiv').style.display="none";

}





//**************** deleteNews.php *********************


function showDeleteNewsDiv(id){
	//alert(id);
	document.getElementById('deleteNewsDiv').style.display="block";
	document.getElementById('deleteId').value=id;

}

function hideDeleteNewsDiv(){
	
	document.getElementById('deleteNewsDiv').style.display="none";

}



//************************ userComments.php ********************************

function showCBodyDiv(id){
	document.getElementById('cBodyDiv').style.display="block";
	document.getElementById('hideCBodyTd').innerHTML='<br />'+document.getElementById('hideCBody'+id).innerHTML;
}
function hideCBodyDiv(){
	document.getElementById('cBodyDiv').style.display="none";
}



function showDeleteCommentsDiv(id){
	document.getElementById('deleteCommentId').value=id;
	document.getElementById('deleteOP').value='op3';
	document.getElementById('deleteNewsDiv').style.display="block";
}


function hideDeleteCommentDiv(){
	document.getElementById('deleteNewsDiv').style.display="none";
}

function showMsgTextDiv(id){
	document.getElementById('msgReplyDiv').style.display="none";
	document.getElementById('msgTextDiv').style.display="block";
	document.getElementById('replyId').value=id;
	document.getElementById('replyId2').value=id;
	document.getElementById('replyId3').value=id;
	
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
function msgReply(){
	document.getElementById('msgTextDiv').style.display="none";
	document.getElementById('msgReplyDiv').style.display="block";
	
}
function hideReplyDiv(){
	document.getElementById('msgReplyDiv').style.display="none";
}


function showAdminAwnserDiv(id){
	document.getElementById('adminAwnserDiv').style.display="block";
	document.getElementById('adminAwnserTd').innerHTML='<br /><br />'+document.getElementById('hideAdminAwnserDiv'+id).innerHTML;
	
}






function hideAdminAwnserDiv(){
	document.getElementById('adminAwnserDiv').style.display="none";
}





function showAdminAwnserTimeDiv(id){
	//alert(id);
	document.getElementById('adminAwnserTimeDiv').style.display="block";
	
	document.getElementById('awnserDateTd').innerHTML=document.getElementById('hideAdminAwnserFullDateDiv'+id).innerHTML;
	document.getElementById('awnserDateFATd').innerHTML=document.getElementById('hideAdminAwnserDateENDiv'+id).innerHTML;
	document.getElementById('awnserDateENTd').innerHTML=document.getElementById('hideAdminAwnserDateFADiv'+id).innerHTML;
	document.getElementById('awnserTimeTd').innerHTML=document.getElementById('hideAdminAwnserTimeDiv'+id).innerHTML;








}












function hideAdminAwnserTimeDiv(){
	document.getElementById('adminAwnserTimeDiv').style.display="none";
}




















