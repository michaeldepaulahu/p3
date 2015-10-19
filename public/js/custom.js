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
	
	// showing modals
	function replaceClass(id, b1, b2, b3, m1, m2, m3)
	{
		$(id).click(function(){
			$(b1).addClass("hidden");
			$(b2).addClass("hidden");		
			$(b3).removeClass("hidden");
			$(m1).addClass("hidden");
			$(m2).addClass("hidden");		
			$(m3).removeClass("hidden");
	
		});	
	}	
 // load custom
$(document).ready(function(){

	// input check
	getID();
	
	
	// switching data types
		getTextSelection('#copy', 'paragraph');
		getTextSelection('#copy1', 'paragraph1');
		getTextSelection('#copy2', 'paragraph2');

		replaceClass(
			"#viewDeft", "#copy1", "#copy2","#copy", 
			"#modal-body1", "#modal-body2", "#modal-body"
		);
		replaceClass(
			"#viewJson", "#copy", "#copy2","#copy1", 
			"#modal-body", "#modal-body2", "#modal-body1"
		);
		replaceClass(
			"#viewCSV", "#copy", "#copy1","#copy2", 
			"#modal-body", "#modal-body1", "#modal-body2"
		);				

});