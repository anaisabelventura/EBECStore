// Variable to hold request
var request;


    
    function clearFields(){
		document.getElementById("produto").value="";
		document.getElementById("quantidade").value="1";
		document.getElementById("e_creditos").innerHTML="0";
		document.getElementById("p_creditos").innerHTML="0";
		document.getElementById("creditos").value="0";
		document.getElementById("f_price").innerHTML="0";
		document.getElementById("p_max").innerHTML="0";	
		document.getElementById("alarm").style.color = "black";
		document.getElementById("Rate").style.color = "black";
		document.getElementById("box").style.backgroundColor="#93c47d";
		document.getElementById('Rate').innerHTML = '(0/0)';
		document.getElementById("botao").disabled = false; 
		document.getElementById("demo").innerHTML = 'Done!';
		var audio = new Audio('notifications/done.mp3');
		audio.play();
		onchangeTeam();
	}
	
	function handleError(){
		document.getElementById("box").style.backgroundColor="#FF1919"
		document.getElementById("botao").disabled = false; 
		document.getElementById("demo").innerHTML = 'Failed';
	}
	
// Bind to the submit event of our form
$("#foo").submit(function(event){

    // Abort any pending request
    if (request) {
        request.abort();
    }
    // setup some local variables
    var $form = $(this);

    // Let's select and cache all the fields
    var $inputs = $form.find("input, select, button, textarea");

    // Serialize the data in the form
    var serializedData = $form.serialize();

    // Let's disable the inputs for the duration of the Ajax request.
    // Note: we disable elements AFTER the form data has been serialized.
    // Disabled form elements will not be serialized.
    $inputs.prop("disabled", true);
	

    // Fire off the request to /form.php
    request = $.ajax({
        url: "https://script.google.com/macros/s/AKfycbyNCzyK9R3pHuLkwbKZfeu8LFpMFG65gp8ZoROeJN2423oTcwQA/exec",
        type: "post",
        data: serializedData
    });

    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
        // Log a message to the console
        console.log("Hooray, it worked!");
        console.log(response);
        console.log(textStatus);
        console.log(jqXHR);
		clearFields();
    });

    // Callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown){
        // Log the error to the console
		handleError();
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });

    // Callback handler that will be called regardless
    // if the request failed or succeeded
    request.always(function () {
        // Reenable the inputs
        $inputs.prop("disabled", false);
    });

    // Prevent default posting of form
    event.preventDefault();
});