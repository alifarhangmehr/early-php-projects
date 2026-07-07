/***************************/
//@Author: Adrian "yEnS" Mato Gondelle & Ivan Guardado Castro
//@website: www.yensdesign.com
//@email: yensamg@gmail.com
//@license: Feel free to use it, but keep this credits please!					
/***************************/

$(document).ready(function(){
	//global vars
	var inputUser = $("#nick");
	var inputMessage = $("#message");
	var loading = $("#loading");
	var messageList = $(".content > ul");
	
	//functions
	function updateShoutbox(){
		//just for the fade effect
		messageList.hide();
		loading.fadeIn();
		//send the post to shoutbox.php
		$.ajax({
			type: "POST", url: "shoutbox.php", data: "action=update",
			complete: function(data){
				loading.fadeOut();
				messageList.html(data.responseText);
				messageList.fadeIn(2000);
			}
		});
	}
	//check if all fields are filled
	function checkForm(){
		if(inputUser.attr("value") && inputMessage.attr("value"))
			return true;
		else
			return false;
	}
	
	//Load for the first time the shoutbox data
	updateShoutbox();
	
	//on submit event
	$("#form").submit(function(){
		if(checkForm()){
			var nick = inputUser.attr("value");
			var message = inputMessage.attr("value");
			//we deactivate submit button while sending
			$("#send").attr({ disabled:true, value:"Sending..." });
			$("#send").blur();
			//send the post to shoutbox.php
			$.ajax({
				type: "POST", url: "shoutbox.php", data: "action=insert&nick=" + nick + "&message=" + message,
				complete: function(data){
					messageList.html(data.responseText);
					updateShoutbox();
					//reactivate the send button
					$("#send").attr({ disabled:false, value:"ارسال" });
					//document.getElementById('message').value='';
					//var text_input = document.getElementById ('message');
					//text_input.focus ();
				//	text_input.select ();
				}
			 });
		}
		else alert("لطفا پیغام را وارد نمایید");
		//we prevent the refresh of the page after submitting the form
		return false;
	});
});