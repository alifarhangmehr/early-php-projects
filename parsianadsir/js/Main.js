        $(document).ready(function () {	
            
            $('#btn').hover(
                function () {
                    $('ul', this).slideToggle(400);
        
                }, 
                function () {
                    $('ul', this).slideToggle(400);			
                }
            );
            
        });
