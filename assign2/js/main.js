(function() {

var myForm = $('#contactForm');
var empDialog = $('#addNewEmpDialog');

//init the dialog
empDialog.dialog({ autoOpen: false, modal: true });

//open the dialog when the button is pressed
$('#addNew').click(function(){
    empDialog.dialog( "open" )
})

var data = [
    {
        id: 10,
        value: "test"
    },
    {
        id: 12,
        value: "My Value"
    },
    {
        id: 13,
        value: "Another one"
    }
];

var empData = [
    {
        id: 1,
        fName: 'Landon',
        lName: 'Conover',
        email: 'landon@landonconover.com',
        gender: 'Male'        
    },
    {
        id: 2,
        fName: 'Landon',
        lName: 'Conover',
        email: 'landon@landonconover.com',
        gender: 'Male'        
    },
    {
        id: 3,
        fName: 'Landon',
        lName: 'Conover',
        email: 'landon@landonconover.com',
        gender: 'Male'        
    }
];

// Complile Handlebars templates
var template = Handlebars.compile($("#reasonTemplate").html());
var empTemplate = Handlebars.compile($("#emprow").html());

//get database info for the page

$('#reasons').append(template(data));
$('#empBody').append(empTemplate(empData));

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