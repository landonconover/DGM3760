(function() {

var myForm = $('#contactForm');
var empDialog = $('#addNewEmpDialog');

//init the dialog
empDialog.dialog({ autoOpen: false, modal: true });

//open the dialog when the button is pressed
$('#addNew').click(function(){
    empDialog.dialog( "open" )
})


//do this when the form is submitted
myForm.submit(function(e){
    $.post("sendMail.php", myForm.serialize(), function(data){
        console.log(data);
        if (data == 'Sucess') {
            $('.main').hide('fast', function(){
                $('.thanks').show('slow');
            });
        };
    });
    return false;
})

})();