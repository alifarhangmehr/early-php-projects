$(function(){
	
	// container is the DOM element;
	// userText is the textbox
	
	var container = $("#container")
		userText = $('#userText'); 
	
	// Shuffle the contents of container
	container.shuffleLetters();

	// Bind events
	userText.click(function () {
		
	  userText.val("");
	  
	}).bind('keypress',function(e){
		
		if(e.keyCode == 13){
			
			// The return key was pressed
			
			container.shuffleLetters({
				"text": userText.val()
			});
			
			userText.val("");
		}

	}).hide();

	// Leave a 4 second pause

	setTimeout(function(){
		
		// Shuffle the container with custom text
		container.shuffleLetters({
			"text": "This software designed by Ali Farhangmehr You can email me ali.farhangmehr@gmail.com or call me 98353839766 Thanks to all who have supported me in this : Mrs Fateme Farahani , Mr Kiarash Kusari , Mr Sorush Mashal , Miss Farnaz Hadavand , Mr Arash Kashkuli . I wish LUCK for everyone of you @};- ."
		});
		
		
	},4000);
	
});

