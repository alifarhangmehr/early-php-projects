function changeLanguage(url)
{
	var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById('languageDiv').style.display="block";
		//document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
		var target=document.getElementById('ajaxLoader');
		var spinner= new Spinner(opts).spin(target);
		setTimeout("location.reload()",2000);
		}
	}
	xmlhttp.open("GET",url,true);
	xmlhttp.send();
}
function redirectPage(url)
{
	var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		var target=document.getElementById('ajaxLoader');
		var spinner=new Spinner(opts).spin(target);
		//alert(url);
		setTimeout(window.location=url,2000);
		}
	}
	xmlhttp.open("GET",url,true);
	xmlhttp.send();
}
function addPurchase(url)
{
	var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		//document.getElementById('languageDiv').style.display="block";
		document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
		//var target=document.getElementById('ajaxLoader');
		//var spinner= new Spinner(opts).spin(target);
		//setTimeout("location.reload()",2000);
		}
	}
	xmlhttp.open("GET",url,true);
	xmlhttp.send();
}
function deletePurchase(url)
{
	var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET",url,true);
	xmlhttp.send();
}