/*!
 * P3 Home - Project
 * Michael Depaula
 * Custom js
 */
 
// Function getID()
// Disables the textbox input if user inputs nothing 
function getID()
{
    $("#text").keyup(function(){
        if( $("#text").val() == 0 ) 
        {
            document.getElementById('generate').disabled = true;
            document.getElementById('view').disabled = true;
            document.getElementById('view1').disabled = true;
        } else {
            document.getElementById('generate').disabled = false;
            document.getElementById('view').disabled = false;
            document.getElementById('view1').disabled = false;			
        }
    });
}

// Function getTextSelection()
// Selects text from modal being displayed
function getTextSelection(sel, paragraph)
{
    // select text in modal
    $(sel).click(function(){
        var text = document.getElementById(paragraph);
        text.select();
        alert('Do not forget to copy with Ctrl+C (Win), Command+C (Mac)');
    });		
}

// Function replaceClass()
// Returns the bootstrap modal, for the specific text to show
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

// Function slideItem()
// toggles views to show text in smaller devices
// instead of displaying modals. 
function slideItem(sel,elem){
    $(sel).click(function(){
        $(elem).slideToggle( "slow" );
    });
}

// Loading Page
$(document).ready(function(){

    // toggles views for smaller devices - no modals in use
    slideItem(".view-p-all",".ctrl-profile");
    slideItem(".view-p-json",".ctrljson-profile");
    slideItem(".view-p-csv",".ctrlcsv-profile");
    slideItem(".view-i-all",".ctrl-lorem");
	
    // switchProfiles
    // allows the user to traverse the generated list
    // so visual preview of the generate profile(s) is/are possible
    var textbox = document.getElementById('text').value;
    var x = parseInt($('#profile_container').css('height'));	
    var z = parseInt($('.slave-container').css('height')) + 300;	
    var y = 0;

    $(".fa-arrow-circle-o-right").click(function() {
        if (y > (-x+z)) {
            y=y-z;
            $("#profile_container").animate({top: y},{duration: 300,easing: 'swing'});
        }
    }); 

    $(".fa-arrow-circle-o-left").click(function() {
        if (y < 0) {
            y=y+z;
            $("#profile_container").animate({top: y},{duration: 300,easing: 'swing'});
        }
    });		

    // input check
    getID();

    // ensures that octal and checkbox permissions are sent without 
    // conflicting with each other
    $('#text').keydown(function() {
        if ($("#chmod_form input:checkbox:checked").length > 0)
        {
            $(":checkbox").attr('checked', false);
        }
    }); 

    $(":checkbox").click(function() {
        $('#text').val('0000');
        document.getElementById('generate').disabled = false;
    }); 

    // switching modals, so only one modals is load at a time
    // using the same modal tags and avoiding redundancy
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