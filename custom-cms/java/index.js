
function showNewsBody(serial){
	//alert('ejra shod');
	newsId="hideNewsBody"+serial;
	imageId="hideNewsImage"+serial;
	//alert('ejra shod');
	//document.getElementById('newsBody').value=document.getElementById('id').value ;
	//alert('ejra shod');
	document.getElementById('newsBody').style.display="block";
	//document.getElementById('newsBody').innerHTML=id;
	document.getElementById('fullNewsTd').innerHTML = document.getElementById(newsId).innerHTML;
	//alert('ejra shod');
	document.getElementById('fullNewsTitleTd').innerHTML = document.getElementById('newsTitleTd'+serial).innerHTML;
	imageSrc=document.getElementById(imageId).innerHTML;
	//alert(imageSrc);
	document.getElementById('fullNewsImage').innerHTML = '<img src='+imageSrc+' />';
	newsAuthor=document.getElementById('newsAuthor'+serial).innerHTML;
	//alert(newsAuthor);
	newsDateFA=document.getElementById('newsDateFA'+serial).innerHTML;
	newsDateEN=document.getElementById('newsDateEN'+serial).innerHTML;
	newsTime=document.getElementById('newsTime'+serial).innerHTML;

	
	//alert(newsAuthor);
	whoAndWhen='نوشته شده توسط <a style="color:#FC0">'+newsAuthor+'</a> در تاریخ '+newsDateFA+' شمسی و <a style="color:#FC0">'+newsDateEN+'</a> میلادی در ساعت <a style="color:#FC0">'+newsTime+'</a>' ;
	
	document.getElementById('whoAndWhenTd').innerHTML=whoAndWhen;
	
}
function hideNewsBody(){
	document.getElementById('newsBody').style.display="none";
	
}
	
function showCommentsDiv(id){
	document.getElementById('newsId').value=id;
	//document.getElementById('commentsDiv').style.display="block";
	// cuz of using wysiwyg = visibility
	document.getElementById('commentsDiv').style.visibility="visible";
	
	document.getElementById('commetnsTitleTd').innerHTML ='ثبت نظر برای "'+document.getElementById('hideNewsTitle'+id).innerHTML+'"';
	//alert('visiable');
	
	
	
	
	
	
	
	
	//document.getElementById('testTd').innerHTML='<textarea name="cBody" cols="45" rows="15" id="cBody"></textarea>';
	
	
	
	
	
	
	
	//alert(cId);
	//alert(document.getElementById('cName'+cId).innerHTML);
	//document.getElementById('cAuthor').innerHTML=document.getElementById('cName'+cId).innerHTML;
	//document.getElementById('cDate').innerHTML=document.getElementById('cDate'+cId).innerHTML;
	//document.getElementById('cBody').innerHTML=document.getElementById('cBody'+cId).innerHTML;
	//alert(document.getElementById('cEmailAndSite'+cId).innerHTML);
	//document.getElementById('CEmailAndWebPage').innerHTML=document.getElementById('cEmailAndSite'+cId).innerHTML;
	//document.getElementById('cWebPage').innerHTML=document.getElementById('').innerHTML;
	//alert(document.getElementById('commentsBodyDiv'+id).innerHTML);
	
	document.getElementById('commentsTd').innerHTML =  document.getElementById('commentsBodyDiv'+id).innerHTML;
	//document.getElementById('test1').value =  document.getElementById('commentsTable'+id).innerHTML;
	
	
	//document.write(document.getElementById('commentsTd').innerHTML);
	//alert(document.getElementById('commentsTable'+id).innerHTML);
	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}

function fontPlus(id){
	//alert('d');
	document.getElementById('newsBriefTd'+id).style.fontSize="22px";
}


function fontNormal(id){
	//alert('d');
	document.getElementById('newsBriefTd'+id).style.fontSize="16px";
}
function fontMin(id){
	//alert('d');
	document.getElementById('newsBriefTd'+id).style.fontSize="12px";
}
function hideCommentsDiv(){
	//document.getElementById('commentsDiv').style.display="none";
	document.getElementById('commentsDiv').style.visibility="hidden";
	//alert('hidden');
}

function changeColor(id,colorCode){
	//alert(colorCode);
	document.getElementById('newsBriefTd'+id).style.color=colorCode;
}
function hideChangeColor(id){
	//alert('test ok');
	document.getElementById('colorToolTipDiv'+id).style.display="none";
	
}

function toolTipShow(e){
	
	var flag=2;
	
	if (window.event)
	
	{
	//code for ie
	var obj=window.event.srcElement;
	//alert(obj.style.posLeft);
	myX=window.event.clientX;
	myY=window.event.clientY;

	obj.childNodes[1].style.display="block";
	var divW=obj.childNodes[1].offsetWidth;
	//alert(divW);
	temp1=myX+divW;
	if(myX<=(divW/2+5)){
		flag=1;
	}else if((temp1)>=screen.width){
		flag=3;
	}
	//alert(flag);
	switch(flag){
	case 1:
	myX=myX;
	break;
	case 2:
	myX=myX-(divW/2);
	break;
	case 3:
	myX=myX-divW;
	break;
	//default: 
	//document.write("enter number (1-7)");
	}
	//alert("adad"+temp1+"arze safe"+screen.width);
	/*if((temp1)>=screen.width){
		myX=myX-divW;
	}
	window.status=myX+" , "+myY;
	//alert(myX+" , "+myY);
	//window.status*/
	obj.childNodes[1].style.left=myX;
	
	
	} 
	
	else
	
	{
	
	//code for firefox
	
	var obj=e.target; 
	myX=e.pageX;
	myY=e.pageY;
	//alert(myX);
	obj.childNodes[1].style.display="block";
	var divW2=obj.childNodes[1].offsetWidth;
	//alert(divW);
	temp1=myX+divW2;
	//alert("adad"+temp1+"arze safe"+screen.width);
	if((temp1)>=screen.width){
		myX=myX-divW2;
	}
	//alert(myX);
	obj.childNodes[1].style.left=myX+"px";
	}
	//alert(myX);
	
	
	
	//document.getElementById(id).style.backgroundColor=document.getElementById(obj.id).bgColor;
	
	//var myDiv=e.childNodes.item(1).innerText;
	//alert(myDiv);
	//e.style.color="green";
	//alert(e.id);
	//var myDiv=e.firstChild.nodeValue;
	//alert(myDiv);
	//alert(divName);
	//var obj=document.getElementById(divName);
	//obj.style.display="block";
	//obj.style.backgroundColor="royalblue";
	
}

function toolTipHide(e){
	if (window.event)
	
	{
	
	//code for ie
	
	var obj=window.event.srcElement;
	
	
	} 
	
	else
	
	{
	
	//code for firefox
	
	var obj=e.target; 
	}
	
	obj.childNodes[1].style.display="none";
	
	
	
	
}



































