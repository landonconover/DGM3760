(function() {

var myForm = $('#contactForm');
var empDialog = $('#addNewEmpDialog');

//init the dialog
empDialog.dialog({ 
    autoOpen: false, 
    modal: true,
    show: "slide",
    hide: "explode"
});

// Complile Handlebars templates - I could precompile these...
var empTypes = Handlebars.compile($("#reasonTemplate").html());
var empTemplate = Handlebars.compile($("#empRowTemplate").html());

//open the dialog when the button is pressed
$('#addNew').click(function(){
    empDialog.dialog( "open" )
});

//get the empTypes and put them in the template.
$.getJSON('ajax_getEmpTypes.php', function(json, textStatus) {
    $('#types').append(empTypes(json));
});

//get the emps and put them in the template
$.getJSON('ajax_getEmps.php', function(json, textStatus) {
    $('#empBody').append(empTemplate(json));
});

//do this when the form is submitted
myForm.submit(function(e){
    $.post("ajax_addEmp.php", myForm.serialize(), function(data){
        console.log(data);
        //append the new data
        $('#empBody').append(empTemplate(data));
        //reset the form
        myForm[0].reset();
        empDialog.dialog( "close" );

    }, "json");

    return false;
})

})();
