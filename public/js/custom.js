/*!
 * P3 Home - Project
 * Michael Depaula
 * Custom js
 */
 
	// TEXT GENERATOR
	// input checks
 	function getID()
	{
		$("#text").keyup(function(){
			if( $("#text").val() == 0 ) 
			{
					document.getElementById('generate').disabled = true;
					document.getElementById('view').disabled = true;
					document.getElementById('view1').disabled = true;
			}
			else
			{
					document.getElementById('generate').disabled = false;
					document.getElementById('view').disabled = false;
					document.getElementById('view1').disabled = false;			
			}
		});
	}
	
	
	// selecting data types
	function getTextSelection(sel, paragraph)
	{
		// select text in modal
		$(sel).click(function(){
			var text = document.getElementById(paragraph);
			text.select();
			alert('Do not forget to copy with Ctrl+C (Win), Command+C (Mac)');
		});		
	}



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
	

	
 // load custom
$(document).ready(function(){

	// input check
	getID();
	
	
	// switching data types
		getTextSelection('#copy', 'paragraph');
		getTextSelection('#copy1', 'paragraph1');
		
	
	$("#viewDeft").click(function(){
		$("#copy1").addClass( "hidden");
		$("#copy").removeClass( "hidden");;
		$("#modal-body1").addClass( "hidden");
		$("#modal-body").removeClass( "hidden");

	});
	
	$("#viewJson").click(function(){
		$("#copy").addClass( "hidden");		
		$("#copy1").removeClass( "hidden");		
		$("#modal-body").addClass( "hidden");
		$("#modal-body1").removeClass( "hidden" );

	});
		 	
});