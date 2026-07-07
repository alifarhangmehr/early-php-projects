//************************************************//
//        Programer name : Ali Farhangmehr        //
//        email : ali.farhangmehr@gmail.com       //
//                November 2009                   //
//************************************************//
	var idFlag=0;
	var passFlag=0;
	var nameFlag=0;
	var familyFlag=0;
	var emailFlag=0;
	var postalCodeFlag=0;
	var adreesFlag=0;
function formValidation(){
	var l=document.form1.elements.length;
	for(i=0;i<l-1;i++){
	myId=document.getElementById('id').value;
	myIdlength=document.getElementById('id').value.length;
	
	//start id validation
	
	if(myId!==""){
		if(myIdlength<=5){
			document.getElementById('tempId').innerHTML='<div align=center><font size=-2 color="orange" style="font-family:Tahoma">این کادر باید حداقل سامل 6 حرف یاشد</font></div>';
			document.getElementById('id').style.border="1px solid royalblue";
			idFlag=0;
		}else{
			document.getElementById('tempId').innerHTML='<div align=center><font size=-2 color="green" style="font-family:Tahoma">کادر به درستی تکمیل شده</font></div>';
			document.getElementById('id').style.border="2px solid #9C0";
			idFlag=1;
		}
	}else{
		document.getElementById('tempId').innerHTML='<div align=center><font size=-2 color="red" style="font-family:Tahoma">لطفا این کادر را تکمیل کنید</font></div>';
		document.getElementById('id').style.border="1px solid royalblue";
		idFlag=0;
	}
	
	//end of id validation
	//start password validation
	
	myPass=document.getElementById('pass').value;
	myPasslength=document.getElementById('pass').value.length;
	temp=myPass;
	//document.getElementById('showPass').value=temp;
	if(myPass!==""){
		if(myPasslength>=6){
			document.getElementById('passTd').innerHTML='<div align=center><font size=-2 color="green" style="font-family:Tahoma">کادر به درستی تکمیل شده</font></div>';
			document.getElementById('pass').style.border="2px solid #9C0";
			passFlag=1;
		}else{
			document.getElementById('passTd').innerHTML='<div align=center><font size=-2 color="orange" style="font-family:Tahoma">این کادر باد حداقل شامل 6 حرف باشد</font></div>';
			document.getElementById('pass').style.border="1px solid royalblue";
			passFlag=0;
			}
		
		}else{
			document.getElementById('passTd').innerHTML='<div align=center><font size=-2 color="red" style="font-family:Tahoma">لطفا این کادر را تکمیل کنید</font></div>';
			document.getElementById('pass').style.border="1px solid royalblue";
			passFlag=0;
			}
			
	//end of password validation
	//start email validation
	
	if(document.getElementById('email').value==""){
		document.getElementById('emailTd').innerHTML='<div align=center><font size=-2 color="red" style="font-family:Tahoma">لطفا این کادر را تکمیل کنید</font></div>';
		document.getElementById('email').style.border="1px solid royalblue";
		emailFlag=0;
	}else{
			var emailValue=document.getElementById('email').value;
			var emailE='^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$';
			if(!emailValue.match(emailE)){ 
			document.getElementById('emailTd').innerHTML='<div align=center><font size=-2 color="#FF9900" style="font-family:Tahoma">فرم ایمیل صحیح نمیباشد</font></div>';
			document.getElementById('email').style.border="1px solid royalblue";
			emailFlag=0;
			}else{
				document.getElementById('emailTd').innerHTML='<div align=center><font size=-2 color="green" style="font-family:Tahoma">کادر به درستی تکمیل شده</font></div>';
				document.getElementById('email').style.border="2px solid #9C0";
				emailFlag=1;
			}
	}

	//end of email validation

	}

}
function showCover(){
	document.getElementById('coverDiv').style.display="block";
	
	document.getElementById('idTdCheck').innerHTML=document.getElementById('id').value;
	document.getElementById('hiddenId').value=document.getElementById('id').value;

	document.getElementById('passTdCheck').innerHTML=document.getElementById('pass').value;
	document.getElementById('hiddenPass').value=document.getElementById('pass').value;
	

	document.getElementById('emailTdCheck').innerHTML=document.getElementById('email').value;
	document.getElementById('hiddenEmail').value=document.getElementById('email').value;
	

}
function finalFormValidate(){
	if(idFlag && passFlag && emailFlag ==1){
	showCover()
	}else{
		document.getElementById('alertDiv').style.display="block";
	}
}
function correction(){
	document.getElementById('coverDiv').style.display="none";
	
}
function sendForm(){
	
}
function closeAlertDiv(){
	document.getElementById('alertDiv').style.display="none";
	
}