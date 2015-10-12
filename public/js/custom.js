/*!
 * P3 Home - Project
 * Michael Depaula
 * Custom js
 */
 

 
 	function toggle(sel){
		// selectors
		var p = sel + " p:eq(1)";
		var ul = sel + " ul";
		var span = sel + " span:eq(0)";
		var fig = sel + " figure";
		var thb = sel + " .thumbnail";		
		
		// hover function
		$(sel).hover(function(){
			$(p).fadeIn(500);
			$(ul).fadeIn(500);
			//$(fig).css('opacity', 0.9); 
			//$(thb).css('background-color', '#e2edf0');
			//$(span).animate({'margin-top': '10px'}).clearQueue().finish();
		}, function(){ 
			$(p).fadeOut(500); 
			$(ul).fadeOut(500); 
			//$(fig).css('opacity', 1);
			//$(thb).css('background-color', '#ffffff');
			//$(span).animate({'margin-top': '10px'}).clearQueue().finish();
		});
	}
	

	// special characters array 	
	var symbols = ["@", "-", "#", "$", "_", "!", "~", ",", "|", ":", ";"];
 
 	//	assigns special delimiters on click
 	function symbol(sel, slave, symbol){

		// symbol function
		$(sel).click(function(){
			$(slave).val(symbol);
		}); 
	}
	
	// loops through all special delimiters (large/small devices)
	function run_symbols()
	{
		for (i = 0; i < symbols.length; i++) { 
    		symbol('#'+$("#special button:eq("+[i]+")").attr('id'), '#delimiter',symbols[[i]]);
			symbol('#'+$("#special1 button:eq("+[i]+")").attr('id'), '#delimiter1',symbols[[i]]);
		}	
	}
	
	// validate number input fields (second check at client level)
	function validate(sel, slave, param, param1)
	{
		$(sel).keyup(function(){
			if($(sel).val() == 0 || isNaN($(sel).val()) == true)
			{
				$(slave).addClass(param).removeClass(param1);
			}
			else
			{
				$(slave).addClass(param1).removeClass(param);
			}
		})				
	}

 // load custom
	$(document).ready(function(){

		// load custom
		
		// validate word input
		validate("#words", "#words-group","has-error", "has-success");
		validate("#words", "#generate","disabled", "");
		
		// validate word input mobile
		validate("#words1", "#words-group1","has-error", "has-success");
		validate("#words1", "#generate1","disabled", "");		
		

		// execute special delimiters
		run_symbols();

		// animation 
		document.getElementById('anim1').innerHTML = "0.1011010010100101"; 
		
		setInterval(function(){ 
			var x = Math.random();
			document.getElementById('anim1').innerHTML = x; 
		}, 500);		 	
	});